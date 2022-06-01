<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sakes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('sakename');//銘柄名
            $table->string('prefecturename');//都道府県
            $table->bigInteger('scent')->length(10);//香り
            $table->bigInteger('acidity')->length(10);//酸味
            $table->bigInteger('taste')->length(10);//味の濃さ
            $table->bigInteger('sweetness')->length(10);//甘辛
            $table->bigInteger('score')->length(10);//総合点
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sakes');
    }
}
