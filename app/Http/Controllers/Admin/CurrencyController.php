<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;
use App\Models\Currency;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CurrencyController extends BaseAdminController
{
    public static string $model = 'currency';

    public function __construct(
        public string $nameImageCollection = 'currency'
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = Currency::query()->oldest('id')->paginate();

        $title = 'currency';

        return view('admin.'.self::$model.'.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Currency $currency): View
    {
        $title = 'Create currency';

        return view('admin.'.self::$model.'.create', compact('title'))
            ->with(['item' => $currency]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCurrencyRequest $request, Currency $currency): RedirectResponse
    {
        return $this->baseStore($request, $currency, self::$model);
    }

    /**
     * Display the specified resource.
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Currency $currency): View
    {
        return view('admin.'.self::$model.'.update', ['item' => $currency, 'title' => 'Update currency']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCurrencyRequest $request, Currency $currency): RedirectResponse
    {
        return $this->baseUpdate($request, $currency, self::$model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Currency $currency): RedirectResponse
    {
        return $this->baseDestroy($currency);
    }
}
