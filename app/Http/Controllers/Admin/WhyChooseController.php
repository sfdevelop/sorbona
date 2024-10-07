<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreWhyChooseRequest;
use App\Http\Requests\UpdateWhyChooseRequest;
use App\Models\WhyChoose;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class WhyChooseController extends BaseAdminController
{
    public static string $model = 'whyChoose';

    public function __construct(
        public string $nameImageCollection = 'whyChoose'
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = WhyChoose::query()->withTranslation()->oldest('sort')->paginate();

        $title = 'whyChoose';

        return view('admin.'.self::$model.'.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(WhyChoose $whyChoose): View
    {
        $title = 'Create whyChoose';

        return view('admin.'.self::$model.'.create', compact('title'))
            ->with(['item' => $whyChoose]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWhyChooseRequest $request, WhyChoose $whyChoose): RedirectResponse
    {
        return $this->baseStore($request, $whyChoose, self::$model);
    }

    /**
     * Display the specified resource.
     */
    public function show(WhyChoose $whyChoose)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WhyChoose $whyChoose): View
    {
        return view('admin.'.self::$model.'.update', ['item' => $whyChoose, 'title' => 'Update whyChoose']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWhyChooseRequest $request, WhyChoose $whyChoose): RedirectResponse
    {
        return $this->baseUpdate($request, $whyChoose, self::$model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WhyChoose $whyChoose): RedirectResponse
    {
        return $this->baseDestroy($whyChoose);
    }
}
