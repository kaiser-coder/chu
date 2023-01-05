<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assistant extends Model
{
	use HasFactory;

	protected $table = "accompagnant";
	protected $guarded = [];
	public $timestamps = false;
	protected $primaryKey = 'id_accomp';

	public function patient()
	{
		return $this->hasOne(Patient::class, 'id_accomp');
	}

	private function mapAssistantData(array $request)
	{
		return [
			'nom' => $request['fullname'],
			'adresse' => $request['address'],
			'contact' => $request['contact'],
		];
	}

	public function createRelatedAssistant(array $assistant): int
	{
		$attributes = $this->mapAssistantData($assistant);
		return DB::table('accompagnant')->insertGetId($attributes);
	}
}
