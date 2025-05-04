<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Helpers\TelegramHelper;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $connection;
    protected $table = 'tags';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'slug'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected static function boot()
    {
        parent::boot();

        DB::setDefaultConnection(env('DB_CONNECTION'));
        // DB::setDefaultConnection(env('DB2_CONNECTION'));

        static::creating(function ($model) {
            if (empty($model->slug) && !empty($model->name)) {
                $model->slug = Str::slug($model->name, '-');
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('name')) {
                $model->slug = Str::slug($model->name, '-');
            }
        });

        static::created(function ($model) {
            $message = "<b>📦 Tag Created</b>\n<pre>" .
                "id    : {$model->id}\n" .
                "nama  : {$model->name}</pre>";
            TelegramHelper::sendMessage($message);
        });
        
        static::updated(function ($model) {
            $message = "<b>✏️ Tag Updated</b>\n<pre>" .
                "id    : {$model->id}\n" .
                "nama  : {$model->name}</pre>";
            TelegramHelper::sendMessage($message);
        });
        
        static::deleted(function ($model) {
            $message = "<b>🗑 Tag Deleted</b>\n<pre>" .
                "id    : {$model->id}\n" .
                "nama  : {$model->name}</pre>";
            TelegramHelper::sendMessage($message);
        });
        
    }

    public function datas()
    {
        return $this->belongsToMany(Data::class, 'data_tags', 'tag_id', 'data_id');
    }
}
