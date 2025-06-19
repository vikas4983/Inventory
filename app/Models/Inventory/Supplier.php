<?php

namespace App\Models\inventory;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name', 'email', 'phone','address','is_active'];
    public function scopeActive($query)
    {
        return $query;
    }
}
