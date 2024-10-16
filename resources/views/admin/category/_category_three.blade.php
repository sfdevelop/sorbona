@php
 @endphp
    @foreach($children->childrenCategories as $childrenThree)
        <tr class="two_td">
            <td style="padding-left: 100px;">
                <div class="userDatatable-content">
                    <span> — </span>   {{$childrenThree->title}}
                </div>
            </td>
            <td>
                <div class="userDatatable-content">
                    {{$childrenThree->sort}}
                </div>
            </td>
            <td>
                <div class="table-actions">

                    @if($childrenThree->products_count > 0)
                        <a
                                target="_blank"
                                href="{{route('admin.product.index', ['category_id' => $childrenThree->id])}}"
                                title="{{__('admin.view_products')}}"
                        >
                            <small class="text-gray"> {{$childrenThree->products_count}} </small> <i class="las la-tags"></i>
                        </a>
                    @endif

                    <x-edit-in-table model="category" :id="$childrenThree->id"/>

                    <x-delete-in-table model="category" :id="$childrenThree->id"/>
                </div>
            </td>
        </tr>

    @endforeach


