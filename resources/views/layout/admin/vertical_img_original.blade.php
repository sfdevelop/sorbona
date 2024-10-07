@if($item->exists)
    <h6>{{__('admin.image_now')}}</h6>
    <div class="mb-15" style="background: #333">
        <img src="{{$item->img_original}}" alt="post image" class="ap-post-attach__headImg w-100">
    </div>
@endif

<x-upload-file/>
