<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Helpers\TelegramHelper;

class Data extends Model
{
    use Notifiable;
    use HasFactory;
    use SoftDeletes;

    protected $connection;
    protected $table = 'datas';
    protected $primaryKey = 'id';
    // public $incrementing = false;
    protected $fillable = ['id', 'name', 'img', 'category_id'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected static function boot()
    {
        parent::boot();

        DB::setDefaultConnection(env('DB_CONNECTION'));
        // DB::setDefaultConnection(env('DB2_CONNECTION'));

        // static::creating(function ($model) {
        //     if (empty($model->id)) {
        //         $model->id = (string) Str::uuid();
        //     }
        // });

        // static::created(function ($model) {
        //     TelegramHelper::sendMessage("📦 <b>Data Created</b>\nID: {$model->id}\nName: {$model->name}\nCategory: {$model->category->name}\nEra: {$model->category->era->name}\nFranchise: {$model->category->franchise->name}");
        // });

        // static::updated(function ($model) {
        //     TelegramHelper::sendMessage("✏️ <b>Data Updated</b>\nID: {$model->id}\nName: {$model->name}\nCategory: {$model->category->name}\nEra: {$model->category->era->name}\nFranchise: {$model->category->franchise->name}");
        // });

        // static::deleted(function ($model) {
        //     TelegramHelper::sendMessage("🗑 <b>Data Deleted</b>\nID: {$model->id}\nName: {$model->name}\nCategory: {$model->category->name}\nEra: {$model->category->era->name}\nFranchise: {$model->category->franchise->name}");
        // });
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'data_tags', 'data_id', 'tag_id');
    }
}
