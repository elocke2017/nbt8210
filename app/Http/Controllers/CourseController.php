<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Course;
use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Auth;
use Stripe\Charge;
use Stripe\Stripe;

class CourseController extends Controller
{
    public function getIndex()
    {
        $courses = Course::all();
        return view('shop.index', ['courses' => $courses]);
	}

    public function search(Request $request){
        $course = Course::where(function($query) use ($request) {
            if (($term = $request->get('term'))) {
                $query->where('title', 'like', '%' . $term . '%');
            }
        })
            ->orderBy("id", "desc")
            ->paginate(5);

        return view('shop.index',['courses' => $course]);
    }

    public function getAddToCart(Request $request, $id) {
        $course = Course::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($course, $course->id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        return redirect()->route('course.index');

    }

    public function getCart () {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['courses' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout() {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total]);
    }

    public function postCheckout(Request $request) {
        if(!Session::has('cart')) {
            return redirect()->route('shop.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey('sk_test_8u1Y1qIYjSpG1sNp0lvQDPtM');
        try {
            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test Charge for NBT"
            ));
            $order = new Order();
            $order->cart = serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $charge->id;

            Auth::user()->orders()->save($order);
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }


        Session::forget('cart');
        return redirect()->route('course.index')->with('success', 'Successfully purchased courses');

    }
}
