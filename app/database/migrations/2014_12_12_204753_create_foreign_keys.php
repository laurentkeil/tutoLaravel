<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration {

    public function up()
	{
		Schema::table('posts', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('post_tag', function(Blueprint $table) {
			$table->foreign('post_id')->references('id')->on('posts')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('post_tag', function(Blueprint $table) {
			$table->foreign('tag_id')->references('id')->on('tags')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('posts', function(Blueprint $table) {
			$table->dropForeign('posts_user_id_foreign');
		});
		Schema::table('post_tag', function(Blueprint $table) {
			$table->dropForeign('post_tag_post_id_foreign');
		});
		Schema::table('post_tag', function(Blueprint $table) {
			$table->dropForeign('post_tag_tag_id_foreign');
		});
	}
}