<div class="step" id="personal_information_step">
    <div class="question_title">
        <h3>Client Information Form</h3>
        <p>Please provide the requested information and proceed.</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mb-3 form-floating">
                <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company Name">
                <label for="company_name">Company Name</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3 form-floating">
                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name">
                <label for="firstname">First Name</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3 form-floating">
                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name">
                <label for="lastname">Last Name</label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3 form-floating">
                <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                <label for="address">Address</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3 form-floating">
                <input type="text" name="city" id="city" class="form-control" placeholder="City">
                <label for="lastname">City</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="mb-3 form-floating">
                <select class="form-select" name="states" id="states" aria-label="states">
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
                <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="Zipcode">
                <label for="zipcode">Zipcode</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3 form-floating">
                <input type="phone" name="phone_number" id="phone_number" class="form-control"
                    placeholder="Phone Number">
                <label for="phone_number">Phone Number</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3 form-floating">
                <input type="phone" name="fax_number" id="fax_number" class="form-control"
                    placeholder="Fax Number (Optional)">
                <label for="fax_number">Fax Number (Optional)</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3 form-floating">
                <input type="email" name="email_address" id="email_address" class="form-control"
                    placeholder="Email Address">
                <label for="email_address">Email Address</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3 form-floating">
                <input type="text" name="personal_website" id="personal_website" class="form-control"
                    placeholder="Website (Optional)">
                <label for="personal_website">Website (Optional)</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3 form-floating">
                <input type="text" name="contractor_license" id="contractor_license" class="form-control"
                    placeholder="Contractor License No.">
                <label for="contractor_license">Contractor License
                    No.</label>
            </div>
        </div>
    </div>
    <!-- /row -->
</div>
