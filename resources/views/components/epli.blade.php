<div class="step" id="epli_step_1">
    @if (session('doesEPLIChecked') === 'true')
        <div class="question_title">
            <h3>Employment Practices Liability Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="epli_fein" id="epli_fein" class="form-control" placeholder="FEIN No.:" />
                    <label for="epli_fein">FEIN No.:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="epli_current_epli" id="epli_current_epli" class="form-control"
                        placeholder="Current EPLI:" />
                    <label for="epli_current_epli">Current EPLI:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="epli_prior_carrier" id="epli_prior_carrier" class="form-control"
                        placeholder="Prior Carrier:" />
                    <label for="epli_prior_carrier">Prior Carrier:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="epli_prior_carrier_epli" id="epli_prior_carrier_epli"
                        class="form-control" placeholder="Prior Carrier EPLI:" />
                    <label for="epli_prior_carrier_epli">Prior Carrier
                        EPLI:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="epli_effective_date" id="epli_effective_date" class="form-control"
                        placeholder="Effective Date:" />
                    <label for="epli_effective_date">Effective Date:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="epli_prev_premium_amount" id="epli_prev_premium_amount"
                        class="form-control" placeholder="Previous Premium Amount:" />
                    <label for="epli_prev_premium_amount">Previous Premium
                        Amount:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    {{-- <input type="text" name="epli_deductible_amount"
                            id="epli_deductible_amount" class="form-control"
                            placeholder="Deductible Amount:"  /> --}}
                    <select class="form-select" name="epli_deductible_amount" id="epli_deductible_amount"
                        aria-label="epli_deductible_amount">
                        <option selected></option>
                        <option value="5000">$5,000</option>
                        <option value="10000">$10,000</option>
                        <option value="25000">$25,000</option>
                        <option value="Others">Others</option>
                    </select>
                    <label for="epli_deductible_amount">Deductible Per Claim:</label>
                </div>
            </div>
            <div id="epli_deductible_amount_if_others_container"></div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select" name="epli_no_of_losses" id="epli_no_of_losses"
                        aria-label="epli_no_of_losses">
                        <option selected></option>
                        <option value="0">No Losses</option>
                        <option value="1">1 yr. No Losses</option>
                        <option value="3">3 yrs. No Losses</option>
                        <option value="5">5 yrs. No Losses</option>
                        <option value="-1">Have Losses</option>
                    </select>
                    <label for="epli_no_of_losses">EPLI - # of
                        Losses</label>
                </div>
            </div>
            <!--  -->
            <div id="epli_losses_container"></div>
            <!--  -->
        </div>
    @endif
</div>
<!-- /Step -->

<!-- EPLI Stepper 2 -->
<div class="step" id="epli_step_2">
    @if (session('doesEPLIChecked') === 'true')
        <div class="question_title">
            <h3>Employment Practices Liability Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <h5 class="profession_header mt-2 mb-2">How many employees are:</h5>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="epli_full_time" id="epli_full_time" class="form-control"
                        placeholder="Full Time:" />
                    <label for="epli_full_time">Full Time:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="epli_part_time" id="epli_part_time" class="form-control"
                        placeholder="Part Time:" />
                    <label for="epli_part_time">Part Time:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="epli_independent_contractors" id="epli_independent_contractors"
                        class="form-control" placeholder="Independent Contractors:" />
                    <label for="epli_independent_contractors">Independent
                        Contractors:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="epli_volunteers" id="epli_volunteers" class="form-control"
                        placeholder="Volunteers:" />
                    <label for="epli_volunteers">Volunteers:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="epli_leased_seasonal" id="epli_leased_seasonal" class="form-control"
                        placeholder="Leased or Seasonal:" />
                    <label for="epli_leased_seasonal">Leased or Seasonal:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="epli_non_us_base_emp" id="epli_non_us_base_emp" class="form-control"
                        placeholder="Non-US base Emp.:" />
                    <label for="epli_non_us_base_emp">Non-US base Emp.:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="epli_total_employees" id="epli_total_employees" class="form-control"
                        placeholder="Total Employees:" />
                    <label for="epli_total_employees">Total Employees:</label>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- /Step -->

<!-- EPLI Stepper 3 -->
<div class="step" id="epli_step_3">
    @if (session('doesEPLIChecked') === 'true')
        <div class="question_title">
            <h3>Employment Practices Liability Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <h5 class="profession_header mt-2 mb-2">How many employees are located at:
        </h5>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="epli_located_at_ca" id="epli_located_at_ca" class="form-control"
                        placeholder="CA:" />
                    <label for="epli_located_at_ca">CA:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="epli_located_at_ga" id="epli_located_at_ga" class="form-control"
                        placeholder="GA:" />
                    <label for="epli_located_at_ga">GA:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="epli_located_at_tx" id="epli_located_at_tx" class="form-control"
                        placeholder="TX:" />
                    <label for="epli_located_at_tx">TX:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="epli_located_at_fl" id="epli_located_at_fl" class="form-control"
                        placeholder="FL:" />
                    <label for="epli_located_at_fl">FL:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="epli_located_at_ny" id="epli_located_at_ny" class="form-control"
                        placeholder="NY:" />
                    <label for="epli_located_at_ny">NY:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="epli_located_at_nj" id="epli_located_at_nj" class="form-control"
                        placeholder="NJ:" />
                    <label for="epli_located_at_nj">NJ:</label>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- /Step -->

<!-- EPLI Stepper 4 -->
<div class="step" id="epli_step_4">
    @if (session('doesEPLIChecked') === 'true')
        <div class="question_title">
            <h3>Employment Practices Liability Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <h5 class="profession_header mt-2 mb-2">How many percent of employees are
            in the
            salary range of:</h5>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select" name="epli_salary_range_q1" id="epli_salary_range_q1"
                        aria-label="epli_salary_range_q1">
                        <option value selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    <label for="epli_salary_range_q1">Up to $60,000:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select" name="epli_salary_range_q2" id="epli_salary_range_q2"
                        aria-label="epli_salary_range_q2">
                        <option value selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    <label for="epli_salary_range_q2">$60,000 - $120,000:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select" name="epli_salary_range_q3" id="epli_salary_range_q3"
                        aria-label="epli_salary_range_q3">
                        <option value selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    <label for="epli_salary_range_q3">Over $120,000:</label>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- /Step -->

<!-- EPLI Stepper 5 -->
<div class="step" id="epli_step_5">
    @if (session('doesEPLIChecked') === 'true')
        <div class="question_title">
            <h3>Employment Practices Liability Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <h5 class="profession_header mt-2 mb-2">How many employees have been
            terminated in
            the last 12 months:</h5>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="epli_emp_terminated_last_12_months_q1"
                        id="epli_emp_terminated_last_12_months_q1" class="form-control" placeholder="Voluntary:" />
                    <label for="epli_emp_terminated_last_12_months_q1">Voluntary:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="epli_emp_terminated_last_12_months_q2"
                        id="epli_emp_terminated_last_12_months_q2" class="form-control" placeholder="Involuntary:" />
                    <label for="epli_emp_terminated_last_12_months_q2">Involuntary:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="epli_emp_terminated_last_12_months_q3"
                        id="epli_emp_terminated_last_12_months_q3" class="form-control" placeholder="Laid-Off:" />
                    <label for="epli_emp_terminated_last_12_months_q3">Laid-Off:</label>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- /Step -->

<!-- EPLI Stepper 6 -->
<div class="step" id="epli_step_6">
    @if (session('doesEPLIChecked') === 'true')
        <div class="question_title">
            <h3>Employment Practices Liability Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <h5 class="profession_header mt-2 mb-2">Human Resource Policies and
            Procedures:
        </h5>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Does the Applicant have a
                    standard
                    employment application for all applicants?</h6>
                <div class="mb-3 form-floating">
                    <select class="form-select" name="epli_hr_q1" id="epli_hr_q1" aria-label="epli_hr_q1">
                        <option value selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="epli_hr_q1">Please select:</label>
                </div>
            </div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Does the Applicant have an
                    "At
                    Will" provision in the employment application?</h6>
                <div class="mb-3 form-floating">
                    <select class="form-select" name="epli_hr_q2" id="epli_hr_q2" aria-label="epli_hr_q2">
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
                    <select class="form-select" name="epli_hr_q3" id="epli_hr_q3" aria-label="epli_hr_q3">
                        <option value selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="epli_hr_q3">Please select:</label>
                </div>
            </div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Does the Applicant have a
                    written
                    policy with respect to sexual harassment?
                </h6>
                <div class="mb-3 form-floating">
                    <select class="form-select" name="epli_hr_q4" id="epli_hr_q4" aria-label="epli_hr_q4">
                        <option value selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="epli_hr_q4">Please select:</label>
                </div>
            </div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Does the Applicant have a
                    written
                    policy with respect to discrimination?
                </h6>
                <div class="mb-3 form-floating">
                    <select class="form-select" name="epli_hr_q5" id="epli_hr_q5" aria-label="epli_hr_q5">
                        <option value selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="epli_hr_q5">Please select:</label>
                </div>
            </div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Does the Applicant have
                    written
                    annual evaluations for employees?</h6>
                <div class="mb-3 form-floating">
                    <select class="form-select" name="epli_hr_q6" id="epli_hr_q6" aria-label="">
                        <option value selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="epli_hr_q6">Please select:</label>
                </div>
            </div>
        </div>
    @endif
</div>
