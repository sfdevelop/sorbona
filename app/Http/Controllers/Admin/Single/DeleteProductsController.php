<?php

namespace App\Http\Controllers\Admin\Single;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\Single\UpdateSettingRequest;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Contracts\View\View;
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
