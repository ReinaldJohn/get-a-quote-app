<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    // public function getAllStates() {
    //     return $this->select('id', 'abbr')->from('states')->get();
    // }

    public function getAllStates() {
        return $this->select('state_abbr')->distinct()->from('states')->get();
    }

    public function getAllProfessions() {
        return $this->select('id', 'name')->from('professions')->orderBy('name', 'ASC')->get();
    }

    public function getStatesById($id) {
        $states = $this->select('state_abbr')->from('states')->where('id', $id)->first();
        return $states ? $states->abbr : null;
    }

    public function getProfessionById($id) {
        $profession = $this->select('name')->from('professions')->where('id', $id)->first();
        return $profession ? $profession->name : null;
    }

    public static function getStateByZipcode($zipcode) {
        return self::query()->from('states')->where('zipcode', $zipcode)->first(['state_abbr', 'city']);
    }

    // public function getStateByZipcode($zipcode)
    // {
    //     $state = Quote::getStateByZipcode($zipcode);

    //     if ($state) {
    //         return response()->json($state);
    //     }

    //     return response()->json(['error' => 'State not found for the provided zipcode.'], 404);
    // }

}
