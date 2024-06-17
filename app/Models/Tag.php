<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'tag';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id', 'name'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function datas()
    {
        return $this->belongsToMany(Data::class, 'data_tags', 'tag_id', 'data_id');
    }
}
