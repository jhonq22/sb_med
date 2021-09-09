<?php

namespace App\Http\Controllers;

use App\Familiares;
use Illuminate\Http\Request;

class FamiliaresController extends Controller
{
    public function index()
    {
        $familiares =Familiares::orderBy('cedula', 'asc')->get();;
        echo json_encode($familiares);
    }





    

    
     public function store(Request $request)
    {
        $familiar = new Familiares();
        $familiar->cedula = $request->input('cedula');
        $familiar->nombres = $request->input('nombres');
        $familiar->apellidos = $request->input('apellidos');
        $familiar->telefono = $request->input('telefono');
        $familiar->fecha_nacimiento = $request->input('fecha_nacimiento');
        $familiar->direccion = $request->input('direccion');
        $familiar->user_id = $request->input('user_id');
        $familiar->saldo = $request->input('saldo');
       



  
      

        $familiar->save(); // para guardar en json

        echo json_encode($familiar); // para pasar en json
    }

   

    public function show($familiar_id)
    {
        $familiares =Familiares::find($familiar_id);
        echo json_encode($familiares);
    }
      

   
    public function update(Request $request, $familiar_id)
    {
        $familiar =Familiares::find($familiar_id);
        $familiar->cedula = $request->input('cedula');
        $familiar->nombres = $request->input('nombres');
        $familiar->apellidos = $request->input('apellidos');
        $familiar->telefono = $request->input('telefono');
        $familiar->fecha_nacimiento = $request->input('fecha_nacimiento');
        $familiar->direccion = $request->input('direccion');
        $familiar->user_id = $request->input('user_id');
        $familiar->saldo = $request->input('saldo');
       
      
        $familiar->save(); // para guardar en json

        echo json_encode($familiar); // para pasar en json
    }

  
    public function destroy($familiar_id)
    {
        $familiar =Familiares::find($familiar_id);
        $familiar->delete();
    }
}
