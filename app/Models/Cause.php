<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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

	public function scopeCreateRelativeDriver(Builder $query, array $driver)
	{
		return $query->driver()->insert($driver);
	}
}
