<?php

namespace App\Http\Controllers\Traits;

use App\Models\Product;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

trait CustomSeoTrait
{
    use SEOToolsTrait;

    /**
     * @param  object  $data
     * @return void
     */
    public function setSeoData(object $data): void
    {
        $this->seo()->setTitle($data->title_seo);
        $this->seo()->setDescription($data->description_seo);

        $seo_url = asset('front/images/dest/content/logo_meta.png');

        if ($data instanceof Product) {
            $seo_url = $data->preview;
        }

        OpenGraph::setDescription($data->description_seo);
        OpenGraph::setTitle($data->title_seo);
        OpenGraph::setUrl(config('custom.URL_PROJECT'));

        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', app()->getLocale());
        OpenGraph::setSiteName(config('custom.NAME_PROJECT'));

        OpenGraph::addImage($seo_url);
        OpenGraph::addImage(['url' => "$seo_url", 'size' => 300]);
        OpenGraph::addImage("$seo_url", ['width' => 300]);
    }
}
