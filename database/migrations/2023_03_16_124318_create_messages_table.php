<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('to_id')->constrained('users')->onDelete('cascade');
            $table->text('msg');
            $table->boolean('has_dropDown')->default(false);
            $table->json('has_images')->nullable();
            $table->json('has_files')->nullable();
            $table->dateTime('datetime');
            $table->unsignedTinyInteger('isReplied')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
}