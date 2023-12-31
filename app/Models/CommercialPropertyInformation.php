<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommercialPropertyInformation extends Model
{
    use HasFactory;

    protected $table = 'commercial_property_details';
    protected $guarded = [];
}
