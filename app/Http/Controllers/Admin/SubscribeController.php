<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreSubscribeRequest;
use App\Http\Requests\UpdateSubscribeRequest;
use App\Models\Subscribe;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SubscribeController extends BaseAdminController
{
    public static string $model = 'subscribe';

    public function __construct(
        public string $nameImageCollection = 'subscribe'
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = Subscribe::query()->latest('id')->paginate();

        $title = 'subscribe';

        return view('admin.'.self::$model.'.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Subscribe $subscribe): View
    {
        $title = 'Create subscribe';

        return view('admin.'.self::$model.'.create', compact('title'))
            ->with(['item' => $subscribe]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubscribeRequest $request, Subscribe $subscribe): RedirectResponse
    {
        return $this->baseStore($request, $subscribe, self::$model);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscribe $subscribe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscribe $subscribe): View
    {
        return view('admin.'.self::$model.'.update', ['item' => $subscribe, 'title' => 'Update subscribe']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubscribeRequest $request, Subscribe $subscribe): RedirectResponse
    {
        return $this->baseUpdate($request, $subscribe, self::$model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscribe $subscribe): RedirectResponse
    {
        return $this->baseDestroy($subscribe);
    }
}
