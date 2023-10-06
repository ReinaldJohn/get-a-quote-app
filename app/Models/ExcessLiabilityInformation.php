<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcessLiabilityInformation extends Model
{
    use HasFactory;

    protected $table = 'excess_liability_details';
    protected $guarded = [];
}