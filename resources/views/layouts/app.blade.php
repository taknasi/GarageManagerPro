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
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
    @livewireStyles
    @stack('styles')
</head>

<body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!-- Theme mode setup -->
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

    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!-- Header -->
            @include('layouts.partials.header')

            <!-- Main Content -->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <div id="kt_app_toolbar" class="app-toolbar py-6">
                    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex align-items-start">
                        <!--begin::Toolbar container-->
                        <div class="d-flex flex-column flex-row-fluid">
                            @yield('headerUnderMenu')
                        </div>
                        <!--end::Toolbar container=-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                
                @yield('content')
            </div>

            <!-- Footer -->
            @include('sweetalert::alert')
            @include('layouts.partials.footer')
        </div>
    </div>

    <!-- Global Javascript Bundle -->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    @livewireScripts
    @stack('scripts')
</body>

</html>
