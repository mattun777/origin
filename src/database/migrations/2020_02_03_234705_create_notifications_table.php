<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
          $table->increments('id')->comment('通知ID');
          $table->integer('user_id')->comment('ユーザーID');
          $table->text('body')->nullable()->comment('本文');
          $table->string('url_path', 255)->nullable()->comment('URL Path');
          $table->boolean('is_read')->default(0)->comment('既読フラグ');
          $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('作成日');
          $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新日');

          $table->index(['is_read']);
        });
        // ALTER 文を実行しテーブルにコメントを設定
        DB::statement("ALTER TABLE notifications COMMENT '通知'");
  }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
