<!DOCTYPE html>

<html lang="fr">
<!--begin::Head-->

<head>
    <title>Argos | Gestion de Dossier et Investigation</title>
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

<body id="kt_body" class="auth-bg bg-white">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - 404 Page-->
        <div class="d-flex flex-column flex-center flex-column-fluid p-10">
            <!--begin::Illustration-->
            <img src={{ asset('assets/media/404.png') }} alt="" class="mw-100 mb-10 h-lg-398px" />
            <!--end::Illustration-->
            <!--begin::Message-->
            <h1 class="fw-bold mb-10" style="color: #A3A3C7">Vous n'êtes pas autorisé à accéder à cette page!</h1>
            <!--end::Message-->
            <!--begin::Link-->
            <a href="{{ url('/') }}" class="btn btn-primary">Accueil</a>
            <!--end::Link-->
        </div>
        <!--end::Authentication - 404 Page-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
</body>
<!--end::Body-->

</html>