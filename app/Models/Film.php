<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Film extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection;
    protected $table = 'category_films';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'type',
        'category_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected static function boot()
    {
        parent::boot();

        DB::setDefaultConnection(env('DB_CONNECTION'));
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
