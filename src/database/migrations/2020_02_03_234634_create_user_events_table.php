<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_events', function (Blueprint $table) {
          $table->increments('id')->comment('ユーザーイベントID');
          $table->integer('user_id')->comment('ユーザーID');
          $table->integer('event_id')->comment('イベントID');
          $table->tinyInteger('application_status')->comment('応募ステータス');
          $table->tinyInteger('join_status')->default(0)->comment('参加ステータス');
          $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('作成日');
          $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新日');
        });
        // ALTER 文を実行しテーブルにコメントを設定
        DB::statement("ALTER TABLE user_events COMMENT 'ユーザーイベント'");
  }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_events');
    }
}
