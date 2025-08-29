<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AddressDetail extends Model
{
    use HasFactory;

    protected $connection;
    protected $table = 'address_details';
    protected $fillable = ['name', 'latitude', 'longitude', 'village_id'];

    public function village()
    {
        return $this->belongsTo(AddressVillage::class, 'village_id', 'id');
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // $this->connection = env('DB1_CONNECTION');
        // $this->connection = env('DB2_CONNECTION');
        $this->connection = env('DB3_CONNECTION');
    }
}
