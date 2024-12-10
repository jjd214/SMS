<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    /** @use HasFactory<\Database\Factories\SupplierFactory> */
    use HasFactory;

    protected $fillable = ['name', 'contact_person', 'phone', 'email', 'address'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%$value%")
            ->orWhere('contact_person', 'like', "%$value%")
            ->orWhere('phone', $value)
            ->orWhere('email', $value);
    }
}
