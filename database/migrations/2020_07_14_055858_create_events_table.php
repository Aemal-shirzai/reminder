<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("message");
            $table->bigInteger("religion_id")->unsigned();
            $table->timestamp("date");
            $table->tinyInteger("status")->default(0);
            $table->timestamps();

            $table->foreign("religion_id")->references("id")->on("religions")->onDelete("cascade")->onUpdate("cascade");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
