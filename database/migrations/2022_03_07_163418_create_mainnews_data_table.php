<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainnewsDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mainnews_data', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title', 120);
            $table->longText('content');
            $table->string('thumbnail',100);
            $table->string('author',10);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mainnews_data');
    }
}
