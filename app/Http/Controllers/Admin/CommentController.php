<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CommentController extends BaseAdminController
{
    public static string $model = 'comment';

    public function __construct(
        public string $nameImageCollection = 'comment'
    ) {
        //        $this->authorizeResource(Comment::class, 'comment');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = Comment::query()->latest('id')->paginate(40);

        $title = 'comment';

        return view('admin.'.self::$model.'.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Comment $comment): View
    {
        $title = 'Create comment';

        return view('admin.'.self::$model.'.create', compact('title'))
            ->with(['item' => $comment]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, Comment $comment): RedirectResponse
    {
        return $this->baseStore($request, $comment, self::$model);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment): View
    {
        return view('admin.'.self::$model.'.update', ['item' => $comment, 'title' => 'Update comment']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment): RedirectResponse
    {
        return $this->baseUpdate($request, $comment, self::$model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        return $this->baseDestroy($comment);
    }
}
