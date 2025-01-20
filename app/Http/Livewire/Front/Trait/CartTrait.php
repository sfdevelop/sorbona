<?php

namespace App\Http\Livewire\Front\Trait;

use Jackiedo\Cart\Exceptions\InvalidAssociatedException;
use Jackiedo\Cart\Exceptions\InvalidModelException;
use Jackiedo\Cart\Facades\Cart;

trait CartTrait
{
    public static string $nameShopping = 'shop-user-default';

    public function __construct()
    {
        /**Якщо є ролі, то розкоментуй */
        //        if (!Auth::check()) {
        //            self::$nameShopping = 'shop-user-default';
        //
        //            return;
        //        }
        //
        //        $userId = Auth::id();
        //
        //        $role = Auth::user()->hasRole('admin') ? 'admin' : '';
        //        self::$nameShopping = 'shop' . $role . $userId;
    }

    /**
     * @return \Jackiedo\Cart\Cart
     *                             Получаем корзину
     */
    private function getShoppingCart(): \Jackiedo\Cart\Cart
    {
        return Cart::name(self::$nameShopping);
    }

    /**
     * @return void
     */
    public function addToCartProduct(): void
    {
        $productId = $this->product->id;
        $shoppingCart = $this->getShoppingCart();

        $hasProductInCart = $this->getProductInCart($shoppingCart, $productId);

        if ($hasProductInCart) {
            $item = reset($hasProductInCart); // Получаем первый элемент из массива
            $this->updateCartItem($shoppingCart, $item);
//            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => __('front.product_added_to_cart')]);
        } else {
            $this->createCartItem($shoppingCart, $productId);
//            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => __('front.product_added_to_cart')]);
        }

        $this->emit('refreshCart');
    }

    /**
     * @param  $shoppingCart
     * @param  $productId
     * @return mixed
     */
    protected function getProductInCart($shoppingCart, $productId): mixed
    {
        return $shoppingCart->getItems(['id' => $productId], false);
    }

    /**
     * @param  $shoppingCart
     * @param  $item
     * @return void
     */
    protected function updateCartItem($shoppingCart, $item): void
    {
        $newQty = $item->getQuantity() + $this->productQty;

        $shoppingCart->updateItem($item->getHash(), [
            'quantity' => $newQty,
        ]);
    }

    /**
     * @param  $shoppingCart
     * @param  $productId
     * @return void
     */
    protected function createCartItem($shoppingCart, $productId): void
    {
        $itemData = [
            'id' => $productId,
            'title' => $this->product->title,
            'quantity' => $this->productQty,
            'price' => strPriceToFloat($this->product->now_price),
            'options' => [
                'img' => $this->product->img_web,
            ],
        ];

        $shoppingCart->addItem($itemData);
    }

    /**
     * @param  int  $product_id
     * @return void
     */
    public function deleteItemOnCart(int $product_id): void
    {
        $productId = $product_id;
        $shoppingCartDelete = $this->getShoppingCart();

        $hasProductInCart = $this->getProductInCart($shoppingCartDelete, $productId);

        if ($hasProductInCart) {
            $item = reset($hasProductInCart); // Получаем первый элемент из массива
            $shoppingCartDelete->removeItem($item->getHash());
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => __('front.product_removed_from_cart')]);
        }
    }

    /**
     * @param  $item
     * @return void
     *              Добавляем 1 товар в корзине при увеличении счетчика
     */
    public function cartProductPlus($item): void
    {
        $newQty = $item['quantity'] + 1;

        $this->getShoppingCart()->updateItem($item['hash'], [
            'quantity' => $newQty,
        ]);
    }

    /**
     * @param  $item
     * @return void
     *              Добавляем 1 товар в корзине при увеличении счетчика
     */
    public function cartProductMinus($item): void
    {
        $newQty = $item['quantity'] - 1;

        $this->getShoppingCart()->updateItem($item['hash'], [
            'quantity' => $newQty,
        ]);
    }

    /**
     * Удаление корзины
     *
     * @return void
     */
    public function clearCart(): void
    {
        $this->getShoppingCart()->destroy();
    }

    /**
     * @return mixed
     *
     * @throws InvalidAssociatedException
     * @throws InvalidModelException
     *                               Получение всех товаров в корзине
     */
    public function getItemsFromCart(): mixed
    {
        return $this->getShoppingCart()->getDetails()->get('items');
    }

    /**
     * @return mixed
     *
     * @throws InvalidAssociatedException
     * @throws InvalidModelException
     *                               Промежуточная сумма товара, рассчитанная по сумме total_price и actions_amount
     */
    public function getSubTotalPriceInCart(): mixed
    {
        return $this->getShoppingCart()->getDetails()->get('subtotal');
    }

    /**
     * @return mixed
     *
     * @throws InvalidAssociatedException
     * @throws InvalidModelException
     *                               Получение полной стоимости товаров в корзине
     */
    public function getTotalPriceInCart(): mixed
    {
        return $this->getShoppingCart()->getDetails()->get('total');
    }

    /**
     * @return mixed
     *
     * @throws InvalidAssociatedException
     * @throws InvalidModelException
     *                               Сумма количества всех добавленных товаров
     */
    public function getQtySum(): mixed
    {
        return $this->getShoppingCart()->getDetails()->get('quantities_sum');
    }
}
