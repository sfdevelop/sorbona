<?php

namespace App\Http\Controllers\Admin\Single;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\Single\AboutMainRequest;
use App\Http\Requests\Single\OffertaRequest;
use App\Http\Requests\Single\OptionMainPageRequest;
use App\Http\Requests\Single\ReturnRequest;
use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OptionMainPageController extends BaseAdminController
{
    protected object $page;

    public function __construct(
        public string $nameImageCollection = 'optionMain'
    ) {
        $this->page = Page::query()->find(4);
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
        return view('admin.optionMain.update', ['item' => $this->page, 'title' => 'Edit optionMain']);
    }

    /**
     * Update the resource in storage.
     */
    public function update(OptionMainPageRequest $request): RedirectResponse
    {
        return $this->baseSingleUpdate($request, $this->page, 'optionMain');
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
