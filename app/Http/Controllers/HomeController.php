<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Customer;
use App\Models\User;
use Yoeunes\Toastr\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // if (auth()->user()->signup_complete == false) {


        //     $user = auth()->user();
        //     $user->assignRole(auth()->user()->type);

        //     toastr()->warning('Please complete your Profile');

        //     return view('home');
        // } else {
        return view('home');
        // }
    }

    public function check()
    {
        return view('dashboard.check');
    }

    public function profile()
    {
        // $find = auth()->user()->id;

        // $data = (array) null;


        // if (auth()->user()->type == 'Customer') {
        //    $data = Customer::where('user_id', $find)->select()->get();

        //     // foreach ($findcus as $customer) {
        //     //     $data = array(
        //     //         'user_id' => $customer->id,
        //     //         'address' => $customer->address,
        //     //         'avatar' => $customer->avatar,
        //     //         'phone' => $customer->phone_id,
        //     //     );
        //     // }
        // }
        // elseif(auth()->user()->type == 'Agency')
        // {
        //     $data = Agency::where('user_id', $find)->select()->get();

        // }
        // else{
        //    $data = (array) null;
        // }

        return view('dashboard.profile');
    }

    public function profileupdate(Request $request)
    {

        $request->validate([
            'address' => 'required',
            'phone_no' => 'required',
            'avatar' => 'required'
        ]);

        if ($request->has('avatar')) {
            $photo = $request->avatar;
            $filename =  $photo->getClientOriginalName();
            $photo->storeAs('avatar', $filename, 'public');
        }

        $form_data = array(
            'phone_no' => $request->phone_no,
            'avatar' => $filename,
            'address' => $request->address
        );


        User::whereId($request->user_id)->update($form_data);

        return redirect('home');
    }
}
