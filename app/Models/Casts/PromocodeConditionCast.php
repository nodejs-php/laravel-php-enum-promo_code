<?php

namespace App\Models\Casts;

use App\ValueObject\PromocodeCondition;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class PromocodeConditionCast implements CastsAttributes
{
    /**
     * @param string $value
     */
    public function get($model, string $key, $value, array $attributes)
    {
        return PromocodeCondition::fromArray(json_decode($value, true));
    }

    /**
     * @param PromocodeCondition $value
     */
    public function set( $model, string $key, $value, array $attributes)
    {
        return json_encode($value->toArray());
    }
}
