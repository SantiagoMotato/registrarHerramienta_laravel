<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $equipo = Equipo::all();
            return response()->json($equipo, 200);
        }catch (\Exception $e){
            return response()->json(['msg'=>'Error en el processo'], $e);
        }
    }

    public function store(Request $request)
    {
        try{
            $request -> validate([
                'num_referencia' => 'required|string',
                'nombre' => 'required|string',
                'fecha_adquisicion' => 'required|string',
                'descripcion' => 'required|string',
                'tipo_equipo' => 'required|string',
                'estado' => 'required|string'
            ]);

            $equipo = Equipo::create([
                'num_referencia' => $request->num_referencia,
                'nombre' => $request->nombre,
                'fecha_adquisicion' => $request->fecha_adquisicion,
                'descripcion' => $request->descripcion,
                'tipo_equipo' => $request->tipo_equipo,
                'estado' => $request->estado,
            ]);

            return response()-> json($equipo, 201);
        }catch(\Exception $e){
            return response()->json(['msg'=>'Error en la execution'], $e);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
        try{
            $equipo = Equipo::findOrFail($id)-> update($request->all());
            return response()-> json($equipo, 200);
        }catch(\Exception $e){
            return response()-> json(['msg'=>'error en la ejecucion Update'], $e);
        }
    }

    public function destroy(string $id)
    {
        //
    }
}
