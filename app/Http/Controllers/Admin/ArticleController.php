<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ArticleController extends BaseAdminController
{
    public static string $model = 'article';

    public function __construct(
        public string $nameImageCollection = 'article'
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = Article::query()->withTranslation()->oldest('sort')->paginate();

        $title = 'article';

        return view('admin.'.self::$model.'.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Article $article): View
    {
        $title = 'Create article';

        return view('admin.'.self::$model.'.create', compact('title'))
            ->with(['item' => $article]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request, Article $article): RedirectResponse
    {
        return $this->baseStore($request, $article, self::$model);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article): View
    {
        return view('admin.'.self::$model.'.update', ['item' => $article, 'title' => 'Update article']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article): RedirectResponse
    {
        return $this->baseUpdate($request, $article, self::$model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article): RedirectResponse
    {
        return $this->baseDestroy($article);
    }
}
