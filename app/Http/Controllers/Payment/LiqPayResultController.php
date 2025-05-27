<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Repository\Order\OrderRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Log;

class LiqPayResultController extends Controller
{
    public function __construct(protected OrderRepositoryInterface $orderRepository) {}

    /**
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $data = json_decode(base64_decode($request->data), true);

        if ($data['status'] == 'success') {
            $this->orderRepository->updateStatusPaymentOnSuccess($data['order_id']);

            return redirect()->to(route('cart_thx', $data['order_id'] ));
        }

        $status = $data['status'];
        $err_description = $data['err_description'];
        $data_id = $data['order_id'];

        Log::channel('errors_pay')->error("Status: $status Order_id: $data_id Description: $err_description Data/Time: ".now()->format('d/m/Y H:i'));

        return redirect()->to(route('cart_thx', $data['order_id'] ));
    }
}
