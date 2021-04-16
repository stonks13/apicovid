<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ccaas extends Migration
{
public function up()
{
Schema::create('ccaas', function (Blueprint $table) {
$table->id();
$table->string('nombre')->unique();
$table->integer('pais_id');
$table->foreign('pais_id')->references('id')->on('paises')->onDelete('cascade');
});
}

/**
* Reverse the migrations.
*
* @return void
*/
public function down()
{
Schema::table('ccaas', function ($table) {
$table->dropColumn('nombre');
});
}
}
