const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/bootstrap.js", "public/js")
    .js(["resources/js/common_functions.js"], "public/js/common.js")
    .js(
        [
            "resources/js/reservation_wizard_func.js",
            "resources/js/daterangepicker_func.js",
            "resources/js/quotation_wizard_func.js",
            "resources/js/registration_wizard_func.js",
            "resources/js/autocomplete_func.js",
            "resources/js/review_wizard_func.js",
            "resources/js/parallax.js",
            "resources/js/owl-carousel.js",
        ],
        "public/js/plugins.js"
    )
    .postCss("resources/css/app.css", "public/css")
    .postCss("resources/css/style.css", "public/css")
    .postCss("resources/css/custom.css", "public/css")
    .copy("resources/img", "public/img")
    .sourceMaps();
