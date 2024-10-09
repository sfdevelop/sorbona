<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreManufacturerRequest;
use App\Http\Requests\UpdateManufacturerRequest;
use App\Models\Manufacturer;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ManufacturerController extends BaseAdminController
{

     public static string $model = 'manufacturer';

     public function __construct(
         public string $nameImageCollection = 'manufacturer'
     )
     {
     }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = Manufacturer::query()->withTranslation()->oldest('sort')->paginate();

        $title = 'manufacturer';

        return view('admin.' . self::$model . '.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Manufacturer $manufacturer): View
    {
        $title = 'Create manufacturer';

        return view('admin.' . self::$model . '.create', compact('title'))
            ->with(['item' => $manufacturer]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreManufacturerRequest $request, Manufacturer $manufacturer): RedirectResponse
    {
       return $this->baseStore($request, $manufacturer, self::$model);
    }

    /**
     * Display the specified resource.
     */
    public function show(Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manufacturer $manufacturer): View
    {
      return view('admin.' . self::$model . '.update', ['item' => $manufacturer, 'title' => 'Update manufacturer']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateManufacturerRequest $request, Manufacturer $manufacturer): RedirectResponse
    {
        return $this->baseUpdate($request, $manufacturer, self::$model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manufacturer $manufacturer): RedirectResponse
    {
        return $this->baseDestroy($manufacturer);
    }
}
