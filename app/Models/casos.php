<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class casos extends Model
{
	use HasFactory;
	protected $table = 'casos';

	public $timestamps = false;
	protected $fillable = ['fecha', 'ccaa_id', 'media'];
}
