<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreBenefitRequest;
use App\Http\Requests\UpdateBenefitRequest;
use App\Models\Benefit;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BenefitController extends BaseAdminController
{

     public static string $model = 'benefit';

     public function __construct(
         public string $nameImageCollection = 'benefit'
     )
     {
     }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = Benefit::query()->withTranslation()->oldest('sort')->paginate();

        $title = 'benefit';

        return view('admin.' . self::$model . '.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Benefit $benefit): View
    {
        $title = 'Create benefit';

        return view('admin.' . self::$model . '.create', compact('title'))
            ->with(['item' => $benefit]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBenefitRequest $request, Benefit $benefit): RedirectResponse
    {
       return $this->baseStore($request, $benefit, self::$model);
    }

    /**
     * Display the specified resource.
     */
    public function show(Benefit $benefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Benefit $benefit): View
    {
      return view('admin.' . self::$model . '.update', ['item' => $benefit, 'title' => 'Update benefit']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBenefitRequest $request, Benefit $benefit): RedirectResponse
    {
        return $this->baseUpdate($request, $benefit, self::$model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Benefit $benefit): RedirectResponse
    {
        return $this->baseDestroy($benefit);
    }
}
