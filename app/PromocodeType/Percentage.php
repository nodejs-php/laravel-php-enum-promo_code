<?php

namespace App\PromocodeType;

use App\Models\Order;
use App\ValueObject\Discount;

class Percentage extends PromocodeType
{
    public function getDiscount(Order $order): Discount
    {
        $discountValue = $order->total_price * $this->promocode->discount;
        $discountedPrice = $order->total_price - $discountValue;

        return new Discount($discountedPrice, $discountValue);
    }
}
