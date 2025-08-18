<div class="card-body p-25 border mb-3 radius-md">
    <h5 class="mb-5">Данные для счет фактуры</h5>
    <div class="table4  mb-30">
        <div class="table-responsive">
            <table class="table mb-0 table-custom">
                <thead>
                <tr class="userDatatable-header">

                    <th>
                        <span class="userDatatable-title">Название</span>
                    </th>
                    <th>
                        <span class="userDatatable-title">Инн</span>
                    </th>
                    <th>
                        <span class="userDatatable-title">ЕДРПОУ</span>
                    </th>
                </tr>
                </thead>
                <tbody>
                    @php /** @var \App\Models\Order $order */@endphp
                    <tr>
                        <td>
                            <div class="userDatatable-content">
                                {{$order->companyName}}
                            </div>
                        </td>


                        <td>
                            <div class="userDatatable-content">
                                {{$order->inn}}
                            </div>
                        </td>


                        <td>
                            <div class="userDatatable-content">
                                {{$order->edrpou}}
                            </div>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
