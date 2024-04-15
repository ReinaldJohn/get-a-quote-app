<div class="step" id="wc_step_1">
    @if (session('doesWCChecked') === 'true')
        <div class="question_title">
            <h3>Worker’s Compensation Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>

        <div class="d-flex justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="wc_num_of_empl" id="wc_num_of_empl" class="form-control required"
                        placeholder="Total Employee (Full Time + Part Time)" />
                    <label for="wc_num_of_empl">Number Of Total Employees (Full Time + Part
                        Time)</label>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between professionEntries">
            <h5 class="profession_header mt-2 mb-2">Worker's Compensation Employee's Profession
                Entry:</h5>
            <button id="add_wc_employee_entry" class="btn_2">+</button>
        </div>
        <div class="row justify-content-center">
            <h6 class="profession_header mt-2 mb-2">Employee's Profession Entry No. 1</h6>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="wc_profession_type_1" id="wc_profession_type_1"
                        aria-label="wc_profession_type_1">
                        <!-- For wcProfessions -->
                        <optgroup label='Other Professions'>
                            @if (isset($wcProfessions))
                                @foreach ($wcProfessions as $wcProfession)
                                    <option value="{{ $wcProfession->id }}">
                                        {{ $wcProfession->name }}</option>
                                @endforeach
                            @endif
                        </optgroup>

                        <!-- For general professions -->
                        <optgroup label='All Professions'>
                            @foreach ($professions as $profession)
                                <option value="{{ $profession->id }}">
                                    {{ $profession->name }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                    <label for="wc_profession_type_1">Profession Type:</label>
                </div>
            </div>
            <div id='wc_profession_type_if_other_1'></div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="wc_annual_payroll_1" id="wc_annual_payroll_1"
                        class="form-control required wc-annual-payroll" placeholder="" />
                    <label for="wc_annual_payroll_1">Annual Payroll:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="wc_num_employee_under_this_profession_1"
                        id="wc_num_employee_under_this_profession_1" class="form-control required" placeholder="" />
                    <label for="wc_num_employee_under_this_profession_1">Number of Employee
                        under this Profession (Number
                        only):</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" id="wc_professions_container">
        </div>
    @endif
</div>

<div class="step" id="wc_step_2">
    @if (session('doesWCChecked') === 'true')
        <div class="question_title">
            <h3>Worker’s Compensation Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="wc_gross_receipt" id="wc_gross_receipt" class="form-control required"
                        placeholder="Gross Receipt">
                    <label for="wc_gross_receipt">Gross Receipt</label>
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="wc_does_hire_subcon" id="wc_does_hire_subcon"
                        aria-label="wc_does_hire_subcon">
                        <option value selected></option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <label for="wc_does_hire_subcon">Do you hire
                        subcontractor?</label>
                </div>
            </div>
            <!--  -->
            <div id="wc_subcon_cost_year_container"></div>
            <!--  -->

            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="wc_no_of_losses" id="wc_no_of_losses"
                        aria-label="wc_no_of_losses">
                        <option selected></option>
                        <option value="0">No Losses</option>
                        <option value="1">1 yr. No Losses</option>
                        <option value="3">3 yrs. No Losses</option>
                        <option value="5">5 yrs. No Losses</option>
                        <option value="-1">Have Losses</option>
                    </select>
                    <label for="wc_no_of_losses">Worker's Compensation - # of
                        Losses</label>
                </div>
            </div>
            <div id="wc_losses_container"></div>
        </div>
    @endif
</div>

<div class="step" id="wc_step_3">
    @if (session('doesWCChecked') === 'true')
        <div class="question_title">
            <h3>Worker’s Compensation Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h5 class="profession_header mt-2 mb-2">Owner's Information</h5>
                <div class="mb-3 form-floating">
                    <input type="text" name="wc_name" id="wc_name" class="form-control required" placeholder="">
                    <label for="wc_name">Owner's Name</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="wc_title_relationship" id="wc_title_relationship"
                        class="form-control required" placeholder="">
                    <label for="wc_title_relationship">Title / Relationship</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="wc_ownership_perc" id="wc_ownership_perc"
                        aria-label="wc_ownership_perc">
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
                    <select class="form-select required" name="wc_exc_inc" id="wc_exc_inc" aria-label="wc_exc_inc">
                        <option value selected></option>
                        <option value="Excluded">Excluded</option>
                        <option value="Included">Included</option>
                    </select>
                    <label for="wc_exc_inc">Excluded / Included</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="wc_ssn" id="wc_ssn" class="form-control required"
                        placeholder="SSN">
                    <label for="wc_ssn">SSN</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="wc_fein" id="wc_fein" class="form-control required"
                        placeholder="FEIN">
                    <label for="wc_fein">FEIN</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="wc_dob" id="wc_dob" class="form-control required"
                        placeholder="MM/DD/YYYY">
                    <label for="wc_dob">Date of Birth</label>
                </div>
            </div>
        </div>
        <div id="owners_information_container"></div>
    @endif
</div>
