<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\muertos;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\CovidCollection;
use App\Http\Resources\ShowResource;

class MuertosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {

    $muertos = muertos::all();
    if (! $muertos)
    {
    return response()->json(['errors'=>Array(['code'=>404,'message'=>'No se encuentra un fabricante con ese código.'])],404);
    }
        return new CovidCollection($muertos);
    }

    public function store(Request $request)
    {
    $muertos = new muertos();
    $muertos->fecha = $request->fecha;
    $muertos->id_ccaa = $request->id_ccaa;
    $muertos->numero = $request->numero;
    $muertos->save();
    return response()->json($muertos);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $muertos = DB::select(DB::raw("select * from muertos where fecha='$id'"));
        if (! $muertos)
        {
        return response()->json(['errors'=>Array(['code'=>404,'message'=>'No se encuentra esta fecha.'])],404);
        }
        return new ShowResource($muertos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
