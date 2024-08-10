<?php

namespace App\Traits;

use App\Models\Store;

trait BelongsToActiveStore
{
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    public static function bootBelongsToActiveStore()
    {
        static::addGlobalScope('store',function ($query){
            $store=app()->make('store_active');
            $query->where('store_id',$store->id);
        });
    }

}
