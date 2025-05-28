<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Helpers\TelegramHelper;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $connection;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'slug', 'desc', 'img', 'era_id', 'franchise_id'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected static function boot()
    {
        parent::boot();

        DB::setDefaultConnection(env('DB_CONNECTION'));
        // DB::setDefaultConnection(env('DB2_CONNECTION'));

        static::creating(function ($model) {
            if (empty($model->slug) && !empty($model->name)) {
                $model->slug = Str::slug($model->name, '-');
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('name')) {
                $model->slug = Str::slug($model->name, '-');
            }
        });
    }

    public function datas()
    {
        return $this->hasMany(Data::class);
    }

    public function films()
    {
        return $this->hasMany(Film::class);
    }

    public function era()
    {
        return $this->belongsTo(Era::class, 'era_id', 'id');
    }

    public function franchise()
    {
        return $this->belongsTo(Franchise::class, 'franchise_id', 'id');
    }

    public function getEraColor(): string
    {
        $colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark'];

        $name = $this->era->name ?? null;
        if (!$name) return 'secondary';

        $hash = crc32($name);
        return $colors[$hash % count($colors)];
    }

    public function getFranchiseColor(): string
    {
        $colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark'];

        $name = $this->franchise->name ?? null;
        if (!$name) return 'secondary';

        $hash = crc32($name);
        return $colors[$hash % count($colors)];
    }
}
