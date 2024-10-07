<div>
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="pb-3">{{__('admin.additional_photo')}}</h5>
            <div class="row">
                @foreach($photos as $photo)
                    <div class="col col-lg-3 col-xs-6 mb-4 position-relative">
                        <img class="img-fluid" src="{{$photo->getUrl('additional')}}" alt="">
                        <a title="{{__('admin.delete')}}"
                           href="#"
                           wire:click.prevent="deleteImage( {{ $photo->id }} )"
                           class="delete_img  btn-danger btn-sm btn-icon text-center">
                            <i class="las la-minus-circle"></i>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row border-top py-3">
                <div class="dm-upload">
                    <h6 class="my-2">{{__('admin.add_photo')}}</h6>
                    <div class="dm-upload-avatar">
                        {{--            <img class="avatrSrc" src="{{assert('img/upload.png')}}" alt="Avatar Upload">--}}
                        <i style="font-size: 100px; cursor:pointer;"
                           class="las la-plus p-4 border btn-shadow-dangers radius"></i>
                    </div>
                    <div class="avatar-up">
                        <input type="file" wire:model="file" name="upload-avatar-input" class="upload-avatar-input">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
