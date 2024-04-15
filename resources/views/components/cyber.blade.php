<div class="step" id="cyber_step_1">
    @if (session('doesCYBERChecked') === 'true')
        <div class="question_title">
            <h3>Cyber Liability Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="cyber_it_contact_name" id="cyber_it_contact_name"
                        class="form-control required" placeholder="IT Contact Name:" />
                    <label for="cyber_it_contact_name">IT Contact Name:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="cyber_it_contact_number" id="cyber_it_contact_number"
                        class="form-control required" placeholder="IT Contact Number:" />
                    <label for="cyber_it_contact_number">IT Contact
                        Number:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="email" name="cyber_it_contact_email" id="cyber_it_contact_email"
                        class="form-control required" placeholder="IT Contact Email:" />
                    <label for="cyber_it_contact_email">IT Contact Email:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="cyber_no_of_losses" id="cyber_no_of_losses"
                        aria-label="cyber_no_of_losses">
                        <option selected></option>
                        <option value="0">No Losses</option>
                        <option value="1">1 yr. No Losses</option>
                        <option value="3">3 yrs. No Losses</option>
                        <option value="5">5 yrs. No Losses</option>
                        <option value="-1">Have Losses</option>
                    </select>
                    <label for="cyber_no_of_losses">Cyber Liability - # of
                        Losses</label>
                </div>
            </div>
            <!--  -->
            <div id="cyber_losses_container"></div>
            <!--  -->
        </div>
    @endif
</div>

<!-- Cyber Liability Stepper 2 -->
<div class="step" id="cyber_step_2">
    @if (session('doesCYBERChecked') === 'true')
        <div class="question_title">
            <h3>Cyber Liability Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <h6 class="profession_header mt-2 mb-2">Are you engaged in any
                of the following
                business
                activities?</h6>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="cyber_q1" id="cyber_q1" aria-label="cyber_q1">
                        <option value="" selected></option>
                        <option value="Adult Content">Adult Content</option>
                        <option value="Cannabis">Cannabis</option>
                        <option value="Cryptocurrency or Blockchain">
                            Cryptocurrency or Blockchain
                        </option>
                        <option value="Gambling">Gambling</option>
                        <option value="Payment Processing">
                            Payment Processing
                        </option>
                        <option value="Debt Collection Agency">
                            Debt Collection Agency
                        </option>
                        <option value="Managed IT Service Provider (MSP or MSSP)">
                            Managed IT Service Provider (MSP or MSSP)
                        </option>
                        <option value="None of the above">
                            None of the above
                        </option>
                    </select>
                    <label for="cyber_q1">Please select:</label>
                </div>
            </div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Is there a system in place
                    for
                    verifying
                    fund and wire
                    transfers over $25,000 through a secondary means of
                    communication prior to execution?</h6>
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="cyber_q2" id="cyber_q2" aria-label="cyber_q2">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="cyber_q2">Please select:</label>
                </div>
            </div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Do you store your backups
                    offline
                    or
                    with a cloud
                    service provider?</h6>
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="cyber_q3" id="cyber_q3" aria-label="cyber_q3">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="cyber_q3">Please select:</label>
                </div>
            </div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Do you store or process
                    personal,
                    health, or credit
                    card information of more than 500,000
                    Individuals?</h6>
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="cyber_q4" id="cyber_q4" aria-label="cyber_q4">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="cyber_q4">Please select:</label>
                </div>
            </div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Do you enabled
                    multi-factor
                    authentication for email
                    access and remote network access?</h6>
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="cyber_q5" id="cyber_q5" aria-label="cyber_q5">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="cyber_q5">Please select:</label>
                </div>
            </div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Do you encrypt all
                    sensitive
                    information
                    at rest?</h6>
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="cyber_q6" id="cyber_q6" aria-label="cyber_q6">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="cyber_q6">Please select:</label>
                </div>
            </div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Any relevant claims or
                    incidents
                    exceeding $10,000
                    within the past three years?</h6>
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="cyber_q7" id="cyber_q7" aria-label="cyber_q7">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="cyber_q7">Please select:</label>
                </div>
            </div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Would there be any
                    potential Cyber
                    Event, Loss, or
                    claim that could fall within the scope of the policy you
                    are applying for?</h6>
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="cyber_q8" id="cyber_q8" aria-label="cyber_q8">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="cyber_q8">Please select:</label>
                </div>
            </div>
        </div>
    @endif
</div>
