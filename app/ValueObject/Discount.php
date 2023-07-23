<?php

namespace App\ValueObject;

class Discount
{
    public function __construct(
        public readonly float $total_price,
        public readonly float $discount,
    )
    {
    }
}
