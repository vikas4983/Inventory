<?php

namespace App\Services;

use App\Models\Inventory\Brand;
use App\Models\Inventory\Category;
use App\Models\Inventory\Customer;
use App\Models\Inventory\Product;
use App\Models\Inventory\Purchase;
use App\Models\Inventory\PurchaseItem;
use App\Models\Inventory\Sale;
use App\Models\Inventory\SaleItem;
use App\Models\Inventory\Status;
use App\Models\Inventory\Supplier;
use Illuminate\Support\Facades\Cache as FacadesCache;

class ModelCountService
{
    public function modelCount()
    {
        return FacadesCache::remember('model_counts', now()->addSeconds(1), function () {
            $models = [
                'Categories'     => Category::query(),
                'Brands'         => Brand::query(),
                'Products'       => Product::query(),
                'Suppliers'      => Supplier::query(),
                'Customers'      => Customer::query(),
                'Statuses'        => Status::query(),
                'Purchases'      => Purchase::query(),
                'PurchaseItems'  => PurchaseItem::query(),
                'Sales'          => Sale::query(),
                'SaleItems'      => SaleItem::query(),
            ];

            $counts = [];
            foreach ($models as $name => $query) {
                $counts[$name] = $query->where('is_active', 1)->count();
            }

            return $counts;
        });
    }
}
