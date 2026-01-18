<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VideoView extends Model
{
    use HasFactory;

    protected $connection;
    protected $table = 'video_views';
    protected $primaryKey = 'id';

    protected $fillable = [
        'video_id',
        'ip_address',
        'user_agent',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->connection = env('DB_CONTENT_CONNECTION');
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
