<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Resources\PatientResource;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\PatientCollection;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

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

	public function assistant()
	{
		return $this->belongsTo(Assistant::class, 'id_accomp');
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

	public function findPatient(array $request)
	{
		$attributes = $this->getPatientFormatedData($request);
		return $this->where($attributes)->first();
	}

	public function createRelativeAssistant(Model $patient, array $assistant)
	{
		$attributes = $this->getAssistantFormatedData($assistant);
		return $patient->assistant()->insert($attributes);
	}

	/* public function scopeCreateRelativeTreatment(Builder $query, array $treatment)
	{
		return $query->treatment()->insert($treatment);
	}

	public function scopeCreateRelativeCause(Builder $query, array $cause)
	{
		return $query->cause()->create($cause);
	} */

	private function getPatientFormatedData(array $request)
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

	private function getAssistantFormatedData(array $request)
	{
		return [
			'nom' => $request['fullname'],
			'adresse' => $request['address'],
			'contact' => $request['contact'],
		];
	}

	public function storePatient(array $patient)
	{
		$attributes = $this->getPatientFormatedData($patient);
		$attributes['age'] = Carbon::now()->diffInYears($attributes['date_naiss']);
		return $this->create($attributes);
	}

	public function storeNew(Request $request)
	{
		if(!$this->findPatient($request->patient)) {
			$created_patient = $this->storePatient($request->patient);

			$this->createRelativeAssistant($created_patient, $request->assistant);

			/*
			$created_cause = $created_patient->createRelativeCause($request->cause);
			$created_cause->createRelativeDriver($request->responsible_driver); */

			return response()->json((new PatientResource($created_patient->with('assistant'))), Response::HTTP_OK);
		}

		return response()->json(['message' => 'Resource not found'], Response::HTTP_NOT_FOUND);
	}
}
