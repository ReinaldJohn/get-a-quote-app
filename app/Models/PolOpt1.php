<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolOpt1 extends Model
{
    use HasFactory;

    protected $table = 'pollution_apply_to_work_1';

    public function getAllOpt1() {
        return $this->select('*')->get();
    }
}
