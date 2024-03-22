<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $primaryKey = 'id';
    public $incrementing = false;   
    protected $fillable = ['id', 'name', 'img', 'era_id', 'franchise_id'];

    public function data()
    {
        return $this->hasMany(Data::class);
    }

    public function era()
    {
        return $this->belongsTo(Era::class, 'era_id', 'id');
    }

    public function franchise()
    {
        return $this->belongsTo(Franchise::class, 'franchise_id', 'id');
    }
}
