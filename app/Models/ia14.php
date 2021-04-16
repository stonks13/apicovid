<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ia14 extends Model
{
use HasFactory;
protected $table = 'ia14';

public $timestamps = false;
protected $fillable = ['fecha', 'ccaa_id', 'media'];
}
