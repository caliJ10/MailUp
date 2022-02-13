<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Requests\SaveProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        //preguntamos si se esta buscando por nombre o no
        if ($request->filled('name')) {
            //traemos los registos que coinciden con el nombre buscado
            $products = Product::where('name', 'like', '%'. $request->name. '%')
                ->get();
        }
        else{
            //traemos todos los registros
            $products = Product::all();
        }
        return $products;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SaveProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProductRequest $request)
    {
        //SaveProductRequest valida los datos segun las reglas establecidas en Request->SaveProductRequest
        $product = Product::create($request->all());
        return response()->json([
            'res' => true,
            'message' => 'Registro insertado correctamente'
        ], 200);

        
        //return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProductRequest $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //UpdateProductRequest valida los datos segun las reglas establecidas en Request->UpdateProductRequest
        $product->update($request->all());
        return response()->json([
            'res' => true,
            'message' => 'Registro actualizado correctamente'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json([
            'res' => true,
            'message' => 'Registro eliminado correctamente'
        ], 200);
    }
}
