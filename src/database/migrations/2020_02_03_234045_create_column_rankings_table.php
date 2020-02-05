<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnRankingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('column_rankings', function (Blueprint $table) {
            $table->tinyInteger('rank')->comment('表示順');
            $table->integer('column_id')->comment('読み物ID');
        });
        // ALTER 文を実行しテーブルにコメントを設定
        DB::statement("ALTER TABLE column_rankings COMMENT '読み物ランキング'");
  }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('column_rankings');
    }
}
