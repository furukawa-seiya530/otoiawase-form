<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content', 255);
            $table->timestamps();
        });

        DB::table('categories')->insert([
            ['id' => 1, 'content' => '商品のお届けについて', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'content' => '商品の交換について', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'content' => '商品トラブル', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'content' => 'ショップへのお問い合わせ', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'content' => 'その他', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
