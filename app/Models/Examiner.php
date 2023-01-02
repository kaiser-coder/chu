<?php

namespace App\Models;

use Illuminate\Contracts\Support\Responsable;
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

	public function findUser(string $name)
	{
		return $this->where('examinateur', $name)->first();
	}

	public function storeNew(Request $request)
	{
		if ($this->findUser($request->name)) {
			return response([
				'message' => 'Already exist'
			], Response::HTTP_CONFLICT);
		} else {
			$examiner = $this->create([
				'examinateur' => $request->name
			]);

			return response( [
				'examiner' => new ExaminerResource($examiner)
			], Response::HTTP_CREATED);
		}
	}

	public function list()
	{
		return response([
			'examiners' => new ExaminerCollection($this->all())
		], Response::HTTP_OK);
	}
}
