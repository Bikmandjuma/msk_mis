<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class taskerfile extends Model
{
    use HasFactory;

    protected $fillable=[
    	'name',
    	'content',
    	'image',
    ];
}
