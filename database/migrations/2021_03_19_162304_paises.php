<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Paises extends Migration
{
    public function up()
{
Schema::create('paises', function (Blueprint $table) {
$table->id();
$table->string('nombre')->unique();
});
}

/**
* Reverse the migrations.
*
* @return void
*/
public function down()
{
Schema::table('paises', function ($table) {
$table->dropColumn('nombre');
});
}
}