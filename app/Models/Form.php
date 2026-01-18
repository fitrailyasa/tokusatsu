<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Form extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = 'content';
    protected $table = 'category_forms';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'form',
        'type',
        'notes',
        'img',
        'category_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
