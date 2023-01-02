<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Cause;
use App\Models\Driver;
use App\Models\Assistant;
use Illuminate\Http\Request;

class PatientsController extends Controller
{

	public function list() {
		return (new Patient())->list();
	}

	/* public function store(Request $request)
	{
		$req_patient = $request->input("newPatient");
		$req_assistant = $request->input("newAssistant");
		$req_consultation = $request->input("newConsultation");
		$req_treatment = $request->input("newTreatment");

		$is_found = Patient::where($req_patient)->first();
		if(!$is_found) {
			$new_patient = Patient::create($req_patient);

			$new_patient->assistant()->insert($req_assistant);
			$new_patient->treatment()->insert($req_treatment);

			$new_cause = $new_patient->cause()->create([
				"victime"  => $req_consultation["victime"],
				"vehicule" => $req_consultation["vehicule"],
				"securite" => $req_consultation["securite"],
				"autre"    => $req_consultation["autre"]
			]);
			$new_cause->driver()->insert([
				"nom"      => $req_consultation["nom"],
				"prenom"   => $req_consultation["prenom"],
				"contact"  => $req_consultation["contact"],
				"adresse"  => $req_consultation["adresse"],
				"cin"      => $req_consultation["cin"],
				"vehicule" => $req_consultation["vehicule"]
			]);

			return response()->json($new_patient, 200);
		}  else {
			return response()->json(["message" => "Already exist"], 409);
		}

	} */
}
