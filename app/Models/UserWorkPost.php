<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWorkPost extends Model
{
    use HasFactory;


    protected $casts = [
        // 'donation' => 'array',
    ];

    protected $fillable = [
        'user_id',
        'address',
        'pincode',
        'district',
        'apply_for',
        'status',
        'approved_by',
        'donation'
    ];
}