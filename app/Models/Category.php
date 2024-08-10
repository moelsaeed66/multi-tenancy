<?php

namespace App\Models;

use App\Traits\BelongsToActiveStore;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory ,BelongsToActiveStore;
    protected $fillable=['name'];
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
