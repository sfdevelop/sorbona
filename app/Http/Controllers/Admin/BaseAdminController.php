<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\AdminImagesTraits;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Log;
use SeoCrudFacade;

class BaseAdminController extends Controller
{
    use AdminImagesTraits;

    protected string $nameImageCollection;

    public function baseStore(Request $request, Model $model, string $modelSelf): RedirectResponse
    {
        try {
            $item = $model->create($request->safe()->except('file'));

            $this->handleFilesAndCategories($request, $item);

            SeoCrudFacade::CreateOrUpdateSeoMetadata($request, $item);

            return redirect()->route('admin.'.$modelSelf.'.index')->with([
                'success' => __('admin.success_create', ['title' => $item->title]),
            ]);
        } catch (\Throwable $e) {
            return $this->handleException($e);
        }
    }

    public function baseUpdate(Request $request, Model $model, string $modelSelf): RedirectResponse
    {
        try {
            $model->update($request->safe()->except('file'));

            $this->handleFilesAndCategories($request, $model);

            SeoCrudFacade::CreateOrUpdateSeoMetadata($request, $model);

            return redirect()->route('admin.'.$modelSelf.'.edit', $model)
                ->with(['success' => __('admin.success_update')]);
        } catch (\Throwable $e) {
            return $this->handleException($e);
        }
    }

    public function baseDestroy(Model $model): RedirectResponse
    {
        try {
            $model->delete();

            return back()->with(['success' => __('admin.success_delete')]);
        } catch (\Throwable $e) {
            return $this->handleException($e);
        }
    }

    public function baseSingleUpdate(Request $request, Model $model, string $modelSelf): RedirectResponse
    {
        try {
            if ($request->safe()->all()) {
                $model->update($request->safe()->except('file'));
            }

            $this->handleFilesAndCategories($request, $model);

            SeoCrudFacade::CreateOrUpdateSeoMetadata($request, $model);

            return redirect()->route('admin.'.$modelSelf.'.edit')
                ->with(['success' => __('admin.success_update')]);
        } catch (\Throwable $e) {
            return $this->handleException($e);
        }
    }

    public function filterAble(array $request, string $class): mixed
    {
        return app()->make($class, ['queryParams' => array_filter($request)]);
    }

    private function productSyncCategory(Model $model, Request $request): void
    {
        if ($model instanceof Product && $request->has('category')) {
            $model->categories()->sync($request->safe()->category);
        }
    }

    private function handleFilesAndCategories(Request $request, Model $model): void
    {
        if ($request->files) {
            $this->MultiUpdateAdminImages($request->files, $model);
        }

        $this->productSyncCategory($model, $request);
    }

    private function handleException(\Throwable $e): RedirectResponse
    {
        Log::warning($e);

        return back()->withErrors(['error' => __('admin.error')]);
    }
}
