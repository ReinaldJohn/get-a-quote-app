!(function (e) {
    "use strict";
    e(window).on("load", function () {
        e('[data-loader="circle-side"]').fadeOut(),
            e("#preloader").delay(350).fadeOut("slow"),
            e("body").delay(350).css({ overflow: "visible" });
    });
    let s = new MutationObserver(() => {
        e(
            "#wrapped :checkbox, #wrapped input, #wrapped select, #wrapped textarea"
        )
            .not("#fax_number, #personal_website, #contractor_license")
            .prop("required", !0);
    });
    function o() {
        for (
            var s = e("#wc_no_of_profession").val(), o = [], t = "", a = 1;
            a <= s;
            a++
        ) {
            var n = {};
            (n.name = e("#wc_profession_" + a + " option:selected").text()),
                (n.annualPayroll = e("#wc_annual_payroll_" + a).val()),
                (n.fullTimeEmployees = e("#wc_fulltime_" + a).val()),
                (n.partTimeEmployees = e("#wc_parttime_" + a).val()),
                (t +=
                    "<div><h6><strong>Profession Entry No. " +
                    a +
                    "</strong></h6>"),
                (t += "<p>Profession: <strong>" + n.name + "</strong></p>"),
                (t +=
                    "<p>Annual Payroll: <strong>" +
                    n.annualPayroll +
                    "</strong></p>"),
                (t +=
                    "<p>Full Time: <strong>" +
                    n.fullTimeEmployees +
                    " Employees</strong></p>"),
                (t +=
                    "<p>Part Time: <strong>" +
                    n.partTimeEmployees +
                    " Employee</strong></p></div>"),
                o.push(n);
        }
        e(".entryContainer").html(t),
            s &&
                e("#wc_details_1").html(
                    "<p>Number of Profession: <strong>" + s + "</strong></p>"
                );
    }
    function t() {
        for (
            var s = e("#auto_add_vehicle").val(), o = [], t = "", a = 1;
            a <= s;
            a++
        ) {
            var n = {};
            (n.year = e("#auto_vehicle_year_" + a).val()),
                (n.make = e("#auto_vehicle_maker_" + a).val()),
                (n.model = e("#auto_vehicle_model_" + a).val()),
                (n.vin = e("#auto_vehicle_vin_" + a).val()),
                (n.mileage = e("#auto_vehicle_mileage_" + a).val()),
                (n.garageAddress = e("#auto_vehicle_garage_add_" + a).val()),
                (n.coverageLimits = e(
                    "#auto_vehicle_coverage_limits_" + a + " option:selected"
                ).text()),
                (t +=
                    "<div><h6><strong>Vehicle Information Entry No. " +
                    a +
                    "</strong></h6>"),
                (t += "<p>Year: <strong>" + n.year + "</strong></p>"),
                (t += "<p>Make: <strong>" + n.make + "</strong></p>"),
                (t += "<p>Model: <strong>" + n.model + "</strong></p>"),
                (t +=
                    "<p>Vehicle Identification Number (VIN): <strong>" +
                    n.vin +
                    "</strong></p>"),
                (t +=
                    "<p>Mileage / Radius: <strong>" +
                    n.mileage +
                    "</strong></p>"),
                (t +=
                    "<p>Garage Address: <strong>" +
                    n.garageAddress +
                    "</strong></p>"),
                (t +=
                    "<p>Coverage Limits: <strong>" +
                    n.coverageLimits +
                    "</strong></p></div>"),
                o.push(n);
        }
        e(".vehicleEntries").html(t),
            s &&
                e("#auto_vehicle_details_1").html(
                    "<p>Number of Vehicles: <strong>" + s + "</strong></p>"
                );
    }
    function a() {
        for (
            var s = e("#auto_add_driver").val(), o = [], t = "", a = 1;
            a <= s;
            a++
        ) {
            var n = {};
            (n.driversName = e("#auto_add_drivers_name_" + a).val()),
                (n.driversLic = e("#auto_add_driver_lic_" + a).val()),
                (n.mileAgeRadius = e(
                    "#auto_add_driver_mileage_radius_" + a
                ).val()),
                (n.driversDateOfBirth = e(
                    "#auto_add_driver_date_birth_" + a
                ).val()),
                (n.driversCivilStatus = e(
                    "#auto_add_driver_civil_status_" + a + " option:selected"
                ).text());
            var l = n.driversCivilStatus,
                r = "",
                i = "";
            "Married" === l
                ? ((n.driversSpouseName = e(
                      "#auto_add_driver_spouse_name_" + a
                  ).val()),
                  (n.driversSpouseDateOfBirth = e(
                      "#auto_add_driver_spouse_dob_" + a
                  ).val()),
                  (r =
                      "<p>Spouse's Name: <strong>" +
                      n.driversSpouseName +
                      "</strong></p>"),
                  (i =
                      "<p>Spouse's Date of Birth: <strong>" +
                      n.driversSpouseDateOfBirth +
                      "</strong></p></div>"))
                : ((r = ""), (i = "")),
                (t +=
                    "<div><h6><strong>Driver Information Entry No. " +
                    a +
                    "</strong></h6>"),
                (t +=
                    "<p>Driver's Name: <strong>" +
                    n.driversName +
                    "</strong></p>"),
                (t +=
                    "<p>Drivers License Number: <strong>" +
                    n.driversLic +
                    "</strong></p>"),
                (t +=
                    "<p>Mileage / Radius: <strong>" +
                    n.mileAgeRadius +
                    "</strong></p>"),
                (t +=
                    "<p>Date of Birth: <strong>" +
                    n.driversDateOfBirth +
                    "</strong></p>"),
                "Married" === l
                    ? ((t +=
                          "<p>Civil Status: <strong>" +
                          n.driversCivilStatus +
                          "</strong></p>"),
                      (t += r),
                      (t += i))
                    : (t +=
                          "<p>Civil Status: <strong>" +
                          n.driversCivilStatus +
                          "</strong></p></div>"),
                o.push(n);
        }
        e(".driverEntries").html(t),
            s &&
                e("#auto_driver_details_1").html(
                    "<p>Number of Drivers: <strong>" + s + "</strong></p>"
                );
    }
    s.observe(document, { childList: !0, subtree: !0 }),
        e("#wc_no_of_profession").change(o),
        e("#auto_add_vehicle").change(t),
        e("#auto_add_driver").change(a),
        e("#wizard_container")
            .wizard({
                stepsWrapper: "#wrapped",
                submit: ".submit",
                beforeSelect: function (s, n) {
                    if (0 != e("input#website").val().length) return !1;
                    if (!n.isMovingForward) return !0;
                    var l = e(this).wizard("state").step.find(":input");
                    if (n.step.hasClass("submit")) {
                        var r = e("#company_name").val(),
                            i = e("#firstname").val(),
                            c = e("#lastname").val(),
                            d = e("#address").val(),
                            u = e("#city").val(),
                            p = e("#states option:selected").text(),
                            v = e("#zipcode").val(),
                            m = e("#phone_number").val(),
                            f = e("#fax_number").val(),
                            h = e("#email_address").val(),
                            b = e("#personal_website").val(),
                            g = e("#contractor_license").val(),
                            y = e("#gl_profession option:selected").text(),
                            x = e("#gl_residential option:selected").text(),
                            C = e("#gl_commercial option:selected").text(),
                            w = e(
                                "#gl_new_construction option:selected"
                            ).text(),
                            _ = e("#gl_repair_remodel option:selected").text(),
                            $ = e("#gl_descops").val(),
                            S = e("#gl_cost_proj_5years").val(),
                            N = e("#gl_annual_gross").val(),
                            P = e("#gl_no_field_emp").val(),
                            D = e("#gl_payroll_amt").val(),
                            k = e("#gl_using_subcon").val();
                        "1" === k && e("#gl_subcon_cost").val();
                        var E = e("#gl_no_losses_5years").val();
                        if (E > 0) var z = e("#gl_explain_losses").val();
                        else var z = "";
                        o();
                        var L = e("#wc_gross_receipt").val(),
                            O = e(
                                "#wc_does_hire_subcon option:selected"
                            ).text(),
                            q = "";
                        q = "1" === O ? e("#wc_subcon_cost_year").val() : "";
                        var F = e("#wc_num_of_empl").text(),
                            j = e("#wc_name").val(),
                            A = e(
                                "#wc_title_relationship option:selected"
                            ).text(),
                            T = e("#wc_exc_inc option:selected").text(),
                            I = e("#wc_exc_inc option:selected").text(),
                            R = e("#wc_ssn").val(),
                            B = e("#wc_fein").val(),
                            M = e("#wc_dob").val(),
                            V = {
                                "Gross Receipt": L,
                                "Do you hire subcontractor": O,
                                "Subcontractor cost in a year": q,
                                "No. of Employees": F,
                            };
                        t(), a();
                        var Y = e("#bond_owners_name").val(),
                            G = e("#bond_owners_ssn").val(),
                            K = e("#bond_owners_dob").val(),
                            X = e(
                                "#bond_owners_civil_status option:selected"
                            ).text(),
                            W = "",
                            Q = "",
                            U = "";
                        "Married" === X
                            ? ((W = e("#bond_owners_spouse_name").val()),
                              (Q = e("#bond_owners_spouse_dob").val()),
                              (U = e("#bond_owners_spouse_ssn").val()))
                            : ((W = ""), (Q = ""), (U = ""));
                        var H = e("#bond_type_bond_requested").val(),
                            J = e("#bond_amount_of_bond").val(),
                            Z = e("#bond_term_of_bond option:selected").text(),
                            ee = e(
                                "#bond_type_of_license option:selected"
                            ).text(),
                            es = "";
                        es =
                            "Others" === ee
                                ? e("#bond_if_other_type_of_license").val()
                                : "";
                        var eo = e("#bond_license_or_application_no").val(),
                            et = e("#bond_effective_date").val(),
                            ea = {
                                "Owner's Name": Y,
                                "Social Security Number (SSN)": G,
                                "Date of Birth": K,
                                "Civil Status": X,
                                "Spouse's Name": W,
                                "Spouse's Date of Birth": Q,
                                "Spouse's SSN": U,
                                "Type of Bond Requested": H,
                                "Amount of Bond": J,
                                "Term of Bond": Z,
                                "Type of License": ee,
                                "If others, please indicate": es,
                                "License Number or Application Number": eo,
                                "Effective Date": et,
                            },
                            en = e("#excess_limits").val(),
                            el = e("#excess_gl_eff_date").val(),
                            er = e(
                                "#excess_no_losses_5years option:selected"
                            ).text(),
                            ei = "";
                        ei = er >= 0 ? e("#excess_explain_losses").val() : "";
                        var ec = e("#excess_insurance_carrier").val(),
                            e8 = e("#excess_policy_or_quote_no").val(),
                            ed = e("#excess_policy_premium").val(),
                            eu = e("#excess_effective_date").val(),
                            ep = e("#excess_expiration_date").val(),
                            ev = {
                                "Excess Limits": en,
                                "GL Effective Date": el,
                                "No. of Losses for the Past 5 Years": er,
                                "Explain Losses": ei,
                                "Insurance Carrier": ec,
                                "Policy Number / Quote Number": e8,
                                "Policy Premium": ed,
                                "Effective Date": eu,
                                "Expiration Date": ep,
                            },
                            em = e("#tools_misc_tools").val(),
                            ef = e("#tools_rented_or_leased_amt").val(),
                            eh = e("#tools_sched_equipment").val(),
                            eb = e("#tools_equipment_type").val(),
                            eg = e("#tools_equipment_year").val(),
                            ey = e("#tools_equipment_make").val(),
                            ex = e("#tools_equipment_model").val(),
                            eC = e("#tools_equipment_vin_or_serial_no").val(),
                            ew = e("#tools_equipment_valuation").val(),
                            e_ = e(
                                "#tools_no_losses_5years option:selected"
                            ).text(),
                            e$ = e("#tools_explain_losses").val(),
                            eS = e("#br_property_address").val(),
                            eN = e("#br_value_of_existing_structure").val(),
                            eP = e("#br_value_of_work_performed").val(),
                            e0 = e("#br_period_duration_project").val(),
                            eD = e(
                                "#pollution_profession option:selected"
                            ).text(),
                            ek = e(
                                "#pollution_residential option:selected"
                            ).text(),
                            eE = e(
                                "#pollution_commercial option:selected"
                            ).text(),
                            e3 = e(
                                "#pollution_new_construction option:selected"
                            ).text(),
                            ez = e(
                                "#pollution_repair_remodel option:selected"
                            ).text(),
                            eL = e("#pollution_descops").val(),
                            eO = e("#pollution_cost_proj_5years").val(),
                            eq = e("#pollution_annual_gross").val(),
                            eF = e("#pollution_no_field_emp").val(),
                            ej = e("#pollution_payroll_amt").val(),
                            eA = e("#pollution_using_subcon").val();
                        "1" === eA && e("#pollution_subcon_cost").val();
                        var eT = e("#pollution_no_losses_5years").val();
                        if (eT >= 0)
                            var e9 = e("#pollution_explain_losses").val();
                        else var e9 = "";
                        var eI = e("#ayc_bop option:selected").text(),
                            eR = e("#ayc_date_business_started").val(),
                            e1 = e("#ayc_yrs_exp_contractor").val(),
                            eB = e("#ayc_owners_first_name").val(),
                            eM = e("#ayc_owners_last_name").val(),
                            eV = e("#ayc_phone_number").val();
                        function eY(e, s) {
                            return s
                                ? "<p>" + e + ": <strong>" + s + "</strong></p>"
                                : "";
                        }
                        function e4(s, o) {
                            var t = "";
                            for (var a in s) t += eY(a, s[a]);
                            e(o).html(t);
                        }
                        e4(
                            {
                                "Company Name": r,
                                "Full Name": i + " " + c,
                                Address: d + " " + u + " " + p + " " + v,
                                "Phone Number": m,
                                "Fax Number": f,
                                "Email Address": h,
                                "Personal Website": b,
                                "Contractor License No.": g,
                            },
                            "#personal_information_details"
                        ),
                            e4(
                                {
                                    Profession: y,
                                    Residential: x,
                                    Commercial: C,
                                    "New Construction": w,
                                    "Repair/Remodel": _,
                                    "Detailed Description of Operations": $,
                                    "Cost of the Largest Project in the past 5 years":
                                        S,
                                    "Annual Gross Receipts": N,
                                    "Number of Field Employees": P,
                                    "Payroll Amount": D,
                                    "Are you using any subcontractor": k,
                                    "Subcontractor Cost": "",
                                    "# of Losses for the Past 5 Years": E,
                                    "Explain Losses (Please include loss amount)":
                                        z,
                                },
                                "#gl_information_details"
                            ),
                            e4(V, "#wc_details_2"),
                            e4(
                                {
                                    Name: j,
                                    "Title / Relationship": A,
                                    "Ownership %": T,
                                    "Excluded / Included": I,
                                    SSN: R,
                                    FEIN: B,
                                    "Date of Birth": M,
                                },
                                "#wc_details_3"
                            ),
                            e4(ea, "#license_bond_details"),
                            e4(ev, "#excess_liability_details"),
                            e4(
                                {
                                    "Miscellaneous Tools Amount ($1,500 in value and under)":
                                        em,
                                    "Rented/Leased Equipment Amount": ef,
                                    "Scheduled Equipment ($1,500 in value and above)":
                                        eh,
                                    "Equipment Type": eb,
                                    Year: eg,
                                    Make: ey,
                                    Model: ex,
                                    "VIN or Serial No.": eC,
                                    Valuation: ew,
                                    "No. of Losses for the Past 5 Years": e_,
                                    "If there's a loss, please explain": e$,
                                },
                                "#tools_equipment_details"
                            ),
                            e4(
                                {
                                    "Property Address": eS,
                                    "Value of Existing Structure": eN,
                                    "Value of Work Being Performed": eP,
                                    "Period of Insurance/Duration of the Project":
                                        e0,
                                },
                                "#builders_risk_details"
                            ),
                            e4(
                                {
                                    Profession: eD,
                                    Residential: ek,
                                    Commercial: eE,
                                    "New Construction": e3,
                                    "Repair/Remodel": ez,
                                    "Detailed Description of Operations": eL,
                                    "Cost of the Largest Project in the past 5 years":
                                        eO,
                                    "Annual Gross Receipts": eq,
                                    "Number of Field Employees": eF,
                                    "Payroll Amount": ej,
                                    "Are you using any subcontractor": eA,
                                    "Subcontractor Cost": "",
                                    "# of Losses for the Past 5 Years": eT,
                                    "Explain Losses (Please include loss amount)":
                                        e9,
                                },
                                "#pollution_liability_details"
                            ),
                            e4(
                                {
                                    "Business Ownership Structure": eI,
                                    "Date Business Started": eR,
                                    "Years of experience as a contractor": e1,
                                    "Owner’s First Name": eB,
                                    "Owner’s Last Name": eM,
                                    "Owner’s Phone Number": eV,
                                },
                                "#about_your_company_details"
                            ),
                            e("#process").on("click", function (s) {
                                s.preventDefault();
                                var o = {};
                                o.common = {};
                                o.products = {};
                                e(
                                    "#personal_information_step, #about_your_company_step"
                                )
                                    .find("input, select, textarea")
                                    .each(function () {
                                        o.common[this.name] = e(this).val();
                                    });

                                // Serialize products data into an object
                                e('input[name="question_1[]"]:checked').each(
                                    function () {
                                        var s = e(this).val();
                                        o.products[s] = {};

                                        e("div[id^='" + s + "_step_']")
                                            .find("input, select, textarea")
                                            .each(function () {
                                                o.products[s][this.name] =
                                                    e(this).val();
                                            });
                                    }
                                );

                                var t = JSON.stringify(o);
                                // document
                                //     .querySelector('button[name="process"]')
                                //     .addEventListener("click", function () {
                                axios({
                                    method: "post",
                                    url: "/quote-form-submit",
                                    headers: {
                                        "X-CSRF-TOKEN": document
                                            .querySelector(
                                                'meta[name="csrf-token"]'
                                            )
                                            .getAttribute("content"),
                                        "Content-Type": "application/json",
                                    },
                                    data: o,
                                })
                                    .then((response) => {
                                        document.getElementById(
                                            "loader_form"
                                        ).style.display = "none";
                                        if (response.data.redirect) {
                                            window.location.href =
                                                response.data.redirect;
                                        } else {
                                            toastr.success(
                                                response.data.message
                                            );
                                            window.open("/thankyou", "_blank");
                                            location.reload();
                                        }
                                    })
                                    .catch((error) => {
                                        // Error logic
                                        document.getElementById(
                                            "loader_form"
                                        ).style.display = "none";
                                        if (
                                            error.response &&
                                            error.response.data
                                        ) {
                                            toastr.error(
                                                error.response.data.message
                                            );
                                        } else {
                                            toastr.error("An error occurred");
                                        }
                                    });
                                document.getElementById(
                                    "loader_form"
                                ).style.display = "block";
                            });
                        // });
                    }
                    return !l.length || !!l.valid();
                },
            })
            .validate({
                errorPlacement: function (e, s) {
                    s.is(":radio") || s.is(":checkbox")
                        ? e.insertBefore(s.next())
                        : e.insertAfter(s);
                },
            }),
        e("#progressbar").progressbar(),
        e("#wizard_container").wizard({
            afterSelect: function (s, o) {
                e("#progressbar").progressbar("value", o.percentComplete),
                    e("#location").text(
                        "(" + o.stepsComplete + "/" + o.stepsPossible + ")"
                    );
            },
        }),
        e("#wrapped").validate({
            ignore: [],
            rules: { select: { required: !0 } },
            errorPlacement: function (e, s) {
                s.is("select:hidden")
                    ? e.insertAfter(s.next(".nice-select"))
                    : e.insertAfter(s);
            },
        });
    var n = e("form#wrapped");
    function l(s) {
        switch (s) {
            case "gl":
                e("#gl_step_1, #gl_step_2, #glDetailsContainer")
                    .removeClass("step wizard-step")
                    .addClass("hidden"),
                    e("#gl_step_1, #gl_step_2").find("input").val(""),
                    e("#gl_step_1, #gl_step_2").find("select").val(""),
                    e("#gl_step_1, #gl_descops").val(""),
                    e("#gl_step_2, #gl_explain_losses").val(""),
                    e("#gl_step_2").find("#gl_subcon_cost_container").val("");
                break;
            case "wc":
                e("#wc_step_1, #wc_step_2, #wcDetailsContainer")
                    .removeClass("step wizard-step")
                    .addClass("hidden"),
                    e("#wc_step_1, #wc_step_2").find("input").val(""),
                    e("#wc_step_1, #wc_step_2").find("select").val(""),
                    e("#wc_step_1, #wc_step_2")
                        .find("#profession_entry_container")
                        .empty(),
                    e("#wc_step_1, #wc_step_2")
                        .find("#wc_subcon_cost_year_container")
                        .empty();
                break;
            case "auto":
                e("#auto_step_1, #auto_step_2, #autoDetailsContainer")
                    .removeClass("step wizard-step")
                    .addClass("hidden"),
                    e("#auto_step_1, #auto_step_2").find("input").val(""),
                    e("#auto_step_1, #auto_step_2").find("select").val(""),
                    e("#auto_step_1").find("#auto_vehicles_container").empty(),
                    e("#auto_step_2").find("#auto_drivers_container").empty();
                break;
            case "bond":
                e("#bond_step_1, #bond_step_2, #bondDetailsContainer")
                    .removeClass("step wizard-step")
                    .addClass("hidden"),
                    e("#bond_step_1, #bond_step_2").find("input").val(""),
                    e("#bond_step_1, #bond_step_2").find("select").val(""),
                    e("#bond_step_1")
                        .find("#bond_owner_if_married_container")
                        .empty(),
                    e("#bond_step_2")
                        .find("#bond_license_type_if_others_container")
                        .empty();
                break;
            case "excess":
                e("#excess_step_1, #excess_step_2, #excessDetailsContainer")
                    .removeClass("step wizard-step")
                    .addClass("hidden"),
                    e("#excess_step_1, #excess_step_2").find("input").val(""),
                    e("#excess_step_1, #excess_step_2").find("select").val(""),
                    e("#excess_step_1")
                        .find("#excess_no_losses_5years_container")
                        .empty();
                break;
            case "tools":
                e("#tools_step_1, #toolsDetailsContainer")
                    .removeClass("step wizard-step")
                    .addClass("hidden"),
                    e("#tools_step_1").find("input").val(""),
                    e("#tools_step_1").find("select").val(""),
                    e("#tools_step_1")
                        .find("#tools_no_losses_5years_container")
                        .empty();
                break;
            case "br":
                e("#br_step_1, #brDetailsContainer")
                    .removeClass("step wizard-step")
                    .addClass("hidden"),
                    e("#br_step_1").find("input").val(""),
                    e("#br_step_1").find("select").val("");
                break;
            case "pollution":
                e(
                    "#pollution_step_1, #pollution_step_2, #pollutionDetailsContainer"
                )
                    .removeClass("step wizard-step")
                    .addClass("hidden"),
                    e("#pollution_step_1, #pollution_step_2")
                        .find("input")
                        .val(""),
                    e("#pollution_step_1, #pollution_step_2")
                        .find("select")
                        .val(""),
                    e("#pollution_step_1, #pollution_descops").val(""),
                    e("#pollution_step_2, #pollution_explain_losses").val(""),
                    e("#pollution_step_2")
                        .find("#pollution_subcon_cost_container")
                        .val("");
        }
    }
    function r(s) {
        switch (s) {
            case "gl":
                e("#gl_step_1, #gl_step_2, #glDetailsContainer")
                    .addClass("step wizard-step")
                    .removeClass("hidden");
                break;
            case "wc":
                e("#wc_step_1, #wc_step_2, #wcDetailsContainer")
                    .addClass("step wizard-step")
                    .removeClass("hidden");
                break;
            case "auto":
                e("#auto_step_1, #auto_step_2, #autoDetailsContainer")
                    .addClass("step wizard-step")
                    .removeClass("hidden");
                break;
            case "bond":
                e("#bond_step_1, #bond_step_2, #bondDetailsContainer")
                    .addClass("step wizard-step")
                    .removeClass("hidden");
                break;
            case "excess":
                e("#excess_step_1, #excess_step_2, #excessDetailsContainer")
                    .addClass("step wizard-step")
                    .removeClass("hidden");
                break;
            case "tools":
                e("#tools_step_1, #toolsDetailsContainer")
                    .addClass("step wizard-step")
                    .removeClass("hidden");
                break;
            case "br":
                e("#br_step_1, #brDetailsContainer")
                    .addClass("step wizard-step")
                    .removeClass("hidden");
                break;
            case "pollution":
                e(
                    "#pollution_step_1, #pollution_step_2, #pollutionDetailsContainer"
                )
                    .addClass("step wizard-step")
                    .removeClass("hidden");
        }
    }
    function i(s, o) {
        let t = e("#" + s).val(),
            a = 100 - parseInt(t);
        e("#" + o).val(a.toString());
    }
    function c(e) {
        return new Intl.NumberFormat("en-US", {
            style: "currency",
            currency: "USD",
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        }).format(e);
    }
    function d(e) {
        flatpickr(e, { dateFormat: "m/d/Y", maxDate: "today" });
    }
    function u(s) {
        e(document).on("change", s, function () {
            var s = e(this).val().replace(/[$,]/g, "");
            if (((s = parseFloat(s || 0)), isNaN(s)))
                e(this).val(""),
                    toastr.error("Invalid input. Please enter a valid value.");
            else {
                e(this).data("numeric-value", s);
                var o = c(s);
                e(this).val(o);
            }
        }),
            e(document).on("focus", s, function () {
                var s = e(this).val();
                if ("" !== s) {
                    var o = parseFloat(s.replace(/[$,]/g, ""));
                    isNaN(o) || e(this).val(o);
                }
            }),
            e(document).on("blur", s, function () {
                var s = e(this).val();
                if ("" !== s) {
                    var o = parseFloat(s.replace(/[$,]/g, ""));
                    if (isNaN(o)) {
                        var t = e(this).data("numeric-value");
                        e(this).val(c(t));
                    } else e(this).data("numeric-value", o), e(this).val(c(o));
                }
            });
    }
    function p() {
        var s = e(this).val().replace(/[^\d]/g, "");
        s.length > 10 && (s = s.slice(0, 10)),
            7 == s.length
                ? (s = s.replace(/(\d{3})(\d{4})/, "$1-$2"))
                : 10 == s.length &&
                  (s = s.replace(/(\d{3})(\d{3})(\d{4})/, "($1) $2-$3")),
            e(this).val(s);
    }
    async function v(s) {
        try {
            await e.ajax({
                headers: {
                    "X-CSRF-TOKEN": e('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "/wc/showProfessionEntries",
                method: "POST",
                data: { a: s },
                cache: !1,
                success: function (s) {
                    e("#profession_entry_container").length &&
                        (e("#profession_entry_container").append(s.data),
                        u(".annual-payroll"));
                },
                error: function (e, s, o) {
                    toastr.error(o);
                },
            });
        } catch (o) {
            console.error(o);
        }
    }
    async function m(s) {
        try {
            await e.ajax({
                headers: {
                    "X-CSRF-TOKEN": e('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "/auto/showAutoVehicleEntries",
                method: "POST",
                data: { a: s },
                cache: !1,
                success: function (s) {
                    e("#auto_vehicles_container").length &&
                        e("#auto_vehicles_container").append(s.data);
                },
                error: function (e, s, o) {
                    toastr.error(o);
                },
            });
        } catch (o) {
            console.error(o);
        }
    }
    async function f(s) {
        try {
            await e.ajax({
                headers: {
                    "X-CSRF-TOKEN": e('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "/auto/showAutoDriverEntries",
                method: "POST",
                data: { a: s },
                cache: !1,
                success: function (s) {
                    e("#auto_drivers_container").length &&
                        (e("#auto_drivers_container").append(s.data),
                        d(".driver_birthdate"));
                },
                error: function (e, s, o) {
                    toastr.error(o);
                },
            }),
                e(`#auto_add_driver_civil_status_${s}`).on(
                    "change",
                    function () {
                        var o = e(this).val(),
                            t = `auto_driver_if_married_container_${s}`;
                        "Married" === o
                            ? e.ajax({
                                  headers: {
                                      "X-CSRF-TOKEN": e(
                                          'meta[name="csrf-token"]'
                                      ).attr("content"),
                                  },
                                  url: "/auto/showSpouseInformationForm",
                                  method: "POST",
                                  data: { a: s },
                                  cache: !1,
                                  success: function (s) {
                                      e(`#${t}`).html(s.data),
                                          d(".spouse_datebirth");
                                  },
                                  error: function (e, s, o) {
                                      toastr.error(o);
                                  },
                              })
                            : e(`#${t}`).empty();
                    }
                );
        } catch (o) {
            console.error(o);
        }
    }
    function h(s, o, t) {
        e("#" + s).on("change", function () {
            e("#custom-loader").removeClass("hidden"),
                e("#custom-loader").addClass("active"),
                1 == e(this).val()
                    ? setTimeout(function () {
                          o();
                      }, 0)
                    : (0 == e(this).val() || "" === e(this).val()) &&
                      (e("#" + t)
                          .parent()
                          .parent()
                          .remove(),
                      e("#custom-loader").addClass("hidden"),
                      e("#custom-loader").removeClass("active"));
        });
    }
    n.on("submit", function () {
        n.validate(), n.valid() && e("#loader_form").fadeIn();
    }),
        e("#modal_h").magnificPopup({
            type: "inline",
            fixedContentPos: !0,
            fixedBgPos: !0,
            overflowY: "auto",
            closeBtnInside: !0,
            preloader: !1,
            midClick: !0,
            removalDelay: 300,
            closeMarkup:
                '<button title="%title%" type="button" class="mfp-close"></button>',
            mainClass: "my-mfp-zoom-in",
        }),
        localStorage.clear(),
        e('input[name="question_1[]"]').each(function () {
            var s = e(this).val();
            null === localStorage.getItem(s) &&
                localStorage.setItem(
                    s,
                    e(this).is(":checked") ? "checked" : "unchecked"
                );
        }),
        e('input[name="question_1[]"]').each(function () {
            var s = e(this).val(),
                o = localStorage.getItem(s);
            "unchecked" === o
                ? (e(this).prop("checked", !1), l(s))
                : "checked" === o && (e(this).prop("checked", !0), r(s));
        }),
        e('input[name="question_1[]"]').change(function () {
            var s = e(this).val();
            e(this).is(":checked")
                ? (localStorage.setItem(s, "checked"), r(s))
                : (localStorage.setItem(s, "unchecked"), l(s));
        }),
        (e.fn.feinFormat = function () {
            return this.on("input blur", function () {
                var s = e(this)
                    .val()
                    .replace(/[^0-9]/g, "")
                    .slice(0, 9);
                if (9 === s.length) {
                    var o = s.substring(0, 2) + "-" + s.substring(2);
                    e(this).val(o);
                }
            });
        }),
        (e.fn.ssnFormat = function () {
            return this.on("input blur", function () {
                var s = e(this),
                    o = s
                        .val()
                        .replace(/[^0-9]/g, "")
                        .slice(0, 9);
                if (9 === o.length) {
                    var t,
                        a =
                            o.substring(0, 3) +
                            "-" +
                            (o.substring(3, 5) + "-") +
                            o.substring(5);
                    s.val(a);
                }
            });
        }),
        e("#phone_number").on("input", p),
        e("#fax_number").on("input", p),
        d("#wc_dob"),
        e("#gl_residential").change(function () {
            setTimeout(function () {
                i("gl_residential", "gl_commercial");
            }, 0);
        }),
        e("#gl_commercial").change(function () {
            setTimeout(function () {
                i("gl_commercial", "gl_residential");
            }, 0);
        }),
        e("#gl_new_construction").change(function () {
            setTimeout(function () {
                i("gl_new_construction", "gl_repair_remodel");
            }, 0);
        }),
        e("#gl_repair_remodel").change(function () {
            setTimeout(function () {
                i("gl_repair_remodel", "gl_new_construction");
            }, 0);
        }),
        u("#gl_cost_proj_5years"),
        u("#gl_annual_gross"),
        u("#gl_payroll_amt"),
        u("#gl_subcon_cost"),
        h(
            "gl_using_subcon",
            function s() {
                e.ajax({
                    success: function (s) {
                        e("#custom-loader").addClass("hidden"),
                            e("#custom-loader").removeClass("active"),
                            e("#gl_subcon_cost_container").append(`
					<div class="col-md-12">
						<div class="mb-3 form-floating">
							<input type="text" name="gl_subcon_cost" id="gl_subcon_cost" class="form-control" placeholder="" maxlength="20">
							<label for="gl_subcon_cost">Subcontractor Cost</label>
						</div>
					</div>
				`);
                    },
                    error: function (s, o, t) {
                        e("#custom-loader").addClass("hidden"),
                            e("#custom-loader").removeClass("active"),
                            toastr.error(t);
                    },
                });
            },
            "gl_subcon_cost"
        ),
        e("#gl_no_losses_5years").on("change", function () {
            let s = parseInt(e(this).val());
            s > 0
                ? (e("#custom-loader").removeClass("hidden"),
                  e("#custom-loader").addClass("active"),
                  setTimeout(function () {
                      e.ajax({
                          success: function (s) {
                              e("#custom-loader").addClass("hidden"),
                                  e("#custom-loader").removeClass("active"),
                                  e("#gl_explain_losses_container").html(`
					<div class="col-md-12">
						<div class="mb-3 form-floating">
							<textarea style="resize: none;" name="gl_explain_losses" id="gl_explain_losses" class="form-control" placeholder="Please explain"></textarea>
							<label for="gl_explain_losses">Explain Losses (Please include loss amount)</label>
						</div>
					</div>
				`);
                          },
                          error: function (s, o, t) {
                              e("#custom-loader").addClass("hidden"),
                                  e("#custom-loader").removeClass("active"),
                                  toastr.error(t);
                          },
                      });
                  }, 0))
                : (e("#gl_explain_losses").parent().parent().remove(),
                  e("#custom-loader").addClass("hidden"),
                  e("#custom-loader").removeClass("active"));
        }),
        e("#wc_no_of_profession").on("change", async function () {
            var s = e(this).val();
            e("#profession_entry_container").empty();
            for (var o = 1; o <= s; o++) await v(o);
        }),
        u("#wc_subcon_cost_year"),
        u("#wc_gross_receipt"),
        e("#wc_does_hire_subcon").on("change", function () {
            e("#custom-loader").removeClass("hidden"),
                e("#custom-loader").addClass("active"),
                1 == e(this).val()
                    ? setTimeout(function () {
                          e.ajax({
                              success: function (s) {
                                  e("#custom-loader").addClass("hidden"),
                                      e("#custom-loader").removeClass("active"),
                                      e("#wc_subcon_cost_year_container")
                                          .append(`
					<div class="col-md-12">
						<div class="mb-3 form-floating">
							<input type="text" name="wc_subcon_cost_year" id="wc_subcon_cost_year" class="form-control" placeholder="" maxlength="20">
							<label for="wc_subcon_cost_year">Subcontractor cost in a year</label>
						</div>
					</div>
				`);
                              },
                              error: function (s, o, t) {
                                  e("#custom-loader").addClass("hidden"),
                                      e("#custom-loader").removeClass("active"),
                                      toastr.error(t);
                              },
                          });
                      }, 0)
                    : (0 == e(this).val() || "" === e(this).val()) &&
                      (e("#wc_subcon_cost_year").parent().parent().remove(),
                      e("#custom-loader").addClass("hidden"),
                      e("#custom-loader").removeClass("active"));
        }),
        e("#wc_fein").feinFormat(),
        e("#wc_ssn").ssnFormat(),
        e(document).ready(function () {
            e("#auto_add_vehicle").trigger("change");
        }),
        e("#auto_add_vehicle").on("change", async function () {
            var s = e(this).val();
            e("#auto_vehicles_container").empty();
            for (var o = 1; o <= s; o++) await m(o);
        }),
        e(document).ready(function () {
            e("#auto_add_driver").trigger("change");
        }),
        e("#auto_add_driver").on("change", async function () {
            var s = e(this).val();
            e("#auto_drivers_container").empty();
            for (var o = 1; o <= s; o++) await f(o);
        }),
        e("#bond_owners_ssn").ssnFormat(),
        d("#bond_owners_dob"),
        e("#bond_owners_civil_status").on("change", function () {
            e("#custom-loader").removeClass("hidden"),
                e("#custom-loader").addClass("active"),
                "Married" === e(this).val()
                    ? (setTimeout(function () {
                          e.ajax({
                              success: function (s) {
                                  e("#custom-loader").addClass("hidden"),
                                      e("#custom-loader").removeClass("active"),
                                      e("#bond_owner_if_married_container")
                                          .append(`
					<div class="col-md-12">
						<div class="mb-3 form-floating">
							<input type="text" name="bond_owners_spouse_name" id="bond_owners_spouse_name" class="form-control" placeholder="" maxlength="100">
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
                              },
                              complete: function () {
                                  d("#bond_owners_spouse_dob"),
                                      e("#bond_owners_spouse_ssn").ssnFormat();
                              },
                              error: function (s, o, t) {
                                  e("#custom-loader").addClass("hidden"),
                                      e("#custom-loader").removeClass("active"),
                                      toastr.error(t);
                              },
                          });
                      }, 0),
                      d("#bond_owners_spouse_dob"),
                      e("#bond_owners_spouse_ssn").ssnFormat())
                    : (e("#bond_owner_if_married_container").empty(),
                      e("#custom-loader").addClass("hidden"),
                      e("#custom-loader").removeClass("active"));
        }),
        u("#bond_amount_of_bond"),
        e("#bond_type_of_license").on("change", function () {
            e("#custom-loader").removeClass("hidden"),
                e("#custom-loader").addClass("active"),
                "Others" === e(this).val()
                    ? setTimeout(function () {
                          e.ajax({
                              success: function (s) {
                                  e("#custom-loader").addClass("hidden"),
                                      e("#custom-loader").removeClass("active"),
                                      e(
                                          "#bond_license_type_if_others_container"
                                      ).append(`
					<div class="col-md-12">
						<div class="mb-3 form-floating">
							<input type="text" name="bond_if_other_type_of_license" id="bond_if_other_type_of_license" class="form-control" placeholder="">
							<label for="bond_if_other_type_of_license">If others, please specify</label>
						</div>
					</div>
				`);
                              },
                              error: function (s, o, t) {
                                  e("#custom-loader").addClass("hidden"),
                                      e("#custom-loader").removeClass("active"),
                                      toastr.error(t);
                              },
                          });
                      }, 0)
                    : (e("#bond_license_type_if_others_container").empty(),
                      e("#custom-loader").addClass("hidden"),
                      e("#custom-loader").removeClass("active"));
        }),
        d("#bond_effective_date"),
        u("#excess_limits"),
        u("#excess_policy_premium"),
        e("#excess_no_losses_5years").on("change", function () {
            let s = parseInt(e(this).val());
            s >= 1
                ? (e("#custom-loader").removeClass("hidden"),
                  e("#custom-loader").addClass("active"),
                  setTimeout(function () {
                      e.ajax({
                          success: function (s) {
                              e("#custom-loader").addClass("hidden"),
                                  e("#custom-loader").removeClass("active"),
                                  e("#excess_no_losses_5years_container").html(`
					<div class="col-md-12">
						<div class="mb-3 form-floating">
							<textarea style="resize: none;" name="excess_explain_losses" id="excess_explain_losses" class="form-control" placeholder="Please explain"></textarea>
							<label for="excess_explain_losses">Explain Losses (Please include loss amount)</label>
						</div>
					</div>
				`);
                          },
                          error: function (s, o, t) {
                              e("#custom-loader").addClass("hidden"),
                                  e("#custom-loader").removeClass("active"),
                                  toastr.error(t);
                          },
                      });
                  }, 0))
                : (e("#excess_explain_losses").parent().parent().remove(),
                  e("#custom-loader").addClass("hidden"),
                  e("#custom-loader").removeClass("active"));
        }),
        d("#excess_gl_eff_date"),
        d("#excess_effective_date"),
        d("#excess_expiration_date");
    var b = "#tools_misc_tools";
    e(document).on("change", b, function () {
        var s = e(this).val().replace(/[$,]/g, "");
        (s = parseFloat(s || 0)), e(this).data("numeric-value", s);
        var o = c(s);
        s > 1500
            ? (toastr.error("Miscellaneous Tools Value must be under $1,500"),
              e(this).val(""),
              e(this).data("numeric-value", 0))
            : e(this).val(o);
    }),
        e(document).on("focus", b, function () {
            var s = e(this).val();
            if ("" !== s) {
                var o = parseFloat(s.replace(/[$,]/g, ""));
                isNaN(o) || e(this).val(o);
            }
        }),
        e(document).on("blur", b, function () {
            var s = e(this).val();
            if ("" !== s) {
                var o = parseFloat(s.replace(/[$,]/g, ""));
                isNaN(o)
                    ? (e(this).val(""), e(this).data("numeric-value", 0))
                    : (e(this).data("numeric-value", o), e(this).val(c(o)));
            }
        }),
        u("#tools_rented_or_leased_amt");
    var g = "#tools_sched_equipment";
    e(document).on("change", g, function () {
        var s = e(this).val().replace(/[$,]/g, "");
        (s = parseFloat(s || 0)), e(this).data("numeric-value", s);
        var o = c(s);
        s < 1500
            ? (toastr.error("Scheduled Equipment Value must be above $1,500"),
              e(this).val(""),
              e(this).data("numeric-value", 0))
            : e(this).val(o);
    }),
        e(document).on("focus", g, function () {
            var s = e(this).val();
            if ("" !== s) {
                var o = parseFloat(s.replace(/[$,]/g, ""));
                isNaN(o) || e(this).val(o);
            }
        }),
        e(document).on("blur", g, function () {
            var s = e(this).val();
            if ("" !== s) {
                var o = parseFloat(s.replace(/[$,]/g, ""));
                isNaN(o)
                    ? (e(this).val(""), e(this).data("numeric-value", 0))
                    : (e(this).data("numeric-value", o), e(this).val(c(o)));
            }
        }),
        e("#tools_no_losses_5years").on("change", function () {
            let s = parseInt(e(this).val());
            s >= 1
                ? (e("#custom-loader").removeClass("hidden"),
                  e("#custom-loader").addClass("active"),
                  setTimeout(function () {
                      e.ajax({
                          success: function (s) {
                              e("#custom-loader").addClass("hidden"),
                                  e("#custom-loader").removeClass("active"),
                                  e("#tools_no_losses_5years_container").html(`
					<div class="col-md-12">
						<div class="mb-3 form-floating">
							<textarea style="resize: none;" name="tools_explain_losses" id="tools_explain_losses" class="form-control" placeholder="Please explain"></textarea>
							<label for="tools_explain_losses">Explain Losses (Please include loss amount)</label>
						</div>
					</div>
				`);
                          },
                          error: function (s, o, t) {
                              e("#custom-loader").addClass("hidden"),
                                  e("#custom-loader").removeClass("active"),
                                  toastr.error(t);
                          },
                      });
                  }, 0))
                : (e("#tools_explain_losses").parent().parent().remove(),
                  e("#custom-loader").addClass("hidden"),
                  e("#custom-loader").removeClass("active"));
        }),
        u("#br_value_of_existing_structure"),
        u("#br_value_of_work_performed"),
        e("#pollution_residential").change(function () {
            setTimeout(function () {
                i("pollution_residential", "pollution_commercial");
            }, 0);
        }),
        e("#pollution_commercial").change(function () {
            setTimeout(function () {
                i("pollution_commercial", "pollution_residential");
            }, 0);
        }),
        e("#pollution_new_construction").change(function () {
            setTimeout(function () {
                i("pollution_new_construction", "pollution_repair_remodel");
            }, 0);
        }),
        e("#pollution_repair_remodel").change(function () {
            setTimeout(function () {
                i("pollution_repair_remodel", "pollution_new_construction");
            }, 0);
        }),
        u("#pollution_cost_proj_5years"),
        u("#pollution_annual_gross"),
        u("#pollution_payroll_amt"),
        u("#pollution_subcon_cost"),
        h(
            "pollution_using_subcon",
            function s() {
                e.ajax({
                    success: function (s) {
                        e("#custom-loader").addClass("hidden"),
                            e("#custom-loader").removeClass("active"),
                            e("#pollution_subcon_cost_container").append(`
					<div class="col-md-12">
						<div class="mb-3 form-floating">
							<input type="text" name="pollution_subcon_cost" id="pollution_subcon_cost" class="form-control" placeholder="">
							<label for="pollution_subcon_cost">Subcontractor Cost</label>
						</div>
					</div>
				`);
                    },
                    error: function (s, o, t) {
                        e("#custom-loader").addClass("hidden"),
                            e("#custom-loader").removeClass("active"),
                            toastr.error(t);
                    },
                });
            },
            "pollution_subcon_cost"
        ),
        e("#pollution_no_losses_5years").on("change", function () {
            let s = parseInt(e(this).val());
            s >= 1
                ? (e("#custom-loader").removeClass("hidden"),
                  e("#custom-loader").addClass("active"),
                  setTimeout(function () {
                      e.ajax({
                          success: function (s) {
                              e("#custom-loader").addClass("hidden"),
                                  e("#custom-loader").removeClass("active"),
                                  e("#pollution_explain_losses_container")
                                      .html(`
					<div class="col-md-12">
						<div class="mb-3 form-floating">
							<textarea style="resize: none;" name="pollution_explain_losses" id="pollution_explain_losses" class="form-control" placeholder="Please explain"></textarea>
							<label for="pollution_explain_losses">Explain Losses (Please include loss amount)</label>
						</div>
					</div>
				`);
                          },
                          error: function (s, o, t) {
                              e("#custom-loader").addClass("hidden"),
                                  e("#custom-loader").removeClass("active"),
                                  toastr.error(t);
                          },
                      });
                  }, 0))
                : (e("#pollution_explain_losses").parent().parent().remove(),
                  e("#custom-loader").addClass("hidden"),
                  e("#custom-loader").removeClass("active"));
        }),
        d("#ayc_date_business_started"),
        e("#ayc_phone_number").on("input", p);
})(window.jQuery);
