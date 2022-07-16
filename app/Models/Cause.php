<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
