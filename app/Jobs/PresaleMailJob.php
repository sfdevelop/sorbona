<?php

namespace App\Jobs;

use App\Events\MailFromFromPresaleProductEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PresaleMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $usersWithWishlistProducts = \App\Models\User::whereHas('wishlist', function ($query) {
            $query->whereExists(function ($query) {
                $query->select(\DB::raw(1))
                    ->from('products')
                    ->whereColumn('products.id', 'wishlist.product_id')
                    ->where('wishlist.created_at', '<=', now()->subDays(2));
            });
        })->with(['wishlist' => function ($query) {
            $query->whereExists(function ($query) {
                $query->select(\DB::raw(1))
                    ->from('products')
                    ->whereColumn('products.id', 'wishlist.product_id')
                    ->where('wishlist.created_at', '<=', now()->subDays(2));
            });
        }])->get();

        foreach ($usersWithWishlistProducts as $user) {
            MailFromFromPresaleProductEvent::dispatch($user->wishlist, $user);

            // Отримуємо ідентифікатори продуктів, які потрібно видалити
            $productIds = $user->wishlist()
                ->where('wishlist.created_at', '<=', now()->subDays(2))
                ->pluck('product_id')
                ->toArray();

            // Видаляємо продукти зі списку бажань користувача
            $user->wishlist()->detach($productIds);
        }
    }
}
