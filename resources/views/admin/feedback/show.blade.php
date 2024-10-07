@section('title', $title)
@extends('layout.app')
@section('content')
        <div class="support-details mt-xl-20">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 mb-3">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">Повідомлення</h4>
                        </div>

                    </div>
                    <div class="col-lg-12 col-sm-12 mb-30">
                        <div class="ticket-details-contact">
                            <div class="ticket-details-contact__ift">
                                <div class="ticket-details-contact__ift-wrapper mb-3">
                                    <span class="ticket-details-contact__ift-rule">{{__('admin.name')}}:</span>
                                    <div class="ticket-details-contact__ift-namTitle">
                                        <h6>{{$item->name}}</h6>
                                    </div>
                                </div>
                                <div class="ticket-details-contact__ift-wrapper  mb-3">
                                    <span class="ticket-details-contact__ift-rule">E-mail:</span>
                                    <div class="ticket-details-contact__ift-namTitle">
                                        <h6>{{$item->email}}</h6>
                                    </div>
                                </div>
                                <div class="ticket-details-contact__ift-wrapper  mb-3">
                                    <span class="ticket-details-contact__ift-rule">{{__('validation.attributes.phone')}}:</span>
                                    <div class="ticket-details-contact__ift-namTitle">
                                        <h6>{{$item->phone}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="ticket-details-contact__overview">
                                <h4 class="ticket-details-contact__overview-title">Текст:</h4>
                                <p>
                                    {{$item->text}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ends: .row -->
            </div>
        </div>


@endsection
