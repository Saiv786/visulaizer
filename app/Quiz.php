<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model {

	public $table = "quizz";
	protected $dates = ['deleted_at'];

	public $fillable = [

		"question",
		"description",
		"is_active",
	];

	protected $casts = [
		"question" => "string"
		, "description" => "string"
		, "is_active" => "boolean",
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

	public function answers() {
		return $this->hasMany(\App\Answer::class, 'quiz_id');
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