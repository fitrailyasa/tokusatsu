<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressDetail extends Model
{
    use HasFactory;

    protected $table = 'address_details';
    protected $fillable = ['name', 'latitude', 'longitude', 'village_id'];

    public function village()
    {
        return $this->belongsTo(AddressVillage::class, 'village_id', 'id');
    }
}
