<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Card as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Card extends Authenticatable
{
    use Notifiable;

    protected $table = 'cards';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'card_name', 'card_number', 'card_ccv', 'card_date',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function cards()
    {
        if (Auth::check()) {
            return DB::table('cards')
                ->where('user_id', '=', Auth::user()->id)
                ->get();
        }
    }


}
