<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AddressProvince extends Model
{
    use HasFactory;

    protected $table = 'address_provinces';
    protected $fillable = ['name'];

    public function regencies()
    {
        return $this->hasMany(AddressRegency::class);
    }

    protected static function boot()
    {
        parent::boot();

        // DB::setDefaultConnection(env('DB_CONNECTION'));
        // DB::setDefaultConnection(env('DB2_CONNECTION'));
        DB::setDefaultConnection(env('DB3_CONNECTION'));
    }
}
