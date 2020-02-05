<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('column_tags', function (Blueprint $table) {
            $table->integer('column_id')->comment('読み物ID');
            $table->integer('tag_id')->comment('タグID');
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('作成日');
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新日');

            $table->unique(['column_id', 'tag_id']);
      });
      // ALTER 文を実行しテーブルにコメントを設定
      DB::statement("ALTER TABLE column_tags COMMENT '読み物タグ'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('column_tags');
    }
}
