<?php

namespace App\Services;

use App\Models\Inventory\Category;
use App\Models\Inventory\Brand;
use App\Models\Inventory\Customer;
use App\Models\Inventory\Product;
use App\Models\Inventory\Purchase;
use App\Models\Inventory\Sale;
use App\Models\Inventory\Status;
use App\Models\Inventory\Supplier;
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
            'purchases' => Purchase::class,
            'products' => Product::class,
            'customers' => Customer::class,
            'sales' => Sale::class,
            
        ];
        $data = [];
        foreach ($models as $key => $model) {
            $data[$key] =  $model::query()->where('is_active', 1)->get();
        }
        return $data;
    }
}
