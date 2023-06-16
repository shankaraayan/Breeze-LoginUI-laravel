<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberTree extends Model
{
    use HasFactory;

    protected $fillable = [
        'referral_by',
        'referred_member',
        'gender',
    ];

    public function referred_users()
    {
        return $this->belongsTo(User::class, 'referred_member', 'my_referral');
    }
}