<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    protected static function boot()
    {
        parent::boot();

        // DB::setDefaultConnection(env('DB_CONNECTION'));
        // DB::setDefaultConnection(env('DB2_CONNECTION'));
        DB::setDefaultConnection(env('DB3_CONNECTION'));
    }
}
