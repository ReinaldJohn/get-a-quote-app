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

        <!-- BASE CSS -->
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

        <div class="min-vh-100 d-flex flex-column">
            <header>
                <div class="container-fluid">
                    <div class="row d-flex align-items-center">
                        <div class="col-4">
                            <!-- <a data-bs-toggle="offcanvas" href="#offcanvasNav" role="button" class="btn_nav"><i class="bi bi-list"></i></a> -->
                        </div>
                        <div class="col-4 text-center">
                            <a href="https://pbibins.com" target="_blank"><img src="{{ asset('img/PBIB Logo.png') }}"
                                    alt="" class="img-fluid" width="350" height="350"></a>
                        </div>
                        <div class="col-4">
                            <div id="social">
                                <ul>
                                    <li><a href="https://www.facebook.com/pbibins" target="_blank"><i
                                                class="bi bi-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/i/flow/login?redirect_after_login=%2Fpbibinc"
                                            target="_blank"><i class="bi bi-twitter"></i></a></li>
                                    <li><a href="https://www.instagram.com/pbibinc/" target="_blank"><i
                                                class="bi bi-instagram"></i></a></li>
                                </ul>
                            </div>
                            <!-- /social -->
                        </div>
                    </div>
                </div>
                <!-- /container -->
            </header>
            <!-- /header -->

            <div class="container-fluid d-flex flex-column my-auto">
                <div id="wizard_container">
                    <div id="top-wizard">
                        <div id="progressbar"></div>
                    </div>

                    <div class="form-container">
                        <div class="loader-container hidden">
                            <div class="custom-loader"></div>
                        </div>
                        <!-- /top-wizard -->
                        <form id="wrapped">
                            @csrf
                            <input id="website" name="website" type="text" value="">
                            <!-- Leave input above for security protection, read docs for details -->

                            <div id="middle-wizard">
                                <div class="step">
                                    <div class="question_title">
                                        <h3>Get a Quote Now</h3>
                                        <p>Select the insurance products you would like a quote for.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="list_block">
                                                <ul>
                                                    <li>
                                                        <div class="checkbox_radio_container">
                                                            <input type="checkbox" id="question_1_opt_1"
                                                                name="question_1[]" class="" value="gl">
                                                            <label class="checkbox" for="question_1_opt_1"></label>
                                                            <label for="question_1_opt_1" class="wrapper">General
                                                                Liability</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox_radio_container">
                                                            <input type="checkbox" id="question_1_opt_2"
                                                                name="question_1[]" class="" value="wc">
                                                            <label class="checkbox" for="question_1_opt_2"></label>
                                                            <label for="question_1_opt_2" class="wrapper">Worker’s
                                                                Compensation</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox_radio_container">
                                                            <input type="checkbox" id="question_1_opt_3"
                                                                name="question_1[]" class="" value="auto">
                                                            <label class="checkbox" for="question_1_opt_3"></label>
                                                            <label for="question_1_opt_3" class="wrapper">Commercial
                                                                Auto</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox_radio_container">
                                                            <input type="checkbox" id="question_1_opt_4"
                                                                name="question_1[]" class="" value="bond">
                                                            <label class="checkbox" for="question_1_opt_4"></label>
                                                            <label for="question_1_opt_4" class="wrapper">Contractor
                                                                License Bond</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox_radio_container">
                                                            <input type="checkbox" id="question_1_opt_5"
                                                                name="question_1[]" class="" value="excess">
                                                            <label class="checkbox" for="question_1_opt_5"></label>
                                                            <label for="question_1_opt_5" class="wrapper">Excess
                                                                Liability</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox_radio_container">
                                                            <input type="checkbox" id="question_1_opt_6"
                                                                name="question_1[]" class="" value="tools">
                                                            <label class="checkbox" for="question_1_opt_6"></label>
                                                            <label for="question_1_opt_6" class="wrapper">Tools &
                                                                Equipment</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox_radio_container">
                                                            <input type="checkbox" id="question_1_opt_7"
                                                                name="question_1[]" class="" value="br">
                                                            <label class="checkbox" for="question_1_opt_7"></label>
                                                            <label for="question_1_opt_7" class="wrapper">Builder's
                                                                Risk</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox_radio_container">
                                                            <input type="checkbox" id="question_1_opt_8"
                                                                name="question_1[]" class="" value="bop">
                                                            <label class="checkbox" for="question_1_opt_8"></label>
                                                            <label for="question_1_opt_8" class="wrapper">Business
                                                                Owner's Policy</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox_radio_container">
                                                            <input type="checkbox" id="question_1_opt_9"
                                                                name="question_1[]" class="" value="comm_prop">
                                                            <label class="checkbox" for="question_1_opt_9"></label>
                                                            <label for="question_1_opt_9" class="wrapper">Commercial
                                                                Property</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox_radio_container">
                                                            <input type="checkbox" id="question_1_opt_10"
                                                                name="question_1[]" class="" value="eo">
                                                            <label class="checkbox" for="question_1_opt_10"></label>
                                                            <label for="question_1_opt_10" class="wrapper">Errors and
                                                                Omission</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox_radio_container">
                                                            <input type="checkbox" id="question_1_opt_11"
                                                                name="question_1[]" class="" value="pollution">
                                                            <label class="checkbox" for="question_1_opt_11"></label>
                                                            <label for="question_1_opt_11" class="wrapper">Pollution
                                                                Application</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox_radio_container">
                                                            <input type="checkbox" id="question_1_opt_12"
                                                                name="question_1[]" class="" value="epli">
                                                            <label class="checkbox" for="question_1_opt_12"></label>
                                                            <label for="question_1_opt_12" class="wrapper">Employment
                                                                Practices Liability</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox_radio_container">
                                                            <input type="checkbox" id="question_1_opt_13"
                                                                name="question_1[]" class="" value="cyber">
                                                            <label class="checkbox" for="question_1_opt_13"></label>
                                                            <label for="question_1_opt_13" class="wrapper">Cyber
                                                                Liability</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox_radio_container">
                                                            <input type="checkbox" id="question_1_opt_14"
                                                                name="question_1[]" class="" value="instfloat">
                                                            <label class="checkbox" for="question_1_opt_14"></label>
                                                            <label for="question_1_opt_14"
                                                                class="wrapper">Installation
                                                                Floater</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <small><em>You can select multiple products *</em></small>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                </div>
                                <!-- /Step -->

                                <!-- Client Information Stepper -->
                                <div class="step" id="personal_information_step">
                                    <div class="question_title">
                                        <h3>Client Information Form</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="company_name" id="company_name"
                                                    class="form-control" placeholder="Company Name" maxlength="100">
                                                <label for="company_name">Company Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="firstname" id="firstname"
                                                    class="form-control" placeholder="First Name" maxlength="100">
                                                <label for="firstname">First Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="lastname" id="lastname"
                                                    class="form-control" placeholder="Last Name">
                                                <label for="lastname" maxlength="100">Last Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="address" id="address"
                                                    class="form-control" placeholder="Address" maxlength="255">
                                                <label for="address">Address</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="city" id="city"
                                                    class="form-control" placeholder="City" maxlength="50">
                                                <label for="lastname">City</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="states" id="states"
                                                    aria-label="states">
                                                    <option value selected></option>
                                                    @foreach ($states as $state)
                                                        <option value="{{ $state['state_abbr'] }}">
                                                            {{ $state['state_abbr'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="states">State</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="zipcode" id="zipcode"
                                                    class="form-control" placeholder="Zipcode" maxlength="5">
                                                <label for="zipcode">Zipcode</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="phone" name="phone_number" id="phone_number"
                                                    class="form-control" placeholder="Phone Number">
                                                <label for="phone_number">Phone Number</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="phone" name="fax_number" id="fax_number"
                                                    class="form-control" placeholder="Fax Number (Optional)">
                                                <label for="fax_number">Fax Number (Optional)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3 form-floating">
                                                <input type="email" name="email_address" id="email_address"
                                                    class="form-control" placeholder="Email Address" maxlength="50">
                                                <label for="email_address">Email Address</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="personal_website" id="personal_website"
                                                    class="form-control" placeholder="Website (Optional)"
                                                    maxlength="50">
                                                <label for="personal_website">Website (Optional)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="contractor_license"
                                                    id="contractor_license" class="form-control"
                                                    placeholder="Contractor License No. (Optional)">
                                                <label for="contractor_license" maxlength="50">Contractor License
                                                    No. (Optional)</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                </div>
                                <!-- /Step -->

                                <!-- About Your Company Stepper -->
                                <div class="step" id="about_your_company_step">
                                    <div class="question_title">
                                        <h3>About Your Company Information Form</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" name="ayc_bop" id="ayc_bop"
                                                    aria-label="ayc_bop">
                                                    <option value selected></option>
                                                    <option value="Sole Proprietor">Sole Proprietor</option>
                                                    <option value="Partnership">Partnership</option>
                                                    <option value="LLC">LLC</option>
                                                    <option value="Corporation">Corporation</option>
                                                </select>
                                                <label for="ayc_bop">Business Ownership Structure</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="ayc_date_business_started"
                                                    id="ayc_date_business_started"
                                                    class="form-control flatpickr-input" placeholder="MM/DD/YYYY">
                                                <label for="ayc_date_business_started">Date Business Started</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="ayc_yrs_exp_contractor"
                                                    id="ayc_yrs_exp_contractor" class="form-control" placeholder="">
                                                <label for="ayc_yrs_exp_contractor">Years of experience as a
                                                    contractor?</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" name="ayc_no_of_losses"
                                                    id="ayc_no_of_losses" aria-label="ayc_no_of_losses">
                                                    <option value="0" selected>0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6+</option>
                                                </select>
                                                <label for="ayc_no_of_losses">No. of Losses</label>
                                            </div>
                                        </div>
                                        <div id="ayc_no_losses_container"></div>
                                    </div>
                                    <!-- /row -->
                                </div>
                                <!-- /Step -->

                                <!-- Products Steps -->
                                <!-- GL Stepper 1 -->
                                <div class="step" id="gl_step_1">
                                    <div class="question_title">
                                        <h3>General Liability Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="gl_annual_gross" id="gl_annual_gross"
                                                    class="form-control" placeholder="Annual Gross Receipts"
                                                    maxlength="20">
                                                <label for="gl_annual_gross">Annual Gross Receipts</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="gl_profession" id="gl_profession"
                                                    aria-label="gl_profession">
                                                    <option value selected></option>
                                                    @foreach ($professions as $profession)
                                                        <option value="{{ $profession['id'] }}">
                                                            {{ $profession['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="gl_profession">Select a Profession</label>
                                            </div>
                                        </div>
                                        <div id="gl_annual_gross_additional_questions"></div>
                                        <div id="gl_profession_if_others"></div>
                                        <div id="gl_profession_container"></div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="gl_residential" id="gl_residential"
                                                    aria-label="gl_residential">
                                                    <option value selected></option>
                                                    <option value="0">0%</option>
                                                    <option value="5">5%</option>
                                                    <option value="10">10%</option>
                                                    <option value="15">15%</option>
                                                    <option value="20">20%</option>
                                                    <option value="25">25%</option>
                                                    <option value="30">30%</option>
                                                    <option value="35">35%</option>
                                                    <option value="40">40%</option>
                                                    <option value="45">45%</option>
                                                    <option value="50">50%</option>
                                                    <option value="55">55%</option>
                                                    <option value="60">60%</option>
                                                    <option value="65">65%</option>
                                                    <option value="70">70%</option>
                                                    <option value="75">75%</option>
                                                    <option value="80">80%</option>
                                                    <option value="85">85%</option>
                                                    <option value="90">90%</option>
                                                    <option value="95">95%</option>
                                                    <option value="100">100%</option>
                                                </select>
                                                <label for="gl_residential">Residential %</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="gl_commercial" id="gl_commercial"
                                                    aria-label="gl_commercial">
                                                    <option value selected></option>
                                                    <option value="0">0%</option>
                                                    <option value="5">5%</option>
                                                    <option value="10">10%</option>
                                                    <option value="15">15%</option>
                                                    <option value="20">20%</option>
                                                    <option value="25">25%</option>
                                                    <option value="30">30%</option>
                                                    <option value="35">35%</option>
                                                    <option value="40">40%</option>
                                                    <option value="45">45%</option>
                                                    <option value="50">50%</option>
                                                    <option value="55">55%</option>
                                                    <option value="60">60%</option>
                                                    <option value="65">65%</option>
                                                    <option value="70">70%</option>
                                                    <option value="75">75%</option>
                                                    <option value="80">80%</option>
                                                    <option value="85">85%</option>
                                                    <option value="90">90%</option>
                                                    <option value="95">95%</option>
                                                    <option value="100">100%</option>
                                                </select>
                                                <label for="gl_commercial">Commercial %</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="gl_new_construction"
                                                    id="gl_new_construction" aria-label="gl_new_construction">
                                                    <option value selected></option>
                                                    <option value="0">0%</option>
                                                    <option value="5">5%</option>
                                                    <option value="10">10%</option>
                                                    <option value="15">15%</option>
                                                    <option value="20">20%</option>
                                                    <option value="25">25%</option>
                                                    <option value="30">30%</option>
                                                    <option value="35">35%</option>
                                                    <option value="40">40%</option>
                                                    <option value="45">45%</option>
                                                    <option value="50">50%</option>
                                                    <option value="55">55%</option>
                                                    <option value="60">60%</option>
                                                    <option value="65">65%</option>
                                                    <option value="70">70%</option>
                                                    <option value="75">75%</option>
                                                    <option value="80">80%</option>
                                                    <option value="85">85%</option>
                                                    <option value="90">90%</option>
                                                    <option value="95">95%</option>
                                                    <option value="100">100%</option>
                                                </select>
                                                <label for="gl_new_construction">New Construction %</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="gl_repair_remodel"
                                                    id="gl_repair_remodel" aria-label="gl_repair_remodel">
                                                    <option value selected></option>
                                                    <option value="0">0%</option>
                                                    <option value="5">5%</option>
                                                    <option value="10">10%</option>
                                                    <option value="15">15%</option>
                                                    <option value="20">20%</option>
                                                    <option value="25">25%</option>
                                                    <option value="30">30%</option>
                                                    <option value="35">35%</option>
                                                    <option value="40">40%</option>
                                                    <option value="45">45%</option>
                                                    <option value="50">50%</option>
                                                    <option value="55">55%</option>
                                                    <option value="60">60%</option>
                                                    <option value="65">65%</option>
                                                    <option value="70">70%</option>
                                                    <option value="75">75%</option>
                                                    <option value="80">80%</option>
                                                    <option value="85">85%</option>
                                                    <option value="90">90%</option>
                                                    <option value="95">95%</option>
                                                    <option value="100">100%</option>
                                                </select>
                                                <label for="gl_repair_remodel">Repair/Remodel %</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <textarea style="resize: none;" name="gl_descops" id="gl_descops" class="form-control"
                                                    placeholder="Detailed Description of Operations"></textarea>
                                                <label for="gl_descops">Detailed Description of Operations</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="gl_multiple_state_work"
                                                    id="gl_multiple_state_work" aria-label="gl_multiple_state_work">
                                                    <option value selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="gl_multiple_state_work">Multiple state work?</label>
                                            </div>
                                        </div>
                                        <div id="gl_multiple_state_work_container"></div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="gl_cost_proj_5years"
                                                    id="gl_cost_proj_5years" class="form-control"
                                                    placeholder="Cost of the Largest Project in the past 5 years?"
                                                    maxlength="20">
                                                <label for="gl_cost_proj_5years">Cost of the Largest Project in the
                                                    past 5
                                                    years?</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                </div>
                                <!-- /Step -->

                                <!-- GL Stepper 2 -->
                                <div class="step" id="gl_step_2">
                                    <div class="question_title">
                                        <h3>General Liability Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">

                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="gl_full_time_employees"
                                                    id="gl_full_time_employees" class="form-control" placeholder=""
                                                    maxlength="3">
                                                <label for="gl_full_time_employees">Full Time Employee/s</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="gl_part_time_employees"
                                                    id="gl_part_time_employees" class="form-control" placeholder=""
                                                    maxlength="3">
                                                <label for="gl_part_time_employees">Part Time Employee/s</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="gl_payroll_amt" id="gl_payroll_amt"
                                                    class="form-control" placeholder="Payroll Amount" maxlength="20">
                                                <label for="gl_payroll_amt">Payroll Amount</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="gl_using_subcon"
                                                    id="gl_using_subcon" aria-label="gl_using_subcon">
                                                    <option value selected></option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                                <label for="gl_using_subcon">Are you using any subcontractor?</label>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div id="gl_subcon_cost_container"></div>
                                        <!--  -->
                                    </div>
                                    <!-- /row -->
                                </div>
                                <!-- /Step -->

                                <!-- WC Stepper 1 -->
                                <div class="step" id="wc_step_1">
                                    <div class="question_title">
                                        <h3>Worker’s Compensation Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="wc_no_of_profession"
                                                    id="wc_no_of_profession" aria-label="wc_no_of_profession">
                                                    <option selected></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                </select>
                                                <label for="wc_no_of_profession">Number of Professions?</label>
                                            </div>
                                        </div>
                                        <!-- Start Profession Entry Container -->
                                        <div id="profession_entry_container"></div>
                                        <!-- End Profession Entry Container -->
                                        @if (session('doesGLandWCChecked') === 'true')
                                            <div class="col-md-12 mt-4">
                                                <div class="mb-3 form-floating">
                                                    <input type="text" name="wc_gross_receipt"
                                                        id="wc_gross_receipt" class="form-control"
                                                        placeholder="Gross Receipt" maxlength="20">
                                                    <label for="wc_gross_receipt">Gross Receipt</label>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-3 form-floating">
                                                    <select class="form-select" name="wc_does_hire_subcon"
                                                        id="wc_does_hire_subcon" aria-label="wc_does_hire_subcon">
                                                        <option value selected></option>
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                    <label for="wc_does_hire_subcon">Do you hire subcontractor?</label>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div id="wc_subcon_cost_year_container"></div>
                                            <!--  -->
                                            <div class="col-md-12">
                                                <div class="mb-3 form-floating">
                                                    <input type="text" name="wc_num_of_empl" id="wc_num_of_empl"
                                                        class="form-control" placeholder="Number of Employees"
                                                        maxlength="3">
                                                    <label for="wc_num_of_empl">Number of Employees</label>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- WC Stepper 2 -->
                                <div class="step" id="wc_step_2">
                                    <div class="question_title">
                                        <h3>Worker’s Compensation Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <h5 class="profession_header mt-2 mb-2">Owner's Information</h5>
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="wc_name" id="wc_name"
                                                    class="form-control" placeholder="" maxlength="255">
                                                <label for="wc_name">Owner's Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="wc_title_relationship"
                                                    id="wc_title_relationship" class="form-control" placeholder=""
                                                    maxlength="255">
                                                <label for="wc_title_relationship">Title / Relationship</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="wc_ownership_perc"
                                                    id="wc_ownership_perc" aria-label="wc_ownership_perc">
                                                    <option value selected></option>
                                                    <option value="0">0%</option>
                                                    <option value="5">5%</option>
                                                    <option value="10">10%</option>
                                                    <option value="15">15%</option>
                                                    <option value="20">20%</option>
                                                    <option value="25">25%</option>
                                                    <option value="30">30%</option>
                                                    <option value="35">35%</option>
                                                    <option value="40">40%</option>
                                                    <option value="45">45%</option>
                                                    <option value="50">50%</option>
                                                    <option value="55">55%</option>
                                                    <option value="60">60%</option>
                                                    <option value="65">65%</option>
                                                    <option value="70">70%</option>
                                                    <option value="75">75%</option>
                                                    <option value="80">80%</option>
                                                    <option value="85">85%</option>
                                                    <option value="90">90%</option>
                                                    <option value="95">95%</option>
                                                    <option value="100">100%</option>
                                                </select>
                                                <label for="wc_ownership_perc">Ownership %</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="wc_exc_inc" id="wc_exc_inc"
                                                    aria-label="wc_exc_inc">
                                                    <option value selected></option>
                                                    <option value="Excluded">Excluded</option>
                                                    <option value="Included">Included</option>
                                                </select>
                                                <label for="wc_exc_inc">Excluded / Included</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="wc_ssn" id="wc_ssn"
                                                    class="form-control" placeholder="SSN">
                                                <label for="wc_ssn">SSN</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="wc_fein" id="wc_fein"
                                                    class="form-control" placeholder="FEIN">
                                                <label for="wc_fein">FEIN</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="wc_dob" id="wc_dob"
                                                    class="form-control" placeholder="MM/DD/YYYY">
                                                <label for="wc_dob">Date of Birth</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="owners_information_container"></div>
                                </div>
                                <!-- /Step -->

                                <!-- AUTO Stepper 1 -->
                                <div class="step" id="auto_step_1">
                                    <div class="question_title">
                                        <h3>Commercial Auto Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="auto_add_vehicle"
                                                    id="auto_add_vehicle" aria-label="auto_add_vehicle">
                                                    <option value="1" selected>1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                </select>
                                                <label for="auto_add_vehicle">Additional Vehicle?</label>
                                            </div>
                                        </div>
                                        <!-- Start Vehicle Container -->
                                        <div id="auto_vehicles_container"></div>
                                        <!-- End Vehicle Container -->
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- AUTO Stepper 2 -->
                                <div class="step" id="auto_step_2">
                                    <div class="question_title">
                                        <h3>Commercial Auto Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="auto_add_driver"
                                                    id="auto_add_driver" aria-label="auto_add_driver">
                                                    <option value="1" selected>1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                                <label for="auto_add_driver">Select a number of driver</label>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div id="auto_drivers_container"></div>
                                        <!--  -->
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- BOND Stepper 1 -->
                                <div class="step" id="bond_step_1">
                                    <div class="question_title">
                                        <h3>Contractor License Bond Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="bond_owners_name" id="bond_owners_name"
                                                    class="form-control" placeholder="Owner's Name" maxlength="100">
                                                <label for="bond_owners_name">Owner's Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="bond_owners_ssn" id="bond_owners_ssn"
                                                    class="form-control" placeholder="Social Security Number (SSN)">
                                                <label for="bond_owners_ssn">Social Security Number (SSN)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="bond_owners_dob" id="bond_owners_dob"
                                                    class="form-control" placeholder="MM/DD/YYYY">
                                                <label for="bond_owners_dob">Date of Birth</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="bond_owners_civil_status"
                                                    id="bond_owners_civil_status"
                                                    aria-label="bond_owners_civil_status">
                                                    <option value selected></option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorced">Divorced</option>
                                                </select>
                                                <label for="bond_owners_civil_status">Civil Status</label>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div id="bond_owner_if_married_container"></div>
                                        <!--  -->
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- BOND Stepper 2 -->
                                <div class="step" id="bond_step_2">
                                    <div class="question_title">
                                        <h3>Contractor License Bond Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="bond_type_bond_requested"
                                                    id="bond_type_bond_requested" class="form-control"
                                                    placeholder="Type of Bond Requested" maxlength="100">
                                                <label for="bond_type_bond_requested">Type of Bond Requested</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="bond_amount_of_bond"
                                                    id="bond_amount_of_bond" class="form-control"
                                                    placeholder="Amount of Bond" maxlength="20">
                                                <label for="bond_amount_of_bond">Amount of Bond</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="bond_term_of_bond"
                                                    id="bond_term_of_bond" aria-label="bond_term_of_bond">
                                                    <option value selected></option>
                                                    <option value="1 year">1 year</option>
                                                    <option value="2 years">2 years</option>
                                                    <option value="3 years">3 years</option>
                                                    <option value="4 years">4 years</option>
                                                </select>
                                                <label for="bond_term_of_bond">Term of Bond</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="bond_type_of_license"
                                                    id="bond_type_of_license" aria-label="bond_type_of_license">
                                                    <option value selected></option>
                                                    <option value="General Contractor">General Contractor</option>
                                                    <option value="Roofer">Roofer</option>
                                                    <option value="Swimming Pool Contractor">Swimming Pool Contractor
                                                    </option>
                                                    <option value="Others">Others</option>
                                                </select>
                                                <label for="bond_type_of_license">Type of License</label>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div id="bond_license_type_if_others_container"></div>
                                        <!--  -->
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="bond_license_or_application_no"
                                                    id="bond_license_or_application_no" class="form-control"
                                                    placeholder="License Number or Application Number"
                                                    maxlength="100">
                                                <label for="bond_license_or_application_no">License Number or
                                                    Application
                                                    Number</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="bond_effective_date"
                                                    id="bond_effective_date" class="form-control"
                                                    placeholder="MM/DD/YYYY">
                                                <label for="bond_effective_date">Effective Date</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- EXCESS Stepper 1 -->
                                <div class="step" id="excess_step_1">
                                    <div class="question_title">
                                        <h3>Excess Liability Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="excess_limits" id="excess_limits"
                                                    aria-label="excess_limits">
                                                    <option value selected></option>
                                                    <option value="1000000">$1,000,000</option>
                                                    <option value="2000000">$2,000,000</option>
                                                    <option value="3000000">$3,000,000</option>
                                                    <option value="4000000">$4,000,000</option>
                                                    <option value="5000000">$5,000,000</option>
                                                    <option value="6000000">$6,000,000</option>
                                                    <option value="7000000">$7,000,000</option>
                                                    <option value="8000000">$8,000,000</option>
                                                    <option value="9000000">$9,000,000</option>
                                                    <option value="10000000">$10,000,000</option>
                                                </select>
                                                <label for="excess_limits">Excess Limits</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="excess_gl_eff_date"
                                                    id="excess_gl_eff_date" class="form-control"
                                                    placeholder="GL Effective Date">
                                                <label for="excess_gl_eff_date">GL Effective Date</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="excess_no_losses_5years"
                                                    id="excess_no_losses_5years" aria-label="excess_no_losses_5years">
                                                    <option value="0" selected>0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6+</option>
                                                </select>
                                                <label for="excess_no_losses_5years"># of Losses for the Past 5
                                                    Years</label>
                                            </div>
                                        </div>
                                        <div id="excess_no_losses_5years_container"></div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- EXCESS Stepper 2 -->
                                <div class="step" id="excess_step_2">
                                    <div class="question_title">
                                        <h3>Excess Liability Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="excess_insurance_carrier"
                                                    id="excess_insurance_carrier" class="form-control"
                                                    placeholder="Insurance Carrier" maxlength="100">
                                                <label for="excess_insurance_carrier">Insurance Carrier</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="excess_policy_or_quote_no"
                                                    id="excess_policy_or_quote_no" class="form-control"
                                                    placeholder="Policy Number / Quote Number" maxlength="50">
                                                <label for="excess_policy_or_quote_no">Policy Number / Quote
                                                    Number</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="excess_policy_premium"
                                                    id="excess_policy_premium" class="form-control"
                                                    placeholder="Policy Premium" maxlength="20">
                                                <label for="excess_policy_premium">Policy Premium</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="excess_effective_date"
                                                    id="excess_effective_date" class="form-control"
                                                    placeholder="MM/DD/YYYY">
                                                <label for="excess_effective_date">Effective Date</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="excess_expiration_date"
                                                    id="excess_expiration_date" class="form-control"
                                                    placeholder="MM/DD/YYYY">
                                                <label for="excess_expiration_date">Expiration Date</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- TOOLS Stepper 1 -->
                                <div class="step" id="tools_step_1">
                                    <div class="question_title">
                                        <h3>Tools & Equipment Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="tools_misc_tools" id="tools_misc_tools"
                                                    class="form-control" placeholder="$1,500 below">
                                                <label for="tools_misc_tools">Miscellaneous Tools Amount ($1,500 in
                                                    value
                                                    and under)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="tools_rented_or_leased_amt"
                                                    id="tools_rented_or_leased_amt" class="form-control"
                                                    placeholder="$">
                                                <label for="tools_rented_or_leased_amt">Rented / Leased Equipment
                                                    Amount</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="tools_sched_equipment"
                                                    id="tools_sched_equipment" class="form-control"
                                                    placeholder="$1,500 above">
                                                <label for="tools_sched_equipment">Scheduled Equipment ($1,500 in value
                                                    and
                                                    above)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="tools_equipment_type"
                                                    id="tools_equipment_type" class="form-control"
                                                    placeholder="Equipment Type" maxlength="100">
                                                <label for="tools_equipment_type">Equipment Type</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="tools_equipment_year"
                                                    id="tools_equipment_year" class="form-control" placeholder="YYYY"
                                                    maxlength="4">
                                                <label for="tools_equipment_year">Year</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="tools_equipment_make"
                                                    id="tools_equipment_make" class="form-control"
                                                    placeholder="Make" maxlength="100">
                                                <label for="tools_equipment_make">Make</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="tools_equipment_model"
                                                    id="tools_equipment_model" class="form-control"
                                                    placeholder="Model" maxlength="100">
                                                <label for="tools_equipment_model">Model</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="tools_equipment_vin_or_serial_no"
                                                    id="tools_equipment_vin_or_serial_no" class="form-control"
                                                    placeholder="VIN or Serial Number" maxlength="100">
                                                <label for="tools_equipment_vin_or_serial_no">VIN or Serial
                                                    Number</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="tools_equipment_valuation"
                                                    id="tools_equipment_valuation" class="form-control"
                                                    placeholder="Valuation" maxlength="100">
                                                <label for="tools_equipment_valuation">Valuation</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="tools_no_losses_5years"
                                                    id="tools_no_losses_5years" aria-label="tools_no_losses_5years">
                                                    <option value="0" selected>0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6+</option>
                                                </select>
                                                <label for="tools_no_losses_5years"># of Losses for the Past 5
                                                    Years</label>
                                            </div>
                                        </div>
                                        <div id="tools_no_losses_5years_container"></div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- BR Stepper 1 -->
                                <div class="step" id="br_step_1">
                                    <div class="question_title">
                                        <h3>Builder's Risk Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="br_property_address"
                                                    id="br_property_address" class="form-control"
                                                    placeholder="Property Address">
                                                <label for="br_property_address">Property Address</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="br_value_of_existing_structure"
                                                    id="br_value_of_existing_structure" class="form-control"
                                                    placeholder="Value of Existing Structure" maxlength="20">
                                                <label for="br_value_of_existing_structure">Value of Existing
                                                    Structure</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="br_value_of_work_performed"
                                                    id="br_value_of_work_performed" class="form-control"
                                                    placeholder="Value of Work Being Performed" maxlength="20">
                                                <label for="br_value_of_work_performed">Value of Work Being
                                                    Performed</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="br_period_duration_project"
                                                    id="br_period_duration_project"
                                                    aria-label="br_period_duration_project">
                                                    <option selected></option>
                                                    <option value="3">3 Months</option>
                                                    <option value="6">6 Months</option>
                                                    <option value="9">9 Months</option>
                                                    <option value="12 Months">12 Months</option>
                                                </select>
                                                <label for="br_period_duration_project">Period of Insurance / Duration
                                                    of
                                                    the Project</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- BR Stepper 2 -->
                                <div class="step" id="br_step_2">
                                    <div class="question_title">
                                        <h3>Builder's Risk Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="br_construction_type"
                                                    id="br_construction_type" aria-label="br_construction_type">
                                                    <option value="" selected></option>
                                                    <option value="Frame">Frame</option>
                                                    <option value="Joisted Masonry">Joisted Masonry</option>
                                                    <option value="Non-Combustible">Non-Combustible</option>
                                                    <option value="Masonry Non-Combustible">Masonry Non-Combustible
                                                    </option>
                                                    <option value="Modified Fire Resistive">Modified Fire Resistive
                                                    </option>
                                                    <option value="Fire Resistive">Fire Resistive</option>
                                                </select>
                                                <label for="br_construction_type">Construction Type</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Complete descriptions of
                                                operations for the project for which you are currently applying for
                                                insurance</h6>
                                            <div class="mb-3 form-floating">
                                                <textarea style="resize: none;" name="br_complete_descops_of_project" id="br_complete_descops_of_project"
                                                    class="form-control"
                                                    placeholder="Complete descriptions of operations for the project for which you are currently applying for insurance"></textarea>
                                                <label for="br_complete_descops_of_project">Please specify:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- BR Stepper 3 -->
                                <div class="step" id="br_step_3">
                                    <div class="question_title">
                                        <h3>Builder's Risk Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <h5 class="profession_header mt-2 mb-2">Description of Property Use Prior
                                            to Construction</h5>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="br_sq_footage" id="br_sq_footage"
                                                    class="form-control" placeholder="Square Footage"
                                                    maxlength="20">
                                                <label for="br_sq_footage">Square Footage</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="br_number_of_floors"
                                                    id="br_number_of_floors" class="form-control"
                                                    placeholder="Number of Floors" maxlength="20">
                                                <label for="br_number_of_floors">Number of Floors</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="br_number_of_units_dwelling"
                                                    id="br_number_of_units_dwelling" class="form-control"
                                                    placeholder="" maxlength="20">
                                                <label for="br_number_of_units_dwelling">Number of Units in
                                                    Dwelling</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="br_anticipated_occupancy"
                                                    id="br_anticipated_occupancy" class="form-control"
                                                    placeholder="" maxlength="20">
                                                <label for="br_anticipated_occupancy">What is the Anticipated
                                                    Occupancy</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="br_last_update_to_roofing_year"
                                                    id="br_last_update_to_roofing_year" class="form-control"
                                                    placeholder="" maxlength="20">
                                                <label for="br_last_update_to_roofing_year">Last Update to Roofing
                                                    Year</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="br_last_update_to_heating_year"
                                                    id="br_last_update_to_heating_year" class="form-control"
                                                    placeholder="" maxlength="20">
                                                <label for="br_last_update_to_heating_year">Last Update to Heating
                                                    Year</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="br_last_update_to_electrical_year"
                                                    id="br_last_update_to_electrical_year" class="form-control"
                                                    placeholder="" maxlength="20">
                                                <label for="br_last_update_to_electrical_year">Last Update to
                                                    Electrical Year</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="br_last_update_to_plumbing_year"
                                                    id="br_last_update_to_plumbing_year" class="form-control"
                                                    placeholder="" maxlength="20">
                                                <label for="br_last_update_to_plumbing_year">Last Update to Plumbing
                                                    Year</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="br_distance_to_nearest_fire_hydrant"
                                                    id="br_distance_to_nearest_fire_hydrant" class="form-control"
                                                    placeholder="" maxlength="20">
                                                <label for="br_distance_to_nearest_fire_hydrant">Distance to Nearest
                                                    Fire Hydrant</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="br_distance_to_nearest_fire_station"
                                                    id="br_distance_to_nearest_fire_station" class="form-control"
                                                    placeholder="" maxlength="20">
                                                <label for="br_distance_to_nearest_fire_station">Distance to Nearest
                                                    Fire Station</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text"
                                                    name="br_structure_occupied_remodel_renovation"
                                                    id="br_structure_occupied_remodel_renovation"
                                                    class="form-control" placeholder="" maxlength="20">
                                                <label for="br_structure_occupied_remodel_renovation">Will the
                                                    Structure be Occupied During the
                                                    Remodel/Renovation?</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- BR Stepper 4 -->
                                <div class="step" id="br_step_4">
                                    <div class="question_title">
                                        <h3>Builder's Risk Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="br_when_structure_built"
                                                    id="br_when_structure_built" class="form-control"
                                                    placeholder="" maxlength="20">
                                                <label for="br_when_structure_built">When was the structure
                                                    built?</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="br_jobsite_security"
                                                    id="br_jobsite_security" class="form-control" placeholder=""
                                                    maxlength="20">
                                                <label for="br_jobsite_security">Jobsite Security</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select"
                                                    name="br_scheduled_property_address_builders_risk_coverage"
                                                    id="br_scheduled_property_address_builders_risk_coverage"
                                                    aria-label="br_scheduled_property_address_builders_risk_coverage">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="br_scheduled_property_address_builders_risk_coverage">Has
                                                    the scheduled property address had any prior
                                                    Builder's Risk coverage?</label>
                                            </div>
                                        </div>
                                        <div id="br_scheduled_property_container"></div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="br_residential_commercial"
                                                    id="br_residential_commercial"
                                                    aria-label="br_residential_commercial">
                                                    <option value="" selected></option>
                                                    <option value="Residential">Residential</option>
                                                    <option value="Commercial">Commercial</option>
                                                </select>
                                                <label for="br_residential_commercial">Residential/Commercial</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="br_has_project_started"
                                                    id="br_has_project_started" aria-label="br_has_project_started">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="br_has_project_started">Has the project started?</label>
                                            </div>
                                        </div>
                                        <div id="br_project_started_container"></div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- BOP Stepper 1 -->
                                <div class="step" id="bop_step_1">
                                    <div class="question_title">
                                        <h3>Business Owner's Policy Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="bop_property_address"
                                                    id="bop_property_address" class="form-control"
                                                    placeholder="Property Address">
                                                <label for="bop_property_address">Property Address</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="bop_loss_payee_info"
                                                    id="bop_loss_payee_info" class="form-control"
                                                    placeholder="Loss Payee Information" maxlength="">
                                                <label for="bop_loss_payee_info">Loss Payee Information</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="bop_building_industry"
                                                    id="bop_building_industry" aria-label="bop_building_industry">
                                                    <option value="" selected></option>
                                                    <option value="Apartments & Condo Assoc">Apartments & Condo Assoc
                                                    </option>
                                                    <option value="Auto Repair / Service & Car Washes">Auto Repair /
                                                        Service & Car Washes</option>
                                                    <option value="Contractors & Landscapers">Contractors &
                                                        Landscapers</option>
                                                    <option value="Grocery, Convenience Store">Grocery, Convenience
                                                        Store</option>
                                                    <option value="Gas Stations">Gas Stations</option>
                                                    <option value="Offices">Offices</option>
                                                    <option value="Restaurants & Hotels">Restaurants & Hotels</option>
                                                    <option value="Retails Stores">Retails Stores</option>
                                                    <option value="Service Providers">Service Providers</option>
                                                    <option value="Wholesalers">Wholesalers</option>
                                                </select>
                                                <label for="bop_building_industry">Building Industry</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="bop_occupancy"
                                                    id="bop_occupancy" aria-label="bop_occupancy">
                                                    <option value="" selected></option>
                                                    <option value="Non-Owner Occupied Bldg/Lessors Risk">Non-Owner
                                                        Occupied Bldg/Lessors Risk</option>
                                                    <option value="Owner Occupied Bldg - 10% or Less">Owner Occupied
                                                        Bldg - 10% or Less</option>
                                                    <option value="Owner Occupied Bldg - More than 10%">Owner Occupied
                                                        Bldg - More than 10%</option>
                                                    <option value="Tenant">Tenant</option>
                                                </select>
                                                <label for="bop_occupancy">Occupancy (Who owns the
                                                    Building?)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="bop_val_cost_bldg"
                                                    id="bop_val_cost_bldg" class="form-control"
                                                    placeholder="Value of Cost of the
                                                    Building?"
                                                    maxlength="">
                                                <label for="bop_val_cost_bldg">Value of Cost of the
                                                    Building?</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="bop_business_property_limit"
                                                    id="bop_business_property_limit" class="form-control"
                                                    placeholder="What is the Business Property
                                                    Limit?"
                                                    maxlength="">
                                                <label for="bop_business_property_limit">What is the Business Property
                                                    Limit?</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- BOP Stepper 2 -->
                                <div class="step" id="bop_step_2">
                                    <div class="question_title">
                                        <h3>Business Owner's Policy Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <h5 class="profession_header mt-2 mb-2">What is the property contents?</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="bop_bldg_construction_type"
                                                    id="bop_bldg_construction_type"
                                                    aria-label="bop_bldg_construction_type">
                                                    <option value="" selected></option>
                                                    <option value="Frame">Frame</option>
                                                    <option value="Joisted Masonry">Joisted Masonry</option>
                                                    <option value="Non-Combustible">Non-Combustible</option>
                                                    <option value="Masonry Non-Combustible">Masonry Non-Combustible
                                                    </option>
                                                    <option value="Modified Fire Resistive">Modified Fire Resistive
                                                    </option>
                                                    <option value="Fire Resistive">Fire Resistive</option>
                                                </select>
                                                <label for="bop_bldg_construction_type">Building Construction
                                                    Type</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="bop_year_built" id="bop_year_built"
                                                    class="form-control" placeholder="Year Built" maxlength="">
                                                <label for="bop_year_built">Year Built</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="bop_no_of_stories"
                                                    id="bop_no_of_stories" class="form-control"
                                                    placeholder="No. of Stories" maxlength="">
                                                <label for="bop_no_of_stories">No. of Stories</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="bop_total_bldg_sqft"
                                                    id="bop_total_bldg_sqft" class="form-control"
                                                    placeholder="Total Building Sq. Ft." maxlength="">
                                                <label for="bop_total_bldg_sqft">Total Building Sq. Ft.</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- BOP Stepper 3 -->
                                <div class="step" id="bop_step_3">
                                    <div class="question_title">
                                        <h3>Business Owner's Policy Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <h5 class="profession_header mt-2 mb-2">Protective Safeguards - Fire:</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="bop_automatic_sprinkler_system"
                                                    id="bop_automatic_sprinkler_system"
                                                    aria-label="bop_automatic_sprinkler_system">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="bop_automatic_sprinkler_system">Automatic Sprinkler
                                                    System:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="bop_automatic_fire_alarm"
                                                    id="bop_automatic_fire_alarm"
                                                    aria-label="bop_automatic_fire_alarm">
                                                    <option value="" selected></option>
                                                    <option value="None">None</option>
                                                    <option value="Central Station">Central Station</option>
                                                    <option value="Local Alarm">Local Alarm</option>
                                                </select>
                                                <label for="bop_automatic_fire_alarm">Automatic Fire Alarm:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="bop_distance_nearest_fire_hydrant"
                                                    id="bop_distance_nearest_fire_hydrant" class="form-control"
                                                    placeholder="Distance to Nearest
                                                    Fire Hydrant:"
                                                    maxlength="">
                                                <label for="bop_distance_nearest_fire_hydrant">Distance to Nearest
                                                    Fire Hydrant:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="bop_distance_nearest_fire_station"
                                                    id="bop_distance_nearest_fire_station" class="form-control"
                                                    placeholder="Distance to Nearest
                                                    Fire Station:"
                                                    maxlength="">
                                                <label for="bop_distance_nearest_fire_station">Distance to Nearest
                                                    Fire Station:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="bop_automatic_comm_cooking_ext"
                                                    id="bop_automatic_comm_cooking_ext"
                                                    aria-label="bop_automatic_comm_cooking_ext">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                    <option value="Not Applicable">Not Applicable</option>
                                                </select>
                                                <label for="bop_automatic_comm_cooking_ext">Automatic Commercial
                                                    Cooking
                                                    Extinguishing System:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- BOP Stepper 4 -->
                                <div class="step" id="bop_step_4">
                                    <div class="question_title">
                                        <h3>Business Owner's Policy Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <h5 class="profession_header mt-2 mb-2">Protective Safeguards - Burglary and
                                        Robbery:</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="bop_automatic_burglar_alarm"
                                                    id="bop_automatic_burglar_alarm"
                                                    aria-label="bop_automatic_burglar_alarm">
                                                    <option value="" selected></option>
                                                    <option value="None">None</option>
                                                    <option value="Central or Police Station">Central or Police
                                                        Station</option>
                                                    <option value="Outside Siren Only">Outside Siren Only</option>
                                                </select>
                                                <label for="bop_automatic_burglar_alarm">Automatic Burglar
                                                    Alarm:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="bop_security_cameras"
                                                    id="bop_security_cameras" aria-label="bop_security_cameras">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="bop_security_cameras">Security Cameras:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="bop_last_update_roofing_year"
                                                    id="bop_last_update_roofing_year" class="form-control"
                                                    placeholder="Last Update to Roofing
                                                    Yr:"
                                                    maxlength="">
                                                <label for="bop_last_update_roofing_year">Last Update to Roofing
                                                    Yr:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="bop_last_update_heating_year"
                                                    id="bop_last_update_heating_year" class="form-control"
                                                    placeholder="Last Update to Heating
                                                    Yr:"
                                                    maxlength="">
                                                <label for="bop_last_update_heating_year">Last Update to Heating
                                                    Yr:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="bop_last_update_plumbing_year"
                                                    id="bop_last_update_plumbing_year" class="form-control"
                                                    placeholder="Last Update to Plumbing
                                                    Yr:"
                                                    maxlength="">
                                                <label for="bop_last_update_plumbing_year">Last Update to Plumbing
                                                    Yr:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="bop_last_update_electrical_year"
                                                    id="bop_last_update_electrical_year" class="form-control"
                                                    placeholder="Last Update to Electrical
                                                    Yr:"
                                                    maxlength="">
                                                <label for="bop_last_update_electrical_year">Last Update to Electrical
                                                    Yr:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- Commercial Property Stepper 1 -->
                                <div class="step" id="property_step_1">
                                    <div class="question_title">
                                        <h3>Commercial Property Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="property_business_located"
                                                    id="property_business_located"
                                                    aria-label="property_business_located">
                                                    <option value="" selected></option>
                                                    <option value="Home or Apartment">Home or Apartment</option>
                                                    <option value="Rented Commercial Space">Rented Commercial Space
                                                    </option>
                                                    <option value="Owned Commercial Space">Owned Commercial Space
                                                    </option>
                                                    <option value="Commercial space owned but rented to others">
                                                        Commercial space owned but rented to others</option>
                                                </select>
                                                <label for="property_business_located">Business Location is Located
                                                    in:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="property_property_address"
                                                    id="property_property_address" class="form-control"
                                                    placeholder="Property Address" />
                                                <label for="property_property_address">Property Address</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="property_name_of_owner"
                                                    id="property_name_of_owner" class="form-control"
                                                    placeholder="Name of the owner of the
                                                    Building" />
                                                <label for="property_name_of_owner">Name of the owner of the
                                                    building</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="property_value_cost_bldg"
                                                    id="property_value_cost_bldg" class="form-control"
                                                    placeholder="Value of Cost of the Building:" />
                                                <label for="property_value_cost_bldg">Value of Cost of the
                                                    Building:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="property_business_property_limit"
                                                    id="property_business_property_limit" class="form-control"
                                                    placeholder="What is the Business Property Limit?" />
                                                <label for="property_business_property_limit">What is the Business
                                                    Property Limit?</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- Commercial Property Stepper 2 -->
                                <div class="step" id="property_step_2">
                                    <div class="question_title">
                                        <h3>Commercial Property Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select"
                                                    name="property_does_have_more_than_one_location"
                                                    id="property_does_have_more_than_one_location"
                                                    aria-label="property_does_have_more_than_one_location">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="property_does_have_more_than_one_location">Do you have
                                                    more than one location?</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="property_multiple_units"
                                                    id="property_multiple_units"
                                                    aria-label="property_multiple_units">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="property_multiple_units">Are there multiple units
                                                    (residential or
                                                    commercial) in
                                                    your building:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="property_construction_type"
                                                    id="property_construction_type"
                                                    aria-label="property_construction_type">
                                                    <option value="" selected></option>
                                                    <option value="Frame">Frame</option>
                                                    <option value="Joisted Masonry">Joisted Masonry</option>
                                                    <option value="Non-Combustible">Non-Combustible</option>
                                                    <option value="Masonry Non-Combustible">Masonry Non-Combustible
                                                    </option>
                                                    <option value="Modified Fire Resistive">Modified Fire Resistive
                                                    </option>
                                                    <option value="Fire Resistive">Fire Resistive</option>
                                                </select>
                                                <label for="property_construction_type">Construction Type:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="property_year_built"
                                                    id="property_year_built" class="form-control"
                                                    placeholder="Year Built:" />
                                                <label for="property_year_built">Year Built:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="property_no_of_stories"
                                                    id="property_no_of_stories" class="form-control"
                                                    placeholder="No. of Stories:" />
                                                <label for="property_no_of_stories">No. of Stories:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="property_total_bldg_sqft"
                                                    id="property_total_bldg_sqft" class="form-control"
                                                    placeholder="Total Building Square
                                                    Footage:" />
                                                <label for="property_total_bldg_sqft">Total Building Square
                                                    Footage:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select"
                                                    name="property_is_bldg_equipped_with_fire_sprinklers"
                                                    id="property_is_bldg_equipped_with_fire_sprinklers"
                                                    aria-label="property_is_bldg_equipped_with_fire_sprinklers">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="property_is_bldg_equipped_with_fire_sprinklers">Is your
                                                    building equipped with fire
                                                    sprinklers?</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="property_distance_nearest_fire_hydrant"
                                                    id="property_distance_nearest_fire_hydrant" class="form-control"
                                                    placeholder="Distance to
                                                    Nearest Fire Hydrant:" />
                                                <label for="property_distance_nearest_fire_hydrant">Distance to
                                                    Nearest Fire Hydrant:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="property_distance_nearest_fire_station"
                                                    id="property_distance_nearest_fire_station" class="form-control"
                                                    placeholder="Distance to
                                                    Nearest Fire Station:" />
                                                <label for="property_distance_nearest_fire_station">Distance to
                                                    Nearest Fire Station:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="property_protection_class"
                                                    id="property_protection_class"
                                                    aria-label="property_protection_class">
                                                    <option value="" selected></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                </select>
                                                <label for="property_protection_class">Protection Class:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- Commercial Property Stepper 3 -->
                                <div class="step" id="property_step_3">
                                    <div class="question_title">
                                        <h3>Commercial Property Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="property_protective_device"
                                                    id="property_protective_device"
                                                    aria-label="property_protective_device">
                                                    <option value="" selected></option>
                                                    <option value="Local Burglar Alarm">Local Burglar Alarm</option>
                                                    <option value="Central Burglar Alarm">Central Burglar Alarm
                                                    </option>
                                                    <option value="Local Fire Alarm">Local Fire Alarm</option>
                                                    <option value="Central Fire Alarm">Central Fire Alarm</option>
                                                    <option value="Fenced">Fenced</option>
                                                    <option value="CCTV">CCTV</option>
                                                </select>
                                                <label for="property_protective_device">Select any protective devices
                                                    you have:</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="property_last_update_roofing_year"
                                                    id="property_last_update_roofing_year" class="form-control"
                                                    placeholder="Last Update to Roofing Year:" />
                                                <label for="property_last_update_roofing_year">Last Update to Roofing
                                                    Year:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="property_last_update_heating_year"
                                                    id="property_last_update_heating_year" class="form-control"
                                                    placeholder="Last Update to Heating Year:" />
                                                <label for="property_last_update_heating_year">Last Update to Heating
                                                    Year:</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="property_last_update_plumbing_year"
                                                    id="property_last_update_plumbing_year" class="form-control"
                                                    placeholder="Last Update to Plumbing Year:" />
                                                <label for="property_last_update_plumbing_year">Last Update to
                                                    Plumbing Year:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="property_last_update_electrical_year"
                                                    id="property_last_update_electrical_year" class="form-control"
                                                    placeholder="Last Update to Electrical Year:" />
                                                <label for="property_last_update_electrical_year">Last Update to
                                                    Electrical Year:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- Errors and Omission Stepper 1 -->
                                <div class="step" id="eo_step_1">
                                    <div class="question_title">
                                        <h3>Errors and Omission</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="eo_requested_limits"
                                                    id="eo_requested_limits" aria-label="">
                                                    <option value="" selected></option>
                                                    <option value="100000">$100,000</option>
                                                    <option value="250000">$250,000</option>
                                                    <option value="300000">$300,000</option>
                                                    <option value="500000">$500,000</option>
                                                    <option value="1000000">$1,000,000</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                                <label for="eo_requested_limits">Requested Limits:</label>
                                            </div>
                                        </div>
                                        <div id="eo_requested_limits_others_container"></div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="eo_request_deductible"
                                                    id="eo_request_deductible" aria-label="">
                                                    <option value="" selected></option>
                                                    <option value="5000">$5,000</option>
                                                    <option value="10000">$10,000</option>
                                                    <option value="25000">$25,000</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                                <label for="eo_request_deductible">Requested Deductible (Per
                                                    Claim):</label>
                                            </div>
                                        </div>
                                        <div id="eo_requested_deductible_others_container"></div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- Errors and Omission Stepper 2 -->
                                <div class="step" id="eo_step_2">
                                    <div class="question_title">
                                        <h3>Errors and Omission</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <h5 class="profession_header mt-2 mb-2">Business Entity</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Has the name or ownership of the
                                                entity changed
                                                within
                                                the last 5 years?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="eo_business_entity_q1"
                                                    id="eo_business_entity_q1" aria-label="">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="eo_business_entity_q1">Please select:</label>
                                            </div>
                                        </div>
                                        <div id="eo_business_entity_q1_container"></div>
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Has any other business been
                                                purchased merged or
                                                consolidated with the entity within the last 5
                                                years?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="eo_business_entity_q2"
                                                    id="eo_business_entity_q2" aria-label="">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="eo_business_entity_q2">Please select:</label>
                                            </div>
                                        </div>
                                        <div id="eo_business_entity_q2_container"></div>
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Does any other entity own or
                                                control your
                                                business?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="eo_business_entity_q3"
                                                    id="eo_business_entity_q3" aria-label="">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="eo_business_entity_q3">Please select:</label>
                                            </div>
                                        </div>
                                        <div id="eo_business_entity_q3_container"></div>
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Has your company name been changed
                                                during the
                                                past 5
                                                years?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="eo_business_entity_q4"
                                                    id="eo_business_entity_q4" aria-label="">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="eo_business_entity_q4">Please select:</label>
                                            </div>
                                        </div>
                                        <div id="eo_business_entity_q4_container"></div>
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Has any other business purchased,
                                                merged or
                                                consolidated with you during the past 5 years?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="eo_business_entity_q5"
                                                    id="eo_business_entity_q5" aria-label="">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="eo_business_entity_q5">Please select:</label>
                                            </div>
                                        </div>
                                        <div id="eo_business_entity_q5_container"></div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- Errors and Omission Stepper 3 -->
                                <div class="step" id="eo_step_3">
                                    <div class="question_title">
                                        <h3>Errors and Omission</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <h5 class="profession_header mt-2 mb-2">Employees</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="eo_number_employee"
                                                    id="eo_number_employee" class="form-control"
                                                    placeholder="Number of Employees:" />
                                                <label for="eo_number_employee">Number of Employees:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="eo_full_time" id="eo_full_time"
                                                    class="form-control" placeholder="Full Time:" />
                                                <label for="eo_full_time">Full Time:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="eo_ftime_salary_range"
                                                    id="eo_ftime_salary_range" class="form-control"
                                                    placeholder="Salary Range:" />
                                                <label for="eo_ftime_salary_range">Salary Range:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="eo_part_time" id="eo_part_time"
                                                    class="form-control" placeholder="Part Time:" />
                                                <label for="eo_part_time">Part Time:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="eo_ptime_salary_range"
                                                    id="eo_ptime_salary_range" class="form-control"
                                                    placeholder="Salary Range:" />
                                                <label for="eo_ptime_salary_range">Salary Range:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- Errors and Omission Stepper 4 -->
                                <div class="step" id="eo_step_4">
                                    <div class="question_title">
                                        <h3>Errors and Omission</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <h5 class="profession_header mt-2 mb-2">Employment Practices</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Has the applicant total number of
                                                employees
                                                decreased
                                                by more than ten percent (10) due to lay off, force
                                                reduction of closing of division in the past 1 year?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="eo_emp_practice_q1"
                                                    id="eo_emp_practice_q1" aria-label="">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="eo_emp_practice_q1">Please select:
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- Errors and Omission Stepper 5 -->
                                <div class="step" id="eo_step_5">
                                    <div class="question_title">
                                        <h3>Errors and Omission</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <h5 class="profession_header mt-2 mb-2">Human Resources</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Does the Applicant have written
                                                employment
                                                agreements
                                                with all officers?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="eo_hr_q1" id="eo_hr_q1"
                                                    aria-label="eo_hr_q1">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="eo_hr_q1">Please select:</label>
                                            </div>
                                        </div>
                                        <div id="eo_hr_q1_container"></div>
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Does the Applicant have its
                                                employment
                                                policies/procedures reviewed by labor or employment
                                                counsel?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="eo_hr_q2" id="eo_hr_q2"
                                                    aria-label="eo_hr_q2">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="eo_hr_q2">Please select:</label>
                                            </div>
                                        </div>
                                        <div id="eo_hr_q2_container"></div>
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Does the Applicant have a Human
                                                Resources or
                                                Personnel
                                                Department?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="eo_hr_q3" id="eo_hr_q3"
                                                    aria-label="eo_hr_q3">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="eo_hr_q3">Please select:</label>
                                            </div>
                                        </div>
                                        <div id="eo_hr_q3_container"></div>
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Does the Applicant have an
                                                employee handbook?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="eo_hr_q4" id="eo_hr_q4"
                                                    aria-label="eo_hr_q4">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="eo_hr_q4">Please select:</label>
                                            </div>
                                        </div>
                                        <div id="eo_hr_q4_container"></div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- POLLUTION Stepper 1 -->
                                <div class="step" id="pollution_step_1">
                                    <div class="question_title">
                                        <h3>Pollution Liability Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="pollution_profession"
                                                    id="pollution_profession" aria-label="pollution_profession">
                                                    @foreach ($professions as $profession)
                                                        <option value="{{ $profession['id'] }}">
                                                            {{ $profession['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="pollution_profession">Select a Profession</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="pollution_residential"
                                                    id="pollution_residential" aria-label="pollution_residential">
                                                    <option value selected></option>
                                                    <option value="0">0%</option>
                                                    <option value="5">5%</option>
                                                    <option value="10">10%</option>
                                                    <option value="15">15%</option>
                                                    <option value="20">20%</option>
                                                    <option value="25">25%</option>
                                                    <option value="30">30%</option>
                                                    <option value="35">35%</option>
                                                    <option value="40">40%</option>
                                                    <option value="45">45%</option>
                                                    <option value="50">50%</option>
                                                    <option value="55">55%</option>
                                                    <option value="60">60%</option>
                                                    <option value="65">65%</option>
                                                    <option value="70">70%</option>
                                                    <option value="75">75%</option>
                                                    <option value="80">80%</option>
                                                    <option value="85">85%</option>
                                                    <option value="90">90%</option>
                                                    <option value="95">95%</option>
                                                    <option value="100">100%</option>
                                                </select>
                                                <label for="pollution_residential">Residential %</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="pollution_commercial"
                                                    id="pollution_commercial" aria-label="pollution_commercial">
                                                    <option value selected></option>
                                                    <option value="0">0%</option>
                                                    <option value="5">5%</option>
                                                    <option value="10">10%</option>
                                                    <option value="15">15%</option>
                                                    <option value="20">20%</option>
                                                    <option value="25">25%</option>
                                                    <option value="30">30%</option>
                                                    <option value="35">35%</option>
                                                    <option value="40">40%</option>
                                                    <option value="45">45%</option>
                                                    <option value="50">50%</option>
                                                    <option value="55">55%</option>
                                                    <option value="60">60%</option>
                                                    <option value="65">65%</option>
                                                    <option value="70">70%</option>
                                                    <option value="75">75%</option>
                                                    <option value="80">80%</option>
                                                    <option value="85">85%</option>
                                                    <option value="90">90%</option>
                                                    <option value="95">95%</option>
                                                    <option value="100">100%</option>
                                                </select>
                                                <label for="gl_commercial">Commercial %</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="pollution_new_construction"
                                                    id="pollution_new_construction"
                                                    aria-label="pollution_new_construction">
                                                    <option value selected></option>
                                                    <option value="0">0%</option>
                                                    <option value="5">5%</option>
                                                    <option value="10">10%</option>
                                                    <option value="15">15%</option>
                                                    <option value="20">20%</option>
                                                    <option value="25">25%</option>
                                                    <option value="30">30%</option>
                                                    <option value="35">35%</option>
                                                    <option value="40">40%</option>
                                                    <option value="45">45%</option>
                                                    <option value="50">50%</option>
                                                    <option value="55">55%</option>
                                                    <option value="60">60%</option>
                                                    <option value="65">65%</option>
                                                    <option value="70">70%</option>
                                                    <option value="75">75%</option>
                                                    <option value="80">80%</option>
                                                    <option value="85">85%</option>
                                                    <option value="90">90%</option>
                                                    <option value="95">95%</option>
                                                    <option value="100">100%</option>
                                                </select>
                                                <label for="pollution_new_construction">New Construction %</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="pollution_repair_remodel"
                                                    id="pollution_repair_remodel"
                                                    aria-label="pollution_repair_remodel">
                                                    <option value selected></option>
                                                    <option value="0">0%</option>
                                                    <option value="5">5%</option>
                                                    <option value="10">10%</option>
                                                    <option value="15">15%</option>
                                                    <option value="20">20%</option>
                                                    <option value="25">25%</option>
                                                    <option value="30">30%</option>
                                                    <option value="35">35%</option>
                                                    <option value="40">40%</option>
                                                    <option value="45">45%</option>
                                                    <option value="50">50%</option>
                                                    <option value="55">55%</option>
                                                    <option value="60">60%</option>
                                                    <option value="65">65%</option>
                                                    <option value="70">70%</option>
                                                    <option value="75">75%</option>
                                                    <option value="80">80%</option>
                                                    <option value="85">85%</option>
                                                    <option value="90">90%</option>
                                                    <option value="95">95%</option>
                                                    <option value="100">100%</option>
                                                </select>
                                                <label for="pollution_repair_remodel">Repair/Remodel %</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <textarea style="resize: none;" name="pollution_descops" id="pollution_descops" class="form-control"
                                                    placeholder="Detailed Description of
                                                    Operations"></textarea>
                                                <label for="pollution_descops">Detailed Description of
                                                    Operations</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="pollution_cost_proj_5years"
                                                    id="pollution_cost_proj_5years" class="form-control"
                                                    placeholder="Cost of the Largest Project in
                                                    the
                                                    past 5 years?"
                                                    maxlength="20">
                                                <label for="pollution_cost_proj_5years">Cost of the Largest Project in
                                                    the
                                                    past 5 years?</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- POLLUTION Stepper 2 -->
                                <div class="step" id="pollution_step_2">
                                    <div class="question_title">
                                        <h3>Pollution Liability Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="pollution_annual_gross"
                                                    id="pollution_annual_gross" class="form-control"
                                                    placeholder="Annual Gross Receipts">
                                                <label for="pollution_annual_gross">Annual Gross Receipts</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="pollution_no_field_emp"
                                                    id="pollution_no_field_emp" class="form-control"
                                                    placeholder="Number of Field Employees">
                                                <label for="pollution_no_field_emp">Number of Field Employees</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="pollution_payroll_amt"
                                                    id="pollution_payroll_amt" class="form-control"
                                                    placeholder="Payroll Amount">
                                                <label for="pollution_payroll_amt">Payroll Amount</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="pollution_using_subcon"
                                                    id="pollution_using_subcon" aria-label="pollution_using_subcon">
                                                    <option value selected></option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                                <label for="pollution_using_subcon">Are you using any
                                                    subcontractor?</label>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div id="pollution_subcon_cost_container"></div>
                                        <!--  -->
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="pollution_no_losses_5years"
                                                    id="pollution_no_losses_5years"
                                                    aria-label="pollution_no_losses_5years">
                                                    <option value selected></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6+</option>
                                                </select>
                                                <label for="pollution_no_losses_5years"># of Losses for the Past 5
                                                    Years</label>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div id="pollution_explain_losses_container"></div>
                                        <!--  -->
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- EPLI Stepper 1 -->
                                <div class="step" id="epli_step_1">
                                    <div class="question_title">
                                        <h3>Employment Practices Liability Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_fein" id="epli_fein"
                                                    class="form-control" placeholder="FEIN No.:" maxlength="" />
                                                <label for="epli_fein">FEIN No.:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_current_epli"
                                                    id="epli_current_epli" class="form-control"
                                                    placeholder="Current EPLI:" maxlength="" />
                                                <label for="epli_current_epli">Current EPLI:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_prior_carrier"
                                                    id="epli_prior_carrier" class="form-control"
                                                    placeholder="Prior Carrier:" maxlength="" />
                                                <label for="epli_prior_carrier">Prior Carrier:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_prior_carrier_epli"
                                                    id="epli_prior_carrier_epli" class="form-control"
                                                    placeholder="Prior Carrier EPLI:" maxlength="" />
                                                <label for="epli_prior_carrier_epli">Prior Carrier EPLI:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_effective_date"
                                                    id="epli_effective_date" class="form-control"
                                                    placeholder="Effective Date:" maxlength="" />
                                                <label for="epli_effective_date">Effective Date:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_prev_premium_amount"
                                                    id="epli_prev_premium_amount" class="form-control"
                                                    placeholder="Previous Premium Amount:" maxlength="" />
                                                <label for="epli_prev_premium_amount">Previous Premium Amount:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_deductible_amount"
                                                    id="epli_deductible_amount" class="form-control"
                                                    placeholder="Deductible Amount:" maxlength="" />
                                                <label for="epli_deductible_amount">Deductible Amount:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- EPLI Stepper 2 -->
                                <div class="step" id="epli_step_2">
                                    <div class="question_title">
                                        <h3>Employment Practices Liability Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <h5 class="profession_header mt-2 mb-2">How many employees are:</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_full_time" id="epli_full_time"
                                                    class="form-control" placeholder="Full Time:"
                                                    maxlength="" />
                                                <label for="epli_full_time">Full Time:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_part_time" id="epli_part_time"
                                                    class="form-control" placeholder="Part Time:"
                                                    maxlength="" />
                                                <label for="epli_part_time">Part Time:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_independent_contractors"
                                                    id="epli_independent_contractors" class="form-control"
                                                    placeholder="Independent Contractors:" maxlength="" />
                                                <label for="epli_independent_contractors">Independent
                                                    Contractors:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_volunteers" id="epli_volunteers"
                                                    class="form-control" placeholder="Volunteers:"
                                                    maxlength="" />
                                                <label for="epli_volunteers">Volunteers:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_leased_seasonal"
                                                    id="epli_leased_seasonal" class="form-control"
                                                    placeholder="Leased or Seasonal:" maxlength="" />
                                                <label for="epli_leased_seasonal">Leased or Seasonal:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_non_us_base_emp"
                                                    id="epli_non_us_base_emp" class="form-control"
                                                    placeholder="Non-US base Emp.:" maxlength="" />
                                                <label for="epli_non_us_base_emp">Non-US base Emp.:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_total_employees"
                                                    id="epli_total_employees" class="form-control"
                                                    placeholder="Total Employees:" maxlength="" />
                                                <label for="epli_total_employees">Total Employees:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- EPLI Stepper 3 -->
                                <div class="step" id="epli_step_3">
                                    <div class="question_title">
                                        <h3>Employment Practices Liability Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <h5 class="profession_header mt-2 mb-2">How many employees are located at:</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_located_at_ca"
                                                    id="epli_located_at_ca" class="form-control" placeholder="CA:"
                                                    maxlength="" />
                                                <label for="epli_located_at_ca">CA:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_located_at_ga"
                                                    id="epli_located_at_ga" class="form-control" placeholder="GA:"
                                                    maxlength="" />
                                                <label for="epli_located_at_ga">GA:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_located_at_tx"
                                                    id="epli_located_at_tx" class="form-control" placeholder="TX:"
                                                    maxlength="" />
                                                <label for="epli_located_at_tx">TX:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_located_at_fl"
                                                    id="epli_located_at_fl" class="form-control" placeholder="FL:"
                                                    maxlength="" />
                                                <label for="epli_located_at_fl">FL:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_located_at_ny"
                                                    id="epli_located_at_ny" class="form-control" placeholder="NY:"
                                                    maxlength="" />
                                                <label for="epli_located_at_ny">NY:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_located_at_nj"
                                                    id="epli_located_at_nj" class="form-control" placeholder="NJ:"
                                                    maxlength="" />
                                                <label for="epli_located_at_nj">NJ:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- EPLI Stepper 4 -->
                                <div class="step" id="epli_step_4">
                                    <div class="question_title">
                                        <h3>Employment Practices Liability Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <h5 class="profession_header mt-2 mb-2">How many percent of employees are in the
                                        salary range of:</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_salary_range_q1"
                                                    id="epli_salary_range_q1" class="form-control"
                                                    placeholder="Up to $60,000:" maxlength="" />
                                                <label for="epli_salary_range_q1">Up to $60,000:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_salary_range_q2"
                                                    id="epli_salary_range_q2" class="form-control"
                                                    placeholder="$60,000 - $120,000:" maxlength="" />
                                                <label for="epli_salary_range_q2">$60,000 - $120,000:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_salary_range_q3"
                                                    id="epli_salary_range_q3" class="form-control"
                                                    placeholder="Over $120,000:" maxlength="" />
                                                <label for="epli_salary_range_q3">Over $120,000:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- EPLI Stepper 5 -->
                                <div class="step" id="epli_step_5">
                                    <div class="question_title">
                                        <h3>Employment Practices Liability Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <h5 class="profession_header mt-2 mb-2">How many employees have been terminated in
                                        the last 12 months:</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_emp_terminated_last_12_months_q1"
                                                    id="epli_emp_terminated_last_12_months_q1" class="form-control"
                                                    placeholder="Voluntary:" maxlength="" />
                                                <label for="epli_emp_terminated_last_12_months_q1">Voluntary:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_emp_terminated_last_12_months_q2"
                                                    id="epli_emp_terminated_last_12_months_q2" class="form-control"
                                                    placeholder="Involuntary:" maxlength="" />
                                                <label
                                                    for="epli_emp_terminated_last_12_months_q2">Involuntary:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="epli_emp_terminated_last_12_months_q3"
                                                    id="epli_emp_terminated_last_12_months_q3" class="form-control"
                                                    placeholder="Laid-Off:" maxlength="" />
                                                <label for="epli_emp_terminated_last_12_months_q3">Laid-Off:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- EPLI Stepper 6 -->
                                <div class="step" id="epli_step_6">
                                    <div class="question_title">
                                        <h3>Employment Practices Liability Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <h5 class="profession_header mt-2 mb-2">Human Resource Policies and Procedures:
                                    </h5>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Does the Applicant have a standard
                                                employment application for all applicants?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="epli_hr_q1" id="epli_hr_q1"
                                                    aria-label="epli_hr_q1">
                                                    <option value selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="epli_hr_q1">Please select:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Does the Applicant have an "At
                                                Will" provision in the employment application?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="epli_hr_q2" id="epli_hr_q2"
                                                    aria-label="epli_hr_q2">
                                                    <option value selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="epli_hr_q2">Please select:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Does the Applicant have an
                                                employment handbook?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="epli_hr_q3" id="epli_hr_q3"
                                                    aria-label="epli_hr_q3">
                                                    <option value selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="epli_hr_q3">Please select:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Does the Applicant have a written
                                                policy with respect to sexual harassment?
                                            </h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="epli_hr_q4" id="epli_hr_q4"
                                                    aria-label="epli_hr_q4">
                                                    <option value selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="epli_hr_q4">Please select:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Does the Applicant have a written
                                                policy with respect to discrimination?
                                            </h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="epli_hr_q5" id="epli_hr_q5"
                                                    aria-label="epli_hr_q5">
                                                    <option value selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="epli_hr_q5">Please select:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Does the Applicant have written
                                                annual evaluations for employees?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="epli_hr_q6" id="epli_hr_q6"
                                                    aria-label="">
                                                    <option value selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="epli_hr_q6">Please select:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- Cyber Liability Stepper 1 -->
                                <div class="step" id="cyber_step_1">
                                    <div class="question_title">
                                        <h3>Cyber Liability Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="cyber_it_contact_name"
                                                    id="cyber_it_contact_name" class="form-control"
                                                    placeholder="IT Contact Name:" maxlength="" />
                                                <label for="cyber_it_contact_name">IT Contact Name:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="cyber_it_contact_number"
                                                    id="cyber_it_contact_number" class="form-control"
                                                    placeholder="IT Contact Number:" maxlength="" />
                                                <label for="cyber_it_contact_number">IT Contact Number:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="email" name="cyber_it_contact_email"
                                                    id="cyber_it_contact_email" class="form-control"
                                                    placeholder="IT Contact Email:" maxlength="" />
                                                <label for="cyber_it_contact_email">IT Contact Email:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- Cyber Liability Stepper 2 -->
                                <div class="step" id="cyber_step_2">
                                    <div class="question_title">
                                        <h3>Cyber Liability Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <h6 class="profession_header mt-2 mb-2">Are you engaged in any
                                            of the following
                                            business
                                            activities?</h6>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="cyber_engaged_business_activities"
                                                    id="cyber_engaged_business_activities" aria-label="">
                                                    <option value="" selected></option>
                                                    <option value="Adult Content">Adult Content</option>
                                                    <option value="Cannabis">Cannabis</option>
                                                    <option value="Cryptocurrency or Blockchain">
                                                        Cryptocurrency or Blockchain
                                                    </option>
                                                    <option value="Gambling">Gambling</option>
                                                    <option value="Payment Processing">
                                                        Payment Processing
                                                    </option>
                                                    <option value="Debt Collection Agency">
                                                        Debt Collection Agency
                                                    </option>
                                                    <option value="Managed IT Service Provider (MSP or MSSP)">
                                                        Managed IT Service Provider (MSP or MSSP)
                                                    </option>
                                                    <option value="None of the above">
                                                        None of the above
                                                    </option>
                                                </select>
                                                <label for="cyber_engaged_business_activities">Please select:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Is there a system in place for
                                                verifying
                                                fund and wire
                                                transfers over $25,000 through a secondary means of
                                                communication prior to execution?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="cyber_q1" id="cyber_q1"
                                                    aria-label="cyber_q1">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="cyber_q1">Please select:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Do you store your backups offline
                                                or
                                                with a cloud
                                                service provider?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="cyber_q2" id="cyber_q2"
                                                    aria-label="cyber_q2">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="cyber_q2">Please select:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Do you store or process personal,
                                                health, or credit
                                                card information of more than 500,000
                                                Individuals?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="cyber_q3" id="cyber_q3"
                                                    aria-label="cyber_q3">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="cyber_q3">Please select:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Do you enabled multi-factor
                                                authentication for email
                                                access and remote network access?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="cyber_q4" id="cyber_q4"
                                                    aria-label="cyber_q4">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="cyber_q4">Please select:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Do you encrypt all sensitive
                                                information
                                                at rest?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="cyber_q5" id="cyber_q5"
                                                    aria-label="cyber_q5">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="cyber_q5">Please select:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Any relevant claims or incidents
                                                exceeding $10,000
                                                within the past three years?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="cyber_q6" id="cyber_q6"
                                                    aria-label="cyber_q6">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="cyber_q6">Please select:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Would there be any potential Cyber
                                                Event, Loss, or
                                                claim that could fall within the scope of the policy you
                                                are applying for?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="cyber_q7" id="cyber_q7"
                                                    aria-label="cyber_q7">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="cyber_q7">Please select:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- Installation Floater Stepper 1 -->
                                <div class="step" id="instfloat_step_1">
                                    <div class="question_title">
                                        <h3>Installation Floater Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="instfloat_territory_of_operation"
                                                    id="instfloat_territory_of_operation"
                                                    aria-label="instfloat_territory_of_operation">
                                                    <option value selected></option>
                                                    @foreach ($states as $state)
                                                        <option value="{{ $state['state_abbr'] }}">
                                                            {{ $state['state_abbr'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="instfloat_territory_of_operation">Territory of
                                                    Operation:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="instfloat_type_of_operation"
                                                    id="instfloat_type_of_operation" class="form-control"
                                                    placeholder="Type of Operation:" maxlength="" />
                                                <label for="instfloat_type_of_operation">Type of Operation:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="instfloat_scheduled_type_of_equipment"
                                                    id="instfloat_scheduled_type_of_equipment" class="form-control"
                                                    placeholder="Type of Equipment / materials you will
                                                    be working
                                                    with:"
                                                    maxlength="" />
                                                <label for="instfloat_scheduled_type_of_equipment">Type of Equipment /
                                                    materials
                                                    you will
                                                    be working
                                                    with:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="instfloat_deductible_amount"
                                                    id="instfloat_deductible_amount"
                                                    aria-label="instfloat_deductible_amount">
                                                    <option value selected></option>
                                                    <option value="500-1000">$500 - $1,000</option>
                                                    <option value="2500">$2,500</option>
                                                    <option value="5000">$5,000</option>
                                                    <option value="10000">$10,000</option>
                                                </select>
                                                <label for="instfloat_deductible_amount">Deductible Amount:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- Installation Floater Stepper 2 -->
                                <div class="step" id="instfloat_step_2">
                                    <div class="question_title">
                                        <h3>Installation Floater Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <h5 class="profession_header mt-2 mb-2">Equipment Storage:</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="instfloat_location"
                                                    id="instfloat_location" class="form-control"
                                                    placeholder="Location:" maxlength="" />
                                                <label for="instfloat_location">Location:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="instfloat_months_in_storage"
                                                    id="instfloat_months_in_storage"
                                                    aria-label="instfloat_months_in_storage">
                                                    <option value selected></option>
                                                    <option value="1 month">1 month</option>
                                                    <option value="2 months">2 months</option>
                                                    <option value="3 months">3 months</option>
                                                    <option value="4 months">4 months</option>
                                                    <option value="5 months">5 months</option>
                                                    <option value="6 months">6 months</option>
                                                    <option value="7 months">7 months</option>
                                                    <option value="8 months">8 months</option>
                                                    <option value="9 months">9 months</option>
                                                    <option value="10 months">10 months</option>
                                                    <option value="11 months">11 months</option>
                                                    <option value="12 months">12 months</option>
                                                </select>
                                                <label for="instfloat_months_in_storage">Months in storage:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="instfloat_max_value_of_equipment"
                                                    id="instfloat_max_value_of_equipment" class="form-control"
                                                    placeholder="Maximum Value of equipment that you will
                                                    be
                                                    storing:"
                                                    maxlength="" />
                                                <label for="instfloat_max_value_of_equipment">Maximum Value of
                                                    equipment that you will
                                                    be
                                                    storing:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="instfloat_max_value_of_bldg_storage"
                                                    id="instfloat_max_value_of_bldg_storage" class="form-control"
                                                    placeholder="Maximum Value of Building
                                                    storage:"
                                                    maxlength="" />
                                                <label for="instfloat_max_value_of_bldg_storage">Maximum Value of
                                                    Building
                                                    storage:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="instfloat_type_security_placed"
                                                    id="instfloat_type_security_placed"
                                                    aria-label="instfloat_type_security_placed">
                                                    <option value selected></option>
                                                    <option value="500-1000">$500 - $1,000</option>
                                                    <option value="2500">$2,500</option>
                                                    <option value="5000">$5,000</option>
                                                    <option value="10000">$10,000</option>
                                                </select>
                                                <label for="instfloat_type_security_placed">Type of Security in place
                                                    withing the
                                                    storage
                                                    building:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- Installation Floater Stepper 3 -->
                                <div class="step" id="instfloat_step_3">
                                    <div class="question_title">
                                        <h3>Installation Floater Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <h5 class="profession_header mt-2 mb-2">Unscheduled Equipment for Storage:</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="instfloat_unscheduled_type_of_equipment"
                                                    id="instfloat_unscheduled_type_of_equipment"
                                                    class="form-control"
                                                    placeholder="Type of Equipment / materials you will
                                                    be working with:"
                                                    maxlength="" />
                                                <label for="instfloat_unscheduled_type_of_equipment">Type of
                                                    Equipment / materials you will
                                                    be working with:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text"
                                                    name="instfloat_unscheduled_max_value_equipment_storing"
                                                    id="instfloat_unscheduled_max_value_equipment_storing"
                                                    class="form-control"
                                                    placeholder="Maximum Value of equipment that you will be
                                                    storing:"
                                                    maxlength="" />
                                                <label for="instfloat_unscheduled_max_value_equipment_storing">Maximum
                                                    Value of
                                                    equipment that you will be
                                                    storing:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- Installation Floater Stepper 4 -->
                                <div class="step" id="instfloat_step_4">
                                    <div class="question_title">
                                        <h3>Installation Floater Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>
                                    <h5 class="profession_header mt-2 mb-2">Additional Information:</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Equipment Rented. Loaned to/from
                                                Others with or without Operators?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="instfloat_additional_info_q1"
                                                    id="instfloat_additional_info_q1"
                                                    aria-label="instfloat_additional_info_q1">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="instfloat_additional_info_q1">Please select:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Are you Operating Equipment not
                                                listed here?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="instfloat_additional_info_q2"
                                                    id="instfloat_additional_info_q2"
                                                    aria-label="instfloat_additional_info_q2">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="instfloat_additional_info_q2">Please select:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Property used underground?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="instfloat_additional_info_q3"
                                                    id="instfloat_additional_info_q3"
                                                    aria-label="instfloat_additional_info_q3">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="instfloat_additional_info_q3">Please select:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <h6 class="profession_header mt-2 mb-2">Any work done afloat?</h6>
                                            <div class="mb-3 form-floating">
                                                <select class="form-select" name="instfloat_additional_info_q4"
                                                    id="instfloat_additional_info_q4"
                                                    aria-label="instfloat_additional_info_q4">
                                                    <option value="" selected></option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                <label for="instfloat_additional_info_q4">Please select:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- Installation Floater Stepper 5 -->
                                <div class="step" id="instfloat_step_5">
                                    <div class="question_title">
                                        <h3>Installation Floater Application</h3>
                                        <p>Please provide the requested information and proceed.</p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h5 class="profession_header mt-2 mb-2">Scheduled Equipment for storage:</h5>
                                        <button id="add_sched_equipment_entry" class="btn_2">+</button>
                                    </div>
                                    <div class="row justify-content-center">
                                        <h6 class="profession_header mt-2 mb-2">Scheduled Equipment 1</h6>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="instfloat_scheduled_equipment_type_1"
                                                    id="instfloat_scheduled_equipment_type_1" class="form-control"
                                                    placeholder="Type:" maxlength="" />
                                                <label for="instfloat_scheduled_equipment_type_1">Type:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="instfloat_scheduled_equipment_mfg_1"
                                                    id="instfloat_scheduled_equipment_mfg_1" class="form-control"
                                                    placeholder="Manufacturer:" maxlength="" />
                                                <label for="instfloat_scheduled_equipment_mfg_1">Manufacturer:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text"
                                                    name="instfloat_scheduled_equipment_id_or_serial_1"
                                                    id="instfloat_scheduled_equipment_id_or_serial_1"
                                                    class="form-control"
                                                    placeholder="ID # /
                                                    Serial Number:"
                                                    maxlength="" />
                                                <label for="instfloat_scheduled_equipment_id_or_serial_1">ID # /
                                                    Serial Number:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text" name="instfloat_scheduled_equipment_model_1"
                                                    id="instfloat_scheduled_equipment_model_1" class="form-control"
                                                    placeholder="Model:" maxlength="" />
                                                <label for="instfloat_scheduled_equipment_model_1">Model:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <select class="form-select"
                                                    name="instfloat_scheduled_equipment_new_or_used_1"
                                                    id="instfloat_scheduled_equipment_new_or_used_1"
                                                    aria-label="instfloat_scheduled_equipment_new_or_used_1">
                                                    <option value="" selected></option>
                                                    <option value="New">New</option>
                                                    <option value="Used">Used</option>
                                                </select>
                                                <label for="instfloat_scheduled_equipment_new_or_used_1">New /
                                                    Used:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-floating">
                                                <input type="text"
                                                    name="instfloat_scheduled_equipment_model_year_1"
                                                    id="instfloat_scheduled_equipment_model_year_1"
                                                    class="form-control" placeholder="Model Year:"
                                                    maxlength="" />
                                                <label for="instfloat_scheduled_equipment_model_year_1">Model
                                                    Year:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 form-floating">
                                                <input type="text"
                                                    name="instfloat_scheduled_equipment_date_purchased_1"
                                                    id="instfloat_scheduled_equipment_date_purchased_1"
                                                    class="form-control" placeholder="Date Purchased:"
                                                    maxlength="" />
                                                <label for="instfloat_scheduled_equipment_date_purchased_1">Date
                                                    Purchased:</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center" id="sched_equipment_container"></div>
                                </div>
                                <!-- /Step -->

                                <!-- End Product Steps -->

                                <!-- Review Form Stepper -->
                                <div class="submit step">
                                    <div class="question_title">
                                        <h3>Review Information</h3>
                                        <p>Kindly review your application details before submitting.</p>
                                    </div>
                                    <div class="row justify-content-between reviewInfoContainer">
                                        <div class="col-lg-12 mt-2" id="personalDetailsContainer">
                                            <h5>Personal Information</h5>
                                            <div class="reviewInfoSubContainer" id="personal_information_details">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mt-2" id="personalDetailsContainer">
                                            <h5>About Your Company</h5>
                                            <div class="reviewInfoSubContainer" id="about_your_company_details">
                                            </div>
                                        </div>

                                        <!-- START GL REVIEW -->
                                        <div class="col-lg-12 mt-2" id="glDetailsContainer">
                                            <h5>General Liability Application</h5>
                                            <div class="reviewInfoSubContainer" id="gl_information_details"></div>
                                        </div>
                                        <!-- END GL REVIEW -->

                                        <!-- START WC REVIEW -->
                                        <div class="col-lg-12 mt-2" id="wcDetailsContainer">
                                            <h5>Worker's Compensation Application</h5>
                                            <div class="reviewInfoSubContainer" id="wc_details_1"></div>
                                            <div class="entryContainer professionEntries">
                                                <div id="wc_details_2"></div>
                                            </div>
                                            <div class="reviewInfoSubContainer" id="wc_details_3"></div>
                                        </div>
                                        <!-- END WC REVIEW -->

                                        <!-- START AUTO REVIEW -->
                                        <div class="col-lg-12 mt-2" id="autoDetailsContainer">
                                            <h5>Commercial Auto Application</h5>
                                            <div class="reviewInfoSubContainer" id="auto_vehicle_details_1"></div>
                                            <div class="entryContainer vehicleEntries"></div>
                                            <div class="reviewInfoSubContainer" id="auto_driver_details_1"></div>
                                            <div class="entryContainer driverEntries"></div>
                                        </div>
                                        <!-- END AUTO REVIEW -->

                                        <!-- START BOND REVIEW -->
                                        <div class="col-lg-12 mt-2" id="bondDetailsContainer">
                                            <h5>Contractor's License Bond Application</h5>
                                            <div class="reviewInfoSubContainer" id="license_bond_details"></div>
                                        </div>
                                        <!-- END BOND REVIEW -->

                                        <!-- START EXCESS REVIEW -->
                                        <div class="col-lg-12 mt-2" id="excessDetailsContainer">
                                            <h5>Excess Liability Application</h5>
                                            <div class="reviewInfoSubContainer" id="excess_liability_details"></div>
                                        </div>
                                        <!-- END EXCESS REVIEW -->

                                        <!-- START TOOLS REVIEW -->
                                        <div class="col-lg-12 mt-2" id="toolsDetailsContainer">
                                            <h5>Tools & Equipment Application</h5>
                                            <div class="reviewInfoSubContainer" id="tools_equipment_details"></div>
                                        </div>
                                        <!-- END TOOLS REVIEW -->

                                        <!-- START BR REVIEW -->
                                        <div class="col-lg-12 mt-2" id="brDetailsContainer">
                                            <h5>Builder's Risk Application</h5>
                                            <div class="reviewInfoSubContainer" id="builders_risk_details"></div>
                                        </div>
                                        <!-- END BR REVIEW -->

                                        <!-- START BOP REVIEW -->
                                        <div class="col-lg-12 mt-2" id="bopDetailsContainer">
                                            <h5>Business Owner's Policy Application</h5>
                                            <div class="reviewInfoSubContainer" id="bop_details">
                                            </div>
                                        </div>
                                        <!-- END BOP REVIEW -->

                                        <!-- START COMMERCIAL PROPERTY REVIEW -->
                                        <div class="col-lg-12 mt-2" id="cpDetailsContainer">
                                            <h5>Commercial Property Application</h5>
                                            <div class="reviewInfoSubContainer" id="commercial_property_details">
                                            </div>
                                        </div>
                                        <!-- END COMMERCIAL PROPERTY REVIEW -->

                                        <!-- START EO REVIEW -->
                                        <div class="col-lg-12 mt-2" id="eoDetailsContainer">
                                            <h5>Errors & Omission Application</h5>
                                            <div class="reviewInfoSubContainer" id="error_emissions_details">
                                            </div>
                                        </div>
                                        <!-- END EO REVIEW -->

                                        <!-- START POLLUTION REVIEW -->
                                        <div class="col-lg-12 mt-2" id="pollutionDetailsContainer">
                                            <h5>Pollution Liability Application</h5>
                                            <div class="reviewInfoSubContainer" id="pollution_liability_details">
                                            </div>
                                        </div>
                                        <!-- END POLLUTION REVIEW -->

                                        <!-- START EPLI REVIEW -->
                                        <div class="col-lg-12 mt-2" id="epliDetailsContainer">
                                            <h5>Employment Practice Liability Application</h5>
                                            <div class="reviewInfoSubContainer" id="epli_liability_details">
                                            </div>
                                        </div>
                                        <!-- END EPLI REVIEW -->

                                        <!-- START CYBER REVIEW -->
                                        <div class="col-lg-12 mt-2" id="cyberDetailsContainer">
                                            <h5>Cyber Liability Application</h5>
                                            <div class="reviewInfoSubContainer" id="cyber_liability_details">
                                            </div>
                                        </div>
                                        <!-- END CYBER REVIEW -->

                                        <!-- START INSTFLOAT REVIEW -->
                                        <div class="col-lg-12 mt-2" id="instfloatDetailsContainer">
                                            <h5>Installation Floater Application</h5>
                                            <div class="reviewInfoSubContainer" id="instfloat_liability_details">
                                            </div>
                                        </div>
                                        <!-- END INSTFLOAT REVIEW -->

                                    </div>
                                    <!-- /row -->
                                    <div class="terms">
                                        <label class="container_check">Please accept our <a href="#"
                                                data-bs-toggle="modal" data-bs-target="#terms-txt">Terms and
                                                conditions</a>
                                            <input type="checkbox" name="terms" value="Yes"
                                                class="required">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="modal fade" id="terms-txt" tabindex="-1" role="dialog"
                                        aria-labelledby="termsLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="termsLabel">Terms and conditions
                                                    </h4>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                        By opting-in, you agree to receive newsletters, updates, and
                                                        promotional offers from Pascal Burke Insurance Brokerage Inc.
                                                        Your privacy is important to us. We will never share, sell, or
                                                        disclose your email address to third parties without your
                                                        explicit consent. You have the right to unsubscribe from our
                                                        newsletter and email communications at any time by clicking on
                                                        the "unsubscribe" link at the bottom of any of our emails. By
                                                        continuing with the opt-in process, you confirm that you have
                                                        read, understood, and agreed to these terms.
                                                    </p>
                                                    <p>
                                                        You can also view our Terms and Conditions by following this
                                                        link.
                                                        <a href="#">Terms and Conditions</a> |
                                                        <a href="#">Privacy Policy</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- /modal-content -->
                                        </div>
                                        <!-- /modal-dialog -->
                                    </div>
                                </div>
                                <!-- /Step -->

                                <!-- UTM params -->
                                {{-- <input type="hidden" name="utm_source" value="{{ session('utm_source') }}">
                                <input type="hidden" name="utm_medium" value="{{ session('utm_medium') }}">
                                <input type="hidden" name="utm_campaign" value="{{ session('utm_campaign') }}">
                                <input type="hidden" name="utm_term" value="{{ session('utm_term') }}">
                                <input type="hidden" name="utm_content" value="{{ session('utm_content') }}"> --}}

                            </div>
                            <!-- /middle-wizard -->

                            <div id="bottom-wizard">
                                <button type="button" name="backward" class="backward btn_1">Previous</button>
                                <button type="button" name="forward" class="forward btn_1">Next</button>
                                <button type="submit" name="process" id="process"
                                    class="submit btn_1">Submit</button>
                            </div>
                            <!-- /bottom-wizard -->
                        </form>
                    </div>
                </div>
                <!-- /Wizard container -->
            </div>
            <!-- /Container -->

            <footer>
                <div class="container-fluid">
                    <div class="row align-items-center text-center">
                        <div class="col-sm-12">
                            <p>© {{ $currentYear }} Pascal Burke Insurance Brokerage Inc.</p>
                        </div>
                        {{-- <div class="col-sm-6 text-md-end">
						<a class="btn_help btn" href="#modal-help" id="modal_h"><i class="bi bi-question-circle"> Help</i></a>
					</div> --}}
                    </div>
                    <!-- /Row -->
                </div>
                <!-- /Container -->
            </footer>
            <!-- /Footer -->

        </div>
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

        <!-- COMMON SCRIPTS -->
        <script src="{{ asset('js/common_scripts.min.js') }}"></script>
        <!-- TOASTR -->
        <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.js"></script>
        {{-- <script src="{{ asset('js/common_scripts.min.js') }}"></script> --}}
        <script src="{{ asset('js/common_functions.js') }}"></script>
        <script src="{{ asset('assets/validate.js') }}"></script>

    </body>

</html>
