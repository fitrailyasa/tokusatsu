<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Era extends Model
{
    use HasFactory;

    protected $table = 'era';
    protected $fillable = ['name'];

    public function era()
    {
        return $this->hasMany(Era::class);
    }
}
