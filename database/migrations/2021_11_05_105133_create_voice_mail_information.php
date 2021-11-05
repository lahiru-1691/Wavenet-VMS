<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoiceMailInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voice_mail_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subscriber_id');
            $table->integer('calle_id');
            $table->string('voice_mail_file_path');
            $table->dateTime('received_at');
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
        Schema::dropIfExists('voice_mail_informaation');
    }
}
