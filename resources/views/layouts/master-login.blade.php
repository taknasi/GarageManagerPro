<!DOCTYPE html>
<html lang="fr">

<head>
    <title>@yield('title', 'Garage Manager Pro')</title>
    <meta charset="utf-8" />
    <meta name="description" content="@yield('meta_description', 'Garage Manager Pro - Professional Garage Management System')" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="@yield('og_title', 'Garage Manager Pro')" />
    <link rel="shortcut icon" href="{{ asset('assets/media/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />

    <!-- Global Stylesheets Bundle -->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    @stack('styles')
</head>

{{-- <body id="kt_body" style="background-image: url('{{ asset('assets/media/bg4.jpg') }}'); background-repeat: repeat-y"
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
    <!-- Global Javascript Bundle -->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
</body> --}}

<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat"
    style="background-image: url('{{ asset('assets/media/bg7.jpg') }}');">

    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                themeMode = localStorage.getItem("data-bs-theme") || defaultThemeMode;
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>

    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="d-flex flex-column flex-center flex-column-fluid">
            <div class="d-flex flex-column flex-center text-center p-10">
                <div class="card card-flush w-lg-550px py-0">
                    <div class="card-body py-5 py-lg-5">
                        @yield('content')
                    </div>
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
    </div>

    <div class="d-flex flex-center flex-column-auto pb-5">
        <!--begin::Links-->
        <div class="d-flex align-items-center fw-bold fs-6 text-white">
            <span>Copyright © {{ date('Y') }}. Developed by <a href="http://www.tconnect.ma" target="_blank"
                    class="text-warning">Tconnect</a> All
                rights reserved. </span>
        </div>
        <!--end::Links-->
    </div>

    <!-- Global Javascript Bundle -->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>

    @stack('scripts')
</body>

</html>
