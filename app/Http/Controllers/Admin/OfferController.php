<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Models\Offer;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OfferController extends BaseAdminController
{
    public static string $model = 'offer';

    public function __construct(
        public string $nameImageCollection = 'offer'
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = Offer::query()->withTranslation()->oldest('sort')->paginate();

        $title = 'offer';

        return view('admin.'.self::$model.'.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Offer $offer): View
    {
        $title = 'Create offer';

        return view('admin.'.self::$model.'.create', compact('title'))
            ->with(['item' => $offer]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOfferRequest $request, Offer $offer): RedirectResponse
    {
        return $this->baseStore($request, $offer, self::$model);
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer): View
    {
        return view('admin.'.self::$model.'.update', ['item' => $offer, 'title' => 'Update offer']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOfferRequest $request, Offer $offer): RedirectResponse
    {
        return $this->baseUpdate($request, $offer, self::$model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer): RedirectResponse
    {
        return $this->baseDestroy($offer);
    }
}
