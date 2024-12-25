@extends('layouts.master')

@section('title')
    Argos | Liste des utilisateurs
@endsection

@section('css')
@endsection

@section('pageTitle')
    <div class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Utilisateurs</h1>
        <!--end::Title-->
        <!--begin::Separator-->
        <span class="h-20px border-gray-300 border-start mx-4"></span>
        <!--end::Separator-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted"></li>
            <!--end::Item-->
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection

@section('content')
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl" style="max-width: 1920px!important">
            <!--begin::Card-->
            @livewire('users')
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>

    <!--end::Post-->
    
@endsection

@section('js')
    <script src="{{ asset('assets/plugins/global/select2-fr.min.js') }}"></script>
    <script>
        window.addEventListener('closeModal', event => {
            $("#kt_modal_add_user").modal('hide');
            $("#kt_modal_update_user").modal('hide');
        })
    </script>
@endsection
