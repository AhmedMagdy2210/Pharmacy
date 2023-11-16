<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CartController extends Controller {
    public function index() {
        $categories = Category::get();
        $cart = session()->get('cart');
        return view('Enduser.cart', compact('cart', 'categories'));
    }

    /**
     * Add a product to the shopping cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addProduct(Request $request, $id) {
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }

        $cart = session()->get('cart');

        // If the product is already in the cart, increase its quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Otherwise, add the product to the cart with a quantity of 1
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "price" => $product->price,
                "photo" => $product->photo,
                "quantity" => $request->quantityToBuy,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back();
    }

    /**
     * Remove a product from the shopping cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeProduct($id) {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    /**
     * Update the quantity of a product in the shopping cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateQuantity(Request $request) {
        $cart = session()->get('cart');

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }
}
