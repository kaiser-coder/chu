<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model
{
	use HasFactory;

	protected $table = "conducteur";
	protected $guarded = [];
	public $timestamps = false;

	public function cause()
	{
		return $this->belongsTo(Cause::class);
	}

	private function mapDriverData(array $request)
	{
		return [
			"nom" => $request["lastname"],
			"prenom" => $request["firstname"],
			"contact" => $request["contact"],
			"adresse" => $request["address"],
			"cin" => $request["identity_card"],
			"vehicule" => $request["vehicle"]
		];
	}

	public function createRelatedDriver(array $driver): int
	{
		$attributes = $this->mapDriverData($driver);
		return DB::table('conducteur')->insertGetId($attributes);
	}
}
