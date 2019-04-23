<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Tutorial;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use View;

class Controller extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function __construct() {

		$tutorials = Tutorial::all();
		$quizes = Quiz::all();

		// View::share('variable1', $this->variable1);
		View::share('tutorials', $tutorials);
		View::share('quizes', $quizes);
		// View::share('variable3', 'I am Data 3');
		// View::share('variable4', ['name' => 'Franky', 'address' => 'Mars']);
	}
}
