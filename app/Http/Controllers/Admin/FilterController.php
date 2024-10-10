<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreFilterRequest;
use App\Http\Requests\UpdateFilterRequest;
use App\Models\Filter;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FilterController extends BaseAdminController
{

     public static string $model = 'filter';

     public function __construct(
         public string $nameImageCollection = 'filter'
     )
     {
     }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = Filter::query()->withTranslation()->oldest('sort')->paginate();

        $title = 'filter';

        return view('admin.' . self::$model . '.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Filter $filter): View
    {
        $title = 'Create filter';

        return view('admin.' . self::$model . '.create', compact('title'))
            ->with(['item' => $filter]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFilterRequest $request, Filter $filter): RedirectResponse
    {
       return $this->baseStore($request, $filter, self::$model);
    }

    /**
     * Display the specified resource.
     */
    public function show(Filter $filter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filter $filter): View
    {
      return view('admin.' . self::$model . '.update', ['item' => $filter, 'title' => 'Update filter']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFilterRequest $request, Filter $filter): RedirectResponse
    {
        return $this->baseUpdate($request, $filter, self::$model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filter $filter): RedirectResponse
    {
        return $this->baseDestroy($filter);
    }
}
