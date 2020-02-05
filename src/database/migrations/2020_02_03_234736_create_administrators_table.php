<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrators', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nickname', 15)->nullable()->comment('ニックネーム');
          $table->string('name', 255)->comment('名前');
          $table->string('email', 255)->unique()->comment('メールアドレス');
          $table->string('password', 255)->comment('パスワード');
          $table->string('profile', 255)->nullable()->comment('プロフィール');
          $table->string('image', 255)->nullable()->comment('画像パス');
          $table->rememberToken();
          $table->tinyInteger('status')->default(0)->comment('ステータス');
          $table->timestamp('email_verified_at')->nullable();
          $table->timestamps();
        });
        // ALTER 文を実行しテーブルにコメントを設定
        DB::statement("ALTER TABLE administrators COMMENT '管理ユーザー'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administrators');
    }
}
