<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Cause;
use App\Models\Driver;
use App\Models\Assistant;
use Illuminate\Http\Request;

class PatientController extends Controller
{

	public function list() {
		return (new Patient())->list();
	}

	public function store(Request $request)
	{
		return (new Patient)->storeNew($request);
	}
}
