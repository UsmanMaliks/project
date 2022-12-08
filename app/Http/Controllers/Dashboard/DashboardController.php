<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BookTrip;
use App\Models\city;

class DashboardController extends Controller
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
    public function index()
    {
        $bookedtrips = BookTrip::select()->count();
        $customer = User::where('type', 'Customer')->select()->count();
        $agency = User::where('type', 'Agency')->select()->count();
        $cities = city::select()->count();



        return view('dashboard.dashboard',compact('bookedtrips','customer','agency','cities'));
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

        return redirect('dashboard');
    }
}
