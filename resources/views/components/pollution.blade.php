<div class="step" id="pollution_step_1">
    {{-- @if (session('doesEOChecked') === 'true') --}}
    <div class="question_title">
        <h3>Pollution Liability Application</h3>
        <p>Please provide the requested information and proceed.</p>
    </div>
    <h5 class="profession_header mt-2 mb-2">Environmental Contracting Services:</h5>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mb-3 form-floating">
                <input type="text" name="pol_1_proj_rev" id="pol_1_proj_rev" class="form-control"
                    placeholder="Projected Revenues $" />
                <label for="pol_1_proj_rev">Projected Revenues $:</label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3 form-floating">
                <input type="text" name="pol_1_subcon_work" id="pol_1_subcon_work" class="form-control"
                    placeholder="% of Subcontracted Work" />
                <label for="pol_1_subcon_work">% of Subcontracted Work:</label>
            </div>
        </div>
    </div>
    <h5 class="profession_header mt-2 mb-2">Total Revenue for Environmental Contracting Services:</h5>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mb-3 form-floating">
                <input type="text" name="pol_1_total_proj_rev" id="pol_1_total_proj_rev" class="form-control"
                    placeholder="Projected Revenues $:" />
                <label for="pol_1_total_proj_rev">Projected Revenues $:</label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3 form-floating">
                <input type="text" name="pol_1_total_subcon_work" id="pol_1_total_subcon_work" class="form-control"
                    placeholder="% of Subcontracted Work" />
                <label for="pol_1_total_subcon_work">% of Subcontracted Work:</label>
            </div>
        </div>
    </div>
    {{-- @endif --}}
</div>
<!-- /Step -->

<!-- Pollution Liability Stepper 2 -->
<div class="step" id="pollution_step_2">
    @if (session('doesPOLLUTIONChecked') === 'true')
        <div class="question_title">
            <h3>Pollution Liability Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <h5 class="profession_header mt-2 mb-2">Select all that apply to your work:</h5>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-floating">
                    <select class="form-select required polopt" id="polopt1_id" name="polopt1[]" aria-label=""
                        multiple="multiple">
                        @foreach ($p1 as $p_1)
                            <option value="{{ $p_1['id'] }}">{{ $p_1['option'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- /Step -->

<!-- Pollution Liability Stepper 3 -->
<div class="step" id="pollution_step_3">
    @if (session('doesPOLLUTIONChecked') === 'true')
        <div class="question_title">
            <h3>Pollution Liability Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <h5 class="profession_header mt-2 mb-2">Environmental Consulting Services:</h5>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="pol_2_proj_rev" id="pol_2_proj_rev" class="form-control"
                            placeholder="Projected Revenues $" />
                        <label for="pol_2_proj_rev">Projected Revenues $:</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="pol_2_subcon_work" id="pol_2_subcon_work" class="form-control"
                            placeholder="% of Subcontracted Work" />
                        <label for="pol_2_subcon_work">% of Subcontracted Work:</label>
                    </div>
                </div>
            </div>
            <h5 class="profession_header mt-2 mb-2">Total Revenue for Environmental Consulting Services:</h5>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="pol_2_total_proj_rev" id="pol_2_total_proj_rev" class="form-control"
                            placeholder="Projected Revenues $:" />
                        <label for="pol_2_total_proj_rev">Projected Revenues $:</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="pol_2_total_subcon_work" id="pol_2_total_subcon_work"
                            class="form-control" placeholder="% of Subcontracted Work" />
                        <label for="pol_2_total_subcon_work">% of Subcontracted Work:</label>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- /Step -->

<!-- Pollution Liability Stepper 4 -->
<div class="step" id="pollution_step_4">
    @if (session('doesPOLLUTIONChecked') === 'true')
        <div class="question_title">
            <h3>Pollution Liability Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <h5 class="profession_header mt-2 mb-2">Select all that apply to your work:</h5>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-floating">
                    <select class="form-select required polopt" id="polopt2_id" name="polopt2[]" aria-label=""
                        multiple="multiple">
                        @foreach ($p2 as $p_2)
                            <option value="{{ $p_2['id'] }}">{{ $p_2['option'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- /Step -->

<!-- Pollution Liability Stepper 5 -->
<div class="step" id="pollution_step_5">
    @if (session('doesPOLLUTIONChecked') === 'true')
        <div class="question_title">
            <h3>Pollution Liability Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <h5 class="profession_header mt-2 mb-2">Non-Environmental Services:</h5>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="pol_3_proj_rev" id="pol_3_proj_rev" class="form-control"
                            placeholder="Projected Revenues $" />
                        <label for="pol_3_proj_rev">Projected Revenues $:</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="pol_3_subcon_work" id="pol_3_subcon_work" class="form-control"
                            placeholder="% of Subcontracted Work" />
                        <label for="pol_3_subcon_work">% of Subcontracted Work:</label>
                    </div>
                </div>
            </div>
            <h5 class="profession_header mt-2 mb-2">Total Revenue for Non-Environmental Services:</h5>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="pol_3_total_proj_rev" id="pol_3_total_proj_rev"
                            class="form-control" placeholder="Projected Revenues $:" />
                        <label for="pol_3_total_proj_rev">Projected Revenues $:</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 form-floating">
                        <input type="text" name="pol_3_total_subcon_work" id="pol_3_total_subcon_work"
                            class="form-control" placeholder="% of Subcontracted Work" />
                        <label for="pol_3_total_subcon_work">% of Subcontracted Work:</label>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Pollution Liability Stepper 6 -->
<div class="step" id="pollution_step_6">
    @if (session('doesPOLLUTIONChecked') === 'true')
        <div class="question_title">
            <h3>Pollution Liability Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <h5 class="profession_header mt-2 mb-2">Select all that apply to your work:</h5>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-floating">
                    <select class="form-select required polopt" id="polopt3_id" name="polopt3[]" aria-label=""
                        multiple="multiple">
                        @foreach ($p3 as $p_3)
                            <option value="{{ $p_3['id'] }}">{{ $p_3['option'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Pollution Liability Stepper 7 -->
<div class="step" id="pollution_step_7">
    @if (session('doesPOLLUTIONChecked') === 'true')
        <div class="question_title">
            <h3>Pollution Liability Application</h3>
            <p>Please provide the requested information and proceed.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3 form-floating">
                    <select class="form-select" name="pollution_no_of_losses" id="pollution_no_of_losses"
                        aria-label="pollution_no_of_losses">
                        <option selected></option>
                        <option value="0">No Losses</option>
                        <option value="1">1 yr. No Losses</option>
                        <option value="3">3 yrs. No Losses</option>
                        <option value="5">5 yrs. No Losses</option>
                        <option value="-1">Have Losses</option>
                    </select>
                    <label for="pollution_no_of_losses">Pollution Liability Application - # of
                        Losses</label>
                </div>
            </div>
        </div>
        <!--  -->
        <div id="pollution_losses_container"></div>
        <!--  -->
    @endif
</div>
