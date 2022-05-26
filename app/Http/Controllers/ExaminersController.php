<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examiner;

class ExaminersController extends Controller
{
  public function store(Request $request)
	{
		$new_examiner = [
			'examinateur' => $request->name
		];

		$stored = Examiner::firstOrCreate($new_examiner);
		return response()->json($stored, 200);
	}

	public function list()
	{
		$examiners = Examiner::get();
		return response()->json($examiners, 200);
	}
}
