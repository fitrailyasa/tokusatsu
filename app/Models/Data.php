<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Data extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $connection;
    protected $table = 'datas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'img',
        'category_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->connection = env('DB_CONTENT_CONNECTION');
    }

    protected static function boot()
    {
        parent::boot();

        // static::created(function ($model) {
        //     TelegramHelper::sendMessage(
        //         "<b>📦 Data Created</b>\n" . self::formatMessage($model)
        //     );
        // });

        // static::updated(function ($model) {
        //     TelegramHelper::sendMessage(
        //         "<b>✏️ Data Updated</b>\n" . self::formatMessage($model)
        //     );
        // });

        // static::deleted(function ($model) {
        //     TelegramHelper::sendMessage(
        //         "<b>🗑 Data Deleted</b>\n" . self::formatMessage($model)
        //     );
        // });
    }

    protected static function formatMessage($model): string
    {
        $tagNames = $model->tags->pluck('name')->implode(', ') ?: '-';

        return "<pre>" . sprintf(
            "ID         : %s\n" .
                "Name       : %s\n" .
                "Category   : %s\n" .
                "Era        : %s\n" .
                "Franchise  : %s\n" .
                "Tag        : %s\n" .
                "%-10s : %s",
            $model->id,
            $model->name,
            $model->category->name ?? '-',
            $model->category->era->name ?? '-',
            $model->category->franchise->name ?? '-',
            $tagNames,
            ucfirst($model->getLastEventType()) . ' At',
            $model->{$model->getLastEventTimestamp()}
        ) . "</pre>";
    }

    protected function getLastEventType(): string
    {
        if ($this->wasRecentlyCreated) return 'created';
        if ($this->isDirty()) return 'updated';
        return 'deleted';
    }

    protected function getLastEventTimestamp(): string
    {
        if ($this->wasRecentlyCreated) return 'created_at';
        if ($this->isDirty()) return 'updated_at';
        return 'deleted_at';
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'data_tags', 'data_id', 'tag_id');
    }

    public function getCategoryColor(): string
    {
        $colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark'];

        $name = $this->category->name ?? null;
        if (!$name) return 'secondary';

        $hash = crc32($name);
        return $colors[$hash % count($colors)];
    }
}
