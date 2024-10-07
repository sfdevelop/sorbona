<?php

namespace App\Http\Livewire\Traits;

use App\Models\Product;
use App\Models\User;
use Auth;

trait WishListTrait
{
    /**
     * @return int
     */
    public function countWishlist(): int
    {
        if (! \Auth::check()) {
            return 0;
        }

        return \Auth::user()->wishlist->count();
    }

    /**
     * @param  Product  $product_object
     * @param  bool  $toAdd
     * @return bool
     */
    public function addToWishList(Product $product_object, bool $toAdd): bool
    {
        try {
            if (Auth::check()) {
                $user = Auth::user();
                $product = $product_object;

                $toAdd = $this->addToList(user: $user, product: $product);

                $this->alertToBrowser($toAdd);
            } else {
                $this->dispatchBrowserEvent('alert',
                    ['type' => 'warning', 'message' => __('front.not_add_favorites')]);
            }
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage());
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => __('admin.error')]);
        }

        return $toAdd;
    }

    /**
     * @param  bool  $toAdd
     * @return void
     */
    private function alertToBrowser(bool $toAdd): void
    {
        if ($toAdd) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => __('front.add_favorites')]);
        } else {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'warning', 'message' => __('front.delete_favorites')]);
        }
    }

    /**
     * @param  User|null  $user
     * @param  Product  $product
     * @return bool
     */
    private function addToList(?\App\Models\User $user, Product $product): bool
    {
        if ($user->wishlist()->where('product_id', $product->id)->exists()) {
            $user->wishlist()->detach($product);

            return false;
        }

        $user->wishlist()->attach($product, ['created_at' => now()]);

        return true;
    }
}
