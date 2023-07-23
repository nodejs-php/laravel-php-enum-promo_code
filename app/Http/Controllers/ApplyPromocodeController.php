<?php

namespace App\Http\Controllers;

use App\Action\ApplyPromocodeAction;
use App\Exceptions\ApplyPromocodeException;
use App\Models\Order;
use App\Models\Promocode;
use Symfony\Component\HttpFoundation\Response;

class ApplyPromocodeController extends Controller
{
    public function __invoke(Order $order, Promocode $promocode, ApplyPromocodeAction $applyPromocode)
    {
        try {
            $applyPromocode->execute($promocode, $order);
            return 'success';
        } catch (ApplyPromocodeException) {
            abort(Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
