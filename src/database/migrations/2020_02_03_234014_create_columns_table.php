<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('columns', function (Blueprint $table) {
            $table->increments('id')->comment('読み物ID');
            $table->string('image', 255)->nullable()->comment('画像パス');
            $table->string('title', 255)->comment('読み物タイトル');
            $table->text('body')->nullable()->comment('本文');
            $table->string('slug', 255)->nullable()->comment('スラッグ');
            $table->tinyInteger('publish_status')->default(0)->comment('公開ステータス');
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('作成日');
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新日');
        });
        // ALTER 文を実行しテーブルにコメントを設定
        DB::statement("ALTER TABLE columns COMMENT '読み物管理'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('columns');
    }
}
