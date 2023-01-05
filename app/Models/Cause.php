<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cause extends Model
{
	use HasFactory;

	protected $table = "cause";
	protected $guarded = [];
	public $timestamps = false;

	public function patient()
	{
		return $this->belongsTo(Patient::class);
	}

	public function driver()
	{
		return $this->hasOne(Driver::class);
	}

	private function mapCauseData(array $request)
	{
		return [
			"victime" => $request['responsible_vehicle'],
			"vehicule" => $request['victim_category'],
			"securite" => $request['security'],
			"autre" => $request['others']
		];
	}

	public function createRelatedCause(array $cause, int $driver_id): int
	{
		$attributes = $this->mapCauseData($cause);
		$attributes['id_conducteur'] = $driver_id;
		return DB::table('cause')->insertGetId($attributes);
	}
}
