<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subirArchivo(Request $request)
    {
        Storage::disk('public')->put($request->get('path'), file_get_contents($request->file('file')->getRealPath()));
        return $request->get('path');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function crearSolicitud(Request $request)
    {
        $id = DB::table('solicituds')->insertGetId(
            ['nombre' => $request->get('nombre'), 'puesto' => $request->get('puesto'), 'status' => 'Pendiente']
        );
        return $id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function obtenerSolicitudes()
    {
        $solicitudes = DB::table('solicituds')->get();
        for ($i = 0; $i < count($solicitudes); $i++) {
            $solicitudes[$i]->documento = Storage::url('solicitudes/'.$solicitudes[$i]->id.'/cv.pdf');
        }
        return $solicitudes;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editarStatus(Request $request)
    {
        $solicitud = DB::table('solicituds')
            ->where('id', $request->get('id'))
            ->update(['status' => $request->get('status')]);
        return $solicitud;
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
