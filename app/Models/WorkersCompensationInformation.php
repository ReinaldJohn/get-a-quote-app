<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkersCompensationInformation extends Model
{
    use HasFactory;

    protected $table = 'workers_compensation_details';
    protected $guarded = [];
}