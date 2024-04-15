<div class="step" id="excess_step_1">
    @if (session('doesEXCESSChecked') === 'true')
        <div class="question_title">
            <h3>Excess Liability Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="excess_limits" id="excess_limits" aria-label="excess_limits">
                        <option value selected></option>
                        <option value="1000000">$1,000,000</option>
                        <option value="2000000">$2,000,000</option>
                        <option value="3000000">$3,000,000</option>
                        <option value="4000000">$4,000,000</option>
                        <option value="5000000">$5,000,000</option>
                        <option value="6000000">$6,000,000</option>
                        <option value="7000000">$7,000,000</option>
                        <option value="8000000">$8,000,000</option>
                        <option value="9000000">$9,000,000</option>
                        <option value="10000000">$10,000,000</option>
                    </select>
                    <label for="excess_limits">Excess Limits</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="excess_gl_eff_date" id="excess_gl_eff_date"
                        class="form-control required" placeholder="GL Effective Date">
                    <label for="excess_gl_eff_date">GL Effective Date</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="excess_no_of_losses" id="excess_no_of_losses"
                        aria-label="excess_no_of_losses">
                        <option selected></option>
                        <option value="0">No Losses</option>
                        <option value="1">1 yr. No Losses</option>
                        <option value="3">3 yrs. No Losses</option>
                        <option value="5">5 yrs. No Losses</option>
                        <option value="-1">Have Losses</option>
                    </select>
                    <label for="excess_no_of_losses">Excess Liability - # of
                        Losses</label>
                </div>
            </div>
            <!--  -->
            <div id="excess_losses_container"></div>
            <!--  -->
        </div>
    @endif
</div>
<!-- /Step -->

<!-- EXCESS Stepper 2 -->
<div class="step" id="excess_step_2">
    @if (session('doesEXCESSChecked') === 'true')
        <div class="question_title">
            <h3>Excess Liability Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="excess_insurance_carrier" id="excess_insurance_carrier"
                        class="form-control required" placeholder="Insurance Carrier">
                    <label for="excess_insurance_carrier">Insurance
                        Carrier</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="excess_policy_or_quote_no" id="excess_policy_or_quote_no"
                        class="form-control required" placeholder="Policy Number / Quote Number">
                    <label for="excess_policy_or_quote_no">Policy Number / Quote
                        Number</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="excess_policy_premium" id="excess_policy_premium"
                        class="form-control required" placeholder="Policy Premium">
                    <label for="excess_policy_premium">Policy Premium</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="excess_effective_date" id="excess_effective_date"
                        class="form-control required" placeholder="MM/DD/YYYY">
                    <label for="excess_effective_date">Effective Date</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="excess_expiration_date" id="excess_expiration_date"
                        class="form-control required" placeholder="MM/DD/YYYY">
                    <label for="excess_expiration_date">Expiration Date</label>
                </div>
            </div>
        </div>
    @endif
</div>
