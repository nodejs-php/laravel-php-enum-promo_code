<?php

namespace App\PromocodeType;

use App\Models\Order;
use App\Models\Promocode;
use App\ValueObject\Discount;

abstract class PromocodeType
{
    public function __construct(protected readonly Promocode $promocode)
    {
    }

    abstract public function getDiscount(Order $order): Discount;
}
