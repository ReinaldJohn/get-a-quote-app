<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BOPInformation extends Model
{
    use HasFactory;

    protected $table = 'business_owners_policy_details';
    protected $guarded = [];
}