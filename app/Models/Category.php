<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $fillable = ['name', 'era_id', 'franchise_id'];

    public function data()
    {
        return $this->hasMany(Data::class);
    }

    public function era()
    {
        return $this->belongsTo(Era::class);
    }

    public function franchise()
    {
        return $this->belongsTo(Franchise::class);
    }
}
