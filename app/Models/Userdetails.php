<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userdetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'paid',
        'post',
        'photo',
        'aadhar_no',
        'profile_status',
        'aadhar_f',
        'aadhar_b',
        'address',
    ];
}
