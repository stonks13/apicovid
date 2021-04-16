<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ia7;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\CovidCollection;
use App\Http\Resources\ShowResource;

class Ia7Controller extends Controller
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ia7 = DB::select(DB::raw("select * from ia7 where fecha='$id'"));
        if (! $ia7)
        {
        return response()->json(['errors'=>Array(['code'=>404,'message'=>'No se encuentra esta fecha.'])],404);
        }
        return new ShowResource($ia7);
    }
    public function showAll()
    {

    $ia7 = ia7::all();
    if (! $ia7)
    {
    return response()->json(['errors'=>Array(['code'=>404,'message'=>'No se encuentra un fabricante con ese código.'])],404);
    }
        return new CovidCollection($ia7);
    }

    public function store(Request $request)
    {
    $ia7 = new Ia7();
    $ia7->fecha = $request->fecha;
    $ia7->id_ccaa = $request->id_ccaa;
    $ia7->incidencia = $request->incidencia;
    $ia7->save();
    return response()->json($ia7);
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
