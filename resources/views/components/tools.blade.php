<div class="step" id="tools_step_1">
    @if (session('doesTOOLSChecked') === 'true')
        <div class="question_title">
            <h3>Tools & Equipment Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="tools_misc_tools" id="tools_misc_tools" class="form-control required"
                        placeholder="$1,500 below">
                    <label for="tools_misc_tools">Miscellaneous Tools Amount
                        ($1,500 in
                        value
                        and under)</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="tools_rented_or_leased_amt" id="tools_rented_or_leased_amt"
                        class="form-control required" placeholder="$">
                    <label for="tools_rented_or_leased_amt">Rented / Leased
                        Equipment
                        Amount</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="tools_sched_equipment" id="tools_sched_equipment"
                        class="form-control required" placeholder="$1,500 above">
                    <label for="tools_sched_equipment">Scheduled Equipment ($1,500
                        in
                        value
                        and
                        above)</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="tools_equipment_type" id="tools_equipment_type"
                        class="form-contro requiredl" placeholder="Equipment Type">
                    <label for="tools_equipment_type">Equipment Type</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3 form-floating">
                    <input type="text" name="tools_equipment_year" id="tools_equipment_year"
                        class="form-control required" placeholder="YYYY">
                    <label for="tools_equipment_year">Year</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3 form-floating">
                    <input type="text" name="tools_equipment_make" id="tools_equipment_make"
                        class="form-control required" placeholder="Make">
                    <label for="tools_equipment_make">Make</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3 form-floating">
                    <input type="text" name="tools_equipment_model" id="tools_equipment_model"
                        class="form-control required" placeholder="Model">
                    <label for="tools_equipment_model">Model</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="tools_equipment_vin_or_serial_no" id="tools_equipment_vin_or_serial_no"
                        class="form-control required" placeholder="VIN or Serial Number">
                    <label for="tools_equipment_vin_or_serial_no">VIN or Serial
                        Number</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <input type="text" name="tools_equipment_valuation" id="tools_equipment_valuation"
                        class="form-control required" placeholder="Valuation">
                    <label for="tools_equipment_valuation">Valuation</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select required" name="tools_equipment_no_of_losses"
                        id="tools_equipment_no_of_losses" aria-label="tools_equipment_no_of_losses">
                        <option selected></option>
                        <option value="0">No Losses</option>
                        <option value="1">1 yr. No Losses</option>
                        <option value="3">3 yrs. No Losses</option>
                        <option value="5">5 yrs. No Losses</option>
                        <option value="-1">Have Losses</option>
                    </select>
                    <label for="tools_equipment_no_of_losses">Tools & Equipment -
                        # of
                        Losses</label>
                </div>
            </div>
            <!--  -->
            <div id="tools_equipment_losses_container"></div>
            <!--  -->
        </div>
    @endif
</div>
