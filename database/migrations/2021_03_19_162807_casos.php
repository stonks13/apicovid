<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Casos extends Migration
{
    public function up()
{
Schema::create('casos', function (Blueprint $table) {
$table->id();
$table->date('fecha');
$table->integer('id_ccaa');
$table->integer('numero');
$table->foreign('id_ccaa')->references('id')->on('ccaas')->onDelete('cascade');

});
}

/**
* Reverse the migrations.
*
* @return void
*/
public function down()
{
Schema::table('casos', function ($table) {
$table->dropColumn('fecha');
$table->dropColumn('id_ccaa');
$table->dropColumn('media');
});
}
}
