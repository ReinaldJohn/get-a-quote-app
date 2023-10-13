<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WCOwnersInfo extends Model
{
    use HasFactory;

    protected $table = 'workers_comp_owners_info_entry_details';
    protected $guarded = [];
}
