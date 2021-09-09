<?php

namespace App\Http\Controllers;

use App\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = DB::select("SELECT productos.id, producto, productos.url, nombre_empresa, descripcion
        FROM productos
        LEFT JOIN empresas ON empresa_id = empresas.id
        ORDER BY productos.id DESC");

        echo json_encode($productos);


    }


    

    
     public function store(Request $request)
    {
        $producto = new Productos();
        $producto->producto = $request->input('producto');
        $producto->url = $request->input('url');
        $producto->empresa_id = $request->input('empresa_id');
        $producto->descripcion = $request->input('descripcion');
       


  
      

        $producto->save(); // para guardar en json

        echo json_encode($producto); // para pasar en json
    }

   

    public function show($producto_id)
    {
        $productoas =Productos::find($producto_id);
        echo json_encode($productoas);
    }
      

   
    public function update(Request $request, $producto_id)
    {
        $producto =Productos::find($producto_id);
        $producto->producto = $request->input('producto');
        $producto->url = $request->input('url');
        $producto->empresa_id = $request->input('empresa_id');
        $producto->descripcion = $request->input('descripcion');
       
      
        $producto->save(); // para guardar en json

        echo json_encode($producto); // para pasar en json
    }

  
    public function destroy($producto_id)
    {
        $producto =Productos::find($producto_id);
        $producto->delete();
    }
}
