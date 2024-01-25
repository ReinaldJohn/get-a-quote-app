<!-- GL Stepper 1 -->
<div class="step" id="gl_step_1">
    @if (session('doesGLChecked') === 'true')
        <div class="question_title">
            <h3>General Liability Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="gl_annual_gross" id="gl_annual_gross" class="form-control"
                        placeholder="Annual Gross Receipts">
                    <label for="gl_annual_gross">Annual Gross Receipts</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select" name="gl_profession" id="gl_profession" aria-label="gl_profession">
                        <option value selected></option>
                        <optgroup label="All Professions">
                            @foreach ($professions as $profession)
                                <option value="{{ $profession['id'] }}">
                                    {{ $profession['name'] }}
                                </option>
                            @endforeach
                        </optgroup>
                    </select>
                    <label for="gl_profession">Select a Profession</label>
                </div>
            </div>
            <div id="gl_annual_gross_additional_questions"></div>
            <div id="gl_profession_if_others"></div>
            <div id="gl_profession_container"></div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <select class="form-select" name="gl_residential" id="gl_residential" aria-label="gl_residential">
                        <option value selected></option>
                        <option value="0">0%</option>
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                        <option value="15">15%</option>
                        <option value="20">20%</option>
                        <option value="25">25%</option>
                        <option value="30">30%</option>
                        <option value="35">35%</option>
                        <option value="40">40%</option>
                        <option value="45">45%</option>
                        <option value="50">50%</option>
                        <option value="55">55%</option>
                        <option value="60">60%</option>
                        <option value="65">65%</option>
                        <option value="70">70%</option>
                        <option value="75">75%</option>
                        <option value="80">80%</option>
                        <option value="85">85%</option>
                        <option value="90">90%</option>
                        <option value="95">95%</option>
                        <option value="100">100%</option>
                    </select>
                    <label for="gl_residential">Residential %</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <select class="form-select" name="gl_commercial" id="gl_commercial" aria-label="gl_commercial">
                        <option value selected></option>
                        <option value="0">0%</option>
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                        <option value="15">15%</option>
                        <option value="20">20%</option>
                        <option value="25">25%</option>
                        <option value="30">30%</option>
                        <option value="35">35%</option>
                        <option value="40">40%</option>
                        <option value="45">45%</option>
                        <option value="50">50%</option>
                        <option value="55">55%</option>
                        <option value="60">60%</option>
                        <option value="65">65%</option>
                        <option value="70">70%</option>
                        <option value="75">75%</option>
                        <option value="80">80%</option>
                        <option value="85">85%</option>
                        <option value="90">90%</option>
                        <option value="95">95%</option>
                        <option value="100">100%</option>
                    </select>
                    <label for="gl_commercial">Commercial %</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <select class="form-select" name="gl_new_construction" id="gl_new_construction"
                        aria-label="gl_new_construction">
                        <option value selected></option>
                        <option value="0">0%</option>
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                        <option value="15">15%</option>
                        <option value="20">20%</option>
                        <option value="25">25%</option>
                        <option value="30">30%</option>
                        <option value="35">35%</option>
                        <option value="40">40%</option>
                        <option value="45">45%</option>
                        <option value="50">50%</option>
                        <option value="55">55%</option>
                        <option value="60">60%</option>
                        <option value="65">65%</option>
                        <option value="70">70%</option>
                        <option value="75">75%</option>
                        <option value="80">80%</option>
                        <option value="85">85%</option>
                        <option value="90">90%</option>
                        <option value="95">95%</option>
                        <option value="100">100%</option>
                    </select>
                    <label for="gl_new_construction">New Construction %</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    <select class="form-select" name="gl_repair_remodel" id="gl_repair_remodel"
                        aria-label="gl_repair_remodel">
                        <option value selected></option>
                        <option value="0">0%</option>
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                        <option value="15">15%</option>
                        <option value="20">20%</option>
                        <option value="25">25%</option>
                        <option value="30">30%</option>
                        <option value="35">35%</option>
                        <option value="40">40%</option>
                        <option value="45">45%</option>
                        <option value="50">50%</option>
                        <option value="55">55%</option>
                        <option value="60">60%</option>
                        <option value="65">65%</option>
                        <option value="70">70%</option>
                        <option value="75">75%</option>
                        <option value="80">80%</option>
                        <option value="85">85%</option>
                        <option value="90">90%</option>
                        <option value="95">95%</option>
                        <option value="100">100%</option>
                    </select>
                    <label for="gl_repair_remodel">Repair/Remodel %</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <textarea style="resize: none;" name="gl_descops" id="gl_descops" class="form-control"
                        placeholder="Detailed Description of Operations"></textarea>
                    <label for="gl_descops">Detailed Description of Operations</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select" name="gl_multiple_state_work" id="gl_multiple_state_work"
                        aria-label="gl_multiple_state_work">
                        <option value selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="gl_multiple_state_work">Multiple state work?</label>
                </div>
            </div>
            <div id="gl_multiple_state_work_container"></div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="gl_cost_proj_5years" id="gl_cost_proj_5years" class="form-control"
                        placeholder="Cost of the Largest Project in the past 5 years?">
                    <label for="gl_cost_proj_5years">Cost of the Largest Project in the
                        past 5
                        years?</label>
                </div>
            </div>
        </div>
        <!-- /row -->
    @endif
</div>
<!-- /Step -->
<!-- GL Stepper 2 -->
<div class="step" id="gl_step_2">
    @if (session('doesGLChecked') === 'true')
        <div class="question_title">
            <h3>General Liability Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">

            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    {{-- <input type="text" name="gl_full_time_employees"
                id="gl_full_time_employees" class="form-control" placeholder=""> --}}
                    <select class="form-select" name="gl_full_time_employees" id="gl_full_time_employees"
                        aria-label="gl_full_time_employees">
                        <option selected></option>
                        <option value="0">0 Employee</option>
                        <option value="1">1 Employee</option>
                        <option value="2">2 Employees</option>
                        <option value="3">3 Employees</option>
                        <option value="4">4 Employees</option>
                        <option value="5">5 Employees</option>
                        <option value="6">6 Employees</option>
                        <option value="7">7 Employees</option>
                        <option value="8">8 Employees</option>
                        <option value="9">9 Employees</option>
                        <option value="10">10 Employees</option>
                    </select>
                    <label for="gl_full_time_employees">Full Time Employee/s</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 form-floating">
                    {{-- <input type="text" name="gl_part_time_employees"
                id="gl_part_time_employees" class="form-control" placeholder=""> --}}
                    <select class="form-select" name="gl_part_time_employees" id="gl_part_time_employees"
                        aria-label="gl_part_time_employees">
                        <option selected></option>
                        <option value="0">0 Employee</option>
                        <option value="1">1 Employee</option>
                        <option value="2">2 Employees</option>
                        <option value="3">3 Employees</option>
                        <option value="4">4 Employees</option>
                        <option value="5">5 Employees</option>
                        <option value="6">6 Employees</option>
                        <option value="7">7 Employees</option>
                        <option value="8">8 Employees</option>
                        <option value="9">9 Employees</option>
                        <option value="10">10 Employees</option>
                    </select>
                    <label for="gl_part_time_employees">Part Time Employee/s</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <input type="text" name="gl_payroll_amt" id="gl_payroll_amt" class="form-control"
                        placeholder="Payroll Amount">
                    <label for="gl_payroll_amt">Payroll Amount</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select" name="gl_using_subcon" id="gl_using_subcon"
                        aria-label="gl_using_subcon">
                        <option value selected></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <label for="gl_using_subcon">Are you using any subcontractor?</label>
                </div>
            </div>
            <!--  -->
            <div id="gl_subcon_cost_container"></div>
            <!--  -->
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select" name="gl_no_of_losses" id="gl_no_of_losses"
                        aria-label="gl_no_of_losses">
                        <option selected></option>
                        <option value="0">No Losses</option>
                        <option value="1">1 yr. No Losses</option>
                        <option value="3">3 yrs. No Losses</option>
                        <option value="5">5 yrs. No Losses</option>
                        <option value="-1">Have Losses</option>
                    </select>
                    <label for="gl_no_of_losses">General Liability - # of Losses</label>
                </div>
            </div>
            <!--  -->
            <div id="gl_losses_container"></div>
            <!--  -->
        </div>
        <!-- /row -->
    @endif
</div>
<!-- /Step -->
