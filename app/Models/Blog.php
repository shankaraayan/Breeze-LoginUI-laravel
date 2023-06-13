<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $casts = [
        'comments' => 'array',
        'date' => 'date',
        'image' => 'array',
    ];

    protected $fillable = [
        'title',
        'description',
        'image',
        'date',
        'location',
        'comments',
        'like',
    ];
}