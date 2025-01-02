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
    @stack('styles')
    <style>
        /* General Styles */
        .pdf-container {
            padding: 20px;
            max-width: 100%;
        }

        .pdf-title {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .pdf-table {
            width: 100%;
            margin-bottom: 1rem;
            background-color: #fff;
            border: 1px solid #dee2e6;
        }

        .pdf-table th {
            background-color: #009EF7;
            color: white;
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
            padding: 12px 8px;
        }

        .pdf-table td {
            padding: 8px;
            vertical-align: middle;
            border: 1px solid #dee2e6;
        }

        .pdf-table tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        /* Print Specific Styles */
        @media print {
            body {
                margin: 0;
                padding: 0;
                font-size: 11pt;
                line-height: 1.4;
                background-color: #fff !important;
            }

            .pdf-container {
                padding: 0;
            }

            .pdf-title {
                font-size: 18pt;
                margin: 10px 0;
            }

            .pdf-table {
                page-break-inside: auto;
                border-collapse: collapse;
            }

            .pdf-table thead {
                display: table-header-group;
            }

            .pdf-table tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }

            .pdf-table th {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .pdf-table td {
                font-size: 10pt;
            }

            .font-weight-bold {
                font-weight: bold !important;
            }
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
    <!-- Global Javascript Bundle -->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
</body>

</html>
