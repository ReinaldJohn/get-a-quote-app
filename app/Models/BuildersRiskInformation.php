<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildersRiskInformation extends Model
{
    use HasFactory;

    protected $table = 'builders_risk_details';
    protected $guarded = [];
}
