<?php

namespace App\Services;

use App\Models\Inventory\Category;
use App\Models\Inventory\Brand;
use App\Models\Inventory\Status;
use App\Models\inventory\Supplier;
use Illuminate\Support\Facades\Cache;

class StaticDataService
{
    public function staticData()
    {
        $models = [
            'categories' => Category::class,
            'brands' => Brand::class,
            'suppliers' => Supplier::class,
            'statuses' => Status::class,
        ];
        $data = [];
        foreach ($models as $key => $model) {
            $data[$key] =  $model::query()->where('is_active', 1)->get();
        }
        return $data;
    }
}
