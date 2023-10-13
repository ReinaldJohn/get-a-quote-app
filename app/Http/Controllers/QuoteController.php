<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Quote;
use App\Models\Classcodes;
use Illuminate\Http\Request;
use App\Models\BOPInformation;
use App\Models\ClientInformation;
use App\Models\WCProfessionEntry;
use Illuminate\Support\Facades\DB;
use App\Models\GLMultipleStateWork;
use Illuminate\Support\Facades\Log;
use App\Models\GLAdditionalQuestions;
use App\Models\LicenseBondInformation;
use App\Models\BuildersRiskInformation;
use Illuminate\Support\Facades\Session;
use App\Models\CommercialAutoInformation;
use App\Models\ToolsEquipmentInformation;
use App\Models\ExcessLiabilityInformation;
use App\Models\AboutYourCompanyInformation;
use App\Models\CommercialAutoDrivers;
use App\Models\CommercialAutoVehicles;
use App\Models\CommercialPropertyInformation;
use App\Models\CyberLiabilityInformation;
use App\Models\EPLIInformation;
use App\Models\ErrorsAndEmissionInformation;
use App\Models\GeneralLiabilityInformation;
use App\Models\InstallationFloaterInformation;
use App\Models\InstallationFloaterScheduledEquipment;
use App\Models\PollutionLiabilityInformation;
use App\Models\WCOwnersInfo;
use App\Models\WorkersCompensationInformation;

class QuoteController extends Controller
{
    public function index() {

        $quoteModel = new Quote();
        $states = $quoteModel->getAllStates();
        $professions = $quoteModel->getAllProfessions();
        $currentYear = Carbon::now()->format('Y');
        return view("quote.index", compact('states', 'professions'), ['currentYear' => $currentYear]);
    }

    public function getStateByZipcode(Request $request, $zipcode) {
        $stateData = Quote::getStateByZipcode($zipcode);
        return response()->json(['state' => $stateData]);
    }

    public function thankyouPage() {
        return view("quote.thankyou");
    }

    public function showProfessionEntries(Request $request, Quote $quoteModel) {

        if ($request->isMethod('get') && $request->has('a')) {
            $a = $request->input('a');
            $output = "
                <div id='profession_entry_container_{$a}'>
                    <h4 class='profession_header mt-2 mb-2'>Profession Entry No. {$a}</h4>
                    <div class='row justify-content-center'>
                        <div class='col-md-12'>
                            <div class='mb-3 form-floating'>
                                <select class='form-control wc_profession_{$a}' name='wc_profession_{$a}' id='wc_profession_{$a}' aria-label='wc_profession_{$a}'>
                                    <option value selected></option> ";

                                        // Start output buffering
                                        ob_start();

                                        $professions = $quoteModel->getAllProfessions();
                                        foreach ($professions as $profession) {
                                            echo "<option value='{$profession['id']}'>{$profession['name']}</option>";
                                        }

                                        // Get current buffer contents and delete current output buffer
                                        $options = ob_get_clean();

                                        // Append options to output
                                        $output .= $options;

            $output .= "

                                </select>
                                <label for='wc_profession_{$a}'>Profession</label>
                            </div>
                        </div>
                        <div id='classcode_if_others_container_{$a}'></div>
                        <div class='col-md-12'>
                            <div class='mb-3 form-floating'>
                                <input type='text' name='wc_annual_payroll_{$a}' id='wc_annual_payroll_{$a}' class='form-control annual-payroll required' placeholder='' maxlength='20'>
                                <label for='wc_annual_payroll_{$a}'>Annual Payroll of Employee</label>
                            </div>
                        </div>
                    </div>
                </div>
            ";

            return response()->json(['data' => $output]);
        }

        // return response()->json(['data' => '']);
    }

    public function showVehicleEntries(Request $request) {

        if ($request->isMethod('get') && $request->has('a')) {

            $a = $request->input('a');
            // dd($a);

            $output = "
                <h4 class='profession_header mt-2 mb-2'>Vehicle Entry No. {$a}</h4>
                <div class='row justify-content-center'>
                    <div class='col-md-4'>
                        <div class='mb-3 form-floating'>
                            <input type='text' name='auto_vehicle_year_{$a}' id='auto_vehicle_year_{$a}' class='form-control' placeholder='' maxlength='4'>
                            <label for='auto_vehicle_year_{$a}'>Year</label>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class='mb-3 form-floating'>
                            <input type='text' name='auto_vehicle_maker_{$a}' id='auto_vehicle_maker_{$a}' class='form-control' placeholder='' maxlength='100'>
                            <label for='auto_vehicle_maker_{$a}'>Maker</label>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class='mb-3 form-floating'>
                            <input type='text' name='auto_vehicle_model_{$a}' id='auto_vehicle_model_{$a}' class='form-control' placeholder='' maxlength='100'>
                            <label for='auto_vehicle_model_{$a}'>Model</label>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='mb-3 form-floating'>
                            <input type='text' name='auto_vehicle_vin_{$a}' id='auto_vehicle_vin_{$a}' class='form-control' placeholder='' maxlength='100'>
                            <label for='auto_vehicle_vin_{$a}'>Vehicle Identification Number (VIN)</label>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='mb-3 form-floating'>
                            <input type='text' name='auto_vehicle_mileage_{$a}' id='auto_vehicle_mileage_{$a}' class='form-control' placeholder='' maxlength='100'>
                            <label for='auto_vehicle_mileage_{$a}'>Mileage / Radius</label>
                        </div>
                    </div>
                    <div class='col-md-12'>
                        <div class='mb-3 form-floating'>
                            <input type='text' name='auto_vehicle_garage_add_{$a}' id='auto_vehicle_garage_add_{$a}' class='form-control' placeholder=''>
                            <label for='auto_vehicle_garage_add_{$a}'>Garage Address</label>
                        </div>
                    </div>
                    <div class='col-md-12'>
                        <div class='mb-3 form-floating'>
                            <select class='form-control' name='auto_vehicle_coverage_limits_{$a}' id='auto_vehicle_coverage_limits_{$a}' aria-label='auto_vehicle_coverage_limits_{$a}'>
                                <option value selected></option>
                                <option value='100,000'>$100,000</option>
                                <option value='300,000'>$300,000</option>
                                <option value='500,000'>$500,000</option>
                                <option value='1,000,000'>$1,000,000</option>
                            </select>
                            <label for='auto_vehicle_coverage_limits_{$a}'>Coverage Limits</label>
                        </div>
                    </div>
                </div>
            ";

            return response()->json(['data' => $output]);
        }
        return response()->json(['data' => '']);
    }

    public function showDriverEntries(Request $request) {

        if ($request->isMethod('get') && $request->has('a')) {

            $a = $request->input('a');

            $output = "

                <h4 class='profession_header mt-2 mb-2'>Driver Information Entry No. {$a}</h4>
                <div class='row justify-content-center'>
                    <div class='col-md-12'>
                        <div class='mb-3 form-floating'>
                            <input type='text' name='auto_add_drivers_name_{$a}' id='auto_add_drivers_name_{$a}' class='form-control' placeholder='' maxlength='100'>
                            <label for='auto_add_drivers_name_{$a}'>Driver's Name</label>
                        </div>
                    </div>
                    <div class='col-md-12'>
                        <div class='mb-3 form-floating'>
                            <input type='text' name='auto_add_driver_lic_{$a}' id='auto_add_driver_lic_{$a}' class='form-control ' placeholder='' maxlength='50'>
                            <label for='auto_add_driver_lic_{$a}'>Driver's License Number</label>
                        </div>
                    </div>
                    <div class='col-md-12'>
                        <div class='mb-3 form-floating'>
                            <input type='text' name='auto_add_driver_mileage_radius_{$a}' id='auto_add_driver_mileage_radius_{$a}' class='form-control ' placeholder='' maxlength='100'>
                            <label for='auto_add_driver_mileage_radius_{$a}'>Mileage / Radius</label>
                        </div>
                    </div>
                    <div class='col-md-12'>
                        <div class='mb-3 form-floating'>
                            <input type='text' name='auto_add_driver_date_birth_{$a}' id='auto_add_driver_date_birth_{$a}' class='form-control driver_birthdate' placeholder=''>
                            <label for='auto_add_driver_date_birth_{$a}'>Date of Birth</label>
                        </div>
                    </div>
                    <div class='col-md-12'>
                        <div class='mb-3 form-floating'>
                            <select class='form-select ' name='auto_add_driver_civil_status_{$a}' id='auto_add_driver_civil_status_{$a}' aria-label='auto_add_driver_civil_status_{$a}'>
                                <option value selected></option>
                                <option value='Single'>Single</option>
                                <option value='Married'>Married</option>
                                <option value='Divorced'>Divorced</option>
                            </select>
                            <label for='auto_add_driver_civil_status_{$a}'>Civil Status</label>
                        </div>
                    </div>
                    <div id='auto_driver_if_married_container_{$a}'></div>
                </div>

            ";

            return response()->json(['data' => $output]);
        }
        return response()->json(['data' => '']);
    }

    public function showSpouseInformationForm(Request $request) {

        if ($request->isMethod('get') && $request->has('a')) {

            $a = $request->input('a');

            $output = "

                <div class='col-md-12'>
                    <div class='mb-3 form-floating'>
                        <input type='text' name='auto_add_driver_spouse_name_{$a}' id='auto_add_driver_spouse_name_{$a}' class='form-control ' placeholder='' maxlength='100'>
                        <label for='auto_add_driver_spouse_name_{$a}'>Spouse's Name</label>
                    </div>
                </div>
                <div class='col-md-12'>
                    <div class='mb-3 form-floating'>
                        <input type='text' name='auto_add_driver_spouse_dob_{$a}' id='auto_add_driver_spouse_dob_{$a}' class='form-control spouse_datebirth ' placeholder=''>
                        <label for='auto_add_driver_spouse_dob_{$a}'>Spouse's Date of Birth</label>
                    </div>
                </div>

            ";

            return response()->json(['data' => $output]);
        }
        return response()->json(['data' => '']);
    }

    public function submitQuoteForm(Request $request) {
        if ($request->isMethod('post')) {

            Log::debug('Raw request content: ' . $request->getContent());

            $formData = json_decode($request->getContent(), true);
            Log::debug('JSON Error: ' . json_last_error_msg());
            Log::debug('Data type of formData: ' . gettype($formData));
            Log::debug('formData: ' . json_encode($formData));

            if (is_array($formData)) {
                if (isset($formData['common'])) {
                    if (is_array($formData['common'])) {
                        $commonData = $formData['common'];
                    } else {
                        parse_str($formData['common'], $commonData);
                    }
                } else {
                    Log::error('Missing common key in formData.');
                    return response()->json(['status' => 'error', 'message' => 'Missing common key in formData.'], 400);
                }
                $productsData = $formData['products'];
            } else {
                Log::error('formData is not an array.');
                return response()->json(['status' => 'error', 'message' => 'Invalid formData.'], 400);
            }

            $productsData = $formData['products'];

            try {
                DB::transaction(function () use ($commonData, $productsData) {
                    $html_body = "";
                    $quoteModel = new Quote();

                    $stateAbbr = $quoteModel->getStatesById($commonData['states']);

                    $clientInformation = ClientInformation::create([
                        'company_name' => $commonData['company_name'],
                        'first_name' => $commonData['firstname'],
                        'last_name' => $commonData['lastname'],
                        'address' => $commonData['address'],
                        'city' => $commonData['city'],
                        'state' => $commonData['states'],
                        'zipcode' => $commonData['zipcode'],
                        'phone_number' => $commonData['phone_number'],
                        'fax_number' => $commonData['fax_number'],
                        'email_address' => $commonData['email_address'],
                        'website' => $commonData['personal_website'],
                        'contractor_license_no' => $commonData['contractor_license']
                    ]);

                    $templateData['stateAbbr'] = $stateAbbr;

                    try {

                        $aboutYourCompany = new AboutYourCompanyInformation();
                        $aboutYourCompany->client_info_id = $clientInformation->id;
                        $aboutYourCompany->business_ownership_structure = $commonData['ayc_bop'];
                        $aboutYourCompany->date_business_started = Carbon::createFromFormat('m/d/Y', $commonData['ayc_date_business_started']);
                        $aboutYourCompany->years_exp_as_contractor = $commonData['ayc_yrs_exp_contractor'];
                        $aboutYourCompany->no_of_losses = $commonData['ayc_no_of_losses'];
                        $aboutYourCompany->explain_losses = isset($commonData['ayc_no_of_losses_explain']) ? $commonData['ayc_no_of_losses_explain'] : null;

                        $dateBusinessStartedFormatted = Carbon::createFromFormat('m/d/Y', $commonData['ayc_date_business_started']);
                        $dateBusinessStartedFormatted1 = Carbon::parse($dateBusinessStartedFormatted)->format('F j, Y');

                        // Log::info('About to save About Your Company Data: ' . json_encode($aboutYourCompany));

                        $ayc_saving = $aboutYourCompany->save();

                        if (!$ayc_saving) {
                            throw new \Exception("Failed to save About Your Company. Data: " . json_encode($aboutYourCompany));
                        }

                        Log::info('Successfully saved About Your Company. Record id: ' . $aboutYourCompany->id);

                        $templateData['aboutYourCompany'] = $aboutYourCompany;
                        $templateData['dateBusinessStartedFormatted1'] = $dateBusinessStartedFormatted1;

                        // Log::info('Record inserted with id for About Your Company: ' . $aboutYourCompany->id);

                    } catch (\Exception $e) {
                        Log::error('Failed to insert About Your Company information. Error: ' . $e->getMessage());
                    }

                    foreach ($productsData as $product => $productDataStr) {
                        $productData = [];
                        if (is_array($productDataStr)) {
                            $productData = $productDataStr;
                        } else {
                            parse_str($productDataStr, $productData);
                        }
                        switch ($product) {

                            case 'gl':
                                try {
                                    $generalLiability = new GeneralLiabilityInformation();
                                    $generalLiability->client_info_id = $clientInformation->id;
                                    $generalLiability->profession = $productData['gl_profession']['value'];
                                    $generalLiability->annual_gross_receipt = floatval(preg_replace("/[^-0-9\.]/","", $productData['gl_annual_gross']['value']));
                                    $generalLiability->specify_profession_if_others = isset($productData['gl_specify_profession']) ? $productData['gl_specify_profession']['value'] : null;
                                    $generalLiability->residential = $productData['gl_residential']['value'];
                                    $generalLiability->commercial = $productData['gl_commercial']['value'];
                                    $generalLiability->new_construction = $productData['gl_new_construction']['value'];
                                    $generalLiability->repair_remodel = $productData['gl_repair_remodel']['value'];
                                    $generalLiability->detailed_descops = $productData['gl_descops']['value'];
                                    $generalLiability->multiple_state_work = $productData['gl_multiple_state_work']['value'];
                                    $generalLiability->cost_of_largest_project = floatval(preg_replace("/[^-0-9\.]/","", $productData['gl_cost_proj_5years']['value']));
                                    $generalLiability->full_time = $productData['gl_full_time_employees']['value'];
                                    $generalLiability->part_time = $productData['gl_part_time_employees']['value'];
                                    $generalLiability->payroll_amount = floatval(preg_replace("/[^-0-9\.]/","", $productData['gl_payroll_amt']['value']));
                                    $generalLiability->does_using_subcontractor = $productData['gl_using_subcon']['value'];
                                    $generalLiability->subcon_cost = isset($productData['gl_subcon_cost']['value']) ? floatval(preg_replace("/[^-0-9\.]/","", $productData['gl_subcon_cost']['value'])) : null;

                                    $generalLiability->save();

                                    $professionName = $quoteModel->getProfessionById($productData['gl_profession']['value']);
                                    $parsedPayrollAmount = floatval($generalLiability->payroll_amount);
                                    $parsedCostProj5years = floatval($generalLiability->cost_of_largest_project);
                                    $parsedSubconCost = floatval($generalLiability->subcon_cost);

                                    Log::debug('gl_profession value: ' . $generalLiability->profession);

                                    $classcodesModel = new Classcodes();

                                    $filteredClasscodes = $classcodesModel->filterClasscodesWithQuestion([178, 184, 226, 190, 115, 188, 189, 114, 229, 119, 56, 196, 146, 51]);

                                    $templateData['glAdditionalQuestions'] = [];  // Initialize an array

                                    if (in_array((int) $generalLiability->profession, $filteredClasscodes)) {

                                        $templateData['doesHaveAdditionalQuestion'] = true;

                                        // Get the classcode object.
                                        $classcode = $classcodesModel->find((int) $productData['gl_profession']['value']);
                                        if(!$classcode) {
                                            Log::error("Classcode not found for ID: " . $productData['gl_profession']['value']);
                                            return;
                                        }

                                        foreach ($productDataStr as $key => $data) {
                                            $glAdditionalQuestions = new GLAdditionalQuestions();
                                            if (strpos($key, 'gl_gross_add_') === 0) {
                                                DB::beginTransaction();
                                                try {

                                                    $glProfession = (int) $productData['gl_profession']['value'];
                                                    $questionLabels = isset($data['h6']) ? $data['h6'] : $data['label'];
                                                    $questionAnswers = $data['value'];

                                                    $glAdditionalQuestions->gl_id = $generalLiability->id;
                                                    $glAdditionalQuestions->classcode_id = $glProfession;
                                                    // Here we're using the related question's content.
                                                    $glAdditionalQuestions->question = $questionLabels;
                                                    $glAdditionalQuestions->answer = $questionAnswers;

                                                    $glAdditionalQuestions->save();

                                                    Log::info('Successfully saved glAdditionalQuestions record. Data: ' . json_encode($glAdditionalQuestions));

                                                    $templateData['glAdditionalQuestions'][] = [
                                                        'questionLabels' => $questionLabels,
                                                        'questionAnswers' => $questionAnswers,
                                                    ];

                                                    DB::commit();
                                                } catch (\Exception $e) {
                                                    DB::rollBack();  // Rollback the database transaction on error
                                                    Log::error('Failed to insert glAdditionalQuestions record. Exception: ' . $e->getMessage());
                                                }
                                            }
                                        }
                                    } else {
                                        $templateData['doesHaveAdditionalQuestion'] = false;
                                    }

                                    $templateData['multipleStateWorks'] = [];  // Initialize an array

                                    foreach ($productDataStr as $key => $data) {
                                        if (strpos($key, 'gl_multiple_states_') === 0) {
                                            $counter = str_replace('gl_multiple_states_', '', $key); // Get the counter for this set of inputs
                                            if (isset($productDataStr['gl_multiple_states_percentage_' . $counter]) && !empty($productDataStr['gl_multiple_states_percentage_' . $counter]['value'])) {
                                                DB::beginTransaction();
                                                try {
                                                    $stateWorking = $data['value'];
                                                    $statePercentage = $productDataStr['gl_multiple_states_percentage_' . $counter]['value'];

                                                    $glMultipleStateWork = new GLMultipleStateWork();
                                                    $glMultipleStateWork->gl_id = $generalLiability->id;
                                                    $glMultipleStateWork->state = $stateWorking;
                                                    $glMultipleStateWork->percentage = $statePercentage;
                                                    $glMultipleStateWork->save();

                                                    // Store it in the array for the view
                                                    $templateData['multipleStateWorks'][] = [
                                                        'counter' => $counter,
                                                        'state' => $stateWorking,
                                                        'percentage' => $statePercentage
                                                    ];

                                                    DB::commit();
                                                } catch (\Exception $e) {
                                                    DB::rollBack();
                                                    Log::error('Failed to insert glMultipleStateWork record. Exception: ' . $e->getMessage());
                                                }
                                            }
                                        }
                                    }

                                    $templateData['fullAddress'] = $clientInformation->address . ' ' . $clientInformation->city . ' ' . $clientInformation->states . ', ' . $clientInformation->zipcode;
                                    $templateData['professionName'] = $professionName;
                                    $templateData['parsedCostProj5years'] = $parsedCostProj5years;
                                    $templateData['parsedPayrollAmount'] = $parsedPayrollAmount;
                                    $templateData['parsedSubconCost'] = $parsedSubconCost;
                                    $templateData['generalLiability'] = $generalLiability;
                                    $templateData['productType'] = 'gl';
                                    $templateData['stateAbbr'] = $stateAbbr;
                                    $templateData['clientInformation'] = $clientInformation;

                                    $html_body .= view('quote.quote-details', $templateData)->render();

                                    Log::info('Record inserted with id for GL: ' . $generalLiability->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'wc':
                                try {
                                    $workersCompensation = new WorkersCompensationInformation();
                                    $workersCompensation->client_info_id = $clientInformation->id;
                                    $workersCompensation->gross_receipt = floatval(preg_replace("/[^-0-9\.]/","", $productData['wc_gross_receipt']['value']));
                                    $workersCompensation->does_hire_subcontractor = $productData['wc_does_hire_subcon']['value'];
                                    $workersCompensation->subcontractor_cost_in_year = isset($productData['wc_subcon_cost_year']['value']) ? floatval(preg_replace("/[^-0-9\.]/","", $productData['wc_subcon_cost_year']['value'])) : null;
                                    $workersCompensation->number_of_employee = $productData['wc_num_of_empl']['value'];

                                    $workersCompensation->save();

                                    foreach ($productDataStr as $key => $data) {
                                        if (strpos($key, 'wc_profession_') === 0) {
                                            $counter = str_replace('wc_profession_', '', $key);
                                            if (isset($productDataStr['wc_profession_' . $counter]) && !empty($productDataStr['wc_annual_payroll_' . $counter]['value'])) {
                                                DB::beginTransaction();
                                                try {
                                                    $wcProfessionEntry = new WCProfessionEntry();
                                                    $wcProfessionEntry->wc_id = $workersCompensation->id;
                                                    $wcProfessionEntry->profession_id = $productData['wc_profession_' . $counter]['value'];
                                                    $wcProfessionEntry->annual_payroll_of_employee = floatval(preg_replace("/[^-0-9\.]/","", $productData['wc_annual_payroll_' . $counter]['value']));

                                                    $wcProfessionEntry->save();
                                                    Log::info('Successfully saved wcProfessionEntry record. Data: ' . json_encode($wcProfessionEntry));
                                                    DB::commit();
                                                } catch (\Exception $e) {
                                                    Log::error('Failed to insert wcProfessionEntry record. Exception: ' . $e->getMessage());
                                                }
                                            }
                                        }
                                    }

                                    // Handle data without underscores first
                                    $wcOwnersInfo = new WCOwnersInfo();

                                    DB::beginTransaction();
                                    try {
                                        $wcOwnersInfo->wc_id = $workersCompensation->id;
                                        $wcOwnersInfo->owners_name = $productData['wc_name']['value'];
                                        $wcOwnersInfo->title_relationship = $productData['wc_title_relationship']['value'];
                                        $wcOwnersInfo->ownership_percentage = $productData['wc_ownership_perc']['value'];
                                        $wcOwnersInfo->excluded_or_included = $productData['wc_exc_inc']['value'];
                                        $wcOwnersInfo->ssn = $productData['wc_ssn']['value'];
                                        $wcOwnersInfo->fein = $productData['wc_fein']['value'];
                                        $ownersDateOfBirth = Carbon::createFromFormat('m/d/Y', $productData['wc_dob']['value'])->toDateString();
                                        $wcOwnersInfo->owners_date_of_birth = $ownersDateOfBirth;

                                        $wcOwnersInfo->save();
                                        Log::info('Successfully saved wcOwnersInfo record. Data: ' . json_encode($wcOwnersInfo));
                                        DB::commit();
                                    } catch (\Exception $e) {
                                        DB::rollBack();
                                        Log::error('Failed to insert wcOwnersInfo record. Exception: ' . $e->getMessage());
                                    }

                                    // Handle the dynamic underscored keys
                                    foreach ($productDataStr as $key => $data) {
                                        if (strpos($key, 'wc_name_') === 0) {
                                            $counter = str_replace('wc_name_', '', $key);

                                            if (isset($productDataStr['wc_name_' . $counter]['value']) && !empty($productDataStr['wc_title_relationship_' . $counter]['value']) && !empty($productDataStr['wc_ownership_perc_' . $counter]['value']) && !empty($productDataStr['wc_exc_inc_' . $counter]['value']) && !empty($productDataStr['wc_ssn_' . $counter]['value']) && !empty($productDataStr['wc_fein_' . $counter]['value']) && !empty($productDataStr['wc_dob_' . $counter]['value'])) {
                                                $wcOwnersInfo = new WCOwnersInfo();

                                                DB::beginTransaction();
                                                try {
                                                    $wcOwnersInfo->wc_id = $workersCompensation->id;
                                                    $wcOwnersInfo->owners_name = $productData['wc_name_' . $counter]['value'];
                                                    $wcOwnersInfo->title_relationship = $productData['wc_title_relationship_' . $counter]['value'];
                                                    $wcOwnersInfo->ownership_percentage = $productData['wc_ownership_perc_' . $counter]['value'];
                                                    $wcOwnersInfo->excluded_or_included = $productData['wc_exc_inc_' . $counter]['value'];
                                                    $wcOwnersInfo->ssn = $productData['wc_ssn_' . $counter]['value'];
                                                    $wcOwnersInfo->fein = $productData['wc_fein_' . $counter]['value'];
                                                    $ownersDateOfBirth = Carbon::createFromFormat('m/d/Y', $productData['wc_dob_' . $counter]['value'])->toDateString();
                                                    $wcOwnersInfo->owners_date_of_birth = $ownersDateOfBirth;

                                                    $wcOwnersInfo->save();
                                                    Log::info('Successfully saved wcOwnersInfo record. Data: ' . json_encode($wcOwnersInfo));
                                                    DB::commit();
                                                } catch (\Exception $e) {
                                                    DB::rollBack();
                                                    Log::error('Failed to insert wcOwnersInfo record. Exception: ' . $e->getMessage());
                                                }
                                            }
                                        }
                                    }


                                    // $displayData = [];
                                    // for ($i = 1; $i <= 8; $i++) {
                                    //     $profession = $workersCompensation->{'profession_' . $i};
                                    //     $profession = $quoteModel->getProfessionById($profession);
                                    //     $annual_payroll_var = 'parsedAnnualPayroll' . $i;
                                    //     $annual_payroll = isset($$annual_payroll_var) ? $$annual_payroll_var : null;
                                    //     $full_time = $workersCompensation->{'full_time_' . $i};
                                    //     $part_time = $workersCompensation->{'part_time_' . $i};
                                    //     if ($profession || $annual_payroll || $full_time || $part_time) {
                                    //         $displayData[] = [
                                    //             'Profession Entry No' => 'Profession Entry No ' . $i,
                                    //             'Profession' => $profession,
                                    //             'Annual Payroll' => $annual_payroll,
                                    //             'Full Time' => $full_time,
                                    //             'Part Time' => $part_time,
                                    //         ];
                                    //     }
                                    // }

                                    // $templateData['parsedWCGrossReceipt'] = $parsedWCGrossReceipt;
                                    // $templateData['parsedWCSubconCostYear'] = $parsedWCSubconCostYear;
                                    // $templateData['dateOfBirthFormatted'] = $dateOfBirthFormatted;
                                    // $templateData['displayData'] = $displayData;
                                    $templateData['workersCompensation'] = $workersCompensation;
                                    $templateData['productType'] = 'wc';
                                    $templateData['clientInformation'] = $clientInformation;

                                    $html_body .= view('quote.quote-details', $templateData)->render();

                                    Log::info('Record inserted with id for WC: ' . $workersCompensation->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'auto':
                                try {
                                    $commercialAuto = new CommercialAutoInformation();
                                    $commercialAuto->client_info_id = $clientInformation->id;
                                    $commercialAuto->no_of_vehicle = $productData['auto_add_vehicle']['value'];
                                    $commercialAuto->no_of_drivers = $productData['auto_add_driver']['value'];

                                    $commercialAuto->save();

                                    foreach ($productDataStr as $key => $data) {
                                        if (strpos($key, 'auto_vehicle_year_') === 0) {
                                            $counter = $commercialAuto->no_of_vehicle;

                                            if (isset($productDataStr['auto_vehicle_year_'.$counter]['value']) && isset($productDataStr['auto_vehicle_maker_'.$counter]['value']) && isset($productDataStr['auto_vehicle_model_'.$counter]['value']) && isset($productDataStr['auto_vehicle_vin_'.$counter]['value']) && isset($productDataStr['auto_vehicle_mileage_'.$counter]['value']) && isset($productDataStr['auto_vehicle_garage_add_'.$counter]['value']) && isset($productDataStr['auto_vehicle_coverage_limits_'.$counter]['value'])) {
                                                $vehicleEntry = new CommercialAutoVehicles();

                                                DB::beginTransaction();
                                                try {
                                                    $vehicleEntry->comm_auto_id = $commercialAuto->id;
                                                    $vehicleEntry->year = $productData['auto_vehicle_year_' . $counter]['value'];
                                                    $vehicleEntry->maker = $productData['auto_vehicle_maker_' . $counter]['value'];
                                                    $vehicleEntry->model = $productData['auto_vehicle_model_' . $counter]['value'];
                                                    $vehicleEntry->vin = $productData['auto_vehicle_vin_' . $counter]['value'];
                                                    $vehicleEntry->mileage_radius = $productData['auto_vehicle_mileage_' . $counter]['value'];
                                                    $vehicleEntry->garage_address = $productData['auto_vehicle_garage_add_' . $counter]['value'];
                                                    $vehicleEntry->coverage_limits = floatval(preg_replace("/[^-0-9\.]/","",  $productData['auto_vehicle_coverage_limits_'.$counter]['value']));

                                                    $vehicleEntry->save();
                                                    Log::info('Successfully saved vehicleEntry record. Data: ' . json_encode($vehicleEntry));
                                                    DB::commit();
                                                } catch (\Exception $e) {
                                                    DB::rollBack();
                                                    Log::error('Failed to insert vehicleEntry record. Exception: ' . $e->getMessage());
                                                }
                                            }
                                        }
                                    }

                                    foreach ($productDataStr as $key => $data) {
                                        if (strpos($key, 'auto_vehicle_year_') === 0) {
                                            $counter = $commercialAuto->no_of_drivers;

                                            if (isset($productDataStr['auto_add_drivers_name_'.$counter]['value']) && isset($productDataStr['auto_add_driver_lic_'.$counter]['value']) && isset($productDataStr['auto_add_driver_mileage_radius_'.$counter]['value']) && isset($productDataStr['auto_add_driver_date_birth_'.$counter]['value']) && isset($productDataStr['auto_add_driver_civil_status_'.$counter]['value']) && isset($productDataStr['auto_add_driver_spouse_name_'.$counter]['value']) && isset($productDataStr['auto_add_driver_spouse_dob_'.$counter]['value'])) {
                                                $driverEntry = new CommercialAutoDrivers();

                                                DB::beginTransaction();
                                                try {
                                                    $driverEntry->comm_auto_id = $commercialAuto->id;
                                                    $driverEntry->drivers_name = $productData['auto_add_drivers_name_' . $counter]['value'];
                                                    $driverEntry->drivers_license_number = $productData['auto_add_driver_lic_' . $counter]['value'];
                                                    $driverEntry->mileage_radius = $productData['auto_add_driver_mileage_radius_' . $counter]['value'];
                                                    $DOBValue = $productData['auto_add_driver_date_birth_' . $counter]['value'] ?? null;
                                                    if ($DOBValue) {
                                                        try {
                                                            $driverEntry->date_of_birth = Carbon::createFromFormat('m/d/Y', $DOBValue)->toDateString();
                                                        } catch (\Exception $e) {
                                                            Log::warning('Invalid date format for date_of_birth. Given value: ' . $DOBValue . '. Defaulting to null.');
                                                            $driverEntry->date_of_birth = null;
                                                        }
                                                    } else {
                                                        $driverEntry->date_of_birth = null;
                                                    }
                                                    $driverEntry->civil_status = $productData['auto_add_driver_civil_status_' . $counter]['value'];
                                                    $driverEntry->spouse_name = isset($productData['auto_add_driver_spouse_name_' . $counter]['value']) ? $productData['auto_add_driver_spouse_name_' . $counter]['value'] : null;
                                                    $spouseDOBValue = $productData['auto_add_driver_spouse_dob_' . $counter]['value'] ?? null;
                                                    if ($spouseDOBValue) {
                                                        try {
                                                            $driverEntry->spouse_date_of_birth = Carbon::createFromFormat('m/d/Y', $spouseDOBValue);
                                                        } catch (\Exception $e) {
                                                            Log::warning('Invalid date format for spouse_dob. Given value: ' . $spouseDOBValue . '. Defaulting to null.');
                                                            $driverEntry->spouse_date_of_birth = null;
                                                        }
                                                    } else {
                                                        $driverEntry->spouse_date_of_birth = null;
                                                    }

                                                    $driverEntry->save();
                                                    Log::info('Successfully saved driverEntry record. Data: ' . json_encode($driverEntry));
                                                    DB::commit();
                                                } catch (\Exception $e) {
                                                    DB::rollBack();
                                                    Log::error('Failed to insert driverEntry record. Exception: ' . $e->getMessage());
                                                }
                                            }
                                        }
                                    }

                                    // $displayData1 = [];
                                    // for ($i = 1; $i <= 8; $i++) {
                                    //     $year = $commercialAuto->{'year_' . $i};
                                    //     $make = $commercialAuto->{'make_' . $i};
                                    //     $model = $commercialAuto->{'model_' . $i};
                                    //     $vin = $commercialAuto->{'vehicle_id_' . $i};
                                    //     $mileage = $commercialAuto->{'mileage_radius_' . $i};
                                    //     $garage_address = $commercialAuto->{'garage_address_' . $i};
                                    //     $coverage_limits_var = 'parsedCoverageLimits' . $i;
                                    //     $coverage_limits = isset($$coverage_limits_var) ? $$coverage_limits_var : null;

                                    //     if ($year || $make || $model || $vin || $mileage || $garage_address || $coverage_limits) {
                                    //         $displayData1[] = [
                                    //             'Vehicle Information Entry No.' => 'Vehicle Information Entry No ' . $i,
                                    //             'year' => $year,
                                    //             'make' => $make,
                                    //             'model' => $model,
                                    //             'vin' => $vin,
                                    //             'mileage_radius' => $mileage,
                                    //             'garage_address' => $garage_address,
                                    //             'coverage_limits' => $coverage_limits,
                                    //         ];
                                    //     }
                                    // }

                                    // $displayData2 = [];
                                    // for ($i = 1; $i <= 4; $i++) {
                                    //     $drivers_name = $commercialAuto->{'drivers_name_' . $i};
                                    //     $drivers_lic = $commercialAuto->{'drivers_lic_no_' . $i};
                                    //     $drivers_mileage_radius = $commercialAuto->{'drivers_mileage_radius_' . $i};
                                    //     $drivers_date_of_birth = $commercialAuto->{'drivers_dob_' . $i};
                                    //     $drivers_civil_status = $commercialAuto->{'drivers_civil_status_' . $i};
                                    //     $drivers_spouse_name = $commercialAuto->{'drivers_spouse_name_' . $i};
                                    //     $drivers_spouse_dob = $commercialAuto->{'drivers_spouse_dob_' . $i};

                                    //     if ($drivers_name || $drivers_lic || $drivers_mileage_radius || $drivers_date_of_birth || $drivers_civil_status || $drivers_spouse_name || $drivers_spouse_dob) {
                                    //         $displayData2[] = [
                                    //             'Driver Information Entry No.' => 'Driver Information Entry No ' . $i,
                                    //             'drivers_name' => $drivers_name,
                                    //             'drivers_lic_no' => $drivers_lic,
                                    //             'mileage_radius' => $drivers_mileage_radius,
                                    //             'drivers_dob' => $drivers_date_of_birth,
                                    //             'civil_status' => $drivers_civil_status,
                                    //             'spouse_name' => $drivers_spouse_name,
                                    //             'spouse_dob' => $drivers_spouse_dob,
                                    //         ];
                                    //     }
                                    // }

                                    // $templateData['displayData1'] = $displayData1;
                                    // $templateData['displayData2'] = $displayData2;
                                    $templateData['commercialAuto'] = $commercialAuto;
                                    $templateData['productType'] = 'auto';
                                    $templateData['clientInformation'] = $clientInformation;

                                    $html_body .= view('quote.quote-details', $templateData)->render();

                                    Log::info('Record inserted with id for AUTO: ' . $commercialAuto->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'bond':
                                try {
                                    $licenseBond = new LicenseBondInformation();
                                    $licenseBond->client_info_id = $clientInformation->id;
                                    $licenseBond->owners_name = $productData['bond_owners_name']['value'];
                                    $licenseBond->ssn = $productData['bond_owners_ssn']['value'];

                                    $bondOwnersDateOfBirth = Carbon::createFromFormat('m/d/Y', $productData['bond_owners_dob']['value']);
                                    $licenseBond->date_of_birth = $bondOwnersDateOfBirth->format('Y-m-d');
                                    $bondOwnersDateOfBirthFormatted = $bondOwnersDateOfBirth->format('F j, Y');

                                    $licenseBond->civil_status = $productData['bond_owners_civil_status']['value'];
                                    $licenseBond->spouse_name = $productData['bond_owners_spouse_name']['value'];

                                    $bondOwnersSpouseDateOfBirth = Carbon::createFromFormat('m/d/Y', $productData['bond_owners_spouse_dob']['value']);
                                    $licenseBond->spouse_date_of_birth = $bondOwnersSpouseDateOfBirth->format('Y-m-d');
                                    $bondOwnersSpouseDateOfBirthFormatted = $bondOwnersSpouseDateOfBirth->format('F j, Y');

                                    $licenseBond->spouse_ssn = $productData['bond_owners_spouse_ssn']['value'];
                                    $licenseBond->type_of_bond_requested = $productData['bond_type_bond_requested']['value'];
                                    $licenseBond->amount_of_bond = floatval(preg_replace("/[^-0-9\.]/","", $productData['bond_amount_of_bond']['value']));
                                    $parsedAmountOfBond = floatval($licenseBond->amount_of_bond);

                                    $licenseBond->term_of_bond = $productData['bond_term_of_bond']['value'];
                                    $licenseBond->type_of_license = $productData['bond_type_of_license']['value'];
                                    $licenseBond->if_other_type_of_license = $productData['bond_if_other_type_of_license'];
                                    $licenseBond->license_number_or_application_number = $productData['bond_license_or_application_no']['value'];

                                    $bondEffectiveDate = Carbon::createFromFormat('m/d/Y', $productData['bond_effective_date']['value']);
                                    $licenseBond->effective_date = $bondEffectiveDate->format('Y-m-d');
                                    $bondEffectiveDateFormatted = $bondEffectiveDate->format('F j, Y');

                                    $licenseBond->save();

                                    $templateData['parsedAmountOfBond'] = $parsedAmountOfBond;
                                    $templateData['bondOwnersDateOfBirthFormatted'] = $bondOwnersDateOfBirthFormatted;
                                    $templateData['bondOwnersSpouseDateOfBirthFormatted'] = $bondOwnersSpouseDateOfBirthFormatted;
                                    $templateData['bondEffectiveDateFormatted'] = $bondEffectiveDateFormatted;
                                    $templateData['licenseBond'] = $licenseBond;
                                    $templateData['productType'] = 'bond';
                                    $templateData['clientInformation'] = $clientInformation;

                                    $html_body .= view('quote.quote-details', $templateData)->render();

                                    Log::info('Record inserted with id for BOND: ' . $licenseBond->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'excess':
                                try {
                                    $excessLiability = new ExcessLiabilityInformation();
                                    $excessLiability->client_info_id = $clientInformation->id;
                                    $excessLiability->excess_limits = floatval(preg_replace("/[^-0-9\.]/","", $productData['excess_limits']['value']));

                                    $excessGLEffectiveDate = Carbon::createFromFormat('m/d/Y', $productData['excess_gl_eff_date']['value']);
                                    $excessLiability->gl_effective_date = $excessGLEffectiveDate->format('Y-m-d');
                                    $excessGLEffectiveDateFormatted = $excessGLEffectiveDate->format('F j, Y');

                                    $excessLiability->no_of_losses = isset($productData['excess_no_losses_5years']['value']) ? $productData['excess_no_losses_5years']['value'] : null;
                                    $excessLiability->explain_losses = isset($productData['excess_explain_losses']['value']) ? $productData['excess_explain_losses']['value'] : null;
                                    $excessLiability->insurance_carrier = $productData['excess_insurance_carrier']['value'];
                                    $excessLiability->policy_number_or_quote_number = $productData['excess_policy_or_quote_no']['value'];
                                    $excessLiability->policy_premium = floatval(preg_replace("/[^-0-9\.]/","", $productData['excess_policy_premium']['value']));
                                    $parsedPolicyPremium = floatval($excessLiability->policy_premium);

                                    $excessEffectiveDate = Carbon::createFromFormat('m/d/Y', $productData['excess_effective_date']['value']);
                                    $excessLiability->effective_date = $excessEffectiveDate->format('Y-m-d');
                                    $excessEffectiveDateFormatted = $excessEffectiveDate->format('F j, Y');

                                    $excessExpirationDate = Carbon::createFromFormat('m/d/Y', $productData['excess_expiration_date']['value']);
                                    $excessLiability->expiration_date = $excessExpirationDate->format('Y-m-d');
                                    $excessExpirationDateFormatted = $excessExpirationDate->format('F j, Y');

                                    $excessLiability->save();

                                    $templateData['parsedPolicyPremium'] = $parsedPolicyPremium;
                                    $templateData['excessGLEffectiveDateFormatted'] = $excessGLEffectiveDateFormatted;
                                    $templateData['excessEffectiveDateFormatted'] = $excessEffectiveDateFormatted;
                                    $templateData['excessExpirationDateFormatted'] = $excessExpirationDateFormatted;
                                    $templateData['excessLiability'] = $excessLiability;
                                    $templateData['productType'] = 'excess';
                                    $templateData['clientInformation'] = $clientInformation;

                                    $html_body .= view('quote.quote-details', $templateData)->render();

                                    Log::info('Record inserted with id for EXCESS: ' . $excessLiability->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'tools':
                                try {
                                    $toolsEquipmentsLiability = new ToolsEquipmentInformation();
                                    $toolsEquipmentsLiability->client_info_id = $clientInformation->id;
                                    $toolsEquipmentsLiability->misc_tools = floatval(preg_replace("/[^-0-9\.]/","", $productData['tools_misc_tools']['value']));
                                    $toolsEquipmentsLiability->rented_or_leased_equipment = floatval(preg_replace("/[^-0-9\.]/","", $productData['tools_rented_or_leased_amt']['value']));
                                    $toolsEquipmentsLiability->scheduled_equipment = floatval(preg_replace("/[^-0-9\.]/","", $productData['tools_sched_equipment']['value']));
                                    $toolsEquipmentsLiability->equipment_type = $productData['tools_equipment_type']['value'];
                                    $toolsEquipmentsLiability->year = $productData['tools_equipment_year']['value'];
                                    $toolsEquipmentsLiability->maker = $productData['tools_equipment_make']['value'];
                                    $toolsEquipmentsLiability->model = $productData['tools_equipment_model']['value'];
                                    $toolsEquipmentsLiability->vin = $productData['tools_equipment_vin_or_serial_no']['value'];
                                    $toolsEquipmentsLiability->valuation = $productData['tools_equipment_valuation']['value'];
                                    $toolsEquipmentsLiability->no_of_losses = isset($productData['tools_no_losses_5years']['value']) ? $productData['tools_no_losses_5years']['value'] : null;
                                    $toolsEquipmentsLiability->explain_losses = isset($productData['tools_explain_losses']['value']) ? $productData['tools_explain_losses']['value'] : null;

                                    $toolsEquipmentsLiability->save();

                                    $parsedMiscToolsAmount = floatval($toolsEquipmentsLiability->misc_tools_amount);
                                    $parsedRentedLeasedEquipmentAmount = floatval($toolsEquipmentsLiability->rented_leased_equipment_amount);

                                    $templateData['parsedMiscToolsAmount'] = $parsedMiscToolsAmount;
                                    $templateData['parsedRentedLeasedEquipmentAmount'] = $parsedRentedLeasedEquipmentAmount;
                                    $templateData['toolsEquipmentsLiability'] = $toolsEquipmentsLiability;
                                    $templateData['productType'] = 'tools';
                                    $templateData['clientInformation'] = $clientInformation;

                                    $html_body .= view('quote.quote-details', $templateData)->render();

                                    Log::info('Record inserted with id for TOOLS: ' . $toolsEquipmentsLiability->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'br':
                                try {
                                    $buildersRiskLiability = new BuildersRiskInformation();
                                    $buildersRiskLiability->client_info_id = $clientInformation->id;
                                    $buildersRiskLiability->property_address = $productData['br_property_address']['value'];
                                    $buildersRiskLiability->value_of_existing_structure = floatval(preg_replace("/[^-0-9\.]/","", $productData['br_value_of_existing_structure']['value']));
                                    $buildersRiskLiability->value_of_work_being_performed = floatval(preg_replace("/[^-0-9\.]/","", $productData['br_value_of_work_performed']['value']));
                                    $buildersRiskLiability->period_of_insurance_or_duration_of_project = $productData['br_period_duration_project']['value'];
                                    $buildersRiskLiability->construction_type = $productData['br_construction_type']['value'];
                                    $buildersRiskLiability->complete_descops = $productData['br_complete_descops_of_project']['value'];
                                    $buildersRiskLiability->square_footage = $productData['br_sq_footage']['value'];
                                    $buildersRiskLiability->number_of_floors = $productData['br_number_of_floors']['value'];
                                    $buildersRiskLiability->number_of_units_dwelling = $productData['br_number_of_units_dwelling']['value'];
                                    $buildersRiskLiability->what_is_anticipated_occupancy = $productData['br_anticipated_occupancy']['value'];
                                    $buildersRiskLiability->last_update_to_roofing_year = $productData['br_last_update_to_roofing_year']['value'];
                                    $buildersRiskLiability->last_update_to_heating_year = $productData['br_last_update_to_heating_year']['value'];
                                    $buildersRiskLiability->last_update_to_electrical_year = $productData['br_last_update_to_electrical_year']['value'];
                                    $buildersRiskLiability->last_update_to_plumbing_year = $productData['br_last_update_to_plumbing_year']['value'];
                                    $buildersRiskLiability->distance_to_nearest_fire_hydrant = $productData['br_distance_to_nearest_fire_hydrant']['value'];
                                    $buildersRiskLiability->distance_to_nearest_fire_station = $productData['br_distance_to_nearest_fire_station']['value'];
                                    $buildersRiskLiability->will_structure_be_occupied_during_renovation = $productData['br_structure_occupied_remodel_renovation']['value'];
                                    $buildersRiskLiability->when_was_structure_built = Carbon::createFromFormat('m/d/Y', $productData['br_when_structure_built']['value']);
                                    $buildersRiskLiability->jobsite_security = $productData['br_jobsite_security']['value'];
                                    $buildersRiskLiability->does_scheduled_property_address_builders_risk_coverage = $productData['br_scheduled_property_address_builders_risk_coverage']['value'];
                                    $buildersRiskLiability->carrier_name = isset($productData['br_sched_property_carrier_name']['value']) ? $productData['br_sched_property_carrier_name']['value'] : null;

                                    $effectiveDateValue = $productData['br_sched_property_effective_date']['value'] ?? null;
                                    if ($effectiveDateValue) {
                                        if (preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $effectiveDateValue)) {
                                            // The date is in 'Y-m-d H:i:s' format, use directly
                                            $buildersRiskLiability->effective_date = $effectiveDateValue;
                                        } else {
                                            // Try converting from 'm/d/Y'
                                            try {
                                                $buildersRiskLiability->effective_date = Carbon::createFromFormat('m/d/Y', $effectiveDateValue)->toDateString();
                                            } catch (\Exception $e) {
                                                Log::warning('Invalid date format for effective date. Given value: ' . $effectiveDateValue . '. Defaulting to null.');
                                                $buildersRiskLiability->effective_date = null;
                                            }
                                        }
                                    } else {
                                        $buildersRiskLiability->effective_date = null;
                                    }

                                    $expirationDateValue = $productData['br_sched_property_expiration_date']['value'] ?? null;
                                    if ($expirationDateValue) {
                                        if (preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $expirationDateValue)) {
                                            // The date is in 'Y-m-d H:i:s' format, use directly
                                            $buildersRiskLiability->expiration_date = $expirationDateValue;
                                        } else {
                                            // Try converting from 'm/d/Y'
                                            try {
                                                $buildersRiskLiability->expiration_date = Carbon::createFromFormat('m/d/Y', $expirationDateValue)->toDateString();
                                            } catch (\Exception $e) {
                                                Log::warning('Invalid date format for expiration date. Given value: ' . $expirationDateValue . '. Defaulting to null.');
                                                $buildersRiskLiability->expiration_date = null;
                                            }
                                        }
                                    } else {
                                        $buildersRiskLiability->expiration_date = null;
                                    }

                                    $buildersRiskLiability->residential_or_commercial = $productData['br_residential_commercial']['value'];
                                    $buildersRiskLiability->has_project_started = $productData['br_has_project_started']['value'];

                                    $whenHasProjectStarted = $productData['br_when_project_started']['value'] ?? null;
                                    if ($whenHasProjectStarted) {
                                        if (preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $whenHasProjectStarted)) {
                                            // The date is in 'Y-m-d H:i:s' format, use directly
                                            $buildersRiskLiability->when_has_project_started = $whenHasProjectStarted;
                                        } else {
                                            try {
                                                $buildersRiskLiability->when_has_project_started = Carbon::createFromFormat('m/d/Y', $whenHasProjectStarted)->toDateString();
                                            } catch (\Exception $e) {
                                                Log::warning('Invalid date format for when has project started date. Given value: ' . $whenHasProjectStarted . '. Defaulting to null.');
                                                $buildersRiskLiability->when_has_project_started = null;
                                            }
                                        }
                                    } else {
                                        $buildersRiskLiability->when_has_project_started = null;
                                    }

                                    $buildersRiskLiability->what_are_work_done = isset($productData['br_what_are_work_done']['value']) ? $productData['br_what_are_work_done']['value'] : null;
                                    $buildersRiskLiability->cost_of_work_done = isset($productData['br_cost_of_work_done']['value']) ? floatval(preg_replace("/[^-0-9\.]/","", $productData['br_cost_of_work_done']['value'])) : null;
                                    $buildersRiskLiability->what_are_the_remaining_works = isset($productData['br_what_are_remaining_works']['value']) ? $productData['br_what_are_remaining_works']['value'] : null;
                                    $buildersRiskLiability->cost_of_remaining_works = floatval(preg_replace("/[^-0-9\.]/","", $productData['br_cost_remaining_works']['value']));

                                    $whenProjectStart = $productData['br_when_will_project_start']['value'] ?? null;
                                    if ($whenProjectStart) {
                                        if (preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $whenProjectStart)) {
                                            // The date is in 'Y-m-d H:i:s' format, use directly
                                            $buildersRiskLiability->when_will_project_start = $whenProjectStart;
                                        } else {
                                            try {
                                                $buildersRiskLiability->when_will_project_start = Carbon::createFromFormat('m/d/Y', $whenProjectStart)->toDateString();
                                            } catch (\Exception $e) {
                                                Log::warning('Invalid date format for when will project started date. Given value: ' . $whenProjectStart . '. Defaulting to null.');
                                                $buildersRiskLiability->when_will_project_start = null;
                                            }
                                        }
                                    } else {
                                        $buildersRiskLiability->when_will_project_start = null;
                                    }


                                    $buildersRiskLiability->save();

                                    // $parsedValueOfExistingStructure = floatval($buildersRiskLiability->value_of_existing_structure);
                                    // $buildersRiskLiability->value_of_work_performed = floatval(preg_replace("/[^-0-9\.]/","", $productData['br_value_of_work_performed']));
                                    // $parsedValueOfWorkBeingPerformed = floatval($buildersRiskLiability->value_of_work_performed);

                                    // $templateData['parsedValueOfExistingStructure'] = $parsedValueOfExistingStructure;
                                    // $templateData['parsedValueOfWorkBeingPerformed'] = $parsedValueOfWorkBeingPerformed;
                                    $templateData['buildersRiskLiability'] = $buildersRiskLiability;
                                    $templateData['productType'] = 'br';
                                    $templateData['clientInformation'] = $clientInformation;

                                    $html_body .= view('quote.quote-details', $templateData)->render();

                                    Log::info('Record inserted with id for BR: ' . $buildersRiskLiability->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'bop':
                                try {
                                    $businessOwnersPolicy = new BOPInformation();
                                    $businessOwnersPolicy->client_info_id = $clientInformation->id;
                                    $businessOwnersPolicy->property_address = $productData['bop_property_address']['value'];
                                    $businessOwnersPolicy->loss_payee_information = $productData['bop_loss_payee_info']['value'];
                                    $businessOwnersPolicy->building_industry = $productData['bop_building_industry']['value'];
                                    $businessOwnersPolicy->who_owns_building = $productData['bop_occupancy']['value'];
                                    $businessOwnersPolicy->value_of_cost_building = isset($productData['bop_val_cost_bldg']['value']) ? floatval(preg_replace("/[^-0-9\.]/","", $productData['bop_val_cost_bldg']['value'])) : null;
                                    $businessOwnersPolicy->business_property_limit = isset($productData['bop_business_property_limit']['value']) ? floatval(preg_replace("/[^-0-9\.]/","", $productData['bop_business_property_limit']['value'])) : null;
                                    $businessOwnersPolicy->building_construction_type = $productData['bop_bldg_construction_type']['value'];
                                    $businessOwnersPolicy->year_built = $productData['bop_year_built']['value'];
                                    $businessOwnersPolicy->no_of_stories = $productData['bop_no_of_stories']['value'];
                                    $businessOwnersPolicy->total_building_sq_ft = $productData['bop_total_bldg_sqft']['value'];
                                    $businessOwnersPolicy->automatic_sprinkler_system = $productData['bop_automatic_sprinkler_system']['value'];
                                    $businessOwnersPolicy->automatic_file_alarm = $productData['bop_automatic_fire_alarm']['value'];
                                    $businessOwnersPolicy->distance_nearest_fire_hydrant = $productData['bop_distance_nearest_fire_hydrant']['value'];
                                    $businessOwnersPolicy->distance_nearest_fire_station = $productData['bop_distance_nearest_fire_station']['value'];
                                    $businessOwnersPolicy->automatic_commercial_cooking_extinguish_system = $productData['bop_automatic_comm_cooking_ext']['value'];
                                    $businessOwnersPolicy->automatic_burglar_alarm = $productData['bop_automatic_burglar_alarm']['value'];
                                    $businessOwnersPolicy->security_cameras = $productData['bop_security_cameras']['value'];
                                    $businessOwnersPolicy->last_update_to_roofing_year = $productData['bop_last_update_roofing_year']['value'];
                                    $businessOwnersPolicy->last_update_to_heating_year = $productData['bop_last_update_heating_year']['value'];
                                    $businessOwnersPolicy->last_update_to_electrical_year = $productData['bop_last_update_electrical_year']['value'];
                                    $businessOwnersPolicy->last_update_to_plumbing_year = $productData['bop_last_update_plumbing_year']['value'];

                                    $businessOwnersPolicy->save();

                                    $templateData['businessOwnersPolicy'] = $businessOwnersPolicy;
                                    $templateData['productType'] = 'bop';
                                    $templateData['clientInformation'] = $clientInformation;

                                    $html_body .= view('quote.quote-details', $templateData)->render();

                                    Log::info('Record inserted with id for BOP: ' . $businessOwnersPolicy->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'comm_prop':
                                try {
                                    $commercialProperty = new CommercialPropertyInformation();
                                    $commercialProperty->client_info_id = $clientInformation->id;
                                    $commercialProperty->business_location_type = $productData['property_business_located']['value'];
                                    $commercialProperty->property_address = $productData['property_property_address']['value'];
                                    $commercialProperty->name_of_building_owner = $productData['property_name_of_owner']['value'];
                                    $commercialProperty->value_cost_of_building = isset($productData['property_value_cost_bldg']['value']) ? floatval(preg_replace("/[^-0-9\.]/","", $productData['property_value_cost_bldg']['value'])) : null;
                                    $commercialProperty->business_property_limit = isset($productData['property_business_property_limit']['value']) ? floatval(preg_replace("/[^-0-9\.]/","", $productData['property_business_property_limit']['value'])) : null;
                                    $commercialProperty->does_have_more_than_one_location = $productData['property_does_have_more_than_one_location']['value'];
                                    $commercialProperty->are_there_multiple_units_in_building = $productData['property_multiple_units']['value'];
                                    $commercialProperty->construction_type = $productData['property_construction_type']['value'];
                                    $commercialProperty->year_built = $productData['property_year_built']['value'];
                                    $commercialProperty->no_of_stories = $productData['property_no_of_stories']['value'];
                                    $commercialProperty->total_building_sq_ft = $productData['property_total_bldg_sqft']['value'];
                                    $commercialProperty->does_building_equipped_with_fire_sprinkler = $productData['property_is_bldg_equipped_with_fire_sprinklers']['value'];
                                    $commercialProperty->distance_to_nearest_fire_hydrant = $productData['property_distance_nearest_fire_hydrant']['value'];
                                    $commercialProperty->distance_to_nearest_fire_station = $productData['property_distance_nearest_fire_station']['value'];
                                    $commercialProperty->protection_class = $productData['property_protection_class']['value'];
                                    $commercialProperty->protective_devices = $productData['property_protective_device']['value'];
                                    $commercialProperty->last_update_to_roofing_year = $productData['property_last_update_roofing_year']['value'];
                                    $commercialProperty->last_update_to_heating_year = $productData['property_last_update_heating_year']['value'];
                                    $commercialProperty->last_update_to_electrical_year = $productData['property_last_update_plumbing_year']['value'];
                                    $commercialProperty->last_update_to_plumbing_year = $productData['property_last_update_electrical_year']['value'];

                                    $commercialProperty->save();

                                    $templateData['commercialProperty'] = $commercialProperty;
                                    $templateData['productType'] = 'comm_prop';
                                    $templateData['clientInformation'] = $clientInformation;

                                    $html_body .= view('quote.quote-details', $templateData)->render();

                                    Log::info('Record inserted with id for COMM PROP: ' . $commercialProperty->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'eo':
                                try {
                                    $errorsEmission = new ErrorsAndEmissionInformation();
                                    $errorsEmission->client_info_id = $clientInformation->id;
                                    $errorsEmission->requested_limits = $productData['eo_requested_limits']['value'];
                                    $errorsEmission->requested_limits_if_others = isset($productData['eo_reqlimit_if_others']['value']) ? $productData['eo_reqlimit_if_others']['value'] : null;
                                    $errorsEmission->requested_deductible = $productData['eo_request_deductible']['value'];
                                    $errorsEmission->requested_deductible_if_others	= isset($productData['eo_reqdeductible_if_others']['value']) ? $productData['eo_reqdeductible_if_others']['value'] : null;
                                    $errorsEmission->business_entity_q1 = $productData['eo_business_entity_q1']['value'];
                                    $errorsEmission->business_entity_sub_q1 = isset($productData['eo_business_entity_sub_q1']['value']) ? $productData['eo_business_entity_sub_q1']['value'] : null;
                                    $errorsEmission->business_entity_q2 = $productData['eo_business_entity_q2']['value'];
                                    $errorsEmission->business_entity_sub_q2 = isset($productData['eo_business_entity_sub_q2']['value']) ? $productData['eo_business_entity_sub_q2']['value'] : null;
                                    $errorsEmission->business_entity_q3 = $productData['eo_business_entity_q3']['value'];
                                    $errorsEmission->business_entity_sub_q3 = isset($productData['eo_business_entity_sub_q3']['value']) ? $productData['eo_business_entity_sub_q3']['value'] : null;
                                    $errorsEmission->business_entity_q4 = $productData['eo_business_entity_q4']['value'];
                                    $errorsEmission->business_entity_sub_q4 = isset($productData['eo_business_entity_sub_q4']['value']) ? $productData['eo_business_entity_sub_q4']['value'] : null;
                                    $errorsEmission->business_entity_q5 = $productData['eo_business_entity_q5']['value'];
                                    $errorsEmission->business_entity_sub_q5 = isset($productData['eo_business_entity_sub_q5']['value']) ? $productData['eo_business_entity_sub_q5']['value'] : null;
                                    $errorsEmission->number_of_employees = $productData['eo_number_employee']['value'];
                                    $errorsEmission->full_time_employees = $productData['eo_full_time']['value'];
                                    $errorsEmission->full_time_salary_range = floatval(preg_replace("/[^-0-9\.]/","", $productData['eo_ftime_salary_range']['value']));
                                    $errorsEmission->part_time_employees = $productData['eo_part_time']['value'];
                                    $errorsEmission->part_time_salary_range = floatval(preg_replace("/[^-0-9\.]/","", $productData['eo_ptime_salary_range']['value']));
                                    $errorsEmission->employee_practice_q1 = $productData['eo_emp_practice_q1']['value'];
                                    $errorsEmission->hr_q1 = $productData['eo_hr_q1']['value'];
                                    $errorsEmission->hr_sub_q1 = isset($productData['eo_hr_sub_q1']['value']) ? $productData['eo_hr_sub_q1']['value'] : null;
                                    $errorsEmission->hr_q2 = $productData['eo_hr_q2']['value'];
                                    $errorsEmission->hr_sub_q2 = isset($productData['eo_hr_sub_q2']['value']) ? $productData['eo_hr_sub_q2']['value'] : null;
                                    $errorsEmission->hr_q3 = $productData['eo_hr_q3']['value'];
                                    $errorsEmission->hr_sub_q3 = isset($productData['eo_hr_sub_q3']['value']) ? $productData['eo_hr_sub_q3']['value'] : null;
                                    $errorsEmission->hr_q4 = $productData['eo_hr_q4']['value'];
                                    $errorsEmission->hr_sub_q4 = isset($productData['eo_hr_sub_q4']['value']) ? $productData['eo_hr_sub_q4']['value'] : null;

                                    $errorsEmission->save();

                                    $templateData['errorsEmission'] = $errorsEmission;
                                    $templateData['productType'] = 'comm_prop';
                                    $templateData['clientInformation'] = $clientInformation;
                                    $html_body .= view('quote.quote-details', $templateData)->render();
                                    Log::info('Record inserted with id for EO: ' . $errorsEmission->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'pollution':
                                try {
                                    $pollutionLiability = new PollutionLiabilityInformation();
                                    $pollutionLiability->client_info_id = $clientInformation->id;
                                    $pollutionLiability->pollution_profession = $productData['pollution_profession'];
                                    $pollutionLiability->pollution_residential = $productData['pollution_residential'];
                                    $pollutionLiability->pollution_commercial = $productData['pollution_commercial'];
                                    $pollutionLiability->pollution_new_construction = $productData['pollution_new_construction'];
                                    $pollutionLiability->pollution_repair_remodel = $productData['pollution_repair_remodel'];
                                    $pollutionLiability->pollution_detailed_descops = $productData['pollution_descops'];

                                    $pollutionLiability->pollution_cost_of_largest_proj_past_5_years = floatval(preg_replace("/[^-0-9\.]/","", $productData['pollution_cost_proj_5years']));
                                    $parsedPollutionCostOfLargestProj = floatval($pollutionLiability->pollution_cost_of_largest_proj_past_5_years);

                                    $pollutionLiability->pollution_annual_gross_receipts = floatval(preg_replace("/[^-0-9\.]/","", $productData['pollution_annual_gross']));
                                    $parsedPollutionAnnualGrossReceipts = floatval($pollutionLiability->pollution_annual_gross_receipts);
                                    $pollutionLiability->pollution_no_field_employees = $productData['pollution_no_field_emp'];
                                    $pollutionLiability->pollution_payroll_amount = floatval(preg_replace("/[^-0-9\.]/","", $productData['pollution_payroll_amt']));
                                    $parsedPollutionPayrollAmount = floatval($pollutionLiability->pollution_payroll_amount);
                                    $pollutionLiability->pollution_does_use_subcontractor = $productData['pollution_using_subcon'];
                                    $pollutionLiability->pollution_subcontractor_cost = floatval(preg_replace("/[^-0-9\.]/","", $productData['pollution_subcon_cost']));
                                    $parsedPollutionSubcontractorCost = floatval($pollutionLiability->pollution_subcontractor_cost);
                                    $pollutionLiability->pollution_no_of_losses_past_5_years = $productData['pollution_no_losses_5years'];
                                    $pollutionLiability->pollution_explain_losses = $productData['pollution_explain_losses'];

                                    $pollutionLiability->save();

                                    $templateData['parsedPollutionCostOfLargestProj'] = $parsedPollutionCostOfLargestProj;
                                    $templateData['parsedPollutionAnnualGrossReceipts'] = $parsedPollutionAnnualGrossReceipts;
                                    $templateData['parsedPollutionPayrollAmount'] = $parsedPollutionPayrollAmount;
                                    $templateData['parsedPollutionSubcontractorCost'] = $parsedPollutionSubcontractorCost;
                                    $templateData['pollutionLiability'] = $pollutionLiability;
                                    $templateData['productType'] = 'pollution';
                                    $templateData['clientInformation'] = $clientInformation;

                                    $html_body .= view('quote.quote-details', $templateData)->render();

                                    Log::info('Record inserted with id for POLLUTION: ' . $pollutionLiability->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'epli':
                                try {
                                    $epli = new EPLIInformation();
                                    $epli->client_info_id = $clientInformation->id;
                                    $epli->fein = $productData['epli_fein']['value'];
                                    $epli->current_epli = $productData['epli_current_epli']['value'];
                                    $epli->prior_carrier = $productData['epli_prior_carrier']['value'];
                                    $epli->prior_carrier_epli = $productData['epli_prior_carrier_epli']['value'];
                                    $epli_effective_date = Carbon::createFromFormat('m/d/Y', $productData['epli_effective_date']['value'])->toDateString();
                                    $epli->effective_date = $epli_effective_date;
                                    $epli->previous_premium_amount = floatval(preg_replace("/[^-0-9\.]/","", $productData['epli_prev_premium_amount']['value']));
                                    $epli->deductible_amount = floatval(preg_replace("/[^-0-9\.]/","", $productData['epli_deductible_amount']['value']));
                                    $epli->full_time_employee = $productData['epli_full_time']['value'];
                                    $epli->part_time_employee = $productData['epli_part_time']['value'];
                                    $epli->independent_contractors = $productData['epli_independent_contractors']['value'];
                                    $epli->volunteers = $productData['epli_volunteers']['value'];
                                    $epli->leased_or_seasonal = $productData['epli_leased_seasonal']['value'];
                                    $epli->non_us_based_employee = $productData['epli_non_us_base_emp']['value'];
                                    $epli->total_employees = $productData['epli_total_employees']['value'];
                                    $epli->located_at_ca = $productData['epli_located_at_ca']['value'];
                                    $epli->located_at_ga = $productData['epli_located_at_ga']['value'];
                                    $epli->located_at_tx = $productData['epli_located_at_tx']['value'];
                                    $epli->located_at_fl = $productData['epli_located_at_fl']['value'];
                                    $epli->located_at_ny = $productData['epli_located_at_ny']['value'];
                                    $epli->located_at_nj = $productData['epli_located_at_nj']['value'];
                                    $epli->up_to_60k = floatval(preg_replace("/[^-0-9\.]/","", $productData['epli_salary_range_q1']['value']));
                                    $epli->between_60k_to_120k = floatval(preg_replace("/[^-0-9\.]/","", $productData['epli_salary_range_q2']['value']));
                                    $epli->over_120k = floatval(preg_replace("/[^-0-9\.]/","", $productData['epli_salary_range_q3']['value']));
                                    $epli->voluntary = $productData['epli_emp_terminated_last_12_months_q1']['value'];
                                    $epli->involuntary = $productData['epli_emp_terminated_last_12_months_q2']['value'];
                                    $epli->laid_off = $productData['epli_emp_terminated_last_12_months_q3']['value'];
                                    $epli->hr_policies_and_procedure_q1 = $productData['epli_hr_q1']['value'];
                                    $epli->hr_policies_and_procedure_q2 = $productData['epli_hr_q2']['value'];
                                    $epli->hr_policies_and_procedure_q3 = $productData['epli_hr_q3']['value'];
                                    $epli->hr_policies_and_procedure_q4 = $productData['epli_hr_q4']['value'];
                                    $epli->hr_policies_and_procedure_q5 = $productData['epli_hr_q5']['value'];
                                    $epli->hr_policies_and_procedure_q6 = $productData['epli_hr_q6']['value'];

                                    $epli->save();

                                    $templateData['epli'] = $epli;
                                    $templateData['productType'] = 'epli';
                                    $templateData['clientInformation'] = $clientInformation;
                                    $html_body .= view('quote.quote-details', $templateData)->render();
                                    Log::info('Record inserted with id for EPLI: ' . $epli->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'cyber':
                                try {
                                    $cyberLiability = new CyberLiabilityInformation();
                                    $cyberLiability->client_info_id = $clientInformation->id;
                                    $cyberLiability->it_contact_name = $productData['cyber_it_contact_name']['value'];
                                    $cyberLiability->it_contact_number = $productData['cyber_it_contact_number']['value'];
                                    $cyberLiability->it_contact_email = $productData['cyber_it_contact_email']['value'];
                                    $cyberLiability->cyber_q1 = $productData['cyber_q1']['value'];
                                    $cyberLiability->cyber_q2 = $productData['cyber_q2']['value'];
                                    $cyberLiability->cyber_q3 = $productData['cyber_q3']['value'];
                                    $cyberLiability->cyber_q4 = $productData['cyber_q4']['value'];
                                    $cyberLiability->cyber_q5 = $productData['cyber_q5']['value'];
                                    $cyberLiability->cyber_q6 = $productData['cyber_q6']['value'];
                                    $cyberLiability->cyber_q7 = $productData['cyber_q7']['value'];
                                    $cyberLiability->cyber_q8 = $productData['cyber_q8']['value'];

                                    $cyberLiability->save();
                                    $templateData['cyberLiability'] = $cyberLiability;
                                    $templateData['productType'] = 'cyber';
                                    $templateData['clientInformation'] = $clientInformation;
                                    $html_body .= view('quote.quote-details', $templateData)->render();
                                    Log::info('Record inserted with id for CYBER: ' . $cyberLiability->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'instfloat':
                                try {
                                    $instFloater = new InstallationFloaterInformation();
                                    $instFloater->client_info_id = $clientInformation->id;
                                    $instFloater->territory_of_operation = $productData['instfloat_territory_of_operation']['value'];
                                    $instFloater->type_of_operation = $productData['instfloat_territory_of_operation']['value'];
                                    $instFloater->type_of_equipment = $productData['instfloat_type_of_operation']['value'];
                                    $instFloater->deductible_amount = $productData['instfloat_scheduled_type_of_equipment']['value'];
                                    $instFloater->location = $productData['instfloat_deductible_amount']['value'];
                                    $instFloater->months_in_storage = $productData['instfloat_location']['value'];
                                    $instFloater->max_value_of_equipment_storing = floatval(preg_replace("/[^-0-9\.]/","", $productData['instfloat_months_in_storage']['value']));
                                    $instFloater->max_value_of_building_storage = floatval(preg_replace("/[^-0-9\.]/","", $productData['instfloat_max_value_of_equipment']['value']));
                                    $instFloater->type_of_security_placed_in_building = $productData['instfloat_type_security_placed']['value'];
                                    $instFloater->unsched_type_of_equipment = $productData['instfloat_unscheduled_type_of_equipment']['value'];
                                    $instFloater->unsched_max_value_of_equipment_storing = floatval(preg_replace("/[^-0-9\.]/","", $productData['instfloat_unscheduled_max_value_equipment_storing']['value']));
                                    $instFloater->additional_info_q1 = $productData['instfloat_additional_info_q1']['value'];
                                    $instFloater->additional_info_q2 = $productData['instfloat_additional_info_q2']['value'];
                                    $instFloater->additional_info_q3 = $productData['instfloat_additional_info_q3']['value'];
                                    $instFloater->additional_info_q4 = $productData['instfloat_additional_info_q4']['value'];

                                    $instFloater->save();

                                    // Handle the dynamic underscored keys
                                    foreach ($productDataStr as $key => $data) {
                                        $counter = str_replace('instfloat_scheduled_equipment_type_', '', $key);

                                        if (isset($productDataStr['instfloat_scheduled_equipment_type_' . $counter]['value']) && !empty($productDataStr['instfloat_scheduled_equipment_mfg_' . $counter]['value']) && !empty($productDataStr['instfloat_scheduled_equipment_id_or_serial_' . $counter]['value']) && !empty($productDataStr['instfloat_scheduled_equipment_model_' . $counter]['value']) && !empty($productDataStr['instfloat_scheduled_equipment_new_or_used_' . $counter]['value']) && !empty($productDataStr['instfloat_scheduled_equipment_model_year_' . $counter]['value']) && !empty($productDataStr['instfloat_scheduled_equipment_date_purchased_' . $counter]['value'])) {

                                            $instFloaterSchedEquipment = new InstallationFloaterScheduledEquipment();

                                            DB::beginTransaction();
                                            try {
                                                $instFloaterSchedEquipment->instfloat_id = $instFloater->id;
                                                $instFloaterSchedEquipment->sched_equip_type = $productData['instfloat_scheduled_equipment_type_' . $counter]['value'];
                                                $instFloaterSchedEquipment->sched_equip_manufacturer = $productData['instfloat_scheduled_equipment_mfg_' . $counter]['value'];
                                                $instFloaterSchedEquipment->sched_equip_serial_no = $productData['instfloat_scheduled_equipment_id_or_serial_' . $counter]['value'];
                                                $instFloaterSchedEquipment->sched_equip_model = $productData['instfloat_scheduled_equipment_model_' . $counter]['value'];
                                                $instFloaterSchedEquipment->sched_equip_new_or_used = $productData['instfloat_scheduled_equipment_new_or_used_' . $counter]['value'];
                                                $instFloaterSchedEquipment->sched_equip_model_year = $productData['instfloat_scheduled_equipment_model_year_' . $counter]['value'];
                                                $schedEquipmentDatePurchased = Carbon::createFromFormat('m/d/Y', $productData['instfloat_scheduled_equipment_date_purchased_' . $counter]['value'])->toDateString();
                                                $instFloaterSchedEquipment->sched_equip_date_purchased = $schedEquipmentDatePurchased;

                                                $instFloaterSchedEquipment->save();
                                                Log::info('Successfully saved instFloaterSchedEquipment record. Data: ' . json_encode($instFloaterSchedEquipment));
                                                DB::commit();
                                            } catch (\Exception $e) {
                                                DB::rollBack();
                                                Log::error('Failed to insert instFloaterSchedEquipment record. Exception: ' . $e->getMessage());
                                            }
                                        }
                                    }

                                    $templateData['instFloater'] = $instFloater;
                                    $templateData['productType'] = 'instfloat';
                                    $templateData['clientInformation'] = $clientInformation;
                                    $html_body .= view('quote.quote-details', $templateData)->render();
                                    Log::info('Record inserted with id for INSTALLATION FLOATER: ' . $instFloater->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert record. Exception: ' . $e->getMessage());
                                }
                                break;
                        }
                    }

                    $date_created = Carbon::now();
                    $formattedDateCreated = $date_created->format("F j, Y g:ia");
                    $this->sendEmailQuotationDetails($templateData, $formattedDateCreated);

                });

                $request->session()->put('forms_completed', true);
                return response()->json(['status' => 'success', 'message' => 'Data has been saved successfully.']);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => 'There was an error saving the data.', 'error' => $e->getMessage()], 500);
                Log::error('Error in transaction: ' . $e->getMessage() . '. Stack trace: ' . $e->getTraceAsString());

            }
        }
    }

    private function sendEmailQuotationDetails($templateData, $formattedDateCreated) {
        $html_body = view('quote.quote-details', $templateData)->render();
        // $apiKey = env('SMTP2GO_API_KEY');
        $apiKey = "api-E300DF281C1711EEA6ABF23C91C88F4E";

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.smtp2go.com/v3/email/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode([
                "api_key" => $apiKey,
                "custom_headers" => [
                    [
                        "header" => "Reply-To",
                        "value" => "PBIBINS Get a Quote Form <web@pbibinc.com>"
                    ]
                ],
                "html_body" => $html_body,
                "sender" => "PBIBINS Get a Quote Form <web@pbibinc.com>",
                "subject" => "PBIBINS Get a Quote Details - {$formattedDateCreated}",
                "to" => [
                    "rj@pbibinc.com <rj@pbibinc.com>"
                ]
            ]),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        $response = json_decode($response, true);
        curl_close($curl);
        Log::info('SMTP2GO Response:', $response);
    }

    public function clearSessionData(Request $request) {
        Session::flush();
        return response()->json(['message' => 'Session data cleared successfully']);
    }

    public function setSessionVariable(Request $request) {
        $data = $request->input('doesGLandWCChecked');
        // dd($data);
        session(['doesGLandWCChecked' => $data]);
        // dd(is_string(session('doesGLandWCChecked')));


        return response()->json(['message' => 'Session variable set successfully', 'doesGLandWCCChecked' => $data]);
    }

    public function unsetSessionVariable(Request $request) {
        Session::forget('doesGLandWCChecked');
        return response()->json(['message' => 'Session variable unset successfully']);
    }

}