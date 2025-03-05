<?php

namespace App\Http\Controllers\Admin;

use App\Http\Filters\CategoryFilter;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends BaseAdminController
{
    public static string $model = 'category';

    public function __construct(
        public string $nameImageCollection = 'category',
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $items = Category::query()
            ->Filter($this->filterAble($request->all(), CategoryFilter::class))
            ->whereNull('category_id')
            ->withCount(['childrenCategories', 'products'])
            ->with([
                'childrenCategories' => function ($query) {
                    $query->withCount('products');
                }, 'childrenCategories.childrenCategories' => function ($query,
                ) {
                    $query->withCount('products');
                },
            ])
            ->withTranslation()
            ->oldest('sort')
            ->paginate();

        $title = 'category';

        if (! empty($request->title)) {
            $items = Category::query()
                ->Filter($this->filterAble($request->all(), CategoryFilter::class))
                ->withCount(['childrenCategories', 'products'])
                ->withTranslation()
                ->oldest('sort')
                ->paginate();

            return view('admin.category.index_filter',
                compact('title', 'items'));
        }

        return view('admin.'.self::$model.'.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $category): View
    {
        $title = 'Create category';

        return view('admin.'.self::$model.'.create', compact('title'))
            ->with(['item' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StoreCategoryRequest $request,
        Category $category,
    ): RedirectResponse {
        return $this->baseStore($request, $category, self::$model);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        return view('admin.'.self::$model.'.update',
            ['item' => $category, 'title' => 'Update category']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateCategoryRequest $request,
        Category $category,
    ): RedirectResponse {
        return $this->baseUpdate($request, $category, self::$model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        if ($category->childrenCategories->count() > 0) {
            return back()->withErrors(['error' => __('admin.cannot_delete_with_children')]);
        }

        return $this->baseDestroy($category);
    }
}
