<div class="col-lg-12 profile_custom">
    <div class="card card-horizontal card-default card-md mb-4">
        <div class="card-header">
            <h6>{{__('admin.main_data')}}</h6>
        </div>
        <div class="card-body py-md-30">
            <div class="horizontal-form">

                    <div class="form-group row mb-25">
                        <div class="col-sm-3 d-flex aling-items-center">
                            <label for="inputNameIcon"
                                   class=" col-form-label color-dark fs-14 fw-500 align-center mb-10"
                            >
                                {{__('admin.name')}}
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <div class="with-icon">
                                <span class="la-user lar color-gray"></span>
                                <input
                                        type="text"
                                        class="form-control  ih-medium ip-gray radius-xs b-light @error('name') is-invalid @enderror "
                                        id="inputNameIcon"
                                        placeholder="Duran Clayton"
                                        name="name"
                                        value="{{ old("name", $item->name ?? '') }}"
                                >
                            </div>

                        </div>
                        @error('name')
                             <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group row mb-25">
                        <div class="col-sm-3 d-flex aling-items-center">
                            <label
                                    for="inputEmailIcon"
                                    class=" col-form-label color-dark fs-14 fw-500 align-center mb-10">
                                Email                                Address
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <div class="with-icon">
                                <span class="lar la-envelope color-gray"></span>
                                <input
                                        type="email"
                                        class="form-control  ih-medium ip-gray radius-xs b-light @error('email') is-invalid @enderror"
                                        id="inputEmailIcon"
                                        placeholder="username@email.com"
                                        name="email"
                                        value="{{ old("email", $item->email ?? '') }}"
                                >


                            </div>
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-25">
                        <div class="col-sm-3">
                            <label
                                    for="inputPasswordIcon"
                                    class=" col-form-label color-dark fs-14 fw-500 align-center mb-10 "
                            >
                              {{__('admin.password_now')}}
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <div class="with-icon">
                                <span class="las la-lock color-gray"></span>
                                <input
                                        type="password"
                                        class="form-control  ih-medium ip-gray radius-xs b-light @error('old_password') is-invalid @enderror"
                                        id="inputPasswordIcon"
                                        name="old_password"
                                        value=""
                                >


                            </div>
                            @if ($errors->has('old_password'))
                                <div class="invalid-feedback">{{ $errors->first('old_password') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-25">
                        <div class="col-sm-3">
                            <label
                                    for="inputPasswordIcon"
                                    class=" col-form-label color-dark fs-14 fw-500 align-center mb-10 "
                            >
                                Пароль
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <div class="with-icon">
                                <span class="las la-lock color-gray"></span>
                                <input
                                        type="password"
                                        class="form-control  ih-medium ip-gray radius-xs b-light @error('password') is-invalid @enderror"
                                        id="inputPasswordIcon"
                                        name="password"
                                        value=""
                                >


                            </div>
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-25">
                        <div class="col-sm-3">
                            <label
                                    for="inputPasswordIcon"
                                    class=" col-form-label color-dark fs-14 fw-500 align-center mb-10"
                            >
                                Повторите пароль
                            </label>
                        </div>
                        <div class="col-sm-9">
                            <div class="with-icon">
                                <span class="las la-lock color-gray"></span>
                                <input
                                        type="password"
                                        class="form-control  ih-medium ip-gray radius-xs b-light @error('password_confirmation') is-invalid @enderror"
                                        id="inputPasswordIcon"
                                        name="password_confirmation"
                                        value=""
                                >

                            </div>
                        </div>
                    </div>

                @if ($errors->has('password_confirmation'))
                    <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
                @endif
            </div>
        </div>
    </div>
    <!-- ends: .card -->

</div>
