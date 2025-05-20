<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Helpers\TelegramHelper;
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
        'status',
        'provider',
        'provider_id',
        'provider_token',
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
    ];

    protected static function boot()
    {
        parent::boot();

        DB::setDefaultConnection(env('DB_CONNECTION'));
        // DB::setDefaultConnection(env('DB2_CONNECTION'));

        static::created(function ($model) {
            $roles = $model->getRoleNames()->implode(', ');
            TelegramHelper::sendMessage("📦 <b>User Created</b>\nID: {$model->id}\nName: {$model->name}\nEmail: {$model->email}\nRole: {$roles}\nStatus: {$model->status}");
        });

        static::updated(function ($model) {
            $roles = $model->getRoleNames()->implode(', ');
            TelegramHelper::sendMessage("✏️ <b>User Updated</b>\nID: {$model->id}\nName: {$model->name}\nEmail: {$model->email}\nRole: {$roles}\nStatus: {$model->status}");
        });

        static::deleted(function ($model) {
            $roles = $model->getRoleNames()->implode(', ');
            TelegramHelper::sendMessage("🗑 <b>User Deleted</b>\nID: {$model->id}\nName: {$model->name}\nEmail: {$model->email}\nRole: {$roles}\nStatus: {$model->status}");
        });
    }
}
