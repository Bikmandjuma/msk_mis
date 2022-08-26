<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitizenComplain extends Model
{
    use HasFactory;

    protected $fillable=[
        'names',
        'phone',
        'email',
        'image',
        'complains',
        'role_id',
        'forward',
        'date_co',
        'time_co',
        'complains_reply',
        'decision',
        'replied_date',
        'replied_time',
    ];
}
