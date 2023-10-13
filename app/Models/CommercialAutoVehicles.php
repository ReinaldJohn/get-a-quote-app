<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommercialAutoVehicles extends Model
{
    use HasFactory;

    protected $table = 'commercial_auto_vehicle_details';
    protected $guarded = [];
}
