<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Tasker extends Authenticatable
{
    protected $table='taskers';
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
        'role_id',
        'password',
    ];

    protected $hidden = [
            'password', 'remember_token',
        ];

    public function getRoleId(){
        $this->hasMany('App\Models\TaskerRole','role_id');
    }
}
