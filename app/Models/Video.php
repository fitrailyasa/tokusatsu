<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Video extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection;
    protected $table = 'videos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'title',
        'slug',
        'type',
        'number',
        'link',
        'airdate',
        'category_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'link' => 'array',
        'airdate' => 'date',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->connection = env('DB1_CONNECTION');
        // $this->connection = env('DB2_CONNECTION');
        // $this->connection = env('DB3_CONNECTION');
    }

    public static function booted()
    {
        static::saving(function ($video) {

            if ($video->category_id) {
                $category = $video->category()->first();

                if ($category && $category->fullname) {
                    $video->slug = Str::slug(
                        "{$category->fullname} {$video->type} {$video->number}"
                    );
                }
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
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
