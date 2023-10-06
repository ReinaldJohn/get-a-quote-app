<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralLiabilityInformation extends Model
{
    use HasFactory;

    protected $table = 'general_liability_details';
    protected $guarded = [];
}