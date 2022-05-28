<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Cause;
use App\Models\Driver;
use App\Models\Assistant;
use Illuminate\Http\Request;

class PatientsController extends Controller
{

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$new_patient = Patient::firstOrCreate($request->only(['newPatient']));
		$new_patient->assistant()->firstOrCreate($request->only(['newAssistant']));
		$new_patient->treatment()->firstOrCreate($request->only(['newAssistant']));

		$new_cause = $new_patient->cause()->firstOrCreate($request->only([
			'newConsultation.victime',
			'newConsultation.vehicule',
			'newConsultation.securite',
			'newConsultation.autre'
		]));
		$new_cause->driver()->firstOrCreate($request->only([
			'newConsultation.nom',
			'newConsultation.prenom',
			'newConsultation.contact',
			'newConsultation.adresse',
			'newConsultation.cin',
			'newConsultation.vehicule',
		]));

		return response()->json($new_patient, 200);
	}
}
