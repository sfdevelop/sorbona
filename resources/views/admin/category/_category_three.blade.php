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
                    <x-edit-in-table model="category" :id="$childrenThree->id"/>

                    <x-delete-in-table model="category" :id="$childrenThree->id"/>
                </div>
            </td>
        </tr>

    @endforeach


