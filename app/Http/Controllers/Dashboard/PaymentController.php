<?php

namespace App\Http\Controllers\Dashboard;

use App\Mail\Receipt;
use App\Models\BookTrip;
use App\Models\Tour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function paymentpage(Request $request)
    {
        $tour_id = $request->tour_id;

        $id = 0;
        if ($request->has('1')) {
            $id = 1;
            return view('dashboard.subscription', compact('id','tour_id'), [
                'intent' => auth()->user()->createSetupIntent(),
            ]);
        } elseif ($request->has('2')) {
            $id = 2;
            return view('dashboard.subscription', compact('id','tour_id'), [
                'intent' => auth()->user()->createSetupIntent(),
            ]);
        } elseif ($request->has('3')) {
            $id = 3;
            return view('dashboard.subscription', compact('id','tour_id'), [
                'intent' => auth()->user()->createSetupIntent(),
            ]);
        }

        return view('dashboard.subscription', compact('id','tour_id'), [
            'intent' => auth()->user()->createSetupIntent(),
        ]);
    }

    public function paycheck(Request $request)
    {

        $user = Auth::user();
        // dd($request->all());
        
        $cartprice = 1;
        $pkgidcheck = 0;


        if ($request->plan == 'price_1KdEZvGMq2LaeuYkWlRnpO7o') {
            
            $pkgidcheck = 1;

            $form_data = array(
                'user_id'    =>  $user->id,
                'tour_id'    =>  $request->tour_id,
                'package'    =>  'Basic'
            );

            BookTrip::create($form_data);

        } elseif ($request->plan == 'price_1KdEZvGMq2LaeuYkjtvd9GJh') {

            $pkgidcheck = 2;

            $form_data = array(
                'user_id'    =>  $user->id,
                'tour_id'    =>  $request->tour_id,
                'package'    =>  'V.I.P'
            );

            BookTrip::create($form_data);

        } elseif ($request->plan == 'price_1KdEZvGMq2LaeuYkWlRnpO7o') {

            $pkgidcheck = 3;


            $form_data = array(
                'user_id'    =>  $user->id,
                'tour_id'    =>  $request->tour_id,
                'package'    =>  'V.V.I.P'
            );


            BookTrip::create($form_data);
        }

            $pricepkg = Tour::findOrFail($request->tour_id);

            if($pkgidcheck == 1)
            {
                $cartprice = $pricepkg->package_1;
            }
            elseif($pkgidcheck == 2){
                $cartprice = $pricepkg->package_2;
            }
            elseif($pkgidcheck == 3){
                $cartprice = $pricepkg->package_3;
            }
            else{
                $cartprice = $pricepkg->package_1;
            }

            // dd($cartprice);


            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($request->paymentMethod);
            $invoicescreatelll = auth()->user()->charge($cartprice, $request->paymentMethod);
            $datacheck = $invoicescreatelll->charges;
            foreach ($datacheck as $mybill) {
                $paidbill = $mybill->receipt_url;
            }

        Mail::to($user->email)->send(new Receipt($paidbill));


        return view('dashboard.recipte', compact('paidbill'));
    }
}
