<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ia14;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\CovidCollection;
use App\Http\Resources\ShowResource;


class Ia14Controller extends Controller
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
        $ia14 = DB::select(DB::raw("select * from ia14 where fecha='$id'"));
        if (! $ia14)
        {
            return response()->json(['errors'=>Array(['code'=>404,'message'=>'No se encuentra esta fecha.'])],404);
        }       
        return new ShowResource($ia14);
    }
    public function showAll()
    {

        $ia14 = ia14::all();
        if (! $ia14)
        {
            return response()->json(['errors'=>Array(['code'=>404,'message'=>'No se encuentra un fabricante con ese código.'])],404);   
        }
        return new CovidCollection($ia14);
    }

    public function store(Request $request)
    {
        $ia14 = new Ia14();
        $ia14->fecha = $request->fecha;
        $ia14->ccaa_id = $request->ccaa_id;
        $ia14->media = $request->media;
        $ia14->save();
        return response()->json($ia14);
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
    public function showPart($id1,$id2)
    {

    if ($id1 > $id2 )
        return response()->json(['errors'=>Array(['code'=>404,'message'=>'La fecha inicial es mayor'])],404);

        $ia14 = DB::select(DB::raw("select * from ia14 where fecha BETWEEN '$id1' and '$id2' "));

        if (! $ia14)
        {
            return response()->json(['errors'=>Array(['code'=>404,'message'=>'No se encuentra un fabricante con ese código.'])],404);
        }

        return new CovidCollection($ia14);

    }
}
