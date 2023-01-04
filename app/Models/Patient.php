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

	public function getDateNaissAttribute($birthdate)
	{
		return Carbon::parse($birthdate)->format('d F Y');
	}

	public function getNomPatientAttribute($lastname)
	{
		return Str::ucfirst($lastname);
	}

	public function setAgeAttribute($age)
	{
		$this->attributes['age'] = Carbon::now()->diffInYears($this->attributes['date_naiss']);
	}

	public function getPrenomAttribute($firstname)
	{
		return Str::ucfirst($firstname);
	}

	public function assistant()
	{
		return $this->hasOne(Assistant::class);
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

	public function findPatient(Request $request)
	{
		return $this->where($request);
	}

	public function scopeCreateRelativeAssistant(Builder $query, array $assistant)
	{
		return $query->assistant()->insert($assistant);
	}

	public function scopeCreateRelativeTreatment(Builder $query, array $treatment)
	{
		return $query->treatment()->insert($treatment);
	}

	public function scopeCreateRelativeCause(Builder $query, array $cause)
	{
		return $query->cause()->create($cause);
	}

	public function storeNew(Request $request)
	{
		if($this->findPatient($request->input('patient'))) {
			$created_patient = $this->create($request->only('patient'));

			$created_patient
				->createRelativeAssistant($request->only('assistant'))
				->createRelativeTreatment($request->only('treatment'));

			$created_cause = $created_patient->createRelativeCause($request->only('cause'));
			$created_cause->createRelativeDriver($request->only('driver'));

			return response()->json((new PatientResource($created_patient)), Response::HTTP_OK);
		}

		return response()->json(['message' => 'Resource not found'], Response::HTTP_NOT_FOUND);
	}
}
