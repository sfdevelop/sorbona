<?php

namespace App\Http\Controllers\Admin\Single;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DeleteProductsController extends BaseAdminController
{
    public function __invoke(Request $request): RedirectResponse
    {
        if ($request->has('product_ids')) {
            $productIds = $request->input('product_ids');
            Product::query()->whereIn('id', $productIds)->delete();

            return back()->with('success', __('admin.delete_success'));
        }

        return back()->with('warning', __('admin.delete_warning'));
    }
}
