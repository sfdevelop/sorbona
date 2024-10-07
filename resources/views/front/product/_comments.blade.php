<div class="u-info__right">
    <h6 class="element-animation">
        {{__("front.comments")}}
    </h6>

    @livewire('front.product.view-comments-live-wier', ['product'=>$product])

    <a
            href="#"
            data-fancybox
            data-src="#comment-modal"
    >
        {{__('front.leave_comment')}}
    </a>
</div>

<div id="comment-modal" class="modal">
    <h3 class="title">
        {{__('front.leave_comment')}}
    </h3>

    @livewire('front.product.add-comment-live-wier', ['product'=>$product])

</div>

@push('css_front')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"
          integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endpush

@push('js_front')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
            integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush