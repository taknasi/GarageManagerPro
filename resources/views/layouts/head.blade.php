<meta charset="utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta property="og:locale" content="fr_FR" />
<meta property="og:type" content="article" />
<meta property="og:title" content="" />
<meta property="og:site_name" content="Argos" />

<title>@yield('title')</title>

<link rel="shortcut icon" href="{{ asset('assets\media\favicon.ico') }}" />
<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Global Stylesheets Bundle(used by all pages)-->
<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/style.bundle.css') }}"rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/custom.css') }}"rel="stylesheet" type="text/css" />
@livewireStyles
<!--end::Global Stylesheets Bundle-->

<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/global/flatpickr-fr.js') }}"></script>
<script src="{{ asset('assets/plugins/global/select2-fr.min.js') }}"></script>
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/global/formrepeater.bundle.js') }}"></script>

@yield('css')
