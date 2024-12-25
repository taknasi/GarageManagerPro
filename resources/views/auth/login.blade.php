@extends('layouts.master-login')

@section('content')
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid flex-lg-row">
            <!--begin::Aside-->
            <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10 ">
                <!--begin::Aside-->
                <div class="d-flex flex-center flex-lg-start flex-column ">
                    <!--begin::Logo-->
                    <a href="index.html" class="mb-7 d-none d-lg-inline">
                        <img alt="Logo" src="{{ asset('assets/media/logoName.png') }}" />
                    </a>
                    <!--end::Logo-->
                    <!--begin::Title-->
                    <!-- <h2 class="text-white fw-normal m-0 d-none d-lg-inline">
                                        Gestion des dossiers et des investigations
                                      </h2> -->
                    <!--end::Title-->
                </div>
                <!--begin::Aside-->
            </div>
            <!--begin::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-center w-lg-50 p-10">
                <!--begin::Card-->
                <div class="card rounded-3 w-sm-550px">
                    <!--begin::Card body-->
                    <div class="card-body px-10 px-lg-15">
                        <!--begin::Form-->
                        <form class="form w-100" method="POST" action="{{ route('login') }}">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-10">
                                <a href=" ">
                                    <img alt="Logo" src="{{ asset('assets/media/logo.png') }}" class="h-140px" />
                                </a>

                                <!--begin::Title-->
                                <h1 class="text-dark mb-3 mt-10">
                                    <!-- Bienvenue à <span class="text-primary">GDI &#10084;</span> -->
                                    Bienvenue à <span class="text-primary">GDI &#10084;</span>
                                </h1>
                                <!--end::Title-->
                                <!--begin::Link-->
                                <div class="text-gray-400 fw-bold fs-5">
                                    Connectez-vous à votre compte
                                </div>
                                <!--end::Link-->
                            </div>
                            <!--begin::Heading-->
                            <!--begin::Input group=-->
                            <div class="fv-row mb-5">
                                <!--begin::Email-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fs-6 fw-bolder text-dark required mb-4">
                                        Nom d'utilisateur</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->

                                    <div class="input-group ">
                                        <span class="input-group-text"><i class="bi bi-person-fill fs-2"></i></span>
                                        <input class="form-control form-control-lg @error('user_name') is-invalid @enderror"
                                            placeholder="Entrer votre nom d'utilisateur" type="text" autocomplete
                                            required name="user_name" value="{{ old('user_name') }}"/>
                                    </div>
                                    @error('user_name')
                                        <div class="fv-plugins-message-container invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <!--end::Input-->
                                </div>
                                <!--end::Email-->
                            </div>
                            <!--end::Input group=-->
                            <div class="fv-row mb-9">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack mb-2">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bolder text-dark fs-6 mb-2 required">Mot de passe</label>
                                    <!--end::Label-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Input wrapper-->

                                <div class="position-relative mb-3">

                                    <div class="input-group ">
                                        <button type="button" class="input-group-text" onclick="showPassword()">
                                            <i id="eye-slash" class="bi bi-eye-slash fs-2 "></i>
                                            <i id="eye" class="bi bi-eye fs-2 d-none"></i>
                                        </button>
                                        <input id="password" class="form-control form-control-lg" type="password" name="password"
                                            placeholder="Entrer votre mot de passe" required autocomplete="off" />

                                    </div>
                                    @error('password')
                                        <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!--end::Input wrapper-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Submit button-->
                            <div class="d-grid mb-5">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Continuez</span>
                                    <!--end::Indicator label-->
                                </button>
                            </div>
                            <!--end::Submit button-->
                        </form>
                        <!--end::Form-->

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>

    <!--end::Root-->
@endsection

@section('js')
    <script>
        function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
                document.getElementById("eye-slash").classList.add("d-none")
                document.getElementById("eye").classList.remove("d-none")
            } else {
                x.type = "password";

                document.getElementById("eye-slash").classList.remove("d-none")
                document.getElementById("eye").classList.add("d-none")
            }
        }
    </script>
@endsection
