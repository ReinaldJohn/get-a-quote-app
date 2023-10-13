<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallationFloaterScheduledEquipment extends Model
{
    use HasFactory;

    protected $table = 'instfloat_scheduled_equipment_details';
    protected $guarded = [];
}
