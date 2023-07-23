<?php

namespace App\Enums;

use App\Models\Promocode;
use App\PromocodeType\PromocodeType;
use App\PromocodeType\Amount;
use App\PromocodeType\Percentage;

enum PromocodeTypes: string
{
    case Percentage = 'percentage';
    case FixAmount = 'fix_amount';

    public function createPromocodeType(Promocode $promocode): PromocodeType
    {
        return match ($this) {
            self::FixAmount => new Amount($promocode),
            self::Percentage => new Percentage($promocode),
        };
    }
}
