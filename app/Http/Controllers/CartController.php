<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $cart = Cart::where('user_id', auth()->user()->id)->with('product')->paginate(20);
        return view('cart.index', compact('cart'));
    }

    public function create($r){
        $product = Products::findOrfail($r);

        return view('products.cart', compact('product'));
    }

    public function store(Request $request, $id){

        // dd($request->all());
        // //de los parametros que se envian por el formulario, se obtiene el id del producto y lo busca en la base de datos
        $id=Products::findOrfail($id);
        // dd($id);
        Cart::create([
            'user_id' => auth()->user()->id,
            'product_id' => $id->id,
            'quantity' => $request->quantity,
            'price' => $id->price,
            'total' => $request->quantity * $id->price,
            'subtotal' => $request->quantity * $id->price,
        ]);

        return redirect()->route('cart.index')->with('message', 'Producto añadido con éxito al carrito');
    }


    public function edit($id){
        $cart = Cart::findOrfail($id)->with('product')->first();
        return view('cart.edit', compact('cart'));
    }

    public function update(Request $request, $id){
        $cart = Cart::findOrfail($id);
        $cart->update($request->all());

        return redirect()->route('cart.index')->with('messageUpdate', 'Producto actualizado con éxito');
    }

    public function destroy($id){
        $cart = Cart::findOrfail($id);
        $cart->delete();

        return redirect()->route('cart.index')->with('messageDelete', 'Producto eliminado con éxito del carrito');
    }
}
