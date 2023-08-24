<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // ユーザー名
            $table->string('name');

            // ニックネーム
            $table->string('nickname')->nullable();

            // メールアドレス
            $table->string('email')->unique();

            // メールアドレス承認日時
            $table->timestamp('email_verified_at')->nullable();

            // パスワード
            $table->string('password');

            // ログイン持続認証トークン
            $table->rememberToken();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
