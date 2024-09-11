<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getIsActiveAttribute($is_active)
    {
        return $is_active == 1 ? 'is_active' : ' isnt_active';
    }

    public function getSalePriceAttribute()
    {
        return $this->variations()->where('quantity', '>',0)->first() ?? 0;
    }

    public function scopSearch($query)
    {
        $keyword=request()->search;
        if(request()->has('search') && trim($keyword) != ''){
            $query-> where('name' , 'LIKE' , '%'.$keyword.'%');
        }

        return $query;
    }

}
