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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            // 送付先氏名
            $table->string('name');

            // 郵便番号
            $table->string('postal_code');

            // 都道府県
            $table->string('prefecture');

            // 住所1(市区町村)
            $table->string('address_line_1');

            // 住所2(丁目, 番地, 号)
            $table->string('address_line_2');

            // 建物名, 会社名
            $table->string('building')->nullable();

            // 部屋番号
            $table->string('room_number')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
};
