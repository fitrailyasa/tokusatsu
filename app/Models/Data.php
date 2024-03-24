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
    // protected $fillable = ['id', 'name', 'img', 'category_id', 'tags'];
    protected $fillable = ['id', 'name', 'img', 'category_id'];

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'data_tags', 'data_id', 'tag_id');
    }

}
