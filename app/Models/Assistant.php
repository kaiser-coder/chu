<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
