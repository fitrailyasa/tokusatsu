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

    public static function extractDriveFileId(string $input): ?string
    {
        if (preg_match('/^[a-zA-Z0-9_-]{10,}$/', $input)) {
            return $input;
        }

        preg_match('/\/d\/([a-zA-Z0-9_-]+)/', $input, $matches);

        return $matches[1] ?? null;
    }
}
