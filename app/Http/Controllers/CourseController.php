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
                $query->where('title', 'ilike', '%' . $term . '%');  //need to see if this is correct in Heroku! ilike won't work in mySQL
            }
        })
            ->orderBy("id", "desc")
            ->paginate(2);

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
            $order->cart = base64_encode(serialize($cart));
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

    //attempt to add course view/update/delete page:
    public function index()
    {
        //
        $courses=Course::all();
        return view('courses.index',compact('courses'));
    }

    public function show($title)
    {

        $course = Course::findOrFail($title);

        return view('courses.show',compact('course'));
    }


    public function create()
    {
        return view('courses.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $course= new Course($request->all());
        $course->save();

        return redirect('courses');
    }

    public function edit($title)
    {
        $course=Course::find($title);
        return view('courses.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($title,Request $request)
    {
        //
        $course= new Course($request->all());
        $course= Course::find($title);
        $course->update($request->all());
        return redirect('courses');
    }

    public function destroy($title)
    {
        Course::find($title)->delete();
        return redirect('courses');
    }
}
