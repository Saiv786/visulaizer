<?php

namespace App\Http\Controllers;

use App\Tutorial;
use Artisan;
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
		if (Auth::check() && Auth::user()->isAdmin()) {

			return view('Tutorial.index', compact('tutorials'));
		} else {
			return view('Tutorial.user_index', ['tutorials' => $tutorials]);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
		return view('Tutorial.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		// $request->validate([
		// 	'name' => 'required',
		// 	'description' => 'required',
		// 	'code' => 'required',
		// ]);

		$detail = $request->get('description');

		$dom = new \domdocument();
		$dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
		$images = $dom->getelementsbytagname('img');

		//loop over img elements, decode their base64 src and save them to public folder,
		//and then replace base64 src with stored image URL.
		foreach ($images as $k => $img) {
			$data = $img->getattribute('src');

			list($type, $data) = explode(';', $data);
			list(, $data) = explode(',', $data);

			$data = base64_decode($data);
			$image_name = time() . $k . '.png';
			$path = public_path() . '/' . $image_name;

			file_put_contents($path, $data);

			$img->removeattribute('src');
			$img->setattribute('src', $image_name);
		}

		$detail = $dom->savehtml();

		$tutorial = new Tutorial([
			'name' => $request->get('topic'),
			'description' => $detail,
			'tryit_code' => $request->get('code'),
		]);
		$tutorial->save();
		// INFO($request);
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
		Artisan::call('view:clear');
		if (Auth::check() && Auth::user()->isAdmin()) {

			return view('Tutorial.view', ['tutorial' => $tutorial]);
		} else {
			return view('Tutorial.user_view', ['tutorial' => $tutorial]);
		}

	}
	public function tryit($tryit_code) {
		$compiler['output'] = "";
		$compiler['code'] = $tryit_code;

		return view('Compiler.index', ['compiler' => $compiler]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Tutorial  $tutorial
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Tutorial $tutorial) {
		//
		if (Auth::check() && Auth::user()->isAdmin()) {

			return view('Tutorial.admin_edit', ['tutorial' => $tutorial]);
		} else {
			return view('Tutorial.user_view', ['tutorial' => $tutorial]);
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

		$tutorial->name = $request->get('topic');
		$tutorial->description = $request->get('description');
		$tutorial->tryit_code = $request->get('code');
		$tutorial->save();

		return redirect('/tutorials')->with('success', 'Tutorial has been changed');
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
