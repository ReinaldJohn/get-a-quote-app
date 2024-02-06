<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolOpt2 extends Model
{
    use HasFactory;

    protected $table = 'pollution_apply_to_work_2';

    public function getAllOpt2() {
        return $this->select('*')->get();
    }
}
