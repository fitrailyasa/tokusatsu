<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AddressVillage extends Model
{
    use HasFactory;

    protected $table = 'address_villages';
    protected $fillable = ['name', 'district_id'];

    public function district()
    {
        return $this->belongsTo(AddressDistrict::class, 'district_id', 'id');
    }

    public function details()
    {
        return $this->hasMany(AddressDetail::class);
    }

    protected static function boot()
    {
        parent::boot();

        // DB::setDefaultConnection(env('DB_CONNECTION'));
        // DB::setDefaultConnection(env('DB2_CONNECTION'));
        DB::setDefaultConnection(env('DB3_CONNECTION'));
    }
}
