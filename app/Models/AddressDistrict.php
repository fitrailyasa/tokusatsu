<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressDistrict extends Model
{
    use HasFactory;

    protected $table = 'address_districts';
    protected $fillable = ['name', 'regency_id'];

    public function regency()
    {
        return $this->belongsTo(AddressRegency::class, 'regency_id', 'id');
    }

    public function villages()
    {
        return $this->hasMany(AddressVillage::class);
    }
}
