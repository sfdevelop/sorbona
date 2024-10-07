<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Models\Feedback;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FeedbackController extends BaseAdminController
{
    public static string $model = 'feedback';

    public function __construct(
        public string $nameImageCollection = 'feedback'
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = Feedback::query()->latest('id')->paginate();

        $title = 'feedback';

        return view('admin.'.self::$model.'.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Feedback $feedback): View
    {
        $title = 'Create feedback';

        return view('admin.'.self::$model.'.create', compact('title'))
            ->with(['item' => $feedback]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeedbackRequest $request, Feedback $feedback): RedirectResponse
    {
        return $this->baseStore($request, $feedback, self::$model);
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        $feedback->is_new = false;
        $feedback->save();

        return view('admin.'.self::$model.'.show', ['item' => $feedback, 'title' => 'Show Feedback']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback): View
    {
        return view('admin.'.self::$model.'.update', ['item' => $feedback, 'title' => 'Update feedback']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeedbackRequest $request, Feedback $feedback): RedirectResponse
    {
        return $this->baseUpdate($request, $feedback, self::$model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback): RedirectResponse
    {
        return $this->baseDestroy($feedback);
    }
}
