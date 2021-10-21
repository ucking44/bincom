<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncedLgaResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announced_lga_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lga_id');
            $table->unsignedBigInteger('party_id');
            $table->string('party_score');
            $table->string('entered_by_user');
            $table->string('user_ip_address');
            $table->timestamps();

            $table->foreign('lga_id')->references('id')->on('lga')->onDelete('cascade');
            $table->foreign('party_id')->references('id')->on('parties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announced_lga_results');
    }
}
