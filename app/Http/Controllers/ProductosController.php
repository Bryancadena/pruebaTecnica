<?php

namespace App\Http\Controllers;

use App\Models\productos;
use Illuminate\Http\Request;

class productosController extends Controller
{
    //

    public function getProductos(){

        $select = 'productos.producto_id,productos.producto_nombre,productos.producto_referencia,productos.producto_precio,productos.producto_peso,bodega.bodega_stock,productos.producto_fecha';
        $productos = productos::select(explode(',', $select))
                                ->join('bodega', 'productos.producto_id', '=', 'bodega.fk_productos_id')
                                ->get();
                                
        return response()->json(['data' => $productos]);
    }

    public function createProductos(){

    }



    public function updateProductos(){

    }



    public function deleteProductos(){

    

    }




}
