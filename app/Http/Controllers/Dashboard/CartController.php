<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    //
    public function index(Request $request) {
        $data = array();
        $data['id'] = $request->id;
        $data['name'] = $request->name;
        $data['qty'] = $request->qty;
        $data[ 'price' ]= $request->price;
        $add=Cart::add($data);
        return redirect()->back();
    }
    public function updateCart(Request $request, $rowId){
        $qty = $request->qty;
        $update = Cart::update($rowId, $qty) ;
        return redirect()->back();
    }
    public function removeCart($rowId){
        $remove = Cart::remove($rowId);
        return redirect()->back();
    }
    public function clearCart()
    {
        Cart::destroy(); // This will clear the cart
        return redirect()->back();
    }
}
