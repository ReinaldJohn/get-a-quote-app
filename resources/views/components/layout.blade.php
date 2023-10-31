<!DOCTYPE html>
<html lang="en">

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
        {{-- <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png"> --}}

        <!-- GOOGLE WEB FONT -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.css">
        <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">

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

        <!-- /flex-column -->

        <!-- Help form Popup -->
        {{-- <div id="modal-help" class="custom-modal zoom-anim-dialog mfp-hide">
                <div class="small-dialog-header">
                    <h3>Ask Us Anything</h3>
                    <p class="mb-3">Please fill the form with your questions and<br>we will reply soon!</p>
                </div>
                <div id="message-help"></div>
                <form method="post" action="assets/help.php" id="helpform" autocomplete="off">
                    <div class="modal-wrapper">
                        <div class="mb-3 form-floating">
                            <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name">
                            <label for="fullname">Full Name</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="email" name="email_help" id="email_help" class="form-control" placeholder="Email Address">
                            <label for="email_help">Email Address</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <textarea style="resize: none;" name="message_help" id="message_help" class="form-control" placeholder="Your Message"></textarea>
                            <label for="message_help">Your Message</label>
                        </div>
                        <div class="mb-5 form-floating">
                            <input class="form-control" type="text" name="verify_help" id="verify_help" placeholder="Are you human? 3 + 1 =">
                            <label for="verify_help">Are you human? 3 + 1 =</label>
                        </div>
                        <div class="text-center submit"><input type="submit" value="Submit" class="btn_1" id="submit-help"></div>
                    </div>
                </form>
            </div> --}}
        <!-- /Help form Popup -->

        <!-- Modal terms -->
        {{-- <div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="termsLabel">Terms and conditions</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
                            <p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
                            <p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
                        </div>
                    </div>
                    <!-- /modal-content -->
                </div>
                <!-- /modal-dialog -->
            </div> --}}
        <!-- /modal -->

        {{-- Main JS files --}}
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/common_scripts.min.js') }}"></script>
        <script src="{{ asset('js/common.js') }}"></script>
        <script src="{{ asset('assets/validate.js') }}"></script>
        <!-- TOASTR -->
        <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
        {{-- Axios --}}
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        {{-- Flatpicker --}}
        <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.js"></script>
        {{-- Plugins --}}
        <script src="{{ asset('js/plugins.js') }}"></script>
    </body>

</html>
