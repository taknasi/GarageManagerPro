@extends('layouts.app')

@section('title', 'Liste des vehicules | Garage Manager Pro')

@push('styles')
@endpush('styles')

@section('headerUnderMenu')
    <!--begin::Toolbar wrapper-->
    <div class="d-flex align-items-center pt-1">
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
            <!--begin::Item-->
            <li class="breadcrumb-item text-white fw-bold lh-1">
                <a href="{{ route('index') }}" class="text-white text-hover-primary">
                    <i class="bi bi-house text-gray-700 fs-6"></i>
                </a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
                <i class="bi bi-arrow-right fs-7 text-gray-700 mx-n1"></i>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-white fw-bold lh-1">Vehicules</li>
            <!--end::Item-->
            <li class="breadcrumb-item">
                <i class="bi bi-arrow-right fs-7 text-gray-700 mx-n1"></i>
            </li>
            <li class="breadcrumb-item text-white fw-bold lh-1">Liste des vehicules</li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Toolbar wrapper=-->
    <!--begin::Toolbar wrapper=-->
    <div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-4 gap-lg-10 pt-13 pb-6">
        <!--begin::Page title-->
        <div class="page-title me-5">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-white fw-bold fs-2 flex-column justify-content-center my-0">
                Liste des vehicules
            </h1>
        </div>
    </div>
    <!--end::Toolbar wrapper=-->
@endsection

@section('content')
    <div class="app-container container-xxl">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <!--begin::Content wrapper-->
            <div class="d-flex flex-column flex-column-fluid">
                <!--begin::Content-->
                <div id="kt_app_content" class="app-content flex-column-fluid">
                    @livewire('vehicules')
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/global/select2-fr.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/global/flatpickr-fr.js') }}"></script>
    <script>
        $(".flatpickr-input").flatpickr({
            dateFormat: "d-m-Y",
            locale: "fr",
        });
        window.addEventListener('print', event => {
            window.open("{{ URL::to('/liste.vehicules') }}", "_blank");
        });
    </script>
@endpush

