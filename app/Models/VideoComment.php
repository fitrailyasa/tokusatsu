<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VideoComment extends Model
{
    use HasFactory;

    protected $connection;
    protected $table = 'video_comments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'video_id',
        'user_id',
        'message',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
