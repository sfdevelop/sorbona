<?php

namespace App\Http\Controllers\Admin\Single;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\Single\AboutPageRequest;
use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AboutPageController extends BaseAdminController
{
    protected object $page;

    public function __construct(
        public string $nameImageCollection = 'aboutPagePhoto'
    ) {
        $this->page = Page::query()->find(2);
    }

    /**
     * Show the form for creating the resource.
     */
    public function create(): never
    {
        abort(404);
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request): never
    {
        abort(404);
    }

    /**
     * Display the resource.
     */
    public function show()
    {
        //
    }

    /**
     * @return View
     */
    public function edit(): View
    {
        return view('admin.pageAbout.update', ['item' => $this->page, 'title' => 'Edit mainAbout']);
    }

    /**
     * Update the resource in storage.
     */
    public function update(AboutPageRequest $request): RedirectResponse
    {
        if ($request->safe(['file'])) {
            $this->page->clearMediaCollection($this->nameImageCollection);
        }

        return $this->baseSingleUpdate($request, $this->page, 'pageAbout');
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
