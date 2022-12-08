<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BookTrip;
use App\Models\Tour;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToArray;

class BookedTripController extends Controller
{
    public function index()
    {

        $user = auth()->user()->id;
        $datauser = BookTrip::where('user_id', $user)->select()->get();
        $check = $datauser->pluck('tour_id')->ToArray();
        $tripdatafront = null;
        if (count($datauser)) {
            $tripdatafront = Tour::whereIn('id',$check)->select()->get();
        }



        return view('dashboard.bookedtrips',compact('tripdatafront'));
    }


    public function bookedtripdata()
    {
        $user = auth()->user()->id;
        $datauser = BookTrip::where('user_id', $user)->select()->get();
        $check = $datauser->pluck('tour_id')->ToArray();

        if (count($datauser)) {

            // foreach ($datauser as $tripdataid) {
            //     $tripid = $tripdataid->tour_id;
            // }
            $tripdata = Tour::whereIn('id',$check)->select()->get();

            foreach ($tripdata as $cleanarray) {
                $usertour[] = [
                    "title" => $cleanarray->name,
                    "start" => $cleanarray->trip_date,
                    "className" => "bg-danger"
                ];
            }
        }
        return response()->json(['result' => $usertour]);
    }
}
