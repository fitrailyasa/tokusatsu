<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Helpers\TelegramHelper;

class Era extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $connection;
    protected $table = 'eras';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'slug', 'desc', 'img'];
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

        // static::created(function ($model) {
        //     $message = "<b>📦 Era Created</b>\n<pre>" .
        //         "ID         : {$model->id}\n" .
        //         "Name       : {$model->name}\n" .
        //         "Created At : {$model->created_at}</pre>";
        //     TelegramHelper::sendMessage($message);
        // });

        // static::updated(function ($model) {
        //     $message = "<b>✏️ Era Updated</b>\n<pre>" .
        //         "ID         : {$model->id}\n" .
        //         "Name       : {$model->name}\n" .
        //         "Updated At : {$model->updated_at}</pre>";
        //     TelegramHelper::sendMessage($message);
        // });

        // static::deleted(function ($model) {
        //     $message = "<b>🗑 Era Deleted</b>\n<pre>" .
        //         "ID         : {$model->id}\n" .
        //         "Name       : {$model->name}\n" .
        //         "Deleted At : {$model->deleted_at}</pre>";
        //     TelegramHelper::sendMessage($message);
        // });
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
