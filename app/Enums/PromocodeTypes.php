<?php

namespace App\Enums;

use App\Models\Promocode;
use App\PromocodeType\PromocodeType;

enum PromocodeTypes: string
{
    case Percentage = 'percentage';
    case FixAmount = 'fix_amount';

    public function createCouponType(Promocode $promocode): PromocodeType
    {
        return match ($this) {
            self::FixAmount => new Amount($promocode),
            self::Percentage => new Percentage($promocode),
        };
    }
}
