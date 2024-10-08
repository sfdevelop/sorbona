@if($item->children_categories_count > 0)
    @foreach($item->childrenCategories as $children)
{{--        <tr style="background: rgba(204,204,204,0.11);">--}}
        <tr class="two_td">
            <td  style="padding-left:50px;">
                <div class="userDatatable-content">

{{--                    <i style="font-size: 15px; margin-right: 15px; color: #0A0A0A"--}}
{{--                       class="las la-level-down-alt mr-4 "></i>--}}
                    <i class="las la-dot-circle"></i>
                    {{$children->title}}
                </div>
            </td>
            <td>
                <div class="userDatatable-content">
                    {{$children->sort}}
                </div>
            </td>
            <td>
                <div class="table-actions">
                    <x-edit-in-table model="category" :id="$children->id"/>

                    <x-delete-in-table model="category" :id="$children->id"/>
                </div>
            </td>
        </tr>
        @include('admin.category._category_three')
    @endforeach

@endif
