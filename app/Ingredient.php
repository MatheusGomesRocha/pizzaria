<?php


namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Ingredient as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class Ingredient extends Authenticatable
{
    use Notifiable;

    protected $table = 'ingredients';
    protected $primaryKey = 'id';

    protected $fillable = [
        'ingredients'
    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
