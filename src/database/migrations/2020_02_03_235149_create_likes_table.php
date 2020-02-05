<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
          $table->increments('id')->comment('いいねID');
          $table->integer('column_id')->comment('読み物ID');
          $table->integer('user_id')->comment('ユーザーID');
          $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('作成日');
          $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新日');

          $table->unique(['column_id', 'user_id']);
        });
        // ALTER 文を実行しテーブルにコメントを設定
        DB::statement("ALTER TABLE likes COMMENT 'いいね'");
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
