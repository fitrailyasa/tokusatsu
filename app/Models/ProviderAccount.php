<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderAccount extends Model
{
    use HasFactory;

    protected $table = 'provider_accounts';
    protected $fillable = ['email', 'access_token', 'status'];
    protected $casts = [
        'access_token' => 'array',
    ];
}
