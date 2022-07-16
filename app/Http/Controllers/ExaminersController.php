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

		$found = Examiner::where($new_examiner)->first();
		if($found) {
			return response()->json(null, 409);
		} else {
			$new_examiner = Examiner::create($new_examiner);
			return response()->json($new_examiner, 200);
		}
	}

	public function list()
	{
		$examiners = Examiner::get();
		return response()->json($examiners, 200);
	}
}
