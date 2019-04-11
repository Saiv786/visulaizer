<?php

use Illuminate\Database\Seeder;

class makeAdmin extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//
		$admin = new \App\User();
		$admin->name = "admin";
		$admin->email = "admin@admin.com";
		$admin->password = '$2y$10$RLKFI.hIbbtmOW5L0Ex0q.vR6hK0TtqUrBTGx8RWmvCeUrKLoCiCS';
		$admin->is_admin = true;
		$admin->save();

	}
}
