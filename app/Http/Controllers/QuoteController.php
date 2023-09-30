<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Quote;
use Illuminate\Http\Request;
use App\Models\BOPInformation;
use Illuminate\Support\Facades\DB;
use App\Models\PersonalInformation;
use Illuminate\Support\Facades\Log;
use App\Models\LicenseBondInformation;
use App\Models\BuildersRiskInformation;
use Illuminate\Support\Facades\Session;
use App\Models\CommercialAutoInformation;
use App\Models\ToolsEquipmentInformation;
use App\Models\ExcessLiabilityInformation;
use App\Models\AboutYourCompanyInformation;
use App\Models\GeneralLiabilityInformation;
use App\Models\PollutionLiabilityInformation;
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

            // $formData = json_decode($request->getContent(), true);
            // Log::debug('formData: ' . json_encode($formData));

            Log::debug('Raw request content: ' . $request->getContent());

            $formData = json_decode($request->getContent(), true);
            Log::debug('JSON Error: ' . json_last_error_msg());
            Log::debug('Data type of formData: ' . gettype($formData));
            Log::debug('formData: ' . json_encode($formData));

            // Check if formData is an array
            if (is_array($formData)) {
                // Check if 'common' key exists
                if (isset($formData['common'])) {
                    // Check if 'common' is already an array
                    if (is_array($formData['common'])) {
                        $commonData = $formData['common'];
                    } else {
                        // Assume 'common' is a URL-encoded string if not an array
                        parse_str($formData['common'], $commonData);
                    }
                } else {
                    // Log an error if 'common' key is missing
                    Log::error('Missing common key in formData.');
                    return response()->json(['status' => 'error', 'message' => 'Missing common key in formData.'], 400);
                }

                // Proceed with rest of the logic
                $productsData = $formData['products'];

                // TODO: Your additional logic here

            } else {
                // Log an error if formData is not an array
                Log::error('formData is not an array.');
                return response()->json(['status' => 'error', 'message' => 'Invalid formData.'], 400);
            }


            // $commonData = [];
            // parse_str($formData['common'], $commonData);
            $productsData = $formData['products'];
            try {
                DB::transaction(function () use ($commonData, $productsData) {
                    $html_body = "";
                    $quoteModel = new Quote();

                    $stateAbbr = $quoteModel->getStatesById($commonData['states']);

                    $personalInformation = PersonalInformation::create([
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
                        $aboutYourCompany->personal_info_id = $personalInformation->id;
                        $aboutYourCompany->business_ownership_structure = $commonData['ayc_bop'];
                        $dateBusinessStartedFormatted = Carbon::createFromFormat('m/d/Y', $commonData['ayc_date_business_started']);
                        $aboutYourCompany->date_business_started = $dateBusinessStartedFormatted->format('Y-m-d');
                        $aboutYourCompany->years_exp_as_contractor = $commonData['ayc_yrs_exp_contractor'];
                        // $aboutYourCompany->owners_firstname = $commonData['ayc_owners_first_name'];
                        // $aboutYourCompany->owners_lastname = $commonData['ayc_owners_last_name'];
                        // $aboutYourCompany->phone_number = $commonData['ayc_phone_number'];
                        $dateBusinessStartedFormatted1 = Carbon::parse($dateBusinessStartedFormatted)->format('F j, Y');

                        Log::info('About to save About Your Company Data: ' . json_encode($aboutYourCompany));

                        $ayc_saving = $aboutYourCompany->save();

                        if (!$ayc_saving) {
                            throw new \Exception("Failed to save About Your Company. Data: " . json_encode($aboutYourCompany));
                        }

                        Log::info('Successfully saved About Your Company. Record id: ' . $aboutYourCompany->id);

                        $templateData['aboutYourCompany'] = $aboutYourCompany;
                        $templateData['dateBusinessStartedFormatted1'] = $dateBusinessStartedFormatted1;

                        Log::info('Record inserted with id for About Your Company: ' . $aboutYourCompany->id);

                    } catch (\Exception $e) {
                        Log::error('Failed to insert About Your Company information. Error: ' . $e->getMessage());
                    }

                    foreach ($productsData as $product => $productDataStr) {
                        // Log::debug('Product Data Str: ' . json_encode($productDataStr));

                        $productData = [];
                        // parse_str($productDataStr, $productData);
                        if (is_array($productDataStr)) {
                            $productData = $productDataStr;
                        } else {
                            parse_str($productDataStr, $productData);
                        }

                        switch ($product) {
                            case 'gl':
                                try {
                                    $professionName = $quoteModel->getProfessionById($productData['gl_profession']);
                                    $generalLiability = new GeneralLiabilityInformation();
                                    $generalLiability->personal_info_id = $personalInformation->id;
                                    $generalLiability->profession = $productData['gl_profession'];
                                    $generalLiability->residential = $productData['gl_residential'];
                                    $generalLiability->commercial = $productData['gl_commercial'];
                                    $generalLiability->new_construction = $productData['gl_new_construction'];
                                    $generalLiability->repair_remodel = $productData['gl_repair_remodel'];
                                    $generalLiability->detailed_descops = $productData['gl_descops'];

                                    $generalLiability->cost_of_largest_proj_past_5_years = floatval(preg_replace("/[^-0-9\.]/","", $productData['gl_cost_proj_5years']));
                                    $parsedCostProj5years = floatval($generalLiability->cost_of_largest_proj_past_5_years);

                                    $generalLiability->annual_gross_receipts = floatval(preg_replace("/[^-0-9\.]/","", $productData['gl_annual_gross']));
                                    $parsedGrossReceipts = floatval($generalLiability->annual_gross_receipts);

                                    $generalLiability->no_field_employees = $productData['gl_no_field_emp'];

                                    $generalLiability->payroll_amount = floatval(preg_replace("/[^-0-9\.]/","", $productData['gl_payroll_amt']));
                                    $parsedPayrollAmount = floatval($generalLiability->payroll_amount);

                                    $generalLiability->does_use_subcontractor = $productData['gl_using_subcon'];

                                    $generalLiability->subcontractor_cost = floatval(preg_replace("/[^-0-9\.]/","", $productData['gl_subcon_cost']));
                                    $parsedSubconCost = floatval($generalLiability->subcontractor_cost);

                                    $generalLiability->no_of_losses_past_5_years = $productData['gl_no_losses_5years'];
                                    $generalLiability->explain_losses = $productData['gl_explain_losses'];

                                    $generalLiability->save();

                                    $templateData['professionName'] = $professionName;
                                    $templateData['parsedGrossReceipts'] = $parsedGrossReceipts;
                                    $templateData['parsedCostProj5years'] = $parsedCostProj5years;
                                    $templateData['parsedPayrollAmount'] = $parsedPayrollAmount;
                                    $templateData['parsedSubconCost'] = $parsedSubconCost;
                                    $templateData['generalLiability'] = $generalLiability;
                                    $templateData['productType'] = 'gl';
                                    $templateData['stateAbbr'] = $stateAbbr;
                                    $templateData['personalInformation'] = $personalInformation;

                                    $html_body .= view('quote.quote-details', $templateData)->render();

                                    Log::info('Record inserted with id for GL: ' . $generalLiability->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'wc':
                                try {
                                    $workersCompensation = new WorkersCompensationInformation();
                                    $workersCompensation->personal_info_id = $personalInformation->id;
                                    $workersCompensation->no_of_professions = $productData['wc_no_of_profession'];

                                    $workersCompensation->profession_1 = $productData['wc_profession_1'];
                                    $workersCompensation->annual_payroll_1 = floatval(preg_replace("/[^-0-9\.]/","", $productData['wc_annual_payroll_1']));
                                    $parsedAnnualPayroll1 = floatval($workersCompensation->annual_payroll_1);

                                    $workersCompensation->full_time_1 = $productData['wc_fulltime_1'];
                                    $workersCompensation->part_time_1 = $productData['wc_parttime_1'];

                                    $workersCompensation->profession_2 = isset($productData['wc_profession_2']) ? $productData['wc_profession_2'] : null;
                                    if (isset($productData['wc_annual_payroll_2'])) {
                                        $workersCompensation->annual_payroll_2 = floatval(preg_replace("/[^-0-9\.]/", "", $productData['wc_annual_payroll_2']));
                                        $parsedAnnualPayroll2 = floatval($workersCompensation->annual_payroll_2);
                                    } else {
                                        $workersCompensation->annual_payroll_2 = null;  // Or whatever value makes sense
                                        $parsedAnnualPayroll2 = null;  // Or whatever value makes sense
                                    }
                                    $workersCompensation->full_time_2 = isset($productData['wc_fulltime_2']) ? $productData['wc_fulltime_2'] : null;
                                    $workersCompensation->part_time_2 = isset($productData['wc_parttime_2']) ? $productData['wc_parttime_2'] : null;

                                    $workersCompensation->profession_3 = isset($productData['wc_profession_3']) ? $productData['wc_profession_3'] : null;
                                    if (isset($productData['wc_annual_payroll_3'])) {
                                        $workersCompensation->annual_payroll_3 = floatval(preg_replace("/[^-0-9\.]/", "", $productData['wc_annual_payroll_3']));
                                        $parsedAnnualPayroll3 = floatval($workersCompensation->annual_payroll_3);
                                    } else {
                                        $workersCompensation->annual_payroll_3 = null;  // Or whatever value makes sense
                                        $parsedAnnualPayroll3 = null;  // Or whatever value makes sense
                                    }
                                    $workersCompensation->full_time_3 = isset($productData['wc_fulltime_3']) ? $productData['wc_fulltime_3'] : null;
                                    $workersCompensation->part_time_3 = isset($productData['wc_parttime_3']) ? $productData['wc_parttime_3'] : null;

                                    $workersCompensation->profession_4 = isset($productData['wc_profession_4']) ? $productData['wc_profession_4'] : null;
                                    if (isset($productData['wc_annual_payroll_4'])) {
                                        $workersCompensation->annual_payroll_4 = floatval(preg_replace("/[^-0-9\.]/", "", $productData['wc_annual_payroll_4']));
                                        $parsedAnnualPayroll4 = floatval($workersCompensation->annual_payroll_4);
                                    } else {
                                        $workersCompensation->annual_payroll_4 = null;  // Or whatever value makes sense
                                        $parsedAnnualPayroll4 = null;  // Or whatever value makes sense
                                    }
                                    $workersCompensation->full_time_4 = isset($productData['wc_fulltime_4']) ? $productData['wc_fulltime_4'] : null;
                                    $workersCompensation->part_time_4 = isset($productData['wc_parttime_4']) ? $productData['wc_parttime_4'] : null;

                                    $workersCompensation->profession_5 = isset($productData['wc_profession_5']) ? $productData['wc_profession_5'] : null;
                                    if (isset($productData['wc_annual_payroll_5'])) {
                                        $workersCompensation->annual_payroll_5 = floatval(preg_replace("/[^-0-9\.]/", "", $productData['wc_annual_payroll_5']));
                                        $parsedAnnualPayroll5 = floatval($workersCompensation->annual_payroll_5);
                                    } else {
                                        $workersCompensation->annual_payroll_5 = null;  // Or whatever value makes sense
                                        $parsedAnnualPayroll5 = null;  // Or whatever value makes sense
                                    }
                                    $workersCompensation->full_time_5 = isset($productData['wc_fulltime_5']) ? $productData['wc_fulltime_5'] : null;
                                    $workersCompensation->part_time_5 = isset($productData['wc_parttime_5']) ? $productData['wc_parttime_5'] : null;

                                    $workersCompensation->profession_6 = isset($productData['wc_profession_6']) ? $productData['wc_profession_6'] : null;
                                    if (isset($productData['wc_annual_payroll_6'])) {
                                        $workersCompensation->annual_payroll_6 = floatval(preg_replace("/[^-0-9\.]/", "", $productData['wc_annual_payroll_6']));
                                        $parsedAnnualPayroll6 = floatval($workersCompensation->annual_payroll_6);
                                    } else {
                                        $workersCompensation->annual_payroll_6 = null;  // Or whatever value makes sense
                                        $parsedAnnualPayroll6 = null;  // Or whatever value makes sense
                                    }
                                    $workersCompensation->full_time_6 = isset($productData['wc_fulltime_6']) ? $productData['wc_fulltime_6'] : null;
                                    $workersCompensation->part_time_6 = isset($productData['wc_parttime_6']) ? $productData['wc_parttime_6'] : null;

                                    $workersCompensation->profession_7 = isset($productData['wc_profession_7']) ? $productData['wc_profession_7'] : null;
                                    if (isset($productData['wc_annual_payroll_7'])) {
                                        $workersCompensation->annual_payroll_7 = floatval(preg_replace("/[^-0-9\.]/", "", $productData['wc_annual_payroll_7']));
                                        $parsedAnnualPayroll7 = floatval($workersCompensation->annual_payroll_7);
                                    } else {
                                        $workersCompensation->annual_payroll_7 = null;  // Or whatever value makes sense
                                        $parsedAnnualPayroll7 = null;  // Or whatever value makes sense
                                    }
                                    $workersCompensation->full_time_7 = isset($productData['wc_fulltime_7']) ? $productData['wc_fulltime_7'] : null;
                                    $workersCompensation->part_time_7 = isset($productData['wc_parttime_7']) ? $productData['wc_parttime_7'] : null;

                                    $workersCompensation->profession_8 = isset($productData['wc_profession_8']) ? $productData[''] : null;
                                    if (isset($productData['wc_annual_payroll_8'])) {
                                        $workersCompensation->annual_payroll_8 = floatval(preg_replace("/[^-0-9\.]/", "", $productData['wc_annual_payroll_8']));
                                        $parsedAnnualPayroll8 = floatval($workersCompensation->annual_payroll_8);
                                    } else {
                                        $workersCompensation->annual_payroll_8 = null;  // Or whatever value makes sense
                                        $parsedAnnualPayroll8 = null;  // Or whatever value makes sense
                                    }
                                    $workersCompensation->full_time_8 = isset($productData['wc_fulltime_8']) ? $productData['wc_fulltime_8'] : null;
                                    $workersCompensation->part_time_8 = isset($productData['wc_parttime_8']) ? $productData['wc_parttime_8'] : null;

                                    $workersCompensation->gross_receipts = floatval(preg_replace("/[^-0-9\.]/","", $productData['wc_gross_receipt']));
                                    $parsedWCGrossReceipt = floatval($workersCompensation->gross_receipts);
                                    $workersCompensation->does_hire_subcon = $productData['wc_does_hire_subcon'];
                                    $workersCompensation->subcon_cost_year = floatval(preg_replace("/[^-0-9\.]/","", $productData['wc_subcon_cost_year']));
                                    $parsedWCSubconCostYear = floatval($workersCompensation->subcon_cost_year);
                                    $workersCompensation->num_of_employees = $productData['wc_num_of_empl'];
                                    $workersCompensation->name = $productData['wc_name'];
                                    $workersCompensation->title_relationship = $productData['wc_title_relationship'];
                                    $workersCompensation->ownership = $productData['wc_ownership_perc'];
                                    $workersCompensation->excluded_included = $productData['wc_exc_inc'];
                                    $workersCompensation->ssn = $productData['wc_ssn'];
                                    $workersCompensation->fein = $productData['wc_fein'];
                                    $dateOfBirth = Carbon::createFromFormat('m/d/Y', $productData['wc_dob']);
                                    $workersCompensation->date_of_birth = $dateOfBirth->format('Y-m-d');
                                    $dateOfBirthFormatted = Carbon::parse($workersCompensation->date_of_birth)->format('F j, Y');

                                    $workersCompensation->save();

                                    $displayData = [];
                                    for ($i = 1; $i <= 8; $i++) {
                                        $profession = $workersCompensation->{'profession_' . $i};
                                        $profession = $quoteModel->getProfessionById($profession);
                                        $annual_payroll_var = 'parsedAnnualPayroll' . $i;
                                        $annual_payroll = isset($$annual_payroll_var) ? $$annual_payroll_var : null;
                                        $full_time = $workersCompensation->{'full_time_' . $i};
                                        $part_time = $workersCompensation->{'part_time_' . $i};
                                        if ($profession || $annual_payroll || $full_time || $part_time) {
                                            $displayData[] = [
                                                'Profession Entry No' => 'Profession Entry No ' . $i,
                                                'Profession' => $profession,
                                                'Annual Payroll' => $annual_payroll,
                                                'Full Time' => $full_time,
                                                'Part Time' => $part_time,
                                            ];
                                        }
                                    }

                                    $templateData['parsedWCGrossReceipt'] = $parsedWCGrossReceipt;
                                    $templateData['parsedWCSubconCostYear'] = $parsedWCSubconCostYear;
                                    $templateData['dateOfBirthFormatted'] = $dateOfBirthFormatted;
                                    $templateData['displayData'] = $displayData;
                                    $templateData['workersCompensation'] = $workersCompensation;
                                    $templateData['productType'] = 'wc';
                                    $templateData['personalInformation'] = $personalInformation;

                                    $html_body .= view('quote.quote-details', $templateData)->render();

                                    Log::info('Record inserted with id for WC: ' . $workersCompensation->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'auto':
                                try {
                                    $commercialAuto = new CommercialAutoInformation();
                                    $commercialAuto->personal_info_id = $personalInformation->id;
                                    $commercialAuto->no_of_vehicles = $productData['auto_add_vehicle'];
                                    $commercialAuto->year_1 = $productData['auto_vehicle_year_1'];
                                    $commercialAuto->make_1 = $productData['auto_vehicle_maker_1'];
                                    $commercialAuto->model_1 = $productData['auto_vehicle_model_1'];
                                    $commercialAuto->vehicle_id_1 = $productData['auto_vehicle_vin_1'];
                                    $commercialAuto->mileage_radius_1 = $productData['auto_vehicle_mileage_1'];
                                    $commercialAuto->garage_address_1 = $productData['auto_vehicle_garage_add_1'];
                                    if (isset($productData['auto_vehicle_coverage_limits_1'])) {
                                        $commercialAuto->coverage_limits_1 = floatval(preg_replace("/[^-0-9\.]/","", $productData['auto_vehicle_coverage_limits_1']));
                                        $parsedCoverageLimits1 = floatval($commercialAuto->coverage_limits_1);
                                    } else {
                                        $commercialAuto->coverage_limits_1 = null;
                                        $parsedCoverageLimits1 = null;
                                    }
                                    $commercialAuto->year_2 = isset($productData['auto_vehicle_year_2']) ? $productData['auto_vehicle_year_2'] : null;
                                    $commercialAuto->make_2 = isset($productData['auto_vehicle_maker_2']) ? $productData['auto_vehicle_maker_2'] : null;
                                    $commercialAuto->model_2 = isset($productData['auto_vehicle_model_2']) ? $productData['auto_vehicle_model_2'] : null;
                                    $commercialAuto->vehicle_id_2 = isset($productData['auto_vehicle_vin_2']) ? $productData['auto_vehicle_vin_2'] : null;
                                    $commercialAuto->mileage_radius_2 = isset($productData['auto_vehicle_mileage_2']) ? $productData['auto_vehicle_mileage_2'] : null;
                                    $commercialAuto->garage_address_2 = isset($productData['auto_vehicle_garage_add_2']) ? $productData['auto_vehicle_garage_add_2'] : null;
                                    if (isset($productData['auto_vehicle_coverage_limits_2'])) {
                                        $commercialAuto->coverage_limits_2 = floatval(preg_replace("/[^-0-9\.]/","", $productData['auto_vehicle_coverage_limits_2']));
                                        $parsedCoverageLimits2 = floatval($commercialAuto->coverage_limits_2);
                                    } else {
                                        $commercialAuto->coverage_limits_2 = null;
                                        $parsedCoverageLimits2 = null;
                                    }
                                    $commercialAuto->year_3 = isset($productData['auto_vehicle_year_3']) ? $productData['auto_vehicle_year_3'] : null;
                                    $commercialAuto->make_3 = isset($productData['auto_vehicle_maker_3']) ? $productData['auto_vehicle_maker_3'] : null;
                                    $commercialAuto->model_3 = isset($productData['auto_vehicle_model_3']) ? $productData['auto_vehicle_model_3'] : null;
                                    $commercialAuto->vehicle_id_3 = isset($productData['auto_vehicle_vin_3']) ? $productData['auto_vehicle_vin_3'] : null;
                                    $commercialAuto->mileage_radius_3 = isset($productData['auto_vehicle_mileage_3']) ? $productData['auto_vehicle_mileage_3'] : null;
                                    $commercialAuto->garage_address_3 = isset($productData['auto_vehicle_garage_add_3']) ? $productData['auto_vehicle_garage_add_3'] : null;
                                    if (isset($productData['auto_vehicle_coverage_limits_3'])) {
                                        $commercialAuto->coverage_limits_3 = floatval(preg_replace("/[^-0-9\.]/","", $productData['auto_vehicle_coverage_limits_3']));
                                        $parsedCoverageLimits3 = floatval($commercialAuto->coverage_limits_3);
                                    } else {
                                        $commercialAuto->coverage_limits_3 = null;
                                        $parsedCoverageLimits3 = null;
                                    }
                                    $commercialAuto->year_4 = isset($productData['auto_vehicle_year_4']) ? $productData['auto_vehicle_year_4'] : null;
                                    $commercialAuto->make_4 = isset($productData['auto_vehicle_maker_4']) ? $productData['auto_vehicle_maker_4'] : null;
                                    $commercialAuto->model_4 = isset($productData['auto_vehicle_model_4']) ? $productData['auto_vehicle_model_4'] : null;
                                    $commercialAuto->vehicle_id_4= isset($productData['auto_vehicle_vin_4']) ? $productData['auto_vehicle_vin_4'] : null;
                                    $commercialAuto->mileage_radius_4 = isset($productData['auto_vehicle_mileage_4']) ? $productData['auto_vehicle_mileage_4'] : null;
                                    $commercialAuto->garage_address_4 = isset($productData['auto_vehicle_garage_add_4']) ? $productData['auto_vehicle_garage_add_4'] : null;
                                    if (isset($productData['auto_vehicle_coverage_limits_4'])) {
                                        $commercialAuto->coverage_limits_4 = floatval(preg_replace("/[^-0-9\.]/","", $productData['auto_vehicle_coverage_limits_4']));
                                        $parsedCoverageLimits4 = floatval($commercialAuto->coverage_limits_4);
                                    } else {
                                        $commercialAuto->coverage_limits_4 = null;
                                        $parsedCoverageLimits4 = null;
                                    }
                                    $commercialAuto->year_5 = isset($productData['auto_vehicle_year_5']) ? $productData['auto_vehicle_year_5'] : null;
                                    $commercialAuto->make_5 = isset($productData['auto_vehicle_maker_5']) ? $productData['auto_vehicle_maker_5'] : null;
                                    $commercialAuto->model_5 = isset($productData['auto_vehicle_model_5']) ? $productData['auto_vehicle_model_5'] : null;
                                    $commercialAuto->vehicle_id_5 = isset($productData['auto_vehicle_vin_5']) ? $productData['auto_vehicle_vin_5'] : null;
                                    $commercialAuto->mileage_radius_5 = isset($productData['auto_vehicle_mileage_5']) ? $productData['auto_vehicle_mileage_5'] : null;
                                    $commercialAuto->garage_address_5 = isset($productData['auto_vehicle_garage_add_5']) ? $productData['auto_vehicle_garage_add_5'] : null;
                                    if (isset($productData['auto_vehicle_coverage_limits_5'])) {
                                        $commercialAuto->coverage_limits_5 = floatval(preg_replace("/[^-0-9\.]/","", $productData['auto_vehicle_coverage_limits_5']));
                                        $parsedCoverageLimits5 = floatval($commercialAuto->coverage_limits_5);
                                    } else {
                                        $commercialAuto->coverage_limits_5 = null;
                                        $parsedCoverageLimits5 = null;
                                    }
                                    $commercialAuto->year_6 = isset($productData['auto_vehicle_year_6']) ? $productData['auto_vehicle_year_6'] : null;
                                    $commercialAuto->make_6 = isset($productData['auto_vehicle_maker_6']) ? $productData['auto_vehicle_maker_6'] : null;
                                    $commercialAuto->model_6 = isset($productData['auto_vehicle_model_6']) ? $productData['auto_vehicle_model_6'] : null;
                                    $commercialAuto->vehicle_id_6 = isset($productData['auto_vehicle_vin_6']) ? $productData['auto_vehicle_vin_6'] : null;
                                    $commercialAuto->mileage_radius_6 = isset($productData['auto_vehicle_mileage_6']) ? $productData['auto_vehicle_mileage_6'] : null;
                                    $commercialAuto->garage_address_6 = isset($productData['auto_vehicle_garage_add_6']) ? $productData['auto_vehicle_garage_add_6'] : null;
                                    if (isset($productData['auto_vehicle_coverage_limits_6'])) {
                                        $commercialAuto->coverage_limits_6 = floatval(preg_replace("/[^-0-9\.]/","", $productData['auto_vehicle_coverage_limits_6']));
                                        $parsedCoverageLimits6 = floatval($commercialAuto->coverage_limits_6);
                                    } else {
                                        $commercialAuto->coverage_limits_6 = null;
                                        $parsedCoverageLimits6 = null;
                                    }
                                    $commercialAuto->year_7 = isset($productData['auto_vehicle_year_7']) ? $productData['auto_vehicle_year_7'] : null;
                                    $commercialAuto->make_7 = isset($productData['auto_vehicle_maker_7']) ? $productData['auto_vehicle_maker_7'] : null;
                                    $commercialAuto->model_7 = isset($productData['auto_vehicle_model_7']) ? $productData['auto_vehicle_model_7'] : null;
                                    $commercialAuto->vehicle_id_7 = isset($productData['auto_vehicle_vin_7']) ? $productData['auto_vehicle_vin_7'] : null;
                                    $commercialAuto->mileage_radius_7 = isset($productData['auto_vehicle_mileage_7']) ? $productData['auto_vehicle_mileage_7'] : null;
                                    $commercialAuto->garage_address_7 = isset($productData['auto_vehicle_garage_add_7']) ? $productData['auto_vehicle_garage_add_7'] : null;
                                    if (isset($productData['auto_vehicle_coverage_limits_7'])) {
                                        $commercialAuto->coverage_limits_7 = floatval(preg_replace("/[^-0-9\.]/","", $productData['auto_vehicle_coverage_limits_7']));
                                        $parsedCoverageLimits7 = floatval($commercialAuto->coverage_limits_7);
                                    } else {
                                        $commercialAuto->coverage_limits_7 = null;
                                        $parsedCoverageLimits7 = null;
                                    }
                                    $commercialAuto->year_8 = isset($productData['auto_vehicle_year_8']) ? $productData['auto_vehicle_year_8'] : null;
                                    $commercialAuto->make_8 = isset($productData['auto_vehicle_maker_8']) ? $productData['auto_vehicle_maker_8'] : null;
                                    $commercialAuto->model_8 = isset($productData['auto_vehicle_model_8']) ? $productData['auto_vehicle_model_8'] : null;
                                    $commercialAuto->vehicle_id_8 = isset($productData['auto_vehicle_vin_8']) ? $productData['auto_vehicle_vin_8'] : null;
                                    $commercialAuto->mileage_radius_8 = isset($productData['auto_vehicle_mileage_8']) ? $productData['auto_vehicle_mileage_8'] : null;
                                    $commercialAuto->garage_address_8 = isset($productData['auto_vehicle_garage_add_8']) ? $productData['auto_vehicle_garage_add_8'] : null;
                                    if (isset($productData['auto_vehicle_coverage_limits_8'])) {
                                        $commercialAuto->coverage_limits_8 = floatval(preg_replace("/[^-0-9\.]/","", $productData['auto_vehicle_coverage_limits_8']));
                                        $parsedCoverageLimits8 = floatval($commercialAuto->coverage_limits_8);
                                    } else {
                                        $commercialAuto->coverage_limits_8 = null;
                                        $parsedCoverageLimits8 = null;
                                    }

                                    $commercialAuto->no_of_drivers = $productData['auto_add_driver'];
                                    $commercialAuto->drivers_name_1 = $productData['auto_add_drivers_name_1'];
                                    $commercialAuto->drivers_lic_no_1 = $productData['auto_add_driver_lic_1'];
                                    $commercialAuto->drivers_mileage_radius_1 = $productData['auto_add_driver_mileage_radius_1'];
                                    $driversDateOfBirth1 = Carbon::createFromFormat('m/d/Y', $productData['auto_add_driver_date_birth_1']);
                                    $commercialAuto->drivers_dob_1 = $driversDateOfBirth1->format('Y-m-d');
                                    $commercialAuto->drivers_civil_status_1 = $productData['auto_add_driver_civil_status_1'];

                                    if ($productData['auto_add_driver_civil_status_1'] === "Married") {
                                        $commercialAuto->drivers_spouse_name_1 = $productData['auto_add_driver_spouse_name_1'];
                                        $driversSpouseDateOfBirth1 = Carbon::createFromFormat('m/d/Y', $productData['auto_add_driver_spouse_dob_1']);
                                        $commercialAuto->drivers_spouse_dob_1 = $driversSpouseDateOfBirth1->format('Y-m-d');
                                    } else {
                                        $commercialAuto->drivers_spouse_name_1 = null;
                                        $commercialAuto->drivers_spouse_dob_1 = null;
                                    }

                                    $commercialAuto->drivers_name_2 = isset($productData['auto_add_drivers_name_2']) ? $productData['auto_add_drivers_name_2'] : null;
                                    $commercialAuto->drivers_lic_no_2 = isset($productData['auto_add_driver_lic_2']) ? $productData['auto_add_driver_lic_2'] : null;
                                    $commercialAuto->drivers_mileage_radius_2 = isset($productData['auto_add_driver_mileage_radius_2']) ? $productData['auto_add_driver_mileage_radius_2'] : null;
                                    if (isset($productData['auto_add_driver_date_birth_2'])) {
                                        $driversDateOfBirth2 = Carbon::createFromFormat('m/d/Y', $productData['auto_add_driver_date_birth_2']);
                                        $commercialAuto->drivers_dob_2 = $driversDateOfBirth2->format('Y-m-d');
                                    } else {
                                        $commercialAuto->drivers_dob_2 = null;
                                    }
                                    if (isset($productData['auto_add_driver_civil_status_2'])) {
                                        $commercialAuto->drivers_civil_status_2 = $productData['auto_add_driver_civil_status_2'];
                                        if ($productData['auto_add_driver_civil_status_2'] === "Married") {
                                            $commercialAuto->drivers_spouse_name_2 = $productData['auto_add_driver_spouse_name_2'];
                                            $driversSpouseDateOfBirth2 = Carbon::createFromFormat('m/d/Y', $productData['auto_add_driver_spouse_dob_2']);
                                            $commercialAuto->drivers_spouse_dob_2 = $driversSpouseDateOfBirth2->format('Y-m-d');
                                        } else {
                                            $commercialAuto->drivers_spouse_name_2 = null;
                                            $commercialAuto->drivers_spouse_dob_2 = null;
                                        }
                                    } else {
                                        $commercialAuto->drivers_civil_status_2 = null;
                                    }

                                    $commercialAuto->drivers_name_3 = isset($productData['auto_add_drivers_name_3']) ? $productData['auto_add_drivers_name_3'] : null;
                                    $commercialAuto->drivers_lic_no_3 = isset($productData['auto_add_driver_lic_3']) ? $productData['auto_add_driver_lic_3'] : null;
                                    $commercialAuto->drivers_mileage_radius_3 = isset($productData['auto_add_driver_mileage_radius_3']) ? $productData['auto_add_driver_mileage_radius_3'] : null;
                                    if (isset($productData['auto_add_driver_date_birth_3'])) {
                                        $driversDateOfBirth3 = Carbon::createFromFormat('m/d/Y', $productData['auto_add_driver_date_birth_3']);
                                        $commercialAuto->drivers_dob_3 = $driversDateOfBirth3->format('Y-m-d');
                                    } else {
                                        $commercialAuto->drivers_dob_3 = null;
                                    }
                                    if (isset($productData['auto_add_driver_civil_status_3'])) {
                                        $commercialAuto->drivers_civil_status_3 = $productData['auto_add_driver_civil_status_3'];
                                        if ($productData['auto_add_driver_civil_status_3'] === "Married") {
                                            $commercialAuto->drivers_spouse_name_3 = $productData['auto_add_driver_spouse_name_3'];
                                            $driversSpouseDateOfBirth3 = Carbon::createFromFormat('m/d/Y', $productData['auto_add_driver_spouse_dob_3']);
                                            $commercialAuto->drivers_spouse_dob_3 = $driversSpouseDateOfBirth3->format('Y-m-d');
                                        } else {
                                            $commercialAuto->drivers_spouse_name_3 = null;
                                            $commercialAuto->drivers_spouse_dob_3 = null;
                                        }
                                    } else {
                                        $commercialAuto->drivers_civil_status_3 = null;
                                    }

                                    $commercialAuto->drivers_name_4 = isset($productData['auto_add_drivers_name_4']) ? $productData['auto_add_drivers_name_4'] : null;
                                    $commercialAuto->drivers_lic_no_4 = isset($productData['auto_add_driver_lic_4']) ? $productData['auto_add_driver_lic_4'] : null;
                                    $commercialAuto->drivers_mileage_radius_4 = isset($productData['auto_add_driver_mileage_radius_4']) ? $productData['auto_add_driver_mileage_radius_4'] : null;
                                    if (isset($productData['auto_add_driver_date_birth_4'])) {
                                        $driversDateOfBirth4 = Carbon::createFromFormat('m/d/Y', $productData['auto_add_driver_date_birth_4']);
                                        $commercialAuto->drivers_dob_4 = $driversDateOfBirth4->format('Y-m-d');
                                    } else {
                                        $commercialAuto->drivers_dob_4 = null;
                                    }
                                    if (isset($productData['auto_add_driver_civil_status_4'])) {
                                        $commercialAuto->drivers_civil_status_4 = $productData['auto_add_driver_civil_status_4'];
                                        if ($productData['auto_add_driver_civil_status_4'] === "Married") {
                                            $commercialAuto->drivers_spouse_name_4 = $productData['auto_add_driver_spouse_name_4'];
                                            $driversSpouseDateOfBirth4 = Carbon::createFromFormat('m/d/Y', $productData['auto_add_driver_spouse_dob_4']);
                                            $commercialAuto->drivers_spouse_dob_4 = $driversSpouseDateOfBirth4->format('Y-m-d');
                                        } else {
                                            $commercialAuto->drivers_spouse_name_4 = null;
                                            $commercialAuto->drivers_spouse_dob_4 = null;
                                        }
                                    } else {
                                        $commercialAuto->drivers_civil_status_4 = null;
                                    }

                                    $commercialAuto->save();

                                    $displayData1 = [];
                                    for ($i = 1; $i <= 8; $i++) {
                                        $year = $commercialAuto->{'year_' . $i};
                                        $make = $commercialAuto->{'make_' . $i};
                                        $model = $commercialAuto->{'model_' . $i};
                                        $vin = $commercialAuto->{'vehicle_id_' . $i};
                                        $mileage = $commercialAuto->{'mileage_radius_' . $i};
                                        $garage_address = $commercialAuto->{'garage_address_' . $i};
                                        $coverage_limits_var = 'parsedCoverageLimits' . $i;
                                        $coverage_limits = isset($$coverage_limits_var) ? $$coverage_limits_var : null;

                                        if ($year || $make || $model || $vin || $mileage || $garage_address || $coverage_limits) {
                                            $displayData1[] = [
                                                'Vehicle Information Entry No.' => 'Vehicle Information Entry No ' . $i,
                                                'year' => $year,
                                                'make' => $make,
                                                'model' => $model,
                                                'vin' => $vin,
                                                'mileage_radius' => $mileage,
                                                'garage_address' => $garage_address,
                                                'coverage_limits' => $coverage_limits,
                                            ];
                                        }
                                    }

                                    $displayData2 = [];
                                    for ($i = 1; $i <= 4; $i++) {
                                        $drivers_name = $commercialAuto->{'drivers_name_' . $i};
                                        $drivers_lic = $commercialAuto->{'drivers_lic_no_' . $i};
                                        $drivers_mileage_radius = $commercialAuto->{'drivers_mileage_radius_' . $i};
                                        $drivers_date_of_birth = $commercialAuto->{'drivers_dob_' . $i};
                                        $drivers_civil_status = $commercialAuto->{'drivers_civil_status_' . $i};
                                        $drivers_spouse_name = $commercialAuto->{'drivers_spouse_name_' . $i};
                                        $drivers_spouse_dob = $commercialAuto->{'drivers_spouse_dob_' . $i};

                                        if ($drivers_name || $drivers_lic || $drivers_mileage_radius || $drivers_date_of_birth || $drivers_civil_status || $drivers_spouse_name || $drivers_spouse_dob) {
                                            $displayData2[] = [
                                                'Driver Information Entry No.' => 'Driver Information Entry No ' . $i,
                                                'drivers_name' => $drivers_name,
                                                'drivers_lic_no' => $drivers_lic,
                                                'mileage_radius' => $drivers_mileage_radius,
                                                'drivers_dob' => $drivers_date_of_birth,
                                                'civil_status' => $drivers_civil_status,
                                                'spouse_name' => $drivers_spouse_name,
                                                'spouse_dob' => $drivers_spouse_dob,
                                            ];
                                        }
                                    }

                                    $templateData['displayData1'] = $displayData1;
                                    $templateData['displayData2'] = $displayData2;
                                    $templateData['commercialAuto'] = $commercialAuto;
                                    $templateData['productType'] = 'auto';
                                    $templateData['personalInformation'] = $personalInformation;

                                    $html_body .= view('quote.quote-details', $templateData)->render();

                                    Log::info('Record inserted with id for AUTO: ' . $commercialAuto->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'bond':
                                try {
                                    $licenseBond = new LicenseBondInformation();
                                    $licenseBond->personal_info_id = $personalInformation->id;
                                    $licenseBond->owners_name = $productData['bond_owners_name'];
                                    $licenseBond->ssn = $productData['bond_owners_ssn'];

                                    $bondOwnersDateOfBirth = Carbon::createFromFormat('m/d/Y', $productData['bond_owners_dob']);
                                    $licenseBond->date_of_birth = $bondOwnersDateOfBirth->format('Y-m-d');
                                    $bondOwnersDateOfBirthFormatted = $bondOwnersDateOfBirth->format('F j, Y');

                                    $licenseBond->civil_status = $productData['bond_owners_civil_status'];
                                    $licenseBond->spouse_name = $productData['bond_owners_spouse_name'];

                                    $bondOwnersSpouseDateOfBirth = Carbon::createFromFormat('m/d/Y', $productData['bond_owners_spouse_dob']);
                                    $licenseBond->spouse_dob = $bondOwnersSpouseDateOfBirth->format('Y-m-d');
                                    $bondOwnersSpouseDateOfBirthFormatted = $bondOwnersSpouseDateOfBirth->format('F j, Y');

                                    $licenseBond->spouse_ssn = $productData['bond_owners_spouse_ssn'];
                                    $licenseBond->type_of_bond_requested = $productData['bond_type_bond_requested'];
                                    $licenseBond->amount_of_bond = floatval(preg_replace("/[^-0-9\.]/","", $productData['bond_amount_of_bond']));
                                    $parsedAmountOfBond = floatval($licenseBond->amount_of_bond);

                                    $licenseBond->term_of_bond = $productData['bond_term_of_bond'];
                                    $licenseBond->type_of_license = $productData['bond_type_of_license'];
                                    $licenseBond->if_other_type_of_license = $productData['bond_if_other_type_of_license'];
                                    $licenseBond->license_or_application_no = $productData['bond_license_or_application_no'];

                                    $bondEffectiveDate = Carbon::createFromFormat('m/d/Y', $productData['bond_effective_date']);
                                    $licenseBond->effective_date = $bondEffectiveDate->format('Y-m-d');
                                    $bondEffectiveDateFormatted = $bondEffectiveDate->format('F j, Y');

                                    $licenseBond->save();

                                    $templateData['parsedAmountOfBond'] = $parsedAmountOfBond;
                                    $templateData['bondOwnersDateOfBirthFormatted'] = $bondOwnersDateOfBirthFormatted;
                                    $templateData['bondOwnersSpouseDateOfBirthFormatted'] = $bondOwnersSpouseDateOfBirthFormatted;
                                    $templateData['bondEffectiveDateFormatted'] = $bondEffectiveDateFormatted;
                                    $templateData['licenseBond'] = $licenseBond;
                                    $templateData['productType'] = 'bond';
                                    $templateData['personalInformation'] = $personalInformation;

                                    $html_body .= view('quote.quote-details', $templateData)->render();

                                    Log::info('Record inserted with id for BOND: ' . $licenseBond->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'excess':
                                try {
                                    $excessLiability = new ExcessLiabilityInformation();
                                    $excessLiability->personal_info_id = $personalInformation->id;
                                    $excessLiability->excess_limits = floatval(preg_replace("/[^-0-9\.]/","", $productData['excess_limits']));

                                    $excessGLEffectiveDate = Carbon::createFromFormat('m/d/Y', $productData['excess_gl_eff_date']);
                                    $excessLiability->gl_effective_date = $excessGLEffectiveDate->format('Y-m-d');
                                    $excessGLEffectiveDateFormatted = $excessGLEffectiveDate->format('F j, Y');

                                    $excessLiability->no_of_losses_past_5_years = $productData['excess_no_losses_5years'];
                                    $excessLiability->explain_losses = $productData['excess_explain_losses'];
                                    $excessLiability->insurance_carrier = $productData['excess_insurance_carrier'];
                                    $excessLiability->policy_quote_number = $productData['excess_policy_or_quote_no'];
                                    $excessLiability->policy_premium = floatval(preg_replace("/[^-0-9\.]/","", $productData['excess_policy_premium']));
                                    $parsedPolicyPremium = floatval($excessLiability->policy_premium);

                                    $excessEffectiveDate = Carbon::createFromFormat('m/d/Y', $productData['excess_effective_date']);
                                    $excessLiability->effective_date = $excessEffectiveDate->format('Y-m-d');
                                    $excessEffectiveDateFormatted = $excessEffectiveDate->format('F j, Y');

                                    $excessExpirationDate = Carbon::createFromFormat('m/d/Y', $productData['excess_expiration_date']);
                                    $excessLiability->expiration_date = $excessExpirationDate->format('Y-m-d');
                                    $excessExpirationDateFormatted = $excessExpirationDate->format('F j, Y');

                                    $excessLiability->save();

                                    $templateData['parsedPolicyPremium'] = $parsedPolicyPremium;
                                    $templateData['excessGLEffectiveDateFormatted'] = $excessGLEffectiveDateFormatted;
                                    $templateData['excessEffectiveDateFormatted'] = $excessEffectiveDateFormatted;
                                    $templateData['excessExpirationDateFormatted'] = $excessExpirationDateFormatted;
                                    $templateData['excessLiability'] = $excessLiability;
                                    $templateData['productType'] = 'excess';
                                    $templateData['personalInformation'] = $personalInformation;

                                    $html_body .= view('quote.quote-details', $templateData)->render();

                                    Log::info('Record inserted with id for EXCESS: ' . $excessLiability->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'tools':
                                try {
                                    $toolsEquipmentsLiability = new ToolsEquipmentInformation();
                                    $toolsEquipmentsLiability->personal_info_id = $personalInformation->id;
                                    $toolsEquipmentsLiability->misc_tools_amount = floatval(preg_replace("/[^-0-9\.]/","", $productData['tools_misc_tools']));
                                    $parsedMiscToolsAmount = floatval($toolsEquipmentsLiability->misc_tools_amount);
                                    $toolsEquipmentsLiability->rented_leased_equipment_amount = floatval(preg_replace("/[^-0-9\.]/","", $productData['tools_rented_or_leased_amt']));
                                    $parsedRentedLeasedEquipmentAmount = floatval($toolsEquipmentsLiability->rented_leased_equipment_amount);
                                    $toolsEquipmentsLiability->scheduled_equipment = $productData['tools_sched_equipment'];
                                    $toolsEquipmentsLiability->equipment_type = $productData['tools_equipment_type'];
                                    $toolsEquipmentsLiability->year = $productData['tools_equipment_year'];
                                    $toolsEquipmentsLiability->make = $productData['tools_equipment_make'];
                                    $toolsEquipmentsLiability->model = $productData['tools_equipment_model'];
                                    $toolsEquipmentsLiability->vin_or_serial_no = $productData['tools_equipment_vin_or_serial_no'];
                                    $toolsEquipmentsLiability->valuation = $productData['tools_equipment_valuation'];
                                    $toolsEquipmentsLiability->no_of_losses_past_5_years = $productData['tools_no_losses_5years'];
                                    $toolsEquipmentsLiability->explain_losses = $productData['tools_explain_losses'];

                                    $toolsEquipmentsLiability->save();

                                    $templateData['parsedMiscToolsAmount'] = $parsedMiscToolsAmount;
                                    $templateData['parsedRentedLeasedEquipmentAmount'] = $parsedRentedLeasedEquipmentAmount;
                                    $templateData['toolsEquipmentsLiability'] = $toolsEquipmentsLiability;
                                    $templateData['productType'] = 'tools';
                                    $templateData['personalInformation'] = $personalInformation;

                                    $html_body .= view('quote.quote-details', $templateData)->render();

                                    Log::info('Record inserted with id for TOOLS: ' . $toolsEquipmentsLiability->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'br':
                                try {
                                    $buildersRiskLiability = new BuildersRiskInformation();
                                    $buildersRiskLiability->personal_info_id = $personalInformation->id;
                                    $buildersRiskLiability->property_addresss = $productData['br_property_address'];
                                    $buildersRiskLiability->value_of_existing_structure = floatval(preg_replace("/[^-0-9\.]/","", $productData['br_value_of_existing_structure']));
                                    $parsedValueOfExistingStructure = floatval($buildersRiskLiability->value_of_existing_structure);
                                    $buildersRiskLiability->value_of_work_performed = floatval(preg_replace("/[^-0-9\.]/","", $productData['br_value_of_work_performed']));
                                    $parsedValueOfWorkBeingPerformed = floatval($buildersRiskLiability->value_of_work_performed);
                                    $buildersRiskLiability->period_duration_of_project = $productData['br_period_duration_project'];

                                    $buildersRiskLiability->save();

                                    $templateData['parsedValueOfExistingStructure'] = $parsedValueOfExistingStructure;
                                    $templateData['parsedValueOfWorkBeingPerformed'] = $parsedValueOfWorkBeingPerformed;
                                    $templateData['buildersRiskLiability'] = $buildersRiskLiability;
                                    $templateData['productType'] = 'br';
                                    $templateData['personalInformation'] = $personalInformation;

                                    $html_body .= view('quote.quote-details', $templateData)->render();

                                    Log::info('Record inserted with id for BR: ' . $buildersRiskLiability->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'bop':
                                try {
                                    $businessOwnersPolicy = new BOPInformation();
                                    $businessOwnersPolicy->personal_info_id = $personalInformation->id;
                                    $businessOwnersPolicy->property_address = $productData['bop_property_address'];
                                    $businessOwnersPolicy->loss_payee_info = $productData['bop_loss_payee_info'];
                                    $businessOwnersPolicy->building_industry = $productData['bop_building_industry'];
                                    $businessOwnersPolicy->occupancy = $productData['bop_occupancy'];
                                    $businessOwnersPolicy->value_cost_of_building = floatval(preg_replace("/[^-0-9\.]/","", $productData['bop_val_cost_bldg']));
                                    $businessOwnersPolicy->business_property_limit = floatval(preg_replace("/[^-0-9\.]/","", $productData['bop_business_property_limit']));
                                    $businessOwnersPolicy->building_construction_type = $productData['bop_bldg_construction_type'];
                                    $businessOwnersPolicy->year_built = $productData['bop_year_built'];
                                    $businessOwnersPolicy->no_of_stories = $productData['bop_no_of_stories'];
                                    $businessOwnersPolicy->total_building_sqft = $productData['bop_total_bldg_sqft'];
                                    $businessOwnersPolicy->automatic_sprinkler_system = $productData['bop_automatic_sprinkler_system'];
                                    $businessOwnersPolicy->automatic_fire_alarm = $productData['bop_automatic_fire_alarm'];
                                    $businessOwnersPolicy->distance_near_fire_hydrant = $productData['bop_distance_nearest_fire_hydrant'];
                                    $businessOwnersPolicy->automatic_commercial_ext_system = $productData['bop_automatic_comm_cooking_ext'];
                                    $businessOwnersPolicy->automatic_burglar_alarm = $productData['bop_automatic_burglar_alarm'];
                                    $businessOwnersPolicy->security_cameras = $productData['bop_security_cameras'];
                                    $businessOwnersPolicy->last_update_to_roofing_year = $productData['bop_last_update_roofing_year'];
                                    $businessOwnersPolicy->last_update_to_heating_year = $productData['bop_last_update_heating_year'];
                                    $businessOwnersPolicy->last_update_to_plumbing_year = $productData['bop_last_update_plumbing_year'];
                                    $businessOwnersPolicy->last_update_to_electrical_year = $productData['bop_last_update_electrical_year'];

                                    $businessOwnersPolicy->save();

                                    $templateData['businessOwnersPolicy'] = $businessOwnersPolicy;
                                    $templateData['productType'] = 'bop';
                                    $templateData['personalInformation'] = $personalInformation;

                                    $html_body .= view('quote.quote-details', $templateData)->render();

                                    Log::info('Record inserted with id for BOP: ' . $businessOwnersPolicy->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'comm_prop':
                                break;
                            case 'pollution':
                                try {
                                    $pollutionLiability = new PollutionLiabilityInformation();
                                    $pollutionLiability->personal_info_id = $personalInformation->id;
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
                                    $templateData['productType'] = 'tools';
                                    $templateData['personalInformation'] = $personalInformation;

                                    $html_body .= view('quote.quote-details', $templateData)->render();

                                    Log::info('Record inserted with id for POLLUTION: ' . $pollutionLiability->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'epli':
                                break;
                            case 'cyber':
                                break;
                            case 'instfloat':
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