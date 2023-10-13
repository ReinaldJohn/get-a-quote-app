<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommercialAutoDrivers extends Model
{
    use HasFactory;

    protected $table = 'commercial_auto_driver_details';
    protected $guarded = [];
}
