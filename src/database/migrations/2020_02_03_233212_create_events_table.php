<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id')->comment('イベントID');
            $table->string('image', 255)->nullable()->comment('画像パス');
            $table->string('title', 255)->comment('イベントタイトル');
            $table->text('body')->nullable()->comment('本文');
            $table->string('place', 255)->nullable()->comment('開催場所');
            $table->dateTime('started_at')->nullable()->comment('開始日時');
            $table->dateTime('finished_at')->nullable()->comment('終了日時');
            $table->dateTime('expired_at')->nullable()->comment('締切日時');
            $table->string('belongings', 255)->nullable()->comment('持ち物');
            $table->integer('participation_fee')->length(11)->nullable()->comment('参加費用');
            $table->integer('application_limit')->length(11)->nullable()->comment('応募上限数');
            $table->tinyInteger('lottery_type')->default(0)->comment('抽選種別');
            $table->tinyInteger('application_status')->default(0)->comment('募集ステータス');
            $table->tinyInteger('publish_status')->default(0)->comment('公開ステータス');
            $table->dateTime('display_date')->nullable()->comment('公開日時');
            $table->string('slug', 255)->nullable()->comment('スラッグ');
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('作成日');
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新日');
        });
        // ALTER 文を実行しテーブルにコメントを設定
        DB::statement("ALTER TABLE events COMMENT 'イベントマスタ'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
