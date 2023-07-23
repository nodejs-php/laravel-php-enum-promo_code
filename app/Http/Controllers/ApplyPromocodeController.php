<?php

namespace App\Http\Controllers;

use App\Exceptions\ApplyPromocodeException;
use App\Models\Order;
use App\Models\Promocode;
use Symfony\Component\HttpFoundation\Response;

class ApplyPromocodeController extends Controller
{
    public function __invoke(Order $order, Promocode $promocode, ApplyPromocodeException $applyPromocode)
    {
        try {
            $applyPromocode->execute($promocode, $order);
        } catch (ApplyPromocodeException) {
            abort(Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
