<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('answers', function (Blueprint $table) {
			$table->increments('id');
			$table->text("answer");
			$table->text("description")->nullable();

			$table->integer('quiz_id')->unsigned()->nullable();
			$table->foreign('quiz_id')
				->references('id')->on('quizz')
				->onDelete('set null');
			$table->index(['quiz_id']);
			$table->boolean('is_true')->default(false);

			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('answers');
	}
}
