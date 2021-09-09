<?php

namespace App\Http\Controllers;

use App\FacturaCompra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FacturaCompraController extends Controller
{
    public function index()
    {
        $orden = DB::select("SELECT factura_compras.id, users.name, factura_compras.codigo_bcv, cedula_compra, factura_compras.user_id
        FROM factura_compras
        LEFT JOIN users ON user_id = users.id");

        echo json_encode($orden);
    }


    public function ListaFacturasPorUsuarios($user_id)
    {
        $orden = DB::select("SELECT numero_factura, precio_total, codigo_bcv, cedula_compra, observacion
        FROM factura_compras
        LEFT JOIN users ON user_id = users.id
        WHERE user_id = ?
        ", [$user_id]);

        echo json_encode($orden);
    }


    


    public function store(Request $request)
    {
        $orden = new FacturaCompra();
        $orden->numero_factura = $request->input('numero_factura');
        $orden->precio_total = $request->input('precio_total');
        $orden->codigo_bcv = $request->input('codigo_bcv');
        $orden->user_id = $request->input('user_id');
        $orden->cedula_compra = $request->input('cedula_compra');
        $orden->observacion = $request->input('observacion');
       
                      
         $orden->save(); // para guardar en json

        echo json_encode($orden); // para pasar en json
    }

    public function show($orden_id)
    {
        $ordens =FacturaCompra::find($orden_id);
        echo json_encode($ordens);
    }
      

   
    public function update(Request $request, $orden_id)
    {
        $orden =FacturaCompra::find($orden_id);
        $orden->numero_factura = $request->input('numero_factura');
        $orden->precio_total = $request->input('precio_total');
        //$orden->codigo_bcv = $request->input('codigo_bcv');
        //$orden->user_id = $request->input('user_id');
        //$orden->cedula_compra = $request->input('cedula_compra');
        $orden->observacion = $request->input('observacion');

      
        $orden->save(); // para guardar en json

        echo json_encode($orden); // para pasar en json
    }
}
