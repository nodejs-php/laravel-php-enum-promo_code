<?php

namespace App\Models;

use App\ValueObject\Discount;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function updateDiscount(Discount $discount, Promocode $promocode): void
    {
        $this->total_price = $discount->total_price;
        $this->discount_price = $discount->discount;
        $this->promocode_id = $promocode->id;

        $this->save();
    }
}
