<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pilotage extends Model
{
    use HasFactory;

    private function setPeople(Int $people):Pilotage
    {
        $this->people = $people;
        return $this;
    }

    private function setPricePerPerson(Int $pricePerPerson):Pilotage
    {
        $this->pricePerPerson = $pricePerPerson;
        return $this;
    }

    private function setPriceMonthly(Int $priceMonthly):Pilotage
    {
        $this->priceMonthly = $priceMonthly;
        return $this;
    }

    public function getPilotageInfo():Pilotage
    {
        return $this->first();
    }

    public function getByID(Int $ID):Pilotage
    {
        return $this->where('id', $ID)->first();
    }

    public function updatePilotage(Int $people, Int $pricePerPerson, Int $priceMonthly):Pilotage
    {
        $this->setPeople($people);
        $this->setPricePerPerson($pricePerPerson);
        $this->setPriceMonthly($priceMonthly);
        $this->save();
        return $this;
    }
}
