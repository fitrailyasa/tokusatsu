<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'email',
        'img',
        'no_hp',
        'password',
        'role',
        'provider',
        'provider_id',
        'provider_token',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'role',
        'acc_verified',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'provider' => 'array',
        'provider_id' => 'array',
        'provider_token' => 'array',
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        DB::setDefaultConnection(env('DB_CONNECTION'));
        // DB::setDefaultConnection(env('DB2_CONNECTION'));
    }
}
