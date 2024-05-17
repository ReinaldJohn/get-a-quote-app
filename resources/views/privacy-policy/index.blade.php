<x-layout :currentYear="$currentYear" :trueValues="$trueValues" :title="$title">
    <div class="min-vh-100 d-flex flex-column">
        <x-header></x-header>

        <section class="parallax_window_in" data-parallax="scroll" data-image-src="{{ asset('img/bg.jpg') }}"
            data-natural-width="1400" data-natural-height="800">
            <div id="sub_content_in">
                <h1>Privacy Policy</h1>
                {{-- <p class="mb-2">"Usu habeo equidem sanctus no ex melius labitur"</p> --}}
            </div>
        </section>
        <!-- /section -->

        <div class="bg_color_gray">
            <div class="container">
                <div class="row justify-content-between p-3">
                    <div class="col-lg-12">
                        <div name="termly-embed" data-id="13b53f7f-a735-4e83-a60a-dbf31bb5ced3"></div>
                        <script type="text/javascript">
                            (function(d, s, id) {
                                var js, tjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "https://app.termly.io/embed-policy.min.js";
                                tjs.parentNode.insertBefore(js, tjs);
                            }(document, 'script', 'termly-jssdk'));
                        </script>
                    </div>
                </div>
                <!-- End row -->
            </div>
        </div>
        <!-- End container -->

        <footer>
            <div class="container-fluid">
                <div class="row align-items-center text-center">
                    <div class="col-sm-12">
                        <p class="mb-2">© {{ $currentYear }} Pascal Burke Insurance Brokerage Inc.</p>
                    </div>
                    <div class="col-sm-12">
                        <p class="mb-2"><a href="{{ url('privacy-policy') }}">Privacy Policy</a> | <a
                                href="{{ url('cookie-policy') }}">Cookie
                                Policy</a> | <a href="{{ url('terms-and-conditions') }}">Terms and Conditions</a></p>
                    </div>
                </div>
                <!-- /Row -->
            </div>
            <!-- /Container -->
        </footer>
        <!-- /Footer -->
    </div>
</x-layout>
