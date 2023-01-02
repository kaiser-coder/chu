<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examiner;

class ExaminersController extends Controller
{
  public function store(Request $request)
	{
		return (new Examiner)->storeNew($request);
	}

	public function list()
	{
		return (new Examiner)->list();
	}

	public function update(Request $request, int $id)
	{
		return (new Examiner)->edit($request, $id);
	}
}
