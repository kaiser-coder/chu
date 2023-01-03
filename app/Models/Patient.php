<?php

namespace App\Models;

use App\Http\Resources\PatientResource;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\PatientCollection;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class Patient extends Model
{
	use HasFactory;

	protected $table = "patient";
	protected $guarded = [];
	public $timestamps = false;

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
			$createdPatient = $this->create($request->only('patient'));

			$createdPatient
				->scopeCreateRelativeAssistant($request->only('assistant'))
				->scopeCreateRelativeTreatment($request->only('treatment'));

			$createdCause = $createdPatient->scopeCreateRelativeCause($request->only('cause'));
			$createdCause->scopeCreateRelativeDriver($request->only('driver'));

			return response()->json((new PatientResource($createdPatient)), Response::HTTP_OK);
		}

		return response()->json(['message' => 'Resource not found'], Response::HTTP_NOT_FOUND);
	}
}
