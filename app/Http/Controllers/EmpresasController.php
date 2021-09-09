<?php

namespace App\Http\Controllers;

use App\Empresas;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    public function index()
    {
        $empresas =Empresas::orderBy('nombre_empresa', 'asc')->get();;
        echo json_encode($empresas);
    }





    

    
     public function store(Request $request)
    {
        $empres = new Empresas();
        $empres->nombre_empresa = $request->input('nombre_empresa');
        $empres->telefono_empresa = $request->input('telefono_empresa');
        $empres->estado_id = $request->input('estado_id');
        $empres->direccion = $request->input('direccion');
        $empres->url = $request->input('url');


  
      

        $empres->save(); // para guardar en json

        echo json_encode($empres); // para pasar en json
    }

   

    public function show($empres_id)
    {
        $empresas =Empresas::find($empres_id);
        echo json_encode($empresas);
    }
      

   
    public function update(Request $request, $empres_id)
    {
        $empres =Empresas::find($empres_id);
        $empres->nombre_empresa = $request->input('nombre_empresa');
        $empres->telefono_empresa = $request->input('telefono_empresa');
        $empres->estado_id = $request->input('estado_id');
        $empres->direccion = $request->input('direccion');
        $empres->url = $request->input('url');

      
        $empres->save(); // para guardar en json

        echo json_encode($empres); // para pasar en json
    }

  
    public function destroy($empres_id)
    {
        $empres =Empresas::find($empres_id);
        $empres->delete();
    }
}
