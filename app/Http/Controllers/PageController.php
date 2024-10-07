<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PageController extends BaseAdminController
{
    public static string $model = 'page';

    public function __construct(
        public string $nameImageCollection = 'page'
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = Page::query()->withTranslation()->oldest('id')->paginate();

        $title = 'page';

        return view('admin.'.self::$model.'.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Page $page): View
    {
        $title = 'Create page';

        return view('admin.'.self::$model.'.create', compact('title'))
            ->with(['item' => $page]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePageRequest $request, Page $page): RedirectResponse
    {
        return $this->baseStore($request, $page, self::$model);
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page): View
    {
        return view('admin.'.self::$model.'.update', ['item' => $page, 'title' => 'Update page']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePageRequest $request, Page $page): RedirectResponse
    {
        return $this->baseUpdate($request, $page, self::$model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page): RedirectResponse
    {
        return $this->baseDestroy($page);
    }
}
