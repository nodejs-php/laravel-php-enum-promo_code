<?php

namespace App\PromocodeConditions;

use App\Models\Order;
use App\Models\Promocode;

abstract class PromocodeCondition
{
    public function __construct(public readonly Promocode $promocode)
    {
    }

    abstract public function check(Order $order): void;
}
