<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Franchise extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $connection;
    protected $table = 'franchises';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'slug', 'description', 'img', 'status'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->connection = env('DB_CONTENT_CONNECTION');
    }

    protected static function boot()
    {
        parent::boot();

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
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
