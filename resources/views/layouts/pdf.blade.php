<!DOCTYPE html>

<html lang="fr">
<!--begin::Head-->

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
    <style>
        body {
            background-color: #fff !important;
            padding: 5px 20px 20px 20px;
        }

        h1 {
            color: #1a5276;
            background-color: #f1faff;
            text-align: center;
            padding: 6px;
        }

        thead {
            display: table-header-group;
        }

        #header {
            font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #header td,
        #header th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #header tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #header tr:hover {
            background-color: #ddd;
        }

        #header th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #009EF7;
            color: white;
        }

        .td3 {
            width: 30%;
            color: #3081EA;
        }

        @media print {
            #print_Button {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="fw-bolder">
        @yield('content')
    </div>
    <div class="text-center">
        <button class="btn btn-danger me-3 w-200 mt-3 mb-3" id="print_Button" onclick="printDiv()"> <i
                class="bi bi-printer fs-2"></i> Imprimer</button>
    </div>

    <script>
        function printDiv() {
            window.print();
        }
    </script>
    @include('layouts.footer-scripts')
</body>

</html>
