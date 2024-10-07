<div class="row">

    @if($item->exists)
        <div class="col col-sm-6">
            <h6>{{__('admin.image_now')}}</h6>
            <div class="mb-15">
                <img src="{{$item->img_web}}" alt="post image" class="ap-post-attach__headImg w-100">
            </div>
        </div>
    @endif

    <div class="col {{$item->exists ? 'col-sm-6' : 'col-sm-12'}} ">
        <x-upload-file/>
    </div>
</div>
