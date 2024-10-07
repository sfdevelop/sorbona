<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;
use App\Models\Color;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ColorController extends BaseAdminController
{
    public static string $model = 'color';

    public function __construct(
        public string $nameImageCollection = 'color'
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = Color::query()->withTranslation()->oldest('id')->paginate();

        $title = 'color';

        return view('admin.'.self::$model.'.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Color $color): View
    {
        $title = 'Create color';

        return view('admin.'.self::$model.'.create', compact('title'))
            ->with(['item' => $color]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreColorRequest $request, Color $color): RedirectResponse
    {
        return $this->baseStore($request, $color, self::$model);
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color): View
    {
        return view('admin.'.self::$model.'.update', ['item' => $color, 'title' => 'Update color']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateColorRequest $request, Color $color): RedirectResponse
    {
        return $this->baseUpdate($request, $color, self::$model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color): RedirectResponse
    {
        return $this->baseDestroy($color);
    }
}
