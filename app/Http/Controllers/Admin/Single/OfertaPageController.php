<?php

namespace App\Http\Controllers\Admin\Single;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\Single\OffertaRequest;
use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OfertaPageController extends BaseAdminController
{
    protected object $page;

    public function __construct(
        public string $nameImageCollection = 'offerta'
    ) {
        $this->page = Page::query()->find(3);
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
        return view('admin.offerta.update', ['item' => $this->page, 'title' => 'Edit offerta']);
    }

    /**
     * Update the resource in storage.
     */
    public function update(OffertaRequest $request): RedirectResponse
    {
        return $this->baseSingleUpdate($request, $this->page, 'offerta');
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
