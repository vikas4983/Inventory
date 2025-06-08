<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'is_active'];


    public function scopeActive($query)
    {
        return $query;
       
    }
    public function scopeId($query,$id)
    {
        return $query->where('id',$id);
       
    }
}
