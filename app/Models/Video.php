<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use App\Models\Traits\VideoLinkTrait;
use Illuminate\Support\Facades\DB;

class Video extends Model
{
    use HasFactory, SoftDeletes, VideoLinkTrait;

    protected $connection;
    protected $table = 'videos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'title',
        'slug',
        'type',
        'number',
        'link',
        'airdate',
        'category_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'link' => 'array',
        'airdate' => 'date',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->connection = env('DB_CONTENT_CONNECTION');
    }

    public static function booted()
    {
        static::saving(function ($video) {

            if ($video->category_id) {
                $category = $video->category()->first();

                if ($category && $category->fullname) {
                    $video->slug = Str::slug(
                        "{$category->fullname} {$video->type} {$video->number}"
                    );
                }
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function video_reports()
    {
        return $this->hasMany(VideoReport::class);
    }

    public function getCategoryColor(): string
    {
        $colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark'];

        $name = $this->category->name ?? null;
        if (!$name) return 'secondary';

        $hash = crc32($name);
        return $colors[$hash % count($colors)];
    }

    public function getLabelAttribute(): string
    {
        $types = [
            'episode' => 'Episode',
            'special' => 'Special',
            'movie' => 'Movie',
            'hyper-battle-dvd' => 'Hyper Battle DVD',
            'spin-off' => 'Spin-Off',
            'v-cinema' => 'V-Cinema',
            'mini-series' => 'Mini Series',
            'stageshow' => 'Stage Show',
            'manga' => 'Manga',
            'novel' => 'Novel',
            'hero-saga' => 'Hero Saga',
            'audio-drama' => 'Audio Drama',
            'net-movie' => 'Net Movie',
            'video-game' => 'Video Game',
            'other' => 'Other',
        ];

        return $types[$this->type] ?? str_replace('-', ' ', ucwords($this->type));
    }

    public function scopeEmptyLink($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('link')
                ->orWhere('link', '')
                ->orWhere('link', '[]')
                ->orWhere('link', '[null]');
        });
    }

    public function scopeEmptyLinkPerCategory($query)
    {
        return $query
            ->select('category_id', DB::raw('COUNT(*) as total'))
            ->emptyLink()
            ->groupBy('category_id')
            ->with('category');
    }

    public function watchUrl()
    {
        return route('video.watch', [
            $this->category->franchise->slug,
            $this->category->slug,
            $this->type,
            $this->number
        ]);
    }
}
