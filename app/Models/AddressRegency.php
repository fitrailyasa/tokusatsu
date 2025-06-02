<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressRegency extends Model
{
    use HasFactory;

    protected $table = 'address_regencies';
    protected $fillable = ['name', 'province_id'];

    public function province()
    {
        return $this->belongsTo(AddressProvince::class, 'province_id', 'id');
    }

    public function districts()
    {
        return $this->hasMany(AddressDistrict::class);
    }
}
