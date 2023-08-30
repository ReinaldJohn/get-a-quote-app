(function ($) {

	"use strict";
	
	// Preload
	$(window).on('load', function () { // makes sure the whole site is loaded
		$('[data-loader="circle-side"]').fadeOut(); // will first fade out the loading animation
		$('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
		$('body').delay(350).css({
			'overflow': 'visible'
		});
	});

    function updateProfessionContents() {
        var numProfessions = $("#wc_no_of_profession").val();
        var professionData = [];
        var professionContent = "";
    
        for (var i = 1; i <= numProfessions; i++) {
            var profession = {};
            profession.name = $("#wc_profession_" + i + " option:selected").text();
            profession.annualPayroll = $("#wc_annual_payroll_" + i).val();
            profession.fullTimeEmployees = $("#wc_fulltime_" + i).val();
            profession.partTimeEmployees = $("#wc_parttime_" + i).val();
    
            professionContent += '<div><h6><strong>Profession Entry No. ' + i + '</strong></h6>';
            professionContent += '<p>Profession: <strong>' + profession.name + '</strong></p>';
            professionContent += '<p>Annual Payroll: <strong>' + profession.annualPayroll + '</strong></p>';
            professionContent += '<p>Full Time: <strong>' + profession.fullTimeEmployees + ' Employees</strong></p>';
            professionContent += '<p>Part Time: <strong>' + profession.partTimeEmployees + ' Employee</strong></p></div>';
    
            professionData.push(profession);
        }
        $(".entryContainer").html(professionContent);
		numProfessions ? $("#wc_details_1").html("<p>Number of Profession: <strong>"+ numProfessions +"</strong></p>") : "";
    }

    $("#wc_no_of_profession").change(updateProfessionContents);

    function updateVehicleContents() {
        var numVehicles = $("#auto_add_vehicle").val();
        var vehiclesData = [];
        var vehiclesContent = "";
    
        for (var i = 1; i <= numVehicles; i++) {
            var vehicles = {};
            vehicles.year = $("#auto_vehicle_year_" + i ).val();
            vehicles.make = $("#auto_vehicle_maker_" + i).val();
            vehicles.model = $("#auto_vehicle_model_" + i).val();
            vehicles.vin = $("#auto_vehicle_vin_" + i).val();
            vehicles.mileage = $("#auto_vehicle_mileage_" + i).val();
            vehicles.garageAddress = $("#auto_vehicle_garage_add_" + i).val();
            vehicles.coverageLimits = $("#auto_vehicle_coverage_limits_" + i + " option:selected").text();
    
            vehiclesContent += '<div><h6><strong>Vehicle Information Entry No. ' + i + '</strong></h6>';
            vehiclesContent += '<p>Year: <strong>' + vehicles.year + '</strong></p>';
            vehiclesContent += '<p>Make: <strong>' + vehicles.make + '</strong></p>';
            vehiclesContent += '<p>Model: <strong>' + vehicles.model + '</strong></p>';
            vehiclesContent += '<p>Vehicle Identification Number (VIN): <strong>' + vehicles.vin + '</strong></p>';
            vehiclesContent += '<p>Mileage / Radius: <strong>' + vehicles.mileage + '</strong></p>';
            vehiclesContent += '<p>Garage Address: <strong>' + vehicles.garageAddress + '</strong></p>';
            vehiclesContent += '<p>Coverage Limits: <strong>' + vehicles.coverageLimits + '</strong></p></div>';
    
            vehiclesData.push(vehicles);
        }
        $(".vehicleEntries").html(vehiclesContent);
		numVehicles ? $("#auto_vehicle_details_1").html("<p>Number of Vehicles: <strong>"+ numVehicles +"</strong></p>") : "";
    }
    $("#auto_add_vehicle").change(updateVehicleContents);

    function updateDriversContents() {
        var numDrivers = $("#auto_add_driver").val();
        var driversData = [];
        var driversContent = "";
    
        for (var i = 1; i <= numDrivers; i++) {
            var drivers = {};
            drivers.driversName = $("#auto_add_drivers_name_" + i ).val();
            drivers.driversLic = $("#auto_add_driver_lic_" + i).val();
            drivers.mileAgeRadius = $("#auto_add_driver_mileage_radius_" + i).val();
            drivers.driversDateOfBirth = $("#auto_add_driver_date_birth_" + i).val();
            drivers.driversCivilStatus = $("#auto_add_driver_civil_status_" + i + " option:selected").text();

			var driver_civil_status = drivers.driversCivilStatus;
			var driversSpouseName = "";
			var driversSpouseDateOfBirth = "";

			if (driver_civil_status === "Married") {
				drivers.driversSpouseName = $("#auto_add_driver_spouse_name_" + i).val();
				drivers.driversSpouseDateOfBirth = $("#auto_add_driver_spouse_dob_" + i).val();
				driversSpouseName = "<p>Spouse\'s Name: <strong>" + drivers.driversSpouseName + "</strong></p>";
				driversSpouseDateOfBirth = "<p>Spouse\'s Date of Birth: <strong>" + drivers.driversSpouseDateOfBirth + "</strong></p></div>";
			} else {
				driversSpouseName = "";
				driversSpouseDateOfBirth = "";
			}

            driversContent += '<div><h6><strong>Driver Information Entry No. ' + i + '</strong></h6>';
            driversContent += '<p>Driver\'s Name: <strong>' + drivers.driversName + '</strong></p>';
            driversContent += '<p>Drivers License Number: <strong>' + drivers.driversLic + '</strong></p>';
            driversContent += '<p>Mileage / Radius: <strong>' + drivers.mileAgeRadius + '</strong></p>';
            driversContent += '<p>Date of Birth: <strong>' + drivers.driversDateOfBirth + '</strong></p>';

			if (driver_civil_status === "Married") {
				driversContent += '<p>Civil Status: <strong>' + drivers.driversCivilStatus + '</strong></p>';
				driversContent += driversSpouseName;
				driversContent += driversSpouseDateOfBirth;
			} else {
				driversContent += '<p>Civil Status: <strong>' + drivers.driversCivilStatus + '</strong></p></div>';
			}

            driversData.push(drivers);
        }
        $(".driverEntries").html(driversContent);
		numDrivers ? $("#auto_driver_details_1").html("<p>Number of Drivers: <strong>"+ numDrivers +"</strong></p>") : "";
    }
    $("#auto_add_driver").change(updateDriversContents);

	// Wizard
	$("#wizard_container").wizard({
	    stepsWrapper: "#wrapped",
	    submit: ".submit",
	    beforeSelect: function(event, state) {
	        if ($('input#website').val().length != 0) {
	            return false;
	        }
	        if (!state.isMovingForward)
	            return true;
	        var inputs = $(this).wizard('state').step.find(':input');

			// If moving to "submit" step, populate the contents
			if(state.step.hasClass('submit')) {

				// Personal Information
				var company_name = $("#company_name").val();
				var firstname = $("#firstname").val();
				var lastname = $("#lastname").val();
				var address = $("#address").val();
				var city = $("#city").val();
				var states = $("#states option:selected").text();
				var zipcode = $("#zipcode").val();
				var phone_number = $("#phone_number").val();
				var fax_number = $("#fax_number").val();
				var fax_number_if_set = fax_number ? "<p>Fax Number: <strong>" + fax_number + "</strong></p>" : ""
				var email_address = $("#email_address").val();
				var personal_website = $("#personal_website").val();
				var personal_website_if_set = personal_website ? "<p>Personal Website: <strong>" + personal_website + "</strong></p>" : ""
				var contractor_license = $("#contractor_license").val();
				var contractor_license_if_set = contractor_license ? "<p>Contractor License No.: <strong>" + contractor_license + "</strong></p>" : ""
				var personalInformation = {
					"Company Name": company_name,
					"Full Name": firstname + lastname,
					"Address": address + city + states + zipcode,
					"Phone Number": phone_number,
					"Fax Number": fax_number_if_set,
					"Email Address": email_address,
					"Personal Website": personal_website_if_set,
					"Contractor License No.": contractor_license_if_set,
				}

				// GL Step 1 & 2
				var gl_profession = $("#gl_profession option:selected").text();
				var gl_residential = $("#gl_residential option:selected").text();
				var gl_commercial = $("#gl_commercial option:selected").text();
				var gl_new_construction = $("#gl_new_construction option:selected").text();
				var gl_repair_remodel = $("#gl_repair_remodel option:selected").text();
				var gl_descops = $("#gl_descops").val();
				var gl_cost_proj_5years = $("#gl_cost_proj_5years").val();
				var gl_annual_gross = $("#gl_annual_gross").val();
				var gl_no_field_emp = $("#gl_no_field_emp").val();
				var gl_payroll_amt = $("#gl_payroll_amt").val();
				var gl_using_subcon = $("#gl_using_subcon").val();

				var gl_using_subcon_if_set = "";
				if(gl_using_subcon === "Yes") {
					var gl_subcon_cost = $("#gl_subcon_cost").val();
					var gl_using_subcon_if_set = gl_subcon_cost;
				} else {
					var gl_using_subcon_if_set = "";
				}

				var gl_no_losses_5years = $("#gl_no_losses_5years").val();

				if(gl_no_losses_5years >= 0) {
					var gl_explain_losses = $("#gl_explain_losses").val();
					var gl_explain_losses_if_set = gl_explain_losses;
				} else {
					var gl_explain_losses_if_set = "";
				}

				var generalLiabilityInformation = {
					"Profession": gl_profession,
					"Residential": gl_residential,
					"Commercial": gl_commercial,
					"New Construction": gl_new_construction,
					"Repair/Remodel": gl_repair_remodel,
					"Detailed Description of Operations": gl_descops,
					"Cost of the Largest Project in the past 5 years": gl_cost_proj_5years,
					"Annual Gross Receipts": gl_annual_gross,
					"Number of Field Employees": gl_no_field_emp,
					"Payroll Amount": gl_payroll_amt,
					"Are you using any subcontractor": gl_using_subcon,
					"Subcontractor Cost": gl_using_subcon_if_set,
					"# of Losses for the Past 5 Years": gl_no_losses_5years,
					"Explain Losses (Please include loss amount)": gl_explain_losses_if_set
				};

				// WC Step 1 & 2
				updateProfessionContents();
				var wc_gross_receipt = $("#wc_gross_receipt").val();
				var wc_does_hire_subcon = $("#wc_does_hire_subcon option:selected").text();
				var wc_subcon_cost_year_if_set = "";
				if (wc_does_hire_subcon === "Yes") {
					var wc_subcon_cost_year = $("#wc_subcon_cost_year").val();
					wc_subcon_cost_year_if_set = wc_subcon_cost_year;
				} else {
					wc_subcon_cost_year_if_set = "";
				}

				var wc_num_of_empl = $("#wc_num_of_empl").text();
				var wc_name = $("#wc_name").val();
				var wc_title_relationship = $("#wc_title_relationship option:selected").text();
				var wc_ownership_perc = $("#wc_exc_inc option:selected").text();
				var wc_exc_inc = $("#wc_exc_inc option:selected").text();
				var wc_ssn = $("#wc_ssn").val();
				var wc_fein = $("#wc_fein").val();
				var wc_dob = $("#wc_dob").val();

				var workersCompensationInformation2 = {
					"Gross Receipt": wc_gross_receipt,
					"Do you hire subcontractor": wc_does_hire_subcon,
					"Subcontractor cost in a year": wc_subcon_cost_year_if_set,
					"No. of Employees": wc_num_of_empl
				}

				var workersCompensationInformation3 = {
					"Name": wc_name,
					"Title / Relationship": wc_title_relationship,
					"Ownership %": wc_ownership_perc,
					"Excluded / Included": wc_exc_inc,
					"SSN": wc_ssn,
					"FEIN": wc_fein,
					"Date of Birth": wc_dob
				}

				// AUTO Step 1 & 2
				updateVehicleContents();
				updateDriversContents();

				// BOND 1 & 2
				var bond_owners_name = $("#bond_owners_name").val();
				var bond_owners_ssn = $("#bond_owners_ssn").val();
				var bond_owners_dob = $("#bond_owners_dob").val();
				var bond_owners_civil_status = $("#bond_owners_civil_status option:selected").text();

				var bond_owners_spouse_name = "";
				var bond_owners_spouse_dob = "";
				var bond_owners_spouse_ssn = "";

				if (bond_owners_civil_status === "Married") {
					bond_owners_spouse_name = $("#bond_owners_spouse_name").val();
					bond_owners_spouse_dob = $("#bond_owners_spouse_dob").val();
					bond_owners_spouse_ssn = $("#bond_owners_spouse_ssn").val();
				} else {
					bond_owners_spouse_name = "";
					bond_owners_spouse_dob = "";
					bond_owners_spouse_ssn = "";
				}

				var bond_type_bond_requested = $("#bond_type_bond_requested").val();
				var bond_amount_of_bond = $("#bond_amount_of_bond").val();
				var bond_term_of_bond = $("#bond_term_of_bond option:selected").text();
				var bond_type_of_license = $("#bond_type_of_license option:selected").text();

				var bond_if_other_type_of_license = "";
				if (bond_type_of_license === "Others") {
					bond_if_other_type_of_license = $("#bond_if_other_type_of_license").val();
				} else {
					bond_if_other_type_of_license = "";
				}

				var bond_license_or_application_no = $("#bond_license_or_application_no").val();
				var bond_effective_date= $("#bond_effective_date").val();

				var contractorLicenseBondInformation = {
					"Owner's Name": bond_owners_name,
					"Social Security Number (SSN)": bond_owners_ssn,
					"Date of Birth": bond_owners_dob,
					"Civil Status": bond_owners_civil_status,
					"Spouse's Name": bond_owners_spouse_name,
					"Spouse's Date of Birth": bond_owners_spouse_dob,
					"Spouse's SSN": bond_owners_spouse_ssn,
					"Type of Bond Requested": bond_type_bond_requested,
					"Amount of Bond": bond_amount_of_bond,
					"Term of Bond": bond_term_of_bond,
					"Type of License": bond_type_of_license,
					"If others, please indicate": bond_if_other_type_of_license,
					"License Number or Application Number": bond_license_or_application_no,
					"Effective Date": bond_effective_date
				}

				// Excess Step 1 & 2
				var excess_limits = $("#excess_limits").val();
				var excess_gl_eff_date = $("#excess_gl_eff_date").val();
				var excess_no_losses_5years = $("#excess_no_losses_5years option:selected").text();
				var excess_explain_losses = "";

				if (excess_no_losses_5years >= 0) {
					excess_explain_losses = $("#excess_explain_losses").val();
				} else {
					excess_explain_losses = "";
				}

				var excess_insurance_carrier = $("#excess_insurance_carrier").val();
				var excess_policy_or_quote_no = $("#excess_policy_or_quote_no").val();
				var excess_policy_premium = $("#excess_policy_premium").val();
				var excess_effective_date = $("#excess_effective_date").val();
				var excess_expiration_date = $("#excess_expiration_date").val();

				var excessLiabilityInformation = {
					"Excess Limits": excess_limits,
					"GL Effective Date": excess_gl_eff_date,
					"No. of Losses for the Past 5 Years": excess_no_losses_5years,
					"Explain Losses": excess_explain_losses,
					"Insurance Carrier": excess_insurance_carrier,
					"Policy Number / Quote Number": excess_policy_or_quote_no,
					"Policy Premium": excess_policy_premium,
					"Effective Date": excess_effective_date,
					"Expiration Date": excess_expiration_date,
				}

				// Tools Step 1 & 2
				var tools_misc_tools = $("#tools_misc_tools").val();
				var tools_rented_or_leased_amt = $("#tools_rented_or_leased_amt").val();
				var tools_sched_equipment = $("#tools_sched_equipment").val();
				var tools_equipment_type = $("#tools_equipment_type").val();
				var tools_equipment_year = $("#tools_equipment_year").val();
				var tools_equipment_make = $("#tools_equipment_make").val();
				var tools_equipment_model = $("#tools_equipment_model").val();
				var tools_equipment_vin_or_serial_no = $("#tools_equipment_vin_or_serial_no").val();
				var tools_equipment_valuation = $("#tools_equipment_valuation").val();
				var tools_no_losses_5years = $("#tools_no_losses_5years option:selected").text();
				var tools_explain_losses = $("#tools_explain_losses").val();

				var toolsEquipmentInformation = {
					"Miscellaneous Tools Amount ($1,500 in value and under)": tools_misc_tools,
					"Rented/Leased Equipment Amount": tools_rented_or_leased_amt,
					"Scheduled Equipment ($1,500 in value and above)": tools_sched_equipment,
					"Equipment Type": tools_equipment_type,
					"Year": tools_equipment_year,
					"Make": tools_equipment_make,
					"Model": tools_equipment_model,
					"VIN or Serial No.": tools_equipment_vin_or_serial_no,
					"Valuation": tools_equipment_valuation,
					"No. of Losses for the Past 5 Years": tools_no_losses_5years,
					"If there's a loss, please explain": tools_explain_losses
				}

				// Builders Risk Step 1 & 2
				var br_property_address = $("#br_property_address").val();
				var br_value_of_existing_structure = $("#br_value_of_existing_structure").val();
				var br_value_of_work_performed = $("#br_value_of_work_performed").val();
				var br_period_duration_project = $("#br_period_duration_project").val();

				var buildersRiskInformation = {
					"Property Address": br_property_address,
					"Value of Existing Structure": br_value_of_existing_structure,
					"Value of Work Being Performed": br_value_of_work_performed,
					"Period of Insurance/Duration of the Project": br_period_duration_project
				}

				// Pollution Step 1 & 2
				var pollution_profession = $("#pollution_profession option:selected").text();
				var pollution_residential = $("#pollution_residential option:selected").text();
				var pollution_commercial = $("#pollution_commercial option:selected").text();
				var pollution_new_construction = $("#pollution_new_construction option:selected").text();
				var pollution_repair_remodel = $("#pollution_repair_remodel option:selected").text();
				var pollution_descops = $("#pollution_descops").val();
				var pollution_cost_proj_5years = $("#pollution_cost_proj_5years").val();
				var pollution_annual_gross = $("#pollution_annual_gross").val();
				var pollution_no_field_emp = $("#pollution_no_field_emp").val();
				var pollution_payroll_amt = $("#pollution_payroll_amt").val();
				var pollution_using_subcon = $("#pollution_using_subcon").val();
				var pollution_using_subcon_if_set = "";
				if(pollution_using_subcon === "Yes") {
					var pollution_subcon_cost = $("#pollution_subcon_cost").val();
					var pollution_using_subcon_if_set = pollution_subcon_cost;
				} else {
					var pollution_using_subcon_if_set = "";
				}
				var pollution_no_losses_5years = $("#pollution_no_losses_5years").val();
				if(pollution_no_losses_5years >= 0) {
					var pollution_explain_losses = $("#pollution_explain_losses").val();
					var pollution_explain_losses_if_set = pollution_explain_losses;
				} else {
					var pollution_explain_losses_if_set = "";
				}

				var pollutionLiabilityInformation = {
					"Profession": pollution_profession,
					"Residential": pollution_residential,
					"Commercial": pollution_commercial,
					"New Construction": pollution_new_construction,
					"Repair/Remodel": pollution_repair_remodel,
					"Detailed Description of Operations": pollution_descops,
					"Cost of the Largest Project in the past 5 years": pollution_cost_proj_5years,
					"Annual Gross Receipts": pollution_annual_gross,
					"Number of Field Employees": pollution_no_field_emp,
					"Payroll Amount": pollution_payroll_amt,
					"Are you using any subcontractor": pollution_using_subcon,
					"Subcontractor Cost": pollution_using_subcon_if_set,
					"# of Losses for the Past 5 Years": pollution_no_losses_5years,
					"Explain Losses (Please include loss amount)": pollution_explain_losses_if_set
				}

				// About Your Company Step
				var ayc_bop = $("#ayc_bop option:selected").text();
				var ayc_date_business_started = $("#ayc_date_business_started").val();
				var ayc_yrs_exp_contractor = $("#ayc_yrs_exp_contractor").val();
				var ayc_owners_first_name = $("#ayc_owners_first_name").val();
				var ayc_owners_last_name = $("#ayc_owners_last_name").val();
				var ayc_phone_number = $("#ayc_phone_number").val();

				var aboutYourCompanyInformation = {
					"Business Ownership Structure": ayc_bop,
					"Date Business Started": ayc_date_business_started,
					"Years of experience as a contractor": ayc_yrs_exp_contractor,
					"Owner’s First Name": ayc_owners_first_name,
					"Owner’s Last Name": ayc_owners_last_name,
					"Owner’s Phone Number": ayc_phone_number
				}

				function generateHTML(info, value) {
					if (value) {
						return "<p>" + info + ": <strong>" + value + "</strong></p>";
					} else {
						return "";
					}
				}
				
				function generateAllHTML(informationObject, targetDiv) {
					var htmlString = "";
					for (var info in informationObject) {
						htmlString += generateHTML(info, informationObject[info]);
					}
					$(targetDiv).html(htmlString);
				}
				
				generateAllHTML(personalInformation, "#personal_information_details");
				generateAllHTML(generalLiabilityInformation, "#gl_information_details");
				generateAllHTML(workersCompensationInformation2, "#wc_details_2");
				generateAllHTML(workersCompensationInformation3, "#wc_details_3");
				generateAllHTML(contractorLicenseBondInformation, "#license_bond_details");
				generateAllHTML(excessLiabilityInformation, "#excess_liability_details");
				generateAllHTML(toolsEquipmentInformation, "#tools_equipment_details");
				generateAllHTML(buildersRiskInformation, "#builders_risk_details");
				generateAllHTML(pollutionLiabilityInformation, "#pollution_liability_details");
				generateAllHTML(aboutYourCompanyInformation, "#about_your_company_details");
			}
	        return !inputs.length || !!inputs.valid();
	    }
	}).validate({
	    errorPlacement: function(error, element) {
	        if (element.is(':radio') || element.is(':checkbox')) {
	            error.insertBefore(element.next());
	        } else {
	            error.insertAfter(element);
	        }
	    }
	});

	//  progress bar
	$("#progressbar").progressbar();
	$("#wizard_container").wizard({
	    afterSelect: function(event, state) {
	        $("#progressbar").progressbar("value", state.percentComplete);
	        $("#location").text("(" + state.stepsComplete + "/" + state.stepsPossible + ")");
	    }
	});

	// Validate select
	$('#wrapped').validate({
	    ignore: [],
	    rules: {
	        select: {
	            required: true
	        }
	    },
	    errorPlacement: function(error, element) {
	        if (element.is('select:hidden')) {
	            error.insertAfter(element.next('.nice-select'));
	        } else {
	            error.insertAfter(element);
	        }
	    }
	});
	
	// Submit loader mask 
	var form = $("form#wrapped");
	form.on('submit', function () {
		form.validate();
		if (form.valid()) {
			$("#loader_form").fadeIn();
		}
	});

	// Modal Help
	$('#modal_h').magnificPopup({
		type: 'inline',
		fixedContentPos: true,
		fixedBgPos: true,
		overflowY: 'auto',
		closeBtnInside: true,
		preloader: false,
		midClick: true,
		removalDelay: 300,
		closeMarkup: '<button title="%title%" type="button" class="mfp-close"></button>',
		mainClass: 'my-mfp-zoom-in'
	});

	function hideSteps(checkboxValue) {
		switch (checkboxValue) {
			case 'gl':
				$('#gl_step_1, #gl_step_2, #glDetailsContainer').removeClass('step wizard-step').addClass('hidden');
				$('#gl_step_1, #gl_step_2').find('input').val('');
				$('#gl_step_1, #gl_step_2').find('select').val('');
				// textarea
				$('#gl_step_1, #gl_descops').val('');
				$('#gl_step_2, #gl_explain_losses').val('');
				// ajax container
				$('#gl_step_2').find('#gl_subcon_cost_container').val('');
				break;

			case 'wc':
				$('#wc_step_1, #wc_step_2, #wcDetailsContainer').removeClass('step wizard-step').addClass('hidden');
				$('#wc_step_1, #wc_step_2').find('input').val('');
				$('#wc_step_1, #wc_step_2').find('select').val('');

				// ajax container
				$('#wc_step_1, #wc_step_2').find('#profession_entry_container').empty();
				$('#wc_step_1, #wc_step_2').find('#wc_subcon_cost_year_container').empty();
				break;

			case 'auto':
				$('#auto_step_1, #auto_step_2, #autoDetailsContainer').removeClass('step wizard-step').addClass('hidden');
				$('#auto_step_1, #auto_step_2').find('input').val('');
				$('#auto_step_1, #auto_step_2').find('select').val('');

				// ajax container
				$('#auto_step_1').find('#auto_vehicles_container').empty();
				$('#auto_step_2').find('#auto_drivers_container').empty();
				break;

			case 'bond':
				$('#bond_step_1, #bond_step_2, #bondDetailsContainer').removeClass('step wizard-step').addClass('hidden');
				$('#bond_step_1, #bond_step_2').find('input').val('');
				$('#bond_step_1, #bond_step_2').find('select').val('');

				// ajax container
				$('#bond_step_1').find('#bond_owner_if_married_container').empty();
				$('#bond_step_2').find('#bond_license_type_if_others_container').empty();
				break;

			case 'excess':
				$('#excess_step_1, #excess_step_2, #excessDetailsContainer').removeClass('step wizard-step').addClass('hidden');
				$('#excess_step_1, #excess_step_2').find('input').val('');
				$('#excess_step_1, #excess_step_2').find('select').val('');

				// ajax container
				$('#excess_step_1').find('#excess_no_losses_5years_container').empty();
				break;

			case 'tools':
				$('#tools_step_1, #toolsDetailsContainer').removeClass('step wizard-step').addClass('hidden');
				$('#tools_step_1').find('input').val('');
				$('#tools_step_1').find('select').val('');

				// ajax container
				$('#tools_step_1').find('#tools_no_losses_5years_container').empty();
				break;
				
			case 'br':
				$('#br_step_1, #brDetailsContainer').removeClass('step wizard-step').addClass('hidden');
				$('#br_step_1').find('input').val('');
				$('#br_step_1').find('select').val('');
				break;

			case 'pollution':
				$('#pollution_step_1, #pollution_step_2, #pollutionDetailsContainer').removeClass('step wizard-step').addClass('hidden');
				$('#pollution_step_1, #pollution_step_2').find('input').val('');
				$('#pollution_step_1, #pollution_step_2').find('select').val('');
				// textarea
				$('#pollution_step_1, #pollution_descops').val('');
				$('#pollution_step_2, #pollution_explain_losses').val('');
				// ajax container
				$('#pollution_step_2').find('#pollution_subcon_cost_container').val('');				
				break;
		}
	}
	
	function showSteps(checkboxValue) {
		switch (checkboxValue) {
			case 'gl':
				$('#gl_step_1, #gl_step_2, #glDetailsContainer').addClass('step wizard-step').removeClass('hidden');
				break;
			case 'wc':
				$('#wc_step_1, #wc_step_2, #wcDetailsContainer').addClass('step wizard-step').removeClass('hidden');
				break;
			case 'auto':
				$('#auto_step_1, #auto_step_2, #autoDetailsContainer').addClass('step wizard-step').removeClass('hidden');
				break;
			case 'bond':
				$('#bond_step_1, #bond_step_2, #bondDetailsContainer').addClass('step wizard-step').removeClass('hidden');
				break;
			case 'excess':
				$('#excess_step_1, #excess_step_2, #excessDetailsContainer').addClass('step wizard-step').removeClass('hidden');
				break;
			case 'tools':
				$('#tools_step_1, #toolsDetailsContainer').addClass('step wizard-step').removeClass('hidden');
				break;
			case 'br':
				$('#br_step_1, #brDetailsContainer').addClass('step wizard-step').removeClass('hidden');
				break;
			case 'pollution':
				$('#pollution_step_1, #pollution_step_2, #pollutionDetailsContainer').addClass('step wizard-step').removeClass('hidden');
				break;
		}
	}	

	$('input[name="question_1[]"]').each(function() {
		var checkboxValue = $(this).val();
		if (localStorage.getItem(checkboxValue) === null) {
			localStorage.setItem(checkboxValue, $(this).is(':checked') ? 'checked' : 'unchecked');
		}
	});

	$('input[name="question_1[]"]').each(function() {
        var checkboxValue = $(this).val();
        var checkboxState = localStorage.getItem(checkboxValue);
        if (checkboxState === 'unchecked') {
            $(this).prop('checked', false);
            hideSteps(checkboxValue);
        } else if (checkboxState === 'checked') {
            $(this).prop('checked', true);
            showSteps(checkboxValue);
        }
    }); 

    $('input[name="question_1[]"]').change(function() {
        var checkboxValue = $(this).val();
        if ($(this).is(':checked')) {
            localStorage.setItem(checkboxValue, 'checked');
            showSteps(checkboxValue);
        } else {
            localStorage.setItem(checkboxValue, 'unchecked');
            hideSteps(checkboxValue);
        }
    });

	$.fn.feinFormat = function() {
		return this.on('input blur', function() {
			var origString = $(this).val();
			var trimmedString = origString.replace(/[^0-9]/g, '').slice(0, 9);
			if (trimmedString.length === 9) {
				var specialChar = '-';
				var newString = trimmedString.substring(0, 2) + specialChar + trimmedString.substring(2);
				$(this).val(newString);
			}
		});
	};
	  
	$.fn.ssnFormat = function() {
		return this.on('input blur', function() {
			var id = $(this);
			var origString = id.val();
			var trimmedString = origString.replace(/[^0-9]/g, '').slice(0, 9);
			if (trimmedString.length === 9) {
				var specialString = '-';
				var newString1 = trimmedString.substring(0, 3) + specialString;
				var newString2 = trimmedString.substring(3, 5) + specialString;
				var newString = newString1 + newString2 + trimmedString.substring(5);
				id.val(newString);
			}
		});
	};

	function computePercentage(a, b) {
		const val_a = $("#" + a).val();
		const x = 100 - parseInt(val_a);
		$("#" + b).val(x.toString());
	}

	function toUSD(number) {
		var formatter = new Intl.NumberFormat('en-US', {
			style: 'currency',
			currency: 'USD',
			minimumFractionDigits: 0,
			maximumFractionDigits: 0
		});
		return formatter.format(number);
	}

	function datePickerFormatter(selector) {
		$(selector).datepicker({
			showAnim: "slideDown", // set the animation type to slideDown
		}).attr('readonly', 'readonly'); // make the datepicker input field read-only
	}

	function perfectCurrencyFormatter(selector) {
		$(document).on('change', selector, function() {
			var numericValue = $(this).val().replace(/[$,]/g, '');
			numericValue = parseFloat(numericValue || 0);
			$(this).data('numeric-value', numericValue);
			var usdValue = toUSD(numericValue);
			$(this).val(usdValue);
		});
		$(document).on('focus', selector, function() {
			var currentValue = $(this).val();
			if (currentValue !== '') {
				var currentNumericValue = parseFloat(currentValue.replace(/[$,]/g, ''));
				if (!isNaN(currentNumericValue)) {
					$(this).val(currentNumericValue);
				}
			}
		});
		$(document).on('blur', selector, function() {
			var currentValue = $(this).val();
			if (currentValue !== '') {
				var currentNumericValue = parseFloat(currentValue.replace(/[$,]/g, ''));
				if (!isNaN(currentNumericValue)) {
					$(this).data('numeric-value', currentNumericValue);
					$(this).val(toUSD(currentNumericValue));
				} else {
					var originalNumericValue = $(this).data('numeric-value');
					$(this).val(toUSD(originalNumericValue));
				}
			}
		});
	}

	function miscToolsCurrencyFormatter(selector) {
		$(document).on('change', selector, function() {
			var numericValue = $(this).val().replace(/[$,]/g, '');
			numericValue = parseFloat(numericValue || 0);
			$(this).data('numeric-value', numericValue);
			var usdValue = toUSD(numericValue);
			if (numericValue > 1500) {
				toastr.error('Miscellaneous Tools Value must be under $1,500');
				$(this).val('');
				$(this).data('numeric-value', 0);
			} else {
				$(this).val(usdValue);
			}
		});
		$(document).on('focus', selector, function() {
			var currentValue = $(this).val();
			if (currentValue !== '') {
				var currentNumericValue = parseFloat(currentValue.replace(/[$,]/g, ''));
				if (!isNaN(currentNumericValue)) {
					$(this).val(currentNumericValue);
				}
			}
		});
		$(document).on('blur', selector, function() {
			var currentValue = $(this).val();
			if (currentValue !== '') {
				var currentNumericValue = parseFloat(currentValue.replace(/[$,]/g, ''));
				if (!isNaN(currentNumericValue)) {
					$(this).data('numeric-value', currentNumericValue);
					$(this).val(toUSD(currentNumericValue));
				} else {
					$(this).val('');
					$(this).data('numeric-value', 0);
				}
			}
		});
	}

	function scheduledEquipmentCurrencyFormatter(selector) {
		$(document).on('change', selector, function() {
			var numericValue = $(this).val().replace(/[$,]/g, '');
			numericValue = parseFloat(numericValue || 0);
			$(this).data('numeric-value', numericValue);
			var usdValue = toUSD(numericValue);
	
			if (numericValue < 1500) {
				toastr.error('Scheduled Equipment Value must be above $1,500');
				$(this).val('');
				$(this).data('numeric-value', 0);
			} else {
				$(this).val(usdValue);
			}
		});
		$(document).on('focus', selector, function() {
			var currentValue = $(this).val();
			if (currentValue !== '') {
				var currentNumericValue = parseFloat(currentValue.replace(/[$,]/g, ''));
				if (!isNaN(currentNumericValue)) {
					$(this).val(currentNumericValue);
				}
			}
		});
		$(document).on('blur', selector, function() {
			var currentValue = $(this).val();
			if (currentValue !== '') {
				var currentNumericValue = parseFloat(currentValue.replace(/[$,]/g, ''));
				if (!isNaN(currentNumericValue)) {
					$(this).data('numeric-value', currentNumericValue);
					$(this).val(toUSD(currentNumericValue));
				} else {
					$(this).val('');
					$(this).data('numeric-value', 0);
				}
			}
		});
	}

    function formatUSPhone() {
        var number = $(this).val().replace(/[^\d]/g, '');
        if (number.length > 10) {
            number = number.slice(0, 10); // Ensures that the phone number is not more than 10 digits
        }
        if (number.length == 7) {
            number = number.replace(/(\d{3})(\d{4})/, "$1-$2");
        } else if (number.length == 10) {
            number = number.replace(/(\d{3})(\d{3})(\d{4})/, "($1) $2-$3");
        }
        $(this).val(number);
    }

	function showSubconContainerForGL() {
		$.ajax({
			success: function (response) {
				$("#custom-loader").addClass("hidden");
				$("#custom-loader").removeClass("active");
				$("#gl_subcon_cost_container").append(`
					<div class="col-md-12">
						<div class="mb-3 form-floating">
							<input type="text" name="gl_subcon_cost" id="gl_subcon_cost" class="form-control" placeholder="">
							<label for="gl_subcon_cost">Subcontractor Cost</label>
						</div>
					</div>
				`)
			},
			error: function (xhr, status, error) {
				$("#custom-loader").addClass("hidden");
				$("#custom-loader").removeClass("active");
			}
		});
	}

	function showSubconContainerForPollution() {
		$.ajax({
			success: function (response) {
				$("#custom-loader").addClass("hidden");
				$("#custom-loader").removeClass("active");
				$("#pollution_subcon_cost_container").append(`
					<div class="col-md-12">
						<div class="mb-3 form-floating">
							<input type="text" name="pollution_subcon_cost" id="pollution_subcon_cost" class="form-control" placeholder="">
							<label for="pollution_subcon_cost">Subcontractor Cost</label>
						</div>
					</div>
				`)
			},
			error: function (xhr, status, error) {
				$("#custom-loader").addClass("hidden");
				$("#custom-loader").removeClass("active");
			}
		});
	}

	function showWCSubconCostYearContainer() {
		$.ajax({
			success: function (response) {
				$("#custom-loader").addClass("hidden");
				$("#custom-loader").removeClass("active");
				$("#wc_subcon_cost_year_container").append(`
					<div class="col-md-12">
						<div class="mb-3 form-floating">
							<input type="text" name="wc_subcon_cost_year" id="wc_subcon_cost_year" class="form-control" placeholder="">
							<label for="wc_subcon_cost_year">Subcontractor cost in a year</label>
						</div>										
					</div>
				`)
			},
			error: function (xhr, status, error) {
				$("#custom-loader").addClass("hidden");
				$("#custom-loader").removeClass("active");
			}
		});
	}

	function showGLNoOfLossesContainer() {
		$.ajax({
			success: function (response) {
				console.log(response);
				$("#custom-loader").addClass("hidden");
				$("#custom-loader").removeClass("active");
				$("#gl_explain_losses_container").html(`
					<div class="col-md-12">
						<div class="mb-3 form-floating">
							<textarea style="resize: none;" name="gl_explain_losses" id="gl_explain_losses" class="form-control" placeholder="Please explain"></textarea>
							<label for="gl_explain_losses">Explain Losses (Please include loss amount)</label>
						</div>
					</div>
				`)
			},
			error: function (xhr, status, error) {
				$("#custom-loader").addClass("hidden");
				$("#custom-loader").removeClass("active");
			}
		});
	}

	function showPollutionNoOfLossesContainer() {
		$.ajax({
			success: function (response) {
				console.log(response);
				$("#custom-loader").addClass("hidden");
				$("#custom-loader").removeClass("active");
				$("#pollution_explain_losses_container").html(`
					<div class="col-md-12">
						<div class="mb-3 form-floating">
							<textarea style="resize: none;" name="pollution_explain_losses" id="pollution_explain_losses" class="form-control" placeholder="Please explain"></textarea>
							<label for="pollution_explain_losses">Explain Losses (Please include loss amount)</label>
						</div>
					</div>
				`)
			},
			error: function (xhr, status, error) {
				$("#custom-loader").addClass("hidden");
				$("#custom-loader").removeClass("active");
			}
		});
	}

	async function showProfessionEntries(a) {
		try {
			let data = await $.ajax({
				url: 'includes/pages/wc/showProfessionEntries.php',
				data: {
					a: a
				},
				cache: false
			});
			$('#profession_entry_container').append(data);
			perfectCurrencyFormatter('.annual-payroll');

		} catch (error) {
			// Handle any errors here
			console.error(error);
		}
	}

	async function showAutoVehicleEntries(a) {
		try {
			let data = await $.ajax({
				url: 'includes/pages/auto/showAutoVehicleEntries.php',
				data: {
					a: a
				},
				cache: false
			});
			$('#auto_vehicles_container').append(data);
		} catch (error) {
			// Handle any errors here
			console.error(error);
		}
	}

	async function showAutoDriverEntries(a) {
		try {
			let data = await $.ajax({
				url: 'includes/pages/auto/showAutoDriverEntries.php',
				data: {
					a: a
				},
				cache: false
			});
			$('#auto_drivers_container').append(data);
			datePickerFormatter('.driver_birthdate');

			// If Married status
			$(`#auto_add_driver_civil_status_${a}`).on('change', function() {
				var selectedOption = $(this).val();
				var containerId = `auto_driver_if_married_container_${a}`;
				if (selectedOption === 'Married') {
					$.ajax({
						url: 'includes/pages/auto/showSpouseInformationForm.php',
						data: {
							a: a
						},
						cache: false,
						success: function(response) {
							$(`#${containerId}`).html(response);
							datePickerFormatter('.spouse_datebirth');
						},
						error: function(xhr, status, error) {
							console.error(error);
						}
					});
				} else {
					$(`#${containerId}`).empty();				
				}
			});

		} catch (error) {
			// Handle any errors here
			console.error(error);
		}
	}

	function renderingYesNoDivs(a, func, b) {
		$('#' + a).on('change', function() {
			$("#custom-loader").removeClass("hidden");
			$("#custom-loader").addClass("active");
			if($(this).val() === "Yes") {
				setTimeout(function() {
					func();
				}, 0);
			}
			else if($(this).val() === "No" || $(this).val() === ""){
				$("#" + b).parent().parent().remove();
				$("#custom-loader").addClass("hidden");
				$("#custom-loader").removeClass("active");
			}
		});
	}

	function ShowLicBondSpouseInfoIfMarried() {
		$.ajax({
			success: function (response) {
				$("#custom-loader").addClass("hidden");
				$("#custom-loader").removeClass("active");
				$("#bond_owner_if_married_container").append(`
					<div class="col-md-12">
						<div class="mb-3 form-floating">
							<input type="text" name="bond_owners_spouse_name" id="bond_owners_spouse_name" class="form-control" placeholder="">
							<label for="bond_owners_spouse_name">Spouse's Name</label>
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3 form-floating">
							<input type="text" name="bond_owners_spouse_dob" id="bond_owners_spouse_dob" class="form-control" placeholder="">
							<label for="bond_owners_spouse_dob">Spouse's Date of Birth</label>
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3 form-floating">
							<input type="text" name="bond_owners_spouse_ssn" id="bond_owners_spouse_ssn" class="form-control" placeholder="">
							<label for="bond_owners_spouse_ssn">Spouse's SSN</label>
						</div>
					</div>
				`)
			},
			complete: function () {
				datePickerFormatter('#bond_owners_spouse_dob'); // Initialize datepicker after AJAX request completes
				$('#bond_owners_spouse_ssn').ssnFormat();
			},			
			error: function (xhr, status, error) {
				$("#custom-loader").addClass("hidden");
				$("#custom-loader").removeClass("active");
			}
		});
	}

	function ShowLicBondTypeOfLicIfOthers() {
		$.ajax({
			success: function (response) {
				$("#custom-loader").addClass("hidden");
				$("#custom-loader").removeClass("active");
				$("#bond_license_type_if_others_container").append(`
					<div class="col-md-12">
						<div class="mb-3 form-floating">
							<input type="text" name="bond_if_other_type_of_license" id="bond_if_other_type_of_license" class="form-control" placeholder="">
							<label for="bond_if_other_type_of_license">If others, please specify</label>
						</div>
					</div>
				`)
			},
			error: function (xhr, status, error) {
				$("#custom-loader").addClass("hidden");
				$("#custom-loader").removeClass("active");
			}
		});
	}

	function showExcessNoOfLossesContainer() {
		$.ajax({
			success: function (response) {
				$("#custom-loader").addClass("hidden");
				$("#custom-loader").removeClass("active");
				$("#excess_no_losses_5years_container").html(`
					<div class="col-md-12">
						<div class="mb-3 form-floating">
							<textarea style="resize: none;" name="excess_explain_losses" id="excess_explain_losses" class="form-control" placeholder="Please explain"></textarea>
							<label for="excess_explain_losses">Explain Losses (Please include loss amount)</label>
						</div>
					</div>
				`)
			},
			error: function (xhr, status, error) {
				$("#custom-loader").addClass("hidden");
				$("#custom-loader").removeClass("active");
			}
		});
	}

	function showToolsEquipmentNoOfLossesContainer() {
		$.ajax({
			success: function (response) {
				$("#custom-loader").addClass("hidden");
				$("#custom-loader").removeClass("active");
				$("#tools_no_losses_5years_container").html(`
					<div class="col-md-12">
						<div class="mb-3 form-floating">
							<textarea style="resize: none;" name="tools_explain_losses" id="tools_explain_losses" class="form-control" placeholder="Please explain"></textarea>
							<label for="tools_explain_losses">Explain Losses (Please include loss amount)</label>
						</div>
					</div>
				`)
			},
			error: function (xhr, status, error) {
				$("#custom-loader").addClass("hidden");
				$("#custom-loader").removeClass("active");
			}
		});
	}	

	// START PERSONAL INFORMATION SCRIPS
	$('#phone_number').on('input', formatUSPhone);
	$('#fax_number').on('input', formatUSPhone);
	// END PERSONAL INFORMATION SCRIPS

	// START GL SCRIPT

	// $( "#wc_dob" ).datepicker();
	datePickerFormatter('#wc_dob');

	$('#gl_residential').change(function() {
		setTimeout(function() {
			computePercentage('gl_residential', 'gl_commercial');
		}, 0);
	});
	$('#gl_commercial').change(function() {
		setTimeout(function() {
			computePercentage('gl_commercial', 'gl_residential');
		}, 0);
	});
	$('#gl_new_construction').change(function() {
		setTimeout(function() {
			computePercentage('gl_new_construction', 'gl_repair_remodel');
		}, 0);
	});
	$('#gl_repair_remodel').change(function() {
		setTimeout(function() {
			computePercentage('gl_repair_remodel', 'gl_new_construction');
		}, 0);
	});
	perfectCurrencyFormatter('#gl_cost_proj_5years');
	perfectCurrencyFormatter('#gl_annual_gross');
	perfectCurrencyFormatter('#gl_payroll_amt');
	perfectCurrencyFormatter('#gl_subcon_cost');
	renderingYesNoDivs('gl_using_subcon', showSubconContainerForGL, 'gl_subcon_cost');
	$('#gl_no_losses_5years').on('change', function() {
		const value = parseInt($(this).val());
		if (value >= 1) {
			$("#custom-loader").removeClass("hidden");
			$("#custom-loader").addClass("active");
		  	setTimeout(function() {
				showGLNoOfLossesContainer();
			}, 0);
		} else {
		  $("#gl_explain_losses").parent().parent().remove();
		  $("#custom-loader").addClass("hidden");
		  $("#custom-loader").removeClass("active");
		}
	  });
	// END GL SCRIPTS

	// START WC SCRIPTS
	$('#wc_no_of_profession').on('change', async function() {
		var numProfs = $(this).val();
		$('#profession_entry_container').empty();
		for(var i = 1; i <= numProfs; i++) {
			await showProfessionEntries(i); 
		}
	});
	perfectCurrencyFormatter('#wc_subcon_cost_year');
	perfectCurrencyFormatter('#wc_gross_receipt');
	$('#wc_does_hire_subcon').on('change', function() {
		$("#custom-loader").removeClass("hidden");
		$("#custom-loader").addClass("active");
		if($(this).val() === "Yes") {
			setTimeout(function() {
				showWCSubconCostYearContainer();
			}, 0);
		}
		else if($(this).val() === "No" || $(this).val() === ""){
			$("#wc_subcon_cost_year").parent().parent().remove();
			$("#custom-loader").addClass("hidden");
			$("#custom-loader").removeClass("active");
		}
	});
	$('#wc_fein').feinFormat();
	$('#wc_ssn').ssnFormat();
	// END WC SCRIPTS

	// START AUTO SCRIPTS
	$(document).ready(function() {
		$('#auto_add_vehicle').trigger('change');
	});
	$('#auto_add_vehicle').on('change', async function() {
		var numVehicles = $(this).val();
		$('#auto_vehicles_container').empty();
		for(var i = 1; i <= numVehicles; i++) {
			await showAutoVehicleEntries(i); 
		}
	});
	$(document).ready(function() {
		$('#auto_add_driver').trigger('change');
	});
	$('#auto_add_driver').on('change', async function() {
		var numDrivers = $(this).val();
		$('#auto_drivers_container').empty();
		for(var i = 1; i <= numDrivers; i++) {
			await showAutoDriverEntries(i);
		}
	});
	// END AUTO SCRIPTS

	// START BOND SCRIPTS
	$('#bond_owners_ssn').ssnFormat();
	datePickerFormatter('#bond_owners_dob');
	$('#bond_owners_civil_status').on('change', function() {
		$("#custom-loader").removeClass("hidden");
		$("#custom-loader").addClass("active");
		if($(this).val() === "Married") {
			setTimeout(function() {
				ShowLicBondSpouseInfoIfMarried();
			}, 0);
			datePickerFormatter('#bond_owners_spouse_dob');
			$('#bond_owners_spouse_ssn').ssnFormat();
		} else {
			$("#bond_owner_if_married_container").empty();
			$("#custom-loader").addClass("hidden");
			$("#custom-loader").removeClass("active");
		}
	});
	perfectCurrencyFormatter('#bond_amount_of_bond');
	$('#bond_type_of_license').on('change', function() {
		$("#custom-loader").removeClass("hidden");
		$("#custom-loader").addClass("active");
		if($(this).val() === "Others") {
			setTimeout(function() {
				ShowLicBondTypeOfLicIfOthers();
			}, 0);
		} else {
			$("#bond_license_type_if_others_container").empty();
			$("#custom-loader").addClass("hidden");
			$("#custom-loader").removeClass("active");
		}
	});
	datePickerFormatter('#bond_effective_date');
	// END BOND SCRIPTS

	// START EXCESS SCRIPTS
	perfectCurrencyFormatter('#excess_limits');
	perfectCurrencyFormatter('#excess_policy_premium');
	$('#excess_no_losses_5years').on('change', function() {
		const value = parseInt($(this).val());
		if (value >= 1) {
			$("#custom-loader").removeClass("hidden");
			$("#custom-loader").addClass("active");
			setTimeout(function() {
				showExcessNoOfLossesContainer();
			}, 0);
		} else {
			$("#excess_explain_losses").parent().parent().remove();
			$("#custom-loader").addClass("hidden");
			$("#custom-loader").removeClass("active");
		}
	});
	datePickerFormatter('#excess_gl_eff_date');
	datePickerFormatter('#excess_effective_date');
	datePickerFormatter('#excess_expiration_date');
	// END EXCESS SCRIPTS

	// START TOOLS SCRIPTS
	miscToolsCurrencyFormatter('#tools_misc_tools');
	perfectCurrencyFormatter('#tools_rented_or_leased_amt');
	scheduledEquipmentCurrencyFormatter('#tools_sched_equipment');
	$('#tools_no_losses_5years').on('change', function() {
		const value = parseInt($(this).val());
		if (value >= 1) {
			$("#custom-loader").removeClass("hidden");
			$("#custom-loader").addClass("active");
			setTimeout(function() {
				showToolsEquipmentNoOfLossesContainer();
			}, 0);
		} else {
			$("#tools_explain_losses").parent().parent().remove();
			$("#custom-loader").addClass("hidden");
			$("#custom-loader").removeClass("active");
		}
	});	
	// END TOOLS SCRIPTS

	// START BR SCRIPTS
	perfectCurrencyFormatter('#br_value_of_existing_structure');
	perfectCurrencyFormatter('#br_value_of_work_performed');
	// END BR SCRIPTS

	// START POLLUTION SCRIPTS
	$('#pollution_residential').change(function() {
		setTimeout(function() {
			computePercentage('pollution_residential', 'pollution_commercial');
		}, 0);
	});
	$('#pollution_commercial').change(function() {
		setTimeout(function() {
			computePercentage('pollution_commercial', 'pollution_residential');
		}, 0);
	});
	$('#pollution_new_construction').change(function() {
		setTimeout(function() {
			computePercentage('pollution_new_construction', 'pollution_repair_remodel');
		}, 0);
	});
	$('#pollution_repair_remodel').change(function() {
		setTimeout(function() {
			computePercentage('pollution_repair_remodel', 'pollution_new_construction');
		}, 0);
	});
	perfectCurrencyFormatter('#pollution_cost_proj_5years');
	perfectCurrencyFormatter('#pollution_annual_gross');
	perfectCurrencyFormatter('#pollution_payroll_amt');
	perfectCurrencyFormatter('#pollution_subcon_cost');
	renderingYesNoDivs('pollution_using_subcon', showSubconContainerForPollution, 'pollution_subcon_cost');
	$('#pollution_no_losses_5years').on('change', function() {
		const value = parseInt($(this).val());
		if (value >= 1) {
			$("#custom-loader").removeClass("hidden");
			$("#custom-loader").addClass("active");
			setTimeout(function() {
				showPollutionNoOfLossesContainer();
			}, 0);
		} else {
			$("#pollution_explain_losses").parent().parent().remove();
			$("#custom-loader").addClass("hidden");
			$("#custom-loader").removeClass("active");
		}
	});	
	// END POLLUTION SCRIPTS

	// START ABOUT YOUR COMPANY SCRIPTS
	datePickerFormatter('#ayc_date_business_started');
	$('#ayc_phone_number').on('input', formatUSPhone);
	// END ABOUT YOUR COMPANY SCRIPTS
})(window.jQuery); 

