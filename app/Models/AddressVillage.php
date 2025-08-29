<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressVillage extends Model
{
    use HasFactory;

    protected $connection;
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

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // $this->connection = env('DB_CONNECTION');
        // $this->connection = env('DB2_CONNECTION');
        $this->connection = env('DB3_CONNECTION');
    }
}
