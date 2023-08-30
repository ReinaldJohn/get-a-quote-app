<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommercialAutoInformation extends Model
{
    use HasFactory;

    protected $table = 'commercial_auto_details';
    protected $guarded = [];
}
