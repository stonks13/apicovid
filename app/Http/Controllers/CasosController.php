<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\casos;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\CovidCollection;
use App\Http\Resources\ShowResource;

class CasosController extends Controller
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

    $casos = casos::all();
    if (! $casos)
    {
    return response()->json(['errors'=>Array(['code'=>404,'message'=>'No se encuentra un fabricante con ese código.'])],404);
    }
        return new CovidCollection($casos);
    }

    public function store(Request $request)
    {
    $casos = new casos();
    $casos->fecha = $request->fecha;
    $casos->id_ccaa = $request->id_ccaa;
    $casos->numero = $request->numero;
    $casos->save();
    return response()->json($casos);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $casos = DB::select(DB::raw("select * from casos where fecha='$id'"));
        if (! $casos)
        {
        return response()->json(['errors'=>Array(['code'=>404,'message'=>'No se encuentra esta fecha.'])],404);
        }
        return new ShowResource($casos);
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
