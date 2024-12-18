<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /** @use HasFactory<\Database\Factories\SaleFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'customer_id', 'total_amount', 'amount_paid', 'change_due'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sale_detail()
    {
        return $this->hasOne(SaleDetail::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

    public function product()
    {
        return $this->hasOneThrough(
            Product::class,
            SaleDetail::class,
            'sale_id',           // Foreign key on `sale_details` table
            'id',                // Foreign key on `products` table
            'id',                // Local key on `sales` table
            'product_id'         // Local key on `sale_details` table
        );
    }
}
