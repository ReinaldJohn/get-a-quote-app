<div class="step" id="eo_step_1">
    @if (session('doesEOChecked') === 'true')
        <div class="question_title">
            <h3>Errors and Omission</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select" name="eo_requested_limits" id="eo_requested_limits" aria-label="">
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
                    <select class="form-select" name="eo_request_deductible" id="eo_request_deductible" aria-label="">
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
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select" name="eo_no_of_losses" id="eo_no_of_losses"
                        aria-label="eo_no_of_losses">
                        <option selected></option>
                        <option value="0">No Losses</option>
                        <option value="1">1 yr. No Losses</option>
                        <option value="3">3 yrs. No Losses</option>
                        <option value="5">5 yrs. No Losses</option>
                        <option value="-1">Have Losses</option>
                    </select>
                    <label for="eo_no_of_losses">Error's and Omission - # of
                        Losses</label>
                </div>
            </div>
            <!--  -->
            <div id="eo_losses_container"></div>
            <!--  -->
        </div>
    @endif
</div>
<!-- /Step -->

<!-- Errors and Omission Stepper 2 -->
<div class="step" id="eo_step_2">
    @if (session('doesEOChecked') === 'true')
        <div class="question_title">
            <h3>Errors and Omission</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <h5 class="profession_header mt-2 mb-2">Business Entity</h5>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Has the name or ownership
                    of the
                    entity changed
                    within
                    the last 5 years?</h6>
                <div class="mb-3 form-floating">
                    <select class="form-select" name="eo_business_entity_q1" id="eo_business_entity_q1" aria-label="">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="eo_business_entity_q1">Please select:</label>
                </div>
            </div>
            <div id="eo_business_entity_q1_container"></div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Has any other business
                    been
                    purchased merged or
                    consolidated with the entity within the last 5
                    years?</h6>
                <div class="mb-3 form-floating">
                    <select class="form-select" name="eo_business_entity_q2" id="eo_business_entity_q2" aria-label="">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="eo_business_entity_q2">Please select:</label>
                </div>
            </div>
            <div id="eo_business_entity_q2_container"></div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Does any other entity own
                    or
                    control your
                    business?</h6>
                <div class="mb-3 form-floating">
                    <select class="form-select" name="eo_business_entity_q3" id="eo_business_entity_q3" aria-label="">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="eo_business_entity_q3">Please select:</label>
                </div>
            </div>
            <div id="eo_business_entity_q3_container"></div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Has your company name been
                    changed
                    during the
                    past 5
                    years?</h6>
                <div class="mb-3 form-floating">
                    <select class="form-select" name="eo_business_entity_q4" id="eo_business_entity_q4" aria-label="">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="eo_business_entity_q4">Please select:</label>
                </div>
            </div>
            <div id="eo_business_entity_q4_container"></div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Has any other business
                    purchased,
                    merged or
                    consolidated with you during the past 5 years?</h6>
                <div class="mb-3 form-floating">
                    <select class="form-select" name="eo_business_entity_q5" id="eo_business_entity_q5"
                        aria-label="">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="eo_business_entity_q5">Please select:</label>
                </div>
            </div>
            <div id="eo_business_entity_q5_container"></div>
        </div>
    @endif
</div>
<!-- /Step -->

<!-- Errors and Omission Stepper 3 -->
<div class="step" id="eo_step_3">
    @if (session('doesEOChecked') === 'true')
        <div class="question_title">
            <h3>Errors and Omission</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <h5 class="profession_header mt-2 mb-2">Employees</h5>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="eo_number_employee" id="eo_number_employee" class="form-control"
                        placeholder="Number of Employees:" />
                    <label for="eo_number_employee">Number of Employees:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="eo_full_time" id="eo_full_time" class="form-control"
                        placeholder="Full Time:" />
                    <label for="eo_full_time">Full Time:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="eo_ftime_salary_range" id="eo_ftime_salary_range"
                        class="form-control" placeholder="Salary Range:" />
                    <label for="eo_ftime_salary_range">Salary Range:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="eo_part_time" id="eo_part_time" class="form-control"
                        placeholder="Part Time:" />
                    <label for="eo_part_time">Part Time:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="eo_ptime_salary_range" id="eo_ptime_salary_range"
                        class="form-control" placeholder="Salary Range:" />
                    <label for="eo_ptime_salary_range">Salary Range:</label>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- /Step -->

<!-- Errors and Omission Stepper 4 -->
<div class="step" id="eo_step_4">
    @if (session('doesEOChecked') === 'true')
        <div class="question_title">
            <h3>Errors and Omission</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <h5 class="profession_header mt-2 mb-2">Employment Practices</h5>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Has the applicant total
                    number of
                    employees
                    decreased
                    by more than ten percent (10) due to lay off, force
                    reduction of closing of division in the past 1 year?</h6>
                <div class="mb-3 form-floating">
                    <select class="form-select" name="eo_emp_practice_q1" id="eo_emp_practice_q1" aria-label="">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="eo_emp_practice_q1">Please select:
                    </label>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- /Step -->

<!-- Errors and Omission Stepper 5 -->
<div class="step" id="eo_step_5">
    @if (session('doesEOChecked') === 'true')
        <div class="question_title">
            <h3>Errors and Omission</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <h5 class="profession_header mt-2 mb-2">Human Resources</h5>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Does the Applicant have
                    written
                    employment
                    agreements
                    with all officers?</h6>
                <div class="mb-3 form-floating">
                    <select class="form-select" name="eo_hr_q1" id="eo_hr_q1" aria-label="eo_hr_q1">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="eo_hr_q1">Please select:</label>
                </div>
            </div>
            <div id="eo_hr_q1_container"></div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Does the Applicant have
                    its
                    employment
                    policies/procedures reviewed by labor or employment
                    counsel?</h6>
                <div class="mb-3 form-floating">
                    <select class="form-select" name="eo_hr_q2" id="eo_hr_q2" aria-label="eo_hr_q2">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="eo_hr_q2">Please select:</label>
                </div>
            </div>
            <div id="eo_hr_q2_container"></div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Does the Applicant have a
                    Human
                    Resources or
                    Personnel
                    Department?</h6>
                <div class="mb-3 form-floating">
                    <select class="form-select" name="eo_hr_q3" id="eo_hr_q3" aria-label="eo_hr_q3">
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
                    <select class="form-select" name="eo_hr_q4" id="eo_hr_q4" aria-label="eo_hr_q4">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="eo_hr_q4">Please select:</label>
                </div>
            </div>
            <div id="eo_hr_q4_container"></div>
        </div>
    @endif
</div>
