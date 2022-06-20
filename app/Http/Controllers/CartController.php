<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
// use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        // $items = \Cart::getContent();
        
        // dd(\Cart::getContent());
        // $data['cartItems']  = \Cart::getContent('cart');
        // dd( $data['cartItems']);
      // view the cart items
    //   $data['cartItems'] = session()->get('cart');
        // foreach($data['cartItems'] as $row) {

	        // echo $row->id; // row ID
	        // echo $row->name;
	        // echo $row->qty;
	        // echo $row->price;
	
	        // echo $data['cartItems']->associatedModel->id; // whatever properties your model have
            // echo $data['cartItems']->associatedModel->name; // whatever properties your model have
            // echo $data['cartItems']->associatedModel->description; // whatever properties your model have
// }
        
        // $data['total'] = \Cart::getTotal();
        $data['pageTitle'] = "Add To Cart";
        $data['bannerTitle'] = "Add To Cart";
    
        // $items = \Cart::getContent();
        // dd($items);
        
        return view('frontend.add-to-cart', $data);
    }


    public function addToCart(Request $request ,$id)
    {
        // dd($id);
        $product = Product::findOrFail($id);
        \Cart::add(array(
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->regular_price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        
        // Session()->put('cart' ,$items);
        Session()->flash('success', 'Product is Added to Cart Successfully !');
         
        return redirect()->route('front.cart.list');
    }

    public function updateCart(Request $request)
    {
       
        $product = Product::findOrFail($request->id);
        \Cart::update($request->id,[
            'quantity' => array(
                'relative' => false,
                'value' =>$request->quantity,
            ),
        ]);
        // $items = \Cart::getContent();
       
        // Session()->put('cart' ,$items);
        session()->flash('success', 'Item Cart is Updated Successfully !');
        return redirect()->route('front.cart.list');
    }

    public function removeCart($id)
    {
        // dd($id);
            // $cart = Session()->get('cart');
            \Cart::remove($id);
            // unset($cart[$id]);
            // session()->flush('success', 'All Item Cart Clear Successfully !');

            // Session()->put('cart', $cart);
             return redirect()->route('front.cart.list');
        
    }

    public function clearAllCart()
    {
        
         \Cart::clear();

        session()->flush('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('front.product.promotion');
    }
}
