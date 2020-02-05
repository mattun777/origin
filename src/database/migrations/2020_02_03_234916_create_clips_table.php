<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clips', function (Blueprint $table) {
          $table->increments('id')->comment('読み物クリップID');
          $table->integer('column_id')->comment('読み物ID');
          $table->integer('user_id')->comment('ユーザーID');
          $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('作成日');
          $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新日');

          $table->unique(['column_id', 'user_id']);
        });

        // ALTER 文を実行しテーブルにコメントを設定
        DB::statement("ALTER TABLE clips COMMENT '読み物クリップテーブル'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clips');
    }
}
