(function ($) {
    ("use strict");
    // Preload
    $(window).on("load", function () {
        // makes sure the whole site is loaded
        $('[data-loader="circle-side"]').fadeOut(); // will first fade out the loading animation
        $("#preloader").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.
        $("body").delay(350).css({
            overflow: "visible",
        });
    });

    let observer = new MutationObserver((mutationsList, observer) => {
        for (let mutation of mutationsList) {
            if (mutation.type === "childList") {
                mutation.addedNodes.forEach((node) => {
                    if (node.nodeType === 1) {
                        // Check if the node itself matches or if it contains the select element
                        if (
                            node.matches(".polopt") ||
                            node.querySelector(".polopt")
                        ) {
                            // Initialize select2 for the '.trades_performed' element
                            $(".polopt").select2({
                                placeholder: "Select here..",
                                width: "100%",
                            });
                        }

                        $.fn.feinFormat = function () {
                            return this.on("input blur", function () {
                                var origString = $(this).val();
                                var trimmedString = origString
                                    .replace(/[^0-9]/g, "")
                                    .slice(0, 9);
                                if (trimmedString.length === 9) {
                                    var specialChar = "-";
                                    var newString =
                                        trimmedString.substring(0, 2) +
                                        specialChar +
                                        trimmedString.substring(2);
                                    $(this).val(newString);
                                }
                            });
                        };

                        $.fn.ssnFormat = function () {
                            return this.on("input blur", function () {
                                var id = $(this);
                                var origString = id.val();
                                var trimmedString = origString
                                    .replace(/[^0-9]/g, "")
                                    .slice(0, 9);
                                if (trimmedString.length === 9) {
                                    var specialString = "-";
                                    var newString1 =
                                        trimmedString.substring(0, 3) +
                                        specialString;
                                    var newString2 =
                                        trimmedString.substring(3, 5) +
                                        specialString;
                                    var newString =
                                        newString1 +
                                        newString2 +
                                        trimmedString.substring(5);
                                    id.val(newString);
                                }
                            });
                        };

                        $("#wc_fein").feinFormat();
                        $("#wc_ssn").ssnFormat();
                        datePickerFormatter("#wc_dob");
                        datePickerFormatter("#auto_driver_date_of_birth");
                        datePickerFormatter("#bond_owners_dob");
                        $("#bond_owners_ssn").ssnFormat();
                        datePickerFormatter("#bond_effective_date");
                        datePickerFormatter("#excess_gl_eff_date");
                        datePickerFormatter("#excess_effective_date");
                        datePickerFormatter("#excess_expiration_date");
                        datePickerFormatter(
                            "#instfloat_scheduled_equipment_date_purchased_1"
                        );
                        datePickerFormatter("#br_when_structure_built");
                        datePickerFormatter("#epli_effective_date");
                        $("#epli_fein").feinFormat();
                        datePickerFormatter("#ayc_date_business_started");
                        yearPickerFormatter("#property_year_built");
                        yearPickerFormatter("#yearPickerFormatter");
                        yearPickerFormatter(
                            "#property_last_update_roofing_year"
                        );
                        yearPickerFormatter(
                            "#property_last_update_heating_year"
                        );
                        yearPickerFormatter(
                            "#property_last_update_plumbing_year"
                        );
                        yearPickerFormatter(
                            "#property_last_update_electrical_year"
                        );
                    }
                });
            }
        }
    });

    // Observe the entire document for changes
    observer.observe(document.body, {
        childList: true, // Observes direct children
        subtree: true, // Observes all descendants
    });

    const maxLength = 255;
    $(document).on(
        "input",
        "#company_name, #firstname, #lastname, #address, #city, #website, #gl_specify_profession, #gl_descops, #gl_full_time_employees, #gl_part_time_employees, #gl_no_of_losses, input[name^='gl_multiple_states_'], #wc_num_of_empl, #wc_no_of_losses, #wc_name, #wc_title_relationship, input[name^='wc_name_'], input[name^='wc_title_relationship_'], input[name^='wc_specify_profession_'], input[name^='wc_profession_type_'], input[name^='wc_num_employee_under_this_profession_'], input[name^='auto_vehicle_maker_'], input[name^='auto_vehicle_model_'], input[name^='auto_vehicle_vin_'], input[name^='auto_vehicle_mileage_'], input[name^='auto_vehicle_garage_add_'], #auto_driver_full_name, #auto_driver_marital_status, #auto_driver_spouse_name, #auto_driver_license_no, #auto_driver_years_of_driving_exp, #auto_no_of_losses, input[name^='auto_add_drivers_name_'], input[name^='auto_add_driver_lic_'], input[name^='auto_add_driver_mileage_radius_'], input[name^='auto_add_driver_civil_status_'], input[name^='auto_driver_spouse_name_'], #bond_owners_name, #bond_owners_ssn, #bond_owners_civil_status, #bond_owners_spouse_name, #bond_type_bond_requested, #bond_term_of_bond, #bond_type_of_license, #bond_if_other_type_of_license, #bond_no_of_losses, #excess_insurance_carrier, #excess_policy_or_quote_no, #excess_no_of_losses, #equipment_type, #tools_equipment_make, #tools_equipment_model, #tools_equipment_vin_or_serial_no, #tools_equipment_valuation, #tools_equipment_no_of_losses, #br_property_address, #br_period_duration_project, #br_construction_type, #br_complete_descops_of_project, #br_sq_footage, #br_number_of_floors, #br_number_of_units_dwelling, #br_anticipated_occupancy, #br_distance_to_nearest_fire_hydrant, #br_distance_to_nearest_fire_station, #br_structure_occupied_remodel_renovation, #br_jobsite_security, #br_sched_property_carrier_name, #br_residential_commercial, #br_when_project_started, #br_what_are_work_done, #br_what_are_remaining_works, #br_no_of_losses, #bop_property_address, #bop_loss_payee_info, #bop_building_industry, #bop_occupancy, #bop_bldg_construction_type, #bop_no_of_stories, #bop_total_bldg_sqft, #bop_automatic_fire_alarm, #bop_distance_nearest_fire_hydrant, #bop_distance_nearest_fire_station, #bop_automatic_comm_cooking_ext, #bop_automatic_burglar_alarm, #bop_no_of_losses, #property_property_address, #property_name_of_owner, #property_construction_type, #property_no_of_stories, #property_total_bldg_sqft, #property_distance_nearest_fire_hydrant, #property_distance_nearest_fire_station, #property_protection_class, #property_no_of_losses, #eo_requested_limits, #eo_reqlimit_if_others, #eo_request_deductible, #eo_reqdeductible_if_others, #eo_no_of_losses, #eo_business_entity_sub_q1, #eo_business_entity_sub_q2, #eo_business_entity_sub_q3, #eo_business_entity_sub_q4, #eo_business_entity_sub_q5, #eo_number_employee, #eo_full_time, #eo_part_time, #eo_hr_sub_q1, #eo_hr_sub_q2, #eo_hr_sub_q3, #eo_hr_sub_q4, #epli_current_epli, #epli_prior_carrier, #epli_prior_carrier_epli, #epli_deductible_amount, #epli_no_of_losses, #epli_full_time, #epli_part_time, #epli_independent_contractors, #epli_volunteers, #epli_leased_seasonal, #epli_non_us_base_emp, #epli_total_employees, #epli_located_at_ca, #epli_located_at_ga, #epli_located_at_tx, #epli_located_at_fl, #epli_located_at_ny, #epli_located_at_nj, #epli_emp_terminated_last_12_months_q1, #epli_emp_terminated_last_12_months_q2, #epli_emp_terminated_last_12_months_q3, #cyber_it_contact_name, #cyber_no_of_losses, #cyber_q1, #instfloat_territory_of_operation, #instfloat_type_of_operation, #instfloat_scheduled_type_of_equipment, #instfloat_deductible_amount, #instfloat_no_of_losses, #instfloat_location, #instfloat_type_security_placed, #instfloat_unscheduled_type_of_equipment",
        function () {
            if ($(this).val().length > maxLength) {
                $(this).val($(this).val().substring(0, maxLength));
            }
        }
    );

    const fiftyMaxLength = 50;
    $(document).on(
        "input",
        "#email_address, #contractor_license, #wc_exc_inc, input[name^='wc_exc_inc_'], #cyber_it_contact_email",
        function () {
            if ($(this).val().length > fiftyMaxLength) {
                $(this).val($(this).val().substring(0, fiftyMaxLength));
            }
        }
    );

    const twentyMaxLength = 20;
    $(document).on("input", "#ayc_yrs_exp_contractor", function () {
        if ($(this).val().length > twentyMaxLength) {
            $(this).val($(this).val().substring(0, twentyMaxLength));
        }
    });

    const fiveMaxLength = 5;
    $(document).on("input", "#zipcode", function () {
        if ($(this).val().length > fiveMaxLength) {
            $(this).val($(this).val().substring(0, fiveMaxLength));
        }
    });

    const phoneMaxLength = 15;
    $(document).on(
        "input",
        "#phone_number, #fax_number, #cyber_it_contact_number",
        function () {
            if ($(this).val().length > phoneMaxLength) {
                $(this).val($(this).val().substring(0, phoneMaxLength));
            }
        }
    );

    const currencyMaxLength = 8;
    $(document).on(
        "input",
        "#annual_gross_receipt, #gl_annual_gross, #gl_cost_proj_5years, #gl_payroll_amt, #gl_subcon_cost, #gl_amt_of_claims, #wc_gross_receipt, #wc_subcon_cost_year, #wc_amt_of_claims, input[name^='wc_annual_payroll_'], input[name^='auto_vehicle_coverage_limits_'], #auto_amt_of_claims, #bond_amount_of_bond, #bond_amt_of_claims, #excess_limits, #excess_policy_premium, #excess_amt_of_claims, #tools_misc_tools, #tools_rented_or_leased_amt, #tools_sched_equipment, #tools_equipment_amt_of_claims, #br_value_of_existing_structure, #br_value_of_work_performed, #br_cost_of_work_done, #br_cost_remaining_works, #br_amt_of_claims, #bop_val_cost_bldg, #bop_business_property_limit, #bop_amt_of_claims, #property_value_cost_bldg, #property_business_property_limit, #property_amt_of_claims, #eo_amt_of_claims, #eo_ftime_salary_range, #eo_ptime_salary_range, #epli_amt_of_claims, #cyber_amt_of_claims, #instfloat_amt_of_claims, #instfloat_max_value_of_equipment, #instfloat_max_value_of_bldg_storage, #instfloat_unscheduled_max_value_equipment_storing, input[name^='wc_annual_payroll_']",
        function () {
            if ($(this).val().length > currencyMaxLength) {
                $(this).val($(this).val().substring(0, currencyMaxLength));
            }
        }
    );

    const percentageMaxLength = 3;
    $(document).on(
        "input",
        "#residential_percentage, #commercial_percentage, #new_construction_percentage, #repair_remodel_percentage, #gl_residential, #gl_commercial, #gl_new_construction, #gl_repair_remodel, #pol_1_subcon_work, #pol_1_total_subcon_work, #pol_2_subcon_work, #pol_2_total_subcon_work, #pol_3_subcon_work, #pol_3_total_subcon_work",
        function () {
            if ($(this).val().length > percentageMaxLength) {
                $(this).val($(this).val().substring(0, percentageMaxLength));
            }
        }
    );

    const ssnMaxLength = 11;
    $(document).on(
        "input",
        "#wc_ssn, #input[name^='wc_ssn_'], #bond_owners_spouse_ssn",
        function () {
            if ($(this).val().length > ssnMaxLength) {
                $(this).val($(this).val().substring(0, ssnMaxLength));
            }
        }
    );

    const feinMaxLength = 10;
    $(document).on(
        "input",
        "#wc_fein, #input[name^='wc_fein_'], #epli_fein",
        function () {
            if ($(this).val().length > feinMaxLength) {
                $(this).val($(this).val().substring(0, feinMaxLength));
            }
        }
    );

    var isTermsChecked = false;
    $("#process").css("cursor", "no-drop");
    $("#termsCheckbox").on("change", function () {
        isTermsChecked = $(this).is(":checked");
        $("#process").css("cursor", isTermsChecked ? "pointer" : "no-drop");
    });

    var allowForward = false;
    var declined = false;

    $("#wizard_container").wizard({
        afterForward: function () {
            setInitialCursorState();
        },
        beforeForward: function (event, state) {
            if (state.stepIndex === 2) {
                if (!allowForward && !declined) {
                    if ($("#dialpadTermsCheckbox").is(":checked")) {
                        allowForward = true;
                        $(".forward").css("cursor", "");
                    } else {
                        $(".forward").css("cursor", "no-drop");
                        toastr.info(
                            "You must accept the agreements before proceeding."
                        );
                        return false;
                    }
                } else if (declined) {
                    toastr.info(
                        "You must refresh the page again to agree to the terms and agreements."
                    );
                    return false;
                }
            } else {
                allowForward = false;
                $(".forward").css("cursor", "");
            }
            return true;
        },
    });

    $("#dialpadTermsCheckbox").change(function () {
        if ($(this).is(":checked")) {
            allowForward = true;
            $(".forward").css("cursor", "");
        } else {
            allowForward = false;
            $(".forward").css("cursor", "no-drop");
            toastr.info("You must accept the agreements before proceeding.");
        }
    });

    // Function to set the initial cursor state for the forward button based on the checkbox state
    function setInitialCursorState() {
        // Apply only if the checkbox is not checked
        if (!$("#dialpadTermsCheckbox").is(":checked")) {
            $(".forward").css("cursor", "no-drop");
        }
    }

    function updateProfessionContents() {
        var numTotalEmp = $(".professionEntries").length;
        var professionData = [];
        var professionContent = "";

        for (var i = 1; i <= numTotalEmp; i++) {
            var profession = {};
            profession.name =
                $("#wc_profession_type_" + i + " option:selected").text() || "";
            profession.annualPayroll = $("#wc_annual_payroll_" + i).val() || "";
            profession.numOfEmpUnderProf =
                $("#wc_num_employee_under_this_profession_" + i).val() || "";

            professionContent += `<div><h6><strong>Employee's Profession Entry No. ${i}</strong></h6>`;
            professionContent += `<p>Profession Type: <strong>${profession.name}</strong></p>`;
            professionContent += `<p>Annual Payroll: <strong>${profession.annualPayroll}</strong></p></div>`;
            professionContent += `<p>Number of Employee/s under this profession: <strong>${profession.numOfEmpUnderProf} employee/s</strong></p></div>`;

            professionData.push(profession);
        }

        if (numTotalEmp) {
            $("#wc_details_1").html(`
            <p>Number of Total Employees: <strong>${numTotalEmp} Employee/s</strong></p>
            ${professionContent}
        `);
        } else {
            $("#wc_details_1").html("");
        }
    }
    // $("#wc_no_of_profession").change(updateProfessionContents);
    // $("#wc_no_of_profession").val("1").trigger("change");

    function updateOwnersInfoContents() {
        let ownershipContent = "";

        // console.log("updateOwnersInfoContents called"); // Log when the function is called
        $(".ownersInfo").each(function (index) {
            let counter = index + 1; // Considering that the counter starts from 1

            let ownerName = $(this).find(`[name='wc_name_${counter}']`).val();
            let titleRelationship = $(this)
                .find(`[name='wc_title_relationship_${counter}']`)
                .val();
            let ownershipPercentage = $(this)
                .find(`[name='wc_ownership_perc_${counter}']`)
                .val();
            let excludedIncluded = $(this)
                .find(`[name='wc_exc_inc_${counter}']`)
                .val();
            let ssn = $(this).find(`[name='wc_ssn_${counter}']`).val();
            let fein = $(this).find(`[name='wc_fein_${counter}']`).val();
            let dob = $(this).find(`[name='wc_dob_${counter}']`).val();

            ownershipContent += `<div class='mt-4'><p>Owner Name: <strong>${ownerName}</strong></p>`;
            ownershipContent += `<p>Title/Relationship: <strong>${titleRelationship}</strong></p>`;
            ownershipContent += `<p>Ownership %: <strong>${ownershipPercentage}%</strong></p>`;
            ownershipContent += `<p>Excluded/Included: <strong>${excludedIncluded}</strong></p>`;
            ownershipContent += `<p>SSN: <strong>${ssn}</strong></p>`;
            ownershipContent += `<p>FEIN: <strong>${fein}</strong></p>`;
            ownershipContent += `<p>Date of Birth: <strong>${dob}</strong></p></div>`;
        });

        $("#wc_details_3").append(`

            <p><strong>Owners Information</strong></p>
            ${ownershipContent}
        `);

        return ownershipContent;
    }

    $("#wc_ownership_perc").change(updateOwnersInfoContents);

    function updateVehicleContents() {
        var numVehicles = $("#auto_add_vehicle").val();
        var vehiclesData = [];
        var vehiclesContent = "";

        for (var i = 1; i <= numVehicles; i++) {
            var vehicles = {};
            vehicles.year = $("#auto_vehicle_year_" + i).val();
            vehicles.make = $("#auto_vehicle_maker_" + i).val();
            vehicles.model = $("#auto_vehicle_model_" + i).val();
            vehicles.vin = $("#auto_vehicle_vin_" + i).val();
            vehicles.mileage = $("#auto_vehicle_mileage_" + i).val();
            vehicles.garageAddress = $("#auto_vehicle_garage_add_" + i).val();
            vehicles.coverageLimits = $(
                "#auto_vehicle_coverage_limits_" + i + " option:selected"
            ).text();

            vehiclesContent +=
                "<div><h6><strong>Vehicle Information Entry No. " +
                i +
                "</strong></h6>";
            vehiclesContent +=
                "<p>Year: <strong>" + vehicles.year + "</strong></p>";
            vehiclesContent +=
                "<p>Make: <strong>" + vehicles.make + "</strong></p>";
            vehiclesContent +=
                "<p>Model: <strong>" + vehicles.model + "</strong></p>";
            vehiclesContent +=
                "<p>Vehicle Identification Number (VIN): <strong>" +
                vehicles.vin +
                "</strong></p>";
            vehiclesContent +=
                "<p>Mileage / Radius: <strong>" +
                vehicles.mileage +
                "</strong></p>";
            vehiclesContent +=
                "<p>Garage Address: <strong>" +
                vehicles.garageAddress +
                "</strong></p>";
            vehiclesContent +=
                "<p>Coverage Limits: <strong>" +
                vehicles.coverageLimits +
                "</strong></p></div>";

            vehiclesData.push(vehicles);
        }
        $(".vehicleEntries").html(vehiclesContent);
        numVehicles
            ? $("#auto_vehicle_details_1").html(
                  "<p>Number of Vehicles: <strong>" +
                      numVehicles +
                      "</strong></p>"
              )
            : "";
    }
    $("#auto_add_vehicle").change(updateVehicleContents);

    function updateDriversContents() {
        var numDrivers = $("#auto_add_driver").val();
        var driversData = [];
        var driversContent = "";

        for (var i = 1; i <= numDrivers; i++) {
            var drivers = {};
            drivers.driversName = $("#auto_add_drivers_name_" + i).val();
            drivers.driversLic = $("#auto_add_driver_lic_" + i).val();
            drivers.mileAgeRadius = $(
                "#auto_add_driver_mileage_radius_" + i
            ).val();
            drivers.driversDateOfBirth = $(
                "#auto_add_driver_date_birth_" + i
            ).val();
            drivers.driversCivilStatus = $(
                "#auto_add_driver_civil_status_" + i + " option:selected"
            ).text();

            var driver_civil_status = drivers.driversCivilStatus;
            var driversSpouseName = "";
            var driversSpouseDateOfBirth = "";

            if (driver_civil_status === "Married") {
                drivers.driversSpouseName = $(
                    "#auto_add_driver_spouse_name_" + i
                ).val();
                drivers.driversSpouseDateOfBirth = $(
                    "#auto_add_driver_spouse_dob_" + i
                ).val();
                driversSpouseName =
                    "<p>Spouse's Name: <strong>" +
                    drivers.driversSpouseName +
                    "</strong></p>";
                driversSpouseDateOfBirth =
                    "<p>Spouse's Date of Birth: <strong>" +
                    drivers.driversSpouseDateOfBirth +
                    "</strong></p></div>";
            } else {
                driversSpouseName = "";
                driversSpouseDateOfBirth = "";
            }

            driversContent +=
                "<div><h6><strong>Driver Information Entry No. " +
                i +
                "</strong></h6>";
            driversContent +=
                "<p>Driver's Name: <strong>" +
                drivers.driversName +
                "</strong></p>";
            driversContent +=
                "<p>Drivers License Number: <strong>" +
                drivers.driversLic +
                "</strong></p>";
            driversContent +=
                "<p>Mileage / Radius: <strong>" +
                drivers.mileAgeRadius +
                "</strong></p>";
            driversContent +=
                "<p>Date of Birth: <strong>" +
                drivers.driversDateOfBirth +
                "</strong></p>";

            if (driver_civil_status === "Married") {
                driversContent +=
                    "<p>Civil Status: <strong>" +
                    drivers.driversCivilStatus +
                    "</strong></p>";
                driversContent += driversSpouseName;
                driversContent += driversSpouseDateOfBirth;
            } else {
                driversContent +=
                    "<p>Civil Status: <strong>" +
                    drivers.driversCivilStatus +
                    "</strong></p></div>";
            }

            driversData.push(drivers);
        }
        $(".driverEntries").html(driversContent);
        numDrivers
            ? $("#auto_driver_details_1").html(
                  "<p>Number of Drivers: <strong>" +
                      numDrivers +
                      "</strong></p>"
              )
            : "";
    }
    $("#auto_add_driver").change(updateDriversContents);

    function generateScheduledEquipmentHTML() {
        var scheduledEquipmentHTML = "";

        $('input[name^="instfloat_scheduled_equipment_type_"]').each(function (
            index
        ) {
            var equipmentType = $(this).val();
            var manufacturer = $(
                "#instfloat_scheduled_equipment_mfg_" + (index + 1)
            ).val();
            var idOrSerial = $(
                "#instfloat_scheduled_equipment_id_or_serial_" + (index + 1)
            ).val();
            var model = $(
                "#instfloat_scheduled_equipment_model_" + (index + 1)
            ).val();
            var newOrUsed = $(
                "#instfloat_scheduled_equipment_new_or_used_" + (index + 1)
            ).val();
            var modelYear = $(
                "#instfloat_scheduled_equipment_model_year_" + (index + 1)
            ).val();
            var datePurchased = $(
                "#instfloat_scheduled_equipment_date_purchased_" + (index + 1)
            ).val();

            scheduledEquipmentHTML += `
                <div><h6><strong>Scheduled Equipment ${index + 1}</strong></h6>
                <p>Type: <strong>${equipmentType}</strong></p>
                <p>Manufacturer: <strong>${manufacturer}</strong></p>
                <p>ID # / Serial Number: <strong>${idOrSerial}</strong></p>
                <p>Model: <strong>${model}</strong></p>
                <p>New / Used: <strong>${newOrUsed}</strong></p>
                <p>Model Year: <strong>${modelYear}</strong></p>
                <p>Date Purchased: <strong>${datePurchased}</strong></p></div>`;
        });

        return scheduledEquipmentHTML;
    }

    // Wizard
    $("#wizard_container")
        .wizard({
            stepsWrapper: "#wrapped",
            submit: ".submit",

            beforeSelect: function (event, state) {
                if ($("input#website").val().length != 0) {
                    return false;
                }

                if (!state.isMovingForward) return true;
                var inputs = $(this).wizard("state").step.find(":input");

                // If moving to "submit" step, populate the contents
                if (state.step.hasClass("submit")) {
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
                    var fax_number_if_set = fax_number
                        ? "<p>Fax Number: <strong>" +
                          fax_number +
                          " </strong></p>"
                        : "";
                    var email_address = $("#email_address").val();
                    var personal_website = $("#personal_website").val();
                    var personal_website_if_set = personal_website
                        ? "<p>Personal Website: <strong>" +
                          personal_website +
                          "</strong></p>"
                        : "";
                    var contractor_license = $("#contractor_license").val();
                    var contractor_license_if_set = contractor_license
                        ? "<strong>" + contractor_license + "</strong>"
                        : "";

                    var personalInformation = {
                        "Company Name": company_name,
                        "Full Name": firstname + " " + lastname,
                        Address:
                            address + " " + city + " " + states + " " + zipcode,
                        "Phone Number": phone_number,
                        "Fax Number": fax_number_if_set,
                        "Email Address": email_address,
                        "Personal Website": personal_website_if_set,
                        "Contractor License No.": contractor_license_if_set,
                    };

                    // GL Step 1 & 2
                    var generalLiabilityInformation = {};
                    var gl_annual_gross = $("#gl_annual_gross").val();
                    var gl_profession = $(
                        "#gl_profession option:selected"
                    ).text();
                    var gl_residential = $(
                        "#gl_residential option:selected"
                    ).text();
                    var gl_commercial = $(
                        "#gl_commercial option:selected"
                    ).text();
                    var gl_new_construction = $(
                        "#gl_new_construction option:selected"
                    ).text();
                    var gl_repair_remodel = $(
                        "#gl_repair_remodel option:selected"
                    ).text();
                    var gl_descops = $("#gl_descops").val();
                    var gl_multiple_state_work = $(
                        "#gl_multiple_state_work option:selected"
                    ).text();

                    function getStateWorkData() {
                        let stateWorks = [];
                        $(".stateWorkContainer").each(function () {
                            let state = $(this).find("select").val();
                            let percentage = parseInt(
                                $(this).find("input").val(),
                                10
                            );
                            if (state && !isNaN(percentage)) {
                                stateWorks.push({
                                    State: state,
                                    Percentage: percentage,
                                });
                            }
                        });
                        return stateWorks;
                    }
                    let stateWorksData = getStateWorkData();

                    var gl_cost_proj_5years = $("#gl_cost_proj_5years").val();
                    var gl_full_time_employees = $(
                        "#gl_full_time_employees"
                    ).val();
                    var gl_part_time_employees = $(
                        "#gl_part_time_employees"
                    ).val();
                    var gl_payroll_amt = $("#gl_payroll_amt").val();
                    var gl_using_subcon = $(
                        "#gl_using_subcon option:selected"
                    ).text();
                    var gl_using_subcon_if_set = "";
                    if (gl_using_subcon === "Yes") {
                        var gl_subcon_cost = $("#gl_subcon_cost").val();
                        var gl_using_subcon_if_set = gl_subcon_cost;
                    } else {
                        var gl_using_subcon_if_set = "";
                    }

                    var gl_no_of_losses = $(
                        "#gl_no_of_losses option:selected"
                    ).text();

                    var gl_amt_of_claims = "";
                    var gl_date_of_loss = "";

                    if (gl_no_of_losses === "Have Losses") {
                        gl_amt_of_claims = $("#gl_amt_of_claims").val();
                        gl_date_of_loss = $("#gl_date_of_loss").val();
                    } else {
                        gl_amt_of_claims = "";
                        gl_date_of_loss = "";
                    }

                    generalLiabilityInformation[
                        "General Liability - # of Losses"
                    ] = gl_no_of_losses;
                    generalLiabilityInformation["Amount of Claim"] =
                        gl_amt_of_claims;
                    generalLiabilityInformation["Date of Loss"] =
                        gl_date_of_loss;

                    generalLiabilityInformation["Annual Gross Receipts"] =
                        gl_annual_gross;

                    // Profession Slot
                    var additionalQuestionsGL = {};
                    // console.log(gl_profession.trim());
                    switch (gl_profession.trim()) {
                        case "General Contractor":
                            generalLiabilityInformation["Profession"] =
                                gl_profession;
                            additionalQuestionsGL = {
                                "New construction - How many houses will you be building for the whole year":
                                    $("#gl_gross_add_q1_for_gc").val(),
                                "Do you work on ADU houses?": $(
                                    "#gl_gross_add_q2_for_gc option:selected"
                                ).text(),
                            };
                            break;
                        case "Roofing Contractor":
                            generalLiabilityInformation["Profession"] =
                                gl_profession;
                            additionalQuestionsGL = {
                                "Do you use any heating devices when performing your work?":
                                    $(
                                        "#gl_gross_add_q1_for_roofing option:selected"
                                    ).text(),
                                "Do you do spray foam roofing?": $(
                                    "#gl_gross_add_q2_for_roofing option:selected"
                                ).text(),
                            };

                            const subQuestionValue = $(
                                "#gl_gross_add_q2_for_roofing"
                            ).val();
                            if (subQuestionValue === "1") {
                                additionalQuestionsGL[
                                    "Percentage of Maximum height exposure"
                                ] = $(
                                    "#gl_gross_add_sub_q2_for_roofing option:selected"
                                ).text();
                            }

                            additionalQuestionsGL[
                                "Do you work on slopes greater that 15 degrees?"
                            ] = $(
                                "#gl_gross_add_q4_for_roofing option:selected"
                            ).text();
                            additionalQuestionsGL["Maximum height exposure"] =
                                $(
                                    "#gl_gross_add_q3_for_roofing option:selected"
                                ).text();
                            break;
                        case "Electrical Contractor":
                            generalLiabilityInformation["Profession"] =
                                gl_profession;
                            additionalQuestionsGL = {
                                "Are you working on the following": $(
                                    "#gl_gross_add_q1_for_electrical option:selected"
                                ).text(),
                            };
                            break;
                        case "Plumbing Contractor":
                            generalLiabilityInformation["Profession"] =
                                gl_profession;
                            additionalQuestionsGL = {
                                "Are you working on gas, water, and sewer mains?":
                                    $(
                                        "#gl_gross_add_q1_for_plumbing option:selected"
                                    ).text(),
                                "Do you use any heating devices when performing your work?":
                                    $(
                                        "#gl_gross_add_q2_for_plumbing option:selected"
                                    ).text(),
                            };
                            break;
                        case "HVAC - Heating or Combined Heating and Air Conditioning Systems, Install, Service and Repair":
                            generalLiabilityInformation["Profession"] =
                                gl_profession;
                            additionalQuestionsGL = {
                                "Do you use any heating devices when performing your work?":
                                    $(
                                        "#gl_gross_add_q1_for_hvac option:selected"
                                    ).text(),
                                "Do you do refrigeration works?": $(
                                    "#gl_gross_add_q2_for_hvac option:selected"
                                ).text(),
                            };

                            const subQuestion2Value = $(
                                "#gl_gross_add_q2_for_hvac"
                            ).val();
                            if (subQuestion2Value === "1") {
                                additionalQuestionsGL[
                                    "Please indicate the percentage for refrigeration works"
                                ] = $(
                                    "#gl_gross_add_sub_q2_for_hvac option:selected"
                                ).text();
                            }

                            additionalQuestionsGL["Any works involving LPG?"] =
                                $(
                                    "#gl_gross_add_q3_for_hvac option:selected"
                                ).text();

                            const subQuestion3Value = $(
                                "#gl_gross_add_q3_for_hvac"
                            ).val();
                            if (subQuestion3Value === "1") {
                                additionalQuestionsGL[
                                    "Please indicate the percentage for works involving LPG"
                                ] = $(
                                    "#gl_gross_add_sub_q3_for_hvac option:selected"
                                ).text();
                            }
                            break;
                        case "Concrete Flat Contractor":
                            generalLiabilityInformation["Profession"] =
                                gl_profession;
                            additionalQuestionsGL = {
                                "Flat Works %": $(
                                    "#gl_gross_add_q1_for_concrete"
                                ).val(),
                                "Foundation Works %": $(
                                    "#gl_gross_add_q2_for_concrete"
                                ).val(),
                                "Do you do works on dike, dams, and bridges?":
                                    $("#gl_gross_add_q3_for_concrete").val(),
                            };
                            break;
                        case "Concrete Foundation Contractor":
                            generalLiabilityInformation["Profession"] =
                                gl_profession;
                            additionalQuestionsGL = {
                                "Flat Works %": $(
                                    "#gl_gross_add_q1_for_concrete"
                                ).val(),
                                "Foundation Works %": $(
                                    "#gl_gross_add_q2_for_concrete"
                                ).val(),
                                "Do you do works on dike, dams, and bridges?":
                                    $("#gl_gross_add_q3_for_concrete").val(),
                            };
                            break;
                        case "Handyman":
                            generalLiabilityInformation["Profession"] =
                                gl_profession;
                            additionalQuestionsGL = {
                                "What’s the largest project that you have done?":
                                    $("#gl_gross_add_q1_for_handyman").val(),
                            };
                            break;
                        case "Floor Covering Installation (No Ceramic, Tile, Stone, or Wood)":
                            generalLiabilityInformation["Profession"] =
                                gl_profession;
                            additionalQuestionsGL = {
                                "What type of flooring do you install?": $(
                                    "#gl_gross_add_q1_for_flooring"
                                ).val(),
                            };
                            break;
                        case "Landscaping Contractor":
                            generalLiabilityInformation["Profession"] =
                                gl_profession;
                            additionalQuestionsGL = {
                                "Any hardscaping works?": $(
                                    "#gl_gross_add_q1_for_landscaping"
                                ).val(),
                                "Do you installs irrigations systems?": $(
                                    "#gl_gross_add_q2_for_landscaping"
                                ).val(),
                                "Retaining walls max height.": $(
                                    "#gl_gross_add_q3_for_landscaping"
                                ).val(),
                            };
                            break;
                        case "Lawn Care Services":
                            generalLiabilityInformation["Profession"] =
                                gl_profession;
                            additionalQuestionsGL = {
                                "Any hardscaping works?": $(
                                    "#gl_gross_add_q1_for_landscaping"
                                ).val(),
                                "Do you installs irrigations systems?": $(
                                    "#gl_gross_add_q2_for_landscaping"
                                ).val(),
                                "Retaining walls max height.": $(
                                    "#gl_gross_add_q3_for_landscaping"
                                ).val(),
                            };
                            break;
                        case "Painting Contractor":
                            generalLiabilityInformation["Profession"] =
                                gl_profession;
                            additionalQuestionsGL = {
                                "Do you paint automotive?": $(
                                    "#gl_gross_add_q1_for_painting option:selected"
                                ).text(),
                                "Do you paint roofs, ships, roads and highways?":
                                    $(
                                        "#gl_gross_add_q2_for_painting option:selected"
                                    ).val(),
                                "Max height exposure?": $(
                                    "#gl_gross_add_q3_for_painting"
                                ).val(),
                            };
                            break;
                        case "Plastering/Stucco":
                            generalLiabilityInformation["Profession"] =
                                gl_profession;
                            additionalQuestionsGL = {
                                "Max. height exposure": $(
                                    "#gl_gross_add_q1_for_plastering"
                                ).val(),
                            };
                            break;
                        case "Tree Trimming and Removal":
                            generalLiabilityInformation["Profession"] =
                                gl_profession;
                            additionalQuestionsGL = {
                                "Max. Height Exposure": $(
                                    "#gl_gross_add_q1_for_tree_service"
                                ).val(),
                            };
                            break;
                        case "Masonry Contractor":
                            generalLiabilityInformation["Profession"] =
                                gl_profession;
                            additionalQuestionsGL = {
                                "Do you have any pools exposure?": $(
                                    "#gl_gross_add_q1_for_masonry option:selected"
                                ).text(),
                                "Do you do retaining walls that exceeds 6ft?":
                                    $("#gl_gross_add_q2_for_masonry").val(),
                            };
                            break;
                    }

                    if (Object.keys(additionalQuestionsGL).length === 0) {
                        generalLiabilityInformation["Profession"] =
                            gl_profession;
                    } else {
                        generalLiabilityInformation["Additional Questions"] =
                            additionalQuestionsGL;
                    }

                    generalLiabilityInformation["Additional Questions"] =
                        additionalQuestionsGL;
                    generalLiabilityInformation["Residential"] = gl_residential;
                    generalLiabilityInformation["Commercial"] = gl_commercial;
                    generalLiabilityInformation["New Construction"] =
                        gl_new_construction;
                    generalLiabilityInformation["Repair/Remodel"] =
                        gl_repair_remodel;
                    generalLiabilityInformation[
                        "Detailed Description of Operations"
                    ] = gl_descops;
                    generalLiabilityInformation["Multiple State Work"] =
                        gl_multiple_state_work;
                    generalLiabilityInformation["State Works"] = stateWorksData;
                    generalLiabilityInformation[
                        "Cost of the Largest Project in the past 5 years?"
                    ] = gl_cost_proj_5years;
                    generalLiabilityInformation["Full Time Employee/s"] =
                        gl_full_time_employees;
                    generalLiabilityInformation["Part Time Employee/s"] =
                        gl_part_time_employees;
                    generalLiabilityInformation["Payroll Amount"] =
                        gl_payroll_amt;
                    generalLiabilityInformation[
                        "Are you using any subcontractor"
                    ] = gl_using_subcon;
                    generalLiabilityInformation["Subcontractor Cost"] =
                        gl_using_subcon_if_set;

                    // WC Step 1 & 2
                    updateProfessionContents();
                    var wc_gross_receipt = $("#wc_gross_receipt").val();
                    var wc_does_hire_subcon = $(
                        "#wc_does_hire_subcon option:selected"
                    ).text();
                    var wc_subcon_cost_year_if_set = "";
                    if (wc_does_hire_subcon === "Yes") {
                        var wc_subcon_cost_year = $(
                            "#wc_subcon_cost_year"
                        ).val();
                        wc_subcon_cost_year_if_set = wc_subcon_cost_year;
                    } else {
                        wc_subcon_cost_year_if_set = "";
                    }

                    var wc_num_of_empl = $(
                        "#wc_num_of_empl option:selected"
                    ).text();
                    var wc_name = $("#wc_name").val();
                    var wc_title_relationship = $(
                        "#wc_title_relationship"
                    ).val();
                    var wc_ownership_perc = $(
                        "#wc_ownership_perc option:selected"
                    ).text();
                    var wc_exc_inc = $("#wc_exc_inc option:selected").text();
                    var wc_ssn = $("#wc_ssn").val();
                    var wc_fein = $("#wc_fein").val();
                    var wc_dob = $("#wc_dob").val();

                    var wc_no_of_losses = $(
                        "#wc_no_of_losses option:selected"
                    ).text();
                    var wc_amt_of_claims = $("#wc_amt_of_claims").val();
                    var wc_date_of_loss = $("#wc_date_of_loss").val();

                    if (wc_no_of_losses === "Have Losses") {
                        wc_amt_of_claims = $("#wc_amt_of_claims").val();
                        wc_date_of_loss = $("#wc_date_of_loss").val();
                    } else {
                        wc_amt_of_claims = "";
                        wc_date_of_loss = "";
                    }

                    var workersCompensationInformation2 = {
                        "Gross Receipt": wc_gross_receipt,
                        "Do you hire subcontractor": wc_does_hire_subcon,
                        "Subcontractor cost in a year":
                            wc_subcon_cost_year_if_set,
                        "No. of Employees": wc_num_of_empl,
                        "Worker's Compensation - # of Losses": wc_no_of_losses,
                        "Amount of Claim": wc_amt_of_claims,
                        "Date of Loss": wc_date_of_loss,
                    };

                    var workersCompensationInformation3 = {
                        "Owner Name": wc_name,
                        "Title / Relationship": wc_title_relationship,
                        "Ownership %": wc_ownership_perc,
                        "Excluded / Included": wc_exc_inc,
                        SSN: wc_ssn,
                        FEIN: wc_fein,
                        "Date of Birth": wc_dob,
                    };

                    var ownershipContent = updateOwnersInfoContents();
                    // console.log("Ownership Content:", ownershipContent);

                    var ownersInfo = {
                        "Owners Information": ownershipContent,
                    };

                    updateOwnersInfoContents();

                    // AUTO Step 1 & 3
                    updateVehicleContents();
                    var auto_are_you_the_driver = $(
                        "#auto_are_you_the_driver option:selected"
                    ).text();
                    var auto_driver_full_name = $(
                        "#auto_driver_full_name"
                    ).val();
                    var auto_driver_date_of_birth = $(
                        "#auto_driver_date_of_birth"
                    ).val();
                    var auto_driver_marital_status = $(
                        "#auto_driver_marital_status option:selected"
                    ).text();
                    var auto_driver_spouse_name = "";
                    var auto_driver_spouse_dob = "";
                    var auto_driver_license_no = $(
                        "#auto_driver_license_no"
                    ).val();
                    var auto_driver_years_of_driving_exp = $(
                        "#auto_driver_years_of_driving_exp"
                    ).val();
                    var auto_no_of_losses = $(
                        "#auto_no_of_losses option:selected"
                    ).text();
                    var auto_amt_of_claims = "";
                    var auto_date_of_loss = "";

                    if (auto_driver_marital_status === "Married") {
                        auto_driver_spouse_name = $(
                            "#auto_driver_spouse_name"
                        ).val();
                        auto_driver_spouse_dob = $(
                            "#auto_driver_spouse_dob"
                        ).val();
                    } else {
                        auto_driver_spouse_name = "";
                        auto_driver_spouse_dob = "";
                    }

                    if (auto_no_of_losses === "Have Losses") {
                        auto_amt_of_claims = $("#auto_amt_of_claims").val();
                        auto_date_of_loss = $("#auto_date_of_loss").val();
                    } else {
                        auto_amt_of_claims = "";
                        auto_date_of_loss = "";
                    }

                    var commercialAutoInformation = {
                        "Are you the driver of the vehicle?":
                            auto_are_you_the_driver,
                        "Driver Full Name": auto_driver_full_name,
                        "Date of Birth": auto_driver_date_of_birth,
                        "Marital Status": auto_driver_marital_status,
                        "Spouse Name": auto_driver_spouse_name,
                        "Spouse Date of Birth": auto_driver_spouse_dob,
                        "Driver's License No.": auto_driver_license_no,
                        "Years of Driving Experience":
                            auto_driver_years_of_driving_exp,
                        "Commercial Auto - # of Losses": auto_no_of_losses,
                        "Amount of Claim": auto_amt_of_claims,
                        "Date of Loss": auto_date_of_loss,
                    };

                    updateDriversContents();

                    // BOND 1 & 2
                    var bond_owners_name = $("#bond_owners_name").val();
                    var bond_owners_ssn = $("#bond_owners_ssn").val();
                    var bond_owners_dob = $("#bond_owners_dob").val();
                    var bond_owners_civil_status = $(
                        "#bond_owners_civil_status option:selected"
                    ).text();

                    var bond_owners_spouse_name = "";
                    var bond_owners_spouse_dob = "";
                    var bond_owners_spouse_ssn = "";

                    if (bond_owners_civil_status === "Married") {
                        bond_owners_spouse_name = $(
                            "#bond_owners_spouse_name"
                        ).val();
                        bond_owners_spouse_dob = $(
                            "#bond_owners_spouse_dob"
                        ).val();
                        bond_owners_spouse_ssn = $(
                            "#bond_owners_spouse_ssn"
                        ).val();
                    } else {
                        bond_owners_spouse_name = "";
                        bond_owners_spouse_dob = "";
                        bond_owners_spouse_ssn = "";
                    }

                    var bond_type_bond_requested = $(
                        "#bond_type_bond_requested"
                    ).val();
                    var bond_amount_of_bond = $("#bond_amount_of_bond").val();
                    var bond_term_of_bond = $(
                        "#bond_term_of_bond option:selected"
                    ).text();
                    var bond_type_of_license = $(
                        "#bond_type_of_license option:selected"
                    ).text();

                    var bond_if_other_type_of_license = "";
                    if (bond_type_of_license === "Others") {
                        bond_if_other_type_of_license = $(
                            "#bond_if_other_type_of_license"
                        ).val();
                    } else {
                        bond_if_other_type_of_license = "";
                    }

                    var bond_license_or_application_no = $(
                        "#bond_license_or_application_no"
                    ).val();
                    var bond_effective_date = $("#bond_effective_date").val();

                    var bond_no_of_losses = $(
                        "#bond_no_of_losses option:selected"
                    ).text();
                    var bond_amt_of_claims = "";
                    var bond_date_of_loss = "";

                    if (bond_no_of_losses === "Have Losses") {
                        bond_amt_of_claims = $("#bond_amt_of_claims").val();
                        bond_date_of_loss = $("#bond_date_of_loss").val();
                    } else {
                        bond_amt_of_claims = "";
                        bond_date_of_loss = "";
                    }

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
                        "If others, please indicate":
                            bond_if_other_type_of_license,
                        "License Number or Application Number":
                            bond_license_or_application_no,
                        "Effective Date": bond_effective_date,
                        "Contractor License Bond - # of Losses":
                            bond_no_of_losses,
                        "Amount of Claim": bond_amt_of_claims,
                        "Date of Loss": bond_date_of_loss,
                    };

                    // Excess Step 1 & 2
                    var excess_limits = $(
                        "#excess_limits option:selected"
                    ).text();
                    var excess_gl_eff_date = $("#excess_gl_eff_date").val();
                    var excess_no_of_losses = $(
                        "#excess_no_of_losses option:selected"
                    ).text();
                    var excess_amt_of_claims = "";
                    var excess_date_of_loss = "";
                    if (excess_no_of_losses === "Have Losses") {
                        excess_amt_of_claims = $("#excess_amt_of_claims").val();
                        excess_date_of_loss = $("#excess_date_of_loss").val();
                    } else {
                        excess_amt_of_claims = "";
                        excess_date_of_loss = "";
                    }
                    var excess_insurance_carrier = $(
                        "#excess_insurance_carrier"
                    ).val();
                    var excess_policy_or_quote_no = $(
                        "#excess_policy_or_quote_no"
                    ).val();
                    var excess_policy_premium = $(
                        "#excess_policy_premium"
                    ).val();
                    var excess_effective_date = $(
                        "#excess_effective_date"
                    ).val();
                    var excess_expiration_date = $(
                        "#excess_expiration_date"
                    ).val();

                    var excessLiabilityInformation = {
                        "Excess Limits": excess_limits,
                        "GL Effective Date": excess_gl_eff_date,
                        "Insurance Carrier": excess_insurance_carrier,
                        "Policy Number / Quote Number":
                            excess_policy_or_quote_no,
                        "Policy Premium": excess_policy_premium,
                        "Effective Date": excess_effective_date,
                        "Expiration Date": excess_expiration_date,
                        "Excess Liability - # of Losses": excess_no_of_losses,
                        "Amount of Claim": excess_amt_of_claims,
                        "Date of Loss": excess_date_of_loss,
                    };

                    // Tools Step 1 & 2
                    var tools_misc_tools = $("#tools_misc_tools").val();
                    var tools_rented_or_leased_amt = $(
                        "#tools_rented_or_leased_amt"
                    ).val();
                    var tools_sched_equipment = $(
                        "#tools_sched_equipment"
                    ).val();
                    var tools_equipment_type = $("#tools_equipment_type").val();
                    var tools_equipment_year = $("#tools_equipment_year").val();
                    var tools_equipment_make = $("#tools_equipment_make").val();
                    var tools_equipment_model = $(
                        "#tools_equipment_model"
                    ).val();
                    var tools_equipment_vin_or_serial_no = $(
                        "#tools_equipment_vin_or_serial_no"
                    ).val();
                    var tools_equipment_valuation = $(
                        "#tools_equipment_valuation"
                    ).val();

                    var tools_equipment_no_of_losses = $(
                        "#tools_equipment_no_of_losses option:selected"
                    ).text();
                    var tools_equipment_amt_of_claims = "";
                    var tools_equipment_date_of_loss = "";

                    if (tools_equipment_no_of_losses === "Have Losses") {
                        tools_equipment_amt_of_claims = $(
                            "#tools_equipment_amt_of_claims"
                        ).val();
                        tools_equipment_date_of_loss = $(
                            "#tools_equipment_date_of_loss"
                        ).val();
                    } else {
                        tools_equipment_amt_of_claims = "";
                        tools_equipment_date_of_loss = "";
                    }

                    // var tools_no_losses_5years = $(
                    //     "#tools_no_losses_5years option:selected"
                    // ).text();
                    // var tools_explain_losses = $("#tools_explain_losses").val();

                    var toolsEquipmentInformation = {
                        "Miscellaneous Tools Amount ($1,500 in value and under)":
                            tools_misc_tools,
                        "Rented/Leased Equipment Amount":
                            tools_rented_or_leased_amt,
                        "Scheduled Equipment ($1,500 in value and above)":
                            tools_sched_equipment,
                        "Equipment Type": tools_equipment_type,
                        Year: tools_equipment_year,
                        Make: tools_equipment_make,
                        Model: tools_equipment_model,
                        "VIN or Serial No.": tools_equipment_vin_or_serial_no,
                        Valuation: tools_equipment_valuation,
                        "Tools - # of Losses": tools_equipment_no_of_losses,
                        "Amount of Claim": tools_equipment_amt_of_claims,
                        "Date of Loss": tools_equipment_date_of_loss,
                        // "No. of Losses for the Past 5 Years":
                        //     tools_no_losses_5years,
                        // "If there's a loss, please explain":
                        //     tools_explain_losses,
                    };

                    // Builders Risk Step 1 & 2
                    var br_property_address = $("#br_property_address").val();
                    var br_value_of_existing_structure = $(
                        "#br_value_of_existing_structure"
                    ).val();
                    var br_value_of_work_performed = $(
                        "#br_value_of_work_performed"
                    ).val();
                    var br_period_duration_project = $(
                        "#br_period_duration_project option:selected"
                    ).text();

                    var br_no_of_losses = $(
                        "#br_no_of_losses option:selected"
                    ).text();
                    var br_amt_of_claims = "";
                    var br_date_of_loss = "";

                    if (br_no_of_losses === "Have Losses") {
                        br_amt_of_claims = $("#br_amt_of_claims").val();
                        br_date_of_loss = $("#br_date_of_loss").val();
                    } else {
                        br_amt_of_claims = "";
                        br_date_of_loss = "";
                    }

                    var br_construction_type = $(
                        "#br_construction_type option:selected"
                    ).text();

                    var br_complete_descops_of_project = $(
                        "#br_complete_descops_of_project"
                    ).val();
                    var br_sq_footage = $("#br_sq_footage").val();
                    var br_number_of_floors = $("#br_number_of_floors").val();
                    var br_number_of_units_dwelling = $(
                        "#br_number_of_units_dwelling"
                    ).val();
                    var br_anticipated_occupancy = $(
                        "#br_anticipated_occupancy"
                    ).val();
                    var br_last_update_to_roofing_year = $(
                        "#br_last_update_to_roofing_year"
                    ).val();
                    var br_last_update_to_heating_year = $(
                        "#br_last_update_to_heating_year"
                    ).val();
                    var br_last_update_to_electrical_year = $(
                        "#br_last_update_to_electrical_year"
                    ).val();
                    var br_last_update_to_plumbing_year = $(
                        "#br_last_update_to_plumbing_year"
                    ).val();
                    var br_distance_to_nearest_fire_hydrant = $(
                        "#br_distance_to_nearest_fire_hydrant"
                    ).val();
                    var br_distance_to_nearest_fire_station = $(
                        "#br_distance_to_nearest_fire_station"
                    ).val();
                    var br_structure_occupied_remodel_renovation = $(
                        "#br_structure_occupied_remodel_renovation"
                    ).val();
                    var br_when_structure_built = $(
                        "#br_when_structure_built"
                    ).val();
                    var br_jobsite_security = $("#br_jobsite_security").val();
                    var br_scheduled_property_address_builders_risk_coverage =
                        $(
                            "#br_scheduled_property_address_builders_risk_coverage option:selected"
                        ).text();
                    var br_sched_property_carrier_name = $(
                        "#br_sched_property_carrier_name"
                    ).val();

                    var br_sched_property_effective_date = $(
                        "#br_sched_property_effective_date"
                    ).val();
                    var br_sched_property_expiration_date = $(
                        "#br_sched_property_expiration_date"
                    ).val();

                    var br_residential_commercial = $(
                        "#br_residential_commercial option:selected"
                    ).text();
                    var br_has_project_started = $(
                        "#br_has_project_started option:selected"
                    ).text();

                    var br_when_project_started = $(
                        "#br_when_project_started"
                    ).val();
                    var br_what_are_work_done = $(
                        "#br_what_are_work_done"
                    ).val();
                    var br_cost_of_work_done = $("#br_cost_of_work_done").val();
                    var br_what_are_remaining_works = $(
                        "#br_what_are_remaining_works"
                    ).val();
                    var br_cost_remaining_works = $(
                        "#br_cost_remaining_works"
                    ).val();
                    var br_when_will_project_start = $(
                        "#br_when_will_project_start"
                    ).val();

                    var buildersRiskInformation = {
                        "BR - # of Losses": br_no_of_losses,
                        "Amount of Claim": br_amt_of_claims,
                        "Date of Loss": br_date_of_loss,
                        "Property Address": br_property_address,
                        "Value of Existing Structure":
                            br_value_of_existing_structure,
                        "Value of Work Being Performed":
                            br_value_of_work_performed,
                        "Period of Insurance/Duration of the Project":
                            br_period_duration_project,
                        "Construction Type": br_construction_type,
                        "Complete descriptions of operations for the project for which you are currently applying for insurance":
                            br_complete_descops_of_project,
                        "Square Footage": br_sq_footage,
                        "Number of Floors": br_number_of_floors,
                        "Number of Units in Dwelling":
                            br_number_of_units_dwelling,
                        "What is the Anticipated Occupancy":
                            br_anticipated_occupancy,
                        "Last Update to Roofing Year":
                            br_last_update_to_roofing_year,
                        "Last Update to Heating Year":
                            br_last_update_to_heating_year,
                        "Last Update to Electrical Year":
                            br_last_update_to_electrical_year,
                        "Last Update to Plumbing Year":
                            br_last_update_to_plumbing_year,
                        "Distance to Nearest Fire Hydrant":
                            br_distance_to_nearest_fire_hydrant,
                        "Distance to Nearest Fire Station":
                            br_distance_to_nearest_fire_station,
                        "Will the Structure be Occupied During the Remodel/Renovation?":
                            br_structure_occupied_remodel_renovation,
                        "When was the structure built?":
                            br_when_structure_built,
                        "Jobsite Security": br_jobsite_security,
                        "Has the scheduled property address had any prior Builder's Risk coverage?":
                            br_scheduled_property_address_builders_risk_coverage,
                        "Carrier Name": br_sched_property_carrier_name,
                        "Effective Date": br_sched_property_effective_date,
                        "Expiration Date": br_sched_property_expiration_date,
                        "Residential/Commercial": br_residential_commercial,
                        "Has the project started?": br_has_project_started,
                        "When has the project started?":
                            br_when_project_started,
                        "What are the work done?": br_what_are_work_done,
                        "Cost of Work Done": br_cost_of_work_done,
                        "What are the remaining works?":
                            br_what_are_remaining_works,
                        "Cost of remaining works": br_cost_remaining_works,
                        "When will project start?": br_when_will_project_start,
                    };

                    // Business Owner's Policy Step 1 - 4
                    // BOP Step 1
                    var bop_property_address = $("#bop_property_address").val();
                    var bop_loss_payee_info = $("#bop_loss_payee_info").val();
                    var bop_building_industry = $(
                        "#bop_building_industry"
                    ).val();
                    var bop_occupancy = $("#bop_occupancy").val();
                    var bop_val_cost_bldg = $("#bop_val_cost_bldg").val();
                    var bop_business_property_limit = $(
                        "#bop_business_property_limit"
                    ).val();

                    var bop_no_of_losses = $(
                        "#bop_no_of_losses option:selected"
                    ).text();
                    var bop_amt_of_claims = "";
                    var bop_date_of_loss = "";

                    if (bop_no_of_losses === "Have Losses") {
                        bop_amt_of_claims = $("#bop_amt_of_claims").val();
                        bop_date_of_loss = $("#bop_date_of_loss").val();
                    } else {
                        bop_amt_of_claims = "";
                        bop_date_of_loss = "";
                    }

                    // BOP Step 2
                    var bop_bldg_construction_type = $(
                        "#bop_bldg_construction_type option:selected"
                    ).text();
                    var bop_year_built = $("#bop_year_built").val();
                    var bop_no_of_stories = $("#bop_no_of_stories").val();
                    var bop_total_bldg_sqft = $("#bop_total_bldg_sqft").val();

                    // BOP Step 3
                    var bop_automatic_sprinkler_system = $(
                        "#bop_automatic_sprinkler_system option:selected"
                    ).text();
                    var bop_automatic_fire_alarm = $(
                        "#bop_automatic_fire_alarm option:selected"
                    ).val();
                    var bop_distance_nearest_fire_hydrant = $(
                        "#bop_distance_nearest_fire_hydrant"
                    ).val();
                    var bop_distance_nearest_fire_station = $(
                        "#bop_distance_nearest_fire_station"
                    ).val();
                    var bop_automatic_comm_cooking_ext = $(
                        "#bop_automatic_comm_cooking_ext option:selected"
                    ).text();

                    // BOP Step 4
                    var bop_automatic_burglar_alarm = $(
                        "#bop_automatic_burglar_alarm option:selected"
                    ).text();
                    var bop_security_cameras = $(
                        "#bop_security_cameras option:selected"
                    ).text();
                    var bop_last_update_roofing_year = $(
                        "#bop_last_update_roofing_year"
                    ).val();
                    var bop_last_update_heating_year = $(
                        "#bop_last_update_heating_year"
                    ).val();
                    var bop_last_update_plumbing_year = $(
                        "#bop_last_update_plumbing_year"
                    ).val();
                    var bop_last_update_electrical_year = $(
                        "#bop_last_update_electrical_year"
                    ).val();

                    var bopInformation = {
                        "Property Address": bop_property_address,
                        "Loss Payee Information": bop_loss_payee_info,
                        "Building Industry": bop_building_industry,
                        "Occupancy (Who owns the Building?)": bop_occupancy,
                        "Value of Cost of the Building?": bop_val_cost_bldg,
                        "What is the Business Property Limit?":
                            bop_business_property_limit,
                        "BOP - # of Losses": bop_no_of_losses,
                        "Amount of Claim": bop_amt_of_claims,
                        "Date of Loss": bop_date_of_loss,
                        "Building Construction Type":
                            bop_bldg_construction_type,
                        "Year Built": bop_year_built,
                        "No. of Stories": bop_no_of_stories,
                        "Total Building Sq. Ft.": bop_total_bldg_sqft,
                        "Automatic Sprinkler System":
                            bop_automatic_sprinkler_system,
                        "Automatic Fire Alarm": bop_automatic_fire_alarm,
                        "Distance to Nearest Fire Hydrant":
                            bop_distance_nearest_fire_hydrant,
                        "Distance to Nearest Fire Station":
                            bop_distance_nearest_fire_station,
                        "Automatic Commercial Cooking Extinguishing System":
                            bop_automatic_comm_cooking_ext,
                        "Automatic Burglar Alarm": bop_automatic_burglar_alarm,
                        "Security Cameras": bop_security_cameras,
                        "Last Update to Roofing Yr":
                            bop_last_update_roofing_year,
                        "Last Update to Heating Yr":
                            bop_last_update_heating_year,
                        "Last Update to Plumbing Yr":
                            bop_last_update_plumbing_year,
                        "Last Update to Electrical Yr":
                            bop_last_update_electrical_year,
                    };

                    // Commercial Property Step 1 - 3
                    // Commercial Property Step 1
                    var property_business_located = $(
                        "#property_business_located"
                    ).val();
                    var property_property_address = $(
                        "#property_property_address"
                    ).val();
                    var property_name_of_owner = $(
                        "#property_name_of_owner"
                    ).val();
                    var property_value_cost_bldg = $(
                        "#property_value_cost_bldg"
                    ).val();
                    var property_business_property_limit = $(
                        "#property_business_property_limit"
                    ).val();

                    var property_no_of_losses = $(
                        "#property_no_of_losses option:selected"
                    ).text();
                    var property_amt_of_claims = "";
                    var property_date_of_loss = "";

                    if (property_no_of_losses === "Have Losses") {
                        property_amt_of_claims = $(
                            "#property_amt_of_claims"
                        ).val();
                        property_date_of_loss = $(
                            "#property_date_of_loss"
                        ).val();
                    } else {
                        property_amt_of_claims = "";
                        property_date_of_loss = "";
                    }

                    // Commercial Property Step 2
                    var property_does_have_more_than_one_location = $(
                        "#property_does_have_more_than_one_location option:selected"
                    ).text();
                    var property_multiple_units = $(
                        "#property_multiple_units option:selected"
                    ).text();
                    var property_construction_type = $(
                        "#property_construction_type"
                    ).val();
                    var property_year_built = $("#property_year_built").val();
                    var property_no_of_stories = $(
                        "#property_no_of_stories"
                    ).val();
                    var property_total_bldg_sqft = $(
                        "#property_total_bldg_sqft"
                    ).val();
                    var property_is_bldg_equipped_with_fire_sprinklers = $(
                        "#property_is_bldg_equipped_with_fire_sprinklers option:selected"
                    ).text();
                    var property_distance_nearest_fire_hydrant = $(
                        "#property_distance_nearest_fire_hydrant"
                    ).val();
                    var property_distance_nearest_fire_station = $(
                        "#property_distance_nearest_fire_station"
                    ).val();
                    var property_protection_class = $(
                        "#property_protection_class"
                    ).val();

                    // Commercial Property Step 3
                    var property_protective_device = $(
                        "#property_protective_device"
                    ).val();
                    var property_last_update_roofing_year = $(
                        "#property_last_update_roofing_year"
                    ).val();
                    var property_last_update_heating_year = $(
                        "#property_last_update_heating_year"
                    ).val();
                    var property_last_update_plumbing_year = $(
                        "#property_last_update_plumbing_year"
                    ).val();
                    var property_last_update_electrical_year = $(
                        "#property_last_update_electrical_year"
                    ).val();

                    var commercialPropertyInformation = {
                        "Commercial Property - # of Losses":
                            property_no_of_losses,
                        "Amount of Claim": property_amt_of_claims,
                        "Date of Loss": property_date_of_loss,
                        "Business Location is Located in":
                            property_business_located,
                        "Property Address": property_property_address,
                        "Name of the owner of the building":
                            property_name_of_owner,
                        "Value of Cost of the Building":
                            property_value_cost_bldg,
                        "What is the Business Property Limit":
                            property_business_property_limit,
                        "Do you have more than one location":
                            property_does_have_more_than_one_location,
                        "Are there multiple units (residential or commercial) in your building":
                            property_multiple_units,
                        "Construction Type": property_construction_type,
                        "Year Built": property_year_built,
                        "No. of Stories": property_no_of_stories,
                        "Total Building Square Footage":
                            property_total_bldg_sqft,
                        "Is your building equipped with fire sprinklers":
                            property_is_bldg_equipped_with_fire_sprinklers,
                        "Distance to Nearest Fire Hydrant":
                            property_distance_nearest_fire_hydrant,
                        "Distance to Nearest Fire Station":
                            property_distance_nearest_fire_station,
                        "Protection Class": property_protection_class,
                        "Select any protective devices you have":
                            property_protective_device,
                        "Last Update to Roofing Year":
                            property_last_update_roofing_year,
                        "Last Update to Heating Year":
                            property_last_update_heating_year,
                        "Last Update to Plumbing Year":
                            property_last_update_plumbing_year,
                        "Last Update to Electrical Year":
                            property_last_update_electrical_year,
                    };

                    // Errors and Omission Step 1 - 5
                    // EO Step 1
                    var eo_requested_limits = $(
                        "#eo_requested_limits option:selected"
                    ).text();
                    var eo_reqlimit_if_others = "";
                    if (eo_requested_limits === "Others") {
                        eo_reqlimit_if_others = $(
                            "#eo_reqlimit_if_others"
                        ).val();
                    } else {
                        eo_reqlimit_if_others = "";
                    }
                    var eo_request_deductible = $(
                        "#eo_request_deductible option:selected"
                    ).text();
                    var eo_reqdeductible_if_others = "";
                    if (eo_request_deductible === "Others") {
                        eo_reqdeductible_if_others = $(
                            "#eo_reqdeductible_if_others"
                        ).val();
                    } else {
                        eo_reqdeductible_if_others = "";
                    }

                    var eo_no_of_losses = $(
                        "#eo_no_of_losses option:selected"
                    ).text();
                    var eo_amt_of_claims = "";
                    var eo_date_of_loss = "";
                    if (eo_no_of_losses === "Have Losses") {
                        eo_amt_of_claims = $("#eo_amt_of_claims").val();
                        eo_date_of_loss = $("#eo_date_of_loss").val();
                    } else {
                        eo_amt_of_claims = "";
                        eo_date_of_loss = "";
                    }
                    // EO Step 2
                    var eo_business_entity_q1 = $(
                        "#eo_business_entity_q1 option:selected"
                    ).text();
                    var eo_business_entity_sub_q1 = "";
                    if (eo_business_entity_q1 === "Yes") {
                        eo_business_entity_sub_q1 = $(
                            "#eo_business_entity_sub_q1"
                        ).val();
                    } else {
                        eo_business_entity_sub_q1 = "";
                    }
                    var eo_business_entity_q2 = $(
                        "#eo_business_entity_q2 option:selected"
                    ).text();
                    var eo_business_entity_sub_q2 = "";
                    if (eo_business_entity_q2 === "Yes") {
                        eo_business_entity_sub_q2 = $(
                            "#eo_business_entity_sub_q2"
                        ).val();
                    } else {
                        eo_business_entity_sub_q2 = "";
                    }
                    var eo_business_entity_q3 = $(
                        "#eo_business_entity_q3 option:selected"
                    ).text();
                    var eo_business_entity_sub_q3 = "";
                    if (eo_business_entity_q3 === "Yes") {
                        eo_business_entity_sub_q3 = $(
                            "#eo_business_entity_sub_q3"
                        ).val();
                    } else {
                        eo_business_entity_sub_q3 = "";
                    }
                    var eo_business_entity_sub_q4 = "";
                    var eo_business_entity_q4 = $(
                        "#eo_business_entity_q4 option:selected"
                    ).text();
                    var eo_business_entity_sub_q4 = "";
                    if (eo_business_entity_q4 === "Yes") {
                        eo_business_entity_sub_q4 = $(
                            "#eo_business_entity_sub_q4"
                        ).val();
                    } else {
                        eo_business_entity_sub_q4 = "";
                    }
                    var eo_business_entity_q5 = $(
                        "#eo_business_entity_q5 option:selected"
                    ).text();
                    var eo_business_entity_sub_q5 = "";
                    if (eo_business_entity_q5 === "Yes") {
                        eo_business_entity_sub_q5 = $(
                            "#eo_business_entity_sub_q5"
                        ).val();
                    } else {
                        eo_business_entity_sub_q5 = "";
                    }
                    // EO Step 3
                    var eo_number_employee = $("#eo_number_employee").val();
                    var eo_full_time = $("#eo_full_time").val();
                    var eo_ftime_salary_range = $(
                        "#eo_ftime_salary_range"
                    ).val();
                    var eo_part_time = $("#eo_part_time").val();
                    var eo_ptime_salary_range = $(
                        "#eo_ptime_salary_range"
                    ).val();
                    // EO Step 4
                    var eo_emp_practice_q1 = $(
                        "#eo_emp_practice_q1 option:selected"
                    ).text();
                    // EO Step 5
                    var eo_hr_q1 = $("#eo_hr_q1 option:selected").text();
                    var eo_hr_sub_q1 = "";
                    if (eo_hr_q1 === "Yes") {
                        eo_hr_sub_q1 = $("#eo_hr_sub_q1").val();
                    } else {
                        eo_hr_sub_q1 = "";
                    }
                    var eo_hr_q2 = $("#eo_hr_q2 option:selected").text();
                    var eo_hr_sub_q2 = "";
                    if (eo_hr_q2 === "Yes") {
                        eo_hr_sub_q2 = $("#eo_hr_sub_q2").val();
                    } else {
                        eo_hr_sub_q2 = "";
                    }
                    var eo_hr_q3 = $("#eo_hr_q3 option:selected").text();
                    var eo_hr_sub_q3 = "";
                    if (eo_hr_sub_q3 === "Yes") {
                        eo_hr_sub_q3 = $("#eo_hr_sub_q3").val();
                    } else {
                        eo_hr_sub_q3;
                    }
                    var eo_hr_q4 = $("#eo_hr_q4 option:selected").text();
                    var eo_hr_sub_q4 = "";
                    if (eo_hr_q4 === "Yes") {
                        eo_hr_sub_q4 = $("#eo_hr_sub_q4").val();
                    } else {
                        eo_hr_sub_q4 = "";
                    }

                    var errorsEmissionInformation = {
                        "Requested Limits": eo_requested_limits,
                        "(Requested Limits) Explanation/Indication":
                            eo_reqlimit_if_others,
                        "Requested Deductible (Per Claim)":
                            eo_request_deductible,
                        "(Requested Deductible) Explanation/Indication":
                            eo_reqdeductible_if_others,
                        "EO - # of Losses": eo_no_of_losses,
                        "Amount of Claim": eo_amt_of_claims,
                        "Date of Loss": eo_date_of_loss,
                        "Has the name or ownership of the entity changed within the last 5 years":
                            eo_business_entity_q1,
                        "(Has the name or ownership of the entity changed within the last 5 years?) Explanation/Indication":
                            eo_business_entity_sub_q1,
                        "Has any other business been purchased merged or consolidated with the entity within the last 5 years":
                            eo_business_entity_q2,
                        "(Has any other business been purchased merged or consolidated with the entity within the last 5 years?) Explanation/Indication":
                            eo_business_entity_sub_q2,
                        "Does any other entity own or control your business":
                            eo_business_entity_q3,
                        "(Does any other entity own or control your business) Explanation/Indication":
                            eo_business_entity_sub_q3,
                        "Has your company name been changed during the past 5 years":
                            eo_business_entity_q4,
                        "(Has your company name been changed during the past 5 years?) Explanation/Indication":
                            eo_business_entity_sub_q4,
                        "Has any other business purchased, merged or consolidated with you during the past 5 years":
                            eo_business_entity_q5,
                        "(Has any other business purchased, merged or consolidated with you during the past 5 years?) Explanation/Indication":
                            eo_business_entity_sub_q5,
                        "Number of Employees": eo_number_employee,
                        "Full Time": eo_full_time,
                        "Full Time Salary Range": eo_ftime_salary_range,
                        "Part Time": eo_part_time,
                        "Part Time Salary Range": eo_ptime_salary_range,
                        "Has the applicant total number of employees decreased by more than ten percent (10) due to lay off, force reduction of closing of division in the past 1 year":
                            eo_emp_practice_q1,
                        "Does the Applicant have written employment agreements with all officers":
                            eo_hr_q1,
                        "(Does the Applicant have written employment agreements with all officers) Explanation/Indication":
                            eo_hr_sub_q1,
                        "Does the Applicant have its employment policies/procedures reviewed by labor or employment counsel":
                            eo_hr_q2,
                        "(Does the Applicant have its employment policies/procedures reviewed by labor or employment counsel?) Explanation/Indication":
                            eo_hr_sub_q2,
                        "Does the Applicant have a Human Resources or Personnel Department":
                            eo_hr_q3,
                        "(Does the Applicant have a Human Resources or Personnel Department?) Explanation/Indication":
                            eo_hr_sub_q3,
                        "Does the Applicant have an employee handbook":
                            eo_hr_q4,
                        "(Does the Applicant have an employee handbook?) Explanation/Indication":
                            eo_hr_sub_q4,
                    };

                    // Pollution Step 1 & 3
                    var pol_1_proj_rev = $("#pol_1_proj_rev").val();
                    var pol_1_subcon_work = $("#pol_1_subcon_work").val();
                    var pol_1_total_proj_rev = $("#pol_1_total_proj_rev").val();
                    var pol_1_total_subcon_work = $(
                        "#pol_1_total_subcon_work"
                    ).val();

                    var pol_2_proj_rev = $("#pol_2_proj_rev").val();
                    var pol_2_subcon_work = $("#pol_2_subcon_work").val();
                    var pol_2_total_proj_rev = $("#pol_2_total_proj_rev").val();
                    var pol_2_total_subcon_work = $(
                        "#pol_2_total_subcon_work"
                    ).val();

                    var pol_3_proj_rev = $("#pol_3_proj_rev").val();
                    var pol_3_subcon_work = $("#pol_3_subcon_work").val();
                    var pol_3_total_proj_rev = $("#pol_3_total_proj_rev").val();
                    var pol_3_total_subcon_work = $(
                        "#pol_3_total_subcon_work"
                    ).val();

                    var pollution_no_of_losses = $(
                        "#pollution_no_of_losses option:selected"
                    ).text();
                    var pollution_amt_of_claims = $(
                        "#pollution_amt_of_claims"
                    ).val();
                    var pollution_date_of_loss = $(
                        "#pollution_date_of_loss"
                    ).val();

                    if (pollution_no_of_losses === "Have Losses") {
                        pollution_amt_of_claims = $(
                            "#pollution_amt_of_claims"
                        ).val();
                        pollution_date_of_loss = $(
                            "#pollution_date_of_loss"
                        ).val();
                    } else {
                        pollution_amt_of_claims = "";
                        pollution_date_of_loss = "";
                    }

                    if ($("#polopt1_id").length) {
                        var polopt1_id = $("#polopt1_id").val();
                        if (polopt1_id.length > 0) {
                            var selectedOptionsText1 = $(
                                "#polopt1_id option:selected"
                            )
                                .map(function () {
                                    return $(this).text();
                                })
                                .get()
                                .join(", ");
                        }
                    }

                    if ($("#polopt2_id").length) {
                        var polopt2_id = $("#polopt2_id").val();
                        if (polopt2_id.length > 0) {
                            var selectedOptionsText2 = $(
                                "#polopt2_id option:selected"
                            )
                                .map(function () {
                                    return $(this).text();
                                })
                                .get()
                                .join(", ");
                        }
                    }

                    if ($("#polopt3_id").length) {
                        var polopt3_id = $("#polopt3_id").val();
                        if (polopt3_id.length > 0) {
                            var selectedOptionsText3 = $(
                                "#polopt3_id option:selected"
                            )
                                .map(function () {
                                    return $(this).text();
                                })
                                .get()
                                .join(", ");
                        }
                    }

                    var pollutionLiabilityInformation1 = {
                        "Env. Contracting Srvcs. Project Revenues $":
                            pol_1_proj_rev,
                        "% of Subcontracted Work": pol_1_subcon_work,
                        "Total Projected Revenues $": pol_1_total_proj_rev,
                        "Total % of Subcontracted Work":
                            pol_1_total_subcon_work,
                        "Selected Options": selectedOptionsText1,
                    };

                    var pollutionLiabilityInformation2 = {
                        "Env. Consulting Srvcs. Projected Revenues $":
                            pol_2_proj_rev,
                        "% of Subcontracted Work": pol_2_subcon_work,
                        "Total Projected Revenues $": pol_2_total_proj_rev,
                        "Total % of Subcontracted Work":
                            pol_2_total_subcon_work,
                        "Selected Options": selectedOptionsText2,
                    };

                    var pollutionLiabilityInformation3 = {
                        "Non-Environmental Srvcs. Projected Revenues $":
                            pol_3_proj_rev,
                        "% of Subcontracted Work": pol_3_subcon_work,
                        "Total Projected Revenues $": pol_3_total_proj_rev,
                        "Total % of Subcontracted Work":
                            pol_3_total_subcon_work,
                        "Selected Options": selectedOptionsText3,
                    };

                    var pollutionLiabilityInformation4 = {
                        "Pollution Liability - # of Losses":
                            pollution_no_of_losses,
                        "Amount of Claim": pollution_amt_of_claims,
                        "Date of Loss": pollution_date_of_loss,
                    };

                    // EPLI Step 1 - 6
                    // EPLI Step 1
                    var epli_fein = $("#epli_fein").val();
                    var epli_current_epli = $("#epli_current_epli").val();
                    var epli_prior_carrier = $("#epli_prior_carrier").val();
                    var epli_prior_carrier_epli = $(
                        "#epli_prior_carrier_epli"
                    ).val();
                    var epli_effective_date = $("#epli_effective_date").val();
                    var epli_prev_premium_amount = $(
                        "#epli_prev_premium_amount"
                    ).val();
                    var epli_deductible_amount = $(
                        "#epli_deductible_amount"
                    ).val();

                    var epli_deductible_claim_if_others = "";
                    if (epli_deductible_amount === "Others") {
                        epli_deductible_claim_if_others = $(
                            "#epli_deductible_claim_if_others"
                        ).val();
                    } else {
                        epli_deductible_claim_if_others = "";
                    }

                    var epli_no_of_losses = $(
                        "#epli_no_of_losses option:selected"
                    ).text();
                    var epli_amt_of_claims = "";
                    var epli_date_of_loss = "";
                    if (epli_no_of_losses === "Have Losses") {
                        epli_amt_of_claims = $("#epli_amt_of_claims").val();
                        epli_date_of_loss = $("#epli_date_of_loss").val();
                    } else {
                        epli_amt_of_claims = "";
                        epli_date_of_loss = "";
                    }
                    // EPLI Step 2
                    var epli_full_time = $("#epli_full_time").val();
                    var epli_part_time = $("#epli_part_time").val();
                    var epli_independent_contractors = $(
                        "#epli_independent_contractors"
                    ).val();
                    var epli_volunteers = $("#epli_volunteers").val();
                    var epli_leased_seasonal = $("#epli_leased_seasonal").val();
                    var epli_non_us_base_emp = $("#epli_non_us_base_emp").val();
                    var epli_total_employees = $("#epli_total_employees").val();

                    // EPLI Step 3
                    var epli_located_at_ca = $("#epli_located_at_ca").val();
                    var epli_located_at_ga = $("#epli_located_at_ga").val();
                    var epli_located_at_tx = $("#epli_located_at_tx").val();
                    var epli_located_at_fl = $("#epli_located_at_fl").val();
                    var epli_located_at_ny = $("#epli_located_at_ny").val();
                    var epli_located_at_nj = $("#epli_located_at_nj").val();

                    // EPLI Step 4
                    var epli_salary_range_q1 = $(
                        "#epli_salary_range_q1 option:selected"
                    ).text();
                    var epli_salary_range_q2 = $(
                        "#epli_salary_range_q2 option:selected"
                    ).text();
                    var epli_salary_range_q3 = $(
                        "#epli_salary_range_q3 option:selected"
                    ).text();

                    // EPLI Ste 5
                    var epli_emp_terminated_last_12_months_q1 = $(
                        "#epli_emp_terminated_last_12_months_q1"
                    ).val();
                    var epli_emp_terminated_last_12_months_q2 = $(
                        "#epli_emp_terminated_last_12_months_q2"
                    ).val();
                    var epli_emp_terminated_last_12_months_q3 = $(
                        "#epli_emp_terminated_last_12_months_q3"
                    ).val();

                    // EPLI Step 6
                    var epli_hr_q1 = $("#epli_hr_q1 option:selected").text();
                    var epli_hr_q2 = $("#epli_hr_q2 option:selected").text();
                    var epli_hr_q3 = $("#epli_hr_q3 option:selected").text();
                    var epli_hr_q4 = $("#epli_hr_q4 option:selected").text();
                    var epli_hr_q5 = $("#epli_hr_q5 option:selected").text();
                    var epli_hr_q6 = $("#epli_hr_q6 option:selected").text();

                    var epliInformation = {
                        "FEIN No.": epli_fein,
                        "Current EPLI": epli_current_epli,
                        "Prior Carrier": epli_prior_carrier,
                        "Prior Carrier EPLI": epli_prior_carrier_epli,
                        "Effective Date": epli_effective_date,
                        "Previous Premium Amount": epli_prev_premium_amount,
                        "Deductible Amount": epli_deductible_amount,
                        "If others, please indicate the deductible per claim amount":
                            epli_deductible_claim_if_others,
                        "EPLI - # of Losses": epli_no_of_losses,
                        "Amount of Claim": epli_amt_of_claims,
                        "Date of Loss": epli_date_of_loss,
                        "EPLI - Full Time": epli_full_time,
                        "Part Time": epli_part_time,
                        "Independent Contractors": epli_independent_contractors,
                        Volunteers: epli_volunteers,
                        "Leased or Seasonal": epli_leased_seasonal,
                        "Non-US base Emp.": epli_non_us_base_emp,
                        "Total Employees": epli_total_employees,
                        CA: epli_located_at_ca,
                        GA: epli_located_at_ga,
                        TX: epli_located_at_tx,
                        FL: epli_located_at_fl,
                        NY: epli_located_at_ny,
                        NJ: epli_located_at_nj,
                        "Up to $60,000": epli_salary_range_q1,
                        "$60,000 - $120,000": epli_salary_range_q2,
                        "Over $120,000": epli_salary_range_q3,
                        Voluntary: epli_emp_terminated_last_12_months_q1,
                        Involuntary: epli_emp_terminated_last_12_months_q2,
                        "Laid-Off": epli_emp_terminated_last_12_months_q3,
                        "Does the Applicant have a standard employment application for all applicants":
                            epli_hr_q1,
                        "Does the Applicant have an 'At Will' provision in the employment application":
                            epli_hr_q2,
                        "Does the Applicant have an employment handbook":
                            epli_hr_q3,
                        "Does the Applicant have a written policy with respect to sexual harassment":
                            epli_hr_q4,
                        "Does the Applicant have a written policy with respect to discrimination":
                            epli_hr_q5,
                        "Does the Applicant have written annual evaluations for employees":
                            epli_hr_q6,
                    };

                    // Cyber Step 1-2
                    // Cyber Step 1
                    var cyber_it_contact_name = $(
                        "#cyber_it_contact_name"
                    ).val();
                    var cyber_it_contact_number = $(
                        "#cyber_it_contact_number"
                    ).val();
                    var cyber_it_contact_email = $(
                        "#cyber_it_contact_email"
                    ).val();

                    var cyber_no_of_losses = $(
                        "#cyber_no_of_losses option:selected"
                    ).text();
                    var cyber_amt_of_claims = "";
                    var cyber_date_of_loss = "";
                    if (cyber_no_of_losses === "Have Losses") {
                        cyber_amt_of_claims = $("#cyber_amt_of_claims").val();
                        cyber_date_of_loss = $("#cyber_date_of_loss").val();
                    } else {
                        cyber_amt_of_claims = "";
                        cyber_date_of_loss = "";
                    }
                    // Cyber Step 2
                    var cyber_engaged_business_activities = $(
                        "#cyber_engaged_business_activities option:selected"
                    ).text();
                    var cyber_q1 = $("#cyber_q1 option:selected").text();
                    var cyber_q2 = $("#cyber_q2 option:selected").text();
                    var cyber_q3 = $("#cyber_q3 option:selected").text();
                    var cyber_q4 = $("#cyber_q4 option:selected").text();
                    var cyber_q5 = $("#cyber_q5 option:selected").text();
                    var cyber_q6 = $("#cyber_q6 option:selected").text();
                    var cyber_q7 = $("#cyber_q7 option:selected").text();

                    var cyberLiabilityInformation = {
                        "Cyber Liabilty - # of Losses": cyber_no_of_losses,
                        "Amount of Claim": cyber_amt_of_claims,
                        "Date of Loss": cyber_date_of_loss,
                        "IT Contact Name": cyber_it_contact_name,
                        "IT Contact Number": cyber_it_contact_number,
                        "IT Contact Email": cyber_it_contact_email,
                        "Are you engaged in any of the following business activities?":
                            cyber_engaged_business_activities,
                        "Is there a system in place for verifying fund and wire transfers over $25,000 through a secondary means of communication prior to execution?":
                            cyber_q1,
                        "Do you store your backups offline or with a cloud service provider?":
                            cyber_q2,
                        "Do you store or process personal, health, or credit card information of more than 500,000 Individuals?":
                            cyber_q3,
                        "Do you enabled multi-factor authentication for email access and remote network access?":
                            cyber_q4,
                        "Do you encrypt all sensitive information at rest?":
                            cyber_q5,
                        "Any relevant claims or incidents exceeding $10,000 within the past three years?":
                            cyber_q6,
                        "Would there be any potential Cyber Event, Loss, or claim that could fall within the scope of the policy you are applying for?":
                            cyber_q7,
                    };

                    // Installation Floater Step 1 - 5
                    var instfloat_territory_of_operation = $(
                        "#instfloat_territory_of_operation option:selected"
                    ).text();
                    var instfloat_type_of_operation = $(
                        "#instfloat_type_of_operation"
                    ).val();
                    var instfloat_scheduled_type_of_equipment = $(
                        "#instfloat_scheduled_type_of_equipment"
                    ).val();
                    var instfloat_deductible_amount = $(
                        "#instfloat_deductible_amount option:selected"
                    ).text();
                    var instfloat_no_of_losses = $(
                        "#instfloat_no_of_losses option:selected"
                    ).text();
                    var instfloat_amt_of_claims = "";
                    var instfloat_date_of_loss = "";
                    if (instfloat_no_of_losses === "Have Losses") {
                        instfloat_amt_of_claims = $(
                            "#instfloat_amt_of_claims"
                        ).val();
                        instfloat_date_of_loss = $(
                            "#instfloat_date_of_loss"
                        ).val();
                    } else {
                        instfloat_amt_of_claims = "";
                        instfloat_date_of_loss = "";
                    }

                    // var instfloat_date_of_loss = $(
                    //     "#instfloat_date_of_loss"
                    // ).val();
                    var instfloat_location = $("#instfloat_location").val();
                    var instfloat_months_in_storage = $(
                        "#instfloat_months_in_storage"
                    ).val();
                    var instfloat_max_value_of_equipment = $(
                        "#instfloat_max_value_of_equipment"
                    ).val();
                    var instfloat_max_value_of_bldg_storage = $(
                        "#instfloat_max_value_of_bldg_storage"
                    ).val();
                    var instfloat_type_security_placed = $(
                        "#instfloat_type_security_placed"
                    ).val();
                    var instfloat_unscheduled_type_of_equipment = $(
                        "#instfloat_unscheduled_type_of_equipment"
                    ).val();
                    var instfloat_unscheduled_max_value_equipment_storing = $(
                        "#instfloat_unscheduled_max_value_equipment_storing"
                    ).val();
                    var instfloat_additional_info_q1 = $(
                        "#instfloat_additional_info_q1 option:selected"
                    ).text();
                    var instfloat_additional_info_q2 = $(
                        "#instfloat_additional_info_q2 option:selected"
                    ).text();
                    var instfloat_additional_info_q3 = $(
                        "#instfloat_additional_info_q3 option:selected"
                    ).text();
                    var instfloat_additional_info_q4 = $(
                        "#instfloat_additional_info_q4 option:selected"
                    ).text();

                    var instFloatInformation = {
                        "Territory of Operation":
                            instfloat_territory_of_operation,
                        "Type of Operation": instfloat_type_of_operation,
                        "Type of Equipment / materials you will be working with":
                            instfloat_scheduled_type_of_equipment,
                        "Deductible Amount": instfloat_deductible_amount,
                        Location: instfloat_location,
                        "Months in storage": instfloat_months_in_storage,
                        "Maximum Value of equipment that you will be storing":
                            instfloat_max_value_of_equipment,
                        "Maximum Value of Building storage":
                            instfloat_max_value_of_bldg_storage,
                        "Type of Security in place withing the storage building":
                            instfloat_type_security_placed,
                        "Type of Equipment / materials you will be working with":
                            instfloat_unscheduled_type_of_equipment,
                        "Maximum Value of equipment that you will be storing":
                            instfloat_unscheduled_max_value_equipment_storing,
                        "Equipment Rented Loaned to / from Others with or without Operators?":
                            instfloat_additional_info_q1,
                        "Are you Operating Equipment not listed here?":
                            instfloat_additional_info_q2,
                        "Property used underground?":
                            instfloat_additional_info_q3,
                        "Any work done afloat?": instfloat_additional_info_q4,
                        "Installation Floater - # of Losses":
                            instfloat_no_of_losses,
                        "Amount of Claim": instfloat_amt_of_claims,
                        "Date of Loss": instfloat_date_of_loss,
                    };

                    // About Your Company Step
                    var ayc_bop = $("#ayc_bop option:selected").text();
                    var ayc_date_business_started = $(
                        "#ayc_date_business_started"
                    ).val();
                    var ayc_yrs_exp_contractor = $(
                        "#ayc_yrs_exp_contractor"
                    ).val();
                    var ayc_yrs_in_business = $("#ayc_yrs_in_business").val();

                    var annual_gross_receipt = $("#annual_gross_receipt").val();
                    var profession = $("#profession option:selected").text();
                    var residential_percentage = $(
                        "#residential_percentage option:selected"
                    ).text();
                    var commercial_percentage = $(
                        "#commercial_percentage option:selected"
                    ).text();
                    var new_construction_percentage = $(
                        "#new_construction_percentage option:selected"
                    ).text();
                    var repair_remodel_percentage = $(
                        "#repair_remodel_percentage option:selected"
                    ).text();

                    // var ayc_no_of_losses = $(
                    //     "#ayc_no_of_losses option:selected"
                    // ).text();
                    // var ayc_no_of_losses_explain = $(
                    //     "#ayc_no_of_losses_explain"
                    // ).val();

                    var aboutYourCompanyInformation = {};

                    aboutYourCompanyInformation[
                        "Business Ownership Structure"
                    ] = ayc_bop;
                    aboutYourCompanyInformation["Date Business Started"] =
                        ayc_date_business_started;
                    aboutYourCompanyInformation["Years in Business"] =
                        ayc_yrs_in_business;
                    aboutYourCompanyInformation[
                        "Years of experience as a contractor"
                    ] = ayc_yrs_exp_contractor;

                    aboutYourCompanyInformation["Annual Gross Receipts"] =
                        annual_gross_receipt;
                    aboutYourCompanyInformation["Select a Profession"] =
                        profession;
                    aboutYourCompanyInformation["Residential %"] =
                        residential_percentage;
                    aboutYourCompanyInformation["Commercial %"] =
                        commercial_percentage;
                    aboutYourCompanyInformation["New Construction %"] =
                        new_construction_percentage;
                    aboutYourCompanyInformation["Repair / Remodel"] =
                        repair_remodel_percentage;

                    function generateAllHTML(targetDiv, informationObjects) {
                        var htmlString = "";

                        // Loop through each information object
                        informationObjects.forEach(function (
                            informationObject
                        ) {
                            for (var info in informationObject) {
                                var value = informationObject[info];
                                // console.log(value);

                                if (value || typeof value === "object") {
                                    if (
                                        typeof value === "string" &&
                                        value.startsWith("<div")
                                    ) {
                                        htmlString += value;
                                    } else if (
                                        info === "Building Construction Type"
                                    ) {
                                        // Add an <h6> tag before this specific field
                                        htmlString +=
                                            "<h6><strong>What is the property contents?</strong></h6>";
                                        // Use <p> tags for the field name and its value
                                        htmlString +=
                                            "<p>Building Construction Type: <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (
                                        info === "Automatic Sprinkler System"
                                    ) {
                                        htmlString +=
                                            "<h6><strong>Protective Safeguards - Fire:</strong></h6>";
                                        htmlString +=
                                            "<p>Automatic Sprinkler System: <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (
                                        info === "Annual Gross Receipts"
                                    ) {
                                        htmlString +=
                                            "<h6><strong>About your Information:</strong></h6>";
                                        htmlString +=
                                            "<p>Annual Gross Receipts: <strong>" +
                                            value +
                                            "</strong> </p>";
                                    } else if (
                                        info === "Automatic Burglar Alarm"
                                    ) {
                                        htmlString +=
                                            "<h6><strong>Protective Safeguards - Burglary and Robbery:</strong></h6>";
                                        htmlString +=
                                            "<p>Automatic Burglar Alarm: <strong>" +
                                            value +
                                            "</strong></p>";
                                        // EO
                                    } else if (
                                        info ===
                                        "Has the name or ownership of the entity changed within the last 5 years"
                                    ) {
                                        // console.log(value);
                                        htmlString +=
                                            "<h6><strong>Business Entity:</strong></h6>";
                                        htmlString +=
                                            "<p>Has the name or ownership of the entity changed within the last 5 years?: <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (
                                        info ===
                                        "Has any other business been purchased merged or consolidated with the entity within the last 5 years"
                                    ) {
                                        htmlString +=
                                            "<p>Has any other business been purchased merged or consolidated with the entity within the last 5 years?: <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (
                                        info ===
                                        "Does any other entity own or control your business"
                                    ) {
                                        htmlString +=
                                            "<p>Does any other entity own or control your business?: <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (info === "Location") {
                                        htmlString +=
                                            "<h6><strong>Scheduled Storage:</strong></h6>";
                                        htmlString +=
                                            "<p>Location: <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (
                                        info ===
                                        "Type of Equipment / materials you will be working with"
                                    ) {
                                        htmlString +=
                                            "<h6><strong>Unscheduled Equipment for Storage:</strong></h6>";
                                        htmlString +=
                                            "<p>Type of Equipment / materials you will be working with: <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (
                                        info ===
                                        "Equipment Rented Loaned to / from Others with or without Operators?"
                                    ) {
                                        htmlString +=
                                            "<h6><strong>Additional Information:</strong></h6>";
                                        htmlString +=
                                            "<p>Equipment Rented. Loaned to/from Others with or without Operators?: <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (info === "Number of Employees") {
                                        htmlString +=
                                            "<h6><strong>Employees:</strong></h6>";
                                        htmlString +=
                                            "<p>Number of Employees: <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (
                                        info ===
                                        "Has the applicant total number of employees decreased by more than ten percent (10) due to lay off, force reduction of closing of division in the past 1 year"
                                    ) {
                                        htmlString +=
                                            "<h6><strong>Employment Practices:</strong></h6>";
                                        htmlString +=
                                            "<p>Has the applicant total number of employees decreased by more than ten percent (10) due to lay off, force reduction of closing of division in the past 1 year?: <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (
                                        info ===
                                        "Does the Applicant have written employment agreements with all officers"
                                    ) {
                                        htmlString +=
                                            "<h6><strong>Human Resources:</strong></h6>";
                                        htmlString +=
                                            "<p>Does the Applicant have written employment agreements with all officers?: <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (info === "EPLI - Full Time") {
                                        htmlString +=
                                            "<h6><strong>How many employees are:</strong></h6>";
                                        htmlString +=
                                            "<p>Full Time: <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (info === "Location") {
                                        htmlString +=
                                            "<h6><strong>Equipment Storage</strong></h6>";
                                        htmlString +=
                                            "<p>Location: <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (info === "CA") {
                                        htmlString +=
                                            "<h6><strong>How many employees are located at:</strong></h6>";
                                        htmlString +=
                                            "<p>CA: <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (info === "Up to $60,000") {
                                        htmlString +=
                                            "<h6><strong>How many percent of employees are in the salary range of:</strong></h6>";
                                        htmlString +=
                                            "<p>Up to $60,000: <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (
                                        info ===
                                        "Installation Floater - # of Losses"
                                    ) {
                                        htmlString +=
                                            "<h6><strong>Installation Floater - Loss Information</strong></h6>";
                                        htmlString +=
                                            "<p>Does have Losses? <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (
                                        info === "Cyber Liabilty - # of Losses"
                                    ) {
                                        htmlString +=
                                            "<h6><strong>Cyber Liability - Loss Information</strong></h6>";
                                        htmlString +=
                                            "<p>Does have Losses? <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (info === "EPLI - # of Losses") {
                                        htmlString +=
                                            "<h6><strong>EPLI - Loss Information</strong></h6>";
                                        htmlString +=
                                            "<p>Does have Losses? <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (info === "EO - # of Losses") {
                                        htmlString +=
                                            "<h6><strong>Errors and Omission - Loss Information</strong></h6>";
                                        htmlString +=
                                            "<p>Does have Losses? <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (
                                        info ===
                                        "Commercial Property - # of Losses"
                                    ) {
                                        htmlString +=
                                            "<h6><strong>Commercial Property - Loss Information</strong></h6>";
                                        htmlString +=
                                            "<p>Does have Losses? <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (info === "BOP - # of Losses") {
                                        htmlString +=
                                            "<h6><strong>Business Owner's Policy - Loss Information</strong></h6>";
                                        htmlString +=
                                            "<p>Does have Losses? <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (info === "BR - # of Losses") {
                                        htmlString +=
                                            "<h6><strong>Builder's Risk - Loss Information</strong></h6>";
                                        htmlString +=
                                            "<p>Does have Losses? <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (info === "Tools - # of Losses") {
                                        htmlString +=
                                            "<h6><strong>Tools and Equipment - Loss Information</strong></h6>";
                                        htmlString +=
                                            "<p>Does have Losses? <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (
                                        info ===
                                        "Excess Liability - # of Losses"
                                    ) {
                                        htmlString +=
                                            "<h6><strong>Excess Liability - Loss Information</strong></h6>";
                                        htmlString +=
                                            "<p>Does have Losses? <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (
                                        info ===
                                        "Contractor License Bond - # of Losses"
                                    ) {
                                        htmlString +=
                                            "<h6><strong>Contractor License Bond - Loss Information</strong></h6>";
                                        htmlString +=
                                            "<p>Does have Losses? <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (
                                        info ===
                                        "Worker's Compensation - # of Losses"
                                    ) {
                                        htmlString +=
                                            "<h6><strong>Worker's Compensation - Loss Information</strong></h6>";
                                        htmlString +=
                                            "<p>Does have Losses? <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (
                                        info === "State Works" &&
                                        Array.isArray(value)
                                    ) {
                                        htmlString +=
                                            "<h6><strong>State Works:</strong></h6>";
                                        value.forEach((stateWork) => {
                                            htmlString += `<p>State: <strong>${stateWork.State}</strong> - Percentage: <strong>${stateWork.Percentage}%</strong></p>`;
                                        });
                                        htmlString += "<br />";
                                    } else if (info === "Voluntary") {
                                        htmlString +=
                                            "<h6><strong>How many employees have been terminated in the last 12 months:</strong></h6>";
                                        htmlString +=
                                            "<p>Voluntary: <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (info === "Owner Name") {
                                        htmlString +=
                                            "<h6><strong>Owner's Information:</strong></h6>";
                                        htmlString +=
                                            "<p>Owner's Name: <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (info === "Profession Name") {
                                        htmlString +=
                                            "<h6><strong>Profession Entry No. " +
                                            (index + 1) +
                                            "</strong></h6>"; // 'index' will be from the forEach loop
                                        htmlString +=
                                            "<p>Profession: <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (
                                        info === "Commercial Auto - # of Losses"
                                    ) {
                                        htmlString +=
                                            "<h6><strong>Commercial Auto - Loss Information</strong></h6>";
                                        htmlString +=
                                            "<p>Does have Losses? <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (
                                        info ===
                                        "General Liability - # of Losses"
                                    ) {
                                        htmlString +=
                                            "<h6><strong>General Liability - Loss Information</strong></h6>";
                                        htmlString +=
                                            "<p>Does have Losses? <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (
                                        info ===
                                        "Pollution Liability - # of Losses"
                                    ) {
                                        htmlString +=
                                            "<h6><strong>Pollution Liability Application - Loss Information</strong></h6>";
                                        htmlString +=
                                            "<p>Does have Losses? <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (info === "Annual Payroll") {
                                        htmlString +=
                                            "<p>Annual Payroll: <strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (
                                        info ===
                                        "Env. Contracting Srvcs. Project Revenues $"
                                    ) {
                                        htmlString +=
                                            "<h6><strong>Environmental Contracting Services: </strong></h6>";
                                        htmlString +=
                                            "<p>Projected Revenues $:<strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (
                                        info ===
                                        "Env. Consulting Srvcs. Projected Revenues $"
                                    ) {
                                        htmlString +=
                                            "<h6><strong>Environmental Consulting Services: </strong></h6>";
                                        htmlString +=
                                            "<p>Projected Revenues $:<strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (
                                        info ===
                                        "Non-Environmental Srvcs. Projected Revenues $"
                                    ) {
                                        htmlString +=
                                            "<h6><strong>Non-Environmental Services: </strong></h6>";
                                        htmlString +=
                                            "<p>Projected Revenues $:<strong>" +
                                            value +
                                            "</strong></p>";
                                    } else if (info === "Profession") {
                                        htmlString +=
                                            "<p>Profession: <strong>" +
                                            (value === undefined ? "" : value) +
                                            "</strong></p>";
                                    } else if (
                                        info === "Additional Questions" &&
                                        typeof value === "object"
                                    ) {
                                        // Check if there are additional questions to display
                                        var hasAdditionalQuestions =
                                            Object.keys(value).length > 0;
                                        if (hasAdditionalQuestions) {
                                            htmlString +=
                                                "<h6><strong>Additional Questions for " +
                                                gl_profession +
                                                ":</strong></h6>";
                                            for (var subInfo in value) {
                                                htmlString +=
                                                    "<p>" +
                                                    subInfo +
                                                    ": <strong>" +
                                                    value[subInfo] +
                                                    "</strong></p>";
                                            }
                                            htmlString += "<br />";
                                        }
                                    } else {
                                        // For other fields, use <p> tags
                                        htmlString +=
                                            "<p>" +
                                            info +
                                            ": <strong>" +
                                            value +
                                            "</strong></p>";
                                    }
                                }
                            }
                        });

                        if (targetDiv === "#instfloat_liability_details") {
                            var scheduledEquipmentHTML =
                                generateScheduledEquipmentHTML();
                            htmlString += scheduledEquipmentHTML;
                        }
                        $(targetDiv).html(htmlString);
                    }

                    generateAllHTML("#personal_information_details", [
                        personalInformation,
                    ]);
                    generateAllHTML("#gl_information_details", [
                        generalLiabilityInformation,
                    ]);
                    generateAllHTML("#wc_details_2", [
                        workersCompensationInformation2,
                    ]);
                    generateAllHTML("#wc_details_3", [
                        workersCompensationInformation3,
                        ownersInfo,
                    ]);
                    generateAllHTML("#auto_other_details", [
                        commercialAutoInformation,
                    ]);
                    generateAllHTML("#license_bond_details", [
                        contractorLicenseBondInformation,
                    ]);
                    generateAllHTML("#excess_liability_details", [
                        excessLiabilityInformation,
                    ]);
                    generateAllHTML("#tools_equipment_details", [
                        toolsEquipmentInformation,
                    ]);
                    generateAllHTML("#builders_risk_details", [
                        buildersRiskInformation,
                    ]);
                    generateAllHTML("#bop_details", [bopInformation]);
                    generateAllHTML("#commercial_property_details", [
                        commercialPropertyInformation,
                    ]);
                    generateAllHTML("#error_emissions_details", [
                        errorsEmissionInformation,
                    ]);
                    generateAllHTML("#pollution_liability_details1", [
                        pollutionLiabilityInformation1,
                    ]);
                    generateAllHTML("#pollution_liability_details2", [
                        pollutionLiabilityInformation2,
                    ]);
                    generateAllHTML("#pollution_liability_details3", [
                        pollutionLiabilityInformation3,
                    ]);
                    generateAllHTML("#pollution_liability_details4", [
                        pollutionLiabilityInformation4,
                    ]);
                    generateAllHTML("#epli_liability_details", [
                        epliInformation,
                    ]);
                    generateAllHTML("#cyber_liability_details", [
                        cyberLiabilityInformation,
                    ]);
                    generateAllHTML("#instfloat_liability_details", [
                        instFloatInformation,
                    ]);
                    generateAllHTML("#about_your_company_details", [
                        aboutYourCompanyInformation,
                    ]);

                    $("#process").on("click", function (e) {
                        e.preventDefault();
                        if (!isTermsChecked) {
                            // event.preventDefault(); // This prevents the button click from doing anything
                            // alert("Please accept the terms and conditions"); // Optional: Show a message
                            toastr.warning(
                                "Please accept the terms and conditions."
                            );
                            return false;
                        } else {
                            $("#loader_form").css("display", "block");

                            var commonData = {};
                            var productData = {};
                            // var polOptData = {};
                            var productKeyData = [];

                            // Gather data for commonData from #personal_information_step and #about_your_company_step
                            $(
                                "#personal_information_step, #about_your_company_step"
                            )
                                .find("input, select, textarea")
                                .each(function () {
                                    commonData[this.name] = $(this).val();
                                });

                            // Serialize products data into an object
                            $('input[name="question_1[]"]:checked').each(
                                function () {
                                    var productKey = $(this).val();
                                    productKeyData.push(productKey);

                                    // console.log(productKey);
                                    productData[productKey] = {};

                                    $("div[id^='" + productKey + "_step_']")
                                        .find("input, select, textarea")
                                        .each(function () {
                                            // Dynamic function to traverse up the DOM tree and find the nearest h6
                                            function findNearestH6(element) {
                                                let parent =
                                                    $(element).parent();
                                                if (parent.length === 0)
                                                    return ""; // We've reached the top without finding h6

                                                let h6 = parent.find("> h6");
                                                if (h6.length > 0)
                                                    return h6.text().trim();

                                                return findNearestH6(parent); // Recurse up
                                            }

                                            // Try to find the closest preceding h6 first
                                            var header6Content =
                                                findNearestH6(this);

                                            // If the h6 content is empty or not found, try to find the label
                                            var labelForThisInput =
                                                header6Content ||
                                                $(
                                                    "label[for='" +
                                                        this.id +
                                                        "']"
                                                )
                                                    .text()
                                                    .trim();

                                            productData[productKey][this.name] =
                                                {
                                                    value: $(this).val(),
                                                    label: labelForThisInput.trim(),
                                                    h6: header6Content,
                                                };
                                        });
                                }
                            );

                            // Pollution OPT
                            // polOptData.polopt1 = $(
                            //     'select[name="polopt1[]"]'
                            // ).val();
                            // polOptData.polopt2 = $(
                            //     'select[name="polopt2[]"]'
                            // ).val();
                            // polOptData.polopt3 = $(
                            //     'select[name="polopt3[]"]'
                            // ).val();

                            // Collecting UTM data from hidden fields
                            commonData.utm_source = $(
                                'input[name="utm_source"]'
                            ).val();
                            commonData.utm_medium = $(
                                'input[name="utm_medium"]'
                            ).val();
                            commonData.utm_campaign = $(
                                'input[name="utm_campaign"]'
                            ).val();
                            commonData.utm_term = $(
                                'input[name="utm_term"]'
                            ).val();
                            commonData.utm_content = $(
                                'input[name="utm_content"]'
                            ).val();

                            // Collecting terms and conditions acceptance
                            commonData.terms = $(
                                'input[name="terms"]:checked'
                            ).val();

                            // Send the data
                            axios({
                                method: "post",
                                url: "/quote-form-submit",
                                headers: {
                                    "X-CSRF-TOKEN": $(
                                        'meta[name="csrf-token"]'
                                    ).attr("content"),
                                    "Content-Type": "application/json",
                                },
                                data: {
                                    common: commonData,
                                    products: productData,
                                    productKeyData: productKeyData,
                                    // polOptData: polOptData,
                                },
                            })
                                .then((response) => {
                                    $("#loader_form").css("display", "none");
                                    if (response.data.redirect) {
                                        window.location.href =
                                            response.data.redirect;
                                    } else {
                                        toastr.success(response.data.message);
                                        window.open("/thankyou", "_blank");
                                        location.reload();
                                    }
                                })
                                .catch((error) => {
                                    $("#loader_form").css("display", "none");
                                    if (error.response && error.response.data) {
                                        toastr.error(
                                            error.response.data.message
                                        );
                                    } else {
                                        toastr.error("An error occurred");
                                    }
                                });
                        }
                    });
                }
                return !inputs.length || !!inputs.valid();
            },
        })
        .validate({
            errorPlacement: function (error, element) {
                if (element.is(":radio") || element.is(":checkbox")) {
                    error.insertBefore(element.next());
                } else {
                    error.insertAfter(element);
                }
            },
        });

    //  progress bar
    $("#progressbar").progressbar();
    $("#wizard_container").wizard({
        afterSelect: function (event, state) {
            $("#progressbar").progressbar("value", state.percentComplete);
            $("#location").text(
                "(" + state.stepsComplete + "/" + state.stepsPossible + ")"
            );
        },
    });

    // var allowForward = false;
    // var declined = false;
    // $("#wizard_container").wizard({
    //     beforeForward: function (event, state) {
    //         var deferred = $.Deferred();
    //         if (state.stepIndex === 1) {
    //             if (!allowForward && !declined) {
    //                 $.magnificPopup.open({
    //                     items: {
    //                         src: "#modal-help",
    //                         type: "inline",
    //                     },
    //                     modal: true,
    //                     callbacks: {
    //                         close: function () {
    //                             if (allowForward) {
    //                                 deferred.resolve(true);
    //                             } else {
    //                                 deferred.resolve(false);
    //                                 if (declined) {
    //                                     toastr.info(
    //                                         "You must refresh the page again to agree to the terms and agreements."
    //                                     );
    //                                 }
    //                             }
    //                         },
    //                     },
    //                 });
    //                 $("#accepted").one("click", function () {
    //                     allowForward = true;
    //                     $.magnificPopup.close();
    //                     $(".forward").trigger("click");
    //                 });

    //                 $("#decline").one("click", function () {
    //                     allowForward = false;
    //                     declined = true;
    //                     $.magnificPopup.close();
    //                 });
    //                 return false;
    //             } else if (declined) {
    //                 toastr.info(
    //                     "You must refresh the page again to agree to the terms and agreements."
    //                 );
    //                 return false;
    //             }
    //         } else {
    //             allowForward = false;
    //             return true;
    //         }
    //     },
    // });

    // Validate select
    $("#wrapped").validate({
        ignore: [],
        rules: {
            select: {
                required: true,
            },
        },
        errorPlacement: function (error, element) {
            if (element.is("select:hidden")) {
                error.insertAfter(element.next(".nice-select"));
            } else {
                error.insertAfter(element);
            }
        },
    });

    // Submit loader mask
    var form = $("form#wrapped");
    form.on("submit", function () {
        form.validate();
        if (form.valid()) {
            $("#loader_form").fadeIn();
        }
    });

    // Modal Help
    $("#modal_h").magnificPopup({
        type: "inline",
        fixedContentPos: true,
        fixedBgPos: true,
        overflowY: "auto",
        closeBtnInside: true,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        closeMarkup:
            '<button title="%title%" type="button" class="mfp-close"></button>',
        mainClass: "my-mfp-zoom-in",
    });

    function computePercentage(a, b) {
        const val_a = $("#" + a).val();
        const x = 100 - parseInt(val_a);
        $("#" + b).val(x.toString());
    }

    function toUSD(number) {
        var formatter = new Intl.NumberFormat("en-US", {
            style: "currency",
            currency: "USD",
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        });
        return formatter.format(number);
    }

    function datePickerFormatter(selector) {
        $(selector).addClass("readonly").attr("readonly", "readonly");
        $(selector).datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: "-1d",
            yearRange: "1950:" + new Date().getFullYear(),
            showAnim: "slideDown",
        });
    }

    function yearPickerFormatter(selector) {
        $(selector).addClass("readonly").attr("readonly", "readonly");
        if (!$(selector).hasClass("hasDatepicker")) {
            $(selector).datepicker({
                changeYear: true, // This allows changing the year
                showButtonPanel: true, // Shows the buttons at the bottom
                dateFormat: "yy", // Sets the format to only display the year
                yearRange: "1900:" + new Date().getFullYear(), // For example, if you want a range from 1900 to the current year.
                beforeShow: function (input, inst) {
                    setTimeout(function () {
                        inst.dpDiv.css({
                            top: $(input).offset().top + $(input).outerHeight(),
                            left: $(input).offset().left,
                        });
                        $(".ui-datepicker-calendar").hide();
                        $(".ui-datepicker-month").hide();
                    }, 0);
                },
                onClose: function (dateText, inst) {
                    var year = $(
                        "#ui-datepicker-div .ui-datepicker-year :selected"
                    ).val();
                    $(selector).val(year);
                },
            });

            // Hide month calendar and dropdown
            $(selector).focus(function () {
                $(".ui-datepicker-calendar").hide();
                $(".ui-datepicker-month").hide();
            });
        }
    }

    function hideSteps(checkboxValue) {
        switch (checkboxValue) {
            case "gl":
                $("#gl_step_1, #gl_step_2, #glDetailsContainer")
                    .removeClass("step wizard-step")
                    .addClass("hidden");
                $("#gl_step_1, #gl_step_2").find("input").val("");
                $("#gl_step_1, #gl_step_2").find("select").val("");
                // textarea
                $("#gl_step_1, #gl_descops").val("");
                $("#gl_step_2, #gl_explain_losses").val("");
                // ajax container
                $("#gl_step_1")
                    .find("#gl_annual_gross_additional_questions")
                    .val("");
                $("#gl_step_1").find("#gl_profession_if_others").val("");
                $("#gl_step_1").find("#gl_profession_container").val("");
                $("#gl_step_2").find("#gl_subcon_cost_container").val("");
                break;

            case "wc":
                $("#wc_step_1, #wc_step_2, #wc_step_3, #wcDetailsContainer")
                    .removeClass("step wizard-step")
                    .addClass("hidden");
                $("#wc_step_1, #wc_step_2, #wc_step_3").find("input").val("");
                $("#wc_step_1, #wc_step_2, #wc_step_3").find("select").val("");

                // ajax container
                $("#wc_step_1").find("#wc_professions_container").empty();
                // $("#wc_step_2").find("#profession_entry_container").empty();
                $("#wc_step_2").find("#wc_subcon_cost_year_container").empty();
                $("#wc_step_3").find("#owners_information_container").empty();
                break;

            case "auto":
                $(
                    "#auto_step_1, #auto_step_2, #auto_step_3, #autoDetailsContainer"
                )
                    .removeClass("step wizard-step")
                    .addClass("hidden");
                $("#auto_step_1, #auto_step_2, #auto_step_3")
                    .find("input")
                    .val("");
                $("#auto_step_1, #auto_step_2, #auto_step_3")
                    .find("select")
                    .val("");

                // ajax container
                $("#auto_step_1").find("#auto_vehicles_container").empty();
                $("#auto_step_2").find("#auto_drivers_container").empty();
                break;

            case "bond":
                $("#bond_step_1, #bond_step_2, #bondDetailsContainer")
                    .removeClass("step wizard-step")
                    .addClass("hidden");
                $("#bond_step_1, #bond_step_2").find("input").val("");
                $("#bond_step_1, #bond_step_2").find("select").val("");

                // ajax container
                $("#bond_step_1")
                    .find("#bond_owner_if_married_container")
                    .empty();
                $("#bond_step_2")
                    .find("#bond_license_type_if_others_container")
                    .empty();
                break;

            case "excess":
                $("#excess_step_1, #excess_step_2, #excessDetailsContainer")
                    .removeClass("step wizard-step")
                    .addClass("hidden");
                $("#excess_step_1, #excess_step_2").find("input").val("");
                $("#excess_step_1, #excess_step_2").find("select").val("");

                // ajax container
                $("#excess_step_1")
                    .find("#excess_no_losses_5years_container")
                    .empty();
                break;

            case "tools":
                $("#tools_step_1, #toolsDetailsContainer")
                    .removeClass("step wizard-step")
                    .addClass("hidden");
                $("#tools_step_1").find("input").val("");
                $("#tools_step_1").find("select").val("");

                // ajax container
                $("#tools_step_1")
                    .find("#tools_no_losses_5years_container")
                    .empty();
                break;

            case "br":
                $(
                    "#br_step_1, #br_step_2, #br_step_3, #br_step_4, #brDetailsContainer"
                )
                    .removeClass("step wizard-step")
                    .addClass("hidden");

                $("#br_step_1").find("input").val("");
                $("#br_step_1").find("select").val("");

                $("#br_step_2").find("input").val("");
                $("#br_step_2").find("select").val("");

                $("#br_step_3").find("input").val("");
                $("#br_step_3").find("select").val("");

                $("#br_step_4").find("input").val("");
                $("#br_step_4").find("select").val("");

                // ajax container
                $("#br_step_4")
                    .find("#br_scheduled_property_container")
                    .empty();
                $("#br_step_4").find("#br_project_started_container").empty();
                break;

            case "bop":
                $(
                    "#bop_step_1, #bop_step_2, #bop_step_3, #bop_step_4, #bopDetailsContainer"
                )
                    .removeClass("step wizard-step")
                    .addClass("hidden");
                $("#bop_step_1").find("input").val("");
                $("#bop_step_1").find("select").val("");

                $("#bop_step_2").find("input").val("");
                $("#bop_step_2").find("select").val("");

                $("#bop_step_3").find("input").val("");
                $("#bop_step_3").find("select").val("");

                $("#bop_step_4").find("input").val("");
                $("#bop_step_4").find("select").val("");
                break;

            case "comm_prop":
                $(
                    "#comm_prop_step_1, #comm_prop_step_2, #comm_prop_step_3, #cpDetailsContainer"
                )
                    .removeClass("step wizard-step")
                    .addClass("hidden");
                $("#comm_prop_step_1").find("input").val("");
                $("#comm_prop_step_1").find("select").val("");

                $("#comm_prop_step_2").find("input").val("");
                $("#comm_prop_step_2").find("select").val("");

                $("#comm_prop_step_3").find("input").val("");
                $("#comm_prop_step_3").find("select").val("");
                break;

            case "eo":
                $(
                    "#eo_step_1, #eo_step_2, #eo_step_3, #eo_step_4, #eo_step_5, #eoDetailsContainer"
                )
                    .removeClass("step wizard-step")
                    .addClass("hidden");
                $("#eo_step_1").find("input").val("");
                $("#eo_step_1").find("select").val("");

                $("#eo_step_2").find("input").val("");
                $("#eo_step_2").find("select").val("");

                $("#eo_step_3").find("input").val("");
                $("#eo_step_3").find("select").val("");

                $("#eo_step_4").find("input").val("");
                $("#eo_step_4").find("select").val("");

                $("#eo_step_5").find("input").val("");
                $("#eo_step_5").find("select").val("");

                // ajax container
                $("#eo_step_1")
                    .find("#eo_requested_limits_others_container")
                    .empty();
                $("#eo_step_1")
                    .find("#eo_requested_deductible_others_container")
                    .empty();
                $("#eo_step_2")
                    .find("#eo_business_entity_q1_container")
                    .empty();
                $("#eo_step_2")
                    .find("#eo_business_entity_q2_container")
                    .empty();
                $("#eo_step_2")
                    .find("#eo_business_entity_q3_container")
                    .empty();
                $("#eo_step_2")
                    .find("#eo_business_entity_q4_container")
                    .empty();
                $("#eo_step_2")
                    .find("#eo_business_entity_q5_container")
                    .empty();

                $("#eo_step_5").find("#eo_hr_q1_container").empty();
                $("#eo_step_5").find("#eo_hr_q2_container").empty();
                $("#eo_step_5").find("#eo_hr_q3_container").empty();
                $("#eo_step_5").find("#eo_hr_q4_container").empty();
                break;

            case "pollution":
                $(
                    "#pollution_step_1, #pollution_step_2, #pollution_step_3, #pollution_step_4, #pollution_step_5, #pollution_step_6, #pollution_step_7, #pollutionDetailsContainer"
                )
                    .removeClass("step wizard-step")
                    .addClass("hidden");
                $(
                    "#pollution_step_1, #pollution_step_2, #pollution_step_3, #pollution_step_4, #pollution_step_5, #pollution_step_6, #pollution_step_7"
                )
                    .find("input")
                    .val("");
                $(
                    "#pollution_step_1, #pollution_step_2, #pollution_step_3, #pollution_step_4, #pollution_step_5, #pollution_step_6, #pollution_step_7"
                )
                    .find("select")
                    .val("");
                // textarea
                // ajax container
                break;

            case "epli":
                $(
                    "#epli_step_1, #epli_step_2, #epli_step_3, #epli_step_4, #epli_step_5, #epli_step_6, #epliDetailsContainer"
                )
                    .removeClass("step wizard-step")
                    .addClass("hidden");
                $("#epli_step_1").find("input").val("");
                $("#epli_step_1").find("select").val("");

                $("#epli_step_2").find("input").val("");
                $("#epli_step_2").find("select").val("");

                $("#epli_step_3").find("input").val("");
                $("#epli_step_3").find("select").val("");

                $("#epli_step_4").find("input").val("");
                $("#epli_step_4").find("select").val("");

                $("#epli_step_5").find("input").val("");
                $("#epli_step_5").find("select").val("");

                $("#epli_step_6").find("input").val("");
                $("#epli_step_6").find("select").val("");
                break;

            case "cyber":
                $("#cyber_step_1, #cyber_step_2, #cyberDetailsContainer")
                    .removeClass("step wizard-step")
                    .addClass("hidden");
                $("#cyber_step_1").find("input").val("");
                $("#cyber_step_1").find("select").val("");

                $("#cyber_step_2").find("input").val("");
                $("#cyber_step_2").find("select").val("");
                break;

            case "instfloat":
                $(
                    "#instfloat_step_1, #instfloat_step_2, #instfloat_step_3, #instfloat_step_4, #instfloat_step_5, #instfloatDetailsContainer"
                )
                    .removeClass("step wizard-step")
                    .addClass("hidden");
                $("#instfloat_step_1").find("input").val("");
                $("#instfloat_step_1").find("select").val("");

                $("#instfloat_step_2").find("input").val("");
                $("#instfloat_step_2").find("select").val("");

                $("#instfloat_step_3").find("input").val("");
                $("#instfloat_step_3").find("select").val("");

                $("#instfloat_step_4").find("input").val("");
                $("#instfloat_step_4").find("select").val("");

                $("#instfloat_step_5").find("input").val("");
                $("#instfloat_step_5").find("select").val("");

                // ajax container
                $("#instfloat_step_5")
                    .find("#sched_equipment_container")
                    .val("");
                break;
        }
    }

    function showSteps(checkboxValue) {
        // console.log("showSteps: " + checkboxValue);
        switch (checkboxValue) {
            case "gl":
                $("#gl_step_1, #gl_step_2, #glDetailsContainer")
                    .addClass("step wizard-step")
                    .removeClass("hidden");
                break;
            case "wc":
                $("#wc_step_1, #wc_step_2, #wc_step_3, #wcDetailsContainer")
                    .addClass("step wizard-step")
                    .removeClass("hidden");
                break;
            case "auto":
                $(
                    "#auto_step_1, #auto_step_2, #auto_step_3, #autoDetailsContainer"
                )
                    .addClass("step wizard-step")
                    .removeClass("hidden");
                break;
            case "bond":
                $("#bond_step_1, #bond_step_2, #bondDetailsContainer")
                    .addClass("step wizard-step")
                    .removeClass("hidden");
                break;
            case "excess":
                $("#excess_step_1, #excess_step_2, #excessDetailsContainer")
                    .addClass("step wizard-step")
                    .removeClass("hidden");
                break;
            case "tools":
                $("#tools_step_1, #toolsDetailsContainer")
                    .addClass("step wizard-step")
                    .removeClass("hidden");
                break;
            case "br":
                $(
                    "#br_step_1, #br_step_2, #br_step_3, #br_step_4, #brDetailsContainer"
                )
                    .addClass("step wizard-step")
                    .removeClass("hidden");
                break;
            case "bop":
                $(
                    "#bop_step_1, #bop_step_2, #bop_step_3, #bop_step_4, #bopDetailsContainer"
                )
                    .addClass("step wizard-step")
                    .removeClass("hidden");
                break;
            case "comm_prop":
                $(
                    "#comm_prop_step_1, #comm_prop_step_2, #comm_prop_step_3, #cpDetailsContainer"
                )
                    .addClass("step wizard-step")
                    .removeClass("hidden");
                break;
            case "eo":
                $(
                    "#eo_step_1, #eo_step_2, #eo_step_3, #eo_step_4, #eo_step_5, #eoDetailsContainer"
                )
                    .addClass("step wizard-step")
                    .removeClass("hidden");
                break;
            case "pollution":
                $(
                    "#pollution_step_1, #pollution_step_2, #pollution_step_3, #pollution_step_4, #pollution_step_5, #pollution_step_6, #pollution_step_7, #pollutionDetailsContainer"
                )
                    .addClass("step wizard-step")
                    .removeClass("hidden");
                break;
            case "epli":
                $(
                    "#epli_step_1, #epli_step_2, #epli_step_3, #epli_step_4, #epli_step_5, #epli_step_6, #epliDetailsContainer"
                )
                    .addClass("step wizard-step")
                    .removeClass("hidden");
                break;
            case "cyber":
                $("#cyber_step_1, #cyber_step_2, #cyberDetailsContainer")
                    .addClass("step wizard-step")
                    .removeClass("hidden");
                break;
            case "instfloat":
                $(
                    "#instfloat_step_1, #instfloat_step_2, #instfloat_step_3, #instfloat_step_4, #instfloat_step_5, #instfloatDetailsContainer"
                )
                    .addClass("step wizard-step")
                    .removeClass("hidden");
                break;
        }
    }

    let equipmentCount = 1;
    function appendNewSchedEquipmentEntry(selector) {
        $(document).on("click", selector, function (e) {
            e.preventDefault();
            if (equipmentCount < 5) {
                equipmentCount++;
                showScheduledEquipmentEntry(equipmentCount);
                datePickerFormatter(
                    "#instfloat_scheduled_equipment_date_purchased_" +
                        equipmentCount
                );
            }
        });
    }

    function updateEquipmentEntryNames() {
        if (equipmentCount >= 5) {
            return false;
        }
        $(".equipment-entry").each(function (index, element) {
            let newIndex = index + 2; // +1 because indexing starts at 0 and +1 because you have the original entry
            $(element).find("h6").text(`Scheduled Equipment ${newIndex}`);
            $(element)
                .find("input, select")
                .each(function () {
                    let name = $(this).attr("name");
                    let id = $(this).attr("id");
                    let newName = name.replace(/_\d+$/, `_${newIndex}`);
                    let newId = id.replace(/_\d+$/, `_${newIndex}`);
                    $(this).attr("name", newName);
                    $(this).attr("id", newId);
                    $(this).next("label").attr("for", newId);
                });
        });
    }

    let numOfEmployees = 0;
    let shouldCreateNewEntry = false;
    // Function to allow only numbers in specific fields
    function allowOnlyNumbers(inputField) {
        const inputValue = $(inputField).val();
        if (typeof inputValue !== "string") {
            $(inputField).val("");
            return;
        }

        const numericValue = inputValue.replace(/[^0-9]/g, "");
        if (inputValue !== numericValue) {
            toastr.warning("Only numbers are allowed in this field.");
        }
        $(inputField).val(numericValue);
    }

    function getSumOfEmployeesInProfessions() {
        let sum = 0;
        $("[id^='wc_num_employee_under_this_profession_']").each(function () {
            sum += parseInt($(this).val()) || 0;
        });
        return sum;
    }

    function exceedsTotalEmployees() {
        return getSumOfEmployeesInProfessions() > numOfEmployees;
    }

    function shouldAppendNewEntry() {
        return getSumOfEmployeesInProfessions() < numOfEmployees;
    }

    $(document).on("input keyup change", "#wc_num_of_empl", function () {
        allowOnlyNumbers(this);
        numOfEmployees = parseInt($(this).val());

        // Reset state variables
        shouldCreateNewEntry = false;
        wcProfessionEntry = 1;

        // Clear existing entries
        $("#wc_professions_container").empty();
        $("#wc_num_employee_under_this_profession_1").val("");
    });

    let prevVal = {};
    // Declare a variable to track the previous value of the profession input
    let prevProfessionValue = 0;
    $(document).on(
        "input keyup change",
        "[id^='wc_num_employee_under_this_profession_']",
        function () {
            allowOnlyNumbers(this);

            const currentInput = $(this);
            const currentId = currentInput.attr("id");
            const currentVal = parseInt(currentInput.val()) || 0;

            if (prevVal[currentId] === currentVal) return;

            prevVal[currentId] = currentVal;

            if (exceedsTotalEmployees()) {
                toastr.error(
                    "The sum of employees in professions cannot exceed the total number of employees."
                );
                currentInput.val("");
                return;
            }

            // Check if the current value is greater than the previous value
            if (currentVal > prevProfessionValue) {
                prevProfessionValue = currentVal;
                if (shouldAppendNewEntry()) {
                    createNewProfessionEntry();
                }
            } else {
                prevProfessionValue = currentVal;
            }
        }
    );

    let wcProfessionEntry = 1;

    function appendNewWCProfessionEntry(selector) {
        $(selector).on("click", function (e) {
            e.preventDefault();
            createNewProfessionEntry();
        });
    }

    function createNewProfessionEntry() {
        $("#loader_form").show();
        wcProfessionEntry++;
        showWCAdditionalProfessionEntry(wcProfessionEntry)
            .then(() => {
                $("#loader_form").hide();
                perfectCurrencyFormatter(".wc-annual-payroll");
            })
            .catch(console.error)
            .finally(() => {
                $("#loader_form").hide();
            });
    }

    function appendInputIfProfessionIsOthers() {
        $("#gl_profession_if_others").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="gl_specify_profession" id="gl_specify_profession" class="form-control required" placeholder="">
                    <label for="gl_specify_profession">Please specify your profession</label>
                </div>
            </div>
        `);
    }

    function getStateByZipcode() {
        const zipcode = $("#zipcode").val();
        if (zipcode) {
            axios
                .get(`/api/get-state-by-zipcode/${zipcode}`)
                .then(function (response) {
                    $("#city").val(response.data.state.city);
                    $("#states").val(response.data.state.state_abbr).change();
                })
                .catch(function (error) {
                    toastr.error(
                        "No state and city found. Please input a valid US zipcode."
                    );
                });
        }
    }

    function perfectCurrencyFormatter(selector) {
        $(document).on("keydown", selector, function (e) {
            // Allow: backspace, delete, tab, escape, enter, and .
            if (
                $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode === 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39) ||
                // Allow: numpad 0-9
                (e.keyCode >= 96 && e.keyCode <= 105)
            ) {
                return;
            }
            // Ensure that it is a number and stop the keypress if not
            const char = String.fromCharCode(e.which);
            const pattern = /[0-9\.]/; // Only numbers and decimal point
            if (!pattern.test(char)) {
                e.preventDefault();
            }
        });
        $(document).on("change", selector, function () {
            var numericValue = $(this).val().replace(/[$,]/g, "");
            numericValue = parseFloat(numericValue || 0);
            $(this).data("numeric-value", numericValue);
            var usdValue = toUSD(numericValue);
            $(this).val(usdValue);
        });
        $(document).on("focus", selector, function () {
            var currentValue = $(this).val();
            if (currentValue !== "") {
                var currentNumericValue = parseFloat(
                    currentValue.replace(/[$,]/g, "")
                );
                if (!isNaN(currentNumericValue)) {
                    $(this).val(currentNumericValue);
                }
            }
        });
        $(document).on("blur", selector, function () {
            var currentValue = $(this).val();
            if (currentValue !== "") {
                var currentNumericValue = parseFloat(
                    currentValue.replace(/[$,]/g, "")
                );
                if (!isNaN(currentNumericValue)) {
                    $(this).data("numeric-value", currentNumericValue);
                    $(this).val(toUSD(currentNumericValue));
                } else {
                    var originalNumericValue = $(this).data("numeric-value");
                    $(this).val(toUSD(originalNumericValue));
                }
            }
        });
    }

    function miscToolsCurrencyFormatter(selector) {
        $(document).on("change", selector, function () {
            var numericValue = $(this).val().replace(/[$,]/g, "");
            numericValue = parseFloat(numericValue || 0);
            $(this).data("numeric-value", numericValue);
            var usdValue = toUSD(numericValue);
            if (numericValue > 1500) {
                toastr.error("Miscellaneous Tools Value must be under $1,500");
                $(this).val("");
                $(this).data("numeric-value", 0);
            } else {
                $(this).val(usdValue);
            }
        });
        $(document).on("focus", selector, function () {
            var currentValue = $(this).val();
            if (currentValue !== "") {
                var currentNumericValue = parseFloat(
                    currentValue.replace(/[$,]/g, "")
                );
                if (!isNaN(currentNumericValue)) {
                    $(this).val(currentNumericValue);
                }
            }
        });
        $(document).on("blur", selector, function () {
            var currentValue = $(this).val();
            if (currentValue !== "") {
                var currentNumericValue = parseFloat(
                    currentValue.replace(/[$,]/g, "")
                );
                if (!isNaN(currentNumericValue)) {
                    $(this).data("numeric-value", currentNumericValue);
                    $(this).val(toUSD(currentNumericValue));
                } else {
                    $(this).val("");
                    $(this).data("numeric-value", 0);
                }
            }
        });
    }

    function scheduledEquipmentCurrencyFormatter(selector) {
        $(document).on("change", selector, function () {
            var numericValue = $(this).val().replace(/[$,]/g, "");
            numericValue = parseFloat(numericValue || 0);
            $(this).data("numeric-value", numericValue);
            var usdValue = toUSD(numericValue);

            if (numericValue < 1500) {
                toastr.error("Scheduled Equipment Value must be above $1,500");
                $(this).val("");
                $(this).data("numeric-value", 0);
            } else {
                $(this).val(usdValue);
            }
        });
        $(document).on("focus", selector, function () {
            var currentValue = $(this).val();
            if (currentValue !== "") {
                var currentNumericValue = parseFloat(
                    currentValue.replace(/[$,]/g, "")
                );
                if (!isNaN(currentNumericValue)) {
                    $(this).val(currentNumericValue);
                }
            }
        });
        $(document).on("blur", selector, function () {
            var currentValue = $(this).val();
            if (currentValue !== "") {
                var currentNumericValue = parseFloat(
                    currentValue.replace(/[$,]/g, "")
                );
                if (!isNaN(currentNumericValue)) {
                    $(this).data("numeric-value", currentNumericValue);
                    $(this).val(toUSD(currentNumericValue));
                } else {
                    $(this).val("");
                    $(this).data("numeric-value", 0);
                }
            }
        });
    }

    function formatUSPhone() {
        var number = $(this).val().replace(/[^\d]/g, "");
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

    if (typeof serverData !== "undefined") {
        if (serverData.hasOwnProperty("subcon")) {
            serverData["gl"] = serverData["subcon"];
            delete serverData["subcon"];
        }
        for (var key in serverData) {
            if (serverData.hasOwnProperty(key)) {
                var state = serverData[key];
                localStorage.setItem(key, state);
                // Update the checkbox state
                var checkbox = $(
                    'input[name="question_1[]"][value="' + key + '"]'
                );
                checkbox.prop("checked", state === "checked");
                if (state === "checked") {
                    showSteps(key);
                } else {
                    hideSteps(key);
                }
            }
        }
    }

    // Start Here
    var checkboxStates = {
        gl: false,
        wc: false,
        auto: false,
        bond: false,
        excess: false,
        tools: false,
        br: false,
        bop: false,
        comm_prop: false,
        eo: false,
        pollution: false,
        epli: false,
        cyber: false,
        instfloat: false,
    };

    $(document).ready(function () {
        const csrfToken = $('meta[name="csrf-token"]').attr("content");

        // Initialize checkbox states based on data attribute value
        $('input[name="question_1[]"]').each(function () {
            var checkboxValue = $(this).val();
            var isChecked = $(this).data("checked") === "true";
            $(this).prop("checked", isChecked);
            checkboxStates[checkboxValue] = isChecked;
        });

        // Function to update session variables and UI for all checkboxes at once
        function updateSessionVariables() {
            $.ajax({
                url: "/update-session-variables",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                data: JSON.stringify(checkboxStates),
                contentType: "application/json",
                success: function (response) {
                    console.log("Session variables updated successfully.");
                    updateUI(); // Call to update the UI based on the new session states
                },
                error: function (error) {
                    console.error("Error updating session variables:", error);
                },
            });
        }

        // Function to update the UI dynamically based on session state
        function updateUI() {
            $.ajax({
                url: "/fetch-checkbox-content", // Endpoint to fetch HTML based on session data
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                success: function (response) {
                    $("#about_you_profession").html(response.html); // Update the DOM with the returned HTML
                },
                error: function (error) {
                    console.error("Error fetching content:", error);
                },
            });
        }

        // Attach event listener to checkbox change event
        $(document).on("change", 'input[name="question_1[]"]', function () {
            var checkboxValue = $(this).val();
            var isChecked = $(this).is(":checked");
            checkboxStates[checkboxValue] = isChecked;
            updateSessionVariables();
        });

        // Function to clear session on page load
        function clearSessionData() {
            $.ajax({
                url: "/clear-session-data",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                success: function (response) {
                    console.log("Session data cleared successfully");
                    updateSessionVariables(); // Update session variables initially after clearing
                },
                error: function (error) {
                    console.error("Error clearing session data:", error);
                },
            });
        }

        clearSessionData(); // Call to clear session when the page loads
    });

    function showDriverIfMarried() {
        $("#auto_driver_if_married_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="auto_driver_spouse_name"
                        id="auto_driver_spouse_name" class="form-control required"
                        placeholder="auto_driver_spouse_name">
                    <label for="auto_driver_spouse_name">Spouse Name</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="auto_driver_spouse_dob"
                        id="auto_driver_spouse_dob" class="form-control required"
                        placeholder="auto_driver_spouse_dob">
                    <label for="auto_driver_spouse_dob">Spouse Date of Birth</label>
                </div>
            </div>
        `);

        datePickerFormatter("#auto_driver_spouse_dob");
    }

    function showSubconContainerForGL() {
        $("#gl_subcon_cost_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="gl_subcon_cost" id="gl_subcon_cost" class="form-control required" placeholder="">
                    <label for="gl_subcon_cost">Subcontractor Cost</label>
                </div>
            </div>
        `);
    }

    function showSubconContainerForPollution() {
        $("#pollution_subcon_cost_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="pollution_subcon_cost" id="pollution_subcon_cost" class="form-control required" placeholder="">
                    <label for="pollution_subcon_cost">Subcontractor Cost</label>
                </div>
            </div>
        `);
    }

    function showWCSubconCostYearContainer() {
        $("#wc_subcon_cost_year_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="wc_subcon_cost_year" id="wc_subcon_cost_year" class="form-control required" placeholder="">
                    <label for="wc_subcon_cost_year">Subcontractor cost in a year</label>
                </div>
            </div>
        `);
    }

    function showPollutionNoOfLossesContainer() {
        $("#pollution_explain_losses_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <textarea style="resize: none;" name="pollution_explain_losses" id="pollution_explain_losses" class="form-control required" placeholder="Please explain"></textarea>
                    <label for="pollution_explain_losses">Explain Losses (Please include loss amount)</label>
                </div>
            </div>
        `);
    }

    function showAutoVehicleEntries(a) {
        $("#auto_vehicles_container").append(`
            <h4 class='profession_header mt-2 mb-2'>Vehicle Entry No. ${a}</h4>
            <div class='row justify-content-center'>
                <div class='col-md-4'>
                    <div class='mb-3 form-floating'>
                        <input type='text' name='auto_vehicle_year_${a}' id='auto_vehicle_year_${a}' class='form-control required' placeholder='' maxlength='4'>
                        <label for='auto_vehicle_year_${a}'>Year</label>
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class='mb-3 form-floating'>
                        <input type='text' name='auto_vehicle_maker_${a}' id='auto_vehicle_maker_${a}' class='form-control required' placeholder='' maxlength='100'>
                        <label for='auto_vehicle_maker_${a}'>Maker</label>
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class='mb-3 form-floating'>
                        <input type='text' name='auto_vehicle_model_${a}' id='auto_vehicle_model_${a}' class='form-control required' placeholder='' maxlength='100'>
                        <label for='auto_vehicle_model_${a}'>Model</label>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class='mb-3 form-floating'>
                        <input type='text' name='auto_vehicle_vin_${a}' id='auto_vehicle_vin_${a}' class='form-control required' placeholder='' maxlength='100'>
                        <label for='auto_vehicle_vin_${a}'>Vehicle Identification Number (VIN)</label>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class='mb-3 form-floating'>
                        <input type='text' name='auto_vehicle_mileage_${a}' id='auto_vehicle_mileage_${a}' class='form-control required' placeholder='' maxlength='100'>
                        <label for='auto_vehicle_mileage_${a}'>Mileage / Radius</label>
                    </div>
                </div>
                <div class='col-md-12'>
                    <div class='mb-3 form-floating'>
                        <input type='text' name='auto_vehicle_garage_add_${a}' id='auto_vehicle_garage_add_${a}' class='form-control required' placeholder=''>
                        <label for='auto_vehicle_garage_add_${a}'>Garage Address</label>
                    </div>
                </div>
                <div class='col-md-12'>
                    <div class='mb-3 form-floating'>
                        <select class='form-control required' name='auto_vehicle_coverage_limits_${a}' id='auto_vehicle_coverage_limits_${a}' aria-label='auto_vehicle_coverage_limits_${a}'>
                            <option value selected></option>
                            <option value='100,000'>$100,000</option>
                            <option value='300,000'>$300,000</option>
                            <option value='500,000'>$500,000</option>
                            <option value='1,000,000'>$1,000,000</option>
                        </select>
                        <label for='auto_vehicle_coverage_limits_${a}'>Coverage Limits</label>
                    </div>
                </div>
            </div>
        `);

        yearPickerFormatter(`#auto_vehicle_year_${a}`);
    }

    function showAutoDriverEntries(a) {
        $("#auto_drivers_container").append(`
            <h4 class="profession_header mt-2 mb-2">Driver Information Entry No. ${a}</h4>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="auto_add_drivers_name_${a}" id="auto_add_drivers_name_${a}" class="form-control required" placeholder="">
                        <label for="auto_add_drivers_name_${a}">Driver's Name</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="auto_add_driver_lic_${a}" id="auto_add_driver_lic_${a}" class="form-control required" placeholder="">
                        <label for="auto_add_driver_lic_${a}">Driver's License Number</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="auto_add_driver_mileage_radius_${a}" id="auto_add_driver_mileage_radius_${a}" class="form-control required" placeholder="">
                        <label for="auto_add_driver_mileage_radius_${a}">Mileage / Radius</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="auto_add_driver_date_birth_${a}" id="auto_add_driver_date_birth_${a}" class="form-control required" placeholder="">
                        <label for="auto_add_driver_date_birth_${a}">Date of Birth</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <select class="form-select required" name="auto_add_driver_civil_status_${a}" id="auto_add_driver_civil_status_${a}" aria-label="auto_add_driver_civil_status_${a}">
                            <option value selected></option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                        </select>
                        <label for="auto_add_driver_civil_status_${a}">Civil Status</label>
                    </div>
                </div>
                <div id="auto_driver_if_married_container_${a}"></div>
            </div>
        `);

        $(document).on(
            "change",
            `#auto_add_driver_civil_status_${a}`,
            function () {
                var auto_add_driver_civil_status = $(this).val();
                if (auto_add_driver_civil_status === "Married") {
                    $(`#auto_driver_if_married_container_${a}`).append(`
                        <div class="col-md-12">
                            <div class="mb-3 form-floating">
                                <input type="text" name="auto_driver_spouse_name_${a}"
                                    id="auto_driver_spouse_name_${a}" class="form-control required"
                                    placeholder="">
                                <label for="auto_driver_spouse_name_${a}">Spouse Name</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 form-floating">
                                <input type="text" name="auto_driver_spouse_dob_${a}"
                                    id="auto_driver_spouse_dob_${a}" class="form-control required"
                                    placeholder="">
                                <label for="auto_driver_spouse_dob_${a}">Spouse Date of Birth</label>
                            </div>
                        </div>
                    `);
                    datePickerFormatter(`#auto_driver_spouse_dob_${a}`);
                } else {
                    $(`#auto_driver_if_married_container_${a}`).empty();
                }
            }
        );

        datePickerFormatter(`#auto_add_driver_date_birth_${a}`);
    }

    function renderingYesNoDivs(a, func, b) {
        $("#" + a).on("change", function () {
            $(".loader-container").removeClass("hidden");
            $(".loader-container").addClass("active");

            console.log($(this).val());

            if ($(this).val() === "1") {
                setTimeout(function () {
                    func();
                    $(".loader-container").addClass("hidden");
                    $(".loader-container").removeClass("active");
                }, 0);
            } else if ($(this).val() === "0" || $(this).val() === "") {
                $("#" + b)
                    .parent()
                    .parent()
                    .remove();
                $(".loader-container").addClass("hidden");
                $(".loader-container").removeClass("active");
            }
        });
    }

    function ShowLicBondSpouseInfoIfMarried() {
        $("#bond_owner_if_married_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="bond_owners_spouse_name" id="bond_owners_spouse_name" class="form-control required" placeholder="">
                    <label for="bond_owners_spouse_name">Spouse's Name</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="bond_owners_spouse_dob" id="bond_owners_spouse_dob" class="form-control required" placeholder="">
                    <label for="bond_owners_spouse_dob">Spouse's Date of Birth</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="bond_owners_spouse_ssn" id="bond_owners_spouse_ssn" class="form-control required" placeholder="">
                    <label for="bond_owners_spouse_ssn">Spouse's SSN (Optional)</label>
                </div>
            </div>
        `);

        datePickerFormatter("#bond_owners_spouse_dob");
        $("#bond_owners_spouse_ssn").ssnFormat();
    }

    function ShowLicBondTypeOfLicIfOthers() {
        $("#bond_license_type_if_others_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="bond_if_other_type_of_license" id="bond_if_other_type_of_license" class="form-control required" placeholder="">
                    <label for="bond_if_other_type_of_license">If others, please specify</label>
                </div>
            </div>
        `);
    }

    function showLossesAdditionalQuestion(name) {
        $(`#${name}_losses_container`).html(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="${name}_amt_of_claims" id="${name}_amt_of_claims" class="form-control required" placeholder="Amount of Claims">
                    <label for="${name}_amt_of_claims">Amount of Claim:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="${name}_date_of_loss" id="${name}_date_of_loss" class="form-control required" placeholder="Date of Loss">
                    <label for="${name}_date_of_loss">Date of Loss:</label>
                </div>
            </div>
        `);

        perfectCurrencyFormatter(`#${name}_amt_of_claims`);
        datePickerFormatter(`#${name}_date_of_loss`);
    }

    function showExcessNoOfLossesContainer() {
        $("#excess_no_losses_5years_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <textarea style="resize: none;" name="excess_explain_losses" id="excess_explain_losses" class="form-control required" placeholder="Please explain"></textarea>
                    <label for="excess_explain_losses">Explain Losses (Please include loss amount)</label>
                </div>
            </div>
        `);
    }

    function showGLProfessionsIfGC() {
        $("#gl_annual_gross_additional_questions").append(`
            <div class="row justify-content-center appendedQuestion">
                <div class="col-md-12">
                    <h5 class="profession_header mt-2 mb-2">Additional Questions for General Contractors:</h5>
                    <h6 class="profession_header mt-2 mb-2">New construction - How many houses will you be building for the whole year?</h6>
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_gross_add_q1_for_gc" id="gl_gross_add_q1_for_gc" class="form-control required" placeholder="Please explain:">
                        <label for="gl_gross_add_q1_for_gc">Please explain:</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <h6 class="profession_header mt-2 mb-2">Do you work on ADU houses?</h6>
                    <div class="mb-3 form-floating">
                        <select class="form-select required"
                            name="gl_gross_add_q2_for_gc"
                            id="gl_gross_add_q2_for_gc"
                            aria-label="gl_gross_add_q2_for_gc">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_gross_add_q2_for_gc">Please select:</label>
                    </div>
                </div>
            </div>
        `);
    }

    function showGLProfessionsIfRoofing() {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <h6 class="profession_header mt-2 mb-2">Additional Questions for Roofing Contractors:</h6>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="gl_gross_add_q1_for_roofing"
                            id="gl_gross_add_q1_for_roofing" aria-label="gl_gross_add_q1_for_roofing">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_gross_add_q1_for_roofing">Do you use any heating devices when performing your work?</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="gl_gross_add_q2_for_roofing"
                            id="gl_gross_add_q2_for_roofing" aria-label="gl_gross_add_q2_for_roofing">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_gross_add_q2_for_roofing">Do you do spray foam roofing?</label>
                    </div>
                </div>
                <div id="gl_additional_q2_sub_container"></div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="gl_gross_add_q3_for_roofing"
                            id="gl_gross_add_q3_for_roofing" aria-label="gl_gross_add_q3_for_roofing">
                            <option value="" selected></option>
                            <option value="0 Feet" selected>0 Feet</option>
                            <option value="5 feet">5 Feet</option>
                            <option value="10 feet">10 Feet</option>
                            <option value="15 feet">15 Feet</option>
                            <option value="20 feet">20 Feet</option>
                            <option value="25 feet">25 Feet</option>
                            <option value="30 feet">30 Feet</option>
                            <option value="35 feet">35 Feet</option>
                            <option value="35 feet +">35 Feet +</option>
                        </select>
                        <label for="gl_gross_add_q3_for_roofing">Maximum height exposure</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="gl_gross_add_q4_for_roofing"
                            id="gl_gross_add_q4_for_roofing" aria-label="gl_gross_add_q4_for_roofing">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_gross_add_q4_for_roofing">Do you work on slopes greater that 15 degrees?</label>
                    </div>
                </div>
            </div>
        `);
        $("#gl_gross_add_q2_for_roofing").on("change", function () {
            const value = parseInt($(this).val());
            if (value) {
                $("#gl_additional_q2_sub_container").append(`
                    <div class="col-md-12 appendedQuestion appendedSubQuestion">
                        <div class="mb-3 form-floating">
                            <select class="form-select" name="gl_gross_add_sub_q2_for_roofing"
                                id="gl_gross_add_sub_q2_for_roofing" aria-label="gl_gross_add_sub_q2_for_roofing">
                                <option value="" selected></option>
                                <option value="10">10%</option>
                                <option value="20">20%</option>
                                <option value="30">30%</option>
                                <option value="40">40%</option>
                                <option value="50">50%</option>
                                <option value="60">60%</option>
                                <option value="70">70%</option>
                                <option value="80">80%</option>
                                <option value="90">90%</option>
                                <option value="100">100%</option>
                            </select>
                            <label for="gl_gross_add_sub_q2_for_roofing">Maximum height exposure</label>
                        </div>
                    </div>
                `);
            } else {
                $(
                    "#gl_additional_q2_sub_container .appendedSubQuestion"
                ).remove();
            }
        });
    }

    function showGLProfessionsIfElectrical(value) {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <h6 class="profession_header mt-2 mb-2">Additional Questions for Electrical Contractors:</h6>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="gl_gross_add_q1_for_electrical"
                            id="gl_gross_add_q1_for_electrical" aria-label="gl_gross_add_q1_for_electrical">
                            <option value="" selected></option>
                            <option value="Burglar alarm">Burglar alarm</option>
                            <option value="Fire alarm">Fire alarm</option>
                            <option value="Security alarm">Security alarm</option>
                            <option value="Emergency lighting">Emergency lighting</option>
                            <option value="Traffic signal lights">Traffic signal lights</option>
                            <option value="Solar">Solar</option>
                        </select>
                        <label for="gl_gross_add_q1_for_electrical">Are you working on the following?</label>
                    </div>
                </div>
            </div>
        `);

        if (value === 103) {
            $(
                "#electrical_additional_questions option[value='Traffic signal lights']"
            ).remove();
        } else if (value === 226) {
            if (
                $(
                    "#electrical_additional_questions option[value='Traffic signal lights']"
                ).length === 0
            ) {
                $("#electrical_additional_questions").append(
                    "<option value='Traffic signal lights'>Traffic Signal Lights</option>"
                );
            }
        }
    }

    function showGLProfessionsIfPlumbing() {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <h6 class="profession_header mt-2 mb-2">Additional Questions for Plumbing Contractors:</h6>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="gl_gross_add_q1_for_plumbing"
                            id="gl_gross_add_q1_for_plumbing" aria-label="gl_gross_add_q1_for_plumbing">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_gross_add_q1_for_plumbing">Are you working on gas, water, and sewer mains?</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="gl_gross_add_q2_for_plumbing"
                            id="gl_gross_add_q2_for_plumbing" aria-label="gl_gross_add_q2_for_plumbing">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_gross_add_q2_for_plumbing">Do you use any heating devices when performing your work?</label>
                    </div>
                </div>
            </div>
        `);
    }

    function showGLProfessionsIfHVAC() {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <h6 class="profession_header mt-2 mb-2">Additional Questions for HVAC Contractors:</h6>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="gl_gross_add_q1_for_hvac"
                            id="gl_gross_add_q1_for_hvac" aria-label="gl_gross_add_q1_for_hvac">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_gross_add_q1_for_hvac">Do you use any heating devices when performing your work?</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="gl_gross_add_q2_for_hvac"
                            id="gl_gross_add_q2_for_hvac" aria-label="gl_gross_add_q2_for_hvac">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_gross_add_q2_for_hvac">Do you do refrigeration works?</label>
                    </div>
                </div>
                <div id="gl_additional_q2_sub_container"></div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="gl_gross_add_q3_for_hvac"
                            id="gl_gross_add_q3_for_hvac" aria-label="gl_gross_add_q3_for_hvac">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_gross_add_q3_for_hvac">Any works involving LPG?</label>
                    </div>
                </div>
                <div id="gl_additional_q3_sub_container"></div>
            </div>
        `);

        $("#gl_gross_add_q2_for_hvac").on("change", function () {
            const value = parseInt($(this).val());
            if (value) {
                $("#gl_additional_q2_sub_container").append(`
                    <div class="col-md-12 appendedQuestion appendedSubQuestion">
                        <h6 class="profession_header mt-2 mb-2">Please indicate the percentage for refrigeration works:</h6>
                        <div class="mb-3 form-floating">
                            <select class="form-select" name="gl_gross_add_sub_q2_for_hvac"
                                id="gl_gross_add_sub_q2_for_hvac" aria-label="gl_gross_add_sub_q2_for_hvac">
                                <option value="" selected></option>
                                <option value="10">10%</option>
                                <option value="20">20%</option>
                                <option value="30">30%</option>
                                <option value="40">40%</option>
                                <option value="50">50%</option>
                                <option value="60">60%</option>
                                <option value="70">70%</option>
                                <option value="80">80%</option>
                                <option value="90">90%</option>
                                <option value="100">100%</option>
                            </select>
                            <label for="gl_gross_add_sub_q2_for_hvac">Percentage</label>
                        </div>
                    </div>
                `);
            } else {
                $(
                    "#gl_additional_q2_sub_container .appendedQuestion .appendedSubQuestion"
                ).remove();
            }
        });

        $("#gl_gross_add_q3_for_hvac").on("change", function () {
            const value = parseInt($(this).val());
            if (value) {
                $("#gl_additional_q3_sub_container").append(`
                    <div class="col-md-12 appendedQuestion appendedSubQuestion">
                        <h6 class="profession_header mt-2 mb-2">Please indicate the percentage for works involving LPG:</h6>
                        <div class="mb-3 form-floating">
                            <select class="form-select" name="gl_gross_add_sub_q3_for_hvac"
                                id="gl_gross_add_sub_q3_for_hvac" aria-label="gl_gross_add_sub_q3_for_hvac">
                                <option value="" selected></option>
                                <option value="10">10%</option>
                                <option value="20">20%</option>
                                <option value="30">30%</option>
                                <option value="40">40%</option>
                                <option value="50">50%</option>
                                <option value="60">60%</option>
                                <option value="70">70%</option>
                                <option value="80">80%</option>
                                <option value="90">90%</option>
                                <option value="100">100%</option>
                            </select>
                            <label for="gl_gross_add_sub_q3_for_hvac">Percentage</label>
                        </div>
                    </div>
                `);
            } else {
                $(
                    "#gl_additional_q3_sub_container .appendedQuestion .appendedSubQuestion"
                ).remove();
            }
        });
    }

    function showGLProfessionsIfConcrete() {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <h5 class="profession_header mt-2 mb-2">Additional Questions for Concrete Contractors:</h5>
                <div class="col-md-6">
                    <h6 class="profession_header mt-2 mb-2">Flat Works %</h6>
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_gross_add_q1_for_concrete" id="gl_gross_add_q1_for_concrete" class="form-control required" placeholder="">
                        <label for="gl_gross_add_q1_for_concrete">%</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6 class="profession_header mt-2 mb-2">Foundation Works %</h6>
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_gross_add_q2_for_concrete" id="gl_gross_add_q2_for_concrete" class="form-control required" placeholder="">
                        <label for="gl_gross_add_q2_for_concrete">%</label>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center appendedQuestion">
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_gross_add_q3_for_concrete" id="gl_gross_add_q3_for_concrete" class="form-control required" placeholder="">
                        <label for="gl_gross_add_q3_for_concrete">Do you do works on dike, dams, and bridges?</label>
                    </div>
                </div>
            </div>
        `);

        $("#gl_gross_add_q1_for_concrete").on("change", function () {
            setTimeout(function () {
                computePercentage(
                    "gl_gross_add_q1_for_concrete",
                    "gl_gross_add_q2_for_concrete"
                );
            }, 0);
        });
        $("#gl_gross_add_q2_for_concrete").on("change", function () {
            setTimeout(function () {
                computePercentage(
                    "gl_gross_add_q2_for_concrete",
                    "gl_gross_add_q1_for_concrete"
                );
            }, 0);
        });
    }

    function showGLProfessionsIfHandyman() {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <h6 class="profession_header mt-2 mb-2">Additional Questions for Handyman Contractors:</h6>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_gross_add_q1_for_handyman" id="gl_gross_add_q1_for_handyman" class="form-control required" placeholder="">
                        <label for="gl_gross_add_q1_for_handyman">What’s the largest project that you have done?</label>
                    </div>
                </div>
            </div>
        `);
    }

    function showGLProfessionsIfFlooring() {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <div class="col-md-12">
                    <h6 class="profession_header mt-2 mb-2">Additional Questions for Flooring Contractors:</h6>
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_gross_add_q1_for_flooring" id="gl_gross_add_q1_for_flooring" class="form-control required" placeholder="">
                        <label for="gl_gross_add_q1_for_flooring">What type of flooring do you install?</label>
                    </div>
                </div>
            </div>
        `);
    }

    function showGLProfessionsIfLandscaping() {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <div class="col-md-12">
                    <h6 class="profession_header mt-2 mb-2">Additional Questions for Landscaping Contractors:</h6>
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_gross_add_q1_for_landscaping" id="gl_gross_add_q1_for_landscaping" class="form-control required" placeholder="">
                        <label for="gl_gross_add_q1_for_landscaping">Any hardscaping works?</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_gross_add_q2_for_landscaping" id="gl_gross_add_q2_for_landscaping" class="form-control required" placeholder="">
                        <label for="gl_gross_add_q2_for_landscaping">Do you install irrigations systems?</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_gross_add_q3_for_landscaping" id="gl_gross_add_q3_for_landscaping" class="form-control required" placeholder="">
                        <label for="gl_gross_add_q3_for_landscaping">Retaining walls max height</label>
                    </div>
                </div>
            </div>
        `);
    }

    function showGLProfessionsIfPainting() {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <div class="col-md-12">
                    <h6 class="profession_header mt-2 mb-2">Additional Questions for Painting Contractors:</h6>
                    <div class="mb-3 form-floating">
                        <select class="form-select required" name="gl_gross_add_q1_for_painting"
                            id="gl_gross_add_q1_for_painting" aria-label="gl_gross_add_q1_for_painting">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_gross_add_q1_for_painting">Do you paint automotive?</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <select class="form-select required" name="gl_gross_add_q2_for_painting"
                            id="gl_gross_add_q2_for_painting" aria-label="gl_gross_add_q2_for_painting">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_gross_add_q2_for_painting">Do you paint roofs, ships, roads and highways?</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_gross_add_q3_for_painting" id="gl_gross_add_q3_for_painting" class="form-control required" placeholder="">
                        <label for="gl_gross_add_q3_for_painting">Max height exposure?</label>
                    </div>
                </div>
            </div>
        `);
    }

    function showGLProfessionsIfPlastering() {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <div class="col-md-12">
                    <h6 class="profession_header mt-2 mb-2">Additional Questions for Plastering Contractors:</h6>
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_gross_add_q1_for_plastering" id="gl_gross_add_q1_for_plastering" class="form-control required" placeholder="">
                        <label for="gl_gross_add_q1_for_plastering">Max. height exposure</label>
                    </div>
                </div>
            </div>
        `);
    }

    function showGLProfessionsIfTreeService() {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <div class="col-md-12">
                    <h6 class="profession_header mt-2 mb-2">Additional Questions for Tree Service Contractors:</h6>
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_gross_add_q1_for_tree_service" id="gl_gross_add_q1_for_tree_service" class="form-control required" placeholder="">
                        <label for="gl_gross_add_q1_for_tree_service">Max. height exposure</label>
                    </div>
                </div>
            </div>
        `);
    }

    function showGLProfessionsIfMasonry() {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <div class="col-md-12">
                    <h6 class="profession_header mt-2 mb-2">Additional Questions Masonry Contractors:</h6>
                    <div class="mb-3 form-floating">
                        <select class="form-select required" name="gl_gross_add_q1_for_masonry"
                            id="gl_gross_add_q1_for_masonry" aria-label="gl_gross_add_q1_for_masonry">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_gross_add_q1_for_masonry">Do you have any pools exposure?</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_gross_add_q2_for_masonry" id="gl_gross_add_q2_for_masonry" class="form-control required" placeholder="">
                        <label for="gl_gross_add_q2_for_masonry">Do you do retaining walls that exceeds 6ft?</label>
                    </div>
                </div>
            </div>
        `);
    }

    function showEPLIDeductiblePerClaimIfOthers() {
        $("#epli_deductible_amount_if_others_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="epli_deductible_claim_if_others" id="epli_deductible_claim_if_others" class="form-control required" placeholder="">
                        <label for="epli_deductible_claim_if_others">If others, please indicate the deductible per claim amount:</label>
                    </div>
                </div>
            </div>
        `);

        perfectCurrencyFormatter("#epli_deductible_claim_if_others");
    }

    let counter = 0;
    let percentages = [];
    let totalPercentage = 0;

    function checkPercentages() {
        return percentages.reduce((a, b) => a + b, 0);
    }

    function checkTotalPercentage() {
        return totalPercentage + percentages.reduce((a, b) => a + b, 0);
    }

    function removeLastStateWork() {
        counter--;
        $(`.stateWorkContainer:last`).remove();
        percentages.pop(); // remove the last percentage from the array
    }

    function showMultipleStateWork() {
        counter++;

        const newElement = $("#gl_multiple_state_work_container").append(`
        <div class="row justify-content-center stateWorkContainer">
            <h6 class="profession_header mt-2 mb-2">State Work Entry No. ${counter}</h6>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="gl_multiple_states_${counter}"
                        id="gl_multiple_states_${counter}" aria-label="gl_multiple_states_${counter}">
                        <option value="" selected></option>
                        <option value='AK'>AK</option>
                        <option value='AL'>AL</option>
                        <option value='AP'>AP</option>
                        <option value='AR'>AR</option>
                        <option value='AZ'>AZ</option>
                        <option value='CA'>CA</option>
                        <option value='CO'>CO</option>
                        <option value='CT'>CT</option>
                        <option value='DC'>DC</option>
                        <option value='DE'>DE</option>
                        <option value='FL'>FL</option>
                        <option value='FM'>FM</option>
                        <option value='GA'>GA</option>
                        <option value='GU'>GU</option>
                        <option value='HI'>HI</option>
                        <option value='IA'>IA</option>
                        <option value='ID'>ID</option>
                        <option value='IL'>IL</option>
                        <option value='IN'>IN</option>
                        <option value='KS'>KS</option>
                        <option value='KY'>KY</option>
                        <option value='LA'>LA</option>
                        <option value='MA'>MA</option>
                        <option value='MD'>MD</option>
                        <option value='ME'>ME</option>
                        <option value='MH'>MH</option>
                        <option value='MI'>MI</option>
                        <option value='MN'>MN</option>
                        <option value='MO'>MO</option>
                        <option value='MP'>MP</option>
                        <option value='MS'>MS</option>
                        <option value='MT'>MT</option>
                        <option value='NC'>NC</option>
                        <option value='ND'>ND</option>
                        <option value='NE'>NE</option>
                        <option value='NH'>NH</option>
                        <option value='NJ'>NJ</option>
                        <option value='NM'>NM</option>
                        <option value='NV'>NV</option>
                        <option value='NY'>NY</option>
                        <option value='OH'>OH</option>
                        <option value='OK'>OK</option>
                        <option value='OR'>OR</option>
                        <option value='PA'>PA</option>
                        <option value='PW'>PW</option>
                        <option value='RI'>RI</option>
                        <option value='SC'>SC</option>
                        <option value='SD'>SD</option>
                        <option value='TN'>TN</option>
                        <option value='TX'>TX</option>
                        <option value='UT'>UT</option>
                        <option value='VA'>VA</option>
                        <option value='VT'>VT</option>
                        <option value='WA'>WA</option>
                        <option value='WI'>WI</option>
                        <option value='WV'>WV</option>
                        <option value='WY'>WY</option>
                    </select>
                    <label for="gl_multiple_states_${counter}">Choose state</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="gl_multiple_states_percentage_${counter}" id="gl_multiple_states_percentage_${counter}" class="form-control required" placeholder="% Percentage">
                    <label for="gl_multiple_states_percentage_${counter}">% Percentage</label>
                </div>
            </div>

            </div>`);

        $("#gl_multiple_state_work_container").append(newElement);

        $(`#gl_multiple_states_percentage_${counter}`).on(
            "change",
            function () {
                const currentFieldIndex =
                    parseInt($(this).attr("id").match(/\d+/)[0], 10) - 1;
                const value = parseFloat($(this).val());

                if (isNaN(value)) {
                    toastr.error("Please enter a valid number");
                    $(this).val("");
                    return;
                }

                const oldPercentage = percentages[currentFieldIndex] || 0;
                percentages[currentFieldIndex] = value;

                const totalPercentage = checkPercentages();

                if (totalPercentage > 100) {
                    toastr.error("Total percentage should not exceed 100%");
                    $(this).val(oldPercentage);
                    percentages[currentFieldIndex] = oldPercentage;
                } else {
                    // If the new total percentage is valid, update the array.
                    percentages[currentFieldIndex] = value;
                }

                // If total is 100%, ensure there are no extra state input elements.
                if (totalPercentage === 100 && counter > percentages.length) {
                    removeLastStateWork();
                }

                // If total is below 100% and there's no extra input, add one.
                if (totalPercentage < 100 && counter === percentages.length) {
                    showMultipleStateWork();
                }
            }
        );
    }

    function showToolsEquipmentNoOfLossesContainer() {
        $("#tools_no_losses_5years_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <textarea style="resize: none;" name="tools_explain_losses" id="tools_explain_losses" class="form-control required" placeholder="Please explain"></textarea>
                    <label for="tools_explain_losses">Explain Losses (Please include loss amount)</label>
                </div>
            </div>
        `);
    }

    function showScheduledEquipmentEntry(i) {
        $("#sched_equipment_container").append(`
            <div class="d-flex justify-content-between equipment-entry">
                <h6 class="profession_header mt-2 mb-2">Scheduled Equipment ${i}</h6>
                <button id="" class="btn_1 delete-entry mb-2">-</button>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="instfloat_scheduled_equipment_type_${i}"
                        id="instfloat_scheduled_equipment_type_${i}" class="form-control required"
                        placeholder="Type:" />
                    <label for="instfloat_scheduled_equipment_type_${i}">Type:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="instfloat_scheduled_equipment_mfg_${i}"
                        id="instfloat_scheduled_equipment_mfg_${i}" class="form-control required"
                        placeholder="Manufacturer:" />
                    <label for="instfloat_scheduled_equipment_mfg_${i}">Manufacturer:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text"
                        name="instfloat_scheduled_equipment_id_or_serial_${i}"
                        id="instfloat_scheduled_equipment_id_or_serial_${i}"
                        class="form-control required"
                        placeholder="ID # /
                        Serial Number:"
                        />
                    <label for="instfloat_scheduled_equipment_id_or_serial_${i}">ID # /
                        Serial Number:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="instfloat_scheduled_equipment_model_${i}"
                        id="instfloat_scheduled_equipment_model_${i}" class="form-control required"
                        placeholder="Model:" />
                    <label for="instfloat_scheduled_equipment_model_${i}">Model:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <select class="form-select"
                        name="instfloat_scheduled_equipment_new_or_used_${i}"
                        id="instfloat_scheduled_equipment_new_or_used_${i}"
                        aria-label="instfloat_scheduled_equipment_new_or_used_${i}">
                        <option value="" selected></option>
                        <option value="New">New</option>
                        <option value="Used">Used</option>
                    </select>
                    <label for="instfloat_scheduled_equipment_new_or_used_${i}">New /
                        Used:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text"
                        name="instfloat_scheduled_equipment_model_year_${i}"
                        id="instfloat_scheduled_equipment_model_year_${i}"
                        class="form-control required" placeholder="Model Year:"
                        />
                    <label for="instfloat_scheduled_equipment_model_year_${i}">Model
                        Year:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text"
                        name="instfloat_scheduled_equipment_date_purchased_${i}"
                        id="instfloat_scheduled_equipment_date_purchased_${i}"
                        class="form-control required" placeholder="Date Purchased:"
                        />
                    <label for="instfloat_scheduled_equipment_date_purchased_${i}">Date
                        Purchased:</label>
                </div>
            </div>`);
    }

    async function showWCAdditionalProfessionEntry(a) {
        try {
            let response = await axios.get("wc/showProfessionEntries", {
                params: {
                    a: a,
                },
            });

            let data = response.data.data;

            if (data) {
                $("#wc_professions_container").append(data);
                perfectCurrencyFormatter(".wc-annual-payroll");
                // Attach a change event handler to the document for any element with an ID starting with 'wc_profession_'
                $(document).on(
                    "change",
                    `[id^="wc_profession_type_"]`,
                    function () {
                        // Get the value of the selected option
                        let wcProfessionValue = parseInt($(this).val());
                        if (wcProfessionValue === 319) {
                            $("#wc_profession_type_if_other_" + a).append(`
                            <div class="row justify-content-center customProfession">
                                <h6 class="profession_header mt-2 mb-2">Please specify your profession:</h6>
                                <div class="col-md-12">
                                    <div class="mb-3 form-floating">
                                        <input type="text" name="wc_specify_profession_${a}" id="wc_specify_profession_${a}" class="form-control required" placeholder="">
                                        <label for="wc_specify_profession_${a}">Please specify your profession</label>
                                    </div>
                                </div>
                            </div>
                        `);
                        } else {
                            $(".customProfession").remove();
                        }
                    }
                );
            }
        } catch (error) {
            // Handle any errors here
            console.error(error);
        }
    }

    function renderOwnersInformationFields() {
        counter++;
        const ownersInfo = $("#owners_information_container").append(`
            <div class="row justify-content-center ownersInfo">
                <div class="col-md-12">
                    <h5 class="profession_header mt-2 mb-2">Owner's Information</h5>
                    <div class="mb-3 form-floating">
                        <input type="text" name="wc_name_${counter}" id="wc_name_${counter}"
                            class="form-control required" placeholder="">
                        <label for="wc_name_${counter}">Owner's Name</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="wc_title_relationship_${counter}"
                            id="wc_title_relationship_${counter}" class="form-control required" placeholder=""
                            >
                        <label for="wc_title_relationship_${counter}">Title / Relationship</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="wc_ownership_perc_${counter}"
                            id="wc_ownership_perc_${counter}" aria-label="wc_ownership_perc_${counter}">
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
                        <label for="wc_ownership_perc_${counter}">Ownership %</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="wc_exc_inc_${counter}" id="wc_exc_inc_${counter}"
                            aria-label="wc_exc_inc_${counter}">
                            <option value selected></option>
                            <option value="Excluded">Excluded</option>
                            <option value="Included">Included</option>
                        </select>
                        <label for="wc_exc_inc_${counter}">Excluded / Included</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 form-floating">
                        <input type="text" name="wc_ssn_${counter}" id="wc_ssn_${counter}"
                            class="form-control required" placeholder="SSN">
                        <label for="wc_ssn_${counter}">SSN</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 form-floating">
                        <input type="text" name="wc_fein_${counter}" id="wc_fein_${counter}"
                            class="form-control required" placeholder="FEIN">
                        <label for="wc_fein_${counter}">FEIN</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="wc_dob_${counter}" id="wc_dob_${counter}"
                            class="form-control required" placeholder="MM/DD/YYYY">
                        <label for="wc_dob_${counter}">Date of Birth</label>
                    </div>
                </div>
            </div>
        `);

        $("#owners_information_container").append(ownersInfo);

        $(`#wc_ownership_perc_${counter}`).on("change", function () {
            const value = parseInt($(this).val());
            if (!isNaN(value)) {
                percentages[counter - 1] = value;
                const currentTotal = checkTotalPercentage();

                if (currentTotal < 100) {
                    renderOwnersInformationFields();
                } else if (currentTotal > 100) {
                    toastr.error("Ownership percentage cannot exceed 100%");
                    $(`#wc_ownership_perc_${counter}`).val("");
                }
            }
        });

        $(`#wc_ssn_${counter}`).ssnFormat();
        $(`#wc_fein_${counter}`).feinFormat();
        datePickerFormatter(`#wc_dob_${counter}`);
    }

    function showSchedPropertyBRContainer() {
        $("#br_scheduled_property_container").append(`
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Carrier Name</h6>
                <div class="mb-3 form-floating">
                    <input type="text" name="br_sched_property_carrier_name"
                        id="br_sched_property_carrier_name" class="form-control required"
                        placeholder="Please specify:" />
                    <label for="br_sched_property_carrier_name">Please specify:</label>
                </div>
            </div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Effective Date:</h6>
                <div class="mb-3 form-floating">
                    <input type="text" name="br_sched_property_effective_date"
                        id="br_sched_property_effective_date" class="form-control required"
                        placeholder="Please specify:" />
                    <label for="br_sched_property_effective_date">Please specify:</label>
                </div>
            </div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Expiration Date:</h6>
                <div class="mb-3 form-floating">
                    <input type="text" name="br_sched_property_expiration_date"
                        id="br_sched_property_expiration_date" class="form-control required"
                        placeholder="Please specify:" />
                    <label for="br_sched_property_expiration_date">Please specify:</label>
                </div>
            </div>
        `);

        datePickerFormatter("#br_sched_property_effective_date");
        datePickerFormatter("#br_sched_property_expiration_date");
    }

    function showIfProjectStarted() {
        $("#br_project_started_container").append(`
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">When has the project started?</h6>
                <div class="mb-3 form-floating">
                    <input type="text" name="br_when_project_started"
                        id="br_when_project_started" class="form-control required"
                        placeholder="Please specify:" />
                    <label for="br_when_project_started">Please specify:</label>
                </div>
            </div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">What are the work done?</h6>
                <div class="mb-3 form-floating">
                    <input type="text" name="br_what_are_work_done"
                        id="br_what_are_work_done" class="form-control required"
                        placeholder="Please specify:" />
                    <label for="br_what_are_work_done">Please specify:</label>
                </div>
            </div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Cost of Work Done</h6>
                <div class="mb-3 form-floating">
                    <input type="text" name="br_cost_of_work_done"
                        id="br_cost_of_work_done" class="form-control required"
                        placeholder="Please specify:" />
                    <label for="br_cost_of_work_done">Please specify:</label>
                </div>
            </div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">What are the remaining works?</h6>
                <div class="mb-3 form-floating">
                    <input type="text" name="br_what_are_remaining_works"
                        id="br_what_are_remaining_works" class="form-control required"
                        placeholder="Please specify:" />
                    <label for="br_what_are_remaining_works">Please specify:</label>
                </div>
            </div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Cost of remaining works</h6>
                <div class="mb-3 form-floating">
                    <input type="text" name="br_cost_remaining_works"
                        id="br_cost_remaining_works" class="form-control required"
                        placeholder="Please specify:" />
                    <label for="br_cost_remaining_works">Please specify:</label>
                </div>
            </div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">When will project start?</h6>
                <div class="mb-3 form-floating">
                    <input type="text" name="br_when_will_project_start"
                        id="br_when_will_project_start" class="form-control required"
                        placeholder="Please specify:" />
                    <label for="br_when_will_project_start">Please specify:</label>
                </div>
            </div>
        `);

        perfectCurrencyFormatter("#br_cost_of_work_done");
        perfectCurrencyFormatter("#br_cost_remaining_works");
        datePickerFormatter("#br_when_will_project_start");
        datePickerFormatter("#br_when_project_started");
    }

    function showReqLimitsIfOthers() {
        $("#eo_requested_limits_others_container").append(`

                <div class="mb-3 form-floating">
                    <input type="text" name="eo_reqlimit_if_others"
                        id="eo_reqlimit_if_others" class="form-control required"
                        placeholder="If Others, Please indicate:" />
                    <label for="eo_reqlimit_if_others">If Others, Please indicate:</label>
                </div>

        `);
    }

    function showReqDeductibleIfOthers() {
        $("#eo_requested_deductible_others_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="eo_reqdeductible_if_others"
                        id="eo_reqdeductible_if_others" class="form-control required"
                        placeholder="If Others, Please indicate:" />
                    <label for="eo_reqdeductible_if_others">If Others, Please
                        indicate:</label>
                </div>
            </div>
        `);
    }

    function showReqDeductibleIfOthers() {
        $("#eo_requested_deductible_others_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="eo_reqdeductible_if_others"
                        id="eo_reqdeductible_if_others" class="form-control required"
                        placeholder="If Others, Please indicate:" />
                    <label for="eo_reqdeductible_if_others">If Others, Please
                        indicate:</label>
                </div>
            </div>
        `);
    }

    function showBusinessEntityIfYesQ1() {
        $("#eo_business_entity_q1_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="eo_business_entity_sub_q1"
                        id="eo_business_entity_sub_q1" class="form-control required"
                        placeholder="" />
                    <label for="eo_business_entity_sub_q1">If Yes, Please
                        explain:</label>
                </div>
            </div>
        `);
    }

    function showBusinessEntityIfYesQ2() {
        $("#eo_business_entity_q2_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="eo_business_entity_sub_q2"
                        id="eo_business_entity_sub_q2" class="form-control required"
                        placeholder="" />
                    <label for="eo_business_entity_sub_q2">If Yes, Please
                        explain:</label>
                </div>
            </div>
        `);
    }

    function showBusinessEntityIfYesQ3() {
        $("#eo_business_entity_q3_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="eo_business_entity_sub_q3"
                        id="eo_business_entity_sub_q3" class="form-control required"
                        placeholder="" />
                    <label for="eo_business_entity_sub_q3">If Yes, Please
                        explain:</label>
                </div>
            </div>
        `);
    }

    function showBusinessEntityIfYesQ4() {
        $("#eo_business_entity_q4_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="eo_business_entity_sub_q4"
                        id="eo_business_entity_sub_q4" class="form-control required"
                        placeholder="" />
                    <label for="eo_business_entity_sub_q4">If Yes, Please
                        explain:</label>
                </div>
            </div>
        `);
    }

    function showBusinessEntityIfYesQ5() {
        $("#eo_business_entity_q5_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="eo_business_entity_sub_q5"
                        id="eo_business_entity_sub_q5" class="form-control required"
                        placeholder="" />
                    <label for="eo_business_entity_sub_q5">If Yes, Please
                        explain:</label>
                </div>
            </div>
        `);
    }

    function showHRIfYesQ1() {
        $("#eo_hr_q1_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="eo_hr_sub_q1"
                        id="eo_hr_sub_q1" class="form-control required"
                        placeholder="" />
                    <label for="eo_hr_sub_q1">If Yes, Please
                        explain:</label>
                </div>
            </div>
        `);
    }

    function showHRIfYesQ2() {
        $("#eo_hr_q2_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="eo_hr_sub_q2"
                        id="eo_hr_sub_q2" class="form-control required"
                        placeholder="" />
                    <label for="eo_hr_sub_q2">If Yes, Please
                        explain:</label>
                </div>
            </div>
        `);
    }

    function showHRIfYesQ3() {
        $("#eo_hr_q3_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="eo_hr_sub_q3"
                        id="eo_hr_sub_q3" class="form-control required"
                        placeholder="" />
                    <label for="eo_hr_sub_q3">If Yes, Please
                        explain:</label>
                </div>
            </div>
        `);
    }

    function showHRIfYesQ4() {
        $("#eo_hr_q4_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="eo_hr_sub_q4"
                        id="eo_hr_sub_q4" class="form-control required"
                        placeholder="" />
                    <label for="eo_hr_sub_q4">If Yes, Please
                        explain:</label>
                </div>
            </div>
        `);
    }

    // START PERSONAL INFORMATION SCRIPTS
    $("#phone_number").on("input", formatUSPhone);
    $("#fax_number").on("input", formatUSPhone);
    $("#zipcode").on("change", function () {
        getStateByZipcode();
    });
    // END PERSONAL INFORMATION SCRIPS

    // START ABOUT YOUR COMPANY
    perfectCurrencyFormatter("#annual_gross_receipt");
    function handleComputedPercentage(target_val, target_compared) {
        $(document).on("change", `#${target_val}`, function () {
            setTimeout(function () {
                computePercentage(`${target_val}`, `${target_compared}`);
            }, 0);
        });
    }
    handleComputedPercentage("residential_percentage", "commercial_percentage");
    handleComputedPercentage("commercial_percentage", "residential_percentage");
    handleComputedPercentage(
        "new_construction_percentage",
        "repair_remodel_percentage"
    );
    handleComputedPercentage(
        "repair_remodel_percentage",
        "new_construction_percentage"
    );
    // END ABOUT YOUR COMPANY

    // START GL SCRIPT

    handleComputedPercentage("gl_residential", "gl_commercial");
    handleComputedPercentage("gl_commercial", "gl_residential");
    handleComputedPercentage("gl_new_construction", "gl_repair_remodel");
    handleComputedPercentage("gl_repair_remodel", "gl_new_construction");
    perfectCurrencyFormatter("#gl_cost_proj_5years");
    perfectCurrencyFormatter("#gl_annual_gross");
    $("#wc_gross_receipt").val($("#gl_annual_gross").val());
    perfectCurrencyFormatter("#gl_payroll_amt");
    perfectCurrencyFormatter("#gl_subcon_cost");

    $(document).on("change", "#gl_using_subcon", function () {
        const value = parseInt($(this).val());
        $(".loader-container").removeClass("hidden");
        $(".loader-container").addClass("active");
        if (value === 1) {
            setTimeout(function () {
                showSubconContainerForGL();
                $(".loader-container").removeClass("active");
                $(".loader-container").addClass("hidden");
            }, 0);
        } else {
            $("#gl_subcon_cost_container").empty();
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
        }
    });

    $(document).on("change", "#gl_no_of_losses", function () {
        const value = parseInt($(this).val());
        $(".loader-container").removeClass("hidden");
        $(".loader-container").addClass("active");
        if (value === -1) {
            setTimeout(function () {
                showLossesAdditionalQuestion("gl");
                $(".loader-container").removeClass("active");
                $(".loader-container").addClass("hidden");
            }, 0);
        } else {
            $("#gl_losses_container").empty();
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
        }
    });
    function handleAnnualGrossChange() {
        var grossValue = $("#gl_annual_gross").val();
        var convertGrossValue = grossValue.replace(/[^0-9]/g, "");
        var newGrossValue = parseInt(convertGrossValue, 10);
        var professionValue = parseInt($("#gl_profession").val(), 10);

        // Remove any existing appended data
        $(".appendedQuestion").remove();

        if (!isNaN(newGrossValue) && !isNaN(professionValue)) {
            if (newGrossValue >= 150000) {
                if (professionValue === 178) {
                    showGLProfessionsIfGC();
                } else if (professionValue === 184) {
                    // Roofing
                    showGLProfessionsIfRoofing();
                } else if (professionValue === 226) {
                    // Electrical
                    showGLProfessionsIfElectrical();
                } else if (professionValue === 190) {
                    // Plumbing
                    showGLProfessionsIfPlumbing();
                } else if (professionValue === 115) {
                    // HVAC
                    showGLProfessionsIfHVAC();
                } else if (professionValue === 188 || professionValue === 189) {
                    // Concrete
                    showGLProfessionsIfConcrete();
                } else if (professionValue === 114) {
                    // Handyman
                    showGLProfessionsIfHandyman();
                } else if (professionValue === 229) {
                    // Flooring
                    showGLProfessionsIfFlooring();
                } else if (professionValue === 119) {
                    // Landscaping
                    showGLProfessionsIfLandscaping();
                } else if (professionValue === 56) {
                    // Painting
                    showGLProfessionsIfPainting();
                } else if (professionValue === 196) {
                    // Plastering
                    showGLProfessionsIfPlastering();
                } else if (professionValue === 146) {
                    // Tree service
                    showGLProfessionsIfTreeService();
                } else if (professionValue === 51) {
                    // Masonry
                    showGLProfessionsIfMasonry();
                } else {
                    $(".loader-container").addClass("hidden");
                    $(".loader-container").removeClass("active");
                    $(".appendedQuestion").remove();
                    $("#gl_annual_gross_additional_questions").empty();
                }
            } else {
                $(".loader-container").addClass("hidden");
                $(".loader-container").removeClass("active");
                $(".appendedQuestion").remove();
                $("#gl_annual_gross_additional_questions").empty();
            }
        } else {
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
            $(".appendedQuestion").remove();
            $("#gl_annual_gross_additional_questions").empty();
        }
    }

    // Event delegation for handling changes in #gl_annual_gross
    $(document).on("change", "#gl_annual_gross", handleAnnualGrossChange);

    // Event delegation for handling changes in #gl_profession
    $(document).on("change", "#gl_profession", function () {
        handleAnnualGrossChange();

        const gl_profession = parseInt($(this).val());

        if (gl_profession === 319) {
            appendInputIfProfessionIsOthers();
        }
    });
    $(document).on("change", "#gl_multiple_state_work", function () {
        const value = parseInt($(this).val(), 10);
        if (value === 1) {
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
            $("#gl_multiple_state_work_container").empty();
            percentages = []; // Clear the percentages array
            counter = 0; // Reset counter
            showMultipleStateWork();
        } else {
            $(".stateWorkContainer").remove();
            percentages = [];
            counter = 0;
        }
    });

    // END GL SCRIPTS

    // START WC SCRIPTS
    perfectCurrencyFormatter("#wc_subcon_cost_year");
    perfectCurrencyFormatter("#wc_gross_receipt");

    $(document).on("change", "#wc_does_hire_subcon", function () {
        if ($(this).val() === "1") {
            setTimeout(function () {
                $(".loader-container").addClass("hidden");
                $(".loader-container").removeClass("active");
                showWCSubconCostYearContainer();
            }, 0);
        } else if ($(this).val() === "0" || $(this).val() === "") {
            $("#wc_subcon_cost_year").parent().parent().remove();
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
        }
    });

    $(document).on("change", "#wc_ownership_perc", function () {
        const value = parseInt($(this).val());
        if (!isNaN(value)) {
            if (value < 100) {
                totalPercentage = value;
                $("#owners_information_container").empty();
                counter = 0;
                percentages = [];
                renderOwnersInformationFields();
            } else if (value == 100) {
                totalPercentage = value;
                $("#owners_information_container").empty();
                counter = 0;
                percentages = [];
            } else {
                toastr.error("Ownership percentage cannot exceed 100%");
                $(this).val("");
            }
        }
    });

    $(document).on("change", "#wc_no_of_losses", function () {
        const value = parseInt($(this).val());
        $(".loader-container").removeClass("hidden");
        $(".loader-container").addClass("active");
        if (value === -1) {
            setTimeout(function () {
                showLossesAdditionalQuestion("wc");
                $(".loader-container").removeClass("active");
                $(".loader-container").addClass("hidden");
            }, 0);
        } else {
            $("#wc_losses_container").empty();
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
        }
    });
    appendNewWCProfessionEntry("#add_wc_employee_entry");

    $(document).on("click", ".delete-profession-entry", function () {
        $(this)
            .parent(".profession-entry")
            .nextUntil(".profession-entry")
            .addBack()
            .remove();
        wcProfessionEntry--;
        updateWCProfessionEntryNames();
    });
    $(document).on("change", "#wc_profession_type_1", function () {
        var professionType = parseInt($(this).val());
        if (professionType === 319) {
            $("#wc_profession_type_if_other_1").append(`
            <div class="row justify-content-center customProfession">
                <h6 class="profession_header mt-2 mb-2">Please specify your profession:</h6>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="wc_specify_profession_1" id="wc_specify_profession_1" class="form-control required" placeholder="">
                        <label for="wc_specify_profession_1">Please specify your profession</label>
                    </div>
                </div>
            </div>
        `);
        } else {
            $(".customProfession").remove();
        }
    });
    perfectCurrencyFormatter("#wc_annual_payroll_1");
    // END WC SCRIPTS

    // START AUTO SCRIPTS

    // $(document).ready(function () {
    // $("#auto_add_vehicle").trigger("change");
    // });
    // $(document).on("ready", function () {
    //     $("#auto_add_vehicle").trigger("change");
    // });
    $(document).on("change", "#auto_add_vehicle", function () {
        var numVehicles = $(this).val();
        $("#auto_vehicles_container").empty();
        for (var i = 1; i <= numVehicles; i++) {
            showAutoVehicleEntries(i);
        }
    });
    // $(document).on("ready", function () {
    //     $("#auto_add_driver").trigger("change");
    // });
    $(document).on("change", "#auto_add_driver", function () {
        const numDrivers = $(this).val();
        $("#auto_drivers_container").empty();
        for (let i = 1; i <= numDrivers; i++) {
            showAutoDriverEntries(i);
        }
    });

    $(document).on("change", "#auto_driver_marital_status", function () {
        const value = $(this).val();
        $(".loader-container").removeClass("hidden");
        $(".loader-container").addClass("active");
        if (value === "Married") {
            setTimeout(function () {
                showDriverIfMarried();
                $(".loader-container").removeClass("active");
                $(".loader-container").addClass("hidden");
            }, 0);
        } else {
            $("#auto_driver_if_married_container").empty();
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
        }
    });

    $(document).on("change", "#auto_no_of_losses", function () {
        const value = parseInt($(this).val());
        $(".loader-container").removeClass("hidden");
        $(".loader-container").addClass("active");
        if (value === -1) {
            setTimeout(function () {
                showLossesAdditionalQuestion("auto");
                $(".loader-container").removeClass("active");
                $(".loader-container").addClass("hidden");
            }, 0);
        } else {
            $("#auto_losses_container").empty();
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
        }
    });
    // END AUTO SCRIPTS

    // START BOND SCRIPTS

    $(document).on("change", "#bond_owners_civil_status", function () {
        const isSelectedMarried = $(this).val() === "Married";
        if (isSelectedMarried) {
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
            setTimeout(ShowLicBondSpouseInfoIfMarried, 0);
        } else {
            $("#bond_owner_if_married_container").empty();
            $(".loader-container").removeClass("active").addClass("hidden");
        }
    });
    perfectCurrencyFormatter("#bond_amount_of_bond");
    $(document).on("change", "#bond_type_of_license", function () {
        $(".loader-container").addClass("hidden");
        $(".loader-container").removeClass("active");
        if ($(this).val() === "Others") {
            setTimeout(function () {
                ShowLicBondTypeOfLicIfOthers();
            }, 0);
        } else {
            $("#bond_license_type_if_others_container").empty();
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
        }
    });

    $(document).on("change", "#bond_no_of_losses", function () {
        const value = parseInt($(this).val());
        $(".loader-container").removeClass("hidden");
        $(".loader-container").addClass("active");
        if (value === -1) {
            setTimeout(function () {
                showLossesAdditionalQuestion("bond");
                $(".loader-container").removeClass("active");
                $(".loader-container").addClass("hidden");
            }, 0);
        } else {
            $("#bond_losses_container").empty();
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
        }
    });
    // END BOND SCRIPTS

    // START EXCESS SCRIPTS
    perfectCurrencyFormatter("#excess_policy_premium");
    $(document).on("change", "#excess_no_losses_5years", function () {
        const value = parseInt($(this).val());
        if (value >= 1) {
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
            setTimeout(function () {
                showExcessNoOfLossesContainer();
            }, 0);
        } else {
            $("#excess_explain_losses").parent().parent().remove();
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
        }
    });

    $(document).on("change", "#excess_no_of_losses", function () {
        const value = parseInt($(this).val());
        $(".loader-container").removeClass("hidden");
        $(".loader-container").addClass("active");
        if (value === -1) {
            setTimeout(function () {
                showLossesAdditionalQuestion("excess");
                $(".loader-container").removeClass("active");
                $(".loader-container").addClass("hidden");
            }, 0);
        } else {
            $("#excess_losses_container").empty();
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
        }
    });
    // END EXCESS SCRIPTS

    // START TOOLS SCRIPTS
    miscToolsCurrencyFormatter("#tools_misc_tools");
    perfectCurrencyFormatter("#tools_rented_or_leased_amt");
    scheduledEquipmentCurrencyFormatter("#tools_sched_equipment");

    $(document).on("change", "#tools_no_losses_5years", function () {
        const value = parseInt($(this).val());
        if (value >= 1) {
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
            setTimeout(function () {
                showToolsEquipmentNoOfLossesContainer();
            }, 0);
        } else {
            $("#tools_explain_losses").parent().parent().remove();
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
        }
    });

    $(document).on("change", "#tools_equipment_no_of_losses", function () {
        const value = parseInt($(this).val());
        $(".loader-container").removeClass("hidden");
        $(".loader-container").addClass("active");
        if (value === -1) {
            setTimeout(function () {
                showLossesAdditionalQuestion("tools_equipment");
                $(".loader-container").removeClass("active");
                $(".loader-container").addClass("hidden");
            }, 0);
        } else {
            $("#tools_equipment_losses_container").empty();
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
        }
    });
    // END TOOLS SCRIPTS

    // START BR SCRIPTS
    perfectCurrencyFormatter("#br_value_of_existing_structure");
    perfectCurrencyFormatter("#br_value_of_work_performed");

    function handleBRSubQuestions(select_target, fn, sub_container) {
        $(document).on("change", `#${select_target}`, function () {
            const value = parseInt($(this).val());
            if (value >= 1) {
                $(".loader-container").addClass("hidden");
                $(".loader-container").removeClass("active");
                setTimeout(function () {
                    fn();
                }, 0);
            } else {
                $(".loader-container").addClass("hidden");
                $(".loader-container").removeClass("active");
                $(`#${sub_container}`).empty();
            }
        });
    }

    handleBRSubQuestions(
        "br_scheduled_property_address_builders_risk_coverage",
        showSchedPropertyBRContainer,
        "br_scheduled_property_container"
    );

    handleBRSubQuestions(
        "br_has_project_started",
        showIfProjectStarted,
        "br_project_started_container"
    );

    $(document).on("change", "#br_no_of_losses", function () {
        const value = parseInt($(this).val());
        $(".loader-container").removeClass("hidden");
        $(".loader-container").addClass("active");
        if (value === -1) {
            setTimeout(function () {
                showLossesAdditionalQuestion("br");
                $(".loader-container").removeClass("active");
                $(".loader-container").addClass("hidden");
            }, 0);
        } else {
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
            $("#br_losses_container").empty();
        }
    });

    yearPickerFormatter("#br_last_update_to_roofing_year");
    yearPickerFormatter("#br_last_update_to_heating_year");
    yearPickerFormatter("#br_last_update_to_electrical_year");
    yearPickerFormatter("#br_last_update_to_plumbing_year");
    // END BR SCRIPTS

    // START BOP SCRIPTS
    perfectCurrencyFormatter("#bop_val_cost_bldg");
    perfectCurrencyFormatter("#bop_business_property_limit");
    yearPickerFormatter("#bop_year_built");
    yearPickerFormatter("#bop_last_update_roofing_year");
    yearPickerFormatter("#bop_last_update_heating_year");
    yearPickerFormatter("#bop_last_update_plumbing_year");
    yearPickerFormatter("#bop_last_update_electrical_year");
    $(document).on("change", "#bop_no_of_losses", function () {
        const value = parseInt($(this).val());
        $(".loader-container").removeClass("hidden");
        $(".loader-container").addClass("active");
        if (value === -1) {
            setTimeout(function () {
                showLossesAdditionalQuestion("bop");
                $(".loader-container").removeClass("active");
                $(".loader-container").addClass("hidden");
            }, 0);
        } else {
            $("#bop_losses_container").empty();
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
        }
    });
    // END BOP SCRIPTS

    // START COMM PROP SCRIPTS
    perfectCurrencyFormatter("#property_value_cost_bldg");
    perfectCurrencyFormatter("#property_business_property_limit");

    $(document).on("change", "#property_no_of_losses", function () {
        const value = parseInt($(this).val());
        $(".loader-container").removeClass("hidden");
        $(".loader-container").addClass("active");
        if (value === -1) {
            setTimeout(function () {
                showLossesAdditionalQuestion("property");
                $(".loader-container").removeClass("active");
                $(".loader-container").addClass("hidden");
            }, 0);
        } else {
            $("#property_losses_container").empty();
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
        }
    });
    // END COMM PROPS SCRIPTS

    // START EO SCRIPTS
    perfectCurrencyFormatter("#eo_ftime_salary_range");
    perfectCurrencyFormatter("#eo_ptime_salary_range");

    function handleEORequestDeductibleSubQuestions(
        select_target,
        fn,
        sub_container
    ) {
        $(document).on("change", `#${select_target}`, function () {
            const value = $(this).val();
            if (value === "Others") {
                $(".loader-container").addClass("hidden");
                $(".loader-container").removeClass("active");
                setTimeout(function () {
                    fn();
                }, 0);
            } else {
                $(".loader-container").addClass("hidden");
                $(".loader-container").removeClass("active");
                $(`#${sub_container}`).empty();
            }
        });
    }

    function handleEOSubQuestions(select_target, fn, sub_container) {
        $(document).on("change", `#${select_target}`, function () {
            const value = parseInt($(this).val());
            if (value >= 1) {
                $(".loader-container").addClass("hidden");
                $(".loader-container").removeClass("active");
                setTimeout(function () {
                    fn();
                }, 0);
            } else {
                $(".loader-container").addClass("hidden");
                $(".loader-container").removeClass("active");
                $(`#${sub_container}`).empty();
            }
        });
    }

    handleEORequestDeductibleSubQuestions(
        "eo_requested_limits",
        showReqLimitsIfOthers,
        "eo_requested_limits_others_container"
    );

    handleEORequestDeductibleSubQuestions(
        "eo_request_deductible",
        showReqDeductibleIfOthers,
        "eo_requested_deductible_others_container"
    );

    handleEOSubQuestions(
        "eo_business_entity_q1",
        showBusinessEntityIfYesQ1,
        "eo_business_entity_q1_container"
    );

    handleEOSubQuestions(
        "eo_business_entity_q2",
        showBusinessEntityIfYesQ2,
        "eo_business_entity_q2_container"
    );

    handleEOSubQuestions(
        "eo_business_entity_q3",
        showBusinessEntityIfYesQ3,
        "eo_business_entity_q3_container"
    );

    handleEOSubQuestions(
        "eo_business_entity_q4",
        showBusinessEntityIfYesQ4,
        "eo_business_entity_q4_container"
    );

    handleEOSubQuestions(
        "eo_business_entity_q5",
        showBusinessEntityIfYesQ5,
        "eo_business_entity_q5_container"
    );

    handleEOSubQuestions("eo_hr_q1", showHRIfYesQ1, "eo_hr_q1_container");
    handleEOSubQuestions("eo_hr_q2", showHRIfYesQ2, "eo_hr_q2_container");
    handleEOSubQuestions("eo_hr_q3", showHRIfYesQ3, "eo_hr_q3_container");
    handleEOSubQuestions("eo_hr_q4", showHRIfYesQ4, "eo_hr_q4_container");

    $(document).on("change", "#eo_no_of_losses", function () {
        const value = parseInt($(this).val());
        $(".loader-container").removeClass("hidden");
        $(".loader-container").addClass("active");
        if (value === -1) {
            setTimeout(function () {
                showLossesAdditionalQuestion("eo");
                $(".loader-container").removeClass("active");
                $(".loader-container").addClass("hidden");
            }, 0);
        } else {
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
            $("#eo_losses_container").empty();
        }
    });
    // END EO SCRIPTS

    // START POLLUTION SCRIPTS
    perfectCurrencyFormatter("#pol_1_proj_rev");
    perfectCurrencyFormatter("#pol_1_total_proj_rev");
    perfectCurrencyFormatter("#pol_2_proj_rev");
    perfectCurrencyFormatter("#pol_2_total_proj_rev");
    perfectCurrencyFormatter("#pol_3_proj_rev");
    perfectCurrencyFormatter("#pol_3_total_proj_rev");
    $(document).on("change", "#pollution_no_of_losses", function () {
        const value = parseInt($(this).val());
        $(".loader-container").removeClass("hidden");
        $(".loader-container").addClass("active");
        if (value === -1) {
            setTimeout(function () {
                showLossesAdditionalQuestion("pollution");
                $(".loader-container").removeClass("active");
                $(".loader-container").addClass("hidden");
            }, 0);
        } else {
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
            $("#pollution_losses_container").empty();
        }
    });

    // END POLLUTION SCRIPTS

    // START EPLI SCRIPTS

    perfectCurrencyFormatter("#epli_prev_premium_amount");

    $(document).on("change", "#epli_deductible_amount", function () {
        const value = $(this).val();
        $(".loader-container").removeClass("hidden");
        $(".loader-container").addClass("active");
        if (value === "Others") {
            setTimeout(function () {
                showEPLIDeductiblePerClaimIfOthers();
                $(".loader-container").removeClass("active");
                $(".loader-container").addClass("hidden");
            }, 0);
        } else {
            $("#epli_deductible_amount_if_others_container").empty();
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
        }
    });

    $(document).on("change", "#epli_no_of_losses", function () {
        const value = parseInt($(this).val());
        $(".loader-container").removeClass("hidden");
        $(".loader-container").addClass("active");
        if (value === -1) {
            setTimeout(function () {
                showLossesAdditionalQuestion("epli");
                $(".loader-container").removeClass("active");
                $(".loader-container").addClass("hidden");
            }, 0);
        } else {
            $("#epli_losses_container").empty();
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
        }
    });
    // END EPLI SCRIPTS

    // START CYBER LIABILITY SCRIPTS
    $("#cyber_it_contact_number").on("input", formatUSPhone);
    $(document).on("change", "#cyber_no_of_losses", function () {
        const value = parseInt($(this).val());
        $(".loader-container").removeClass("hidden");
        $(".loader-container").addClass("active");
        if (value === -1) {
            setTimeout(function () {
                showLossesAdditionalQuestion("cyber");
                $(".loader-container").removeClass("active");
                $(".loader-container").addClass("hidden");
            }, 0);
        } else {
            $("#cyber_losses_container").empty();
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
        }
    });
    // END CYBER LIABILITY SCRIPTS

    // START INSTALLATION FLOATER SCRIPTS
    perfectCurrencyFormatter("#instfloat_max_value_of_equipment");
    perfectCurrencyFormatter("#instfloat_max_value_of_bldg_storage");
    perfectCurrencyFormatter("#instfloat_max_value_equipment_storing");
    perfectCurrencyFormatter(
        "#instfloat_unscheduled_max_value_equipment_storing"
    );
    appendNewSchedEquipmentEntry("#add_sched_equipment_entry");
    $(document).on("click", ".delete-entry", function () {
        $(this)
            .parent(".equipment-entry")
            .nextUntil(".equipment-entry")
            .addBack()
            .remove();
        equipmentCount--;
        updateEquipmentEntryNames();
    });

    $(document).on("change", "#instfloat_no_of_losses", function () {
        const value = parseInt($(this).val());
        $(".loader-container").removeClass("hidden");
        $(".loader-container").addClass("active");
        if (value === -1) {
            setTimeout(function () {
                showLossesAdditionalQuestion("instfloat");
                $(".loader-container").removeClass("active");
                $(".loader-container").addClass("hidden");
            }, 0);
        } else {
            $("#instfloat_losses_container").empty();
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
        }
    });
    // END INSTALLATION FLOATER SCRIPTS

    // START ABOUT YOUR COMPANY SCRIPTS

    $("#ayc_phone_number").on("input", formatUSPhone);
    // END ABOUT YOUR COMPANY SCRIPTS

    function formatAsCurrency(value) {
        var numericValue = value.replace(/[$,]/g, "");
        numericValue = parseFloat(numericValue || 0);
        return toUSD(numericValue);
    }
    // getCheckboxValue();
})(window.jQuery);
