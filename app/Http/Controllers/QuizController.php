<?php

namespace App\Http\Controllers;

class QuizController extends Controller {
	//
	public function index() {
		return view('Quiz.index');
	}

	public function create() {
		return view('Quiz.create');

	}
}
