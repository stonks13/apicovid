<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
use HasFactory;

protected $table = 'paises';

public $timestamps = false;
public function ccaas(){
$this->hasMany("App\Models\CCAAs");
}

}
