<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GLMultipleStateWork extends Model
{
    use HasFactory;

    protected $table = 'general_liability_multiple_state_work_details';
    protected $guarded = [];
}