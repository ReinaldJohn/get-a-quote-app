<div class="step" id="personal_information_step">
    <div class="question_title">
        <h3>Client Information Form</h3>
        <p>Please provide the requested information and proceed.</p>
    </div>
    <div class="row justify-content-center d-flex">
        <div class="col-md-12">
            <div class="mb-3 form-floating">
                <input type="text" name="company_name" id="company_name" class="form-control required"
                    placeholder="Company Name">
                <label for="company_name">Company Name</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3 form-floating">
                <input type="text" name="firstname" id="firstname" class="form-control required"
                    placeholder="First Name">
                <label for="firstname">First Name</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3 form-floating">
                <input type="text" name="lastname" id="lastname" class="form-control required"
                    placeholder="Last Name">
                <label for="lastname">Last Name</label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3 form-floating">
                <input type="text" name="address" id="address" class="form-control required" placeholder="Address">
                <label for="address">Address</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3 form-floating">
                <input type="text" name="city" id="city" class="form-control required" placeholder="City">
                <label for="lastname">City</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="mb-3 form-floating">
                <select class="form-select required" name="states" id="states" aria-label="states">
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
                <input type="text" name="zipcode" id="zipcode" class="form-control required" placeholder="Zipcode">
                <label for="zipcode">Zipcode</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3 form-floating">
                <input type="phone" name="phone_number" id="phone_number" class="form-control required"
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
                <input type="email" name="email_address" id="email_address" class="form-control required"
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
                <input type="text" name="contractor_license" id="contractor_license" class="form-control required"
                    placeholder="Contractor License No.">
                <label for="contractor_license">Contractor License
                    No.</label>
            </div>
        </div>
        <div class="terms">
            <label class="container_check">

                By clicking "Next" I agree to receive emails, text message, and phone calls, which may be recorded
                and/or emailing equipment or software unless I opt-out from such communications.
                <br />
                -Purpose of the message: To send a follow-up text message regarding insurance proposal we forwarded to
                you once you completed this form.
                <br />
                -It's great to know that you can opt out of receiving these SMS texts at any time simply answering STOP.
                You can get more information by just answering HELP. We do not sell or share your information with third
                parties. You may always check our company's <b>privacy policy</b> <a href="{{ route('pp-index') }}"
                    target="_blank">here</a> and <b>terms and conditions</b> <a href="{{ route('tc-index') }}"
                    target="_blank">here</a>.
                Finally, data charges may apply to any SMS texts you receive. Thank you.
                <br />
                -Subsequent follow-ups can take place 10 days and a month after the initial quote transmission.
                <br />
                -No mobile information will be shared with third parties/affiliates for marketing/promotional purposes.

                <input type="checkbox" name="terms" id="dialpadTermsCheckbox" value="Yes" class="">
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <!-- /row -->
</div>
