<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class FrontendController extends Controller
{
    public function index()
    {
        $tourdata = Tour::join('cities', 'cities.id', '=', 'tours.city_to')
            ->select('tours.*', 'cities.name as cityname')->take(3)->get();

        return view('welcome', compact('tourdata'));
    }

    public function alltrips()
    {
        $tourdata = Tour::join('cities', 'cities.id', '=', 'tours.city_to')
            ->select('tours.*', 'cities.name as cityname')->get();
        $agency = User::where('type', 'Agency')->select()->get();

        return view('frontend.alltrips', compact('tourdata', 'agency'));
    }

    public function agencytrip(Request $request)
    {
        $tourdata = Tour::where('agency_id', $request->agency)->join('cities', 'cities.id', '=', 'tours.city_to')
            ->select('tours.*', 'cities.name as cityname')->get();
        $agency = User::where('type', 'Agency')->select()->get();

        return view('frontend.alltrips', compact('tourdata', 'agency'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contactus()
    {
        return view('frontend.contactus');
    }

    public function searchtour()
    {
        $citydata = city::select()->get();
        return view('frontend.searchtour', compact('citydata'));
    }

    public function searchresult(Request $request)
    {

        $tourdata = Tour::where('city_from', $request->city_from)->where('city_to', $request->city_to)
            ->whereBetween('trip_date', [$request->from_date, $request->to_date])
            ->join('cities', 'cities.id', '=', 'tours.city_to')
            ->select('tours.*', 'cities.name as cityname')->get();
        $agency = User::where('type', 'Agency')->select()->get();

        return view('frontend.alltrips', compact('tourdata', 'agency'));
    }


    public function tripdetail($id)
    {

        $tourdata = Tour::where('tours.id', $id)
            ->join('cities as city1', 'city1.id', '=', 'tours.city_to')
            ->join('cities as city2', 'city2.id', '=', 'tours.city_from')
            ->select(
                'tours.*',
                'city1.name as city_to_trip',
                'city2.name as city_from_trip'
            )->get();

        $agency_name = "Bag Pack Travel And Tours";

        foreach ($tourdata as $data) {
            $agency_id = $data->agency_id;
        }

        if ($agency_id == null) {
            $agency_name = "Bag Pack Travel And Tours";
        } else {
            $agencydata = User::whereId($agency_id)->select()->get();


            foreach ($agencydata as $data) {
                $agency_name = $data->name;
            }
        }



        return view('frontend.tourdetail', compact('tourdata', 'agency_name'));
    }

    public function videopage()
    {
        return view('frontend.videopage');
    }

    // public function getVideo()
    // {
    //     $url = 'frontend/img/Sequence 01.mp4';
    //     return $url;

    // }
    public function feedback()
    {
        return view('frontend.feedback');

    }
}
