<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Product as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Product extends Authenticatable
{
    use Notifiable;

    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'img', 'ingredients', 'price', 'price_sm', 'price_md', 'price_lg', 'type', 'sm', 'md', 'lg', 'description',
    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function delete_product($id)
    {
        if (Auth::check()) {
            return DB::table('products')
                ->where('id', '=', $id)
                ->delete();
        }
    }

    public static function delete_ing($id)
    {
        if (Auth::check()) {
            return DB::table('ingredients')
                ->where('id', '=', $id)
                ->delete();
        }
    }

    public static function pizza_limit()
    {
            return DB::table('products')
                ->where('type', '=', 'pizza')
                ->limit('3')
                ->get();
    }

    public static function burger_limit()
    {
            return DB::table('products')
                ->where('type', '=', 'sanduiche')
                ->limit('3')
                ->get();
    }

}
