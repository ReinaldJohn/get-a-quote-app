<div class="step" id="auto_step_1">
    @if (session('doesAUTOChecked') === 'true')
        <div class="question_title">
            <h3>Commercial Auto Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="auto_add_vehicle" id="auto_add_vehicle"
                        aria-label="auto_add_vehicle">
                        <option selected></option>
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
                    <label for="auto_add_vehicle">Additional Vehicle?</label>
                </div>
            </div>
            <!-- Start Vehicle Container -->
            <div id="auto_vehicles_container"></div>
            <!-- End Vehicle Container -->
        </div>
    @endif
</div>

<div class="step" id="auto_step_2">
    @if (session('doesAUTOChecked') === 'true')
        <div class="question_title">
            <h3>Commercial Auto Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="auto_are_you_the_driver" id="auto_are_you_the_driver"
                        aria-label="auto_are_you_the_driver">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="auto_are_you_the_driver">Are you the driver of the
                        vehicle?</label>
                </div>
            </div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Your Information:</h6>
                <div class="mb-3 form-floating">
                    <input type="text" name="auto_driver_full_name" id="auto_driver_full_name"
                        class="form-control required" placeholder="">
                    <label for="auto_driver_full_name">Full Name</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="auto_driver_date_of_birth" id="auto_driver_date_of_birth"
                        class="form-control required" placeholder="auto_driver_date_of_birth">
                    <label for="auto_driver_date_of_birth">Date of Birth</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="auto_driver_marital_status"
                        id="auto_driver_marital_status" aria-label="auto_driver_marital_status">
                        <option value selected></option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                    </select>
                    <label for="auto_driver_marital_status">Marital Status</label>
                </div>
            </div>
            <div id="auto_driver_if_married_container"></div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="auto_driver_license_no" id="auto_driver_license_no"
                        class="form-control required" placeholder="auto_driver_license_no">
                    <label for="auto_driver_license_no">Driver's License
                        No.</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="auto_driver_years_of_driving_exp" id="auto_driver_years_of_driving_exp"
                        class="form-control required" placeholder="auto_driver_years_of_driving_exp">
                    <label for="auto_driver_years_of_driving_exp">Years of Driving
                        Experience?</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="auto_no_of_losses" id="auto_no_of_losses"
                        aria-label="auto_no_of_losses">
                        <option selected></option>
                        <option value="0">No Losses</option>
                        <option value="1">1 yr. No Losses</option>
                        <option value="3">3 yrs. No Losses</option>
                        <option value="5">5 yrs. No Losses</option>
                        <option value="-1">Have Losses</option>
                    </select>
                    <label for="auto_no_of_losses">Commercial Auto - # of
                        Losses</label>
                </div>
            </div>
            <!--  -->
            <div id="auto_losses_container"></div>
            <!--  -->
        </div>
    @endif
</div>

<div class="step" id="auto_step_3">
    @if (session('doesAUTOChecked') === 'true')
        <div class="question_title">
            <h3>Commercial Auto Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="auto_add_driver" id="auto_add_driver"
                        aria-label="auto_add_driver">
                        <option selected></option>
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
                    <label for="auto_add_driver">Select a number of driver</label>
                </div>
            </div>
            <!--  -->
            <div id="auto_drivers_container"></div>
            <!--  -->
        </div>
    @endif
</div>
