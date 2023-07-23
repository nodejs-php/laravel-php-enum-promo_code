<?php

namespace App\ValueObject;

class Discount
{
    public function __construct(
        public readonly float $price,
        public readonly float $value,
    )
    {
    }
}
