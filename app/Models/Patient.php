<?php

namespace App\Models;

use App\Http\Resources\PatientCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Response;

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
		return response(
			['patients' => new PatientCollection($this->all())],
				Response::HTTP_OK
		);
	}
}
