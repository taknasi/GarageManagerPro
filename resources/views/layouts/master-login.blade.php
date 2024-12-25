<!DOCTYPE html>

<html lang="fr">
<!--begin::Head-->

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta property="og:site_name" content="Argos" />
    <link rel="shortcut icon" href="{{ asset('assets/media/favicon.ico') }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" style="background-image: url('{{ asset('assets/media/bg4.jpg') }}'); background-repeat: repeat-y"
    class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">

    @yield('content')

    <!--begin::Footer-->
    <div class="d-flex flex-center flex-column-auto p-10">
        <!--begin::Links-->
        <div class="d-flex align-items-center fw-bold fs-6 text-white">
            <span>Copyright © {{ date('Y') }}. Developed by <a href="http://www.tconnect.ma" target="_blank"
                    class="text-warning">Tconnect</a> All
                rights reserved. </span>
        </div>
        <!--end::Links-->
    </div>
    <!--end::Footer-->

    <!--end::Global Javascript Bundle-->
    @yield('js')
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
