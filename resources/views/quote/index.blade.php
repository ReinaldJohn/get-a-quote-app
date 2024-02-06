<x-layout :trueValues="$trueValues">
    <div class="min-vh-100 d-flex flex-column">
        {{-- Start Header --}}
        <x-header></x-header>
        {{-- End Header --}}

        <div class="container-fluid d-flex flex-column my-auto">
            <div id="wizard_container">
                <div id="top-wizard">
                    <div id="progressbar"></div>
                </div>

                <div class="form-container">
                    <div class="loader-container hidden">
                        <div class="custom-loader"></div>
                    </div>
                    <!-- /top-wizard -->
                    <form id="wrapped">
                        @csrf
                        <input id="website" name="website" type="text" value="">
                        <!-- Leave input above for security protection, read docs for details -->

                        <div id="middle-wizard">
                            <!-- Product List Options -->
                            <x-product-list></x-product-list>

                            <!-- Client Information Stepper -->
                            <x-personal-info :states="$states"></x-personal-info>
                            <!-- /Step -->

                            <!-- About Your Company Stepper -->
                            <x-about-your-company :professions="$professions"></x-about-your-company>
                            <!-- /Step -->

                            <!-- Products Steps -->
                            <!-- GL -->
                            <x-gl :professions="$professions"></x-gl>

                            <!-- WC -->
                            <x-wc :professions="$professions" :wcProfessions="$wcProfessions"></x-wc>

                            <!-- AUTO -->
                            <x-auto></x-auto>

                            <!-- BOND -->
                            <x-bond></x-bond>

                            <!-- EXCESS -->
                            <x-excess></x-excess>

                            <!-- TOOLS AND EQUIPMENT -->
                            <x-tools></x-tools>

                            <!-- BUILDER'S RISK -->
                            <x-br></x-br>

                            <!-- BUSINESS OWNERS POLICY -->
                            <x-bop></x-bop>

                            <!-- COMMERCIAL PROPERTY -->
                            <x-property></x-property>

                            <!-- ERRORS AND OMISSION -->
                            <x-eo></x-eo>

                            <!-- POLLUTION LIABILITY -->
                            <x-pollution :p1="$p1" :p2="$p2" :p3="$p3"></x-pollution>

                            <!-- EPLI -->
                            <x-epli></x-epli>

                            <!-- CYBER LIABILITY -->
                            <x-cyber></x-cyber>

                            <!-- INSTALLATION FLOATER -->
                            <x-instfloat :states="$states"></x-instfloat>

                            <!-- POLLUTION Stepper 1 -->
                            {{-- <div id="pollutionContainer"> --}}
                            {{-- @if (session('doesPollutionChecked') === 'true') --}}
                            {{-- <div class="step" id="pollution_step_1">
                                        <div class="question_title">
                                            <h3>Pollution Liability Application</h3>
                                            <p>Please provide the requested information and proceed.</p>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                                <div class="mb-3 form-floating">
                                                    <select class="form-select" name="pollution_profession"
                                                        id="pollution_profession" aria-label="pollution_profession">
                                                        @foreach ($professions as $profession)
                                                            <option value="{{ $profession['id'] }}">
                                                                {{ $profession['name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <label for="pollution_profession">Select a Profession</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 form-floating">
                                                    <select class="form-select" name="pollution_residential"
                                                        id="pollution_residential" aria-label="pollution_residential">
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
                                                    <label for="pollution_residential">Residential %</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 form-floating">
                                                    <select class="form-select" name="pollution_commercial"
                                                        id="pollution_commercial" aria-label="pollution_commercial">
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
                                                    <select class="form-select" name="pollution_new_construction"
                                                        id="pollution_new_construction"
                                                        aria-label="pollution_new_construction">
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
                                                    <label for="pollution_new_construction">New Construction
                                                        %</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 form-floating">
                                                    <select class="form-select" name="pollution_repair_remodel"
                                                        id="pollution_repair_remodel"
                                                        aria-label="pollution_repair_remodel">
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
                                                    <label for="pollution_repair_remodel">Repair/Remodel %</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3 form-floating">
                                                    <textarea style="resize: none;" name="pollution_descops" id="pollution_descops" class="form-control"
                                                        placeholder="Detailed Description of
                                                                Operations"></textarea>
                                                    <label for="pollution_descops">Detailed Description of
                                                        Operations</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3 form-floating">
                                                    <input type="text" name="pollution_cost_proj_5years"
                                                        id="pollution_cost_proj_5years" class="form-control"
                                                        placeholder="Cost of the Largest Project in
                                                                the
                                                                past 5 years?"
                                                        >
                                                    <label for="pollution_cost_proj_5years">Cost of the Largest
                                                        Project in
                                                        the
                                                        past 5 years?</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                            <!-- /Step -->

                            <!-- POLLUTION Stepper 2 -->
                            {{-- <div class="step" id="pollution_step_2">
                                        <div class="question_title">
                                            <h3>Pollution Liability Application</h3>
                                            <p>Please provide the requested information and proceed.</p>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                                <div class="mb-3 form-floating">
                                                    <input type="text" name="pollution_annual_gross"
                                                        id="pollution_annual_gross" class="form-control"
                                                        placeholder="Annual Gross Receipts">
                                                    <label for="pollution_annual_gross">Annual Gross
                                                        Receipts</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3 form-floating">
                                                    <input type="text" name="pollution_no_field_emp"
                                                        id="pollution_no_field_emp" class="form-control"
                                                        placeholder="Number of Field Employees">
                                                    <label for="pollution_no_field_emp">Number of Field
                                                        Employees</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3 form-floating">
                                                    <input type="text" name="pollution_payroll_amt"
                                                        id="pollution_payroll_amt" class="form-control"
                                                        placeholder="Payroll Amount">
                                                    <label for="pollution_payroll_amt">Payroll Amount</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3 form-floating">
                                                    <select class="form-select" name="pollution_using_subcon"
                                                        id="pollution_using_subcon" aria-label="pollution_using_subcon">
                                                        <option value selected></option>
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                    <label for="pollution_using_subcon">Are you using any
                                                        subcontractor?</label>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div id="pollution_subcon_cost_container"></div>
                                            <!--  -->
                                            <div class="col-md-12">
                                                <div class="mb-3 form-floating">
                                                    <select class="form-select" name="pollution_no_losses_5years"
                                                        id="pollution_no_losses_5years"
                                                        aria-label="pollution_no_losses_5years">
                                                        <option value selected></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6+</option>
                                                    </select>
                                                    <label for="pollution_no_losses_5years"># of Losses for the
                                                        Past 5
                                                        Years</label>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div id="pollution_explain_losses_container"></div>
                                            <!--  -->
                                        </div>
                                    </div> --}}
                            <!-- /Step -->
                            {{-- @endif --}}
                            {{-- </div> --}}

                            <!-- EPLI Stepper 1 -->
                            {{-- <div id="epliContainer"> --}}
                            {{-- @if (session('doesEPLIChecked') === 'true') --}}

                            <!-- /Step -->
                            {{-- @endif --}}
                            {{-- </div> --}}

                            <!-- Cyber Liability Stepper 1 -->
                            {{-- <div id="cyberContainer"> --}}
                            {{-- @if (session('doesEPLIChecked') === 'true') --}}

                            <!-- /Step -->
                            {{-- @endif --}}
                            {{-- </div> --}}

                            <!-- Installation Floater Stepper 1 -->
                            {{-- <div id="instFloatContainer"> --}}
                            {{-- @if (session('doesInstFloatChecked') === 'true') --}}

                            <!-- /Step -->
                            {{-- @endif --}}
                            {{-- </div> --}}
                            <!-- End Product Steps -->

                            <!-- Review Form Stepper -->
                            <div class="submit step">
                                <div class="question_title">
                                    <h3>Review Information</h3>
                                    <p>Kindly review your application details before submitting.</p>
                                </div>
                                <div class="row justify-content-between reviewInfoContainer">
                                    <div class="col-lg-12 mt-2" id="personalDetailsContainer">
                                        <h5>Personal Information</h5>
                                        <div class="reviewInfoSubContainer" id="personal_information_details">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mt-2" id="personalDetailsContainer">
                                        <h5>About Your Company</h5>
                                        <div class="reviewInfoSubContainer" id="about_your_company_details">
                                        </div>
                                    </div>

                                    <!-- START GL REVIEW -->
                                    <div class="col-lg-12 mt-2" id="glDetailsContainer">
                                        <h5>General Liability Application</h5>
                                        <div class="reviewInfoSubContainer" id="gl_information_details"></div>
                                    </div>
                                    <!-- END GL REVIEW -->

                                    <!-- START WC REVIEW -->
                                    <div class="col-lg-12 mt-2" id="wcDetailsContainer">
                                        <h5>Worker's Compensation Application</h5>
                                        <div class="reviewInfoSubContainer" id="wc_details_1"></div>
                                        <div class="entryContainer professionEntries">
                                            <div id="wc_details_2"></div>
                                        </div>
                                        <div class="reviewInfoSubContainer" id="wc_details_3"></div>
                                    </div>
                                    <!-- END WC REVIEW -->

                                    <!-- START AUTO REVIEW -->
                                    <div class="col-lg-12 mt-2" id="autoDetailsContainer">
                                        <h5>Commercial Auto Application</h5>
                                        <div class="reviewInfoSubContainer" id="auto_other_details"></div>
                                        <div class="reviewInfoSubContainer" id="auto_vehicle_details_1"></div>
                                        <div class="entryContainer vehicleEntries"></div>
                                        <div class="reviewInfoSubContainer" id="auto_driver_details_1"></div>
                                        <div class="entryContainer driverEntries"></div>
                                    </div>
                                    <!-- END AUTO REVIEW -->

                                    <!-- START BOND REVIEW -->
                                    <div class="col-lg-12 mt-2" id="bondDetailsContainer">
                                        <h5>Contractor's License Bond Application</h5>
                                        <div class="reviewInfoSubContainer" id="license_bond_details"></div>
                                    </div>
                                    <!-- END BOND REVIEW -->

                                    <!-- START EXCESS REVIEW -->
                                    <div class="col-lg-12 mt-2" id="excessDetailsContainer">
                                        <h5>Excess Liability Application</h5>
                                        <div class="reviewInfoSubContainer" id="excess_liability_details"></div>
                                    </div>
                                    <!-- END EXCESS REVIEW -->

                                    <!-- START TOOLS REVIEW -->
                                    <div class="col-lg-12 mt-2" id="toolsDetailsContainer">
                                        <h5>Tools & Equipment Application</h5>
                                        <div class="reviewInfoSubContainer" id="tools_equipment_details"></div>
                                    </div>
                                    <!-- END TOOLS REVIEW -->

                                    <!-- START BR REVIEW -->
                                    <div class="col-lg-12 mt-2" id="brDetailsContainer">
                                        <h5>Builder's Risk Application</h5>
                                        <div class="reviewInfoSubContainer" id="builders_risk_details"></div>
                                    </div>
                                    <!-- END BR REVIEW -->

                                    <!-- START BOP REVIEW -->
                                    <div class="col-lg-12 mt-2" id="bopDetailsContainer">
                                        <h5>Business Owner's Policy Application</h5>
                                        <div class="reviewInfoSubContainer" id="bop_details">
                                        </div>
                                    </div>
                                    <!-- END BOP REVIEW -->

                                    <!-- START COMMERCIAL PROPERTY REVIEW -->
                                    <div class="col-lg-12 mt-2" id="cpDetailsContainer">
                                        <h5>Commercial Property Application</h5>
                                        <div class="reviewInfoSubContainer" id="commercial_property_details">
                                        </div>
                                    </div>
                                    <!-- END COMMERCIAL PROPERTY REVIEW -->

                                    <!-- START EO REVIEW -->
                                    <div class="col-lg-12 mt-2" id="eoDetailsContainer">
                                        <h5>Errors & Omission Application</h5>
                                        <div class="reviewInfoSubContainer" id="error_emissions_details">
                                        </div>
                                    </div>
                                    <!-- END EO REVIEW -->

                                    <!-- START POLLUTION REVIEW -->
                                    <div class="col-lg-12 mt-2" id="pollutionDetailsContainer">
                                        <h5>Pollution Liability Application</h5>
                                        <div class="reviewInfoSubContainer" id="pollution_liability_details1">
                                        </div>
                                        <div class="reviewInfoSubContainer" id="pollution_liability_details2">
                                        </div>
                                        <div class="reviewInfoSubContainer" id="pollution_liability_details3">
                                        </div>
                                        <div class="reviewInfoSubContainer" id="pollution_liability_details4">
                                        </div>
                                    </div>
                                    <!-- END POLLUTION REVIEW -->

                                    <!-- START EPLI REVIEW -->
                                    <div class="col-lg-12 mt-2" id="epliDetailsContainer">
                                        <h5>Employment Practice Liability Application</h5>
                                        <div class="reviewInfoSubContainer" id="epli_liability_details">
                                        </div>
                                    </div>
                                    <!-- END EPLI REVIEW -->

                                    <!-- START CYBER REVIEW -->
                                    <div class="col-lg-12 mt-2" id="cyberDetailsContainer">
                                        <h5>Cyber Liability Application</h5>
                                        <div class="reviewInfoSubContainer" id="cyber_liability_details">
                                        </div>
                                    </div>
                                    <!-- END CYBER REVIEW -->

                                    <!-- START INSTFLOAT REVIEW -->
                                    <div class="col-lg-12 mt-2" id="instfloatDetailsContainer">
                                        <h5>Installation Floater Application</h5>
                                        <div class="reviewInfoSubContainer" id="instfloat_liability_details">
                                        </div>
                                    </div>
                                    <!-- END INSTFLOAT REVIEW -->

                                </div>
                                <!-- /row -->
                                <!-- TERMS -->
                                <x-terms></x-terms>
                            </div>
                            <!-- /Step -->

                            <!-- UTM params -->
                            <x-utms></x-utms>
                        </div>
                        <!-- /middle-wizard -->

                        <div id="bottom-wizard">
                            <button type="button" name="backward" class="backward btn_1">Previous</button>
                            <button type="button" name="forward" class="forward btn_1">Next</button>

                            <button type="submit" name="process" id="process"
                                class="submit btn_1">Submit</button>

                        </div>
                        <!-- /bottom-wizard -->
                    </form>
                </div>
            </div>
            <!-- /Wizard container -->
        </div>
        <!-- /Container -->

        <footer>
            <div class="container-fluid">
                <div class="row align-items-center text-center">
                    <div class="col-sm-12">
                        <p>© {{ $currentYear }} Pascal Burke Insurance Brokerage Inc.</p>
                    </div>
                </div>
                <!-- /Row -->
            </div>
            <!-- /Container -->
        </footer>
        <!-- /Footer -->

    </div>
</x-layout>
