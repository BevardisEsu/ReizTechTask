<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up()
    {
        #Table scheme with selectors and status for checkin job status. Sends URL and status through JSON to POST
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->text('urls');           
            $table->text('selectors');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}