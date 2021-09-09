<?php

namespace App\Http\Controllers;

use App\Ordencompra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdencompraController extends Controller
{
    public function index()
    {
        $orden = DB::select("SELECT orden_compra.id, codigo_bcv, cedula_compra, precio, cantidad, producto, estatus_orden, users.name
        FROM orden_compra
        LEFT JOIN productos ON producto_id = productos.id
        LEFT JOIN users ON user_id = users.id
        LEFT JOIN estatus_compra ON estatu_id = estatus_compra.id
        ORDER BY orden_compra.id DESC");

        echo json_encode($orden);
    }


    public function OrdenesPorCodigoBCV($codigo_bcv)
    {
        $orden = DB::select("SELECT orden_compra.id, codigo_bcv, cedula_compra, precio, cantidad, producto, estatus_orden, users.name
        FROM orden_compra
        LEFT JOIN productos ON producto_id = productos.id
        LEFT JOIN users ON user_id = users.id
        LEFT JOIN estatus_compra ON estatu_id = estatus_compra.id
        WHERE orden_compra.codigo_bcv = ?
        ORDER BY orden_compra.id DESC", [$codigo_bcv]);

        echo json_encode($orden);
    }




    public function listadoComprasPorUsuario($user_id)
    {
        $orden = DB::select("SELECT orden_compra.id, estatu_id , codigo_bcv , producto, cedula_compra, precio, estatus_orden, users.name, orden_compra.created_at as fecha_compra
        FROM orden_compra
        LEFT JOIN productos ON producto_id = productos.id
        LEFT JOIN users ON user_id = users.id
        LEFT JOIN estatus_compra ON estatu_id = estatus_compra.id
        WHERE users.id = ?
        ORDER BY orden_compra.id DESC
     ", [$user_id]);

        echo json_encode($orden);
    }


    public function listadoComprasPorUsuarioEnEspera($user_id)
    {
        $orden = DB::select("SELECT orden_compra.id, codigo_bcv, producto, cedula_compra, precio, estatus_orden, users.name, orden_compra.created_at as fecha_compra
        FROM orden_compra
        LEFT JOIN productos ON producto_id = productos.id
        LEFT JOIN users ON user_id = users.id
        LEFT JOIN estatus_compra ON estatu_id = estatus_compra.id
        WHERE users.id = ?
        ORDER BY orden_compra.id DESC
     ", [$user_id]);

        echo json_encode($orden);
    }


    public function listadoComprasPorUsuarioEnAceptado($user_id)
    {
        $orden = DB::select("SELECT orden_compra.id, factura_compras.id as id_factura, orden_compra.codigo_bcv, producto, orden_compra.cedula_compra, precio, estatus_orden, users.name, orden_compra.created_at as fecha_compra 
        FROM factura_compras
        LEFT JOIN users ON factura_compras.user_id = users.id
        LEFT JOIN orden_compra ON orden_compra.user_id = users.id
        LEFT JOIN productos ON orden_compra.producto_id = productos.id
        LEFT JOIN estatus_compra ON estatu_id = estatus_compra.id
        WHERE users.id = ? AND orden_compra.estatu_id = 2
     ", [$user_id]);

        echo json_encode($orden);
    }




    public function listadoComprasEnEspera()
    {
        $orden = DB::select("SELECT DISTINCT user_id, codigo_bcv , cedula_compra, estatu_id, users.name, estatus_orden
        FROM orden_compra
        LEFT JOIN productos ON producto_id = productos.id
        LEFT JOIN users ON user_id = users.id
        LEFT JOIN estatus_compra ON estatu_id = estatus_compra.id
        WHERE estatu_id = 1
        ORDER BY orden_compra.id DESC");

        echo json_encode($orden);
    }


    public function listadoComprasEnEsperaUsuario()
    {
        $orden = DB::select("SELECT orden_compra.id, user_id, producto, descripcion, codigo_bcv , cedula_compra, estatu_id, users.name, estatus_orden
        FROM orden_compra
        LEFT JOIN productos ON producto_id = productos.id
        LEFT JOIN users ON user_id = users.id
        LEFT JOIN estatus_compra ON estatu_id = estatus_compra.id
        WHERE estatu_id = 1
        ORDER BY orden_compra.id DESC");

        echo json_encode($orden);
    }





    

    
     public function store(Request $request)
    {
        $orden = new Ordencompra();
        $orden->producto_id = $request->input('producto_id');
        $orden->estatu_id = $request->input('estatu_id');
        $orden->user_id = $request->input('user_id');
        $orden->cedula_compra = $request->input('cedula_compra');
        $orden->cantidad = $request->input('cantidad');
        $orden->precio = $request->input('precio');
        $orden->codigo_bcv = $request->input('codigo_bcv');
        
        //$orden->cedula_compra = $request->input('cedula_compra');
       
       


  
      

        $orden->save(); // para guardar en json

        echo json_encode($orden); // para pasar en json
    }

   

    public function show($orden_id)
    {
        $ordens =Ordencompra::find($orden_id);
        echo json_encode($ordens);
    }
      

   
    public function update(Request $request, $orden_id)
    {
        $orden =Ordencompra::find($orden_id);
       //$orden->producto_id = $request->input('producto_id');
        $orden->estatu_id = $request->input('estatu_id');
        $orden->cantidad = $request->input('cantidad');
        $orden->precio = $request->input('precio');
        $orden->codigo_bcv = $request->input('codigo_bcv');
        //$orden->user_id = $request->input('user_id');

      
        $orden->save(); // para guardar en json

        echo json_encode($orden); // para pasar en json
    }

  
    public function destroy($orden_id)
    {
        $orden =Ordencompra::find($orden_id);
        $orden->delete();
    }
}
