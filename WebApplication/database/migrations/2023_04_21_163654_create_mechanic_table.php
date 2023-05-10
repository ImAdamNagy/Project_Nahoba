<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mechanic', function (Blueprint $table) {
            $table->id();
            $table->text("introduction");
            $table->string("country");
            $table->integer("postal_code");
            $table->string("city");
            $table->string("address");
            $table->string("profile_pic");
            $table->string("profession");
            $table->foreignId("user_id")->constrained("users","id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mechanic');
    }
};
