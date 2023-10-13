<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GLAdditionalQuestions extends Model
{
    use HasFactory;

    protected $table = 'gl_professions_additional_questions_details';
    protected $guarded = [];
}