<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrdersController extends BaseAdminController
{
    public static string $model = 'order';

    public function __construct(
        public string $nameImageCollection = 'order'
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = Order::query()->latest('id')->paginate();

        $title = 'order';

        return view('admin.'.self::$model.'.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Order $order): View
    {
        $title = 'Create order';

        return view('admin.'.self::$model.'.create', compact('title'))
            ->with(['item' => $order]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Order $order): RedirectResponse
    {
        return $this->baseStore($request, $order, self::$model);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $title = 'Show order';

        //        $order->load(['orderStatusCheck', 'orderStatusCheck.status']);

        return view('admin.order.show', compact('order', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order): View
    {
        return view('admin.'.self::$model.'.update', ['item' => $order, 'title' => 'Update order']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order): RedirectResponse
    {
        return $this->baseUpdate($request, $order, self::$model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order): RedirectResponse
    {
        return $this->baseDestroy($order);
    }
}
