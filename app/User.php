<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','roles-id','avatar',
    ];

    protected $table = "pemesanan";

    protected $fillable = [
        'keterangan_pesanan', 'alamat', 'menu_id','tanggal','pukul','no_hp','jmlh_pesanan',
    ];

    protected $table = "review";

    protected $fillable = [
        'user_id','menu_id', 'isi_review', 'tanggal',
    ];

    protected $table = "menu";

    protected $fillable = [
        'nama_menu', 'harga','pesan','gambar_menu','deskripsi_menu','stock',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
