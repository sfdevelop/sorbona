@if($item->children_categories_count > 0)
    @foreach($item->childrenCategories as $children)
        {{--        <tr style="background: rgba(204,204,204,0.11);">--}}
        <tr class="two_td">
            <td style="padding-left:50px;">
                <div class="userDatatable-content">
                    <i class="las la-dot-circle"></i>
                    <a href="{{route('admin.category.edit', $children->id)}}">
                        {{$children->title}}
                    </a>
                </div>
            </td>
            <td>
                <div class="userDatatable-content">
                    {{$children->sort}}
                </div>
            </td>
            <td>
                <div class="table-actions">
                    @if($children->products_count > 0)
                        <a
                                target="_blank"
                                href="{{route('admin.product.index', ['category_id' => $children->id])}}"
                                title="{{__('admin.view_products')}}"
                        >
                            <small class="text-gray"> {{$children->products_count}} </small> <i class="las la-tags"></i>
                        </a>
                    @endif

                    <x-edit-in-table model="category" :id="$children->id"/>

                    <x-delete-in-table model="category" :id="$children->id"/>
                </div>
            </td>
        </tr>
        @include('admin.category._category_three')
    @endforeach

@endif
