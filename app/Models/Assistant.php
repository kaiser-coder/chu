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

	public function patient()
	{
		return $this->belongsTo(Patient::class);
	}
}
