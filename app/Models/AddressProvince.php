<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressProvince extends Model
{
    use HasFactory;

    protected $connection;
    protected $table = 'address_provinces';
    protected $fillable = ['name'];

    public function regencies()
    {
        return $this->hasMany(AddressRegency::class);
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // $this->connection = env('DB1_CONNECTION');
        // $this->connection = env('DB2_CONNECTION');
        $this->connection = env('DB3_CONNECTION');
    }
}
