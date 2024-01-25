<div class="step" id="bond_step_1">
    @if (session('doesBONDChecked') === 'true')
        <div class="question_title">
            <h3>Contractor License Bond Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="bond_owners_name" id="bond_owners_name" class="form-control"
                        placeholder="Owner's Name">
                    <label for="bond_owners_name">Owner's Name</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="bond_owners_ssn" id="bond_owners_ssn" class="form-control"
                        placeholder="Social Security Number (SSN)">
                    <label for="bond_owners_ssn">Social Security Number
                        (SSN)</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="bond_owners_dob" id="bond_owners_dob" class="form-control"
                        placeholder="MM/DD/YYYY">
                    <label for="bond_owners_dob">Date of Birth</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select" name="bond_owners_civil_status" id="bond_owners_civil_status"
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
    @endif
</div>
<!-- /Step -->

<!-- BOND Stepper 2 -->
<div class="step" id="bond_step_2">
    @if (session('doesBONDChecked') === 'true')
        <div class="question_title">
            <h3>Contractor License Bond Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="bond_type_bond_requested" id="bond_type_bond_requested"
                        class="form-control" placeholder="Type of Bond Requested">
                    <label for="bond_type_bond_requested">Type of Bond
                        Requested</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="bond_amount_of_bond" id="bond_amount_of_bond" class="form-control"
                        placeholder="Amount of Bond">
                    <label for="bond_amount_of_bond">Amount of Bond</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select" name="bond_term_of_bond" id="bond_term_of_bond"
                        aria-label="bond_term_of_bond">
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
                    <select class="form-select" name="bond_type_of_license" id="bond_type_of_license"
                        aria-label="bond_type_of_license">
                        <option value selected></option>
                        <option value="General Contractor">General Contractor
                        </option>
                        <option value="Roofer">Roofer</option>
                        <option value="Swimming Pool Contractor">Swimming Pool
                            Contractor
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
                    <input type="text" name="bond_license_or_application_no" id="bond_license_or_application_no"
                        class="form-control" placeholder="License Number or Application Number">
                    <label for="bond_license_or_application_no">License Number or
                        Application
                        Number</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="bond_effective_date" id="bond_effective_date" class="form-control"
                        placeholder="MM/DD/YYYY">
                    <label for="bond_effective_date">Effective Date</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    {{-- <h6 class="profession_header mt-2 mb-2">Contractor License
                            Bond - # of
                            Losses</h6> --}}
                    <select class="form-select" name="bond_no_of_losses" id="bond_no_of_losses"
                        aria-label="bond_no_of_losses" data-placeholder="" data-allow-clear="true"
                        style="width:100%">
                        <option selected></option>
                        <option value="0">No Losses</option>
                        <option value="1">1 yr. No Losses</option>
                        <option value="3">3 yrs. No Losses</option>
                        <option value="5">5 yrs. No Losses</option>
                        <option value="-1">Have Losses</option>
                    </select>
                    <label for="bond_no_of_losses">Contractor License
                        Bond - # of
                        Losses</label>
                </div>
            </div>
            <!--  -->
            <div id="bond_losses_container"></div>
            <!--  -->
        </div>
    @endif
</div>
