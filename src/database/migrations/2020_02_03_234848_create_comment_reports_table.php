<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_reports', function (Blueprint $table) {
          $table->increments('id')->comment('コミュニティ報告ID');
          $table->integer('comment_id')->comment('コメントID');
          $table->integer('user_id')->comment('ユーザーID');
          $table->tinyInteger('status')->comment('ステータス');
          $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('作成日');
          $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新日');

          $table->index(['comment_id', 'user_id']);
        });
        // ALTER 文を実行しテーブルにコメントを設定
        DB::statement("ALTER TABLE comment_reports COMMENT 'コミュニティ報告テーブル'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_reports');
    }
}
