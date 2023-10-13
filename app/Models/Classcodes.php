<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classcodes extends Model
{
    use HasFactory;

    protected $table = 'professions';

    public function filterClasscodesWithQuestion(array $ids) {
        return $this->whereIn('id', $ids)->pluck('id')->toArray();
    }

}
