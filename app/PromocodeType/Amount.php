<?php

namespace App\PromocodeType;

use App\Models\Order;
use App\ValueObject\Discount;

class Amount extends PromocodeType
{
    public function getDiscount(Order $order): Discount
    {
        $discountValue = min($this->promocode->discount, $order->total_price);
        $discountedPrice = $order->total_price - $discountValue;

        return new Discount($discountedPrice, $discountValue);
    }
}
