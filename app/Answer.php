<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model {

	// public $table = "answers";
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