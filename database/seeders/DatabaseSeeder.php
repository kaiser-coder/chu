<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		User::factory()
			->count(1)
			->create();

		try {
			$filename = dirname(__DIR__) . '/dump/chu.sql';
			DB::unprepared(\file_get_contents($filename));
		} catch (\Throwable $th) {
			throw $th;
		}
	}
}
