(function ($) {
    "use strict";

    // Preload
    $(window).on("load", function () {
        // makes sure the whole site is loaded
        $('[data-loader="circle-side"]').fadeOut(); // will first fade out the loading animation
        $("#preloader").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.
        $("body").delay(350).css({
            overflow: "visible",
        });
    });

    let observer = new MutationObserver(() => {
    // $("#wrapped :checkbox, #wrapped input, #wrapped select, #wrapped textarea")
    //     .not("#fax_number, #personal_website, #contractor_license")
    //     .prop("required", true);
    });

    // Observe the entire document for changes
    observer.observe(document, {
        childList: true,  // Observes direct children
        subtree: true     // Observes all descendants
    });

    function updateProfessionContents() {
        var numProfessions = $("#wc_no_of_profession").val();
        var professionData = [];
        var professionContent = "";

        for (var i = 1; i <= numProfessions; i++) {
            var profession = {};
            profession.name = $("#wc_profession_" + i + " option:selected").text() || "";
            profession.annualPayroll = $("#wc_annual_payroll_" + i).val() || "";
            // profession.fullTimeEmployees = $("#wc_fulltime_" + i).val() || "";
            // profession.partTimeEmployees = $("#wc_parttime_" + i).val() || "";

            professionContent += "<div><h6><strong>Profession Entry No. " + i + "</strong></h6>";
            professionContent += "<p>Profession: <strong>" + profession.name + "</strong></p>";
            // professionContent += "<div><h6>Additional Questions</h6></div>";
            // professionContent += "<p>Q1: <strong>" + (gl_gross_add_q1 !== null ? gl_gross_add_q1 : "N/A") + "</strong></p>";
            // professionContent += "<p>Q2: <strong>" + (gl_gross_add_q2 !== null ? gl_gross_add_q2 : "N/A") + "</strong></p>";
            // professionContent += "<p>Q3: <strong>" + (gl_gross_add_q3 !== null ? gl_gross_add_q3 : "N/A") + "</strong></p>";
            // professionContent += "<p>Q4: <strong>" + (gl_gross_add_q4 !== null ? gl_gross_add_q4 : "N/A") + "</strong></p>";

            professionContent += "<p>Annual Payroll: <strong>" + profession.annualPayroll + "</strong></p>";
            // professionContent += "<p>Full Time: <strong>" + profession.fullTimeEmployees + " Employees</strong></p>";
            // professionContent += "<p>Part Time: <strong>" + profession.partTimeEmployees + " Employee</strong></p></div>";

            professionData.push(profession);
        }

        $("#profession_entry_container").html(professionContent);
        numProfessions ? $("#wc_details_1").html("<p>Number of Profession: <strong>" + numProfessions + "</strong></p>") : "";
    }

    // $(document).on("change", "#wc_no_of_profession", updateProfessionContents);

    $("#wc_no_of_profession").change(updateProfessionContents);
    // $("#wc_no_of_profession").val("1").trigger('change');

    // function updateGLProfessionContents() {
    //     // var gl_profession = $("#gl_profession option:selected").text();


    //     // if (professionArray.includes(gl_profession)) {
    //     //     // Show additional questions if the selected option is in professionArray
    //     //     $("#additional_questions").show();
    //     // } else {
    //     //     // Hide additional questions if the selected option is not in professionArray
    //     //     $("#additional_questions").hide();
    //     // }

    //     var gl_profession = $("#gl_profession option:selected").text();
    //     const professionArray = ["General Contractor", "Roofing Contractor", "Electrical Contractor", "Plumbing Contractor", "HVAC - Heating or Combined Heating and Air Conditioning Systems, Intall, Service and Repair", "Concrete Flat Contractor", "Concrete Foundation Contractor", "Handyman", "Floor Covering Installation (No Ceramic, Tile, Stone, or Wood)", "Landscaping Contractor", "Landscape Gardening", "Painting Contractor", "Plastering/Stucco", "Tree Trimming and Removal", "Masonry Contractor"];

    //     if (professionArray.includes(gl_profession)) {
    //         // Collect answers to additional questions
    //         var gl_gross_add_q1 = $("#gl_gross_add_q1").val().trim() !== "" ? $("#gl_gross_add_q1").val() : null;
    //         var gl_gross_add_q2 = $("#gl_gross_add_q2").val().trim() !== "" ? $("#gl_gross_add_q2").val() : null;
    //         var gl_gross_add_q3 = $("#gl_gross_add_q3").val().trim() !== "" ? $("#gl_gross_add_q3").val() : null;
    //         var gl_gross_add_q4 = $("#gl_gross_add_q4").val().trim() !== "" ? $("#gl_gross_add_q4").val() : null;

    //         // Create an object to store the additional questions and answers
    //         var additionalQuestions = {
    //             "Question 1": gl_gross_add_q1,
    //             "Question 2": gl_gross_add_q2,
    //             "Question 3": gl_gross_add_q3,
    //             "Question 4": gl_gross_add_q4
    //         };

    //         // Generate HTML for the review section
    //         generateAllHTML("#gl_information_details", [additionalQuestions]);
    //     }
    // }

    // // Attach an event listener to the select dropdown
    // $("#gl_profession").on("change", updateGLProfessionContents);

    // // Initially call the function to check the dropdown's initial state
    // updateGLProfessionContents();


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

        $('input[name^="instfloat_scheduled_equipment_type_"]').each(function (index) {
            var equipmentType = $(this).val();
            var manufacturer = $("#instfloat_scheduled_equipment_mfg_" + (index + 1)).val();
            var idOrSerial = $("#instfloat_scheduled_equipment_id_or_serial_" + (index + 1)).val();
            var model = $("#instfloat_scheduled_equipment_model_" + (index + 1)).val();
            var newOrUsed = $("#instfloat_scheduled_equipment_new_or_used_" + (index + 1)).val();
            var modelYear = $("#instfloat_scheduled_equipment_model_year_" + (index + 1)).val();
            var datePurchased = $("#instfloat_scheduled_equipment_date_purchased_" + (index + 1)).val();

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
                    var fax_number_if_set = fax_number ? "<p>Fax Number: <strong>" + fax_number + " </strong></p>" : "";
                    var email_address = $("#email_address").val();
                    var personal_website = $("#personal_website").val();
                    var personal_website_if_set = personal_website ? "<p>Personal Website: <strong>" + personal_website + "</strong></p>" : "";
                    var contractor_license = $("#contractor_license").val();
                    var contractor_license_if_set = contractor_license ? "<p>Contractor License No.: <strong>" + contractor_license + "</strong></p>" : "";

                    var personalInformation = {
                        "Company Name": company_name,
                        "Full Name": firstname + lastname,
                        Address: address + city + states + zipcode,
                        "Phone Number": phone_number,
                        "Fax Number": fax_number_if_set,
                        "Email Address": email_address,
                        "Personal Website": personal_website_if_set,
                        "Contractor License No.": contractor_license_if_set,
                    };


                    // GL Step 1 & 2
                    var generalLiabilityInformation = {};

                    var gl_annual_gross = $("#gl_annual_gross").val();
                    var gl_profession = $("#gl_profession option:selected").text();

                    var gl_gross_add_q1 = $("#gl_gross_add_q1").val() !== "" ? $("#gl_gross_add_q1").val() : null;
                    var gl_gross_add_q2 = $("#gl_gross_add_q2").val() !== "" ? $("#gl_gross_add_q2").val() : null;
                    var gl_gross_add_q3 = $("#gl_gross_add_q3").val() !== "" ? $("#gl_gross_add_q3").val() : null;
                    var gl_gross_add_q4 = $("#gl_gross_add_q4").val() !== "" ? $("#gl_gross_add_q4").val() : null;

                    console.log("Q1: " + gl_gross_add_q1)
                    console.log("Q2: " + gl_gross_add_q2)
                    console.log("Q3: " + gl_gross_add_q3)
                    console.log("Q4: " + gl_gross_add_q4)

                    var additionalQuestionsGL = {};

                    switch (gl_profession.trim()) {
                        case 'General Liability':
                            // Update the properties within the object
                            generalLiabilityInformation["Profession"] = gl_profession;
                            generalLiabilityInformation["Additional Questions for General Liability"] = {
                                "New construction - How many houses will you be building for the whole year": gl_gross_add_q1,
                                "Do you work on ADU houses?": gl_gross_add_q2,
                            };
                            break;
                        case 'Masonry Contractor':
                            // Update the properties within the object
                            generalLiabilityInformation["Profession"] = gl_profession;
                            generalLiabilityInformation["Additional Questions for Masonry Contractor"] = {
                                "Do you have any pools exposure": gl_gross_add_q1,
                                "Do you do retaining walls that exceed 6ft": gl_gross_add_q2,
                            };
                            break;
                        // Add more cases for other professions as needed
                    }

                    var gl_residential = $("#gl_residential option:selected").text();
                    var gl_commercial = $("#gl_commercial option:selected").text();
                    var gl_new_construction = $("#gl_new_construction option:selected").text();
                    var gl_repair_remodel = $("#gl_repair_remodel option:selected").text();
                    var gl_descops = $("#gl_descops").val();
                    var gl_cost_proj_5years = $("#gl_cost_proj_5years").val();

                    var gl_no_field_emp = $("#gl_no_field_emp").val();
                    var gl_payroll_amt = $("#gl_payroll_amt").val();
                    var gl_using_subcon = $("#gl_using_subcon").val();

                    var gl_using_subcon_if_set = "";
                    if (gl_using_subcon === "Yes") {
                        var gl_subcon_cost = $("#gl_subcon_cost").val();
                        var gl_using_subcon_if_set = gl_subcon_cost;
                    } else {
                        var gl_using_subcon_if_set = "";
                    }

                    var gl_no_losses_5years = $("#gl_no_losses_5years").val();

                    if (gl_no_losses_5years >= 0) {
                        var gl_explain_losses = $("#gl_explain_losses").val();
                        var gl_explain_losses_if_set = gl_explain_losses;
                    } else {
                        var gl_explain_losses_if_set = "";
                    }

                    // Update the properties within the object
                    generalLiabilityInformation["Annual Gross Receipts"] = gl_annual_gross;
                    generalLiabilityInformation["Residential"] = gl_residential;
                    generalLiabilityInformation["Commercial"] = gl_commercial;
                    generalLiabilityInformation["New Construction"] = gl_new_construction;
                    generalLiabilityInformation["Repair/Remodel"] = gl_repair_remodel;
                    generalLiabilityInformation["Detailed Description of Operations"] = gl_descops;
                    generalLiabilityInformation["Cost of the Largest Project in the past 5 years"] = gl_cost_proj_5years;
                    generalLiabilityInformation["Number of Field Employees"] = gl_no_field_emp;
                    generalLiabilityInformation["Payroll Amount"] = gl_payroll_amt;
                    generalLiabilityInformation["Are you using any subcontractor"] = gl_using_subcon;
                    generalLiabilityInformation["Subcontractor Cost"] = gl_using_subcon_if_set;
                    generalLiabilityInformation["# of Losses for the Past 5 Years"] = gl_no_losses_5years;
                    generalLiabilityInformation["Explain Losses (Please include loss amount)"] = gl_explain_losses_if_set;

                    // var generalLiabilityInformation = {
                    //     "Annual Gross Receipts": gl_annual_gross,
                    //     Profession: gl_profession,
                    //     Residential: gl_residential,
                    //     Commercial: gl_commercial,
                    //     "New Construction": gl_new_construction,
                    //     "Repair/Remodel": gl_repair_remodel,
                    //     "Detailed Description of Operations": gl_descops,
                    //     "Cost of the Largest Project in the past 5 years": gl_cost_proj_5years,
                    //     "Number of Field Employees": gl_no_field_emp,
                    //     "Payroll Amount": gl_payroll_amt,
                    //     "Are you using any subcontractor": gl_using_subcon,
                    //     "Subcontractor Cost": gl_using_subcon_if_set,
                    //     "# of Losses for the Past 5 Years": gl_no_losses_5years,
                    //     "Explain Losses (Please include loss amount)": gl_explain_losses_if_set,
                    // };

                    // var newConstructionHouses = generalLiabilityInformation["Additional Questions GL"]["New construction - How many houses will you be building for the whole year?"];
                    // var workOnADUHouses = generalLiabilityInformation["Additional Questions GL"]["Do you work on ADU houses?"];

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
                        "No. of Employees": wc_num_of_empl,
                    };

                    var workersCompensationInformation3 = {
                        Name: wc_name,
                        "Title / Relationship": wc_title_relationship,
                        "Ownership %": wc_ownership_perc,
                        "Excluded / Included": wc_exc_inc,
                        SSN: wc_ssn,
                        FEIN: wc_fein,
                        "Date of Birth": wc_dob,
                    };

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
                    var bond_effective_date = $("#bond_effective_date").val();

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
                        "Effective Date": bond_effective_date,
                    };

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
                        "No. of Losses for the Past 5 Years":
                            excess_no_losses_5years,
                        "Explain Losses": excess_explain_losses,
                        "Insurance Carrier": excess_insurance_carrier,
                        "Policy Number / Quote Number":
                            excess_policy_or_quote_no,
                        "Policy Premium": excess_policy_premium,
                        "Effective Date": excess_effective_date,
                        "Expiration Date": excess_expiration_date,
                    };

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
                        "No. of Losses for the Past 5 Years":
                            tools_no_losses_5years,
                        "If there's a loss, please explain":
                            tools_explain_losses,
                    };

                    // Builders Risk Step 1 & 2
                    var br_property_address = $("#br_property_address").val();
                    var br_value_of_existing_structure = $("#br_value_of_existing_structure").val();
                    var br_value_of_work_performed = $("#br_value_of_work_performed").val();
                    var br_period_duration_project = $("#br_period_duration_project").val();

                    var buildersRiskInformation = {
                        "Property Address": br_property_address,
                        "Value of Existing Structure":
                            br_value_of_existing_structure,
                        "Value of Work Being Performed":
                            br_value_of_work_performed,
                        "Period of Insurance/Duration of the Project":
                            br_period_duration_project,
                    };

                    // Business Owner's Policy Step 1 - 4
                    // BOP Step 1
                    var bop_property_address = $("#bop_property_address").val();
                    var bop_loss_payee_info = $("#bop_loss_payee_info").val();
                    var bop_building_industry = $("#bop_building_industry").val();
                    var bop_occupancy = $("#bop_occupancy").val();
                    var bop_val_cost_bldg = $("#bop_val_cost_bldg").val();
                    var bop_business_property_limit = $("#bop_business_property_limit").val();

                    // BOP Step 2
                    var bop_bldg_construction_type = $("#bop_bldg_construction_type option:selected").text();
                    var bop_year_built = $("#bop_year_built").val();
                    var bop_no_of_stories = $("#bop_no_of_stories").val();
                    var bop_total_bldg_sqft = $("#bop_total_bldg_sqft").val();

                    // BOP Step 3
                    var bop_automatic_sprinkler_system = $("#bop_automatic_sprinkler_system option:selected").text();
                    var bop_automatic_fire_alarm = $("#bop_automatic_fire_alarm option:selected").val();
                    var bop_distance_nearest_fire_hydrant = $("#bop_distance_nearest_fire_hydrant").val();
                    var bop_distance_nearest_fire_station = $("#bop_distance_nearest_fire_station").val();
                    var bop_automatic_comm_cooking_ext = $("#bop_automatic_comm_cooking_ext option:selected").text();

                    // BOP Step 4
                    var bop_automatic_burglar_alarm = $("#bop_automatic_burglar_alarm option:selected").text();
                    var bop_security_cameras = $("#bop_security_cameras option:selected").text();
                    var bop_last_update_roofing_year = $("#bop_last_update_roofing_year").val();
                    var bop_last_update_heating_year = $("#bop_last_update_heating_year").val();
                    var bop_last_update_plumbing_year = $("#bop_last_update_plumbing_year").val();
                    var bop_last_update_electrical_year = $("#bop_last_update_electrical_year").val();

                    var bopInformation = {
                        "Property Address": bop_property_address,
                        "Loss Payee Information": bop_loss_payee_info,
                        "Building Industry": bop_building_industry,
                        "Occupancy (Who owns the Building?)": bop_occupancy,
                        "Value of Cost of the Building?": bop_val_cost_bldg,
                        "What is the Business Property Limit?": bop_business_property_limit,
                        "Building Construction Type": bop_bldg_construction_type,
                        "Year Built": bop_year_built,
                        "No. of Stories": bop_no_of_stories,
                        "Total Building Sq. Ft.": bop_total_bldg_sqft,
                        "Automatic Sprinkler System": bop_automatic_sprinkler_system,
                        "Automatic Fire Alarm": bop_automatic_fire_alarm,
                        "Distance to Nearest Fire Hydrant": bop_distance_nearest_fire_hydrant,
                        "Distance to Nearest Fire Station": bop_distance_nearest_fire_station,
                        "Automatic Commercial Cooking Extinguishing System": bop_automatic_comm_cooking_ext,
                        "Automatic Burglar Alarm": bop_automatic_burglar_alarm,
                        "Security Cameras": bop_security_cameras,
                        "Last Update to Roofing Yr": bop_last_update_roofing_year,
                        "Last Update to Heating Yr": bop_last_update_heating_year,
                        "Last Update to Plumbing Yr": bop_last_update_plumbing_year,
                        "Last Update to Electrical Yr": bop_last_update_electrical_year,
                    }

                    // Commercial Property Step 1 - 3
                    // Commercial Property Step 1
                    var property_business_located = $("#property_business_located").val();
                    var property_property_address = $("#property_property_address").val();
                    var property_name_of_owner = $("#property_name_of_owner").val();
                    var property_value_cost_bldg = $("#property_value_cost_bldg").val();
                    var property_business_property_limit = $("#property_business_property_limit").val();

                    // Commercial Property Step 2
                    var property_does_have_more_than_one_location = $("#property_does_have_more_than_one_location option:selected").text();
                    var property_multiple_units = $("#property_multiple_units option:selected").text();
                    var property_construction_type = $("#property_construction_type").val();
                    var property_year_built = $("#property_year_built").val();
                    var property_no_of_stories = $("#property_no_of_stories").val();
                    var property_total_bldg_sqft = $("#property_total_bldg_sqft").val();
                    var property_is_bldg_equipped_with_fire_sprinklers = $("#property_is_bldg_equipped_with_fire_sprinklers option:selected").text();
                    var property_distance_nearest_fire_hydrant = $("#property_distance_nearest_fire_hydrant").val();
                    var property_distance_nearest_fire_station = $("#property_distance_nearest_fire_station").val();
                    var property_protection_class = $("#property_protection_class").val();

                    // Commercial Property Step 3
                    var property_protective_device = $("#property_protective_device").val();
                    var property_last_update_roofing_year = $("#property_last_update_roofing_year").val();
                    var property_last_update_heating_year = $("#property_last_update_heating_year").val();
                    var property_last_update_plumbing_year = $("#property_last_update_plumbing_year").val();
                    var property_last_update_electrical_year = $("#property_last_update_electrical_year").val();

                    var commercialPropertyInformation = {
                        "Business Location is Located in": property_business_located,
                        "Property Address": property_property_address,
                        "Name of the owner of the building": property_name_of_owner,
                        "Value of Cost of the Building": property_value_cost_bldg,
                        "What is the Business Property Limit": property_business_property_limit,
                        "Do you have more than one location": property_does_have_more_than_one_location,
                        "Are there multiple units (residential or commercial) in your building": property_multiple_units,
                        "Construction Type": property_construction_type,
                        "Year Built": property_year_built,
                        "No. of Stories": property_no_of_stories,
                        "Total Building Square Footage": property_total_bldg_sqft,
                        "Is your building equipped with fire sprinklers": property_is_bldg_equipped_with_fire_sprinklers,
                        "Distance to Nearest Fire Hydrant": property_distance_nearest_fire_hydrant,
                        "Distance to Nearest Fire Station": property_distance_nearest_fire_station,
                        "Protection Class": property_protection_class,
                        "Select any protective devices you have": property_protective_device,
                        "Last Update to Roofing Year": property_last_update_roofing_year,
                        "Last Update to Heating Year": property_last_update_heating_year,
                        "Last Update to Plumbing Year": property_last_update_plumbing_year,
                        "Last Update to Electrical Year": property_last_update_electrical_year,
                    }

                    // Errors and Omission Step 1 - 5
                    // EO Step 1
                    var eo_requested_limits = $("#eo_requested_limits option:selected").text();
                    var eo_reqlimit_if_others = $("#eo_reqlimit_if_others").val();
                    var eo_request_deductible = $("#eo_request_deductible option:selected").text();
                    var eo_reqdeductible_if_others = $("#eo_reqdeductible_if_others").val();
                    // EO Step 2
                    var eo_business_entity_q1 = $("#eo_business_entity_q1 option:selected").text();
                    var eo_business_entity_q2 = $("#eo_business_entity_q2 option:selected").text();
                    var eo_business_entity_q3 = $("#eo_business_entity_q3 option:selected").text();
                    var eo_business_entity_q4 = $("#eo_business_entity_q4 option:selected").text();
                    var eo_business_entity_q5 = $("#eo_business_entity_q5 option:selected").text();
                    // EO Step 3
                    var eo_number_employee = $("#eo_number_employee").val();
                    var eo_full_time = $("#eo_full_time").val();
                    var eo_ftime_salary_range = $("#eo_ftime_salary_range").val();
                    var eo_part_time = $("#eo_part_time").val();
                    var eo_ptime_salary_range = $("#eo_ptime_salary_range").val();
                    // EO Step 4
                    var eo_emp_practice_q1 = $("#eo_emp_practice_q1 option:selected").text();
                    // EO Step 5
                    var eo_hr_q1 = $("#eo_hr_q1 option:selected").text();
                    var eo_hr_q2 = $("#eo_hr_q2 option:selected").text();
                    var eo_hr_q3 = $("#eo_hr_q3 option:selected").text();
                    var eo_hr_q4 = $("#eo_hr_q4 option:selected").text();

                    var errorsEmissionInformation = {
                        "Requested Limits": eo_requested_limits,
                        "If Others, Please indicate": eo_reqlimit_if_others,
                        "Requested Deductible (Per Claim)": eo_request_deductible,
                        "If Others, Please indicate": eo_reqdeductible_if_others,
                        "Has the name or ownership of the entity changed within the last 5 years": eo_business_entity_q1,
                        "Has any other business been purchased merged or consolidated with the entity within the last 5 years": eo_business_entity_q2,
                        "Does any other entity own or control your business": eo_business_entity_q3,
                        "Has your company name been changed during the past 5 years": eo_business_entity_q4,
                        "Has any other business purchased, merged or consolidated with you during the past 5 years": eo_business_entity_q5,
                        "Number of Employees": eo_number_employee,
                        "Full Time": eo_full_time,
                        "Full Time Salary Range": eo_ftime_salary_range,
                        "Part Time": eo_part_time,
                        "Part Time Salary Range": eo_ptime_salary_range,
                        "Has the applicant total number of employees decreased by more than ten percent (10) due to lay off, force reduction of closing of division in the past 1 year": eo_emp_practice_q1,
                        "Does the Applicant have written employment agreements with all officers": eo_hr_q1,
                        "Does the Applicant have its employment policies/procedures reviewed by labor or employment counsel": eo_hr_q2,
                        "Does the Applicant have a Human Resources or Personnel Department": eo_hr_q3,
                        "Does the Applicant have an employee handbook": eo_hr_q4
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
                    if (pollution_using_subcon === "Yes") {
                        var pollution_subcon_cost = $("#pollution_subcon_cost").val();
                        var pollution_using_subcon_if_set = pollution_subcon_cost;
                    } else {
                        var pollution_using_subcon_if_set = "";
                    }
                    var pollution_no_losses_5years = $("#pollution_no_losses_5years").val();
                    if (pollution_no_losses_5years >= 0) {
                        var pollution_explain_losses = $("#pollution_explain_losses").val();
                        var pollution_explain_losses_if_set = pollution_explain_losses;
                    } else {
                        var pollution_explain_losses_if_set = "";
                    }

                    var pollutionLiabilityInformation = {
                        Profession: pollution_profession,
                        Residential: pollution_residential,
                        Commercial: pollution_commercial,
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
                        "Explain Losses (Please include loss amount)": pollution_explain_losses_if_set,
                    };

                    // EPLI Step 1 - 6
                    // EPLI Step 1
                    var epli_fein = $("#epli_fein").val();
                    var epli_current_epli = $("#epli_current_epli").val();
                    var epli_prior_carrier = $("#epli_prior_carrier").val();
                    var epli_prior_carrier_epli = $("#epli_prior_carrier_epli").val();
                    var epli_effective_date = $("#epli_effective_date").val();
                    var epli_prev_premium_amount = $("#epli_prev_premium_amount").val();
                    var epli_deductible_amount = $("#epli_deductible_amount").val();

                    // EPLI Step 2
                    var epli_full_time = $("#epli_full_time").val();
                    var epli_part_time = $("#epli_part_time").val();
                    var epli_independent_contractors = $("#epli_independent_contractors").val();
                    var epli_volunteers = $("#epli_volunteers").val();
                    var epli_leased_seasonal = $("#epli_leased_seasonal").val();
                    var epli_non_us_base_emp = $("#epli_non_us_base_emp").val();
                    var epli_total_employees = $("#epli_total_employees").val();

                    // EPLI Stepo 3
                    var epli_located_at_ca = $("#epli_located_at_ca").val();
                    var epli_located_at_ga = $("#epli_located_at_ga").val();
                    var epli_located_at_tx = $("#epli_located_at_tx").val();
                    var epli_located_at_fl = $("#epli_located_at_fl").val();
                    var epli_located_at_ny = $("#epli_located_at_ny").val();
                    var epli_located_at_nj = $("#epli_located_at_nj").val();

                    // EPLI Step 4
                    var epli_salary_range_q1 = $("#epli_salary_range_q1").val();
                    var epli_salary_range_q2 = $("#epli_salary_range_q2").val();
                    var epli_salary_range_q3 = $("#epli_salary_range_q3").val();

                    // EPLI Ste 5
                    var epli_emp_terminated_last_12_months_q1 = $("#epli_emp_terminated_last_12_months_q1").val();
                    var epli_emp_terminated_last_12_months_q2 = $("#epli_emp_terminated_last_12_months_q2").val();
                    var epli_emp_terminated_last_12_months_q3 = $("#epli_emp_terminated_last_12_months_q3").val();

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
                        "EPLI - Full Time": epli_full_time,
                        "Part Time": epli_part_time,
                        "Independent Contractors": epli_independent_contractors,
                        "Volunteers": epli_volunteers,
                        "Leased or Seasonal": epli_leased_seasonal,
                        "Non-US base Emp.": epli_non_us_base_emp,
                        "Total Employees": epli_total_employees,
                        "CA": epli_located_at_ca,
                        "GA": epli_located_at_ga,
                        "TX": epli_located_at_tx,
                        "FL": epli_located_at_fl,
                        "NY": epli_located_at_ny,
                        "NJ": epli_located_at_nj,
                        "Up to $60,000": epli_salary_range_q1,
                        "$60,000 - $120,000": epli_salary_range_q2,
                        "Over $120,000": epli_salary_range_q3,
                        "Voluntary": epli_emp_terminated_last_12_months_q1,
                        "Involuntary": epli_emp_terminated_last_12_months_q2,
                        "Laid-Off": epli_emp_terminated_last_12_months_q3,
                        "Does the Applicant have a standard employment application for all applicants": epli_hr_q1,
                        "Does the Applicant have an 'At Will' provision in the employment application": epli_hr_q2,
                        "Does the Applicant have an employment handbook": epli_hr_q3,
                        "Does the Applicant have a written policy with respect to sexual harassment": epli_hr_q4,
                        "Does the Applicant have a written policy with respect to discrimination": epli_hr_q5,
                        "Does the Applicant have written annual evaluations for employees": epli_hr_q6,
                    }

                    // Cyber Step 1-2
                    // Cyber Step 1
                    var cyber_it_contact_name = $("#cyber_it_contact_name").val();
                    var cyber_it_contact_number = $("#cyber_it_contact_number").val();
                    var cyber_it_contact_email = $("#cyber_it_contact_email").val();

                    // Cyber Step 2
                    var cyber_engaged_business_activities = $("#cyber_engaged_business_activities option:selected").text();
                    var cyber_q1 = $("#cyber_q1 option:selected").text();
                    var cyber_q2 = $("#cyber_q2 option:selected").text();
                    var cyber_q3 = $("#cyber_q3 option:selected").text();
                    var cyber_q4 = $("#cyber_q4 option:selected").text();
                    var cyber_q5 = $("#cyber_q5 option:selected").text();
                    var cyber_q6 = $("#cyber_q6 option:selected").text();
                    var cyber_q7 = $("#cyber_q7 option:selected").text();

                    var cyberLiabilityInformation = {
                        "IT Contact Name": cyber_it_contact_name,
                        "IT Contact Number": cyber_it_contact_number,
                        "IT Contact Email": cyber_it_contact_email,
                        "Are you engaged in any of the following business activities?": cyber_engaged_business_activities,
                        "Is there a system in place for verifying fund and wire transfers over $25,000 through a secondary means of communication prior to execution?": cyber_q1,
                        "Do you store your backups offline or with a cloud service provider?": cyber_q2,
                        "Do you store or process personal, health, or credit card information of more than 500,000 Individuals?": cyber_q3,
                        "Do you enabled multi-factor authentication for email access and remote network access?": cyber_q4,
                        "Do you encrypt all sensitive information at rest?": cyber_q5,
                        "Any relevant claims or incidents exceeding $10,000 within the past three years?": cyber_q6,
                        "Would there be any potential Cyber Event, Loss, or claim that could fall within the scope of the policy you are applying for?": cyber_q7,
                    }

                    // Installation Floater Step 1 - 5
                    var instfloat_territory_of_operation = $("#instfloat_territory_of_operation").val();
                    var instfloat_type_of_operation = $("#instfloat_type_of_operation").val();
                    var instfloat_scheduled_type_of_equipment = $("#instfloat_scheduled_type_of_equipment").val();
                    var instfloat_deductible_amount = $("#instfloat_deductible_amount").val();
                    var instfloat_location = $("#instfloat_location").val();
                    var instfloat_months_in_storage = $("#instfloat_months_in_storage").val();
                    var instfloat_max_value_of_equipment = $("#instfloat_max_value_of_equipment").val();
                    var instfloat_max_value_of_bldg_storage = $("#instfloat_max_value_of_bldg_storage").val();
                    var instfloat_type_security_placed = $("#instfloat_type_security_placed").val();
                    var instfloat_unscheduled_type_of_equipment = $("#instfloat_unscheduled_type_of_equipment").val();
                    var instfloat_unscheduled_max_value_equipment_storing = $("#instfloat_unscheduled_max_value_equipment_storing").val();
                    var instfloat_additional_info_q1 = $("#instfloat_additional_info_q1").val();
                    var instfloat_additional_info_q2 = $("#instfloat_additional_info_q2").val();
                    var instfloat_additional_info_q3 = $("#instfloat_additional_info_q3").val();
                    var instfloat_additional_info_q4 = $("#instfloat_additional_info_q4").val();

                    var instFloatInformation = {
                        "Territory of Operation": instfloat_territory_of_operation,
                        "Type of Operation": instfloat_type_of_operation,
                        "Type of Equipment / materials you will be working with": instfloat_scheduled_type_of_equipment,
                        "Deductible Amount": instfloat_deductible_amount,
                        "Location": instfloat_location,
                        "Months in storage": instfloat_months_in_storage,
                        "Maximum Value of equipment that you will be storing": instfloat_max_value_of_equipment,
                        "Maximum Value of Building storage": instfloat_max_value_of_bldg_storage,
                        "Type of Security in place withing the storage building": instfloat_type_security_placed,
                        "Type of Equipment / materials you will be working with": instfloat_unscheduled_type_of_equipment,
                        "Maximum Value of equipment that you will be storing": instfloat_unscheduled_max_value_equipment_storing,
                        "Equipment Rented. Loaned to / from Others with or without Operators?": instfloat_additional_info_q1,
                        "Are you Operating Equipment not listed here?": instfloat_additional_info_q2,
                        "Property used underground?": instfloat_additional_info_q3,
                        "Any work done afloat?": instfloat_additional_info_q4,
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
                        "Owner’s Phone Number": ayc_phone_number,
                    };

                    function generateAllHTML(targetDiv, informationObjects) {
                        var htmlString = "";

                        // Loop through each information object
                        informationObjects.forEach(function (informationObject) {
                            for (var info in informationObject) {
                                var value = informationObject[info];

                                if (value) {
                                    if (info === "Building Construction Type") {
                                        // Add an <h6> tag before this specific field
                                        htmlString += "<h6><strong>What is the property contents?</strong></h6>";
                                        // Use <p> tags for the field name and its value
                                        htmlString += "<p>Building Construction Type: <strong>" + value + "</strong></p>";
                                    } else if (info === "Automatic Sprinkler System") {
                                        htmlString += "<h6><strong>Protective Safeguards - Fire:</strong></h6>";
                                        htmlString += "<p>Automatic Sprinkler System: <strong>" + value + "</strong></p>";
                                    } else if (info === "Automatic Burglar Alarm") {
                                        htmlString += "<h6><strong>Protective Safeguards - Burglary and Robbery:</strong></h6>";
                                        htmlString += "<p>Automatic Burglar Alarm: <strong>" + value + "</strong></p>";
                                    } else if (info === "Has the name or ownership of the entity changed within the last 5 years") {
                                        htmlString += "<h6><strong>Business Entity:</strong></h6>";
                                        htmlString += "<p>Has the name or ownership of the entity changed within the last 5 years?: <strong>" + value + "</strong></p>";
                                    } else if (info === "Number of Employees") {
                                        htmlString += "<h6><strong>Employees:</strong></h6>";
                                        htmlString += "<p>Number of Employees: <strong>" + value + "</strong></p>";
                                    } else if (info === "Has the applicant total number of employees decreased by more than ten percent (10) due to lay off, force reduction of closing of division in the past 1 year") {
                                        htmlString += "<h6><strong>Employment Practices:</strong></h6>";
                                        htmlString += "<p>Has the applicant total number of employees decreased by more than ten percent (10) due to lay off, force reduction of closing of division in the past 1 year?: <strong>" + value + "</strong></p>";
                                    } else if (info === "Does the Applicant have written employment agreements with all officers") {
                                        htmlString += "<h6><strong>Human Resources:</strong></h6>";
                                        htmlString += "<p>Does the Applicant have written employment agreements with all officers?: <strong>" + value + "</strong></p>";
                                    } else if (info === "EPLI - Full Time") {
                                        htmlString += "<h6><strong>How many employees are:</strong></h6>";
                                        htmlString += "<p>Full Time: <strong>" + value + "</strong></p>";
                                    } else if (info === "CA") {
                                        htmlString += "<h6><strong>How many employees are located at:</strong></h6>";
                                        htmlString += "<p>CA: <strong>" + value + "</strong></p>";
                                    } else if (info === "Up to $60,000") {
                                        htmlString += "<h6><strong>How many percent of employees are in the salary range of:</strong></h6>";
                                        htmlString += "<p>Up to $60,000: <strong>" + value + "</strong></p>";
                                    } else if (info === "Voluntary") {
                                        htmlString += "<h6><strong>How many employees have been terminated in the last 12 months:</strong></h6>";
                                        htmlString += "<p>Voluntary: <strong>" + value + "</strong></p>";
                                    }
                                    else if (typeof value === 'object') {
                                        // If it's an object, iterate through its properties and format them
                                        htmlString += "<h6><strong>" + info + ":</strong></h6>";
                                        for (var subInfo in value) {
                                            htmlString += "<p>" + subInfo + ": <strong>" + value[subInfo] + "</strong></p>";
                                        }
                                    }
                                    else {
                                        // For other fields, use <p> tags
                                        htmlString += "<p>" + info + ": <strong>" + value + "</strong></p>";
                                    }
                                }
                            }
                        });

                        // Check if the targetDiv is the installation floater section
                        if (targetDiv === "#instfloat_liability_details") {
                            // Call generateScheduledEquipmentHTML to get scheduled equipment data
                            var scheduledEquipmentHTML = generateScheduledEquipmentHTML();
                            // Append the scheduled equipment HTML to the existing HTML
                            htmlString += scheduledEquipmentHTML;
                        }

                        // Update the targetDiv with the combined HTML
                        $(targetDiv).html(htmlString);
                    }

                    generateAllHTML("#personal_information_details", [personalInformation]);
                    generateAllHTML("#gl_information_details", [generalLiabilityInformation]);
                    generateAllHTML("#wc_details_2", [workersCompensationInformation2]);
                    generateAllHTML("#wc_details_3", [workersCompensationInformation3]);
                    generateAllHTML("#license_bond_details", [contractorLicenseBondInformation]);
                    generateAllHTML("#excess_liability_details", [excessLiabilityInformation]);
                    generateAllHTML("#tools_equipment_details", [toolsEquipmentInformation]);
                    generateAllHTML("#builders_risk_details", [buildersRiskInformation]);
                    generateAllHTML("#bop_details", [bopInformation]);
                    generateAllHTML("#commercial_property_details", [commercialPropertyInformation]);
                    generateAllHTML("#error_emissions_details", [errorsEmissionInformation]);
                    generateAllHTML("#pollution_liability_details", [pollutionLiabilityInformation]);
                    generateAllHTML("#epli_liability_details", [epliInformation]);
                    generateAllHTML("#cyber_liability_details", [cyberLiabilityInformation]);
                    generateAllHTML("#instfloat_liability_details", [instFloatInformation]);
                    generateAllHTML("#about_your_company_details", [aboutYourCompanyInformation]);

                    $("#process").on("click", function (e) {
                        e.preventDefault();
                        var commonData = {};
                        var productData = {};

                        // Gather data for commonData from #personal_information_step and #about_your_company_step
                        $("#personal_information_step, #about_your_company_step")
                            .find("input, select, textarea")
                            .each(function () {
                                commonData[this.name] = $(this).val();
                            });

                        // Serialize products data into an object
                        $('input[name="question_1[]"]:checked').each(function () {
                            var productKey = $(this).val();
                            productData[productKey] = {};

                            $("div[id^='" + productKey + "_step_']")
                                .find("input, select, textarea")
                                .each(function () {
                                    productData[productKey][this.name] = $(this).val();
                                });
                        });

                        // Send the data
                        axios({
                            method: "post",
                            url: "/quote-form-submit",
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                                "Content-Type": "application/json",
                            },
                            data: {
                                common: commonData,
                                products: productData
                            }
                        })
                        .then(response => {
                            document.getElementById("loader_form").style.display = "none";
                            if (response.data.redirect) {
                                window.location.href = response.data.redirect;
                            } else {
                                toastr.success(response.data.message);
                                window.open("/thankyou", "_blank");
                                location.reload();
                            }
                        })
                        .catch(error => {
                            // Error logic
                            document.getElementById("loader_form").style.display = "none";
                            if (error.response && error.response.data) {
                                toastr.error(error.response.data.message);
                            } else {
                                toastr.error("An error occurred");
                            }
                        });
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

    function hideSteps(checkboxValue) {
        switch (checkboxValue) {
            case "gl":
                $("#gl_step_1, #gl_step_2, #glDetailsContainer").removeClass("step wizard-step").addClass("hidden");
                $("#gl_step_1, #gl_step_2").find("input").val("");
                $("#gl_step_1, #gl_step_2").find("select").val("");
                // textarea
                $("#gl_step_1, #gl_descops").val("");
                $("#gl_step_2, #gl_explain_losses").val("");
                // ajax container
                $("#gl_step_2").find("#gl_subcon_cost_container").val("");
                break;

            case "wc":
                $("#wc_step_1, #wc_step_2, #wcDetailsContainer").removeClass("step wizard-step").addClass("hidden");
                $("#wc_step_1, #wc_step_2").find("input").val("");
                $("#wc_step_1, #wc_step_2").find("select").val("");

                // ajax container
                $("#wc_step_1, #wc_step_2").find("#profession_entry_container").empty();
                $("#wc_step_1, #wc_step_2").find("#wc_subcon_cost_year_container").empty();
                break;

            case "auto":
                $("#auto_step_1, #auto_step_2, #autoDetailsContainer").removeClass("step wizard-step").addClass("hidden");
                $("#auto_step_1, #auto_step_2").find("input").val("");
                $("#auto_step_1, #auto_step_2").find("select").val("");

                // ajax container
                $("#auto_step_1").find("#auto_vehicles_container").empty();
                $("#auto_step_2").find("#auto_drivers_container").empty();
                break;

            case "bond":
                $("#bond_step_1, #bond_step_2, #bondDetailsContainer").removeClass("step wizard-step").addClass("hidden");
                $("#bond_step_1, #bond_step_2").find("input").val("");
                $("#bond_step_1, #bond_step_2").find("select").val("");

                // ajax container
                $("#bond_step_1").find("#bond_owner_if_married_container").empty();
                $("#bond_step_2").find("#bond_license_type_if_others_container").empty();
                break;

            case "excess":
                $("#excess_step_1, #excess_step_2, #excessDetailsContainer").removeClass("step wizard-step").addClass("hidden");
                $("#excess_step_1, #excess_step_2").find("input").val("");
                $("#excess_step_1, #excess_step_2").find("select").val("");

                // ajax container
                $("#excess_step_1").find("#excess_no_losses_5years_container").empty();
                break;

            case "tools":
                $("#tools_step_1, #toolsDetailsContainer").removeClass("step wizard-step").addClass("hidden");
                $("#tools_step_1").find("input").val("");
                $("#tools_step_1").find("select").val("");

                // ajax container
                $("#tools_step_1").find("#tools_no_losses_5years_container").empty();
                break;

            case "br":
                $("#br_step_1, #brDetailsContainer").removeClass("step wizard-step").addClass("hidden");
                $("#br_step_1").find("input").val("");
                $("#br_step_1").find("select").val("");
                break;

			case 'bop':
				$('#bop_step_1, #bop_step_2, #bop_step_3, #bop_step_4, #bopDetailsContainer').removeClass('step wizard-step').addClass('hidden');
				$('#bop_step_1').find('input').val('');
				$('#bop_step_1').find('select').val('');

				$('#bop_step_2').find('input').val('');
				$('#bop_step_2').find('select').val('');

				$('#bop_step_3').find('input').val('');
				$('#bop_step_3').find('select').val('');

				$('#bop_step_4').find('input').val('');
				$('#bop_step_4').find('select').val('');
				break;

            case 'comm_prop':
                $('#property_step_1, #property_step_2, #property_step_3, #cpDetailsContainer').removeClass('step wizard-step').addClass('hidden');
				$('#property_step_1').find('input').val('');
				$('#property_step_1').find('select').val('');

				$('#property_step_2').find('input').val('');
				$('#property_step_2').find('select').val('');

				$('#property_step_3').find('input').val('');
				$('#property_step_3').find('select').val('');
                break;

            case 'eo':
                $('#eo_step_1, #eo_step_2, #eo_step_3, #eo_step_4, #eo_step_5, #eoDetailsContainer').removeClass('step wizard-step').addClass('hidden');
				$('#eo_step_1').find('input').val('');
				$('#eo_step_1').find('select').val('');

				$('#eo_step_2').find('input').val('');
				$('#eo_step_2').find('select').val('');

				$('#eo_step_3').find('input').val('');
				$('#eo_step_3').find('select').val('');

				$('#eo_step_4').find('input').val('');
				$('#eo_step_4').find('select').val('');

				$('#eo_step_5').find('input').val('');
				$('#eo_step_5').find('select').val('');
				break;

            case "pollution":
                $("#pollution_step_1, #pollution_step_2, #pollutionDetailsContainer").removeClass("step wizard-step").addClass("hidden");
                $("#pollution_step_1, #pollution_step_2").find("input").val("");
                $("#pollution_step_1, #pollution_step_2").find("select").val("");
                // textarea
                $("#pollution_step_1, #pollution_descops").val("");
                $("#pollution_step_2, #pollution_explain_losses").val("");
                // ajax container
                $("#pollution_step_2").find("#pollution_subcon_cost_container").val("");
                break;

			case 'epli':
				$('#epli_step_1, #epli_step_2, #epli_step_3, #epli_step_4, #epli_step_5, #epli_step_6, #epliDetailsContainer').removeClass('step wizard-step').addClass('hidden');
				$('#epli_step_1').find('input').val('');
				$('#epli_step_1').find('select').val('');

				$('#epli_step_2').find('input').val('');
				$('#epli_step_2').find('select').val('');

				$('#epli_step_3').find('input').val('');
				$('#epli_step_3').find('select').val('');

				$('#epli_step_4').find('input').val('');
				$('#epli_step_4').find('select').val('');

				$('#epli_step_5').find('input').val('');
				$('#epli_step_5').find('select').val('');

				$('#epli_step_6').find('input').val('');
				$('#epli_step_6').find('select').val('');
				break;

            case 'cyber':
                $('#cyber_step_1, #cyber_step_2, #cyberDetailsContainer').removeClass('step wizard-step').addClass('hidden');
				$('#cyber_step_1').find('input').val('');
				$('#cyber_step_1').find('select').val('');

				$('#cyber_step_2').find('input').val('');
				$('#cyber_step_2').find('select').val('');
                break;

            case 'instfloat':
                $('#instfloat_step_1, #instfloat_step_2, #instfloat_step_3, #instfloat_step_4, #instfloat_step_5, #instfloatDetailsContainer').removeClass('step wizard-step').addClass('hidden');
				$('#instfloat_step_1').find('input').val('');
				$('#instfloat_step_1').find('select').val('');

				$('#instfloat_step_2').find('input').val('');
				$('#instfloat_step_2').find('select').val('');

				$('#instfloat_step_3').find('input').val('');
				$('#instfloat_step_3').find('select').val('');

				$('#instfloat_step_4').find('input').val('');
				$('#instfloat_step_4').find('select').val('');

				$('#instfloat_step_5').find('input').val('');
				$('#instfloat_step_5').find('select').val('');
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
			case 'bop':
				$('#bop_step_1, #bop_step_2, #bop_step_3, #bop_step_4, #bopDetailsContainer').addClass('step wizard-step').removeClass('hidden');
				break;
            case 'comm_prop':
                $('#property_step_1, #property_step_2, #property_step_3, #cpDetailsContainer').addClass('step wizard-step').removeClass('hidden');
				break;
            case 'eo':
                $('#eo_step_1, #eo_step_2, #eo_step_3, #eo_step_4, #eo_step_5, #eoDetailsContainer').addClass('step wizard-step').removeClass('hidden');
				break;
			case 'pollution':
				$('#pollution_step_1, #pollution_step_2, #pollutionDetailsContainer').addClass('step wizard-step').removeClass('hidden');
				break;
			case 'epli':
				$('#epli_step_1, #epli_step_2, #epli_step_3, #epli_step_4, #epli_step_5, #epli_step_6, #epliDetailsContainer').addClass('step wizard-step').removeClass('hidden');
				break;
			case 'cyber':
				$('#cyber_step_1, #cyber_step_2, #cyberDetailsContainer').addClass('step wizard-step').removeClass('hidden');
				break;
			case 'instfloat':
				$('#instfloat_step_1, #instfloat_step_2, #instfloat_step_3, #instfloat_step_4, #instfloat_step_5, #instfloatDetailsContainer').addClass('step wizard-step').removeClass('hidden');
				break;
        }
    }

    localStorage.clear();
    $('input[name="question_1[]"]').each(function () {
        var checkboxValue = $(this).val();
        var checkboxState = localStorage.getItem(checkboxValue);
        if (checkboxState === null) {
            checkboxState = "unchecked";
            localStorage.setItem(checkboxValue, checkboxState);
        }
        $(this).prop("checked", checkboxState === "checked");
        if (checkboxState === "checked") {
            showSteps(checkboxValue);
        } else {
            hideSteps(checkboxValue);
        }
    });

    $('input[name="question_1[]"]').change(function () {
        var checkboxValue = $(this).val();
        var isChecked = $(this).is(":checked");
        localStorage.setItem(checkboxValue, isChecked ? "checked" : "unchecked");
        if (isChecked) {
            showSteps(checkboxValue);
        } else {
            hideSteps(checkboxValue);
        }
    });

    $.fn.feinFormat = function () {
        return this.on("input blur", function () {
            var origString = $(this).val();
            var trimmedString = origString.replace(/[^0-9]/g, "").slice(0, 9);
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
            var trimmedString = origString.replace(/[^0-9]/g, "").slice(0, 9);
            if (trimmedString.length === 9) {
                var specialString = "-";
                var newString1 = trimmedString.substring(0, 3) + specialString;
                var newString2 = trimmedString.substring(3, 5) + specialString;
                var newString =
                    newString1 + newString2 + trimmedString.substring(5);
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
        var formatter = new Intl.NumberFormat("en-US", {
            style: "currency",
            currency: "USD",
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        });
        return formatter.format(number);
    }

    function datePickerFormatter(selector) {
        $(selector).addClass('readonly').attr('readonly', 'readonly');
        $(selector).datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: '-1d',
            yearRange: '1950:' + new Date().getFullYear(),
            showAnim: "slideDown",
        });
    }

    function yearPickerFormatter(selector) {
        $(selector).addClass('readonly').attr('readonly', 'readonly');
        if(!$(selector).hasClass('hasDatepicker')) {
            $(selector).datepicker({
                changeYear: true, // This allows changing the year
                showButtonPanel: true, // Shows the buttons at the bottom
                dateFormat: 'yy', // Sets the format to only display the year
                yearRange: '1900:' + new Date().getFullYear(), // For example, if you want a range from 1900 to the current year.
                beforeShow: function (input, inst) {
                    setTimeout(function () {
                        inst.dpDiv.css({
                            top: $(input).offset().top + $(input).outerHeight(),
                            left: $(input).offset().left
                        });
                        $(".ui-datepicker-calendar").hide();
                        $(".ui-datepicker-month").hide();
                    }, 0);
                },
                onClose: function(dateText, inst) {
                    var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                    $(selector).val(year);
                }
            });

            // Hide month calendar and dropdown
            $(selector).focus(function(){
                $(".ui-datepicker-calendar").hide();
                $(".ui-datepicker-month").hide();
            });
        }
    }

    let equipmentCount = 1;
    function appendNewSchedEquipmentEntry(selector) {

        $(selector).on("click", function (e) {
            e.preventDefault();
            if (equipmentCount < 5) {
                equipmentCount++;
                showScheduledEquipmentEntry(equipmentCount);
                datePickerFormatter("#instfloat_scheduled_equipment_date_purchased_" + equipmentCount);
            }
        });
    }

    function updateEquipmentEntryNames() {
        if (equipmentCount >= 5) {
            return false;
        }
        $(".equipment-entry").each(function(index, element) {
            let newIndex = index + 2;  // +1 because indexing starts at 0 and +1 because you have the original entry
            $(element).find("h6").text(`Scheduled Equipment ${newIndex}`);
            $(element).find("input, select").each(function() {
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

    function getStateByZipcode() {
        const zipcode = $('#zipcode').val();
        if (zipcode) {
            axios.get(`/api/get-state-by-zipcode/${zipcode}`)
            .then(function(response) {
                $('#city').val(response.data.state.city);
                $("#states").val(response.data.state.state_abbr).change();
                // console.log(response.data.state.state_abbr);
            })
            .catch(function(error) {
                console.error("Error fetching state by zipcode:", error);
            });
        }
    }

    function perfectCurrencyFormatter(selector) {
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

    // Function to run after page refresh
    function clearSessionData() {
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/clear-session-data', // Update this with your Laravel route
            method: 'POST',
            headers: {
                "X-CSRF-TOKEN": csrfToken
            },
            success: function (response) {
                // console.log('Clear Session Variable Message: ' + response.message);
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    }

    // Attach the function to the window.onload event
    window.onload = clearSessionData;

    function setSessionVariable(data) {
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        // console.log('Data:', data); // Log the value of 'data'
        // console.log('CSRF Token:', csrfToken); // Log the CSRF token
        $.ajax({
            url: '/set-session-variable',
            method: 'POST',
            headers: {
                "X-CSRF-TOKEN": csrfToken
            },
            data: { doesGLandWCChecked: data }, // Replace 'yourData' with the actual data key
            success: function (response) {
                // console.log('Set Session Variable Message: ' + response.message);
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    }

    function unsetSessionVariable() {
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/unset-session-variable',
            method: 'POST',
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                // console.log('Unset Session Variable Message: ' + response.message);
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    }

    function getCheckboxValue() {
        var glChecked = false;
        var wcChecked = false;

        // Listen for changes in checkbox state
        $('input[name="question_1[]"]').change(function () {
            var checkboxValue = $(this).val();
            if ($(this).is(":checked")) {
                localStorage.setItem(checkboxValue, "checked");
                if (checkboxValue === 'gl') {
                    glChecked = true;
                } else if (checkboxValue === 'wc') {
                    wcChecked = true;
                }
            } else {
                localStorage.setItem(checkboxValue, "unchecked");
                if (checkboxValue === 'gl') {
                    glChecked = false;
                } else if (checkboxValue === 'wc') {
                    wcChecked = false;
                }
            }

            // Check if both 'gl' and 'wc' checkboxes are checked
            if (glChecked && wcChecked) {
                console.log('Both "gl" and "wc" checkboxes are checked.');


                // $('#gl_no_field_emp, #wc_num_of_empl').on('input', function() {
                //     let currentValue = $(this).val();
                //     console.log(currentValue);
                //     if ($(this).attr('id') === 'gl_no_field_emp') {
                //         // $('#wc_num_of_empl').val(currentValue);
                //         $('#wc_no_of_profession').find('option[value="' + currentValue + '"]').prop('selected', true);
                //         $('#wc_no_of_profession').trigger('change');
                //     } else {
                //         $('#gl_no_field_emp').val(currentValue);
                //     }
                // });

                setSessionVariable(false); // Replace 'yourDataValue' with the actual data you want to pass
                $("#wc_step_1").load(location.href + " #wc_step_1");

                // Add your code to execute when both checkboxes are checked here
                // $('#gl_annual_gross, #wc_gross_receipt').on('input', function() {
                //     let currentValue = $(this).val();
                //     // Call the function with your desired data
                //     // console.log(currentValue);
                //     if ($(this).attr('id') === 'gl_annual_gross') {
                //         $('#wc_gross_receipt').val(formatAsCurrency(currentValue));
                //     } else {
                //         $('#gl_annual_gross').val(formatAsCurrency(currentValue));
                //     }
                // });

                // $('#gl_no_field_emp, #wc_num_of_empl').on('input', function() {
                //     let currentValue = $(this).val();
                //     // console.log(currentValue);
                //     if ($(this).attr('id') === 'gl_no_field_emp') {
                //         $('#wc_num_of_empl').val(currentValue);
                //     } else {
                //         $('#gl_no_field_emp').val(currentValue);
                //     }
                // });

                // console.log($("#gl_no_field_emp").val());
                // console.log($("#wc_no_of_profession").val());

                // $("#gl_no_field_emp", "#wc_no_of_profession").on('change', function() {
                //     const gl_no_field_emp = $("#gl_no_field_emp").val();
                //     console.log(gl_no_field_emp);
                //     const wc_no_of_profession = $("#wc_no_of_profession").val();
                //     console.log(wc_no_of_profession);
                //     // let currentValue = $(this).val();
                //     // console.log(currentValue);
                //     // if ($(this).attr('id') === 'gl_no_field_emp') {
                //     //     // $('#wc_no_of_profession').val(currentValue);
                //     //     $('#wc_no_of_profession').find('option[value="' + currentValue + '"]').prop('selected', true);
                //     // } else {
                //     //     $('#gl_no_field_emp').val(currentValue);
                //     // }
                // });


            } else {
                unsetSessionVariable();
                setSessionVariable(true);
                $("#wc_step_1").load(location.href + " #wc_step_1");
            }
        });
    }

    function showSubconContainerForGL() {
        $("#gl_subcon_cost_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="gl_subcon_cost" id="gl_subcon_cost" class="form-control" placeholder="">
                    <label for="gl_subcon_cost">Subcontractor Cost</label>
                </div>
            </div>
        `);
    }

    function showSubconContainerForPollution() {
        $("#pollution_subcon_cost_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="pollution_subcon_cost" id="pollution_subcon_cost" class="form-control" placeholder="">
                    <label for="pollution_subcon_cost">Subcontractor Cost</label>
                </div>
            </div>
        `);
    }

    function showWCSubconCostYearContainer() {
        $("#wc_subcon_cost_year_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="wc_subcon_cost_year" id="wc_subcon_cost_year" class="form-control" placeholder="">
                    <label for="wc_subcon_cost_year">Subcontractor cost in a year</label>
                </div>
            </div>
        `);
    }

    function showGLNoOfLossesContainer() {
        $("#gl_explain_losses_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <textarea style="resize: none;" name="gl_explain_losses" id="gl_explain_losses" class="form-control" placeholder="Please explain"></textarea>
                    <label for="gl_explain_losses">Explain Losses (Please include loss amount)</label>
                </div>
            </div>
        `);
    }

    function showPollutionNoOfLossesContainer() {
        $("#pollution_explain_losses_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <textarea style="resize: none;" name="pollution_explain_losses" id="pollution_explain_losses" class="form-control" placeholder="Please explain"></textarea>
                    <label for="pollution_explain_losses">Explain Losses (Please include loss amount)</label>
                </div>
            </div>
        `);
    }



    async function showProfessionEntries(a) {
        try {
            let response = await axios.get('wc/showProfessionEntries', {
                params: {
                    a: a
                }
            });

            let data = response.data.data;

            if (data) {
                $("#profession_entry_container").append(data);
                perfectCurrencyFormatter(".annual-payroll");
                // let wcProfessionValue = $("#wc_profession_" + a).val();
                // if (wc_profession === 'Others') {
                //     alert("hello");
                // }

                // Attach a change event handler to the document for any element with an ID starting with 'wc_profession_'
                $(document).on("change", `[id^="wc_profession_${a}"]`, function () {
                    // Get the value of the selected option
                    let wcProfessionValue = parseInt($(this).val());
                    if (wcProfessionValue === 319) {
                        $("#classcode_if_others_container_" + a).append(`
                            <div class="row justify-content-center customProfession">
                                <h6 class="profession_header mt-2 mb-2">Please specify your profession:</h6>
                                <div class="col-md-12">
                                    <div class="mb-3 form-floating">
                                        <input type="text" name="profession_if_others_input" id="profession_if_others_input" class="form-control" placeholder="">
                                        <label for="profession_if_others_input">Please indicate:</label>
                                    </div>
                                </div>
                            </div>
                        `);
                    } else {
                        $(".customProfession").remove();
                    }
                });

            }
        } catch (error) {
            // Handle any errors here
            console.error(error);
        }
    }

    async function showAutoVehicleEntries(a) {
        try {
            let response = await axios.get('auto/showAutoVehicleEntries', {
                params: {
                    a: a
                }
            });

            let data = response.data.data;

            if (data) {
                $("#auto_vehicles_container").append(data);
            }
        } catch (error) {
            // Handle any errors here
            console.error(error);
        }
    }

    async function showAutoDriverEntries(a) {
        try {
            const response = await axios.get("auto/showAutoDriverEntries", {
                params: {
                    a: a
                }
            });

            const data = response.data.data;

            if (data) {
                $("#auto_drivers_container").append(data);
                datePickerFormatter(".driver_birthdate");
            }

            // If Married status
            $(`#auto_add_driver_civil_status_${a}`).on("change", async function() {
                const selectedOption = $(this).val();
                const containerId = `auto_driver_if_married_container_${a}`;

                if (selectedOption === "Married") {
                    try {
                        const spouseResponse = await axios.get("auto/showSpouseInformationForm", {
                            params: {
                                a: a
                            }
                        });

                        $(`#${containerId}`).html(spouseResponse.data.data);
                        datePickerFormatter(".spouse_datebirth");

                    } catch (error) {
                        console.error(error);
                    }
                } else {
                    $(`#${containerId}`).empty();
                }
            });

        } catch (error) {
            console.error(error);
        }
    }

    function renderingYesNoDivs(a, func, b) {
        $("#" + a).on("change", function () {
            $(".loader-container").removeClass("hidden");
            $(".loader-container").addClass("active");

            // Adjusted condition for the value "1" for "Yes"
            if ($(this).val() === "1") {
                setTimeout(function () {
                    func();
                    $(".loader-container").addClass("hidden");
                    $(".loader-container").removeClass("active");
                }, 0);
            }
            // Adjusted conditions for the value "0" or an empty string for "No"
            else if ($(this).val() === "0" || $(this).val() === "") {
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
        `);

        datePickerFormatter("#bond_owners_spouse_dob");
        $("#bond_owners_spouse_ssn").ssnFormat();
    }

    function ShowLicBondTypeOfLicIfOthers() {
        $("#bond_license_type_if_others_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="bond_if_other_type_of_license" id="bond_if_other_type_of_license" class="form-control" placeholder="">
                    <label for="bond_if_other_type_of_license">If others, please specify</label>
                </div>
            </div>
        `);
    }

    function showAYCNoOfLossesContainer() {
        $("#ayc_no_losses_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <textarea style="resize: none;" name="ayc_no_of_losses_explain" id="ayc_no_of_losses_explain" class="form-control" placeholder="Please explain"></textarea>
                    <label for="ayc_no_of_losses_explain">Explain Losses (Please include loss amount)</label>
                </div>
            </div>
        `);
    }

    function showExcessNoOfLossesContainer() {
        $("#excess_no_losses_5years_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <textarea style="resize: none;" name="excess_explain_losses" id="excess_explain_losses" class="form-control" placeholder="Please explain"></textarea>
                    <label for="excess_explain_losses">Explain Losses (Please include loss amount)</label>
                </div>
            </div>
        `);
    }

    function showGLProfessionsIfRoofing() {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <h6 class="profession_header mt-2 mb-2">Additional Questions</h6>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="gl_additional_q1"
                            id="gl_additional_q1" aria-label="gl_additional_q1">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_additional_q1">Do you use any heating devices when performing your work?</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="gl_additional_q2"
                            id="gl_additional_q2" aria-label="gl_additional_q2">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_additional_q2">Do you do spray foam roofing?</label>
                    </div>
                </div>
                <div id="gl_additional_q2_sub_container"></div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="gl_additional_q3"
                            id="gl_additional_q3" aria-label="gl_additional_q3">
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
                        <label for="gl_additional_q3">Maximum height exposure</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="gl_additional_q4"
                            id="gl_additional_q4" aria-label="gl_additional_q4">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_additional_q4">Do you work on slopes greater that 15 degrees?</label>
                    </div>
                </div>
            </div>
        `);
        $("#gl_additional_q2").on("change", function () {
            const value = parseInt($(this).val());
            if (value) {
                $("#gl_additional_q2_sub_container").append(`
                    <div class="col-md-12 appendedQuestion appendedSubQuestion">
                        <div class="mb-3 form-floating">
                            <select class="form-select" name="gl_additional_q2_sub"
                                id="gl_additional_q2_sub" aria-label="gl_additional_q2_sub">
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
                            <label for="gl_additional_q2_sub">Maximum height exposure</label>
                        </div>
                    </div>
                `);
            } else {
                $("#gl_additional_q2_sub_container .appendedSubQuestion").remove();
            }
        });
    }

    function showGLProfessionsIfElectrical(value) {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <h6 class="profession_header mt-2 mb-2">Additional Questions</h6>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="gl_additional_q1"
                            id="gl_additional_q1" aria-label="gl_additional_q1">
                            <option value="" selected></option>
                            <option value="Burglar alarm">Burglar alarm</option>
                            <option value="Fire alarm">Fire alarm</option>
                            <option value="Security alarm">Security alarm</option>
                            <option value="Emergency lighting">Emergency lighting</option>
                            <option value="Traffic signal lights">Traffic signal lights</option>
                            <option value="Solar">Solar</option>
                        </select>
                        <label for="gl_additional_q1">Are you working on the following?</label>
                    </div>
                </div>
            </div>
        `);

        if (value === 103) {
            $("#electrical_additional_questions option[value='Traffic signal lights']").remove();
        } else if (value === 226) {
            if ($("#electrical_additional_questions option[value='Traffic signal lights']").length === 0) {
                $("#electrical_additional_questions").append("<option value='Traffic signal lights'>Traffic Signal Lights</option>");
            }
        }
    }

    function showGLProfessionsIfPlumbing() {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <h6 class="profession_header mt-2 mb-2">Additional Questions</h6>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="gl_additional_q1"
                            id="gl_additional_q1" aria-label="gl_additional_q1">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_additional_q1">Are you working on gas, water, and sewer mains?</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="gl_additional_q2"
                            id="gl_additional_q2" aria-label="gl_additional_q2">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_additional_q2">Do you use any heating devices when performing your work?</label>
                    </div>
                </div>
            </div>
        `);
    }

    function showGLProfessionsIfHVAC() {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <h6 class="profession_header mt-2 mb-2">Additional Questions</h6>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="gl_additional_q1"
                            id="gl_additional_q1" aria-label="gl_additional_q1">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_additional_q1">Do you use any heating devices when performing your work?</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="gl_additional_q2"
                            id="gl_additional_q2" aria-label="gl_additional_q2">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_additional_q2">Do you do refrigeration works?</label>
                    </div>
                </div>
                <div id="gl_additional_q2_sub_container"></div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="gl_additional_q3"
                            id="gl_additional_q3" aria-label="gl_additional_q3">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_additional_q3">Any works involving LPG?</label>
                    </div>
                </div>
                <div id="gl_additional_q3_sub_container"></div>
            </div>
        `);

        $("#gl_additional_q2").on("change", function () {
            const value = parseInt($(this).val());
            if (value) {
                $("#gl_additional_q2_sub_container").append(`
                    <div class="col-md-12 appendedQuestion appendedSubQuestion">
                        <h6 class="profession_header mt-2 mb-2">Please indicate the percentage for refrigeration works:</h6>
                        <div class="mb-3 form-floating">
                            <select class="form-select" name="gl_additional_q2_sub"
                                id="gl_additional_q2_sub" aria-label="gl_additional_q2_sub">
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
                            <label for="gl_additional_q2_sub">Percentage</label>
                        </div>
                    </div>
                `);
            } else {
                $("#gl_additional_q2_sub_container .appendedQuestion .appendedSubQuestion").remove();
            }
        });

        $("#gl_additional_q3").on("change", function () {
            const value = parseInt($(this).val());
            if (value) {
                $("#gl_additional_q3_sub_container").append(`
                    <div class="col-md-12 appendedQuestion appendedSubQuestion">
                        <h6 class="profession_header mt-2 mb-2">Please indicate the percentage for works involving LPG:</h6>
                        <div class="mb-3 form-floating">
                            <select class="form-select" name="gl_additional_q3_sub"
                                id="gl_additional_q3_sub" aria-label="gl_additional_q3_sub">
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
                            <label for="gl_additional_q3_sub">Percentage</label>
                        </div>
                    </div>
                `);
            } else {
                $("#gl_additional_q3_sub_container .appendedQuestion .appendedSubQuestion").remove();
            }
        });
    }

    function showGLProfessionsIfConcrete() {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <h5 class="profession_header mt-2 mb-2">Additional Questions</h5>
                <div class="col-md-6">
                    <h6 class="profession_header mt-2 mb-2">Flat Works %</h6>
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_additional_q1" id="gl_additional_q1" class="form-control" placeholder="">
                        <label for="gl_additional_q1">%</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6 class="profession_header mt-2 mb-2">Foundation Works %</h6>
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_additional_q2" id="gl_additional_q2" class="form-control" placeholder="">
                        <label for="gl_additional_q2">%</label>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center appendedQuestion">
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_additional_q3" id="gl_additional_q3" class="form-control" placeholder="" maxlength="">
                        <label for="gl_additional_q3">Do you do works on dike, dams, and bridges?</label>
                    </div>
                </div>
            </div>
        `);

        $("#gl_additional_q1").on("change", function () {
            setTimeout(function () {
                computePercentage("gl_additional_q1", "gl_additional_q2");
            }, 0);
        });
        $("#gl_additional_q2").on("change", function () {
            setTimeout(function () {
                computePercentage("gl_additional_q2", "gl_additional_q1");
            }, 0);
        });
    }

    function showGLProfessionsIfHandyman() {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <h6 class="profession_header mt-2 mb-2">Additional Questions</h6>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_additional_q1" id="gl_additional_q1" class="form-control" placeholder="" maxlength="">
                        <label for="gl_additional_q1">What’s the largest project that you have done?</label>
                    </div>
                </div>
            </div>
        `);
    }

    function showGLProfessionsIfFlooring() {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <div class="col-md-12">
                    <h6 class="profession_header mt-2 mb-2">Additional Questions</h6>
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_additional_q1" id="gl_additional_q1" class="form-control" placeholder="" maxlength="">
                        <label for="gl_additional_q1">What type of flooring do you install?</label>
                    </div>
                </div>
            </div>
        `);
    }

    function showGLProfessionsIfLandscaping() {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <div class="col-md-12">
                    <h6 class="profession_header mt-2 mb-2">Additional Questions</h6>
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_additional_q1" id="gl_additional_q1" class="form-control" placeholder="" maxlength="">
                        <label for="gl_additional_q1">Any hardscaping works?</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_additional_q2" id="gl_additional_q2" class="form-control" placeholder="" maxlength="">
                        <label for="gl_additional_q2">Do you installs irrigations systems?</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_additional_q3" id="gl_additional_q3" class="form-control" placeholder="" maxlength="">
                        <label for="gl_additional_q3">Retaining walls max height</label>
                    </div>
                </div>
            </div>
        `);
    }

    function showGLProfessionsIfPainting() {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <div class="col-md-12">
                    <h6 class="profession_header mt-2 mb-2">Additional Questions</h6>
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="gl_additional_q1"
                            id="gl_additional_q1" aria-label="gl_additional_q1">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_additional_q1">Do you paint automotive?</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <select class="form-select" name="gl_additional_q2"
                            id="gl_additional_q2" aria-label="gl_additional_q2">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_additional_q2">Do you paint roofs, ships, roads and highways?</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_additional_q3" id="gl_additional_q3" class="form-control" placeholder="" maxlength="">
                        <label for="gl_additional_q3">Max height exposure?</label>
                    </div>
                </div>
            </div>
        `);
    }

    function showGLProfessionsIfPlastering() {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <div class="col-md-12">
                    <h6 class="profession_header mt-2 mb-2">Additional Questions</h6>
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_additional_q1" id="gl_additional_q1" class="form-control" placeholder="" maxlength="">
                        <label for="gl_additional_q1">Max. height exposure</label>
                    </div>
                </div>
            </div>
        `);
    }

    // function showGLProfessionsIfWelding() {
    //     $("#gl_profession_container").append(`
    //         <div class="row justify-content-center appendedQuestion">
    //             <h5 class="profession_header mt-2 mb-2">Additional Questions</h5>
    //             <div class="col-md-6">
    //                 <h6 class="profession_header mt-2 mb-2">Structural %</h6>
    //                 <div class="mb-3 form-floating">
    //                     <input type="text" name="gl_additional_q1" id="gl_additional_q1" class="form-control" placeholder="">
    //                     <label for="gl_additional_q1">%</label>
    //                 </div>
    //             </div>
    //             <div class="col-md-6">
    //                 <h6 class="profession_header mt-2 mb-2">Non-Structural %</h6>
    //                 <div class="mb-3 form-floating">
    //                     <input type="text" name="gl_additional_q2" id="gl_additional_q2" class="form-control" placeholder="">
    //                     <label for="gl_additional_q2">%</label>
    //                 </div>
    //             </div>
    //         </div>
    //     `);
    //     $("#gl_additional_q1").on("change", function () {
    //         setTimeout(function () {
    //             computePercentage("gl_additional_q1", "gl_additional_q2");
    //         }, 0);
    //     });
    //     $("#gl_additional_q2").on("change", function () {
    //         setTimeout(function () {
    //             computePercentage("gl_additional_q2", "gl_additional_q1");
    //         }, 0);
    //     });
    // }

    function showGLProfessionsIfTreeService() {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <div class="col-md-12">
                    <h6 class="profession_header mt-2 mb-2">Additional Questions</h6>
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_additional_q1" id="gl_additional_q1" class="form-control" placeholder="" maxlength="">
                        <label for="gl_additional_q1">Max. height exposure</label>
                    </div>
                </div>
            </div>
        `);
    }

    function showGLProfessionsIfMasonry() {
        $("#gl_profession_container").append(`
            <div class="row justify-content-center appendedQuestion">
                <div class="col-md-12">
                    <h6 class="profession_header mt-2 mb-2">Additional Questions</h6>
                    <div class="mb-3 form-floating">
                    <select class="form-select" name="gl_additional_q1"
                            id="gl_additional_q1" aria-label="gl_additional_q1">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_additional_q1">Do you have any pools exposure?</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_additional_q2" id="gl_additional_q2" class="form-control" placeholder="" maxlength="">
                        <label for="gl_additional_q2">Do you do retaining walls that exceeds 6ft?</label>
                    </div>
                </div>
            </div>
        `);
    }

    let counter = 0;
    let percentages = [];
    function checkPercentages() {
        const sum = percentages.reduce((a, b) => a + b, 0);
        return sum;
    }

    function showMultipleStateWork() {
        counter++;
        const newElement = $("#gl_multiple_state_work_container").append(`
        <div class="row justify-content-center stateWorkContainer">
            <h6 class="profession_header mt-2 mb-2">State Work Entry No. ${counter}</h6>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <select class="form-select" name="gl_multiple_states_${counter}"
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
                    <input type="text" name="gl_multiple_states_percentage_${counter}" id="gl_multiple_states_percentage_${counter}" class="form-control" placeholder="% Percentage" maxlength="">
                    <label for="gl_multiple_states_percentage_${counter}">% Percentage</label>
                </div>
            </div>

            </div>`);

            $("#gl_multiple_state_work_container").append(newElement);

            $(`#gl_multiple_states_percentage_${counter}`).on("change", function() {
                const value = parseInt($(this).val(), 10);
                if (isNaN(value)) {
                    toastr.error('Please enter a valid number');
                    return;
                }
                const sum = checkPercentages();
                if (sum + value > 100) {
                    toastr.error('Total percentage should not exceed 100%.');
                    $(this).val('');
                    return;
                }
                percentages[counter - 1] = value;
                if (sum + value < 100) {
                    showMultipleStateWork();
                }
            });
    }

    function showToolsEquipmentNoOfLossesContainer() {
        $("#tools_no_losses_5years_container").append(`
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <textarea style="resize: none;" name="tools_explain_losses" id="tools_explain_losses" class="form-control" placeholder="Please explain"></textarea>
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
                        id="instfloat_scheduled_equipment_type_${i}" class="form-control"
                        placeholder="Type:" maxlength="" />
                    <label for="instfloat_scheduled_equipment_type_${i}">Type:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="instfloat_scheduled_equipment_mfg_${i}"
                        id="instfloat_scheduled_equipment_mfg_${i}" class="form-control"
                        placeholder="Manufacturer:" maxlength="" />
                    <label for="instfloat_scheduled_equipment_mfg_${i}">Manufacturer:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text"
                        name="instfloat_scheduled_equipment_id_or_serial_${i}"
                        id="instfloat_scheduled_equipment_id_or_serial_${i}"
                        class="form-control"
                        placeholder="ID # /
                        Serial Number:"
                        maxlength="" />
                    <label for="instfloat_scheduled_equipment_id_or_serial_${i}">ID # /
                        Serial Number:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="instfloat_scheduled_equipment_model_${i}"
                        id="instfloat_scheduled_equipment_model_${i}" class="form-control"
                        placeholder="Model:" maxlength="" />
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
                        class="form-control" placeholder="Model Year:"
                        maxlength="" />
                    <label for="instfloat_scheduled_equipment_model_year_${i}">Model
                        Year:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text"
                        name="instfloat_scheduled_equipment_date_purchased_${i}"
                        id="instfloat_scheduled_equipment_date_purchased_${i}"
                        class="form-control" placeholder="Date Purchased:"
                        maxlength="" />
                    <label for="instfloat_scheduled_equipment_date_purchased_${i}">Date
                        Purchased:</label>
                </div>
            </div>`);
    }

    function showGLProfessionsIfGC() {
        $("#gl_annual_gross_additional_questions").append(`
            <div class="row justify-content-center appendedQuestion">
                <div class="col-md-12">
                    <h5 class="profession_header mt-2 mb-2">Additional Questions</h5>
                    <h6 class="profession_header mt-2 mb-2">New construction - How many houses will you be building for the whole year?</h6>
                    <div class="mb-3 form-floating">
                        <input type="text" name="gl_gross_add_q1" id="gl_gross_add_q1" class="form-control" placeholder="Please explain:" maxlength="">
                        <label for="gl_gross_add_q1">Please explain:</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <h6 class="profession_header mt-2 mb-2">Do you work on ADU houses?</h6>
                    <div class="mb-3 form-floating">
                        <select class="form-select"
                            name="gl_gross_add_q2"
                            id="gl_gross_add_q2"
                            aria-label="gl_gross_add_q2">
                            <option value="" selected></option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <label for="gl_gross_add_q2">Please select:</label>
                    </div>
                </div>
            </div>
        `);
    }

    // START PERSONAL INFORMATION SCRIPTS
    $("#phone_number").on("input", formatUSPhone);
    $("#fax_number").on("input", formatUSPhone);
    $('#zipcode').on('change', function() {
        getStateByZipcode();
    });
    // END PERSONAL INFORMATION SCRIPS

    // START GL SCRIPT
    datePickerFormatter("#wc_dob");
    $("#gl_residential").change(function () {
        setTimeout(function () {
            computePercentage("gl_residential", "gl_commercial");
        }, 0);
    });
    $("#gl_commercial").change(function () {
        setTimeout(function () {
            computePercentage("gl_commercial", "gl_residential");
        }, 0);
    });
    $("#gl_new_construction").change(function () {
        setTimeout(function () {
            computePercentage("gl_new_construction", "gl_repair_remodel");
        }, 0);
    });
    $("#gl_repair_remodel").change(function () {
        setTimeout(function () {
            computePercentage("gl_repair_remodel", "gl_new_construction");
        }, 0);
    });
    perfectCurrencyFormatter("#gl_cost_proj_5years");
    perfectCurrencyFormatter("#gl_annual_gross");
    $("#wc_gross_receipt").val($("#gl_annual_gross").val());
    perfectCurrencyFormatter("#gl_payroll_amt");
    perfectCurrencyFormatter("#gl_subcon_cost");
    renderingYesNoDivs("gl_using_subcon", showSubconContainerForGL, "gl_subcon_cost");
    $("#gl_no_losses_5years").on("change", function () {
        const value = parseInt($(this).val());
        $(".loader-container").removeClass("hidden");
        $(".loader-container").addClass("active");
        if (value >= 1) {
            setTimeout(function () {
                showGLNoOfLossesContainer();
                $(".loader-container").removeClass("active");
                $(".loader-container").addClass("hidden");
            }, 0);
        } else {
            $("#gl_explain_losses").parent().parent().remove();
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
        }
    });
    $("#ayc_no_of_losses").on("change", function () {
        const value = parseInt($(this).val());
        if (value >= 1) {
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
            setTimeout(function () {
                showAYCNoOfLossesContainer();
            }, 0);
        } else {
            $("#ayc_no_of_losses_explain").parent().parent().remove();
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
        }
    });

    // Function to handle changes in annual gross
    function handleAnnualGrossChange() {
        var grossValue = $("#gl_annual_gross").val();
        var convertGrossValue = grossValue.replace(/[^0-9]/g, '');
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
                }
                else if (professionValue === 119) {
                    // Landscaping
                    showGLProfessionsIfLandscaping();
                } else if (professionValue === 56) {
                    // Painting
                    showGLProfessionsIfPainting();
                } else if (professionValue === 196) {
                    // Plastering
                    showGLProfessionsIfPlastering();
                }
                // else if (professionValue === 149 || professionValue === 150) {
                //     // Welding
                //     showGLProfessionsIfWelding();
                // }
                else if (professionValue === 146) {
                    // Tree service
                    showGLProfessionsIfTreeService();
                }  else if (professionValue === 51) {
                    // Masonry
                    showGLProfessionsIfMasonry();
                }
                else {
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
        }  else {
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
        handleAnnualGrossChange(); // Check immediately when #gl_profession changes
    });
    $(document).on("change", "#gl_multiple_state_work", function () {
        const value = parseInt($(this).val(), 10);
        if(value === 1) {
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
            $("#gl_multiple_state_work_container").empty();
            percentages = []; // Clear the percentages array
            counter = 0; // Reset counter
            showMultipleStateWork();
        } else {
            $(".stateWorkContainer").remove();
        }
    });
    // END GL SCRIPTS

    // START WC SCRIPTS
    $(document).on("change", "#wc_no_of_profession", async function () {
        $(".loader-container").addClass('active');
        $(".loader-container").removeClass('hidden');

        var numProfs = parseInt($(this).val());
        $("#profession_entry_container").empty();

        for (var i = 1; i <= numProfs; i++) {
            await showProfessionEntries(i);
        }

        $(".loader-container").addClass('hidden');
        $(".loader-container").removeClass('active');
    });

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

    $("#wc_fein").feinFormat();
    $("#wc_ssn").ssnFormat();
    // END WC SCRIPTS

    // START AUTO SCRIPTS
    $(document).ready(function () {
        $("#auto_add_vehicle").trigger("change");
    });
    $("#auto_add_vehicle").on("change", async function () {
        var numVehicles = $(this).val();
        $("#auto_vehicles_container").empty();
        for (var i = 1; i <= numVehicles; i++) {
            await showAutoVehicleEntries(i);
        }
    });
    $(document).ready(function() {
        $("#auto_add_driver").on("change", async function() {
            const numDrivers = $(this).val();
            $("#auto_drivers_container").empty();
            for (let i = 1; i <= numDrivers; i++) {
                await showAutoDriverEntries(i);
            }
        });
        $("#auto_add_driver").trigger("change");
    });
    // END AUTO SCRIPTS

    // START BOND SCRIPTS
    $("#bond_owners_ssn").ssnFormat();
    datePickerFormatter("#bond_owners_dob");
    $("#bond_owners_civil_status").on("change", function () {
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
    $("#bond_type_of_license").on("change", function () {
        $(".loader-container").removeClass("hidden");
        $(".loader-container").addClass("active");
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
    datePickerFormatter("#bond_effective_date");
    // END BOND SCRIPTS

    // START EXCESS SCRIPTS
    perfectCurrencyFormatter("#excess_limits");
    perfectCurrencyFormatter("#excess_policy_premium");
    $("#excess_no_losses_5years").on("change", function () {
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
    datePickerFormatter("#excess_gl_eff_date");
    datePickerFormatter("#excess_effective_date");
    datePickerFormatter("#excess_expiration_date");
    // END EXCESS SCRIPTS

    // START TOOLS SCRIPTS
    miscToolsCurrencyFormatter("#tools_misc_tools");
    perfectCurrencyFormatter("#tools_rented_or_leased_amt");
    scheduledEquipmentCurrencyFormatter("#tools_sched_equipment");
    $("#tools_no_losses_5years").on("change", function () {
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
    // END TOOLS SCRIPTS

    // START BR SCRIPTS
    perfectCurrencyFormatter("#br_value_of_existing_structure");
    perfectCurrencyFormatter("#br_value_of_work_performed");
    // END BR SCRIPTS

    // START BOP SCRIPTS
    perfectCurrencyFormatter("#bop_val_cost_bldg");
    perfectCurrencyFormatter("#bop_business_property_limit");
    yearPickerFormatter("#bop_year_built");
    yearPickerFormatter("#bop_last_update_roofing_year");
    yearPickerFormatter("#bop_last_update_heating_year");
    yearPickerFormatter("#bop_last_update_plumbing_year");
    yearPickerFormatter("#bop_last_update_electrical_year");
    // END BOP SCRIPTS

    // START COMM PROP SCRIPTS
    perfectCurrencyFormatter("#property_value_cost_bldg");
    perfectCurrencyFormatter("#property_business_property_limit");
    yearPickerFormatter("#property_year_built");
    yearPickerFormatter("#yearPickerFormatter");
    yearPickerFormatter("#property_last_update_roofing_year");
    yearPickerFormatter("#property_last_update_heating_year");
    yearPickerFormatter("#property_last_update_plumbing_year");
    yearPickerFormatter("#property_last_update_electrical_year");
    // END COMM PROPS SCRIPTS

    // START EO SCRIPTS
    perfectCurrencyFormatter("#eo_ftime_salary_range");
    perfectCurrencyFormatter("#eo_ptime_salary_range");
    // END EO SCRIPTS

    // START POLLUTION SCRIPTS
    $("#pollution_residential").change(function () {
        setTimeout(function () {
            computePercentage("pollution_residential", "pollution_commercial");
        }, 0);
    });
    $("#pollution_commercial").change(function () {
        setTimeout(function () {
            computePercentage("pollution_commercial", "pollution_residential");
        }, 0);
    });
    $("#pollution_new_construction").change(function () {
        setTimeout(function () {
            computePercentage(
                "pollution_new_construction",
                "pollution_repair_remodel"
            );
        }, 0);
    });
    $("#pollution_repair_remodel").change(function () {
        setTimeout(function () {
            computePercentage(
                "pollution_repair_remodel",
                "pollution_new_construction"
            );
        }, 0);
    });
    perfectCurrencyFormatter("#pollution_cost_proj_5years");
    perfectCurrencyFormatter("#pollution_annual_gross");
    perfectCurrencyFormatter("#pollution_payroll_amt");
    perfectCurrencyFormatter("#pollution_subcon_cost");
    renderingYesNoDivs("pollution_using_subcon", showSubconContainerForPollution, "pollution_subcon_cost");
    $("#pollution_no_losses_5years").on("change", function () {
        const value = parseInt($(this).val());
        if (value >= 1) {
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
            setTimeout(function () {
                showPollutionNoOfLossesContainer();
            }, 0);
        } else {
            $("#pollution_explain_losses").parent().parent().remove();
            $(".loader-container").addClass("hidden");
            $(".loader-container").removeClass("active");
        }
    });
    // END POLLUTION SCRIPTS

    // START EPLI SCRIPTS
    datePickerFormatter("#epli_effective_date");
    perfectCurrencyFormatter("#epli_prev_premium_amount");
    perfectCurrencyFormatter("#epli_deductible_amount");
    // END EPLI SCRIPTS

    // START INSTALLATION FLOATER SCRIPTS
    perfectCurrencyFormatter("#instfloat_max_value_of_equipment");
    perfectCurrencyFormatter("#instfloat_max_value_of_bldg_storage");
    perfectCurrencyFormatter("#instfloat_max_value_equipment_storing");
    perfectCurrencyFormatter("#instfloat_unscheduled_max_value_equipment_storing");
    appendNewSchedEquipmentEntry("#add_sched_equipment_entry");
    $(document).on("click", ".delete-entry", function() {
        $(this).parent(".equipment-entry").nextUntil(".equipment-entry").addBack().remove();
        equipmentCount--;
        updateEquipmentEntryNames();
    });
    datePickerFormatter("#instfloat_scheduled_equipment_date_purchased_1");
    // END INSTALLATION FLOATER SCRIPTS

    // START CYBER LIABILITY SCRIPTS
    $("#cyber_it_contact_number").on("input", formatUSPhone);
    // END CYBER LIABILITY SCRIPTS

    // START ABOUT YOUR COMPANY SCRIPTS
    datePickerFormatter("#ayc_date_business_started");
    $("#ayc_phone_number").on("input", formatUSPhone);
    // END ABOUT YOUR COMPANY SCRIPTS

    function formatAsCurrency(value) {
        var numericValue = value.replace(/[$,]/g, "");
        numericValue = parseFloat(numericValue || 0);
        return toUSD(numericValue);
    }

    getCheckboxValue();

})(window.jQuery);
