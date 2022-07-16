<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
	use HasFactory;

	protected $table = 'traitement';
	protected $guarded = [];
	public $timestamps = false;

	public function patient()
	{
		return $this->belongsTo(Patient::class);
	}
}
