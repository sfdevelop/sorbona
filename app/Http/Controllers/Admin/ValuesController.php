<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreValuesRequest;
use App\Http\Requests\UpdateValuesRequest;
use App\Models\Values;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ValuesController extends BaseAdminController
{
    public static string $model = 'values';

    public function __construct(
        public string $nameImageCollection = 'values'
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = Values::query()->withTranslation()->oldest('sort')->paginate();

        $title = 'values';

        return view('admin.'.self::$model.'.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Values $values): View
    {
        $title = 'Create values';

        return view('admin.'.self::$model.'.create', compact('title'))
            ->with(['item' => $values]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreValuesRequest $request, Values $values): RedirectResponse
    {
        return $this->baseStore($request, $values, self::$model);
    }

    /**
     * Display the specified resource.
     */
    public function show(Values $values)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Values $values, Request $request, $id): View
    {
        $values = Values::find($id);

        return view('admin.'.self::$model.'.update', ['item' => $values, 'title' => 'Update values']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateValuesRequest $request, Values $values, $id): RedirectResponse
    {
        $values = Values::find($id);

        return $this->baseUpdate($request, $values, self::$model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Values $values, Request $request, $id): RedirectResponse
    {
        $values = Values::find($id);

        return $this->baseDestroy($values);
    }
}
