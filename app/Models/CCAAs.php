<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CCAAs extends Model
{
use HasFactory;


protected $table = 'ccaas';

public $timestamps = false;
public function ia14(){
$this->hasMany("App\Models\Ia14");
}
public function ia7(){
$this->hasMany("App\Models\Ia7");
}
public function muertos(){
$this->hasMany("App\Models\Muertos");
}
public function casos(){
$this->hasMany("App\Models\Casos");
}
public function paises(){
$this->belongsTo("App\Models\Paises");
}
}
