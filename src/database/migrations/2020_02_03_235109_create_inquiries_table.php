<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
          $table->increments('id')->comment('問い合わせID');
          $table->integer('user_id')->nullable()->comment('ユーザーID');
          $table->string('name', 255)->nullable()->comment('名前');
          $table->string('email', 255)->nullable()->comment('メールアドレス');
          $table->tinyInteger('Inquiry_type')->nullable()->comment('問い合わせ種類');
          $table->text('body')->nullable()->comment('問い合わせ内容');
          $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('作成日');
          $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新日');

        });
        // ALTER 文を実行しテーブルにコメントを設定
        DB::statement("ALTER TABLE inquiries COMMENT '問い合わせ'");
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inquiries');
    }
}
