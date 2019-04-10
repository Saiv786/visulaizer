<?php

namespace App\Http\Controllers;

use App\Tutorial;
use Illuminate\Http\Request;

class CompilerController extends Controller {
	public function index() {
		$compiler['output'] = "";
		$compiler['code'] = "public class moeez {\n	public static void main(String[] args) {
		 testing t=new testing();
		 t.test(); \n } \n }:,: \npublic class testing {
	public void test(){
   		System.out.println(\"Hello Worlds\");
   	}
 }";

		return view('Compiler.index', ['compiler' => $compiler]);
	}
	public function create() {
		//
		return view('Tutorial.index');
	}
	public function store(Request $request) {

		$tryit_code = $request->get('code');
		exec("java -jar ~/NetBeansProjects/JavaApplication7/dist/JavaApplication7.jar '{$tryit_code}' 'Hello,testing' ", $out);
		$compiler['output'] = implode("\n", $out);
		$compiler['code'] = $tryit_code;
		// \Log::debug($compiler['output']);
		return view('Compiler.index', ['compiler' => $compiler]);

	}

	public function show(Tutorial $tutorial) {
		return view('Tutorial.view', ['tutorial' => $tutorial]);

	}

	public function edit(Tutorial $tutorial) {

	}
	public function update(Request $request, Tutorial $tutorial) {
		//
	}
	public function destroy(Tutorial $tutorial) {
		return redirect('/tutorials')->with('success', 'Tutorial has been deleted Successfully');
	}
}
