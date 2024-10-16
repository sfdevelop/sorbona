<td>
    <div class="table-actions">
        @php /** @var \App\Models\Category $item */ @endphp
        @if($item->products_count > 0)
            <a
                    target="_blank"
                    href="{{route('admin.product.index', ['category_id' => $item->id])}}"
                    title="{{__('admin.view_products')}}"
            >
             <small class="text-gray"> {{$item->products_count}} </small> <i class="las la-tags"></i>
            </a>
        @endif
        <x-edit-in-table model="category" :id="$item->id"/>

        <x-delete-in-table model="category" :id="$item->id"/>
    </div>
</td>