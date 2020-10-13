<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration {
    public function up() {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('creator_id')->unsinged();
            $table->text('title'); //Char limit?
            $table->text('description'); //Char limit?
            $table->text('status'); //Open, on hold, pending/in progress, backlog, closed, resolved. Enumeration rather?
            $table->text('priority'); //High medium low. Enumeration rather?
            $table->integer('agent_id')->unsigned()->nullable();
            $table->timestamps();
            //Maybe a resolved at or closed at or both??

            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade'); //Check out ondelete and on update methods.
            $table->foreign('agent_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('tickets');
    }
}
