<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Users;
use App\Pemesanan;
use App\Menu;
use App\Review;
use DB;
use Redirect;
use Validator;
use Mail;

class UserController extends Controller
{
  public function showTabel()
  {
    $pemesanan = Pemesanan::All();
    $menu = Menu::All();
    return view ("tabel_admin")
      ->with("pemesanan", $pemesanan)
      ->with("menu", $menu);
  }
  public function deleteTabelPemesanan($id)
  {
    Pemesanan::where("id", $id)->delete();
    return redirect('/tabel/pemesanan');
  }
  public function PesananSelesai($id)
  {
    $pemesanan = Pemesanan::where("id", $id);
    $pemesanan->update(["status" => "Selesai"]);
    return redirect('/tabel/pemesanan');
  }
  public function showAvatar()
  {
    return view("avatar");
  }
  public function editAvatar(Request $req)
  {
    $valid = Validator::make($req->all(), [
       'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    if ($valid->fails())
      return Redirect::to("/user/edit/avatar")->with("status", "Hanya bisa mengupload jpeg,png,jpg dan gif, serta besar maksimal gambar 1 MB");

    $check = Users::where("id", session("id"));
    if ($check->count() > 0)
    {
      if ($req->hasFile('avatar')) {
        $image = $req->file('avatar');
        $name = $image->getClientOriginalName();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        $avatar = ('/images' . '/' . $name);
        $check->update(["avatar" => $avatar]);
        return Redirect::to("/user")->with("status", "Avatar berhasil diubah");
      }
    }
  }
  public function showGambar($id)
  {
		return view("edit_gambar_menu")->with("id", $id);
  }
  public function editGambar(Request $req, $id)
  {
    $valid = Validator::make($req->all(), [
       'gambar_menu' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    if ($valid->fails())
      return redirect()->back()->with("status", "Hanya bisa mengupload jpeg,png,jpg dan gif, serta besar maksimal gambar 1 MB");

    $check = Menu::where("id", $id);
    if ($check->count() > 0)
    {
      if ($req->hasFile('gambar_menu')) {
        $image = $req->file('gambar_menu');
        $name = $image->getClientOriginalName();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        $gambar_menu = ('/images' . '/' . $name);
        $check->update(["gambar_menu" => $gambar_menu]);
        return Redirect::to("/menu");
      }
    }
  }
  public function showEditMenu($id)
  {
    if (Menu::where("id", $id)->count() > 0)
			return view("edit_menu")
        ->with(["menu" => Menu::where("id", $id)->get(), "full" => true]);
  }
  public function editMenu(Request $req , $id)
  {
      $menu = Menu::where("id", $id);
      $menu->update(["nama_menu" => $req->nama_menu]);
      $menu->update(["harga" => $req->harga]);
      $menu->update(["pesan" => $req->pesan]);
      $menu->update(["deskripsi_menu" => $req->deskripsi]);
      $menu->update(["jenis" => $req->jenis]);
    return Redirect::to("/menu");
  }
  public function sdeleteMenu($id)
  {
      return view("delete_menu")->with("id", $id);
  }
  public function deleteMenu($id)
  {
			Menu::where("id", $id)->delete();
      Review::where("menu_id", $id)->delete();
			return redirect('/menu');
  }
  public function sdeleteReview($id)
  {
      return view("delete")->with("id", $id);
  }
  public function deleteReview($id)
  {
			Review::where("id", $id)->delete();
			return redirect('/menu');
  }
  public function doReview(Request $req)
  {
    $review = new Review();
    $review->user_id = session("id");
    $review->isi_review = $req->isi_review;
    $review->tanggal = date("Y-m-d");
    $review->menu_id = $req->menu_id;
    $review->save();
    return redirect()->back();
  }
  public function showMenu()
  {
    $menu = Menu::All();
    return view("shop",compact("menu"));
  }
	public function aboutMenu($id)
	{
		if (Menu::where("id", $id)->count() > 0)
			return view("product-detail")
        ->with(["menu" => Menu::where("id", $id)->get(), "full" => true])
        ->with("review", Review::All())
        ->with("users", Users::all());
	}
  public function showAkun()
  {
    $users = Users::all()->where("id", session("id"))->first();
    return view("user")->with("users", $users);
  }
  public function editAkun(Request $req)
  {
    $users = Users::where("id", session("id"));
    $users->update(["roles_id" => session("roles_id")]);
    $users->update(["avatar" => $req->avatar]);
    $users->update(["name" => $req->name]);
    $users->update(["email" => $req->email]);
    $users->update(["password" => $req->password]);
    return Redirect::to("/user")->with("status", "Nama berhasil diubah");
  }
  public function showPassword()
  {
    return view("password");
  }
  public function showEmail()
  {
    return view("email");
  }

  public function doEmail(Request $req)
  {
    $valid = Validator::make($req->all(), [
      "email" => "required|unique:users,email|email",
      "password" => "required"
    ]);

    if ($valid->fails())
      return Redirect::to("/user/edit/email")->with("status", "Email sudah terpakai");

    $check = Users::where("id", session("id"))->where("password", md5($req->password));
    if ($check->count() > 0)
    {
      $check->update(["email" => $req->email]);
      return Redirect::to("/user")->with("status", "Email berhasil diubah");
    }
    return Redirect::to("/user/edit/email")->with("status", "Password yang anda masukkan salah");
  }

  public function doPassword(Request $req)
  {
    $valid = Validator::make($req->all(), [
      "oldpassword" => "required",
      "password" => "required|min:6",
      "confirm-password" => "same:password"
    ]);

    if ($valid->fails())
      return Redirect::to("/user/edit/password")->with("status", "Password belum mencapai 6 huruf");

    $check = Users::where("id", session("id"))->where("password", md5($req->oldpassword));
    if ($check->count() > 0)
    {
      $check->update(["password" => md5($req->password)]);
      return Redirect::to("/user")->with("status", "Password berhasil diubah");
    }
    return Redirect::to("/user/edit/password")->with("status", "Password lama salah");
  }
  public function showHome()
  {
    return view("index");
  }
  public function showAbout()
  {
    return view("about");
  }
  public function showContact()
  {
    $menu = Menu::where('pesan', 1)->get();
    return view("contact")->with('menu', $menu);
  }
  public function showDaftar()
  {
    return view("daftar");
  }
  public function doDaftar(Request $req)
	{
		$valid = Validator::make($req->all(), [
			"name" => "required",
			"email" => "required|unique:users,email|email",
			"password" => "required|min:6",
			"confirm-password" => "same:password"
		]);

		if ($valid->fails())
			return Redirect::to("/daftar")->with("status", "Email sudah digunakan atau Password belum mencapai 6 huruf");

		$users = new Users();
		$users->roles_id = 2;
    $users->name = $req->name;
		$users->email = $req->email;
		$users->password = md5($req->password);
		$users->save();
		return Redirect::to("/login");
	}

  public function showLogin()
  {
    return view("login");
  }
  public function doLogin(Request $req)
  {
    $valid = Validator::make($req->all(), [
      "email" => "required|exists:users,email",
      "password" => "required"
    ]);

    if ($valid->fails())
      return Redirect::to("/login")->with("status", "Email tidak ditemukan");

    $check = Users::where("email", $req->email)->where("password", md5($req->password));
    if ($check->count() > 0)
    {
      $users = $check->first();
      session(["name"=>$users->name]);
      session(["id"=>$users->id]);
      session(["avatar"=>$users->avatar]);
      session(["email" => $users->email]);
      session(["roles_id" => $users->roles_id]);
      return Redirect::to("/");
    }
    return Redirect::to("/login")->with("status", "Email atau password tidak cocok");
  }
  public function doLogout(Request $req)
	{
        $req->session()->regenerate();
        $req->session()->flush();
        return redirect("/");
	}
  public function doPemesanan(Request $req)
  {
    $valid = Validator::make($req->all(), [
      "jmlh_pesanan" => "required|numeric|min:25"
    ]);

    if ($valid->fails())
      return Redirect::to("/contact")->with("alert", "Jumlah Pemesanan Minimal adalah 25");

    $pemesanan = new Pemesanan();
		$pemesanan->nama_pemesan = $req->nama;
    $pemesanan->menu_id = $req->nama_menu;
		$pemesanan->jmlh_pesanan = $req->jmlh_pesanan;
    $pemesanan->keterangan_pesanan = $req->ket;
    $pemesanan->alamat = $req->alamat;
		$pemesanan->no_hp = $req->no_hp;
    $pemesanan->tanggal = $req->tanggal;
    $pemesanan->pukul = $req->pukul;
    $pemesanan->status = "Pending";
    $pemesanan->save();
    $id = $pemesanan->id;
    return Redirect::to("contact/bayar/".$id);
  }
  public function showbayar($id)
  {
    $id_pesanan = Pemesanan::where("id", $id)->first();
    return view("bayar")
    ->with('pemesanan', Pemesanan::where("id", $id_pesanan->id)->get())
    ->with("menu", Menu::where("id", $id_pesanan->menu_id)->get())
    ->with("id", $id_pesanan->id);
  }
  public function dobayar(Request $req, $id)
  {
    $data = array(
      $pemesanan = Pemesanan::where("id", $id)->first(),
      $menu = Menu::where('id', $pemesanan->menu_id)->first(),
      'nama_pemesan' => $pemesanan->nama_pemesan,
      'menu_id' => $menu->nama_menu,
  		'jmlh_pesanan' => $pemesanan->jmlh_pesanan,
      'keterangan_pesanan' => $pemesanan->keterangan_pesanan,
      'alamat' => $pemesanan->alamat,
  		'no_hp' => $pemesanan->no_hp,
      'tanggal' => $pemesanan->tanggal,
      'pukul' => $pemesanan->pukul,
      'harga' => $menu->harga,
      'total' => $req->total
    );

    Mail::send('mail', $data, function($message){
      $message->to('rumakanmah@gmail.com','To rumakanmah')->subject('Pesanan');
      $message->from('rumakanmah@gmail.com','rumakanmah');
    });

    return view("terimakasih");
  }
  public function deletePemesanan($id)
  {
			Pemesanan::where("id", $id)->delete();
			return redirect('/');
  }
  public function showTMenu()
  {
			return view("addmenu");
  }
  public function tambahMenu(Request $req)
  {
    $valid = Validator::make($req->all(), [
       'gambar_menu' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    if ($valid->fails())
      return Redirect::to("/add/menu")->with("status", "Hanya bisa mengupload jpeg,png,jpg dan gif, serta besar maksimal gambar 1 MB");

    $menu = new Menu;
    if ($req->hasFile('gambar_menu')) {
       $image = $req->file('gambar_menu');
       $name = $image->getClientOriginalName();
       $destinationPath = public_path('/images');
       $image->move($destinationPath, $name);
       $gambar_menu = ('/images' . '/' . $name);
       $menu->gambar_menu = $gambar_menu;
       $menu->nama_menu = $req->nama_menu;
       $menu->harga = $req->harga;
   		 $menu->pesan = $req->pesan;
   		 $menu->deskripsi_menu = $req->deskripsi;
       $menu->jenis = $req->jenis;
       $menu -> save();
    }
    return Redirect::to("/menu");
  }
}
