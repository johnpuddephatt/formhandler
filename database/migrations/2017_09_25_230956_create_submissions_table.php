<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Submissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('_after')->nullable();
            $table->text('name')->nullable();
            $table->string('email')->nullable();
            $table->string('user_id')->nullable();
            $table->string('_subject')->nullable();
            $table->boolean('cc')->nullable();
            $table->boolean('bcc')->nullable();
            $table->boolean('message')->nullable();
            $table->string('form_data_raw')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Submissions');
    }
}
