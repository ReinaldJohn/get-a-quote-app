<h6 class="profession_header mt-2 mb-2">About Your Profession
</h6>
<div class="form-floating mb-3">
    <div class="col-md-12">
        <div class="mb-3 form-floating">
            <input type="text" name="annual_gross_receipt" id="annual_gross_receipt" class="form-control required"
                placeholder="Annual Gross Receipts">
            <label for="annual_gross_receipt">Annual Gross
                Receipts</label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="mb-3 form-floating">
            <select class="form-select required" name="profession" id="profession" aria-label="profession">
                <option value selected></option>
                <optgroup label="All Professions">
                    @foreach ($professions as $profession)
                        <option value="{{ $profession['id'] }}">
                            {{ $profession['name'] }}
                        </option>
                    @endforeach
                </optgroup>
            </select>
            <label for="profession">Select a Profession</label>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="mb-3 form-floating">
            <select class="form-select required" name="residential_percentage" id="residential_percentage"
                aria-label="residential_percentage">
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
            <select class="form-select required" name="commercial_percentage" id="commercial_percentage"
                aria-label="commercial_percentage">
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
            <label for="commercial_percentage">Commercial %</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3 form-floating">
            <select class="form-select required" name="new_construction_percentage" id="new_construction_percentage"
                aria-label="new_construction_percentage">
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
            <label for="new_construction_percentage">New Construction
                %</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3 form-floating">
            <select class="form-select required" name="repair_remodel_percentage" id="repair_remodel_percentage"
                aria-label="repair_remodel_percentage">
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
            <label for="repair_remodel_percentage">Repair/Remodel
                %</label>
        </div>
    </div>
</div>