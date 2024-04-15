<div class="step" id="bop_step_1">
    @if (session('doesBOPChecked') === 'true')
        <div class="question_title">
            <h3>Business Owner's Policy Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="bop_property_address" id="bop_property_address"
                        class="form-control required" placeholder="Property Address">
                    <label for="bop_property_address">Property Address</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="bop_loss_payee_info" id="bop_loss_payee_info"
                        class="form-control required" placeholder="Loss Payee Information">
                    <label for="bop_loss_payee_info">Loss Payee
                        Information</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="bop_building_industry" id="bop_building_industry"
                        aria-label="bop_building_industry">
                        <option value="" selected></option>
                        <option value="Apartments & Condo Assoc">Apartments &
                            Condo Assoc
                        </option>
                        <option value="Auto Repair / Service & Car Washes">Auto
                            Repair /
                            Service & Car Washes</option>
                        <option value="Contractors & Landscapers">Contractors &
                            Landscapers</option>
                        <option value="Grocery, Convenience Store">Grocery,
                            Convenience
                            Store</option>
                        <option value="Gas Stations">Gas Stations</option>
                        <option value="Offices">Offices</option>
                        <option value="Restaurants & Hotels">Restaurants & Hotels
                        </option>
                        <option value="Retails Stores">Retails Stores</option>
                        <option value="Service Providers">Service Providers
                        </option>
                        <option value="Wholesalers">Wholesalers</option>
                    </select>
                    <label for="bop_building_industry">Building Industry</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="bop_occupancy" id="bop_occupancy"
                        aria-label="bop_occupancy">
                        <option value="" selected></option>
                        <option value="Non-Owner Occupied Bldg/Lessors Risk">
                            Non-Owner
                            Occupied Bldg/Lessors Risk</option>
                        <option value="Owner Occupied Bldg - 10% or Less">Owner
                            Occupied
                            Bldg - 10% or Less</option>
                        <option value="Owner Occupied Bldg - More than 10%">Owner
                            Occupied
                            Bldg - More than 10%</option>
                        <option value="Tenant">Tenant</option>
                    </select>
                    <label for="bop_occupancy">Occupancy (Who owns the
                        Building?)</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="bop_val_cost_bldg" id="bop_val_cost_bldg" class="form-control required"
                        placeholder="Value of Cost of the
                                    Building?">
                    <label for="bop_val_cost_bldg">Value of Cost of the
                        Building?</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="bop_business_property_limit" id="bop_business_property_limit"
                        class="form-control required"
                        placeholder="What is the Business Property
                                    Limit?">
                    <label for="bop_business_property_limit">What is the Business
                        Property
                        Limit?</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="bop_no_of_losses" id="bop_no_of_losses"
                        aria-label="bop_no_of_losses">
                        <option selected></option>
                        <option value="0">No Losses</option>
                        <option value="1">1 yr. No Losses</option>
                        <option value="3">3 yrs. No Losses</option>
                        <option value="5">5 yrs. No Losses</option>
                        <option value="-1">Have Losses</option>
                    </select>
                    <label for="bop_no_of_losses">Business Owner's Policy - # of
                        Losses</label>
                </div>
            </div>
            <!--  -->
            <div id="bop_losses_container"></div>
            <!--  -->
        </div>
    @endif
</div>
<!-- /Step -->

<!-- BOP Stepper 2 -->
<div class="step" id="bop_step_2">
    @if (session('doesBOPChecked') === 'true')
        <div class="question_title">
            <h3>Business Owner's Policy Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <h5 class="profession_header mt-2 mb-2">What is the property contents?
        </h5>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="bop_bldg_construction_type"
                        id="bop_bldg_construction_type" aria-label="bop_bldg_construction_type">
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
                    <label for="bop_bldg_construction_type">Building Construction
                        Type</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="bop_year_built" id="bop_year_built" class="form-control required"
                        placeholder="Year Built">
                    <label for="bop_year_built">Year Built</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="bop_no_of_stories" id="bop_no_of_stories"
                        class="form-control required" placeholder="No. of Stories">
                    <label for="bop_no_of_stories">No. of Stories</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="bop_total_bldg_sqft" id="bop_total_bldg_sqft"
                        class="form-control required" placeholder="Total Building Sq. Ft.">
                    <label for="bop_total_bldg_sqft">Total Building Sq.
                        Ft.</label>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- /Step -->

<!-- BOP Stepper 3 -->
<div class="step" id="bop_step_3">
    @if (session('doesBOPChecked') === 'true')
        <div class="question_title">
            <h3>Business Owner's Policy Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <h5 class="profession_header mt-2 mb-2">Protective Safeguards - Fire:</h5>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="bop_automatic_sprinkler_system"
                        id="bop_automatic_sprinkler_system" aria-label="bop_automatic_sprinkler_system">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="bop_automatic_sprinkler_system">Automatic
                        Sprinkler
                        System:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="bop_automatic_fire_alarm"
                        id="bop_automatic_fire_alarm" aria-label="bop_automatic_fire_alarm">
                        <option value="" selected></option>
                        <option value="None">None</option>
                        <option value="Central Station">Central Station</option>
                        <option value="Local Alarm">Local Alarm</option>
                    </select>
                    <label for="bop_automatic_fire_alarm">Automatic Fire
                        Alarm:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="bop_distance_nearest_fire_hydrant"
                        id="bop_distance_nearest_fire_hydrant" class="form-control required"
                        placeholder="Distance to Nearest
                                    Fire Hydrant:">
                    <label for="bop_distance_nearest_fire_hydrant">Distance to
                        Nearest
                        Fire Hydrant:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="bop_distance_nearest_fire_station"
                        id="bop_distance_nearest_fire_station" class="form-control required"
                        placeholder="Distance to Nearest
                                    Fire Station:">
                    <label for="bop_distance_nearest_fire_station">Distance to
                        Nearest
                        Fire Station:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="bop_automatic_comm_cooking_ext"
                        id="bop_automatic_comm_cooking_ext" aria-label="bop_automatic_comm_cooking_ext">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                        <option value="Not Applicable">Not Applicable</option>
                    </select>
                    <label for="bop_automatic_comm_cooking_ext">Automatic
                        Commercial
                        Cooking
                        Extinguishing System:</label>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- /Step -->

<!-- BOP Stepper 4 -->
<div class="step" id="bop_step_4">
    @if (session('doesBOPChecked') === 'true')
        <div class="question_title">
            <h3>Business Owner's Policy Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <h5 class="profession_header mt-2 mb-2">Protective Safeguards - Burglary
            and
            Robbery:</h5>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="bop_automatic_burglar_alarm"
                        id="bop_automatic_burglar_alarm" aria-label="bop_automatic_burglar_alarm">
                        <option value="" selected></option>
                        <option value="None">None</option>
                        <option value="Central or Police Station">Central or
                            Police
                            Station</option>
                        <option value="Outside Siren Only">Outside Siren Only
                        </option>
                    </select>
                    <label for="bop_automatic_burglar_alarm">Automatic Burglar
                        Alarm:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="bop_security_cameras" id="bop_security_cameras"
                        aria-label="bop_security_cameras">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="bop_security_cameras">Security Cameras:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="bop_last_update_roofing_year" id="bop_last_update_roofing_year"
                        class="form-control required"
                        placeholder="Last Update to Roofing
                                    Yr:">
                    <label for="bop_last_update_roofing_year">Last Update to
                        Roofing
                        Yr:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="bop_last_update_heating_year" id="bop_last_update_heating_year"
                        class="form-control required"
                        placeholder="Last Update to Heating
                                    Yr:">
                    <label for="bop_last_update_heating_year">Last Update to
                        Heating
                        Yr:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="bop_last_update_plumbing_year" id="bop_last_update_plumbing_year"
                        class="form-control required"
                        placeholder="Last Update to Plumbing
                                    Yr:">
                    <label for="bop_last_update_plumbing_year">Last Update to
                        Plumbing
                        Yr:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="bop_last_update_electrical_year" id="bop_last_update_electrical_year"
                        class="form-control required"
                        placeholder="Last Update to Electrical
                                    Yr:">
                    <label for="bop_last_update_electrical_year">Last Update to
                        Electrical
                        Yr:</label>
                </div>
            </div>
        </div>
    @endif
</div>
