<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Models\Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StatusController extends BaseAdminController
{

     public static string $model = 'status';

     public function __construct(
     )
     {
     }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = Status::query()->withTranslation()->oldest('id')->paginate();

        $title = 'status';

        return view('admin.' . self::$model . '.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Status $status): View
    {
        $title = 'Create status';

        return view('admin.' . self::$model . '.create', compact('title'))
            ->with(['item' => $status]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStatusRequest $request, Status $status): RedirectResponse
    {
       return $this->baseStore($request, $status, self::$model);
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status): View
    {
      return view('admin.' . self::$model . '.update', ['item' => $status, 'title' => 'Update status']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatusRequest $request, Status $status): RedirectResponse
    {
        return $this->baseUpdate($request, $status, self::$model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status): RedirectResponse
    {
        return $this->baseDestroy($status);
    }
}
