<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WCProfessionEntry extends Model
{
    use HasFactory;

    protected $table = 'workers_comp_profession_entry_details';
    protected $guarded = [];
}
