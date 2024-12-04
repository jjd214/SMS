<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = ['category_id', 'supplier_id', 'name', 'description', 'price', 'cost_price', 'qty', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function sale_detail()
    {
        return $this->hasMany(SaleDetail::class);
    }

    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%$value%")
            ->orWhere('category_id', $value);
    }

    public function image()
    {
        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }

        return $this->image
            ? asset('images/products/' . $this->image)
            : asset('images/default-img.png');
    }
}
