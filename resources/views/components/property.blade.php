<div class="step" id="comm_prop_step_1">
    @if (session('doesCOMM_PROPChecked') === 'true')
        <div class="question_title">
            <h3>Commercial Property Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="property_business_located" id="property_business_located"
                        aria-label="property_business_located">
                        <option value="" selected></option>
                        <option value="Home or Apartment">Home or Apartment
                        </option>
                        <option value="Rented Commercial Space">Rented Commercial
                            Space
                        </option>
                        <option value="Owned Commercial Space">Owned Commercial
                            Space
                        </option>
                        <option value="Commercial space owned but rented to others">
                            Commercial space owned but rented to others</option>
                    </select>
                    <label for="property_business_located">Business Location is
                        Located
                        in:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="property_property_address" id="property_property_address"
                        class="form-control required" placeholder="Property Address" />
                    <label for="property_property_address">Property
                        Address</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="property_name_of_owner" id="property_name_of_owner"
                        class="form-control required"
                        placeholder="Name of the owner of the
                            Building" />
                    <label for="property_name_of_owner">Name of the owner of the
                        building</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="property_value_cost_bldg" id="property_value_cost_bldg"
                        class="form-control required" placeholder="Value of Cost of the Building:" />
                    <label for="property_value_cost_bldg">Value of Cost of the
                        Building:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="property_business_property_limit" id="property_business_property_limit"
                        class="form-control required" placeholder="What is the Business Property Limit?" />
                    <label for="property_business_property_limit">What is the
                        Business
                        Property Limit?</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="property_no_of_losses" id="property_no_of_losses"
                        aria-label="property_no_of_losses">
                        <option selected></option>
                        <option value="0">No Losses</option>
                        <option value="1">1 yr. No Losses</option>
                        <option value="3">3 yrs. No Losses</option>
                        <option value="5">5 yrs. No Losses</option>
                        <option value="-1">Have Losses</option>
                    </select>
                    <label for="property_no_of_losses">Business Owner's Policy - #
                        of
                        Losses</label>
                </div>
            </div>
            <!--  -->
            <div id="property_losses_container"></div>
            <!--  -->
        </div>
    @endif
</div>
<!-- /Step -->

<!-- Commercial Property Stepper 2 -->
<div class="step" id="comm_prop_step_2">
    @if (session('doesCOMM_PROPChecked') === 'true')
        <div class="question_title">
            <h3>Commercial Property Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="property_does_have_more_than_one_location"
                        id="property_does_have_more_than_one_location"
                        aria-label="property_does_have_more_than_one_location">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="property_does_have_more_than_one_location">Do you
                        have
                        more than one location?</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="property_multiple_units" id="property_multiple_units"
                        aria-label="property_multiple_units">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="property_multiple_units">Are there multiple units
                        (residential or
                        commercial) in
                        your building:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="property_construction_type"
                        id="property_construction_type" aria-label="property_construction_type">
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
                    <label for="property_construction_type">Construction
                        Type:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="property_year_built" id="property_year_built"
                        class="form-control required" placeholder="Year Built:" />
                    <label for="property_year_built">Year Built:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="property_no_of_stories" id="property_no_of_stories"
                        class="form-control required" placeholder="No. of Stories:" />
                    <label for="property_no_of_stories">No. of Stories:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="property_total_bldg_sqft" id="property_total_bldg_sqft"
                        class="form-control required"
                        placeholder="Total Building Square
                            Footage:" />
                    <label for="property_total_bldg_sqft">Total Building Square
                        Footage:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="property_is_bldg_equipped_with_fire_sprinklers"
                        id="property_is_bldg_equipped_with_fire_sprinklers"
                        aria-label="property_is_bldg_equipped_with_fire_sprinklers">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="property_is_bldg_equipped_with_fire_sprinklers">Is
                        your
                        building equipped with fire
                        sprinklers?</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="property_distance_nearest_fire_hydrant"
                        id="property_distance_nearest_fire_hydrant" class="form-control required"
                        placeholder="Distance to
                            Nearest Fire Hydrant:" />
                    <label for="property_distance_nearest_fire_hydrant">Distance
                        to
                        Nearest Fire Hydrant:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="property_distance_nearest_fire_station"
                        id="property_distance_nearest_fire_station" class="form-control required"
                        placeholder="Distance to
                            Nearest Fire Station:" />
                    <label for="property_distance_nearest_fire_station">Distance
                        to
                        Nearest Fire Station:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="property_protection_class"
                        id="property_protection_class" aria-label="property_protection_class">
                        <option value="" selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                    <label for="property_protection_class">Protection
                        Class:</label>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- /Step -->

<!-- Commercial Property Stepper 3 -->
<div class="step" id="comm_prop_step_3">
    @if (session('doesCOMM_PROPChecked') === 'true')
        <div class="question_title">
            <h3>Commercial Property Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="property_protective_device"
                        id="property_protective_device" aria-label="property_protective_device">
                        <option value="" selected></option>
                        <option value="Local Burglar Alarm">Local Burglar Alarm
                        </option>
                        <option value="Central Burglar Alarm">Central Burglar
                            Alarm
                        </option>
                        <option value="Local Fire Alarm">Local Fire Alarm</option>
                        <option value="Central Fire Alarm">Central Fire Alarm
                        </option>
                        <option value="Fenced">Fenced</option>
                        <option value="CCTV">CCTV</option>
                    </select>
                    <label for="property_protective_device">Select any protective
                        devices
                        you have:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="property_last_update_roofing_year"
                        id="property_last_update_roofing_year" class="form-control required"
                        placeholder="Last Update to Roofing Year:" />
                    <label for="property_last_update_roofing_year">Last Update to
                        Roofing
                        Year:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="property_last_update_heating_year"
                        id="property_last_update_heating_year" class="form-control required"
                        placeholder="Last Update to Heating Year:" />
                    <label for="property_last_update_heating_year">Last Update to
                        Heating
                        Year:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="property_last_update_plumbing_year"
                        id="property_last_update_plumbing_year" class="form-control required"
                        placeholder="Last Update to Plumbing Year:" />
                    <label for="property_last_update_plumbing_year">Last Update to
                        Plumbing Year:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="property_last_update_electrical_year"
                        id="property_last_update_electrical_year" class="form-control required"
                        placeholder="Last Update to Electrical Year:" />
                    <label for="property_last_update_electrical_year">Last Update
                        to
                        Electrical Year:</label>
                </div>
            </div>
        </div>
    @endif
</div>
