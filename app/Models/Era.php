<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Era extends Model
{
    use HasFactory;

    protected $table = 'era';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id', 'name', 'img'];

    public function Category()
    {
        return $this->hasMany(Category::class);
    }
}
