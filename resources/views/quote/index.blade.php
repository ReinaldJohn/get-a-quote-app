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
    <link rel="shortcut icon" href="{{ asset("img/favicon.ico") }}" type="image/x-icon">
    <!-- <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png"> -->

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.css">

    <!-- BASE CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendors.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">

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
	                    <a href="https://pbibins.com" target="_blank"><img src="{{ asset('img/PBIB Logo.png') }}" alt="" class="img-fluid" width="350" height="350"></a>
	                </div>
	                <div class="col-4">
	                    <div id="social">
	                        <ul>
	                            <li><a href="https://www.facebook.com/pbibins" target="_blank"><i class="bi bi-facebook"></i></a></li>
	                            <li><a href="https://twitter.com/i/flow/login?redirect_after_login=%2Fpbibinc" target="_blank"><i class="bi bi-twitter"></i></a></li>
	                            <li><a href="https://www.instagram.com/pbibinc/" target="_blank"><i class="bi bi-instagram"></i></a></li>
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
					<div id="custom-loader" class="custom-loader hidden"></div>
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
														<input type="checkbox" id="question_1_opt_1" name="question_1[]" class="" value="gl">
														<label class="checkbox" for="question_1_opt_1"></label>
														<label for="question_1_opt_1" class="wrapper">General Liability</label>
													</div>
												</li>
												<li>
													<div class="checkbox_radio_container">
														<input type="checkbox" id="question_1_opt_2" name="question_1[]" class="" value="wc">
														<label class="checkbox" for="question_1_opt_2"></label>
														<label for="question_1_opt_2" class="wrapper">Worker’s Compensation</label>
													</div>
												</li>
												<li>
													<div class="checkbox_radio_container">
														<input type="checkbox" id="question_1_opt_3" name="question_1[]" class="" value="auto">
														<label class="checkbox" for="question_1_opt_3"></label>
														<label for="question_1_opt_3" class="wrapper">Commercial Auto</label>
													</div>
												</li>
												<li>
													<div class="checkbox_radio_container">
														<input type="checkbox" id="question_1_opt_4" name="question_1[]" class="" value="bond">
														<label class="checkbox" for="question_1_opt_4"></label>
														<label for="question_1_opt_4" class="wrapper">Contractor License Bond</label>
													</div>
												</li>
												<li>
													<div class="checkbox_radio_container">
														<input type="checkbox" id="question_1_opt_5" name="question_1[]" class="" value="excess">
														<label class="checkbox" for="question_1_opt_5"></label>
														<label for="question_1_opt_5" class="wrapper">Excess Liability</label>
													</div>
												</li>
												<li>
													<div class="checkbox_radio_container">
														<input type="checkbox" id="question_1_opt_6" name="question_1[]" class="" value="tools">
														<label class="checkbox" for="question_1_opt_6"></label>
														<label for="question_1_opt_6" class="wrapper">Tools & Equipment</label>
													</div>
												</li>
												<li>
													<div class="checkbox_radio_container">
														<input type="checkbox" id="question_1_opt_7" name="question_1[]" class="" value="br">
														<label class="checkbox" for="question_1_opt_7"></label>
														<label for="question_1_opt_7" class="wrapper">Builder's Risk</label>
													</div>
												</li>
												<li>
													<div class="checkbox_radio_container">
														<input type="checkbox" id="question_1_opt_8" name="question_1[]" class="" value="pollution">
														<label class="checkbox" for="question_1_opt_8"></label>
														<label for="question_1_opt_8" class="wrapper">Pollution Application</label>
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

							<!-- Personal Information Stepper -->
							<div class="step" id="personal_information_step">
								<div class="question_title">
									<h3>Personal Information</h3>
									<p>Please fill up  fields and proceed.</p>
								</div>
								<div class="row justify-content-center">
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="company_name" id="company_name" class="form-control " placeholder="Company Name" maxlength="100">
											<label for="company_name">Company Name</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3 form-floating">
											<input type="text" name="firstname" id="firstname" class="form-control " placeholder="First Name" maxlength="100">
											<label for="firstname">First Name</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3 form-floating">
											<input type="text" name="lastname" id="lastname" class="form-control " placeholder="Last Name">
											<label for="lastname" maxlength="100">Last Name</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="address" id="address" class="form-control " placeholder="Address" maxlength="255">
											<label for="address">Address</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3 form-floating">
											<input type="text" name="city" id="city" class="form-control " placeholder="City" maxlength="50">
											<label for="lastname">City</label>
										</div>
									</div>
									<div class="col-md-2">
										<div class="mb-3 form-floating">
											<select class="form-select " name="states" id="states" aria-label="states">
												<option value selected></option>
                                                @foreach ($states as $state)
                                                <option value="{{ $state['id'] }}">{{ $state['abbr'] }}</option>
                                                @endforeach
											</select>
										<label for="states">State</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3 form-floating">
											<input type="text" name="zipcode" id="zipcode" class="form-control " placeholder="Zipcode" maxlength="5">
											<label for="zipcode">Zipcode</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3 form-floating">
											<input type="phone" name="phone_number" id="phone_number" class="form-control " placeholder="Phone Number">
											<label for="phone_number">Phone Number</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3 form-floating">
											<input type="phone" name="fax_number" id="fax_number" class="form-control" placeholder="Fax Number">
											<label for="fax_number">Fax Number</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3 form-floating">
											<input type="email" name="email_address" id="email_address" class="form-control " placeholder="Email Address" maxlength="50">
											<label for="email_address">Email Address</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3 form-floating">
											<input type="text" name="personal_website" id="personal_website" class="form-control" placeholder="Website" maxlength="50">
											<label for="personal_website">Website</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3 form-floating">
											<input type="text" name="contractor_license" id="contractor_license" class="form-control" placeholder="Contractor License No.">
											<label for="contractor_license" maxlength="50">Contractor License No.</label>
										</div>
									</div>
								</div>
								<!-- /row -->
							</div>
							<!-- /Step -->

							<!-- Products Steps -->

							<!-- GL Stepper 1 -->
							<div class="step" id="gl_step_1">
								<div class="question_title">
									<h3>General Liability Application</h3>
									<p>Please fill up fields and proceed.</p>
								</div>
								<div class="row justify-content-center">
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<select class="form-select " name="gl_profession" id="gl_profession" aria-label="gl_profession">
                                                @foreach ($professions as $profession)
                                                <option value="{{ $profession['id'] }}">{{ $profession['name'] }}</option>
                                                @endforeach
											</select>
											<label for="gl_profession">Select a Profession</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3 form-floating">
											<select class="form-select " name="gl_residential" id="gl_residential" aria-label="gl_residential">
												<option value selected></option>
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
											<select class="form-select " name="gl_commercial" id="gl_commercial" aria-label="gl_commercial">
												<option value selected></option>
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
											<select class="form-select " name="gl_new_construction" id="gl_new_construction" aria-label="gl_new_construction">
												<option value selected></option>
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
											<select class="form-select " name="gl_repair_remodel" id="gl_repair_remodel" aria-label="gl_repair_remodel">
												<option value selected></option>
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
											<textarea style="resize: none;" name="gl_descops" id="gl_descops" class="form-control " placeholder="Detailed Description of Operations"></textarea>
											<label for="gl_descops">Detailed Description of Operations</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="gl_cost_proj_5years" id="gl_cost_proj_5years" class="form-control" placeholder="Cost of the Largest Project in the past 5 years?" maxlength="20">
											<label for="gl_cost_proj_5years">Cost of the Largest Project in the past 5 years?</label>
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
									<p>Please fill up  fields and proceed.</p>
								</div>
								<div class="row justify-content-center">
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="gl_annual_gross" id="gl_annual_gross" class="form-control " placeholder="Annual Gross Receipts" maxlength="20">
											<label for="gl_annual_gross">Annual Gross Receipts</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="gl_no_field_emp" id="gl_no_field_emp" class="form-control " placeholder="Number of Field Employees" maxlength="3">
											<label for="gl_no_field_emp">Number of Field Employees</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="gl_payroll_amt" id="gl_payroll_amt" class="form-control " placeholder="Payroll Amount" maxlength="20">
											<label for="gl_payroll_amt">Payroll Amount</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<select class="form-select " name="gl_using_subcon" id="gl_using_subcon" aria-label="gl_using_subcon">
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
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<select class="form-select" name="gl_no_losses_5years" id="gl_no_losses_5years" aria-label="gl_no_losses_5years">
												<option value="0" selected>0</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6+</option>
											</select>
											<label for="gl_no_losses_5years"># of Losses for the Past 5 Years</label>
										</div>
									</div>
									<!--  -->
									<div id="gl_explain_losses_container"></div>
									<!--  -->
								</div>
								<!-- /row -->
							</div>
							<!-- /Step -->

							<!-- WC Stepper 1 -->
							<div class="step" id="wc_step_1">
								<div class="question_title">
									<h3>Worker’s Compensation Application</h3>
									<p>Please fill up  fields and proceed.</p>
								</div>
								<div class="row justify-content-center">
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<select class="form-select " name="wc_no_of_profession" id="wc_no_of_profession" aria-label="wc_no_of_profession">
												<option value selected></option>
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
									<div class="col-md-12 mt-4">
										<div class="mb-3 form-floating">
											<input type="text" name="wc_gross_receipt" id="wc_gross_receipt" class="form-control " placeholder="Gross Receipt" maxlength="20">
											<label for="wc_gross_receipt">Gross Receipt</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<select class="form-select " name="wc_does_hire_subcon" id="wc_does_hire_subcon" aria-label="wc_does_hire_subcon">
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
											<input type="text" name="wc_num_of_empl" id="wc_num_of_empl" class="form-control " placeholder="Number of Employees" maxlength="3">
											<label for="wc_num_of_empl">Number of Employees</label>
										</div>
									</div>
								</div>
							</div>
							<!-- /Step -->

							<!-- WC Stepper 2 -->
							<div class="step" id="wc_step_2">
								<div class="question_title">
									<h3>Worker’s Compensation Application</h3>
									<p>Please fill up  fields and proceed.</p>
								</div>
								<div class="row justify-content-center">
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="wc_name" id="wc_name" class="form-control " placeholder="" maxlength="255">
											<label for="wc_name">Name</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="wc_title_relationship" id="wc_title_relationship" class="form-control " placeholder="" maxlength="255">
											<label for="wc_title_relationship">Title / Relationship</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3 form-floating">
											<select class="form-select " name="wc_ownership_perc" id="wc_ownership_perc" aria-label="wc_ownership_perc">
												<option value selected></option>
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
											<select class="form-select " name="wc_exc_inc" id="wc_exc_inc" aria-label="wc_exc_inc">
												<option value selected></option>
												<option value="Excluded">Excluded</option>
												<option value="Included">Included</option>
											</select>
											<label for="wc_exc_inc">Excluded / Included</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3 form-floating">
											<input type="text" name="wc_ssn" id="wc_ssn" class="form-control " placeholder="SSN">
											<label for="wc_ssn">SSN</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3 form-floating">
											<input type="text" name="wc_fein" id="wc_fein" class="form-control " placeholder="FEIN">
											<label for="wc_fein">FEIN</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="wc_dob" id="wc_dob" class="form-control " placeholder="MM/DD/YYYY">
											<label for="wc_dob">Date of Birth</label>
										</div>
									</div>
								</div>
							</div>
							<!-- /Step -->

							<!-- AUTO Stepper 1 -->
							<div class="step" id="auto_step_1">
								<div class="question_title">
									<h3>Commercial Auto Application</h3>
									<p>Please fill up  fields and proceed.</p>
								</div>
								<div class="row justify-content-center">
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<select class="form-select" name="auto_add_vehicle" id="auto_add_vehicle" aria-label="auto_add_vehicle">
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
									<p>Please fill up  fields and proceed.</p>
								</div>
								<div class="row justify-content-center">
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<select class="form-select" name="auto_add_driver" id="auto_add_driver" aria-label="auto_add_driver">
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
									<p>Please fill up  fields and proceed.</p>
								</div>
								<div class="row justify-content-center">
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="bond_owners_name" id="bond_owners_name" class="form-control " placeholder="Owner's Name" maxlength="100">
											<label for="bond_owners_name">Owner's Name</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="bond_owners_ssn" id="bond_owners_ssn" class="form-control " placeholder="Social Security Number (SSN)">
											<label for="bond_owners_ssn">Social Security Number (SSN)</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="bond_owners_dob" id="bond_owners_dob" class="form-control " placeholder="MM/DD/YYYY">
											<label for="bond_owners_dob">Date of Birth</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<select class="form-select " name="bond_owners_civil_status" id="bond_owners_civil_status" aria-label="bond_owners_civil_status">
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
									<p>Please fill up  fields and proceed.</p>
								</div>
								<div class="row justify-content-center">
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="bond_type_bond_requested" id="bond_type_bond_requested" class="form-control " placeholder="Type of Bond Requested" maxlength="100">
											<label for="bond_type_bond_requested">Type of Bond Requested</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="bond_amount_of_bond" id="bond_amount_of_bond" class="form-control " placeholder="Amount of Bond" maxlength="20">
											<label for="bond_amount_of_bond">Amount of Bond</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<select class="form-select " name="bond_term_of_bond" id="bond_term_of_bond" aria-label="bond_term_of_bond">
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
											<select class="form-select " name="bond_type_of_license" id="bond_type_of_license" aria-label="bond_type_of_license">
												<option value selected></option>
												<option value="General Contractor">General Contractor</option>
												<option value="Roofer">Roofer</option>
												<option value="Swimming Pool Contractor">Swimming Pool Contractor</option>
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
											<input type="text" name="bond_license_or_application_no" id="bond_license_or_application_no" class="form-control " placeholder="License Number or Application Number" maxlength="100">
											<label for="bond_license_or_application_no">License Number or Application Number</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="bond_effective_date" id="bond_effective_date" class="form-control " placeholder="MM/DD/YYYY">
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
									<p>Please fill up  fields and proceed.</p>
								</div>
								<div class="row justify-content-center">
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="excess_limits" id="excess_limits" class="form-control " placeholder="Excess Limits" maxlength="20">
											<label for="excess_limits">Excess Limits</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="excess_gl_eff_date" id="excess_gl_eff_date" class="form-control " placeholder="GL Effective Date">
											<label for="excess_gl_eff_date">GL Effective Date</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<select class="form-select " name="excess_no_losses_5years" id="excess_no_losses_5years" aria-label="excess_no_losses_5years">
												<option value="0" selected>0</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6+</option>
											</select>
											<label for="excess_no_losses_5years"># of Losses for the Past 5 Years</label>
										</div>
									</div>
									<!--  -->
									<div id="excess_no_losses_5years_container"></div>
									<!--  -->
								</div>
							</div>
							<!-- /Step -->

							<!-- EXCESS Stepper 2 -->
							<div class="step" id="excess_step_2">
								<div class="question_title">
									<h3>Excess Liability Application</h3>
									<p>Please fill up  fields and proceed.</p>
								</div>
								<div class="row justify-content-center">
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="excess_insurance_carrier" id="excess_insurance_carrier" class="form-control " placeholder="Insurance Carrier" maxlength="100">
											<label for="excess_insurance_carrier">Insurance Carrier</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="excess_policy_or_quote_no" id="excess_policy_or_quote_no" class="form-control " placeholder="Policy Number / Quote Number" maxlength="50">
											<label for="excess_policy_or_quote_no">Policy Number / Quote Number</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="excess_policy_premium" id="excess_policy_premium" class="form-control " placeholder="Policy Premium" maxlength="20">
											<label for="excess_policy_premium">Policy Premium</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="excess_effective_date" id="excess_effective_date" class="form-control " placeholder="MM/DD/YYYY">
											<label for="excess_effective_date">Effective Date</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="excess_expiration_date" id="excess_expiration_date" class="form-control " placeholder="MM/DD/YYYY">
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
									<p>Please fill up  fields and proceed.</p>
								</div>
								<div class="row justify-content-center">
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="tools_misc_tools" id="tools_misc_tools" class="form-control " placeholder="$1,500 below">
											<label for="tools_misc_tools">Miscellaneous Tools Amount ($1,500 in value and under)</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="tools_rented_or_leased_amt" id="tools_rented_or_leased_amt" class="form-control " placeholder="$">
											<label for="tools_rented_or_leased_amt">Rented / Leased Equipment Amount</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="tools_sched_equipment" id="tools_sched_equipment" class="form-control " placeholder="$1,500 above">
											<label for="tools_sched_equipment">Scheduled Equipment ($1,500 in value and above)</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="tools_equipment_type" id="tools_equipment_type" class="form-control " placeholder="Equipment Type" maxlength="100">
											<label for="tools_equipment_type">Equipment Type</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3 form-floating">
											<input type="text" name="tools_equipment_year" id="tools_equipment_year" class="form-control " placeholder="YYYY" maxlength="4">
											<label for="tools_equipment_year">Year</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3 form-floating">
											<input type="text" name="tools_equipment_make" id="tools_equipment_make" class="form-control " placeholder="Make" maxlength="100">
											<label for="tools_equipment_make">Make</label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3 form-floating">
											<input type="text" name="tools_equipment_model" id="tools_equipment_model" class="form-control " placeholder="Model" maxlength="100">
											<label for="tools_equipment_model">Model</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3 form-floating">
											<input type="text" name="tools_equipment_vin_or_serial_no" id="tools_equipment_vin_or_serial_no" class="form-control " placeholder="VIN or Serial Number" maxlength="100">
											<label for="tools_equipment_vin_or_serial_no">VIN or Serial Number</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3 form-floating">
											<input type="text" name="tools_equipment_valuation" id="tools_equipment_valuation" class="form-control " placeholder="Valuation" maxlength="100">
											<label for="tools_equipment_valuation">Valuation</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<select class="form-select " name="tools_no_losses_5years" id="tools_no_losses_5years" aria-label="tools_no_losses_5years">
												<option value="0" selected>0</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6+</option>
											</select>
											<label for="tools_no_losses_5years"># of Losses for the Past 5 Years</label>
										</div>
									</div>
									<!--  -->
									<div id="tools_no_losses_5years_container"></div>
									<!--  -->
								</div>
							</div>
							<!-- /Step -->

							<!-- BR Stepper 1 -->
							<div class="step" id="br_step_1">
								<div class="question_title">
									<h3>Builder's Risk Application</h3>
									<p>Please fill up  fields and proceed.</p>
								</div>
								<div class="row justify-content-center">
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="br_property_address" id="br_property_address" class="form-control " placeholder="Property Address">
											<label for="br_property_address">Property Address</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="br_value_of_existing_structure" id="br_value_of_existing_structure" class="form-control " placeholder="Value of Existing Structure" maxlength="20">
											<label for="br_value_of_existing_structure">Value of Existing Structure</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="br_value_of_work_performed" id="br_value_of_work_performed" class="form-control " placeholder="Value of Work Being Performed" maxlength="20">
											<label for="br_value_of_work_performed">Value of Work Being Performed</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="br_period_duration_project" id="br_period_duration_project" class="form-control " placeholder="Period of Insurance / Duration of the Project" maxlength="20">
											<label for="br_period_duration_project">Period of Insurance / Duration of the Project</label>
										</div>
									</div>
								</div>
							</div>
							<!-- /Step -->

							<!-- POLLUTION Stepper 1 -->
							<div class="step" id="pollution_step_1">
								<div class="question_title">
									<h3>Pollution Liability Application</h3>
									<p>Please fill up  fields and proceed.</p>
								</div>
								<div class="row justify-content-center">
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<select class="form-select " name="pollution_profession" id="pollution_profession" aria-label="pollution_profession">
                                                @foreach ($professions as $profession)
                                                <option value="{{ $profession['id'] }}">{{ $profession['name'] }}</option>
                                                @endforeach
											</select>
											<label for="pollution_profession">Select a Profession</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3 form-floating">
											<select class="form-select " name="pollution_residential" id="pollution_residential" aria-label="pollution_residential">
												<option value selected></option>
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
											<select class="form-select " name="pollution_commercial" id="pollution_commercial" aria-label="pollution_commercial">
												<option value selected></option>
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
											<select class="form-select " name="pollution_new_construction" id="pollution_new_construction" aria-label="pollution_new_construction">
												<option value selected></option>
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
											<select class="form-select " name="pollution_repair_remodel" id="pollution_repair_remodel" aria-label="pollution_repair_remodel">
												<option value selected></option>
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
											<textarea style="resize: none;" name="pollution_descops" id="pollution_descops" class="form-control " placeholder=""></textarea>
											<label for="pollution_descops">Detailed Description of Operations</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="pollution_cost_proj_5years" id="pollution_cost_proj_5years" class="form-control" placeholder="" maxlength="20">
											<label for="pollution_cost_proj_5years">Cost of the Largest Project in the past 5 years?</label>
										</div>
									</div>
								</div>
							</div>
							<!-- /Step -->

							<!-- POLLUTION Stepper 2 -->
							<div class="step" id="pollution_step_2">
								<div class="question_title">
									<h3>Pollution Liability Application</h3>
									<p>Please fill up  fields and proceed.</p>
								</div>
								<div class="row justify-content-center">
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="pollution_annual_gross" id="pollution_annual_gross" class="form-control " placeholder="">
											<label for="pollution_annual_gross">Annual Gross Receipts</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="pollution_no_field_emp" id="pollution_no_field_emp" class="form-control " placeholder="">
											<label for="pollution_no_field_emp">Number of Field Employees</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<input type="text" name="pollution_payroll_amt" id="pollution_payroll_amt" class="form-control " placeholder="">
											<label for="pollution_payroll_amt">Payroll Amount</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<select class="form-select " name="pollution_using_subcon" id="pollution_using_subcon" aria-label="pollution_using_subcon">
												<option value selected></option>
												<option value="1">Yes</option>
												<option value="0">No</option>
											</select>
											<label for="pollution_using_subcon">Are you using any subcontractor?</label>
										</div>
									</div>
									<!--  -->
									<div id="pollution_subcon_cost_container"></div>
									<!--  -->
									<div class="col-md-12">
										<div class="mb-3 form-floating">
											<select class="form-select" name="pollution_no_losses_5years" id="pollution_no_losses_5years" aria-label="pollution_no_losses_5years">
												<option value selected></option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6+</option>
											</select>
											<label for="pollution_no_losses_5years"># of Losses for the Past 5 Years</label>
										</div>
									</div>
									<!--  -->
									<div id="pollution_explain_losses_container"></div>
									<!--  -->
								</div>
							</div>
							<!-- /Step -->

							<!-- End Product Steps -->

							<!-- About Your Company Stepper -->
							<div class="step" id="about_your_company_step">
								<div class="question_title">
									<h3>About Your Company Information</h3>
									<p>Please fill up  fields and proceed.</p>
								</div>
								<div class="row justify-content-center">
									<div class="col-md-12">
										<div class="form-floating mb-3">
											<select class="form-select " name="ayc_bop" id="ayc_bop" aria-label="ayc_bop">
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
											<input type="text" name="ayc_date_business_started" id="ayc_date_business_started" class="form-control flatpickr-input" placeholder="MM/DD/YYYY">
											<label for="ayc_date_business_started">Date Business Started</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-floating mb-3">
											<input type="text" name="ayc_yrs_exp_contractor" id="ayc_yrs_exp_contractor" class="form-control" placeholder="">
											<label for="ayc_yrs_exp_contractor">Years of experience as a contractor?</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-floating mb-3">
											<input type="text" name="ayc_owners_first_name" id="ayc_owners_first_name" class="form-control " placeholder="" maxlength="100">
											<label for="ayc_owners_first_name">Owner’s First Name</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-floating mb-3">
											<input type="text" name="ayc_owners_last_name" id="ayc_owners_last_name" class="form-control " placeholder="" maxlength="100">
											<label for="ayc_owners_last_name">Owner’s Last Name</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-floating mb-3">
											<input type="phone" name="ayc_phone_number" id="ayc_phone_number" class="form-control " placeholder="">
											<label for="ayc_phone_number">Phone Number</label>
										</div>
									</div>
								</div>
								<!-- /row -->
							</div>
							<!-- /Step -->

							<!-- Review Form Stepper -->
							<div class="submit step">
								<div class="question_title">
									<h3>Review Information</h3>
									<p>Kindly review your application details before submitting.</p>
								</div>
								<div class="row justify-content-between reviewInfoContainer">
									<div class="col-lg-12" id="personalDetailsContainer">
										<h5>Personal Information</h5>
										<div class="reviewInfoSubContainer" id="personal_information_details"></div>
									</div>

									<!-- START GL REVIEW -->
									<div class="col-lg-12" id="glDetailsContainer">
										<h5>General Liability Application</h5>
										<div class="reviewInfoSubContainer" id="gl_information_details"></div>
									</div>
									<!-- END GL REVIEW -->

									<!-- START WC REVIEW -->
									<div class="col-lg-12" id="wcDetailsContainer">
										<h5>Worker's Compensation Application</h5>
										<div class="reviewInfoSubContainer" id="wc_details_1"></div>
										<div class="entryContainer professionEntries">
											<div id="wc_details_2"></div>
										</div>
										<div class="reviewInfoSubContainer" id="wc_details_3"></div>
									</div>
									<!-- END WC REVIEW -->

									<!-- START AUTO REVIEW -->
									<div class="col-lg-12" id="autoDetailsContainer">
										<h5>Commercial Auto Application</h5>
										<div class="reviewInfoSubContainer" id="auto_vehicle_details_1"></div>
										<div class="entryContainer vehicleEntries"></div>
										<div class="reviewInfoSubContainer" id="auto_driver_details_1"></div>
										<div class="entryContainer driverEntries"></div>
									</div>
									<!-- END AUTO REVIEW -->

									<!-- START BOND REVIEW -->
									<div class="col-lg-12" id="bondDetailsContainer">
										<h5>Contractor's License Bond Application</h5>
										<div class="reviewInfoSubContainer" id="license_bond_details"></div>
									</div>
									<!-- END BOND REVIEW -->

									<!-- START EXCESS REVIEW -->
									<div class="col-lg-12" id="excessDetailsContainer">
										<h5>Excess Liability Application</h5>
										<div class="reviewInfoSubContainer" id="excess_liability_details"></div>
									</div>
									<!-- END EXCESS REVIEW -->

									<!-- START TOOLS REVIEW -->
									<div class="col-lg-12" id="toolsDetailsContainer">
										<h5>Tools & Equipment Application</h5>
										<div class="reviewInfoSubContainer" id="tools_equipment_details"></div>
									</div>
									<!-- END TOOLS REVIEW -->

									<!-- START BR REVIEW -->
									<div class="col-lg-12" id="brDetailsContainer">
										<h5>Builder's Risk Application</h5>
										<div class="reviewInfoSubContainer" id="builders_risk_details"></div>
									</div>
									<!-- END BR REVIEW -->

									<!-- START POLLUTION REVIEW -->
									<div class="col-lg-12" id="pollutionDetailsContainer">
										<h5>Pollution Liability Application</h5>
										<div class="reviewInfoSubContainer" id="pollution_liability_details"></div>
									</div>
									<!-- END POLLUTION REVIEW -->

									<div class="col-lg-12" id="personalDetailsContainer">
										<h5>About Your Company</h5>
										<div class="reviewInfoSubContainer" id="about_your_company_details"></div>
									</div>

								</div>
								<!-- /row -->
							</div>
							<!-- /Step -->

                            <!-- UTM params -->
                            <input type="hidden" name="utm_source" value="{{ session('utm_source') }}">
                            <input type="hidden" name="utm_medium" value="{{ session('utm_medium') }}">
                            <input type="hidden" name="utm_campaign" value="{{ session('utm_campaign') }}">
                            <input type="hidden" name="utm_term" value="{{ session('utm_term') }}">
                            <input type="hidden" name="utm_content" value="{{ session('utm_content') }}">

						</div>
						<!-- /middle-wizard -->

						<div id="bottom-wizard">
							<button type="button" name="backward" class="backward btn_1">Previous</button>
							<button type="button" name="forward" class="forward btn_1">Next</button>
							<button type="submit" name="process" id="process" class="submit btn_1">Submit</button>
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
	<script src="{{ asset('js/common_functions.js') }}"></script>
	<script src="{{ asset('assets/validate.js') }}"></script>

	</body>
</html>
