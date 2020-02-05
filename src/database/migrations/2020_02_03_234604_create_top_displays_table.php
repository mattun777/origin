<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopDisplaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_displays', function (Blueprint $table) {
          $table->tinyInteger('order_num')->default(0)->comment('並び順');
          $table->tinyInteger('post_type')->comment('投稿タイプ');
          $table->integer('item_id')->comment('機能別ID');
          $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('作成日');
          $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新日');

        });
        // ALTER 文を実行しテーブルにコメントを設定
        DB::statement("ALTER TABLE top_displays COMMENT 'トップ表示設定'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('top_displays');
    }
}
