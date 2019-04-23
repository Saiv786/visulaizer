<?php

namespace App\Http\Controllers;
use App\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller {
	//
	public function index() {
		$quizz = \App\Quiz::all();
		return view('Quiz.index', ['quizz' => $quizz]);
	}

	public function create() {
		return view('Quiz.create');

	}
	public function show() {
		// $quiz = \App\Quiz::find(1)->with('answers')->get();
		// return view('Quiz.index', ['quiz' => $quiz]);

	}
	public function edit(Quiz $quiz) {

		return view('Quiz.edit', ['quiz' => $quiz]);

	}
	public function store(Request $request) {

		\Log::debug($request);
		$request->validate([
			'question' => 'required',
			'option1' => 'required',
			'option2' => 'required',
			'ans' => 'required',
		]);

		$quiz = new \App\Quiz([
			'question' => $request->get('question'),
			// 'description' => $request->get('description'),
			'is_active' => true,
		]);

		$quiz->save();
		$quiz->answers()->saveMany([
			new \App\Answer([
				'answer' => $request->get('option1'),
				'is_true' => true,
			]),
			new \App\Answer([
				'answer' => $request->get('option2'),
				'is_true' => false,
			]),
		]);
		// $ans = $quiz->answers()->create([
		// 	'question' => $request->get('question'),
		// 	'description' => $request->get('description'),
		// 	'is_true' => $request->get('is_true'),
		// ]);
		// return redirect('/tutorials')->with('success', 'Tutorial has been added');
		return redirect('/quiz')->with('success', 'Quiz has been added');
	}
}
