<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BharatKeDham extends Model
{
    use HasFactory;

    protected $casts = ['section' => 'array'];
    protected $fillable = ['section'];
}
