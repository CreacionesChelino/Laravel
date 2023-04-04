<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalesRequest;
use App\Http\Requests\UpdateSalesRequest;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Products;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
       //hace la consulta a la base de datos y trae todos los registros de la tabla sales y los ordena por id y busca el usuario que hizo la venta y el producto que se vendio
        $sales = Sales::paginate(10);
        //busca el id del usuario que hizo la venta
        $user = User::all();
        //busca el id del producto que se vendio
        $products = Products::all();

        $carts = Cart::all();
        //retorna la vista index y le pasa los datos de la consulta
        return view('sales.index', compact('sales', 'user', 'products', 'carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $products = Products::all();
        $users = User::all();
        $sales = new Sales();

        return view('sales.create', compact('sales', 'products', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSalesRequest $request
     * @return RedirectResponse
     */
    public function store(Request $request, $id)
    {

        $id=Cart::findOrfail($id);

        // dd($id);

        $sales = Sales::create([
            'user_id'=> Auth::user()->id,
            'cart_id' => $id->id,
            'product_id' => $id->product_id,
            'quantity' => $id->quantity,
            'subtotal' => $id->subtotal,
            'total' => $id->total,
            'paid' => true,
        ]);

        //despues de crear la venta, se elimina el producto del carrito de compras
        $p=$id->product_id;
        $q=$id->quantity;

        //se actualiza el carrito de compras a 1 si se realizo la venta
        $id->update([
            'paid' => true,
        ]);

        $sales->reduceQuantity($q, $p);

        return redirect()->route('compras.index')->with('message', 'Venta creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param Sales $sales
     * @return Response
     */
    public function show($id)
    {
        $sales = Sales::find($id)->with('products')->get()->with('users')->get();

        return view('sales.show', compact('sales'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Sales $sales
     * @return Response
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSalesRequest $request
     * @param Sales $sales
     * @return Response
     */
    public function update(UpdateSalesRequest $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Sales $sales
     * @return Response
     */
    public function destroy(Sales $sales)
    {
        //
    }
}
