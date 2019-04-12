<?php

namespace App\Http\Controllers;

use App\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorialController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		// $tutorials = \DB::table('tutorials')->get();
		$tutorials = Tutorial::all();
		// info($tutorials);
		// return view('Tutorial.show', ['tutorials' => $tutorials]);
		return view('Tutorial.show', compact('tutorials'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
		return view('Tutorial.index');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

//		$request->validate([
		//			'name' => 'required',
		//			'description' => 'required',
		//			'code' => 'required',
		//		]);
		//
		$tutorial = new Tutorial([
			'name' => $request->get('topic'),
			'description' => $request->get('description'),
			'tryit_code' => $request->get('code'),
		]);
		$tutorial->save();
		INFO($request);
		return redirect('/tutorials')->with('success', 'Tutorial has been added');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Tutorial  $tutorial
	 * @return \Illuminate\Http\Response
	 */
	public function show(Tutorial $tutorial) {
		//
		if (Auth::check() && Auth::user()->isAdmin()) {
			\Log::debug(Auth::user()->isAdmin());
			return view('Tutorial.view', ['tutorial' => $tutorial]);
		} else {
			return view('Tutorial.user_show', ['tutorial' => $tutorial]);
		}

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Tutorial  $tutorial
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Tutorial $tutorial) {
		//
		// info($tutorial);
		if (Auth::check() && Auth::user()->isAdmin()) {

			return view('Tutorial.edit', ['tutorial' => $tutorial]);
		} else {
			return view('Tutorial.user_show', ['tutorial' => $tutorial]);
		}

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Tutorial  $tutorial
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Tutorial $tutorial) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Tutorial  $tutorial
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Tutorial $tutorial) {
		//
		// info('here');
		$tutorial->delete();

		return redirect('/tutorials')->with('success', 'Tutorial has been deleted Successfully');
	}
}
