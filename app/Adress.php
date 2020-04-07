<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Adress as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Adress extends Authenticatable
{
    use Notifiable;

    protected $table = 'adresses';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'cep', 'rua', 'bairro', 'numero', 'complemento', 'referencia',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function get_adress()
    {
        if (Auth::check()) {
            return DB::table('adresses')
                ->where('user_id', '=', Auth::user()->id)
                ->get();
        }
    }

    public static function get_adress_first()
    {
        if (Auth::check()) {
            return DB::table('adresses')
                ->where('user_id', '=', Auth::user()->id)
                ->first();
        }
    }

    public static function get_adressCount()
    {
        if (Auth::check()) {
            return DB::table('adresses')
                ->where('user_id', '=', Auth::user()->id)
                ->Count();
        }
    }

    public static function delete_adress($id)
    {
        return DB::table('adresses')
            ->where('id', '=', $id)
            ->delete();
    }
}
