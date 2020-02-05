<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
          $table->increments('id')->comment('コメントID');
          $table->integer('event_id')->comment('イベントID');
          $table->integer('user_id')->comment('ユーザーID');
          $table->text('body')->nullable()->comment('本文');
          $table->tinyInteger('status')->comment('ステータス');
          $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('作成日');
          $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新日');

        });
        // ALTER 文を実行しテーブルにコメントを設定
        DB::statement("ALTER TABLE comments COMMENT 'コミュニティ内コメント'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
