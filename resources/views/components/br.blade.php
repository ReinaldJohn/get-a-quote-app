<div class="step" id="br_step_1">
    @if (session('doesBRChecked') === 'true')
        <div class="question_title">
            <h3>Builder's Risk Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="br_property_address" id="br_property_address" class="form-control required"
                        placeholder="Property Address">
                    <label for="br_property_address">Project Address</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="br_value_of_existing_structure" id="br_value_of_existing_structure"
                        class="form-control required" placeholder="Value of Existing Structure">
                    <label for="br_value_of_existing_structure">Value of Existing
                        Structure</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="br_value_of_work_performed" id="br_value_of_work_performed"
                        class="form-control required" placeholder="Value of Work Being Performed">
                    <label for="br_value_of_work_performed">Value of Work Being
                        Performed</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="br_period_duration_project"
                        id="br_period_duration_project" aria-label="br_period_duration_project">
                        <option selected></option>
                        <option value="3 Months">3 Months</option>
                        <option value="6 Months">6 Months</option>
                        <option value="9 Months">9 Months</option>
                        <option value="12 Months">12 Months</option>
                    </select>
                    <label for="br_period_duration_project">Period of Insurance /
                        Duration
                        of
                        the Project</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="br_no_of_losses" id="br_no_of_losses"
                        aria-label="br_no_of_losses">
                        <option selected></option>
                        <option value="0">No Losses</option>
                        <option value="1">1 yr. No Losses</option>
                        <option value="3">3 yrs. No Losses</option>
                        <option value="5">5 yrs. No Losses</option>
                        <option value="-1">Have Losses</option>
                    </select>
                    <label for="br_no_of_losses">Builder's Risk - # of
                        Losses</label>
                </div>
            </div>
            <!--  -->
            <div id="br_losses_container"></div>
            <!--  -->
        </div>
    @endif
</div>
<!-- /Step -->

<!-- BR Stepper 2 -->
<div class="step" id="br_step_2">
    @if (session('doesBRChecked') === 'true')
        <div class="question_title">
            <h3>Builder's Risk Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="br_construction_type" id="br_construction_type"
                        aria-label="br_construction_type">
                        <option value="" selected></option>
                        <option value="Frame">Frame</option>
                        <option value="Joisted Masonry">Joisted Masonry</option>
                        <option value="Non-Combustible">Non-Combustible</option>
                        <option value="Masonry Non-Combustible">Masonry
                            Non-Combustible
                        </option>
                        <option value="Modified Fire Resistive">Modified Fire
                            Resistive
                        </option>
                        <option value="Fire Resistive">Fire Resistive</option>
                    </select>
                    <label for="br_construction_type">Construction Type</label>
                </div>
            </div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Complete descriptions of
                    operations for the project for which you are currently applying
                    for
                    insurance</h6>
                <div class="mb-3 form-floating">
                    <textarea style="resize: none;" name="br_complete_descops_of_project" id="br_complete_descops_of_project"
                        class="form-control required"
                        placeholder="Complete descriptions of operations for the project for which you are currently applying for insurance"></textarea>
                    <label for="br_complete_descops_of_project">Please
                        specify:</label>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- /Step -->

<!-- BR Stepper 3 -->
<div class="step" id="br_step_3">
    @if (session('doesBRChecked') === 'true')
        <div class="question_title">
            <h3>Builder's Risk Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <h5 class="profession_header mt-2 mb-2">Description of Property Use
                Prior
                to Construction</h5>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="br_sq_footage" id="br_sq_footage" class="form-control required"
                        placeholder="Square Footage">
                    <label for="br_sq_footage">Square Footage</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="br_number_of_floors" id="br_number_of_floors"
                        class="form-control required" placeholder="Number of Floors">
                    <label for="br_number_of_floors">Number of Floors</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="br_number_of_units_dwelling" id="br_number_of_units_dwelling"
                        class="form-control required" placeholder="">
                    <label for="br_number_of_units_dwelling">Number of Units in
                        Dwelling</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="br_anticipated_occupancy" id="br_anticipated_occupancy"
                        class="form-control required" placeholder="">
                    <label for="br_anticipated_occupancy">What is the Anticipated
                        Occupancy</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="br_last_update_to_roofing_year" id="br_last_update_to_roofing_year"
                        class="form-control required" placeholder="">
                    <label for="br_last_update_to_roofing_year">Last Update to
                        Roofing
                        Year</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="br_last_update_to_heating_year" id="br_last_update_to_heating_year"
                        class="form-control required" placeholder="">
                    <label for="br_last_update_to_heating_year">Last Update to
                        Heating
                        Year</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="br_last_update_to_electrical_year"
                        id="br_last_update_to_electrical_year" class="form-control required" placeholder="">
                    <label for="br_last_update_to_electrical_year">Last Update to
                        Electrical Year</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="br_last_update_to_plumbing_year" id="br_last_update_to_plumbing_year"
                        class="form-control required" placeholder="">
                    <label for="br_last_update_to_plumbing_year">Last Update to
                        Plumbing
                        Year</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="br_distance_to_nearest_fire_hydrant"
                        id="br_distance_to_nearest_fire_hydrant" class="form-control required" placeholder="">
                    <label for="br_distance_to_nearest_fire_hydrant">Distance to
                        Nearest
                        Fire Hydrant</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="br_distance_to_nearest_fire_station"
                        id="br_distance_to_nearest_fire_station" class="form-control required" placeholder="">
                    <label for="br_distance_to_nearest_fire_station">Distance to
                        Nearest
                        Fire Station</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="br_structure_occupied_remodel_renovation"
                        id="br_structure_occupied_remodel_renovation" class="form-control required" placeholder="">
                    <label for="br_structure_occupied_remodel_renovation">Will the
                        Structure be Occupied During the
                        Remodel/Renovation?</label>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- /Step -->

<!-- BR Stepper 4 -->
<div class="step" id="br_step_4">
    @if (session('doesBRChecked') === 'true')
        <div class="question_title">
            <h3>Builder's Risk Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="br_when_structure_built" id="br_when_structure_built"
                        class="form-control required" placeholder="">
                    <label for="br_when_structure_built">When was the structure
                        built?</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="br_jobsite_security" id="br_jobsite_security"
                        class="form-control required" placeholder="">
                    <label for="br_jobsite_security">Jobsite Security</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="br_scheduled_property_address_builders_risk_coverage"
                        id="br_scheduled_property_address_builders_risk_coverage"
                        aria-label="br_scheduled_property_address_builders_risk_coverage">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="br_scheduled_property_address_builders_risk_coverage">Has
                        the scheduled property address had any prior
                        Builder's Risk coverage?</label>
                </div>
            </div>
            <div id="br_scheduled_property_container"></div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="br_residential_commercial"
                        id="br_residential_commercial" aria-label="br_residential_commercial">
                        <option value="" selected></option>
                        <option value="Residential">Residential</option>
                        <option value="Commercial">Commercial</option>
                    </select>
                    <label for="br_residential_commercial">Residential/Commercial</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="br_has_project_started" id="br_has_project_started"
                        aria-label="br_has_project_started">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="br_has_project_started">Has the project
                        started?</label>
                </div>
            </div>
            <div id="br_project_started_container"></div>
        </div>
    @endif
</div>
