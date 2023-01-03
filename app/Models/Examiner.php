<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\ExaminerResource;
use App\Http\Resources\ExaminerCollection;


class Examiner extends Model
{
	use HasFactory;

	protected $table = "medecin";
	protected $fillable = ['examinateur'];
	public $timestamps = false;

	public function findUserByName(string $name)
	{
		return $this->where('examinateur', $name)->first();
	}

	public function storeNew(Request $request)
	{
		if ($this->findUserByName($request->name)) {
			return response()->json([
				'message' => 'Already exist'
			], Response::HTTP_CONFLICT);
		} else {
			$examiner = $this->create([
				'examinateur' => $request->name
			]);

			return response()->json((new ExaminerResource($examiner)), Response::HTTP_CREATED);
		}
	}

	public function list()
	{
		return response()->json((new ExaminerCollection($this->all())), Response::HTTP_OK);
	}

	public function edit(Request $request, int $id)
	{
		$examiner = $this->where('id_medecin', $id)->update([
			'examinateur' => $request->name
		]);

		if($examiner === 0) {
			return response()->json([
				'message' => 'Resource not found'
			], Response::HTTP_NOT_FOUND);
		}

		return response()->json([
			'message' => 'Updated successfully'
		], Response::HTTP_OK);
	}
}
