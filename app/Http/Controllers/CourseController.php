<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Course;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class CourseController extends Controller
{
    public function getIndex()
	{
	$courses = Course::all();
	return view('shop.index', ['courses' => $courses]);
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
}
