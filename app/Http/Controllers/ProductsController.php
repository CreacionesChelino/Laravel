<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        //consulta para mostrar los productos y ejecutar la funcion para que se inactiven cuando el stock sea igual a 0
        $products = Products::paginate(10);
        $products->each(function ($products) {
            $products->inactiveWhenStockZero();
            $products->activeWhenStockMoreThanZero();
        });


        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        $product = new Products();

        return view('products.create', compact('categories', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductsRequest $request
     * @return RedirectResponse
     */
    public function store(StoreProductsRequest $request): RedirectResponse
    {
        $images = $request->file('image');
        $images = \Storage::disk('public')->put('products', $images);

        Products::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'active' => $request->active,
            'stock' => $request->stock,
            'quantity' => $request->quantity,
            'image' => $images,
        ]);

        // dd($request->all());
        return redirect()->route('products.index')->with('message', 'Producto creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param Products $products
     * @return Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $product = Products::find($id);
        $categories = Category::select('id', 'name')->get();


        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductsRequest $request
     * @param Products $product
     * @return RedirectResponse
     */
    public function update(UpdateProductsRequest $request, $product)
    {
        $products = Products::find($product);
        $products->update($request->all());
        //dd($request->all());
        return redirect()->route('products.index')->with('messageUpdate', 'Producto actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Products $id
     * @return Response
     */
    public function destroy($id)
    {
        $products = Products::find($id);
        $products->delete();
        //dd($products);
        return redirect()->route('products.index')->with('messageDelete', 'Producto eliminado con éxito');
    }
}
