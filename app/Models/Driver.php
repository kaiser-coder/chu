<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
