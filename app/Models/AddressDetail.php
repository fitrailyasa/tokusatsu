<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AddressDetail extends Model
{
    use HasFactory;

    protected $table = 'address_details';
    protected $fillable = ['name', 'latitude', 'longitude', 'village_id'];

    public function village()
    {
        return $this->belongsTo(AddressVillage::class, 'village_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        // DB::setDefaultConnection(env('DB_CONNECTION'));
        // DB::setDefaultConnection(env('DB2_CONNECTION'));
        DB::setDefaultConnection(env('DB3_CONNECTION'));
    }
}
