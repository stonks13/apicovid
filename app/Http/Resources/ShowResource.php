<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use App\Models\CCAAs;

class ShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

/*public function show($id)
{

$ia14 = ia14::where("fecha",$id)->first();
if (! $ia14)
{
return response()->json(['errors'=>Array(['code'=>404,'message'=>'No se encuentra un fabricante con ese código.'])],404);
}
return new ShowResource($ia14);
}*/

public function toArray($request)
	{

	$pais = DB::table('paises')
	->join('ccaas', 'paises.id', '=', 'ccaas.pais_id')
	->select('paises.*')
	->first();

	$ccaa = CCAAs::where('id',$this->id_ccaa)->first();
	//dd($ccaa);
	if (isset($this->incidencia)) {
		$valor = "incidencia";
	} else {
		$valor = "numero";
	}
	return [
	'fecha' => $this->fecha,
	'ccaa' => $ccaa->nombre,
	'pais' => $pais->nombre,
	$valor => $this->$valor,

	];
    }
}
