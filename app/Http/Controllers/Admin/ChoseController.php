<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreChoseRequest;
use App\Http\Requests\UpdateChoseRequest;
use App\Models\Chose;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ChoseController extends BaseAdminController
{
    public static string $model = 'chose';

    public function __construct(
        public string $nameImageCollection = 'chose'
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = Chose::query()->withTranslation()->oldest('sort')->paginate();

        $title = 'chose';

        return view('admin.'.self::$model.'.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Chose $chose): View
    {
        $title = 'Create chose';

        return view('admin.'.self::$model.'.create', compact('title'))
            ->with(['item' => $chose]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChoseRequest $request, Chose $chose): RedirectResponse
    {
        return $this->baseStore($request, $chose, self::$model);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chose $chose)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chose $chose): View
    {
        return view('admin.'.self::$model.'.update', ['item' => $chose, 'title' => 'Update chose']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChoseRequest $request, Chose $chose): RedirectResponse
    {
        return $this->baseUpdate($request, $chose, self::$model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chose $chose): RedirectResponse
    {
        return $this->baseDestroy($chose);
    }
}
