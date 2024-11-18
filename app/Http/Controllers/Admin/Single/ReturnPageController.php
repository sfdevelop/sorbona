<?php

namespace App\Http\Controllers\Admin\Single;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\Single\ReturnRequest;
use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReturnPageController extends BaseAdminController
{
    protected object $page;

    public function __construct(
        public string $nameImageCollection = 'return'
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
        return view('admin.return.update', ['item' => $this->page, 'title' => 'Edit return']);
    }

    /**
     * Update the resource in storage.
     */
    public function update(ReturnRequest $request): RedirectResponse
    {
        return $this->baseSingleUpdate($request, $this->page, 'return');
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
