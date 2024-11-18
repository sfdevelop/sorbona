<?php

namespace App\Http\Controllers\Admin;

use App\Http\Filters\ProductFilter;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends BaseAdminController
{
    public static string $model = 'product';

    public function __construct(
        public string $nameImageCollection = 'product',
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $items = Product::query()
            ->Filter($this->filterAble($request->all(), ProductFilter::class))
            ->withTranslation()
            ->with(['currency', 'category'])
            ->latest('id')
            ->paginate();

        $title = 'product';

        return view('admin.'.self::$model.'.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product): View
    {
        $title = 'Create product';

        return view('admin.'.self::$model.'.create', compact('title'))
            ->with(['item' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request, Product $product): RedirectResponse
    {
        return $this->baseStore($request, $product, self::$model);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('admin.'.self::$model.'.update',
            ['item' => $product, 'title' => 'Update product']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        return $this->baseUpdate($request, $product, self::$model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        return $this->baseDestroy($product);
    }
}
