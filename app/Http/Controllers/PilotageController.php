<?php

namespace App\Http\Controllers;

use App\Models\Pilotage;
use Illuminate\Http\Request;

class PilotageController extends Controller
{
    public function getInfo(Pilotage $pilotageObj)
    {
        return $pilotageObj->getPilotageInfo();
    }

    public function updateInfo(Request $request, Pilotage $pilotageObj)
    {
        $pilotage = $pilotageObj->getByID($request->id);
        return $pilotage->updatePilotage($request->people, $request->pricePerPerson, $request->priceMonthly);
    }
}
