<x-layout :trueValues="$trueValues" :title="$title">
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
                    <div class="col-sm-12">
                        <p><a href="{{ route('pp-index') }}">Privacy Policy</a> | <a
                                href="{{ route('cp-index') }}">Cookie
                                Policy</a> | <a href="{{ route('tc-index') }}">Terms and
                                Conditions</a></p>
                    </div>
                </div>
                <!-- /Row -->
            </div>
            <!-- /Container -->
        </footer>
        <!-- /Footer -->

    </div>
</x-layout>
