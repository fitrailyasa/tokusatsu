<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressProvince extends Model
{
    use HasFactory;

    protected $table = 'address_provinces';
    protected $fillable = ['name'];

    public function regencies()
    {
        return $this->hasMany(AddressRegency::class);
    }
}
