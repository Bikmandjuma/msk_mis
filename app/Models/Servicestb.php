<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicestb extends Model
{
    use HasFactory;
    protected $fillable=[
      'title',
      'content',
      'imageone',
      'imagetwo',
      'imagethree',
      'imagefour',
      'time',
      'date',
    ];
}
