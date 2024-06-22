<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'category';
    protected $primaryKey = 'id';
    public $incrementing = false;   
    protected $fillable = ['id', 'name', 'desc', 'img', 'era_id', 'franchise_id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

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
