<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\PatientResource;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\PatientCollection;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
	use HasFactory;

	protected $table = "patient";
	protected $guarded = [];
	public $timestamps = false;
	protected $casts = [
		'date_naiss' => 'date'
	];
	protected $primaryKey = 'id_patient';

	public function getDateNaissAttribute($birthdate)
	{
		return Carbon::parse($birthdate)->format('d F Y');
	}

	public function getNomPatientAttribute($lastname)
	{
		return Str::ucfirst($lastname);
	}

	public function getPrenomAttribute($firstname)
	{
		return Str::ucfirst($firstname);
	}

	public function getSexeAttribute($genre)
	{
		return $genre === "M" ? "Homme" : "Femme";
	}

	public function assistant()
	{
		return $this->belongsTo(Assistant::class);
	}

	public function cause()
	{
		return $this->hasOne(Cause::class);
	}

	public function treatment()
	{
		return $this->hasOne(Treatment::class);
	}

	public function list()
	{
		return response()->json((new PatientCollection($this->all())), Response::HTTP_OK);
	}

	private function mapPatientData(array $request)
	{
		return [
			'sexe' => $request['gender'],
			'nom_patient' => $request['firstname'],
			'prenom' => $request['lastname'],
			'date_naiss' => $request['birthdate'],
			'adresse' => $request['address'],
			'profession' => $request['job'],
			'remarque' => $request['observation']
		];
	}

	public function findPatient(array $request)
	{
		$attributes = $this->mapPatientData($request);
		return $this->where($attributes)->first();
	}

	public function createPatient(array $patient, int $assistant_id, int $cause_id): Patient
	{
		$attributes = $this->mapPatientData($patient);
		$attributes['age'] = Carbon::now()->diffInYears($attributes['date_naiss']);
		$attributes['id_accomp'] = $assistant_id;
		$attributes['id_cause'] = $cause_id;

		$id = DB::table('patient')->insertGetId($attributes);
		return $this->firstWhere("id_patient", $id);
	}

	public function storeNew(Request $request)
	{
		if (!$this->findPatient($request->patient)) {
			DB::transaction(function () use ($request) {
				$assistant_id = (new Assistant)
					->createRelatedAssistant($request->assistant);

				$driver_id = (new Driver)
					->createRelatedDriver($request->responsible_driver);

				$cause_id = (new Cause)
					->createRelatedCause($request->cause, $driver_id);

				$this->createPatient($request->patient, $assistant_id, $cause_id);
			});

			return response()->json((new PatientResource($this->all()->last())), Response::HTTP_OK);
		}

		return response()->json(["message" => "Already exist"], Response::HTTP_CONFLICT);
	}
}
