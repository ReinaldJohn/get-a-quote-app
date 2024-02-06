<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollutionLiabilityInformation extends Model
{
    use HasFactory;

    protected $table = 'pollution_liability_details';
    protected $casts = [
        'envcontserv_opts' => 'array',
        'envconsultserv_opts' => 'array',
        'nonenvserv_opts' => 'array',
    ];
    protected $guarded = [];

}