<h6>{{__('admin.new_photo')}}</h6>
<div class="account-profile d-flex align-items-center mb-4 ">

    <div class="ap-img position-relative w-100">
        <input
                id="profile-picture"
                type="file"
                name="file"
                accept="image/*"
{{--                name="profile-picture"--}}
                class="d-none image-upload-field"
                data-preview-element="profile-picture-preview"
        >
        <!-- Profile picture image-->
        <label for="profile-picture">
            <img
                    src="{{asset('assets/img/upload2.png')}}"
                    alt="user"
                    class="profile-picture-preview ap-img__main w-100 bg-lighter d-flex"
                    style="border-radius: 10px; cursor:pointer;"
            >

            <span
                    title="Pick an image"
                    id="remove_pro_pic"
                    class="cross clear-input-file-btn"
                    data-input-has-file="0"
                    data-pick-title="Pick an image"
                    data-pick-icon="{{asset('assets/img/svg/feature-img.svg')}}"
                    data-clear-title="Remove"
                    data-clear-icon="{{asset('assets/img/svg/close.svg')}}"
                    data-input-element-id="profile-picture"
                    data-preview-element="profile-picture-preview"
                    data-default-preview-image="{{asset('assets/img/upload2.png')}}"
            >
                    <img
                            src="{{asset('assets/img/svg/feature-img.svg')}}"
                            alt="camera"
                    >
            </span>
        </label>
    </div>

</div>

