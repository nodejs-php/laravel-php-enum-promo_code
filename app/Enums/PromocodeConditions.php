<?php

namespace App\Enums;


use App\Models\Promocode;
use App\PromocodeConditions\PromocodeCondition;

enum PromocodeConditions: string
{
    case Price = 'price';
    case Lifetime = 'lifetime';

    public function createPromocodeCondition(Promocode $promocode): PromocodeCondition
    {
        return match ($this) {
            self::Price => new PriceCondition($promocode),
            self::Lifetime => new LifetimeCondition($promocode),
        };
    }
}
