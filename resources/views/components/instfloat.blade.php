<div class="step" id="instfloat_step_1">
    @if (session('doesINSTFLOATChecked') === 'true')
        <div class="question_title">
            <h3>Installation Floater Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select" name="instfloat_territory_of_operation"
                        id="instfloat_territory_of_operation" aria-label="instfloat_territory_of_operation">
                        <option value selected></option>
                        @foreach ($states as $state)
                            <option value="{{ $state['state_abbr'] }}">
                                {{ $state['state_abbr'] }}
                            </option>
                        @endforeach
                    </select>
                    <label for="instfloat_territory_of_operation">Territory of
                        Operation:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="instfloat_type_of_operation" id="instfloat_type_of_operation"
                        class="form-control" placeholder="Type of Operation:" />
                    <label for="instfloat_type_of_operation">Type of
                        Operation:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="instfloat_scheduled_type_of_equipment"
                        id="instfloat_scheduled_type_of_equipment" class="form-control"
                        placeholder="Type of Equipment / materials you will
                            be working
                            with:" />
                    <label for="instfloat_scheduled_type_of_equipment">Type of
                        Equipment /
                        materials
                        you will
                        be working
                        with:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    {{-- <select class="form-select" name="instfloat_deductible_amount"
                            id="instfloat_deductible_amount"
                            aria-label="instfloat_deductible_amount">
                            <option value selected></option>
                            <option value="500-1000">$500 - $1,000</option>
                            <option value="2500">$2,500</option>
                            <option value="5000">$5,000</option>
                            <option value="10000">$10,000</option>
                        </select> --}}
                    <select class="form-select" name="instfloat_deductible_amount" id="instfloat_deductible_amount"
                        aria-label="instfloat_deductible_amount">
                        <option selected></option>
                        <option value="500-2500">$500 / $2,500</option>
                        <option value="1000-2500">$1,000 / $2,500</option>
                        <option value="2500-2500">$2,500 / $2,500</option>
                        <option value="5000-5000">$5,000 / $5,000</option>
                        <option value="10000-10000">$10,000 / $10,000</option>
                    </select>
                    <label for="instfloat_deductible_amount">Deductible
                        Amount (AOP/Theft):</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select" name="instfloat_no_of_losses" id="instfloat_no_of_losses"
                        aria-label="instfloat_no_of_losses">
                        <option selected></option>
                        <option value="0">No Losses</option>
                        <option value="1">1 yr. No Losses</option>
                        <option value="3">3 yrs. No Losses</option>
                        <option value="5">5 yrs. No Losses</option>
                        <option value="-1">Have Losses</option>
                    </select>
                    <label for="instfloat_no_of_losses">Installation Floater - #
                        of
                        Losses</label>
                </div>
            </div>
            <!--  -->
            <div id="instfloat_losses_container"></div>
            <!--  -->
        </div>
    @endif
</div>
<!-- /Step -->

<!-- Installation Floater Stepper 2 -->
<div class="step" id="instfloat_step_2">
    @if (session('doesINSTFLOATChecked') === 'true')
        <div class="question_title">
            <h3>Installation Floater Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <h5 class="profession_header mt-2 mb-2">Equipment Storage:</h5>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="instfloat_location" id="instfloat_location" class="form-control"
                        placeholder="Location:" />
                    <label for="instfloat_location">Location:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select" name="instfloat_months_in_storage" id="instfloat_months_in_storage"
                        aria-label="instfloat_months_in_storage">
                        <option value selected></option>
                        <option value="1 month">1 month</option>
                        <option value="2 months">2 months</option>
                        <option value="3 months">3 months</option>
                        <option value="4 months">4 months</option>
                        <option value="5 months">5 months</option>
                        <option value="6 months">6 months</option>
                        <option value="7 months">7 months</option>
                        <option value="8 months">8 months</option>
                        <option value="9 months">9 months</option>
                        <option value="10 months">10 months</option>
                        <option value="11 months">11 months</option>
                        <option value="12 months">12 months</option>
                    </select>
                    <label for="instfloat_months_in_storage">Months in
                        storage:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="instfloat_max_value_of_equipment" id="instfloat_max_value_of_equipment"
                        class="form-control"
                        placeholder="Maximum Value of equipment that you will
                            be
                            storing:" />
                    <label for="instfloat_max_value_of_equipment">Maximum Value of
                        equipment that you will
                        be
                        storing:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="instfloat_max_value_of_bldg_storage"
                        id="instfloat_max_value_of_bldg_storage" class="form-control"
                        placeholder="Maximum Value of Building
                            storage:" />
                    <label for="instfloat_max_value_of_bldg_storage">Maximum Value
                        of
                        Building
                        storage:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select" name="instfloat_type_security_placed"
                        id="instfloat_type_security_placed" aria-label="instfloat_type_security_placed">
                        <option value selected></option>
                        <option value="Automatic Sprinkler System">Automatic Sprinkler
                            System</option>
                        <option value="Automatic Fire Alarm">Automatic Fire Alarm</option>
                        <option value="Security Service">Security Service</option>
                        <option value="Burglar or Electronic Security System (Connected)">
                            Burglar or Electronic Security System (Connected)</option>
                        <option value="Burglar or Electronic Security System (Not Connected)">
                            Burglar or Electronic Security System (Not Connected)</option>
                        <option value="Fenced Jobsite">Fenced Jobsite</option>
                        <option value="Exteror Lighting">Exteror Lighting</option>
                        <option value="None">None</option>
                    </select>
                    <label for="instfloat_type_security_placed">Type of Security
                        in place
                        withing the
                        storage
                        building:</label>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- /Step -->

<!-- Installation Floater Stepper 3 -->
<div class="step" id="instfloat_step_3">
    @if (session('doesINSTFLOATChecked') === 'true')
        <div class="question_title">
            <h3>Installation Floater Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <h5 class="profession_header mt-2 mb-2">Unscheduled Equipment for Storage:
        </h5>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="instfloat_unscheduled_type_of_equipment"
                        id="instfloat_unscheduled_type_of_equipment" class="form-control"
                        placeholder="Type of Equipment / materials you will
                            be working with:" />
                    <label for="instfloat_unscheduled_type_of_equipment">Type of
                        Equipment / materials you will
                        be working with:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="instfloat_unscheduled_max_value_equipment_storing"
                        id="instfloat_unscheduled_max_value_equipment_storing" class="form-control"
                        placeholder="Maximum Value of equipment that you will be
                            storing:" />
                    <label for="instfloat_unscheduled_max_value_equipment_storing">Maximum
                        Value of
                        equipment that you will be
                        storing:</label>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- /Step -->

<!-- Installation Floater Stepper 4 -->
<div class="step" id="instfloat_step_4">
    @if (session('doesINSTFLOATChecked') === 'true')
        <div class="question_title">
            <h3>Installation Floater Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <h5 class="profession_header mt-2 mb-2">Additional Information:</h5>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Equipment Rented. Loaned
                    to/from
                    Others with or without Operators?</h6>
                <div class="mb-3 form-floating">
                    <select class="form-select" name="instfloat_additional_info_q1" id="instfloat_additional_info_q1"
                        aria-label="instfloat_additional_info_q1">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="instfloat_additional_info_q1">Please
                        select:</label>
                </div>
            </div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Are you Operating
                    Equipment not
                    listed here?</h6>
                <div class="mb-3 form-floating">
                    <select class="form-select" name="instfloat_additional_info_q2" id="instfloat_additional_info_q2"
                        aria-label="instfloat_additional_info_q2">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="instfloat_additional_info_q2">Please
                        select:</label>
                </div>
            </div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Property used underground?
                </h6>
                <div class="mb-3 form-floating">
                    <select class="form-select" name="instfloat_additional_info_q3" id="instfloat_additional_info_q3"
                        aria-label="instfloat_additional_info_q3">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="instfloat_additional_info_q3">Please
                        select:</label>
                </div>
            </div>
            <div class="col-md-12">
                <h6 class="profession_header mt-2 mb-2">Any work done afloat?</h6>
                <div class="mb-3 form-floating">
                    <select class="form-select" name="instfloat_additional_info_q4" id="instfloat_additional_info_q4"
                        aria-label="instfloat_additional_info_q4">
                        <option value="" selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="instfloat_additional_info_q4">Please
                        select:</label>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- /Step -->

<!-- Installation Floater Stepper 5 -->
<div class="step" id="instfloat_step_5">
    @if (session('doesINSTFLOATChecked') === 'true')
        <div class="question_title">
            <h3>Installation Floater Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="d-flex justify-content-between">
            <h5 class="profession_header mt-2 mb-2">Scheduled Equipment for
                storage:</h5>
            <button id="add_sched_equipment_entry" class="btn_2">+</button>
        </div>
        <div class="row justify-content-center">
            <h6 class="profession_header mt-2 mb-2">Scheduled Equipment 1</h6>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="instfloat_scheduled_equipment_type_1"
                        id="instfloat_scheduled_equipment_type_1" class="form-control" placeholder="Type:" />
                    <label for="instfloat_scheduled_equipment_type_1">Type:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="instfloat_scheduled_equipment_mfg_1"
                        id="instfloat_scheduled_equipment_mfg_1" class="form-control" placeholder="Manufacturer:" />
                    <label for="instfloat_scheduled_equipment_mfg_1">Manufacturer:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="instfloat_scheduled_equipment_id_or_serial_1"
                        id="instfloat_scheduled_equipment_id_or_serial_1" class="form-control"
                        placeholder="ID # /
                            Serial Number:" />
                    <label for="instfloat_scheduled_equipment_id_or_serial_1">ID #
                        /
                        Serial Number:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="instfloat_scheduled_equipment_model_1"
                        id="instfloat_scheduled_equipment_model_1" class="form-control" placeholder="Model:" />
                    <label for="instfloat_scheduled_equipment_model_1">Model:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <select class="form-select" name="instfloat_scheduled_equipment_new_or_used_1"
                        id="instfloat_scheduled_equipment_new_or_used_1"
                        aria-label="instfloat_scheduled_equipment_new_or_used_1">
                        <option value="" selected></option>
                        <option value="New">New</option>
                        <option value="Used">Used</option>
                    </select>
                    <label for="instfloat_scheduled_equipment_new_or_used_1">New /
                        Used:</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="instfloat_scheduled_equipment_model_year_1"
                        id="instfloat_scheduled_equipment_model_year_1" class="form-control"
                        placeholder="Model Year:" />
                    <label for="instfloat_scheduled_equipment_model_year_1">Model
                        Year:</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="instfloat_scheduled_equipment_date_purchased_1"
                        id="instfloat_scheduled_equipment_date_purchased_1" class="form-control"
                        placeholder="Date Purchased:" />
                    <label for="instfloat_scheduled_equipment_date_purchased_1">Date
                        Purchased:</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" id="sched_equipment_container">
        </div>
    @endif
</div>
