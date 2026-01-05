<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VideoReport extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection;
    protected $table = 'video_reports';
    protected $primaryKey = 'id';

    protected $fillable = [
        'video_id',
        'message',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->connection = env('DB1_CONNECTION');
        // $this->connection = env('DB2_CONNECTION');
        // $this->connection = env('DB3_CONNECTION');
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
