<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Pascal Burke">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta property="og:title" content="Get a Quote Form | Pascal Burke Insurance Brokerage Inc." />
        <meta property="og:type" content="form" />
        <meta property="og:url" content="https://quote.pbibins.com/" />
        <meta property="og:image" content="{{ asset('img/PBIB Logo.png') }}" />

        <title>Get a Quote Form | Pascal Burke Insurance Brokerage</title>

        <!-- Favicons-->
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

        <!-- GOOGLE WEB FONT -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <!-- BASE CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/vendors.css') }}" rel="stylesheet">

        <!-- YOUR CUSTOM CSS -->
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    </head>

    <body class="bg_color_gray">

        <div id="preloader">
            <div data-loader="circle-side"></div>
        </div><!-- /Preload -->

        <div id="loader_form">
            <div data-loader="circle-side-2"></div>
        </div><!-- /loader_form -->

        {{ $slot }}

        {{-- Main JS files --}}
        <script type="text/javascript">
            window.serverData = @json($trueValues);
        </script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/common_scripts.min.js') }}"></script>

        <!-- TOASTR -->
        <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
        {{-- Select2 --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        {{-- Axios --}}
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        {{-- JQuery Datepicker --}}
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        {{-- Flatpicker --}}
        <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.js"></script>

        <script src="{{ asset('js/common.js') }}"></script>
        <script src="{{ asset('assets/validate.js') }}"></script>

        {{-- Plugins --}}
        <script src="{{ asset('js/plugins.js') }}"></script>

        {{-- <script type="text/javascript">
            $(document).ready(function() {
                $("#trades_performed").select2({
                    placeholder: "Select the trade, or trades you perform here..",
                });
            });
        </script> --}}
    </body>

</html>
