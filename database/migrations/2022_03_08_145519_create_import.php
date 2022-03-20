<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create ( 'companies', function ($table) {
            $table->id( 'id' );
            $table->string ( 'title' );
            $table->longText ( 'content')->nullable();
            $table->text ( 'excerpt' )->nullable();
            $table->datetime( 'date' );
            $table->text ( 'address' )->nullable();
            $table->text ( 'address_link' )->nullable();
            $table->text ( 'contacts' )->nullable();
            $table->text ( 'emails' )->nullable();
            $table->text ( 'social_links' )->nullable();
            $table->text ( 'about_company' )->nullable();
            $table->text ( 'additional_information' )->nullable();
            $table->text ( 'services_list' )->nullable();
            $table->text ( 'links' )->nullable();
            $table->text ( 'boss_initials' )->nullable();
            $table->text ( 'boss_position' )->nullable();
            $table->text ( 'loyalty_programs' )->nullable();
            $table->text ( 'payments' )->nullable();
            $table->text ( 'categories' )->nullable();
            $table->text ( 'tags' )->nullable();
            $table->text ( 'image' )->nullable();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('import');
    }
}
