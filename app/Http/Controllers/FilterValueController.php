<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\StoreFilterValueRequest;
use App\Http\Requests\UpdateFilterValueRequest;
use App\Models\FilterValue;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FilterValueController extends BaseAdminController
{

     public static string $model = 'filterValue';

     public function __construct(
         public string $nameImageCollection = 'filterValue'
     )
     {
     }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = FilterValue::query()->withTranslation()->oldest('id')->paginate();

        $title = 'filterValue';

        return view('admin.' . self::$model . '.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(FilterValue $filterValue): View
    {
        $title = 'Create filterValue';

        return view('admin.' . self::$model . '.create', compact('title'))
            ->with(['item' => $filterValue]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFilterValueRequest $request, FilterValue $filterValue): RedirectResponse
    {
       return $this->baseStore($request, $filterValue, self::$model);
    }

    /**
     * Display the specified resource.
     */
    public function show(FilterValue $filterValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FilterValue $filterValue): View
    {
      return view('admin.' . self::$model . '.update', ['item' => $filterValue, 'title' => 'Update filterValue']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFilterValueRequest $request, FilterValue $filterValue): RedirectResponse
    {
        return $this->baseUpdate($request, $filterValue, self::$model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FilterValue $filterValue): RedirectResponse
    {
        return $this->baseDestroy($filterValue);
    }
}
