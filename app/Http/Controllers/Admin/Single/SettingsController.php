<?php

namespace App\Http\Controllers\Admin\Single;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\Single\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingsController extends BaseAdminController
{
    protected object $page;

    public function __construct(
    ) {
        $this->page = Setting::query()->find(1);
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
        return view('admin.settings.update', ['item' => $this->page, 'title' => 'Edit setting']);
    }

    /**
     * Update the resource in storage.
     */
    public function update(UpdateSettingRequest $request): RedirectResponse
    {
        return $this->baseSingleUpdate($request, $this->page, 'setting');
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
