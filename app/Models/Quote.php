<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    public function getAllStates() {
        return $this->select('id', 'abbr')->from('states')->get();
    }

    public function getAllProfessions() {
        return $this->select('id', 'name')->from('professions')->get();
    }

    public function getStatesById($id) {
        $states = $this->select('abbr')->from('states')->where('id', $id)->first();
        return $states ? $states->abbr : null;
    }

    public function getProfessionById($id) {
        $profession = $this->select('name')->from('professions')->where('id', $id)->first();
        return $profession ? $profession->name : null;
    }

}
