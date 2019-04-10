<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class quiz extends Model {

	public $table = "quizz";
	protected $dates = ['deleted_at'];

	public $fillable = [

		"answer",
		"description",
		"quiz_id",
		"is_true",
	];

	protected $casts = [
		"answer" => "string",
		"description" => "string",
		"quiz_id" => "int",
		"is_true" => "boolean",
	];

	//-----------------------------------------
	// Traits Start
	//-----------------------------------------
	use \Illuminate\Database\Eloquent\SoftDeletes;
	// use \Iatstuti\Database\Support\CascadeSoftDeletes;
	protected $cascadeDeletes = [];

	public function getUniqueColumns() {
		return [];
	}
	public function getResistableRelations() {
		return [];
	}
	//-----------------------------------------
	// Traits End
	//-----------------------------------------

	//-----------------------------------------
	// Relations Start
	//-----------------------------------------

	public function quiz() {
		return $this->belongsTo(\App\Quiz::class, 'quiz_id');
	}

	//-----------------------------------------
	// Relations End
	//-----------------------------------------

	//-----------------------------------------
	// Attributes Start
	//-----------------------------------------
	//-----------------------------------------
	// Attributes End
	//-----------------------------------------

	//-----------------------------------------
	// Scopes Start
	//-----------------------------------------
	//-----------------------------------------
	// Scopes End
	//-----------------------------------------

	//-----------------------------------------
	// Functions Start
	//-----------------------------------------
	//-----------------------------------------
	// Functions End
	//-----------------------------------------
}