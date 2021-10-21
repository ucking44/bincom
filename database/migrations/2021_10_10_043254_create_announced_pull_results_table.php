<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncedPullResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announced_pull_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pulling_unit_id');
            $table->unsignedBigInteger('party_id');
            $table->string('party_score');
            $table->string('entered_by_user');
            $table->string('user_ip_address');
            $table->timestamps();

            $table->foreign('pulling_unit_id')->references('id')->on('polling_units')->onDelete('cascade');
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
        Schema::dropIfExists('announced_pull_results');
    }
}
