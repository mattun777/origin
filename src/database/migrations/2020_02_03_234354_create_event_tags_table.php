<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_tags', function (Blueprint $table) {
          $table->integer('event_id')->comment('イベントID');
          $table->integer('tag_id')->comment('タグID');
          $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('作成日');
          $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新日');

          $table->unique(['event_id', 'tag_id']);
        });
        // ALTER 文を実行しテーブルにコメントを設定
        DB::statement("ALTER TABLE event_tags COMMENT 'イベントタグ'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_tags');
    }
}
