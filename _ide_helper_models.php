<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $slug
 * @property int|null $category_id
 * @property int|null $salePercent
 * @property int $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $additional_web
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Category> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Category> $childrenCategories
 * @property-read int|null $children_categories_count
 * @property-read mixed $created_format
 * @property-read mixed $created_human
 * @property-read mixed $img_jpg
 * @property-read mixed $img_main
 * @property-read mixed $img_original
 * @property-read mixed $img_web
 * @property-read mixed $many_web
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read Category|null $parentCategory
 * @property-read mixed $preview
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \App\Models\CategoryTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CategoryTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Database\Factories\CategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Category findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Category listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Category orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Category orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Category orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category trans()
 * @method static \Illuminate\Database\Eloquent\Builder|Category translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Category translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSalePercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category withTranslation(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Category withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class Category extends \Eloquent implements \Spatie\MediaLibrary\HasMedia, \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\CategoryTranslation
 *
 * @property int $id
 * @property int $category_id
 * @property string $locale
 * @property string $title
 * @property string $description
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryTranslation whereTitle($value)
 */
	class CategoryTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Chose
 *
 * @property int $id
 * @property int $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $additional_web
 * @property-read mixed $created_format
 * @property-read mixed $created_human
 * @property-read mixed $img_jpg
 * @property-read mixed $img_main
 * @property-read mixed $img_original
 * @property-read mixed $img_web
 * @property-read mixed $many_web
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read mixed $preview
 * @property-read \App\Models\ChoseTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ChoseTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Database\Factories\ChoseFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Chose listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Chose newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chose newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chose notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Chose orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Chose orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Chose orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Chose query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chose trans()
 * @method static \Illuminate\Database\Eloquent\Builder|Chose translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Chose translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Chose whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chose whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chose whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chose whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Chose whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Chose whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chose withTranslation(?string $locale = null)
 */
	class Chose extends \Eloquent implements \Spatie\MediaLibrary\HasMedia, \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\ChoseTranslation
 *
 * @property int $id
 * @property int $chose_id
 * @property string $locale
 * @property string $title
 * @property string|null $description
 * @method static \Illuminate\Database\Eloquent\Builder|ChoseTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChoseTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChoseTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChoseTranslation whereChoseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChoseTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChoseTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChoseTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChoseTranslation whereTitle($value)
 */
	class ChoseTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Color
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $created_format
 * @property-read mixed $created_human
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \App\Models\ColorTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ColorTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Database\Factories\ColorFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Color listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Color newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Color newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Color notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Color orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Color orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Color orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Color query()
 * @method static \Illuminate\Database\Eloquent\Builder|Color trans()
 * @method static \Illuminate\Database\Eloquent\Builder|Color translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Color translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color withTranslation(?string $locale = null)
 */
	class Color extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\ColorTranslation
 *
 * @property int $id
 * @property int $color_id
 * @property string $locale
 * @property string $title
 * @method static \Illuminate\Database\Eloquent\Builder|ColorTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ColorTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ColorTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ColorTranslation whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ColorTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ColorTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ColorTranslation whereTitle($value)
 */
	class ColorTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Comment
 *
 * @property int $id
 * @property int $product_id
 * @property int|null $user_id
 * @property string $name
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property bool $is_public
 * @property-read mixed $created_format
 * @property-read mixed $created_human
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment public()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereIsPublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUserId($value)
 */
	class Comment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Example
 *
 * @method static \Database\Factories\ExampleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Example newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Example newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Example query()
 */
	class Example extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Feedback
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $text
 * @property int $is_new
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $created_format
 * @property-read mixed $created_human
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback query()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereIsNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereUpdatedAt($value)
 */
	class Feedback extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Metadata
 *
 * @property int $id
 * @property string $metadataable_type
 * @property int $metadataable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $metadataable
 * @property-read \App\Models\MetadataTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MetadataTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata query()
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata whereMetadataableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata whereMetadataableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Metadata withTranslation(?string $locale = null)
 */
	class Metadata extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\MetadataTranslation
 *
 * @property int $id
 * @property int $metadata_id
 * @property string $locale
 * @property string|null $title_seo
 * @property string|null $description_seo
 * @method static \Illuminate\Database\Eloquent\Builder|MetadataTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MetadataTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MetadataTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|MetadataTranslation whereDescriptionSeo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetadataTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetadataTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetadataTranslation whereMetadataId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetadataTranslation whereTitleSeo($value)
 */
	class MetadataTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\NovaPochtaDetachment
 *
 * @property int $id
 * @property string $region
 * @property string $city
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|NovaPochtaDetachment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NovaPochtaDetachment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NovaPochtaDetachment query()
 * @method static \Illuminate\Database\Eloquent\Builder|NovaPochtaDetachment whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NovaPochtaDetachment whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NovaPochtaDetachment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NovaPochtaDetachment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NovaPochtaDetachment whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NovaPochtaDetachment whereUpdatedAt($value)
 */
	class NovaPochtaDetachment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Offer
 *
 * @property int $id
 * @property int $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $additional_web
 * @property-read mixed $created_format
 * @property-read mixed $created_human
 * @property-read mixed $img_jpg
 * @property-read mixed $img_main
 * @property-read mixed $img_original
 * @property-read mixed $img_web
 * @property-read mixed $many_web
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read mixed $preview
 * @property-read \App\Models\OfferTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OfferTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Database\Factories\OfferFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Offer listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Offer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer trans()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer withTranslation(?string $locale = null)
 */
	class Offer extends \Eloquent implements \Spatie\MediaLibrary\HasMedia, \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\OfferTranslation
 *
 * @property int $id
 * @property int $offer_id
 * @property string $locale
 * @property string $title
 * @property string|null $description
 * @method static \Illuminate\Database\Eloquent\Builder|OfferTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OfferTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OfferTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|OfferTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferTranslation whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferTranslation whereTitle($value)
 */
	class OfferTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $deliveryTitle
 * @property array $delivery
 * @property string $payment
 * @property \App\Enum\StatusPaymentEnum $statusPay
 * @property string|null $comment
 * @property string $total
 * @property \App\Enum\StatusOrderEnum $statusOrder
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $created_format
 * @property-read mixed $created_human
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderItem> $orderItems
 * @property-read int|null $order_items_count
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeliveryTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatusOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatusPay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrderItem
 *
 * @property int $id
 * @property int|null $order_id
 * @property string|null $img
 * @property string|null $size
 * @property string|null $color
 * @property string $title
 * @property int $qty
 * @property string $price_item
 * @property string $price_all
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem wherePriceAll($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem wherePriceItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereTitle($value)
 */
	class OrderItem extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Page
 *
 * @property int $id
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $additional_web
 * @property-read mixed $created_format
 * @property-read mixed $created_human
 * @property-read mixed $description_seo
 * @property-read mixed $img_jpg
 * @property-read mixed $img_main
 * @property-read mixed $img_original
 * @property-read mixed $img_web
 * @property-read mixed $many_web
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Metadata> $metadata
 * @property-read int|null $metadata_count
 * @property-read mixed $preview
 * @property-read mixed $title_seo
 * @property-read \App\Models\PageTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PageTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Database\Factories\PageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Page findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Page listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Page orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Page orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Page orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page trans()
 * @method static \Illuminate\Database\Eloquent\Builder|Page translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Page translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page withTranslation(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Page withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class Page extends \Eloquent implements \Spatie\MediaLibrary\HasMedia, \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\PageTranslation
 *
 * @property int $id
 * @property int $page_id
 * @property string $locale
 * @property string $title
 * @property string|null $titleSectionAboutUs
 * @property string|null $description
 * @property string|null $titleDownAboutUs
 * @property string|null $descriptionRememberAboutUs
 * @property string|null $textFeedBackAboutUs
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereDescriptionRememberAboutUs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereTextFeedBackAboutUs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereTitleDownAboutUs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereTitleSectionAboutUs($value)
 */
	class PageTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $slug
 * @property string $sku
 * @property float $price
 * @property float|null $newPrice
 * @property bool $is_new
 * @property bool $is_bestseller
 * @property int $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $additional_web
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comments
 * @property-read int|null $comments_count
 * @property-read mixed $created_format
 * @property-read mixed $created_human
 * @property-read mixed $description_seo
 * @property-read mixed $img_jpg
 * @property-read mixed $img_main
 * @property-read mixed $img_original
 * @property-read mixed $img_web
 * @property-read mixed $many_web
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Metadata> $metadata
 * @property-read int|null $metadata_count
 * @property-read mixed $now_price
 * @property-read mixed $old_price
 * @property-read mixed $preview
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Color> $productColors
 * @property-read int|null $product_colors_count
 * @property-read mixed $short_description
 * @property-read mixed $title_seo
 * @property-read \App\Models\ProductTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Product filter(\App\Http\Filters\FilterInterface $filter)
 * @method static \Illuminate\Database\Eloquent\Builder|Product findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Product listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product trans()
 * @method static \Illuminate\Database\Eloquent\Builder|Product translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Product translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsBestseller($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereNewPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product withTranslation(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class Product extends \Eloquent implements \Spatie\MediaLibrary\HasMedia, \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\ProductTranslation
 *
 * @property int $id
 * @property int $product_id
 * @property string $locale
 * @property string $title
 * @property string $description
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTranslation whereTitle($value)
 */
	class ProductTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\See
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|See newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|See newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|See query()
 * @method static \Illuminate\Database\Eloquent\Builder|See whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|See whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|See whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|See whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|See whereUserId($value)
 */
	class See extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $linkedin
 * @property string $email
 * @property string $phone
 * @property string|null $phone2
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $description_seo
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Metadata> $metadata
 * @property-read int|null $metadata_count
 * @property-read mixed $title_seo
 * @property-read \App\Models\SettingTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SettingTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Database\Factories\SettingFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Setting listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting trans()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting wherePhone2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting withTranslation(?string $locale = null)
 */
	class Setting extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\SettingTranslation
 *
 * @property int $id
 * @property int $setting_id
 * @property string $locale
 * @property string $address
 * @property string $work
 * @property string $weekend
 * @property string|null $text
 * @property string|null $textForMail
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation whereSettingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation whereTextForMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation whereWeekend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation whereWork($value)
 */
	class SettingTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Slider
 *
 * @property int $id
 * @property int $sort
 * @property string|null $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $additional_web
 * @property-read mixed $created_format
 * @property-read mixed $created_human
 * @property-read mixed $img_jpg
 * @property-read mixed $img_main
 * @property-read mixed $img_original
 * @property-read mixed $img_web
 * @property-read mixed $many_web
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read mixed $preview
 * @property-read \App\Models\SliderTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SliderTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Database\Factories\SliderFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Slider listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider trans()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider withTranslation(?string $locale = null)
 */
	class Slider extends \Eloquent implements \Spatie\MediaLibrary\HasMedia, \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\SliderTranslation
 *
 * @property int $id
 * @property int $slider_id
 * @property string $locale
 * @property string $title
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation whereSliderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation whereTitle($value)
 */
	class SliderTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\StatesNovaPochta
 *
 * @property int $id
 * @property string $region
 * @property string $city
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|StatesNovaPochta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StatesNovaPochta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StatesNovaPochta query()
 * @method static \Illuminate\Database\Eloquent\Builder|StatesNovaPochta whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatesNovaPochta whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatesNovaPochta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatesNovaPochta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatesNovaPochta whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatesNovaPochta whereUpdatedAt($value)
 */
	class StatesNovaPochta extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Subscribe
 *
 * @property int $id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Subscribe newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscribe newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscribe query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscribe whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscribe whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscribe whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscribe whereUpdatedAt($value)
 */
	class Subscribe extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $wishlist_ids
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $see
 * @property-read int|null $see_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $wishlist
 * @property-read int|null $wishlist_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Values
 *
 * @property int $id
 * @property int $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $additional_web
 * @property-read mixed $created_format
 * @property-read mixed $created_human
 * @property-read mixed $img_jpg
 * @property-read mixed $img_main
 * @property-read mixed $img_original
 * @property-read mixed $img_web
 * @property-read mixed $many_web
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read mixed $preview
 * @property-read \App\Models\ValuesTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ValuesTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Database\Factories\ValuesFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Values listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Values newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Values newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Values notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Values orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Values orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Values orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Values query()
 * @method static \Illuminate\Database\Eloquent\Builder|Values trans()
 * @method static \Illuminate\Database\Eloquent\Builder|Values translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Values translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Values whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Values whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Values whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Values whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Values whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Values whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Values withTranslation(?string $locale = null)
 */
	class Values extends \Eloquent implements \Spatie\MediaLibrary\HasMedia, \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\ValuesTranslation
 *
 * @property int $id
 * @property int $values_id
 * @property string $locale
 * @property string $title
 * @property string|null $description
 * @method static \Illuminate\Database\Eloquent\Builder|ValuesTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ValuesTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ValuesTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ValuesTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ValuesTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ValuesTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ValuesTranslation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ValuesTranslation whereValuesId($value)
 */
	class ValuesTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WhyChoose
 *
 * @property int $id
 * @property int $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $additional_web
 * @property-read mixed $created_format
 * @property-read mixed $created_human
 * @property-read mixed $img_jpg
 * @property-read mixed $img_main
 * @property-read mixed $img_original
 * @property-read mixed $img_web
 * @property-read mixed $many_web
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read mixed $preview
 * @property-read \App\Models\WhyChooseTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WhyChooseTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Database\Factories\WhyChooseFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChoose listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChoose newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChoose newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChoose notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChoose orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChoose orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChoose orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChoose query()
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChoose trans()
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChoose translated()
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChoose translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChoose whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChoose whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChoose whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChoose whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChoose whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChoose whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChoose withTranslation(?string $locale = null)
 */
	class WhyChoose extends \Eloquent implements \Spatie\MediaLibrary\HasMedia, \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\WhyChooseTranslation
 *
 * @property int $id
 * @property int $why_choose_id
 * @property string $locale
 * @property string $title
 * @property string|null $description
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChooseTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChooseTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChooseTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChooseTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChooseTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChooseTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChooseTranslation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WhyChooseTranslation whereWhyChooseId($value)
 */
	class WhyChooseTranslation extends \Eloquent {}
}
