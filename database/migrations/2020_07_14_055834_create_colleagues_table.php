<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColleaguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colleagues', function (Blueprint $table) {
            $table->id();
            $table->string("full_name");
            $table->string("country");
            $table->string("work_country");
            $table->string("office_name");
            $table->string("position");
            $table->string("phone1")->nullable();
            $table->string("phone2")->nullable();
            $table->string("phone3")->nullable();
            $table->string("email")->unique();
            $table->string("website")->nullable();
            $table->string("address");
            $table->tinyInteger("status")->default(1);
            $table->bigInteger("religion_id")->unsigned()->nullable();
            $table->timestamps();


            $table->foreign("religion_id")->references("id")->on("religions")->onDelete("set null")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colleagues');
    }
}
