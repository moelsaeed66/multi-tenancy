<?php

namespace App\Models;

use App\Traits\BelongsToActiveStore;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory ;
    protected $connection='tenant';
    protected $fillable=['name','price'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
