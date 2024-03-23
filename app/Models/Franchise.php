<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'franchise';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id', 'name', 'img'];

    public function Category()
    {
        return $this->hasMany(Category::class);
    }
}
