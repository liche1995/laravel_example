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
        //change exist column properity
        Schema::table('test', function (Blueprint $table) {
            $table->string("something", 200)->change();
        });
        //add column
        Schema::table('test', function(Blueprint $table){
            $table->boolean("Y_or_N");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('test', function (Blueprint $table) {
            $table->string("something", 300)->change();
        });
        Schema::table('test', function(Blueprint $table){
            $table->dropColunm("Y_or_N");
        });
    }
};
