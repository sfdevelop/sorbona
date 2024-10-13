<?php

namespace App\Providers;

use App\Payment\LiqPayPayment;
use App\Payment\LiqPayPaymentInterface;
use App\Repository\Category\CategoryRepository;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Choise\ChoiceRepository;
use App\Repository\Choise\ChoiceRepositoryInterface;
use App\Repository\Color\ColorRepository;
use App\Repository\Color\ColorRepositoryInterface;
use App\Repository\Comments\CommentsRepository;
use App\Repository\Comments\CommentsRepositoryInterface;
use App\Repository\Currency\CurrencyRepository;
use App\Repository\Currency\CurrencyRepositoryInterface;
use App\Repository\Manufacture\ManufactureRepository;
use App\Repository\Manufacture\ManufactureRepositoryInterface;
use App\Repository\Offer\OfferRepository;
use App\Repository\Offer\OfferRepositoryInterface;
use App\Repository\Order\OrderRepository;
use App\Repository\Order\OrderRepositoryInterface;
use App\Repository\Page\PageRepository;
use App\Repository\Page\PageRepositoryInterface;
use App\Repository\Product\ProductRepository;
use App\Repository\Product\ProductRepositoryInterface;
use App\Repository\Setting\SettingRepository;
use App\Repository\Setting\SettingRepositoryInterface;
use App\Repository\Size\SizeRepository;
use App\Repository\Size\SizeRepositoryInterface;
use App\Repository\Slider\SliderRepository;
use App\Repository\Slider\SliderRepositoryInterface;
use App\Repository\User\UserRepository;
use App\Repository\User\UserRepositoryInterface;
use App\Repository\Values\ValuesRepository;
use App\Repository\Values\ValuesRepositoryInterface;
use App\Repository\WhyChooce\WhyChoiceRepository;
use App\Repository\WhyChooce\WhyChoiceRepositoryInterface;
use App\Services\PaymentOrder\PaymentOrder;
use App\Services\PaymentOrder\PaymentOrderInterface;
use App\Services\ProductAttrebuts\ProductAttributesService;
use App\Services\ProductAttrebuts\ProductAttributesServiceInterface;
use App\Services\ProductUnicJsonTable\ProductUnicJsonService;
use App\Services\ProductUnicJsonTable\ProductUnicJsonServiceInterface;
use App\Services\SEOCrud\CrudSeoService;
use App\Services\SEOCrud\CrudSeoServiceInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->bind(
            ColorRepositoryInterface::class,
            ColorRepository::class
        );

        $this->app->bind(
            SizeRepositoryInterface::class,
            SizeRepository::class
        );

        $this->app->bind(
            SliderRepositoryInterface::class,
            SliderRepository::class
        );

        $this->app->bind(
            PageRepositoryInterface::class,
            PageRepository::class
        );

        $this->app->bind(
            ChoiceRepositoryInterface::class,
            ChoiceRepository::class
        );

        $this->app->bind(
            ValuesRepositoryInterface::class,
            ValuesRepository::class
        );

        $this->app->bind(
            OfferRepositoryInterface::class,
            OfferRepository::class
        );

        $this->app->bind(
            WhyChoiceRepositoryInterface::class,
            WhyChoiceRepository::class
        );

        $this->app->bind(
            CommentsRepositoryInterface::class,
            CommentsRepository::class
        );

        $this->app->bind(
            OrderRepositoryInterface::class,
            OrderRepository::class
        );

        $this->app->bind(
            SettingRepositoryInterface::class,
            SettingRepository::class
        );

        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        /**
         * services
         */
        $this->app->bind(
            ProductUnicJsonServiceInterface::class,
            ProductUnicJsonService::class
        );

        $this->app->bind(
            ProductAttributesServiceInterface::class,
            ProductAttributesService::class
        );

        $this->app->bind(
            LiqPayPaymentInterface::class,
            LiqPayPayment::class
        );

        $this->app->bind(
            PaymentOrderInterface::class,
            PaymentOrder::class
        );

        $this->app->bind(
            CrudSeoServiceInterface::class,
            CrudSeoService::class
        );

        $this->app->bind(
            ManufactureRepositoryInterface::class,
            ManufactureRepository::class
        );

        $this->app->bind(
            CurrencyRepositoryInterface::class,
            CurrencyRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
