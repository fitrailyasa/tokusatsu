<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressRegency extends Model
{
    use HasFactory;

    protected $connection;
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

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // $this->connection = env('DB_CONNECTION');
        // $this->connection = env('DB2_CONNECTION');
        $this->connection = env('DB3_CONNECTION');
    }
}
