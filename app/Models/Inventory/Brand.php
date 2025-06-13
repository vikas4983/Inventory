<?php

namespace App\Models\inventory;

use Illuminate\Container\Attributes\Cache;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'slug', 'is_active'];

    public function scopeActive($query)
    {
        return $query;
    }
    public function scopeId($query, $id)
    {
        return $query->where('id', $id);
    }
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($model) {
            Cache::forget('static_data_categories');
            // Cache::forget('static_data_brands'); for Brand model
        });

        static::deleted(function ($model) {
            Cache::forget('static_data_categories');
            // Cache::forget('static_data_brands'); for Brand model
        });
    }
}
