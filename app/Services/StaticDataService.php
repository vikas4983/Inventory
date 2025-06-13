<?php

namespace App\Services;

use App\Models\Inventory\Category;
use App\Models\Inventory\Brand;
use Illuminate\Support\Facades\Cache;

class StaticDataService
{
    public function staticData()
    {
        $models = [
            'categories' => Category::class,
            'brands' => Brand::class,
        ];
        $data = [];
        foreach ($models as $key => $model) {
            $data[$key] =  $model::query()->get();
        }
        return $data;
    }
}
