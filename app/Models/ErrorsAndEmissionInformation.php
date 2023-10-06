<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorsAndEmissionInformation extends Model
{
    use HasFactory;

    protected $table = 'errors_and_omission_details';
    protected $guarded = [];
}
