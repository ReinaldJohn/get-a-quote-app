<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Quote;
use App\Models\Classcodes;
use App\Models\WCOwnersInfo;
use Illuminate\Http\Request;
use App\Models\BOPInformation;
use App\Models\EPLIInformation;
use App\Models\ClientInformation;
use App\Models\WCProfessionEntry;
use Illuminate\Support\Facades\DB;
use App\Models\GLMultipleStateWork;
use Illuminate\Support\Facades\Log;
use App\Models\CommercialAutoDrivers;
use App\Models\GLAdditionalQuestions;
use App\Models\CommercialAutoVehicles;
use App\Models\LicenseBondInformation;
use App\Models\BuildersRiskInformation;
use Illuminate\Support\Facades\Session;
use App\Models\CommercialAutoInformation;
use App\Models\CyberLiabilityInformation;
use App\Models\ToolsEquipmentInformation;
use App\Models\ExcessLiabilityInformation;
use App\Models\AboutYourCompanyInformation;
use App\Models\GeneralLiabilityInformation;
use App\Models\ErrorsAndEmissionInformation;
use App\Models\CommercialPropertyInformation;
use App\Models\PollutionLiabilityInformation;
use App\Models\InstallationFloaterInformation;
use App\Models\WorkersCompensationInformation;
use App\Models\InstallationFloaterScheduledEquipment;
use App\Models\OptInList;
use Exception;

class QuoteController extends Controller
{
    public function index() {

        $quoteModel = new Quote();
        $states = $quoteModel->getAllStates();
        $excludeIds = [995, 996, 997, 998, 999];
        $professions = $quoteModel->getAllProfessions($excludeIds);
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

            // IDs you want specifically for WC Professions
            $ids = [995, 996, 997, 998, 999];

            // Fetch all professions
            $professions = $quoteModel->getAllProfessions($ids);

            // Fetch specific professions based on the array of IDs
            $wcProfessions = $quoteModel->getWCProfessions($ids);

            // Initialize output buffer and add general professions
            ob_start();

            // Add WC professions if they exist
            if ($wcProfessions && count($wcProfessions) > 0) {
                echo "<optgroup label='Other Professions'>";
                foreach ($wcProfessions as $wcProfession) {
                    echo "<option value='{$wcProfession['id']}'>{$wcProfession['name']}</option>";
                }
                echo "</optgroup>";
            }

            echo "<optgroup label='All Professions'>";
            foreach ($professions as $profession) {
                echo "<option value='{$profession['id']}'>{$profession['name']}</option>";
            }
            echo "</optgroup>";

            // Get output buffer content and clean the buffer
            $options = ob_get_clean();

            // Generate the final HTML output
            $output = "
                <div id='profession_entry_container_{$a}'>
                    <h4 class='profession_header mt-2 mb-2'>Profession Entry No. {$a}</h4>
                    <div class='row justify-content-center'>
                        <div class='col-md-12'>
                            <div class='mb-3 form-floating'>
                                <select class='form-control wc_profession_{$a}' name='wc_profession_{$a}' id='wc_profession_{$a}' aria-label='wc_profession_{$a}'>
                                    <option value selected></option>
                                    $options
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

    // public function showVehicleEntries(Request $request) {

    //     if ($request->isMethod('get') && $request->has('a')) {

    //         $a = $request->input('a');
    //         // dd($a);

    //         $output = "
    //             <h4 class='profession_header mt-2 mb-2'>Vehicle Entry No. {$a}</h4>
    //             <div class='row justify-content-center'>
    //                 <div class='col-md-4'>
    //                     <div class='mb-3 form-floating'>
    //                         <input type='text' name='auto_vehicle_year_{$a}' id='auto_vehicle_year_{$a}' class='form-control' placeholder='' maxlength='4'>
    //                         <label for='auto_vehicle_year_{$a}'>Year</label>
    //                     </div>
    //                 </div>
    //                 <div class='col-md-4'>
    //                     <div class='mb-3 form-floating'>
    //                         <input type='text' name='auto_vehicle_maker_{$a}' id='auto_vehicle_maker_{$a}' class='form-control' placeholder='' maxlength='100'>
    //                         <label for='auto_vehicle_maker_{$a}'>Maker</label>
    //                     </div>
    //                 </div>
    //                 <div class='col-md-4'>
    //                     <div class='mb-3 form-floating'>
    //                         <input type='text' name='auto_vehicle_model_{$a}' id='auto_vehicle_model_{$a}' class='form-control' placeholder='' maxlength='100'>
    //                         <label for='auto_vehicle_model_{$a}'>Model</label>
    //                     </div>
    //                 </div>
    //                 <div class='col-md-6'>
    //                     <div class='mb-3 form-floating'>
    //                         <input type='text' name='auto_vehicle_vin_{$a}' id='auto_vehicle_vin_{$a}' class='form-control' placeholder='' maxlength='100'>
    //                         <label for='auto_vehicle_vin_{$a}'>Vehicle Identification Number (VIN)</label>
    //                     </div>
    //                 </div>
    //                 <div class='col-md-6'>
    //                     <div class='mb-3 form-floating'>
    //                         <input type='text' name='auto_vehicle_mileage_{$a}' id='auto_vehicle_mileage_{$a}' class='form-control' placeholder='' maxlength='100'>
    //                         <label for='auto_vehicle_mileage_{$a}'>Mileage / Radius</label>
    //                     </div>
    //                 </div>
    //                 <div class='col-md-12'>
    //                     <div class='mb-3 form-floating'>
    //                         <input type='text' name='auto_vehicle_garage_add_{$a}' id='auto_vehicle_garage_add_{$a}' class='form-control' placeholder=''>
    //                         <label for='auto_vehicle_garage_add_{$a}'>Garage Address</label>
    //                     </div>
    //                 </div>
    //                 <div class='col-md-12'>
    //                     <div class='mb-3 form-floating'>
    //                         <select class='form-control' name='auto_vehicle_coverage_limits_{$a}' id='auto_vehicle_coverage_limits_{$a}' aria-label='auto_vehicle_coverage_limits_{$a}'>
    //                             <option value selected></option>
    //                             <option value='100,000'>$100,000</option>
    //                             <option value='300,000'>$300,000</option>
    //                             <option value='500,000'>$500,000</option>
    //                             <option value='1,000,000'>$1,000,000</option>
    //                         </select>
    //                         <label for='auto_vehicle_coverage_limits_{$a}'>Coverage Limits</label>
    //                     </div>
    //                 </div>
    //             </div>
    //         ";

    //         return response()->json(['data' => $output]);
    //     }
    //     return response()->json(['data' => '']);
    // }

    // public function showDriverEntries(Request $request) {

    //     if ($request->isMethod('get') && $request->has('a')) {

    //         $a = $request->input('a');

    //         $output = "

    //             <h4 class='profession_header mt-2 mb-2'>Driver Information Entry No. {$a}</h4>
    //             <div class='row justify-content-center'>
    //                 <div class='col-md-12'>
    //                     <div class='mb-3 form-floating'>
    //                         <input type='text' name='auto_add_drivers_name_{$a}' id='auto_add_drivers_name_{$a}' class='form-control' placeholder='' maxlength='100'>
    //                         <label for='auto_add_drivers_name_{$a}'>Driver's Name</label>
    //                     </div>
    //                 </div>
    //                 <div class='col-md-12'>
    //                     <div class='mb-3 form-floating'>
    //                         <input type='text' name='auto_add_driver_lic_{$a}' id='auto_add_driver_lic_{$a}' class='form-control ' placeholder='' maxlength='50'>
    //                         <label for='auto_add_driver_lic_{$a}'>Driver's License Number</label>
    //                     </div>
    //                 </div>
    //                 <div class='col-md-12'>
    //                     <div class='mb-3 form-floating'>
    //                         <input type='text' name='auto_add_driver_mileage_radius_{$a}' id='auto_add_driver_mileage_radius_{$a}' class='form-control ' placeholder='' maxlength='100'>
    //                         <label for='auto_add_driver_mileage_radius_{$a}'>Mileage / Radius</label>
    //                     </div>
    //                 </div>
    //                 <div class='col-md-12'>
    //                     <div class='mb-3 form-floating'>
    //                         <input type='text' name='auto_add_driver_date_birth_{$a}' id='auto_add_driver_date_birth_{$a}' class='form-control driver_birthdate' placeholder=''>
    //                         <label for='auto_add_driver_date_birth_{$a}'>Date of Birth</label>
    //                     </div>
    //                 </div>
    //                 <div class='col-md-12'>
    //                     <div class='mb-3 form-floating'>
    //                         <select class='form-select ' name='auto_add_driver_civil_status_{$a}' id='auto_add_driver_civil_status_{$a}' aria-label='auto_add_driver_civil_status_{$a}'>
    //                             <option value selected></option>
    //                             <option value='Single'>Single</option>
    //                             <option value='Married'>Married</option>
    //                             <option value='Divorced'>Divorced</option>
    //                         </select>
    //                         <label for='auto_add_driver_civil_status_{$a}'>Civil Status</label>
    //                     </div>
    //                 </div>
    //                 <div id='auto_driver_if_married_container_{$a}'></div>
    //             </div>

    //         ";

    //         return response()->json(['data' => $output]);
    //     }
    //     return response()->json(['data' => '']);
    // }

    // public function showSpouseInformationForm(Request $request) {

    //     if ($request->isMethod('get') && $request->has('a')) {

    //         $a = $request->input('a');

    //         $output = "

    //             <div class='col-md-12'>
    //                 <div class='mb-3 form-floating'>
    //                     <input type='text' name='auto_add_driver_spouse_name_{$a}' id='auto_add_driver_spouse_name_{$a}' class='form-control ' placeholder='' maxlength='100'>
    //                     <label for='auto_add_driver_spouse_name_{$a}'>Spouse's Name</label>
    //                 </div>
    //             </div>
    //             <div class='col-md-12'>
    //                 <div class='mb-3 form-floating'>
    //                     <input type='text' name='auto_add_driver_spouse_dob_{$a}' id='auto_add_driver_spouse_dob_{$a}' class='form-control spouse_datebirth ' placeholder=''>
    //                     <label for='auto_add_driver_spouse_dob_{$a}'>Spouse's Date of Birth</label>
    //                 </div>
    //             </div>

    //         ";

    //         return response()->json(['data' => $output]);
    //     }
    //     return response()->json(['data' => '']);
    // }

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

            if (isset($formData['productKeyData'])) {
                $productKeyData = $formData['productKeyData'];
            } else {
                Log::error('Missing productKeyData key in formData.');
                return response()->json(['status' => 'error', 'message' => 'Missing productKeyData key in formData.'], 400);
            }

            try {
                DB::transaction(function () use ($commonData, $productsData, $productKeyData) {
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

                    DB::beginTransaction();
                    try {
                        $does_opt_in = null;

                        if (isset($commonData['terms'])) {
                            $does_opt_in = $commonData['terms'] === 'Yes' ? 1 : 0;
                        }

                        $utm_source = isset($commonData['utm_source']) ? $commonData['utm_source'] : null;
                        $utm_medium = isset($commonData['utm_medium']) ? $commonData['utm_medium'] : null;
                        $utm_campaign = isset($commonData['utm_campaign']) ? $commonData['utm_campaign'] : null;
                        $utm_term = isset($commonData['utm_term']) ? $commonData['utm_term'] : null;
                        $utm_content = isset($commonData['utm_content']) ? $commonData['utm_content'] : null;

                        $utmParamQueries = OptInList::create([
                            'client_info_id' => $clientInformation->id,
                            'does_opt_in' => $does_opt_in,
                            'utm_source' => $utm_source,
                            'utm_medium' => $utm_medium,
                            'utm_campaign' => $utm_campaign,
                            'utm_term' => $utm_term,
                            'utm_content' => $utm_content,
                        ]);

                        $templateData['utm_source'] = $utm_source;
                        $templateData['utm_medium'] = $utm_medium;
                        $templateData['utm_campaign'] = $utm_campaign;
                        $templateData['utm_term'] = $utm_term;
                        $templateData['utm_content'] = $utm_content;

                        Log::info('Successfully saved OPT IN record. Data: ' . json_encode($utmParamQueries));
                        DB::commit();
                    } catch (\Exception $e) {
                        DB::rollBack();
                        Log::error('Failed to insert UTM Param Queries. Error: ' . $e->getMessage());
                    }

                    try {
                        $clientInfoId = $clientInformation->id;
                        $business_ownership_structure = $commonData['ayc_bop'];
                        $date_business_started = Carbon::createFromFormat('m/d/Y', $commonData['ayc_date_business_started']);
                        $years_in_business = $commonData['ayc_yrs_in_business'];
                        $years_exp_as_contractor = $commonData['ayc_yrs_exp_contractor'];
                        $annual_gross_receipt = isset($commonData['annual_gross_receipt']) ? floatval(preg_replace("/[^-0-9\.]/","", $commonData['annual_gross_receipt'])) : null;
                        $profession = isset($commonData['profession']) ? $commonData['profession'] : null;
                        $residential_percentage = isset($commonData['residential_percentage']) ? $commonData['residential_percentage'] : null;
                        $commercial_percentage = isset($commonData['commercial_percentage']) ? $commonData['commercial_percentage'] : null;
                        $new_construction_percentage = isset($commonData['new_construction_percentage']) ? $commonData['new_construction_percentage'] : null;
                        $repair_remodel_percentage = isset($commonData['repair_remodel_percentage']) ? $commonData['repair_remodel_percentage'] : null;

                        // $no_of_losses = $commonData['ayc_no_of_losses'];
                        // $explain_losses = isset($commonData['ayc_no_of_losses_explain']) ? $commonData['ayc_no_of_losses_explain'] : null;

                        $aboutYourCompany = new AboutYourCompanyInformation();
                        $aboutYourCompany->client_info_id = $clientInfoId;
                        $aboutYourCompany->business_ownership_structure = $business_ownership_structure;
                        $aboutYourCompany->date_business_started = $date_business_started;
                        $aboutYourCompany->years_in_business = $years_in_business;
                        $aboutYourCompany->years_exp_as_contractor = $years_exp_as_contractor;
                        $aboutYourCompany->annual_gross_receipt = $annual_gross_receipt;
                        $aboutYourCompany->profession = $profession;
                        $aboutYourCompany->residential_percentage = $residential_percentage;
                        $aboutYourCompany->commercial_percentage = $commercial_percentage;
                        $aboutYourCompany->new_construction_percentage = $new_construction_percentage;
                        $aboutYourCompany->repair_remodel_percentage = $repair_remodel_percentage;

                        // $aboutYourCompany->no_of_losses = $no_of_losses;
                        // $aboutYourCompany->explain_losses = $explain_losses;
                        $aboutYourCompany->save();

                        $dateBusinessStartedFormatted = Carbon::createFromFormat('m/d/Y', $commonData['ayc_date_business_started'])->format('F j, Y');

                        Log::info('Successfully saved About Your Company. Record id: ' . $aboutYourCompany->id);

                        $professionName = $quoteModel->getProfessionById((int)$profession);

                        $condition1 = !empty($aboutYourCompany->annual_gross_receipt);
                        $condition2 = !empty($aboutYourCompany->profession);
                        $condition3 = !empty($aboutYourCompany->residential_percentage);
                        $condition4 = !empty($aboutYourCompany->commercial_percentage);
                        $condition5 = !empty($aboutYourCompany->new_construction_percentage);
                        $condition6 = !empty($aboutYourCompany->repair_remodel_percentage);

                        $shouldDisplayAboutYourInformation = $condition1 || ($condition1 && $condition2) || ($condition2 && $condition3) || ($condition3 && $condition4) || ($condition4 && $condition5) || ($condition5 && $condition6) || $condition6;

                        $fullName = $clientInformation->first_name . ' ' . $clientInformation->last_name;
                        $fullAddress = $clientInformation->address . ' ' . $clientInformation->city . ' ' . $clientInformation->state . ', ' . $clientInformation->zipcode;

                        $templateData['aycProfessionName'] = $professionName;
                        $templateData['fullAddress'] = $fullAddress;
                        $templateData['fullName'] = $fullName;
                        $templateData['shouldDisplayAboutYourInformation'] = $shouldDisplayAboutYourInformation;
                        $templateData['stateAbbr'] = $stateAbbr;
                        $templateData['aboutYourCompany'] = $aboutYourCompany;
                        $templateData['dateBusinessStartedFormatted'] = $dateBusinessStartedFormatted;

                        // Log::info('Successfully saved About Your Company. Record id: ' . $aboutYourCompany->id);
                    } catch (\Exception $e) {
                        Log::error('Failed to insert About Your Company information. Error: ' . $e->getMessage());
                    }

                    $templateData['productKeyData'] = $productKeyData;
                    foreach ($productsData as $product => $productDataStr) {
                        $productData = [];
                        if (is_array($productDataStr)) {
                            $productData = $productDataStr;
                        } else {
                            parse_str($productDataStr, $productData);
                        }
                        // $templateData['productTypes'] = [];
                        switch ($product) {
                            case 'gl':
                                try {
                                    $client_info_id = $clientInformation->id;
                                    $profession = $productData['gl_profession']['value'];
                                    $annual_gross_receipt = floatval(preg_replace("/[^-0-9\.]/","", $productData['gl_annual_gross']['value']));
                                    $specify_profession_if_others = isset($productData['gl_specify_profession']) ? $productData['gl_specify_profession']['value'] : null;
                                    $residential = $productData['gl_residential']['value'];
                                    $commercial = $productData['gl_commercial']['value'];
                                    $new_construction = $productData['gl_new_construction']['value'];
                                    $repair_remodel = $productData['gl_repair_remodel']['value'];
                                    $detailed_descops = $productData['gl_descops']['value'];
                                    $multiple_state_work = $productData['gl_multiple_state_work']['value'];
                                    $cost_of_largest_project = floatval(preg_replace("/[^-0-9\.]/","", $productData['gl_cost_proj_5years']['value']));
                                    $full_time = $productData['gl_full_time_employees']['value'];
                                    $part_time = $productData['gl_part_time_employees']['value'];
                                    $payroll_amount = floatval(preg_replace("/[^-0-9\.]/","", $productData['gl_payroll_amt']['value']));
                                    $does_using_subcontractor = $productData['gl_using_subcon']['value'];
                                    $subcon_cost = isset($productData['gl_subcon_cost']['value']) ? floatval(preg_replace("/[^-0-9\.]/","", $productData['gl_subcon_cost']['value'])) : null;
                                    $gl_no_of_losses = $productData['gl_no_of_losses']['value'];
                                    $gl_amount_of_claim = null;
                                    if (isset($productData['gl_amt_of_claims']['value']) && !empty($productData['gl_amt_of_claims']['value'])) {
                                        try {
                                            $gl_amount_of_claim = floatval(preg_replace("/[^-0-9\.]/","", $productData['gl_amt_of_claims']['value']));
                                        } catch (\Exception $e) {
                                            $gl_amount_of_claim = null;
                                        }
                                    }
                                    $gl_date_of_loss = null;
                                    if (isset($productData['gl_date_of_loss']['value']) && !empty($productData['gl_date_of_loss']['value'])) {
                                        $gl_date_of_loss = Carbon::createFromFormat('m/d/Y', $productData['gl_date_of_loss']['value']);
                                    } else {
                                         $gl_date_of_loss = null;
                                    }



                                    $generalLiability = new GeneralLiabilityInformation();
                                    $generalLiability->client_info_id = $client_info_id;
                                    $generalLiability->profession = $profession;
                                    $generalLiability->specify_profession_if_others = $specify_profession_if_others;
                                    $generalLiability->annual_gross_receipt = $annual_gross_receipt;
                                    $generalLiability->residential = $residential;
                                    $generalLiability->commercial = $commercial;
                                    $generalLiability->new_construction = $new_construction;
                                    $generalLiability->repair_remodel = $repair_remodel;
                                    $generalLiability->detailed_descops = $detailed_descops;
                                    $generalLiability->multiple_state_work = $multiple_state_work;
                                    $generalLiability->cost_of_largest_project = $cost_of_largest_project;
                                    $generalLiability->full_time = $full_time;
                                    $generalLiability->part_time = $part_time;
                                    $generalLiability->payroll_amount = $payroll_amount;
                                    $generalLiability->does_using_subcontractor = $does_using_subcontractor;
                                    $generalLiability->subcon_cost = $subcon_cost;
                                    $generalLiability->gl_no_of_losses = $gl_no_of_losses;
                                    $generalLiability->gl_amount_of_claim = $gl_amount_of_claim;
                                    $generalLiability->gl_date_of_loss = $gl_date_of_loss;
                                    $doesGeneralLiabilitySaved = $generalLiability->save();

                                    if ($doesGeneralLiabilitySaved) {
                                        $GLProfessionName = $quoteModel->getProfessionById([(int)$productData['gl_profession']['value']]);

                                        $classcodesModel = new Classcodes();
                                        $filteredClasscodes = $classcodesModel->filterClasscodesWithQuestion([178, 184, 226, 190, 115, 188, 189, 114, 229, 119, 56, 196, 146, 51]);
                                        $templateData['glAdditionalQuestions'] = [];

                                        if (in_array((int) $profession, $filteredClasscodes)) {
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
                                                        DB::rollBack();
                                                        Log::error('Failed to insert glAdditionalQuestions record. Exception: ' . $e->getMessage());
                                                    }
                                                }
                                            }
                                        }

                                        $templateData['multipleStateWorks'] = [];
                                        foreach ($productDataStr as $key => $data) {
                                            if (strpos($key, 'gl_multiple_states_') === 0) {
                                                $counter = str_replace('gl_multiple_states_', '', $key);
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

                                                        Log::info('Successfully saved glMultipleStateWork record. Data: ' . json_encode($glMultipleStateWork));

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
                                    } else {
                                        Log::warning('Failed to insert GL Record: ' . $doesGeneralLiabilitySaved);
                                    }

                                    $templateData['GLProfessionName'] = $GLProfessionName;
                                    $templateData['glNoOfLosses'] = "";

                                    switch($generalLiability->gl_no_of_losses) {
                                        case '-1':
                                            $templateData['glNoOfLosses'] = "Have Losses";
                                            break;
                                        case '5':
                                            $templateData['glNoOfLosses'] = "5 yrs. No Losses";
                                            break;
                                        case '3':
                                            $templateData['glNoOfLosses'] = "3 yrs. No Losses";
                                            break;
                                        case '1':
                                            $templateData['glNoOfLosses'] = "1 yrs. No Losses";
                                            break;
                                        case '0':
                                            $templateData['glNoOfLosses'] = "No Losses";
                                            break;
                                    }
                                    $templateData['glDateOfLoss'] = $gl_date_of_loss === null ? '' : Carbon::createFromFormat('m/d/Y', $productData['gl_date_of_loss']['value'])->format('F j, Y');

                                    // $templateData['parsedCostProj5years'] = $parsedCostProj5years;
                                    // $templateData['parsedPayrollAmount'] = $parsedPayrollAmount;
                                    // $templateData['parsedSubconCost'] = $parsedSubconCost;
                                    $templateData['generalLiability'] = $generalLiability;
                                    // $templateData['productTypes'][] = 'gl';
                                    $templateData['stateAbbr'] = $stateAbbr;
                                    $templateData['clientInformation'] = $clientInformation;
                                    $html_body .= view('quote.quote-details', $templateData)->render();
                                    Log::info('Record inserted with id for GL: ' . $generalLiability->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert GL record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'wc':
                                try {
                                    $clientInfoId = $clientInformation->id;
                                    $gross_receipt = isset($productData['wc_gross_receipt']['value']) ? floatval(preg_replace("/[^-0-9\.]/","", $productData['wc_gross_receipt']['value'])) : null;
                                    $does_hire_subcontractor = isset($productData['wc_does_hire_subcon']['value']) ? $productData['wc_does_hire_subcon']['value'] : null;
                                    $subcontractor_cost_in_year = isset($productData['wc_subcon_cost_year']['value']) ? floatval(preg_replace("/[^-0-9\.]/","", $productData['wc_subcon_cost_year']['value'])) : null;
                                    $number_of_employee = isset($productData['wc_num_of_empl']['value']) ? $productData['wc_num_of_empl']['value'] : null;
                                    $wc_no_of_losses = isset($productData['wc_no_of_losses']['value']) ? $productData['wc_no_of_losses']['value'] : null;

                                    // $wc_amount_of_claim = isset($productData['wc_amt_of_claims']['value']) ? floatval(preg_replace("/[^-0-9\.]/","", $productData['wc_amt_of_claims']['value'])) : null;
                                    // $wc_date_of_loss = isset($productData['wc_date_of_loss']['value']) ? Carbon::createFromFormat('m/d/Y', $productData['wc_date_of_loss']['value'])->toDateString() : null;

                                    $wc_amount_of_claim = null;
                                    if (isset($productData['wc_amt_of_claims']['value']) && !empty($productData['wc_amt_of_claims']['value'])) {
                                        try {
                                            $wc_amount_of_claim = floatval(preg_replace("/[^-0-9\.]/","", $productData['wc_amt_of_claims']['value']));
                                        } catch (\Exception $e) {
                                            $wc_amount_of_claim = null;
                                        }
                                    }
                                    $wc_date_of_loss = null;
                                    if (isset($productData['wc_date_of_loss']['value']) && !empty($productData['wc_date_of_loss']['value'])) {
                                        $wc_date_of_loss = Carbon::createFromFormat('m/d/Y', $productData['wc_date_of_loss']['value']);
                                    } else {
                                         $wc_date_of_loss = null;
                                    }

                                    $workersCompensation = new WorkersCompensationInformation();
                                    $workersCompensation->client_info_id = $clientInfoId;
                                    $workersCompensation->gross_receipt = $gross_receipt;
                                    $workersCompensation->does_hire_subcontractor = $does_hire_subcontractor;
                                    $workersCompensation->subcontractor_cost_in_year = $subcontractor_cost_in_year;
                                    $workersCompensation->number_of_employee = $number_of_employee;
                                    $workersCompensation->wc_no_of_losses = $wc_no_of_losses;
                                    $workersCompensation->wc_amount_of_claim = $wc_amount_of_claim;
                                    $workersCompensation->wc_date_of_loss = $wc_date_of_loss;
                                    $doesWorkersCompensationSaved = $workersCompensation->save();

                                    if ($doesWorkersCompensationSaved) {
                                        $templateData['professionsInfo'] = [];
                                        foreach ($productDataStr as $key => $data) {
                                        if (strpos($key, 'wc_profession_') === 0) {
                                            $counter = str_replace('wc_profession_', '', $key);
                                            if (isset($productDataStr['wc_profession_' . $counter]) && !empty($productDataStr['wc_annual_payroll_' . $counter]['value'])) {
                                                DB::beginTransaction();
                                                try {
                                                    $profession = $productData['wc_profession_' . $counter]['value'];
                                                    $annual_payroll = floatval(preg_replace("/[^-0-9\.]/","", $productData['wc_annual_payroll_' . $counter]['value']));

                                                    $wcProfessionEntry = new WCProfessionEntry();
                                                    $wcProfessionEntry->wc_id = $workersCompensation->id;
                                                    $wcProfessionEntry->profession_id = $profession;
                                                    $wcProfessionEntry->annual_payroll_of_employee = $annual_payroll;
                                                    $wcProfessionEntry->save();

                                                    Log::info('Successfully saved wcProfessionEntry record. Data: ' . json_encode($wcProfessionEntry));

                                                    $wcProfessionName = $quoteModel->getProfessionById($productData['wc_profession_' . $counter]['value']);

                                                    $templateData['professionsInfo'][] = [
                                                        'counter' => $counter,
                                                        'professionName' => $wcProfessionName,
                                                        'annual_payroll' => $annual_payroll,
                                                    ];

                                                    DB::commit();
                                                } catch (\Exception $e) {
                                                    Log::error('Failed to insert wcProfessionEntry record. Exception: ' . $e->getMessage());
                                                }
                                            }
                                        }
                                        }

                                        $wcOwnersInfo = new WCOwnersInfo();
                                        DB::beginTransaction();
                                        try {
                                            $workersCompensationId = $workersCompensation->id;
                                            $owners_name = $productData['wc_name']['value'];
                                            $title_relationship = $productData['wc_title_relationship']['value'];
                                            $ownership_percentage = $productData['wc_ownership_perc']['value'];
                                            $excluded_or_included = $productData['wc_exc_inc']['value'];
                                            $ssn = $productData['wc_ssn']['value'];
                                            $fein = $productData['wc_fein']['value'];
                                            $owners_date_of_birth = Carbon::createFromFormat('m/d/Y', $productData['wc_dob']['value'])->toDateString();

                                            $wcOwnersInfo->wc_id = $workersCompensationId;
                                            $wcOwnersInfo->owners_name = $owners_name;
                                            $wcOwnersInfo->title_relationship = $title_relationship;
                                            $wcOwnersInfo->ownership_percentage = $ownership_percentage;
                                            $wcOwnersInfo->excluded_or_included = $excluded_or_included;
                                            $wcOwnersInfo->ssn = $ssn;
                                            $wcOwnersInfo->fein = $fein;
                                            $wcOwnersInfo->owners_date_of_birth = $owners_date_of_birth;
                                            $wcOwnersInfo->save();

                                            $ownersDobFormatted = Carbon::createFromFormat('m/d/Y', $productData['wc_dob']['value'])->format('F j, Y');
                                            $templateData['ownersDobFormatted'] = $ownersDobFormatted;
                                            $templateData['wcOwnersInfo'] = $wcOwnersInfo;
                                            Log::info('Successfully saved wcOwnersInfo record. Data: ' . json_encode($wcOwnersInfo));
                                            DB::commit();
                                        } catch (\Exception $e) {
                                            DB::rollBack();
                                            Log::error('Failed to insert wcOwnersInfo record. Exception: ' . $e->getMessage());
                                        }

                                        $templateData['ownersInfo'] = [];
                                        foreach ($productDataStr as $key => $data) {
                                            if (strpos($key, 'wc_name_') === 0) {
                                                $counter = str_replace('wc_name_', '', $key);

                                                if (isset($productDataStr['wc_name_' . $counter]['value']) && !empty($productDataStr['wc_title_relationship_' . $counter]['value']) && !empty($productDataStr['wc_ownership_perc_' . $counter]['value']) && !empty($productDataStr['wc_exc_inc_' . $counter]['value']) && !empty($productDataStr['wc_ssn_' . $counter]['value']) && !empty($productDataStr['wc_fein_' . $counter]['value']) && !empty($productDataStr['wc_dob_' . $counter]['value'])) {
                                                    $wcOwnersInfo = new WCOwnersInfo();

                                                    DB::beginTransaction();
                                                    try {

                                                        $owners_name = $productData['wc_name_' . $counter]['value'];
                                                        $title_relationship = $productData['wc_title_relationship_' . $counter]['value'];
                                                        $ownership_perc = $productData['wc_ownership_perc_' . $counter]['value'];
                                                        $excluded_included = $productData['wc_exc_inc_' . $counter]['value'];
                                                        $ssn = $productData['wc_ssn_' . $counter]['value'];
                                                        $fein = $productData['wc_fein_' . $counter]['value'];
                                                        $ownersDateOfBirth[$counter] = Carbon::createFromFormat('m/d/Y', $productData['wc_dob_' . $counter]['value'])->toDateString();

                                                        $wcOwnersInfo->wc_id = $workersCompensation->id;
                                                        $wcOwnersInfo->owners_name = $owners_name;
                                                        $wcOwnersInfo->title_relationship = $title_relationship;
                                                        $wcOwnersInfo->ownership_percentage = $ownership_perc;
                                                        $wcOwnersInfo->excluded_or_included = $excluded_included;
                                                        $wcOwnersInfo->ssn = $ssn;
                                                        $wcOwnersInfo->fein = $fein;
                                                        $wcOwnersInfo->owners_date_of_birth = $ownersDateOfBirth[$counter];
                                                        $wcOwnersInfo->save();

                                                        Log::info('Successfully saved wcOwnersInfo record. Data: ' . json_encode($wcOwnersInfo));

                                                        $templateData['ownersInfo'][] = [
                                                            // 'counter' => $counter,
                                                            'owners_name' => $owners_name,
                                                            'title_relationship' => $title_relationship,
                                                            'ownership_perc' => $ownership_perc,
                                                            'excluded_included' => $excluded_included,
                                                            'ssn' => $ssn,
                                                            'fein' => $fein,
                                                            'ownersDateOfBirth' => Carbon::createFromFormat('m/d/Y', $productData['wc_dob_' . $counter]['value'])->format('F j, Y'),
                                                        ];

                                                        DB::commit();
                                                    } catch (\Exception $e) {
                                                        DB::rollBack();
                                                        Log::error('Failed to insert wcOwnersInfo record. Exception: ' . $e->getMessage());
                                                    }
                                                }
                                            }
                                        }
                                    }

                                    $templateData['wcNoOfLosses'] = "";

                                    switch($workersCompensation->wc_no_of_losses) {
                                        case '-1':
                                            $templateData['wcNoOfLosses'] = "Have Losses";
                                            break;
                                        case '5':
                                            $templateData['wcNoOfLosses'] = "5 yrs. No Losses";
                                            break;
                                        case '3':
                                            $templateData['wcNoOfLosses'] = "3 yrs. No Losses";
                                            break;
                                        case '1':
                                            $templateData['wcNoOfLosses'] = "1 yrs. No Losses";
                                            break;
                                        case '0':
                                            $templateData['wcNoOfLosses'] = "No Losses";
                                            break;
                                    }

                                    // $templateData['wcDateOfLoss'] = Carbon::createFromFormat('m/d/Y', $productData['wc_date_of_loss']['value'])->format('F j, Y');

                                    $templateData['wcDateOfLoss'] = $wc_date_of_loss === null ? '' : Carbon::createFromFormat('m/d/Y', $productData['wc_date_of_loss']['value'])->format('F j, Y');
                                    $templateData['wcProfessionName'] = $wcProfessionName;
                                    $templateData['ownersDobFormatted'] = $ownersDobFormatted;
                                    $templateData['workersCompensation'] = $workersCompensation;
                                    // $templateData['productTypes'][] = 'wc';
                                    $templateData['clientInformation'] = $clientInformation;
                                    $html_body .= view('quote.quote-details', $templateData)->render();
                                    Log::info('Record inserted with id for WC: ' . $workersCompensation->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert WC record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'auto':
                                try {
                                    $client_info_id = $clientInformation->id;
                                    $are_you_driver = $productData['auto_are_you_the_driver']['value'];
                                    $client_full_name = $productData['auto_driver_full_name']['value'];
                                    $client_date_of_birth = Carbon::createFromFormat('m/d/Y', $productData['auto_driver_date_of_birth']['value']);
                                    $client_marital_status = $productData['auto_driver_marital_status']['value'];
                                    $client_spouse_name = isset($productData['auto_driver_spouse_name']['value']) ? $productData['auto_driver_spouse_name']['value'] : null;
                                    $client_spouse_date_of_birth = isset($productData['auto_driver_spouse_dob']['value']) ? Carbon::createFromFormat('m/d/Y', $productData['auto_driver_spouse_dob']['value']) : null;
                                    $client_license_no = $productData['auto_driver_license_no']['value'];
                                    $client_years_of_driving_exp = $productData['auto_driver_years_of_driving_exp']['value'];
                                    $no_of_vehicle = $productData['auto_add_vehicle']['value'];
                                    $no_of_drivers = $productData['auto_add_driver']['value'];
                                    $auto_no_of_losses = $productData['auto_no_of_losses']['value'];
                                    $auto_amount_of_claim = null;
                                    if (isset($productData['auto_amt_of_claims']['value']) && !empty($productData['auto_amt_of_claims']['value'])) {
                                        try {
                                            $auto_amount_of_claim = floatval(preg_replace("/[^-0-9\.]/","", $productData['auto_amt_of_claims']['value']));
                                        } catch (\Exception $e) {
                                            $auto_amount_of_claim = null;
                                        }
                                    }
                                    $auto_date_of_loss = null;
                                    if (isset($productData['auto_date_of_loss']['value']) && !empty($productData['auto_date_of_loss']['value'])) {
                                        $auto_date_of_loss = Carbon::createFromFormat('m/d/Y', $productData['auto_date_of_loss']['value']);
                                    } else {
                                         $auto_date_of_loss = null;
                                    }

                                    $commercialAuto = new CommercialAutoInformation();
                                    $commercialAuto->client_info_id = $client_info_id;
                                    $commercialAuto->are_you_driver = $are_you_driver;
                                    $commercialAuto->client_full_name = $client_full_name;
                                    $commercialAuto->client_date_of_birth = $client_date_of_birth;
                                    $commercialAuto->client_marital_status = $client_marital_status;
                                    $commercialAuto->client_spouse_name = $client_spouse_name;
                                    $commercialAuto->client_spouse_date_of_birth = $client_spouse_date_of_birth;
                                    $commercialAuto->client_license_no = $client_license_no;
                                    $commercialAuto->client_years_of_driving_exp = $client_years_of_driving_exp;
                                    $commercialAuto->no_of_vehicle = $no_of_vehicle;
                                    $commercialAuto->no_of_drivers = $no_of_drivers;
                                    $commercialAuto->auto_no_of_losses = $auto_no_of_losses;
                                    $commercialAuto->auto_amount_of_claim = $auto_amount_of_claim;
                                    $commercialAuto->auto_date_of_loss = $auto_date_of_loss;
                                    $doesCommercialAutoSaved = $commercialAuto->save();

                                    if ($doesCommercialAutoSaved) {
                                        $templateData['driversSpouseDateOfBirthFormatted'] = Carbon::createFromFormat('m/d/Y', $productData['auto_driver_spouse_dob']['value'])->format('F j, Y');
                                        $templateData['autoVehiclesInfo'] = [];
                                        foreach ($productDataStr as $key => $data) {
                                            if (strpos($key, 'auto_vehicle_year_') === 0) {
                                                $counter = str_replace('auto_vehicle_year_', '', $key);

                                                if (isset($productDataStr['auto_vehicle_year_'.$counter]['value']) && isset($productDataStr['auto_vehicle_maker_'.$counter]['value']) && isset($productDataStr['auto_vehicle_model_'.$counter]['value']) && isset($productDataStr['auto_vehicle_vin_'.$counter]['value']) && isset($productDataStr['auto_vehicle_mileage_'.$counter]['value']) && isset($productDataStr['auto_vehicle_garage_add_'.$counter]['value']) && isset($productDataStr['auto_vehicle_coverage_limits_'.$counter]['value'])) {
                                                    $vehicleEntry = new CommercialAutoVehicles();

                                                    DB::beginTransaction();
                                                    try {
                                                        $year = $productData['auto_vehicle_year_' . $counter]['value'];
                                                        $maker = $productData['auto_vehicle_maker_' . $counter]['value'];
                                                        $model = $productData['auto_vehicle_model_' . $counter]['value'];
                                                        $vin = $productData['auto_vehicle_vin_' . $counter]['value'];
                                                        $mileage_radius = $productData['auto_vehicle_mileage_' . $counter]['value'];
                                                        $garage_address = $productData['auto_vehicle_garage_add_' . $counter]['value'];
                                                        $coverage_limits = floatval(preg_replace("/[^-0-9\.]/","",  $productData['auto_vehicle_coverage_limits_'.$counter]['value']));

                                                        $vehicleEntry->comm_auto_id = $commercialAuto->id;
                                                        $vehicleEntry->year = $year;
                                                        $vehicleEntry->maker = $maker;
                                                        $vehicleEntry->model = $model;
                                                        $vehicleEntry->vin = $vin;
                                                        $vehicleEntry->mileage_radius = $mileage_radius;
                                                        $vehicleEntry->garage_address = $garage_address;
                                                        $vehicleEntry->coverage_limits = $coverage_limits;
                                                        $vehicleEntry->save();

                                                        Log::info('Successfully saved vehicleEntry record. Data: ' . json_encode($vehicleEntry));

                                                        $templateData['autoVehiclesInfo'][] = [
                                                            'counter' => $counter,
                                                            'year' => $year,
                                                            'maker' => $maker,
                                                            'model' => $model,
                                                            'vin' => $vin,
                                                            'mileage_radius' => $mileage_radius,
                                                            'garage_address' => $garage_address,
                                                            'coverage_limits' => $coverage_limits,
                                                        ];

                                                        DB::commit();
                                                    } catch (\Exception $e) {
                                                        DB::rollBack();
                                                        Log::error('Failed to insert vehicleEntry record. Exception: ' . $e->getMessage());
                                                    }
                                                }
                                            }
                                        }

                                        $templateData['autoDriversInfo'] = [];
                                        foreach ($productDataStr as $key => $data) {
                                            if (strpos($key, 'auto_add_drivers_name_') === 0) {
                                                $counter = str_replace('auto_add_drivers_name_', '', $key);
                                                // dd($counter);
                                                if (isset($productDataStr['auto_add_drivers_name_'.$counter]['value']) && isset($productDataStr['auto_add_driver_lic_'.$counter]['value']) && isset($productDataStr['auto_add_driver_mileage_radius_'.$counter]['value']) && isset($productDataStr['auto_add_driver_date_birth_'.$counter]['value']) && isset($productDataStr['auto_add_driver_civil_status_'.$counter]['value']) && isset($productDataStr['auto_add_driver_spouse_name_'.$counter]['value']) && isset($productDataStr['auto_add_driver_spouse_dob_'.$counter]['value'])) {
                                                    $driverEntry = new CommercialAutoDrivers();
                                                    DB::beginTransaction();
                                                    try {
                                                        $drivers_name = $productData['auto_add_drivers_name_' . $counter]['value'];
                                                        $drivers_license_number = $productData['auto_add_driver_lic_' . $counter]['value'];
                                                        $mileage_radius = $productData['auto_add_driver_mileage_radius_' . $counter]['value'];
                                                        $date_of_birth = isset($productData['auto_add_driver_date_birth_' . $counter]['value']) ? Carbon::createFromFormat('m/d/Y', $productData['auto_add_driver_date_birth_' . $counter]['value']) : null;
                                                        $civil_status = $productData['auto_add_driver_civil_status_' . $counter]['value'];
                                                        $spouse_name = isset($productData['auto_add_driver_spouse_name_' . $counter]['value']) ? $productData['auto_add_driver_spouse_name_' . $counter]['value'] : null;
                                                        $spouse_date_of_birth = isset($productData['auto_add_driver_spouse_dob_' . $counter]['value']) ? Carbon::createFromFormat('m/d/Y', $productData['auto_add_driver_spouse_dob_' . $counter]['value']) : null;

                                                        $driverEntry->comm_auto_id = $commercialAuto->id;
                                                        $driverEntry->drivers_name = $drivers_name;
                                                        $driverEntry->drivers_license_number = $drivers_license_number;
                                                        $driverEntry->mileage_radius = $mileage_radius;
                                                        $driverEntry->date_of_birth = $date_of_birth;
                                                        $driverEntry->civil_status = $civil_status;
                                                        $driverEntry->spouse_name = $spouse_name;
                                                        $driverEntry->spouse_date_of_birth = $spouse_date_of_birth;
                                                        $driverEntry->save();

                                                        Log::info('Successfully saved driverEntry record. Data: ' . json_encode($driverEntry));

                                                        $templateData['autoDriversInfo'][] = [
                                                            'counter' => $counter,
                                                            'drivers_name' => $drivers_name,
                                                            'drivers_license_number' => $drivers_license_number,
                                                            'mileage_radius' => $mileage_radius,
                                                            'date_of_birth' => Carbon::createFromFormat('m/d/Y', $productData['auto_add_driver_date_birth_' . $counter])->format('F j, Y'),
                                                            'civil_status' => $civil_status,
                                                            'spouse_name' => $spouse_name,
                                                            'spouse_date_of_birth' => Carbon::createFromFormat('m/d/Y', $productData['auto_add_driver_spouse_dob_' . $counter])->format('F j, Y'),
                                                        ];

                                                        DB::commit();
                                                    } catch (\Exception $e) {
                                                        DB::rollBack();
                                                        Log::error('Failed to insert driverEntry record. Exception: ' . $e->getMessage());
                                                    }
                                                }
                                            }
                                        }
                                    }

                                    $templateData['autoNoOfLosses'] = "";

                                    switch($commercialAuto->auto_no_of_losses) {
                                        case '-1':
                                            $templateData['autoNoOfLosses'] = "Have Losses";
                                            break;
                                        case '5':
                                            $templateData['autoNoOfLosses'] = "5 yrs. No Losses";
                                            break;
                                        case '3':
                                            $templateData['autoNoOfLosses'] = "3 yrs. No Losses";
                                            break;
                                        case '1':
                                            $templateData['autoNoOfLosses'] = "1 yrs. No Losses";
                                            break;
                                        case '0':
                                            $templateData['autoNoOfLosses'] = "No Losses";
                                            break;
                                    }

                                    $templateData['autoDateOfLoss'] = $auto_date_of_loss === null ? '' : Carbon::createFromFormat('m/d/Y', $productData['auto_date_of_loss']['value'])->format('F j, Y');
                                    $templateData['clientDateOfBirth'] = $client_date_of_birth;
                                    $templateData['commercialAuto'] = $commercialAuto;
                                    // $templateData['productTypes'][] = 'auto';
                                    $templateData['clientInformation'] = $clientInformation;
                                    $html_body .= view('quote.quote-details', $templateData)->render();
                                    Log::info('Record inserted with id for AUTO: ' . $commercialAuto->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert AUTO record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'bond':
                                try {
                                    $client_info_id = $clientInformation->id;
                                    $owners_name = $productData['bond_owners_name']['value'];
                                    $ssn = $productData['bond_owners_ssn']['value'];
                                    $date_of_birth = Carbon::createFromFormat('m/d/Y', $productData['bond_owners_dob']['value']);
                                    $civil_status = $productData['bond_owners_civil_status']['value'];
                                    $spouse_name = isset($productData['bond_owners_spouse_name']['value']) ? $productData['bond_owners_spouse_name']['value'] : null;
                                    $spouse_date_of_birth = isset($productData['bond_owners_spouse_dob']['value']) ? Carbon::createFromFormat('m/d/Y', $productData['bond_owners_spouse_dob']['value']) : null;
                                    $spouse_ssn = isset($productData['bond_owners_spouse_ssn']['value']) ? $productData['bond_owners_spouse_ssn']['value'] : null;
                                    $type_of_bond_requested = $productData['bond_type_bond_requested']['value'];
                                    $amount_of_bond = floatval(preg_replace("/[^-0-9\.]/","", $productData['bond_amount_of_bond']['value']));
                                    $term_of_bond = $productData['bond_term_of_bond']['value'];
                                    $type_of_license = $productData['bond_type_of_license']['value'];
                                    $if_other_type_of_license = isset($productData['bond_if_other_type_of_license']['value']) ? $productData['bond_if_other_type_of_license']['value'] : null;
                                    $license_number_or_application_number = $productData['bond_license_or_application_no']['value'];
                                    $effective_date = Carbon::createFromFormat('m/d/Y', $productData['bond_effective_date']['value']);
                                    $bond_no_of_losses = $productData['bond_no_of_losses']['value'];
                                    $bond_amount_of_claim = null;
                                    if (isset($productData['bond_amt_of_claims']['value']) && !empty($productData['bond_amt_of_claims']['value'])) {
                                        try {
                                            $bond_amount_of_claim = floatval(preg_replace("/[^-0-9\.]/","", $productData['bond_amt_of_claims']['value']));
                                        } catch (\Exception $e) {
                                            $bond_amount_of_claim = null;
                                        }
                                    }
                                    $bond_date_of_loss = null;
                                    if (isset($productData['bond_date_of_loss']['value']) && !empty($productData['bond_date_of_loss']['value'])) {
                                        $bond_date_of_loss = Carbon::createFromFormat('m/d/Y', $productData['bond_date_of_loss']['value']);
                                    } else {
                                         $bond_date_of_loss = null;
                                    }

                                    DB::beginTransaction();
                                    try {
                                        $licenseBond = new LicenseBondInformation();
                                        $licenseBond->client_info_id = $client_info_id;
                                        $licenseBond->owners_name = $owners_name;
                                        $licenseBond->ssn = $ssn;
                                        $licenseBond->date_of_birth = $date_of_birth;
                                        $licenseBond->civil_status = $civil_status;
                                        $licenseBond->spouse_name = $spouse_name;
                                        $licenseBond->spouse_date_of_birth = $spouse_date_of_birth;
                                        $licenseBond->spouse_ssn = $spouse_ssn;
                                        $licenseBond->type_of_bond_requested = $type_of_bond_requested;
                                        $licenseBond->amount_of_bond = $amount_of_bond;
                                        $licenseBond->term_of_bond = $term_of_bond;
                                        $licenseBond->type_of_license = $type_of_license;
                                        $licenseBond->if_other_type_of_license = $if_other_type_of_license;
                                        $licenseBond->license_number_or_application_number = $license_number_or_application_number;
                                        $licenseBond->effective_date = $effective_date;
                                        $licenseBond->bond_no_of_losses = $bond_no_of_losses;
                                        $licenseBond->bond_amount_of_claim = $bond_amount_of_claim;
                                        $licenseBond->bond_date_of_loss = $bond_date_of_loss;
                                        $doesLicenseBondSaved = $licenseBond->save();

                                        Log::info('Successfully saved LicenseBondInformation record. Data: ' . json_encode($doesLicenseBondSaved));
                                        DB::commit();
                                    } catch (\Exception $e) {
                                        DB::rollBack();
                                        Log::error('Failed to insert LicenseBondInformation record. Exception: ' . $e->getMessage());

                                    }

                                    $templateData['bondNoOfLosses'] = "";

                                    switch($licenseBond->bond_no_of_losses) {
                                        case '-1':
                                            $templateData['bondNoOfLosses'] = "Have Losses";
                                            break;
                                        case '5':
                                            $templateData['bondNoOfLosses'] = "5 yrs. No Losses";
                                            break;
                                        case '3':
                                            $templateData['bondNoOfLosses'] = "3 yrs. No Losses";
                                            break;
                                        case '1':
                                            $templateData['bondNoOfLosses'] = "1 yrs. No Losses";
                                            break;
                                        case '0':
                                            $templateData['bondNoOfLosses'] = "No Losses";
                                            break;
                                    }

                                    // $templateData['bondDateOfLoss'] = Carbon::createFromFormat('m/d/Y', $productData['bond_date_of_loss']['value'])->format('F j, Y');
                                    $templateData['bondDateOfLoss'] = $bond_date_of_loss === null ? '' : Carbon::createFromFormat('m/d/Y', $productData['bond_date_of_loss']['value'])->format('F j, Y');
                                    $templateData['licenseBond'] = $licenseBond;
                                    $templateData['ownersDobFormatted'] = Carbon::createFromFormat('m/d/Y', $productData['bond_owners_dob']['value'])->format('F j, Y');
                                    $templateData['spouseDobFormatted'] = $spouse_date_of_birth === null ? '' : Carbon::createFromFormat('m/d/Y', $productData['bond_owners_spouse_dob']['value'])->format('F j, Y');
                                    $templateData['bondEffDateFormatted'] = Carbon::createFromFormat('m/d/Y', $productData['bond_effective_date']['value'])->format('F j, Y');
                                    // $templateData['productTypes'][] = 'bond';
                                    $templateData['clientInformation'] = $clientInformation;
                                    $html_body .= view('quote.quote-details', $templateData)->render();
                                    Log::info('Record inserted with id for BOND: ' . $licenseBond->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert BOND record. Exception: ', ['exception' => $e]);
                                }
                                break;
                            case 'excess':
                                try {
                                    $client_info_id = $clientInformation->id;
                                    $excess_limits = floatval(preg_replace("/[^-0-9\.]/","", $productData['excess_limits']['value']));
                                    $gl_effective_date = Carbon::createFromFormat('m/d/Y', $productData['excess_gl_eff_date']['value'])->toDateString();
                                    $insurance_carrier = $productData['excess_insurance_carrier']['value'];
                                    $policy_number_or_quote_number = $productData['excess_policy_or_quote_no']['value'];
                                    $policy_premium = floatval(preg_replace("/[^-0-9\.]/","", $productData['excess_policy_premium']['value']));
                                    $effective_date = Carbon::createFromFormat('m/d/Y', $productData['excess_effective_date']['value'])->toDateString();
                                    $expiration_date = Carbon::createFromFormat('m/d/Y', $productData['excess_expiration_date']['value'])->toDateString();
                                    $excess_no_of_losses = $productData['excess_no_of_losses']['value'];
                                    $excess_amount_of_claim = null;
                                    if (isset($productData['excess_amt_of_claims']['value']) && !empty($productData['excess_amt_of_claims']['value'])) {
                                        try {
                                            $excess_amount_of_claim = floatval(preg_replace("/[^-0-9\.]/","", $productData['excess_amt_of_claims']['value']));
                                        } catch (\Exception $e) {
                                            $excess_amount_of_claim = null;
                                        }
                                    }
                                    $excess_date_of_loss = null;
                                    if (isset($productData['excess_date_of_loss']['value']) && !empty($productData['excess_date_of_loss']['value'])) {
                                        $excess_date_of_loss = Carbon::createFromFormat('m/d/Y', $productData['excess_date_of_loss']['value']);
                                    } else {
                                         $excess_date_of_loss = null;
                                    }

                                    $excessLiability = new ExcessLiabilityInformation();
                                    $excessLiability->client_info_id = $client_info_id;
                                    $excessLiability->excess_limits = $excess_limits;
                                    $excessLiability->gl_effective_date = $gl_effective_date;
                                    $excessLiability->insurance_carrier = $insurance_carrier;
                                    $excessLiability->policy_number_or_quote_number = $policy_number_or_quote_number;
                                    $excessLiability->policy_premium = $policy_premium;
                                    $excessLiability->effective_date = $effective_date;
                                    $excessLiability->expiration_date = $expiration_date;
                                    $excessLiability->excess_no_of_losses = $excess_no_of_losses;
                                    $excessLiability->excess_amount_of_claim = $excess_amount_of_claim;
                                    $excessLiability->excess_date_of_loss = $excess_date_of_loss;
                                    $excessLiability->save();

                                    $templateData['excessNoOfLosses'] = "";

                                    switch($excessLiability->excess_no_of_losses) {
                                        case '-1':
                                            $templateData['excessNoOfLosses'] = "Have Losses";
                                            break;
                                        case '5':
                                            $templateData['excessNoOfLosses'] = "5 yrs. No Losses";
                                            break;
                                        case '3':
                                            $templateData['excessNoOfLosses'] = "3 yrs. No Losses";
                                            break;
                                        case '1':
                                            $templateData['excessNoOfLosses'] = "1 yrs. No Losses";
                                            break;
                                        case '0':
                                            $templateData['excessNoOfLosses'] = "No Losses";
                                            break;
                                    }

                                    // $templateData['excessDateOfLoss'] = Carbon::createFromFormat('m/d/Y', $productData['excess_date_of_loss']['value'])->format('F j, Y');
                                    $templateData['excessDateOfLoss'] = $excess_date_of_loss === null ? '' : Carbon::createFromFormat('m/d/Y', $productData['excess_date_of_loss']['value'])->format('F j, Y');
                                    $templateData['excessGLEffectiveDateFormatted'] = Carbon::createFromFormat('m/d/Y', $productData['excess_gl_eff_date']['value'])->format('F j, Y');
                                    $templateData['excessEffectiveDateFormatted'] = Carbon::createFromFormat('m/d/Y', $productData['excess_effective_date']['value'])->format('F j, Y');
                                    $templateData['excessExpirationDateFormatted'] = Carbon::createFromFormat('m/d/Y', $productData['excess_expiration_date']['value'])->format('F j, Y');
                                    $templateData['excessLiability'] = $excessLiability;
                                    // $templateData['productTypes'][] = 'excess';
                                    $templateData['clientInformation'] = $clientInformation;
                                    $html_body .= view('quote.quote-details', $templateData)->render();
                                    Log::info('Record inserted with id for EXCESS: ' . $excessLiability->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert EXCESS record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'tools':
                                try {
                                    $client_info_id = $clientInformation->id;
                                    $misc_tools = floatval(preg_replace("/[^-0-9\.]/","", $productData['tools_misc_tools']['value']));
                                    $rented_or_leased_equipment = floatval(preg_replace("/[^-0-9\.]/","", $productData['tools_rented_or_leased_amt']['value']));
                                    $scheduled_equipment = floatval(preg_replace("/[^-0-9\.]/","", $productData['tools_sched_equipment']['value']));
                                    $equipment_type = $productData['tools_equipment_type']['value'];
                                    $year = $productData['tools_equipment_year']['value'];
                                    $maker = $productData['tools_equipment_make']['value'];
                                    $model = $productData['tools_equipment_model']['value'];
                                    $vin = $productData['tools_equipment_vin_or_serial_no']['value'];
                                    $valuation = $productData['tools_equipment_valuation']['value'];
                                    $tools_no_of_losses = $productData['tools_equipment_no_of_losses']['value'];

                                    $tools_amount_of_claim = null;
                                    if (isset($productData['tools_amt_of_claims']['value']) && !empty($productData['tools_amt_of_claims']['value'])) {
                                        try {
                                            $tools_amount_of_claim = floatval(preg_replace("/[^-0-9\.]/","", $productData['tools_amt_of_claims']['value']));
                                        } catch (\Exception $e) {
                                            $tools_amount_of_claim = null;
                                        }
                                    }
                                    $tools_date_of_loss = null;
                                    if (isset($productData['tools_date_of_loss']['value']) && !empty($productData['tools_date_of_loss']['value'])) {
                                        $tools_date_of_loss = Carbon::createFromFormat('m/d/Y', $productData['tools_date_of_loss']['value']);
                                    } else {
                                         $tools_date_of_loss = null;
                                    }

                                    $toolsEquipmentsLiability = new ToolsEquipmentInformation();
                                    $toolsEquipmentsLiability->client_info_id = $client_info_id;
                                    $toolsEquipmentsLiability->misc_tools = $misc_tools;
                                    $toolsEquipmentsLiability->rented_or_leased_equipment = $rented_or_leased_equipment;
                                    $toolsEquipmentsLiability->scheduled_equipment = $scheduled_equipment;
                                    $toolsEquipmentsLiability->equipment_type = $equipment_type;
                                    $toolsEquipmentsLiability->year = $year;
                                    $toolsEquipmentsLiability->maker = $maker;
                                    $toolsEquipmentsLiability->model = $model;
                                    $toolsEquipmentsLiability->vin = $vin;
                                    $toolsEquipmentsLiability->valuation = $valuation;
                                    $toolsEquipmentsLiability->tools_no_of_losses = $tools_no_of_losses;
                                    $toolsEquipmentsLiability->tools_amount_of_claim = $tools_amount_of_claim;
                                    $toolsEquipmentsLiability->tools_date_of_loss = $tools_date_of_loss;
                                    $toolsEquipmentsLiability->save();

                                    $templateData['toolsNoOfLosses'] = "";

                                    switch($toolsEquipmentsLiability->tools_no_of_losses) {
                                        case '-1':
                                            $templateData['toolsNoOfLosses'] = "Have Losses";
                                            break;
                                        case '5':
                                            $templateData['toolsNoOfLosses'] = "5 yrs. No Losses";
                                            break;
                                        case '3':
                                            $templateData['toolsNoOfLosses'] = "3 yrs. No Losses";
                                            break;
                                        case '1':
                                            $templateData['toolsNoOfLosses'] = "1 yrs. No Losses";
                                            break;
                                        case '0':
                                            $templateData['toolsNoOfLosses'] = "No Losses";
                                            break;
                                    }

                                    // $templateData['toolsDateOfLoss'] = Carbon::createFromFormat('m/d/Y', $productData['tools_date_of_loss']['value'])->format('F j, Y');
                                    $templateData['toolsDateOfLoss'] = $tools_date_of_loss === null ? '' : Carbon::createFromFormat('m/d/Y', $productData['tools_date_of_loss']['value'])->format('F j, Y');
                                    $templateData['toolsEquipmentsLiability'] = $toolsEquipmentsLiability;
                                    // $templateData['productTypes'][] = 'tools';
                                    $templateData['clientInformation'] = $clientInformation;
                                    $html_body .= view('quote.quote-details', $templateData)->render();
                                    Log::info('Record inserted with id for TOOLS: ' . $toolsEquipmentsLiability->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert TOOLS record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'br':
                                try {
                                    $client_info_id = $clientInformation->id;
                                    $property_address = $productData['br_property_address']['value'];
                                    $value_of_existing_structure = floatval(preg_replace("/[^-0-9\.]/","", $productData['br_value_of_existing_structure']['value']));
                                    $value_of_work_being_performed = floatval(preg_replace("/[^-0-9\.]/","", $productData['br_value_of_work_performed']['value']));
                                    $period_of_insurance_or_duration_of_project = $productData['br_period_duration_project']['value'];
                                    $construction_type = $productData['br_construction_type']['value'];
                                    $complete_descops = $productData['br_complete_descops_of_project']['value'];
                                    $square_footage = $productData['br_sq_footage']['value'];
                                    $number_of_floors = $productData['br_number_of_floors']['value'];
                                    $number_of_units_dwelling = $productData['br_number_of_units_dwelling']['value'];
                                    $what_is_anticipated_occupancy = $productData['br_anticipated_occupancy']['value'];
                                    $last_update_to_roofing_year = $productData['br_last_update_to_roofing_year']['value'];
                                    $last_update_to_heating_year = $productData['br_last_update_to_heating_year']['value'];
                                    $last_update_to_electrical_year = $productData['br_last_update_to_electrical_year']['value'];
                                    $last_update_to_plumbing_year = $productData['br_last_update_to_plumbing_year']['value'];
                                    $distance_to_nearest_fire_hydrant = $productData['br_distance_to_nearest_fire_hydrant']['value'];
                                    $distance_to_nearest_fire_station = $productData['br_distance_to_nearest_fire_station']['value'];
                                    $will_structure_be_occupied_during_renovation = $productData['br_structure_occupied_remodel_renovation']['value'];
                                    $when_was_structure_built = Carbon::createFromFormat('m/d/Y', $productData['br_when_structure_built']['value']);
                                    $jobsite_security = $productData['br_jobsite_security']['value'];
                                    $does_scheduled_property_address_builders_risk_coverage = $productData['br_scheduled_property_address_builders_risk_coverage']['value'];
                                    $carrier_name = isset($productData['br_sched_property_carrier_name']['value']) ? $productData['br_sched_property_carrier_name']['value'] : null;
                                    $br_no_of_losses = $productData['br_no_of_losses']['value'];

                                    $br_amount_of_claim = null;
                                    if (isset($productData['br_amt_of_claim']['value']) && !empty($productData['br_amt_of_claim']['value'])) {
                                        try {
                                            $br_amount_of_claim = floatval(preg_replace("/[^-0-9\.]/","", $productData['br_amt_of_claim']['value']));
                                        } catch (\Exception $e) {
                                            $br_amount_of_claim = null;
                                        }
                                    }
                                    $br_date_of_loss = null;
                                    if (isset($productData['br_date_of_loss']['value']) && !empty($productData['br_date_of_loss']['value'])) {
                                        $br_date_of_loss = Carbon::createFromFormat('m/d/Y', $productData['br_date_of_loss']['value']);
                                    } else {
                                         $br_date_of_loss = null;
                                    }

                                    $buildersRiskLiability = new BuildersRiskInformation();
                                    $buildersRiskLiability->client_info_id = $client_info_id;
                                    $buildersRiskLiability->property_address = $property_address;
                                    $buildersRiskLiability->value_of_existing_structure = $value_of_existing_structure;
                                    $buildersRiskLiability->value_of_work_being_performed = $value_of_work_being_performed;
                                    $buildersRiskLiability->period_of_insurance_or_duration_of_project = $period_of_insurance_or_duration_of_project;
                                    $buildersRiskLiability->construction_type = $construction_type;
                                    $buildersRiskLiability->complete_descops = $complete_descops;
                                    $buildersRiskLiability->square_footage = $square_footage;
                                    $buildersRiskLiability->number_of_floors = $number_of_floors;
                                    $buildersRiskLiability->number_of_units_dwelling = $number_of_units_dwelling;
                                    $buildersRiskLiability->what_is_anticipated_occupancy = $what_is_anticipated_occupancy;
                                    $buildersRiskLiability->last_update_to_roofing_year = $last_update_to_roofing_year;
                                    $buildersRiskLiability->last_update_to_heating_year = $last_update_to_heating_year;
                                    $buildersRiskLiability->last_update_to_electrical_year = $last_update_to_electrical_year;
                                    $buildersRiskLiability->last_update_to_plumbing_year = $last_update_to_plumbing_year;
                                    $buildersRiskLiability->distance_to_nearest_fire_hydrant = $distance_to_nearest_fire_hydrant;
                                    $buildersRiskLiability->distance_to_nearest_fire_station = $distance_to_nearest_fire_station;
                                    $buildersRiskLiability->will_structure_be_occupied_during_renovation = $will_structure_be_occupied_during_renovation;
                                    $buildersRiskLiability->when_was_structure_built = $when_was_structure_built;
                                    $buildersRiskLiability->jobsite_security = $jobsite_security;
                                    $buildersRiskLiability->does_scheduled_property_address_builders_risk_coverage = $does_scheduled_property_address_builders_risk_coverage;
                                    $buildersRiskLiability->carrier_name = $carrier_name;

                                    $effectiveDateValue = $productData['br_sched_property_effective_date']['value'] ?? null;
                                    if ($effectiveDateValue) {
                                        if (preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $effectiveDateValue)) {
                                            // The date is in 'Y-m-d H:i:s' format, use directly
                                            $buildersRiskLiability->effective_date = $effectiveDateValue;
                                        } else {
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
                                            $buildersRiskLiability->expiration_date = $expirationDateValue;
                                        } else {
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
                                    $buildersRiskLiability->br_no_of_losses = $br_no_of_losses;
                                    $buildersRiskLiability->br_amount_of_claim = $br_amount_of_claim;
                                    $buildersRiskLiability->br_date_of_loss = $br_date_of_loss;
                                    $buildersRiskLiability->save();

                                    $templateData['brNoOfLosses'] = "";

                                    switch($buildersRiskLiability->br_no_of_losses) {
                                        case '-1':
                                            $templateData['brNoOfLosses'] = "Have Losses";
                                            break;
                                        case '5':
                                            $templateData['brNoOfLosses'] = "5 yrs. No Losses";
                                            break;
                                        case '3':
                                            $templateData['brNoOfLosses'] = "3 yrs. No Losses";
                                            break;
                                        case '1':
                                            $templateData['brNoOfLosses'] = "1 yrs. No Losses";
                                            break;
                                        case '0':
                                            $templateData['brNoOfLosses'] = "No Losses";
                                            break;
                                    }

                                    $templateData['brStructureBuilt'] = Carbon::createFromFormat('m/d/Y', $productData['br_when_structure_built']['value'])->format('F j, Y');
                                    $templateData['brWhenWillProjectStart'] = $whenProjectStart === null ? '' : Carbon::createFromFormat('m/d/Y', $productData['br_when_will_project_start']['value'])->format('F j, Y');
                                    $templateData['brWhenHasProjectStarted'] = $whenHasProjectStarted === null ? '' : Carbon::createFromFormat('m/d/Y', $productData['br_when_project_started']['value'])->format('F j, Y');
                                    $templateData['brDateOfLoss'] = $br_date_of_loss === null ? '' : Carbon::createFromFormat('m/d/Y', $productData['br_date_of_loss']['value'])->format('F j, Y');
                                    $templateData['brEffDateFormatted'] =  Carbon::createFromFormat('m/d/Y', $productData['br_sched_property_effective_date']['value'])->format('F j, Y');
                                    $templateData['brExpDateFormatted'] =  Carbon::createFromFormat('m/d/Y', $productData['br_sched_property_expiration_date']['value'])->format('F j, Y');
                                    $templateData['buildersRiskLiability'] = $buildersRiskLiability;
                                    // $templateData['productTypes'][] = 'br';
                                    $templateData['clientInformation'] = $clientInformation;
                                    $html_body .= view('quote.quote-details', $templateData)->render();
                                    Log::info('Record inserted with id for BR: ' . $buildersRiskLiability->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert BR record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'bop':
                                try {
                                    $client_info_id = $clientInformation->id;
                                    $property_address = $productData['bop_property_address']['value'];
                                    $loss_payee_information = $productData['bop_loss_payee_info']['value'];
                                    $building_industry = $productData['bop_building_industry']['value'];
                                    $who_owns_building = $productData['bop_occupancy']['value'];
                                    $value_of_cost_building = isset($productData['bop_val_cost_bldg']['value']) ? floatval(preg_replace("/[^-0-9\.]/","", $productData['bop_val_cost_bldg']['value'])) : null;
                                    $business_property_limit = isset($productData['bop_business_property_limit']['value']) ? floatval(preg_replace("/[^-0-9\.]/","", $productData['bop_business_property_limit']['value'])) : null;
                                    $building_construction_type = $productData['bop_bldg_construction_type']['value'];
                                    $year_built = $productData['bop_year_built']['value'];
                                    $no_of_stories = $productData['bop_no_of_stories']['value'];
                                    $total_building_sq_ft = $productData['bop_total_bldg_sqft']['value'];
                                    $automatic_sprinkler_system = $productData['bop_automatic_sprinkler_system']['value'];
                                    $automatic_file_alarm = $productData['bop_automatic_fire_alarm']['value'];
                                    $distance_nearest_fire_hydrant = $productData['bop_distance_nearest_fire_hydrant']['value'];
                                    $distance_nearest_fire_station = $productData['bop_distance_nearest_fire_station']['value'];
                                    $automatic_commercial_cooking_extinguish_system = $productData['bop_automatic_comm_cooking_ext']['value'];
                                    $automatic_burglar_alarm = $productData['bop_automatic_burglar_alarm']['value'];
                                    $security_cameras = $productData['bop_security_cameras']['value'];
                                    $last_update_to_roofing_year = $productData['bop_last_update_roofing_year']['value'];
                                    $last_update_to_heating_year = $productData['bop_last_update_heating_year']['value'];
                                    $last_update_to_electrical_year = $productData['bop_last_update_electrical_year']['value'];
                                    $last_update_to_plumbing_year = $productData['bop_last_update_plumbing_year']['value'];
                                    $bop_no_of_losses = $productData['bop_no_of_losses']['value'];

                                    $bop_amount_of_claim = null;
                                    if (isset($productData['bop_amt_of_claims']['value']) && !empty($productData['bop_amt_of_claims']['value'])) {
                                        try {
                                            $bop_amount_of_claim = floatval(preg_replace("/[^-0-9\.]/","", $productData['bop_amt_of_claims']['value']));
                                        } catch (\Exception $e) {
                                            $bop_amount_of_claim = null;
                                        }
                                    }
                                    $bop_date_of_loss = null;
                                    if (isset($productData['bop_date_of_loss']['value']) && !empty($productData['bop_date_of_loss']['value'])) {
                                        $bop_date_of_loss = Carbon::createFromFormat('m/d/Y', $productData['bop_date_of_loss']['value']);
                                    } else {
                                         $bop_date_of_loss = null;
                                    }

                                    $businessOwnersPolicy = new BOPInformation();
                                    $businessOwnersPolicy->client_info_id = $client_info_id;
                                    $businessOwnersPolicy->property_address = $property_address;
                                    $businessOwnersPolicy->loss_payee_information = $loss_payee_information;
                                    $businessOwnersPolicy->building_industry = $building_industry;
                                    $businessOwnersPolicy->who_owns_building = $who_owns_building;
                                    $businessOwnersPolicy->value_of_cost_building = $value_of_cost_building;
                                    $businessOwnersPolicy->business_property_limit = $business_property_limit;
                                    $businessOwnersPolicy->building_construction_type = $building_construction_type;
                                    $businessOwnersPolicy->year_built = $year_built;
                                    $businessOwnersPolicy->no_of_stories = $no_of_stories;
                                    $businessOwnersPolicy->total_building_sq_ft = $total_building_sq_ft;
                                    $businessOwnersPolicy->automatic_sprinkler_system = $automatic_sprinkler_system;
                                    $businessOwnersPolicy->automatic_file_alarm = $automatic_file_alarm;
                                    $businessOwnersPolicy->distance_nearest_fire_hydrant = $distance_nearest_fire_hydrant;
                                    $businessOwnersPolicy->distance_nearest_fire_station = $distance_nearest_fire_station;
                                    $businessOwnersPolicy->automatic_commercial_cooking_extinguish_system = $automatic_commercial_cooking_extinguish_system;
                                    $businessOwnersPolicy->automatic_burglar_alarm = $automatic_burglar_alarm;
                                    $businessOwnersPolicy->security_cameras = $security_cameras;
                                    $businessOwnersPolicy->last_update_to_roofing_year = $last_update_to_roofing_year;
                                    $businessOwnersPolicy->last_update_to_heating_year = $last_update_to_heating_year;
                                    $businessOwnersPolicy->last_update_to_electrical_year = $last_update_to_electrical_year;
                                    $businessOwnersPolicy->last_update_to_plumbing_year = $last_update_to_plumbing_year;
                                    $businessOwnersPolicy->bop_no_of_losses = $bop_no_of_losses;
                                    $businessOwnersPolicy->bop_amount_of_claim = $bop_amount_of_claim;
                                    $businessOwnersPolicy->bop_date_of_loss = $bop_date_of_loss;
                                    $businessOwnersPolicy->save();

                                    $templateData['bopNoOfLosses'] = "";

                                    switch($businessOwnersPolicy->bop_no_of_losses) {
                                        case '-1':
                                            $templateData['bopNoOfLosses'] = "Have Losses";
                                            break;
                                        case '5':
                                            $templateData['bopNoOfLosses'] = "5 yrs. No Losses";
                                            break;
                                        case '3':
                                            $templateData['bopNoOfLosses'] = "3 yrs. No Losses";
                                            break;
                                        case '1':
                                            $templateData['bopNoOfLosses'] = "1 yrs. No Losses";
                                            break;
                                        case '0':
                                            $templateData['bopNoOfLosses'] = "No Losses";
                                            break;
                                    }

                                    $templateData['bopDateOfLoss'] = $bop_date_of_loss === null ? '' : Carbon::createFromFormat('m/d/Y', $productData['bop_date_of_loss']['value'])->format('F j, Y');

                                    $templateData['businessOwnersPolicy'] = $businessOwnersPolicy;
                                    // $templateData['productTypes'][] = 'bop';
                                    $templateData['clientInformation'] = $clientInformation;
                                    $html_body .= view('quote.quote-details', $templateData)->render();
                                    Log::info('Record inserted with id for BOP: ' . $businessOwnersPolicy->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert BOP record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'comm_prop':
                                try {
                                    $client_info_id = $clientInformation->id;
                                    $business_location_type = $productData['property_business_located']['value'];
                                    $property_address = $productData['property_property_address']['value'];
                                    $name_of_building_owner = $productData['property_name_of_owner']['value'];
                                    $value_cost_of_building = isset($productData['property_value_cost_bldg']['value']) ? floatval(preg_replace("/[^-0-9\.]/","", $productData['property_value_cost_bldg']['value'])) : null;
                                    $business_property_limit = isset($productData['property_business_property_limit']['value']) ? floatval(preg_replace("/[^-0-9\.]/","", $productData['property_business_property_limit']['value'])) : null;
                                    $does_have_more_than_one_location = $productData['property_does_have_more_than_one_location']['value'];
                                    $are_there_multiple_units_in_building = $productData['property_multiple_units']['value'];
                                    $construction_type = $productData['property_construction_type']['value'];
                                    $year_built = $productData['property_year_built']['value'];
                                    $no_of_stories = $productData['property_no_of_stories']['value'];
                                    $total_building_sq_ft = $productData['property_total_bldg_sqft']['value'];
                                    $does_building_equipped_with_fire_sprinkler = $productData['property_is_bldg_equipped_with_fire_sprinklers']['value'];
                                    $distance_to_nearest_fire_hydrant = $productData['property_distance_nearest_fire_hydrant']['value'];
                                    $distance_to_nearest_fire_station = $productData['property_distance_nearest_fire_station']['value'];
                                    $protection_class = $productData['property_protection_class']['value'];
                                    $protective_devices = $productData['property_protective_device']['value'];
                                    $last_update_to_roofing_year = $productData['property_last_update_roofing_year']['value'];
                                    $last_update_to_heating_year = $productData['property_last_update_heating_year']['value'];
                                    $last_update_to_electrical_year = $productData['property_last_update_plumbing_year']['value'];
                                    $last_update_to_plumbing_year = $productData['property_last_update_electrical_year']['value'];
                                    $property_no_of_losses = $productData['property_no_of_losses']['value'];

                                    $property_amount_of_claim = null;
                                    if (isset($productData['property_amt_of_claims']['value']) && !empty($productData['property_amt_of_claims']['value'])) {
                                        try {
                                            $property_amount_of_claim = floatval(preg_replace("/[^-0-9\.]/","", $productData['property_amt_of_claims']['value']));
                                        } catch (\Exception $e) {
                                            $property_amount_of_claim = null;
                                        }
                                    }
                                    $property_date_of_loss = null;
                                    if (isset($productData['property_date_of_loss']['value']) && !empty($productData['property_date_of_loss']['value'])) {
                                        $property_date_of_loss = Carbon::createFromFormat('m/d/Y', $productData['property_date_of_loss']['value']);
                                    } else {
                                         $property_date_of_loss = null;
                                    }

                                    $commercialProperty = new CommercialPropertyInformation();
                                    $commercialProperty->client_info_id = $client_info_id;
                                    $commercialProperty->business_location_type = $business_location_type;
                                    $commercialProperty->property_address = $property_address;
                                    $commercialProperty->name_of_building_owner = $name_of_building_owner;
                                    $commercialProperty->value_cost_of_building = $value_cost_of_building;
                                    $commercialProperty->business_property_limit = $business_property_limit;
                                    $commercialProperty->does_have_more_than_one_location = $does_have_more_than_one_location;
                                    $commercialProperty->are_there_multiple_units_in_building = $are_there_multiple_units_in_building;
                                    $commercialProperty->construction_type = $construction_type;
                                    $commercialProperty->year_built = $year_built;
                                    $commercialProperty->no_of_stories = $no_of_stories;
                                    $commercialProperty->total_building_sq_ft = $total_building_sq_ft;
                                    $commercialProperty->does_building_equipped_with_fire_sprinkler = $does_building_equipped_with_fire_sprinkler;
                                    $commercialProperty->distance_to_nearest_fire_hydrant = $distance_to_nearest_fire_hydrant;
                                    $commercialProperty->distance_to_nearest_fire_station = $distance_to_nearest_fire_station;
                                    $commercialProperty->protection_class = $protection_class;
                                    $commercialProperty->protective_devices = $protective_devices;
                                    $commercialProperty->last_update_to_roofing_year = $last_update_to_roofing_year;
                                    $commercialProperty->last_update_to_heating_year = $last_update_to_heating_year;
                                    $commercialProperty->last_update_to_electrical_year = $last_update_to_electrical_year;
                                    $commercialProperty->last_update_to_plumbing_year = $last_update_to_plumbing_year;
                                    $commercialProperty->property_no_of_losses = $property_no_of_losses;
                                    $commercialProperty->property_amount_of_claim = $property_amount_of_claim;
                                    $commercialProperty->property_date_of_loss = $property_date_of_loss;
                                    $commercialProperty->save();

                                    $templateData['propertyNoOfLosses'] = "";

                                    switch($commercialProperty->property_no_of_losses) {
                                        case '-1':
                                            $templateData['propertyNoOfLosses'] = "Have Losses";
                                            break;
                                        case '5':
                                            $templateData['propertyNoOfLosses'] = "5 yrs. No Losses";
                                            break;
                                        case '3':
                                            $templateData['propertyNoOfLosses'] = "3 yrs. No Losses";
                                            break;
                                        case '1':
                                            $templateData['propertyNoOfLosses'] = "1 yrs. No Losses";
                                            break;
                                        case '0':
                                            $templateData['propertyNoOfLosses'] = "No Losses";
                                            break;
                                    }

                                    $templateData['propertyDateOfLoss'] = $property_date_of_loss === null ? '' : Carbon::createFromFormat('m/d/Y', $productData['property_date_of_loss']['value'])->format('F j, Y');
                                    $templateData['commercialProperty'] = $commercialProperty;
                                    // $templateData['productTypes'][] = 'comm_prop';
                                    $templateData['clientInformation'] = $clientInformation;
                                    $html_body .= view('quote.quote-details', $templateData)->render();
                                    Log::info('Record inserted with id for COMM PROP: ' . $commercialProperty->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert COMM PROP record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'eo':
                                try {
                                    $client_info_id = $clientInformation->id;
                                    $requested_limits = $productData['eo_requested_limits']['value'];
                                    $requested_limits_if_others = isset($productData['eo_reqlimit_if_others']['value']) ? $productData['eo_reqlimit_if_others']['value'] : null;
                                    $requested_deductible = $productData['eo_request_deductible']['value'];
                                    $requested_deductible_if_others = isset($productData['eo_reqdeductible_if_others']['value']) ? $productData['eo_reqdeductible_if_others']['value'] : null;
                                    $business_entity_q1 = $productData['eo_business_entity_q1']['value'];
                                    $business_entity_sub_q1 = isset($productData['eo_business_entity_sub_q1']['value']) ? $productData['eo_business_entity_sub_q1']['value'] : null;
                                    $business_entity_q2 = $productData['eo_business_entity_q2']['value'];
                                    $business_entity_sub_q2 = isset($productData['eo_business_entity_sub_q2']['value']) ? $productData['eo_business_entity_sub_q2']['value'] : null;
                                    $business_entity_q3 = $productData['eo_business_entity_q3']['value'];
                                    $business_entity_sub_q3 = isset($productData['eo_business_entity_sub_q3']['value']) ? $productData['eo_business_entity_sub_q3']['value'] : null;
                                    $business_entity_q4 = $productData['eo_business_entity_q4']['value'];
                                    $business_entity_sub_q4 = isset($productData['eo_business_entity_sub_q4']['value']) ? $productData['eo_business_entity_sub_q4']['value'] : null;
                                    $business_entity_q5 = $productData['eo_business_entity_q5']['value'];
                                    $business_entity_sub_q5 = isset($productData['eo_business_entity_sub_q5']['value']) ? $productData['eo_business_entity_sub_q5']['value'] : null;
                                    $number_of_employees = $productData['eo_number_employee']['value'];
                                    $full_time_employees = $productData['eo_full_time']['value'];
                                    $full_time_salary_range = floatval(preg_replace("/[^-0-9\.]/","", $productData['eo_ftime_salary_range']['value']));
                                    $part_time_employees = $productData['eo_part_time']['value'];
                                    $part_time_salary_range = floatval(preg_replace("/[^-0-9\.]/","", $productData['eo_ptime_salary_range']['value']));
                                    $employee_practice_q1 = $productData['eo_emp_practice_q1']['value'];
                                    $hr_q1 = $productData['eo_hr_q1']['value'];
                                    $hr_sub_q1 = isset($productData['eo_hr_sub_q1']['value']) ? $productData['eo_hr_sub_q1']['value'] : null;
                                    $hr_q2 = $productData['eo_hr_q2']['value'];
                                    $hr_sub_q2 = isset($productData['eo_hr_sub_q2']['value']) ? $productData['eo_hr_sub_q2']['value'] : null;
                                    $hr_q3 = $productData['eo_hr_q3']['value'];
                                    $hr_sub_q3 = isset($productData['eo_hr_sub_q3']['value']) ? $productData['eo_hr_sub_q3']['value'] : null;
                                    $hr_q4 = $productData['eo_hr_q4']['value'];
                                    $hr_sub_q4 = isset($productData['eo_hr_sub_q4']['value']) ? $productData['eo_hr_sub_q4']['value'] : null;
                                    $eo_no_of_losses = $productData['eo_no_of_losses']['value'];

                                    $eo_amount_of_claim = null;
                                    if (isset($productData['eo_amt_of_claims']['value']) && !empty($productData['eo_amt_of_claims']['value'])) {
                                        try {
                                            $eo_amount_of_claim = floatval(preg_replace("/[^-0-9\.]/","", $productData['eo_amt_of_claims']['value']));
                                        } catch (\Exception $e) {
                                            $eo_amount_of_claim = null;
                                        }
                                    }
                                    $eo_date_of_loss = null;
                                    if (isset($productData['eo_date_of_loss']['value']) && !empty($productData['eo_date_of_loss']['value'])) {
                                        $eo_date_of_loss = Carbon::createFromFormat('m/d/Y', $productData['eo_date_of_loss']['value']);
                                    } else {
                                         $eo_date_of_loss = null;
                                    }

                                    $errorsEmission = new ErrorsAndEmissionInformation();
                                    $errorsEmission->client_info_id = $client_info_id;
                                    $errorsEmission->requested_limits = $requested_limits;
                                    $errorsEmission->requested_limits_if_others = $requested_limits_if_others;
                                    $errorsEmission->requested_deductible = $requested_deductible;
                                    $errorsEmission->requested_deductible_if_others	= $requested_deductible_if_others;
                                    $errorsEmission->business_entity_q1 = $business_entity_q1;
                                    $errorsEmission->business_entity_sub_q1 = $business_entity_sub_q1;
                                    $errorsEmission->business_entity_q2 = $business_entity_q2;
                                    $errorsEmission->business_entity_sub_q2 = $business_entity_sub_q2;
                                    $errorsEmission->business_entity_q3 = $business_entity_q3;
                                    $errorsEmission->business_entity_sub_q3 = $business_entity_sub_q3;
                                    $errorsEmission->business_entity_q4 = $business_entity_q4;
                                    $errorsEmission->business_entity_sub_q4 = $business_entity_sub_q4;
                                    $errorsEmission->business_entity_q5 = $business_entity_q5;
                                    $errorsEmission->business_entity_sub_q5 = $business_entity_sub_q5;
                                    $errorsEmission->number_of_employees = $number_of_employees;
                                    $errorsEmission->full_time_employees = $full_time_employees;
                                    $errorsEmission->full_time_salary_range = $full_time_salary_range;
                                    $errorsEmission->part_time_employees = $part_time_employees;
                                    $errorsEmission->part_time_salary_range = $part_time_salary_range;
                                    $errorsEmission->employee_practice_q1 = $employee_practice_q1;
                                    $errorsEmission->hr_q1 = $hr_q1;
                                    $errorsEmission->hr_sub_q1 = $hr_sub_q1;
                                    $errorsEmission->hr_q2 = $hr_q2;
                                    $errorsEmission->hr_sub_q2 = $hr_sub_q2;
                                    $errorsEmission->hr_q3 = $hr_q3;
                                    $errorsEmission->hr_sub_q3 = $hr_sub_q3;
                                    $errorsEmission->hr_q4 = $hr_q4;
                                    $errorsEmission->hr_sub_q4 = $hr_sub_q4;
                                    $errorsEmission->eo_no_of_losses = $eo_no_of_losses;
                                    $errorsEmission->eo_amount_of_claim = $eo_amount_of_claim;
                                    $errorsEmission->eo_date_of_loss = $eo_date_of_loss;
                                    $errorsEmission->save();

                                    $templateData['eoNoOfLosses'] = "";

                                    switch($errorsEmission->eo_no_of_losses) {
                                        case '-1':
                                            $templateData['eoNoOfLosses'] = "Have Losses";
                                            break;
                                        case '5':
                                            $templateData['eoNoOfLosses'] = "5 yrs. No Losses";
                                            break;
                                        case '3':
                                            $templateData['eoNoOfLosses'] = "3 yrs. No Losses";
                                            break;
                                        case '1':
                                            $templateData['eoNoOfLosses'] = "1 yrs. No Losses";
                                            break;
                                        case '0':
                                            $templateData['eoNoOfLosses'] = "No Losses";
                                            break;
                                    }

                                    $templateData['eoDateOfLoss'] = $eo_date_of_loss === null ? '' : Carbon::createFromFormat('m/d/Y', $productData['eo_date_of_loss']['value'])->format('F j, Y');
                                    $templateData['errorsEmission'] = $errorsEmission;
                                    // $templateData['productTypes'][] = 'eo';
                                    $templateData['clientInformation'] = $clientInformation;
                                    $html_body .= view('quote.quote-details', $templateData)->render();
                                    Log::info('Record inserted with id for EO: ' . $errorsEmission->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert EO record. Exception: ' . $e->getMessage());
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
                                    // $templateData['productTypes'][] = 'pollution';
                                    $templateData['clientInformation'] = $clientInformation;

                                    $html_body .= view('quote.quote-details', $templateData)->render();

                                    Log::info('Record inserted with id for POLLUTION: ' . $pollutionLiability->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert POLLUTION record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'epli':
                                try {
                                    $client_info_id = $clientInformation->id;
                                    $fein = $productData['epli_fein']['value'];
                                    $current_epli = $productData['epli_current_epli']['value'];
                                    $prior_carrier = $productData['epli_prior_carrier']['value'];
                                    $prior_carrier_epli = $productData['epli_prior_carrier_epli']['value'];
                                    $epli_effective_date = Carbon::createFromFormat('m/d/Y', $productData['epli_effective_date']['value']);
                                    $previous_premium_amount = floatval(preg_replace("/[^-0-9\.]/","", $productData['epli_prev_premium_amount']['value']));
                                    $deductible_amount = "";
                                    $deductible_claim_if_others = "";
                                    if ($productData['epli_deductible_amount']['value'] === "Others") {
                                        $deductible_amount = $productData['epli_deductible_amount']['value'];
                                        $deductible_claim_if_others = floatval(preg_replace("/[^-0-9\.]/","", $productData['epli_deductible_claim_if_others']['value']));
                                    } else {
                                        $deductible_amount = floatval(preg_replace("/[^-0-9\.]/","", $productData['epli_deductible_amount']['value']));
                                        $deductible_claim_if_others = null;
                                    }

                                    $full_time_employee = $productData['epli_full_time']['value'];
                                    $part_time_employee = $productData['epli_part_time']['value'];
                                    $independent_contractors = $productData['epli_independent_contractors']['value'];
                                    $volunteers = $productData['epli_volunteers']['value'];
                                    $leased_or_seasonal = $productData['epli_leased_seasonal']['value'];
                                    $non_us_based_employee = $productData['epli_non_us_base_emp']['value'];
                                    $total_employees = $productData['epli_total_employees']['value'];
                                    $located_at_ca = $productData['epli_located_at_ca']['value'];
                                    $located_at_ga = $productData['epli_located_at_ga']['value'];
                                    $located_at_tx = $productData['epli_located_at_tx']['value'];
                                    $located_at_fl = $productData['epli_located_at_fl']['value'];
                                    $located_at_ny = $productData['epli_located_at_ny']['value'];
                                    $located_at_nj = $productData['epli_located_at_nj']['value'];
                                    $up_to_60k = floatval(preg_replace("/[^-0-9\.]/","", $productData['epli_salary_range_q1']['value']));
                                    $between_60k_to_120k = floatval(preg_replace("/[^-0-9\.]/","", $productData['epli_salary_range_q2']['value']));
                                    $over_120k = floatval(preg_replace("/[^-0-9\.]/","", $productData['epli_salary_range_q3']['value']));
                                    $voluntary = $productData['epli_emp_terminated_last_12_months_q1']['value'];
                                    $involuntary = $productData['epli_emp_terminated_last_12_months_q2']['value'];
                                    $laid_off = $productData['epli_emp_terminated_last_12_months_q3']['value'];
                                    $hr_policies_and_procedure_q1 = $productData['epli_hr_q1']['value'];
                                    $hr_policies_and_procedure_q2 = $productData['epli_hr_q2']['value'];
                                    $hr_policies_and_procedure_q3 = $productData['epli_hr_q3']['value'];
                                    $hr_policies_and_procedure_q4 = $productData['epli_hr_q4']['value'];
                                    $hr_policies_and_procedure_q5 = $productData['epli_hr_q5']['value'];
                                    $hr_policies_and_procedure_q6 = $productData['epli_hr_q6']['value'];
                                    $epli_no_of_losses = $productData['epli_no_of_losses']['value'];
                                    $epli_amount_of_claim = isset($productData['epli_amt_of_claims']['value']) ? floatval(preg_replace("/[^-0-9\.]/","", $productData['epli_amt_of_claims']['value'])) : null;
                                    $epli_date_of_loss = isset($productData['epli_date_of_loss']['value']) ? Carbon::createFromFormat('m/d/Y', $productData['epli_date_of_loss']['value']) : null;

                                    $epli = new EPLIInformation();
                                    $epli->client_info_id = $client_info_id;
                                    $epli->fein = $fein;
                                    $epli->current_epli = $current_epli;
                                    $epli->prior_carrier = $prior_carrier;
                                    $epli->prior_carrier_epli = $prior_carrier_epli;
                                    $epli->effective_date = $epli_effective_date;
                                    $epli->previous_premium_amount = $previous_premium_amount;
                                    $epli->deductible_amount = $deductible_amount;
                                    $epli->deductible_amount_if_others = $deductible_claim_if_others;
                                    $epli->full_time_employee = $full_time_employee;
                                    $epli->part_time_employee = $part_time_employee;
                                    $epli->independent_contractors = $independent_contractors;
                                    $epli->volunteers = $volunteers;
                                    $epli->leased_or_seasonal = $leased_or_seasonal;
                                    $epli->non_us_based_employee = $non_us_based_employee;
                                    $epli->total_employees = $total_employees;
                                    $epli->located_at_ca = $located_at_ca;
                                    $epli->located_at_ga = $located_at_ga;
                                    $epli->located_at_tx = $located_at_tx;
                                    $epli->located_at_fl = $located_at_fl;
                                    $epli->located_at_ny = $located_at_ny;
                                    $epli->located_at_nj = $located_at_nj;
                                    $epli->up_to_60k = $up_to_60k;
                                    $epli->between_60k_to_120k = $between_60k_to_120k;
                                    $epli->over_120k = $over_120k;
                                    $epli->voluntary = $voluntary;
                                    $epli->involuntary = $involuntary;
                                    $epli->laid_off = $laid_off;
                                    $epli->hr_policies_and_procedure_q1 = $hr_policies_and_procedure_q1;
                                    $epli->hr_policies_and_procedure_q2 = $hr_policies_and_procedure_q2;
                                    $epli->hr_policies_and_procedure_q3 = $hr_policies_and_procedure_q3;
                                    $epli->hr_policies_and_procedure_q4 = $hr_policies_and_procedure_q4;
                                    $epli->hr_policies_and_procedure_q5 = $hr_policies_and_procedure_q5;
                                    $epli->hr_policies_and_procedure_q6 = $hr_policies_and_procedure_q6;
                                    $epli->epli_no_of_losses = $epli_no_of_losses;
                                    $epli->epli_amount_of_claim = $epli_amount_of_claim;
                                    $epli->epli_date_of_loss = $epli_date_of_loss;
                                    $epli->save();

                                    $templateData['epliNoOfLosses'] = "";

                                    switch($epli->epli_no_of_losses) {
                                        case '-1':
                                            $templateData['epliNoOfLosses'] = "Have Losses";
                                            break;
                                        case '5':
                                            $templateData['epliNoOfLosses'] = "5 yrs. No Losses";
                                            break;
                                        case '3':
                                            $templateData['epliNoOfLosses'] = "3 yrs. No Losses";
                                            break;
                                        case '1':
                                            $templateData['epliNoOfLosses'] = "1 yrs. No Losses";
                                            break;
                                        case '0':
                                            $templateData['epliNoOfLosses'] = "No Losses";
                                            break;
                                    }

                                    // $templateData['epliDateOfLoss'] = Carbon::createFromFormat('m/d/Y', $productData['epli_date_of_loss']['value'])->format('F j, Y');
                                    $templateData['epliDateOfLoss'] = $epli_date_of_loss === null ? '' : Carbon::createFromFormat('m/d/Y', $productData['epli_date_of_loss']['value'])->format('F j, Y');
                                    $templateData['epliEffDateFormatted'] = Carbon::createFromFormat('m/d/Y', $productData['epli_effective_date']['value'])->format('F j, Y');
                                    $templateData['epli'] = $epli;
                                    // $templateData['productTypes'][] = 'epli';
                                    $templateData['clientInformation'] = $clientInformation;
                                    $html_body .= view('quote.quote-details', $templateData)->render();
                                    Log::info('Record inserted with id for EPLI: ' . $epli->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert EPLI record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'cyber':
                                try {
                                    $client_info_id = $clientInformation->id;
                                    $it_contact_name = $productData['cyber_it_contact_name']['value'];
                                    $it_contact_number = $productData['cyber_it_contact_number']['value'];
                                    $it_contact_email = $productData['cyber_it_contact_email']['value'];
                                    $cyber_q1 = $productData['cyber_q1']['value'];
                                    $cyber_q2 = $productData['cyber_q2']['value'];
                                    $cyber_q3 = $productData['cyber_q3']['value'];
                                    $cyber_q4 = $productData['cyber_q4']['value'];
                                    $cyber_q5 = $productData['cyber_q5']['value'];
                                    $cyber_q6 = $productData['cyber_q6']['value'];
                                    $cyber_q7 = $productData['cyber_q7']['value'];
                                    $cyber_q8 = $productData['cyber_q8']['value'];
                                    $cyber_no_of_losses = $productData['cyber_no_of_losses']['value'];
                                    // $cyber_amount_of_claim = isset($productData['cyber_amt_of_claims']['value']) ? floatval(preg_replace("/[^-0-9\.]/","", $productData['cyber_amt_of_claims']['value'])) : null;
                                    // $cyber_date_of_loss = isset($productData['cyber_date_of_loss']['value']) ? Carbon::createFromFormat('m/d/Y', $productData['cyber_date_of_loss']['value'])->toDateString() : null;

                                    $cyber_amount_of_claim = null;
                                    if (isset($productData['cyber_amt_of_claims']['value']) && !empty($productData['cyber_amt_of_claims']['value'])) {
                                        try {
                                            $cyber_amount_of_claim = floatval(preg_replace("/[^-0-9\.]/","", $productData['cyber_amt_of_claims']['value']));
                                        } catch (\Exception $e) {
                                            $cyber_amount_of_claim = null;
                                        }
                                    }
                                    $cyber_date_of_loss = null;
                                    if (isset($productData['cyber_date_of_loss']['value']) && !empty($productData['cyber_date_of_loss']['value'])) {
                                        $cyber_date_of_loss = Carbon::createFromFormat('m/d/Y', $productData['cyber_date_of_loss']['value']);
                                    } else {
                                         $cyber_date_of_loss = null;
                                    }

                                    $cyberLiability = new CyberLiabilityInformation();
                                    $cyberLiability->client_info_id = $client_info_id;
                                    $cyberLiability->it_contact_name = $it_contact_name;
                                    $cyberLiability->it_contact_number = $it_contact_number;
                                    $cyberLiability->it_contact_email = $it_contact_email;
                                    $cyberLiability->cyber_q1 = $cyber_q1;
                                    $cyberLiability->cyber_q2 = $cyber_q2;
                                    $cyberLiability->cyber_q3 = $cyber_q3;
                                    $cyberLiability->cyber_q4 = $cyber_q4;
                                    $cyberLiability->cyber_q5 = $cyber_q5;
                                    $cyberLiability->cyber_q6 = $cyber_q6;
                                    $cyberLiability->cyber_q7 = $cyber_q7;
                                    $cyberLiability->cyber_q8 = $cyber_q8;
                                    $cyberLiability->cyber_no_of_losses = $cyber_no_of_losses;
                                    $cyberLiability->cyber_amount_of_claim = $cyber_amount_of_claim;
                                    $cyberLiability->cyber_date_of_loss = $cyber_date_of_loss;
                                    $cyberLiability->save();

                                    $templateData['cyberNoOfLosses'] = "";

                                    switch($cyberLiability->cyber_no_of_losses) {
                                        case '-1':
                                            $templateData['cyberNoOfLosses'] = "Have Losses";
                                            break;
                                        case '5':
                                            $templateData['cyberNoOfLosses'] = "5 yrs. No Losses";
                                            break;
                                        case '3':
                                            $templateData['cyberNoOfLosses'] = "3 yrs. No Losses";
                                            break;
                                        case '1':
                                            $templateData['cyberNoOfLosses'] = "1 yrs. No Losses";
                                            break;
                                        case '0':
                                            $templateData['cyberNoOfLosses'] = "No Losses";
                                            break;
                                    }

                                    // $templateData['cyberDateOfLoss'] = Carbon::createFromFormat('m/d/Y', $productData['cyber_date_of_loss']['value'])->format('F j, Y');
                                    $templateData['cyberDateOfLoss'] = $cyber_date_of_loss === null ? '' : Carbon::createFromFormat('m/d/Y', $productData['cyber_date_of_loss']['value'])->format('F j, Y');
                                    $templateData['cyberLiability'] = $cyberLiability;
                                    // $templateData['productTypes'][] = 'cyber';
                                    $templateData['clientInformation'] = $clientInformation;
                                    $html_body .= view('quote.quote-details', $templateData)->render();
                                    Log::info('Record inserted with id for CYBER: ' . $cyberLiability->id);
                                } catch (\Exception $e) {
                                    Log::error('Failed to insert CYBER record. Exception: ' . $e->getMessage());
                                }
                                break;
                            case 'instfloat':
                                try {
                                    $client_info_id = $clientInformation->id;
                                    $territory_of_operation = $productData['instfloat_territory_of_operation']['value'];
                                    $type_of_operation = $productData['instfloat_type_of_operation']['value'];
                                    $type_of_equipment = $productData['instfloat_scheduled_type_of_equipment']['value'];
                                    $deductible_amount = $productData['instfloat_deductible_amount']['value'];
                                    $location = $productData['instfloat_location']['value'];
                                    $months_in_storage = floatval(preg_replace("/[^-0-9\.]/","", $productData['instfloat_months_in_storage']['value']));
                                    $max_value_of_equipment_storing = floatval(preg_replace("/[^-0-9\.]/","", $productData['instfloat_max_value_of_equipment']['value']));
                                    $max_value_of_building_storage = floatval(preg_replace("/[^-0-9\.]/","", $productData['instfloat_max_value_of_bldg_storage']['value']));
                                    $type_of_security_placed_in_building = $productData['instfloat_type_security_placed']['value'];
                                    $unsched_type_of_equipment = $productData['instfloat_unscheduled_type_of_equipment']['value'];
                                    $unsched_max_value_of_equipment_storing = floatval(preg_replace("/[^-0-9\.]/","", $productData['instfloat_unscheduled_max_value_equipment_storing']['value']));
                                    $additional_info_q1 = $productData['instfloat_additional_info_q1']['value'];
                                    $additional_info_q2 = $productData['instfloat_additional_info_q2']['value'];
                                    $additional_info_q3 = $productData['instfloat_additional_info_q3']['value'];
                                    $additional_info_q4 = $productData['instfloat_additional_info_q4']['value'];
                                    $instfloat_no_of_losses = $productData['instfloat_no_of_losses']['value'];
                                    // $instfloat_amount_of_claim = isset($productData['instfloat_amt_of_claims']['value']) ? floatval(preg_replace("/[^-0-9\.]/","", $productData['instfloat_amt_of_claims']['value'])) : null;
                                    // $instfloat_date_of_loss = isset($productData['instfloat_date_of_loss']['value']) ? Carbon::createFromFormat('m/d/Y', $productData['instfloat_date_of_loss']['value'])->toDateString() : null;

                                    $instfloat_amount_of_claim = null;
                                    if (isset($productData['instfloat_amt_of_claims']['value']) && !empty($productData['instfloat_amt_of_claims']['value'])) {
                                        try {
                                            $instfloat_amount_of_claim = floatval(preg_replace("/[^-0-9\.]/","", $productData['instfloat_amt_of_claims']['value']));
                                        } catch (\Exception $e) {
                                            $instfloat_amount_of_claim = null;
                                        }
                                    }
                                    $instfloat_date_of_loss = null;
                                    if (isset($productData['instfloat_date_of_loss']['value']) && !empty($productData['instfloat_date_of_loss']['value'])) {
                                        $gl_date_of_loss = Carbon::createFromFormat('m/d/Y', $productData['instfloat_date_of_loss']['value']);
                                    } else {
                                         $instfloat_date_of_loss = null;
                                    }

                                    $instFloater = new InstallationFloaterInformation();
                                    $instFloater->client_info_id = $client_info_id;
                                    $instFloater->territory_of_operation = $territory_of_operation;
                                    $instFloater->type_of_operation = $type_of_operation;
                                    $instFloater->type_of_equipment = $type_of_equipment;
                                    $instFloater->deductible_amount = $deductible_amount;
                                    $instFloater->location = $location;
                                    $instFloater->months_in_storage = $months_in_storage;
                                    $instFloater->max_value_of_equipment_storing = $max_value_of_equipment_storing;
                                    $instFloater->max_value_of_building_storage = $max_value_of_building_storage;
                                    $instFloater->type_of_security_placed_in_building = $type_of_security_placed_in_building;
                                    $instFloater->unsched_type_of_equipment = $unsched_type_of_equipment;
                                    $instFloater->unsched_max_value_of_equipment_storing = $unsched_max_value_of_equipment_storing;
                                    $instFloater->additional_info_q1 = $additional_info_q1;
                                    $instFloater->additional_info_q2 = $additional_info_q2;
                                    $instFloater->additional_info_q3 = $additional_info_q3;
                                    $instFloater->additional_info_q4 = $additional_info_q4;
                                    $instFloater->instfloat_no_of_losses = $instfloat_no_of_losses;
                                    $instFloater->instfloat_amount_of_claim = $instfloat_amount_of_claim;
                                    $instFloater->instfloat_date_of_loss = $instfloat_date_of_loss;
                                    $doesInstallationFloaterSaved = $instFloater->save();

                                    if ($doesInstallationFloaterSaved) {
                                        $templateData['scheduledEquipmentsInfo'] = [];
                                        foreach ($productDataStr as $key => $data) {
                                            $counter = str_replace('instfloat_scheduled_equipment_type_', '', $key);
                                            if (
                                                isset($productDataStr['instfloat_scheduled_equipment_mfg_' . $counter]['value'])
                                                && !empty($productDataStr['instfloat_scheduled_equipment_mfg_' . $counter]['value']) &&
                                                isset($productDataStr['instfloat_scheduled_equipment_id_or_serial_' . $counter]['value'])
                                                && !empty($productDataStr['instfloat_scheduled_equipment_id_or_serial_' . $counter]['value']) &&
                                                isset($productDataStr['instfloat_scheduled_equipment_model_' . $counter]['value'])
                                                && !empty($productDataStr['instfloat_scheduled_equipment_model_' . $counter]['value']) &&
                                                isset($productDataStr['instfloat_scheduled_equipment_new_or_used_' . $counter]['value'])
                                                && !empty($productDataStr['instfloat_scheduled_equipment_new_or_used_' . $counter]['value']) &&
                                                isset($productDataStr['instfloat_scheduled_equipment_model_year_' . $counter]['value'])
                                                && !empty($productDataStr['instfloat_scheduled_equipment_model_year_' . $counter]['value']) &&
                                                isset($productDataStr['instfloat_scheduled_equipment_date_purchased_' . $counter]['value'])
                                                && !empty($productDataStr['instfloat_scheduled_equipment_date_purchased_' . $counter]['value'])) {

                                                $instFloaterSchedEquipment = new InstallationFloaterScheduledEquipment();
                                                DB::beginTransaction();
                                                try {
                                                    $sched_equip_type = $productData['instfloat_scheduled_equipment_type_' . $counter]['value'];
                                                    $sched_equip_manufacturer = $productData['instfloat_scheduled_equipment_mfg_' . $counter]['value'];
                                                    $sched_equip_serial_no = $productData['instfloat_scheduled_equipment_id_or_serial_' . $counter]['value'];
                                                    $sched_equip_model = $productData['instfloat_scheduled_equipment_model_' . $counter]['value'];
                                                    $sched_equip_new_or_used = $productData['instfloat_scheduled_equipment_new_or_used_' . $counter]['value'];
                                                    $sched_equip_model_year = $productData['instfloat_scheduled_equipment_model_year_' . $counter]['value'];
                                                    $sched_equip_date_purchased = isset($productData['instfloat_scheduled_equipment_date_purchased_' . $counter]['value']) ? Carbon::createFromFormat('m/d/Y', $productData['instfloat_scheduled_equipment_date_purchased_' . $counter]['value']) : null;

                                                    $instFloaterSchedEquipment->instfloat_id = $instFloater->id;
                                                    $instFloaterSchedEquipment->sched_equip_type = $sched_equip_type;
                                                    $instFloaterSchedEquipment->sched_equip_manufacturer = $sched_equip_manufacturer;
                                                    $instFloaterSchedEquipment->sched_equip_serial_no = $sched_equip_serial_no;
                                                    $instFloaterSchedEquipment->sched_equip_model = $sched_equip_model;
                                                    $instFloaterSchedEquipment->sched_equip_new_or_used = $sched_equip_new_or_used;
                                                    $instFloaterSchedEquipment->sched_equip_model_year = $sched_equip_model_year;
                                                    // $schedEquipmentDatePurchased = Carbon::createFromFormat('m/d/Y', $productData['instfloat_scheduled_equipment_date_purchased_' . $counter]['value'])->toDateString();
                                                    $instFloaterSchedEquipment->sched_equip_date_purchased = $sched_equip_date_purchased;
                                                    $instFloaterSchedEquipment->save();

                                                    $templateData['scheduledEquipmentsInfo'][] = [
                                                        'counter' => $counter,
                                                        'sched_equip_type' => $sched_equip_type,
                                                        'sched_equip_manufacturer' => $sched_equip_manufacturer,
                                                        'sched_equip_serial_no' => $sched_equip_serial_no,
                                                        'sched_equip_model' => $sched_equip_model,
                                                        'sched_equip_new_or_used' => $sched_equip_new_or_used,
                                                        'sched_equip_model_year' => $sched_equip_model_year,
                                                        'sched_equip_date_purchased' => Carbon::createFromFormat('m/d/Y', $productData['instfloat_scheduled_equipment_date_purchased_' . $counter]['value'])->format('F j, Y'),
                                                    ];

                                                    Log::info('Successfully saved instFloaterSchedEquipment record. Data: ' . json_encode($instFloaterSchedEquipment));
                                                    DB::commit();
                                                } catch (\Exception $e) {
                                                    DB::rollBack();
                                                    Log::error('Failed to insert instFloaterSchedEquipment record. Exception: ' . $e->getMessage());
                                                }
                                            }
                                        }
                                    }

                                    $templateData['instFloatNoOfLosses'] = "";

                                    switch($instFloaterSchedEquipment->instfloat_no_of_losses) {
                                        case '-1':
                                            $templateData['instFloatNoOfLosses'] = "Have Losses";
                                            break;
                                        case '5':
                                            $templateData['instFloatNoOfLosses'] = "5 yrs. No Losses";
                                            break;
                                        case '3':
                                            $templateData['instFloatNoOfLosses'] = "3 yrs. No Losses";
                                            break;
                                        case '1':
                                            $templateData['instFloatNoOfLosses'] = "1 yrs. No Losses";
                                            break;
                                        case '0':
                                            $templateData['instFloatNoOfLosses'] = "No Losses";
                                            break;
                                    }

                                    // $templateData['instFloatDateOfLoss'] = Carbon::createFromFormat('m/d/Y', $productData['instfloat_date_of_loss']['value'])->format('F j, Y');
                                    $templateData['instFloatDateOfLoss'] = $instfloat_date_of_loss === null ? '' : Carbon::createFromFormat('m/d/Y', $productData['instfloat_date_of_loss']['value'])->format('F j, Y');
                                    $templateData['instFloater'] = $instFloater;
                                    // $templateData['productTypes'][] = 'instfloat';
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
        $key = $request->input('key');
        $value = $request->input('value');
        // dd($key,$value);
        session([$key => $value]);
        // dd(is_string(session('doesGLandWCChecked')));


        return response()->json(['message' => 'Session variable set successfully']);
    }

    public function unsetSessionVariable(Request $request) {
        // Session::forget('doesGLandWCChecked');
        $key = $request->input('key');
        Session::forget($key);
        return response()->json(['message' => 'Session variable unset successfully']);
    }

}
