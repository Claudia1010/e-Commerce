<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
     public function payment_methods()
    {
        return $this->belongsTo(Payment_method::class);
    }

    public function carriers()
    {
        return $this->belongsTo(Carrier::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
