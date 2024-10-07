<div class="col-lg-12 mb-25">
    <div class="card mt-25">
        <div class="card-body">
            <h6 class="mb-4">SEO</h6>

            <x-input-lang
                    with="25"
                    type="text"
                    title="SEO Title"
                    name="title_seo"
                    :item="($item->getItemSeo()) ? $item->getItemSeo() : $item"
                    :locale="$locale"
            />

            <x-input-lang
                    with="25"
                    type="text"
                    title="SEO Description"
                    name="description_seo"
                    :item="($item->getItemSeo()) ? $item->getItemSeo() : $item"
                    :locale="$locale"
            />
        </div>
    </div>
</div>