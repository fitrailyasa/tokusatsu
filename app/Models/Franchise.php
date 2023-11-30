<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    use HasFactory;

    protected $table = 'franchise';
    protected $fillable = ['name'];

    public function category()
    {
        return $this->hasMany(Category::class);
    }
}
