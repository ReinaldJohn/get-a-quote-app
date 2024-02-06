<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolOpt3 extends Model
{
    use HasFactory;

    protected $table = 'pollution_apply_to_work_3';

    public function getAllOpt3() {
        return $this->select('*')->get();
    }
}
