<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollutionLiabilityInformation extends Model
{
    use HasFactory;

    protected $table = 'pollution_liability_details';
    protected $guarded = [];
}
