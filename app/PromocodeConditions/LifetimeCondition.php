<?php

namespace App\PromocodeConditions;

use App\Exceptions\ApplyPromocodeException;
use App\Models\Order;

class LifetimeCondition extends PromocodeCondition
{
    public function check(Order $order): void
    {
        $lifetime = $order->user->orders->sum('total_price');

        if ($lifetime < $this->promocode->condition->value) {
            throw ApplyPromocodeException::because(
                "Истекло время {$this->promocode->condition->value}"
            );
        }
    }
}
