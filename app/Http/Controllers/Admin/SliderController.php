<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Models\Slider;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SliderController extends BaseAdminController
{
    public static string $model = 'slider';

    public function __construct(
        public string $nameImageCollection = 'slider'
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = Slider::query()->withTranslation()->oldest('sort')->paginate();

        $title = 'slider';

        return view('admin.'.self::$model.'.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Slider $slider): View
    {
        $title = 'Create slider';

        return view('admin.'.self::$model.'.create', compact('title'))
            ->with(['item' => $slider]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSliderRequest $request, Slider $slider): RedirectResponse
    {
        return $this->baseStore($request, $slider, self::$model);
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider): View
    {
        return view('admin.'.self::$model.'.update', ['item' => $slider, 'title' => 'Update slider']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSliderRequest $request, Slider $slider): RedirectResponse
    {
        return $this->baseUpdate($request, $slider, self::$model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider): RedirectResponse
    {
        return $this->baseDestroy($slider);
    }
}
