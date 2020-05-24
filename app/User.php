<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'user', 'cpf', 'telefone', 'nivel', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function get_orders()
    {
        if(Auth::check()) {
            if(Auth::user()->nivel == 2) {
                return DB::table('orders')
                    ->join('products', 'products.id', '=', 'orders.product_id')
                    ->where('orders.user_id', '=', Auth::user()->id)
                    ->paginate('5');
            }
        }
    }

    public static function get_user()
    {
        if (Auth::check()) {
            if(Auth::user()->nivel == 2) {
                return DB::table('users')
                    ->where('id', '=', Auth::user()->id)
                    ->first();
            }
        }
    }

    public static function get_users()
    {
        if(Auth::check()) {
            if(Auth::user()->nivel == 1) {
                return DB::table('users')
                    ->where('nivel', '=', '2')
                    ->get();
            }
        }

    }

    public static function get_admins()
    {
        if(Auth::check()) {
            if(Auth::user()->nivel == 1) {
                return DB::table('users')
                    ->where('nivel', '=', '1')
                    ->get();
            }
        }

    }

    public static function count_orders()
    {
        return DB::table('orders')
            ->count();
    }

    public static function delete_user($id)
    {
        if(Auth::check()) {
            if(Auth::user()->nivel == 1) {
                return DB::table('users')
                    ->where('id', '=', $id)
                    ->delete();
            }
        }

    }

}
