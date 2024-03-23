<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'data';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id', 'name', 'img', 'category_id', 'tags'];

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
