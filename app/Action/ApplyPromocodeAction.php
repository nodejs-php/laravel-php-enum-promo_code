<?php

namespace App\Action;

use App\Exceptions\ApplyPromocodeException;
use App\Models\Order;
use App\Models\Promocode;

class ApplyPromocodeAction
{
    public function execute(Promocode $promocode, Order $order): Order
    {
        if ($promocode->expires_at->isPast()) {
            throw ApplyPromocodeException::because('Истек срок давности промо-кода');
        }

        if (!$promocode->active) {
            throw ApplyPromocodeException::because('Неактивный промокод');
        }

        $condition = $promocode->condition->type->createPromocodeCondition($promocode);
        $condition->check($order);

        $discount = $promocode->type->createPromocodeType($promocode)->getDiscount($order);

        $order->updateDiscount($discount, $promocode);

        $promocode->disable();

        return $order;
    }
}
