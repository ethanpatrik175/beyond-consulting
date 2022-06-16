<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
// use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        // $data['cartItems']  = \Cart::getContent('cart');
        // dd( $data['cartItems']);
      // view the cart items
      $data['cartItems'] = session()->get('cart');
        foreach($data['cartItems'] as $row) {

	        echo $row->id; // row ID
	        echo $row->name;
	        echo $row->qty;
	        echo $row->price;
	
	        // echo $data['cartItems']->associatedModel->id; // whatever properties your model have
            // echo $data['cartItems']->associatedModel->name; // whatever properties your model have
            // echo $data['cartItems']->associatedModel->description; // whatever properties your model have
}
        $data['pageTitle'] = "Add To Card";
        $data['bannerTitle'] = "Add To Card";
        
        return view('frontend.add-to-cart', $data);
    }


    public function addToCart(Request $request)
    {

        \Cart::session(12)->add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => 4,
            'attributes' => array(),
            // 'associatedModel' => $Product
        ));
        // Session()->put('cart');
        
    //     $Cart = Cart::session()->add(array(
    //     // 'id' => $rowId,
    //     'name' => $$request->name,
    //     'price' => $$request->price,
    //     'quantity' => 4,
    //     'attributes' => array(),
    //     'associatedModel' => $request
    // ));

        // dd($request->all())

        // $Cart = new Cart();
        // // $Cart->id = $request->id;
        // $Cart->firstName = $request->name;
        // $Cart->price = $request->price;
        // $Cart->quantity = $request->quantity;
        // $Cart->save();
       

        // ->add([
        //     'id' => $request->id,
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'quantity' => $request->quantity,
        //     // 'attributes' => array(
        //     //     'image' => $request->image,
        //     // )
        // ]);
        
        $items = \Cart::getContent();
        // dd($items);
        Session()->put('cart' ,$items);
        Session()->flash('success', 'Product is Added to Cart Successfully !');
         
        return redirect()->route('front.cart.list');
    }

    public function updateCart(Request $request)
    {
      
        \Cart::session(12)->update($request->id,[
            'quantity' => 2,
            'price' => 98.67
        ]);
        $items = \Cart::getContent();
        // dd($items);
        Session()->put('cart' ,$items);
        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('front.cart.list');
    }

    public function removeCart($id)
    {
        
      
            $cart = Session()->get('cart');
            unset($cart[$id]);
            Session()->put('cart', $cart);
             return redirect()->route('front.cart.list');
        
    }

    public function clearAllCart()
    {
        Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
}
