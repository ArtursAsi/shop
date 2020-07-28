<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Stripe\Stripe;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(3);
        return view('home', compact('products'));
    }

    public function create()
    {
        return view('add');
    }

    public function show(Product $product)
    {

        return view('show', compact('product'));
    }

    public function edit(Product $product)
    {

        return view('edit', compact('product'));
    }

    public function update(Product $product, Request $request)
    {

        $product->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
        ]);

        return redirect(route('product.show', compact('product')));

    }

    public function updateImage(Product $product, Request $request)
    {
        Storage::delete($product->image);

        $image = $request->file('image')->store('/images');
        $product->update([
            'image' => $image
        ]);


        return redirect()->back();
    }

    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();

        return redirect(route('home'));
    }

    public function store(Request $request)
    {

        $product = new Product();
        $image = $request->file('image')->store('/images');
        $product->create([
            'name' => $request['name'],
            'image' => $image,
            'description' => $request['description'],
            'price' => $request['price'],
        ]);

        return redirect(route('product.create'));
    }

    public function addToCart(Request $request, Product $product)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);


        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function reduceByOne(Product $product)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($product->id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->back();
    }

    public function removeItem(Product $product)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($product->id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->back();

    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('shoppingCart', [
            'products' => $cart->items,
            'totalPrice' => $cart->totalPrice
        ]);


    }

    public function checkout()
    {
        if (!Session::has('cart')) {
            return view('shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;

        return view('checkout', compact('total'));

    }

    public function buyNow(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect(route('shoppingCart'));
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $order = new Order();
        $order->cart = serialize($cart);

        Auth::user()->orders()->save($order);
        Session::forget('cart');

        return redirect(route('home'));

    }
}
