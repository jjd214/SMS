<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;

    protected $fillable = ['name', 'phone', 'email', 'address'];

    public function sale()
    {
        return $this->hasMany(Sale::class);
    }

    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%$value%")
            ->orWhere('email', 'like', "%$value%");
    }
}