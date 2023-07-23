<?php

namespace App\PromocodeConditions;

use App\Exceptions\ApplyPromocodeException;
use App\Models\Order;

class PriceCondition extends PromocodeCondition
{
    public function check(Order $order): void
    {
        if ($order->total_price < $this->promocode->condition->value) {
            throw ApplyPromocodeException::because(
                "Превышена предельно допустимая сумма {$this->promocode->condition->value}"
            );
        }
    }
}
