<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Es extends Authenticatable
{
    protected $table='es';
    protected $guarded = array();

    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'firstname',
        'lastname',
        'gender',
        'phone',
        'email',
        'image',
        'nat_id',
        'password',
    ];

     protected $hidden = [
            'password', 'remember_token',
        ];
}
