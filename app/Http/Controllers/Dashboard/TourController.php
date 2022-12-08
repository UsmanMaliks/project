<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\AgencyTourDataTable;
use Illuminate\Http\Request;
use App\DataTables\TourDataTable;
use App\Http\Controllers\Controller;
use App\Models\city;
use App\Models\Tour;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TourDataTable $myDataTable)
    {

        return $myDataTable->render('dashboard.tourtable');
    }

    public function agency(AgencyTourDataTable $myDataTable)
    {

        return $myDataTable->render('dashboard.agencytable');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name'    =>  'required',
            'description'    =>  'required',
            'city_from'    =>  'required',
            'city_to'    =>  'required',
            'distance'    =>  'required',
            'tour_type'    =>  'required',
            'season' => 'required',
            'day' => 'required',
            'file' => 'required',
            'package_1' => 'required',
            'package_2' => 'required',
            'package_3' => 'required',
            'max_person'    =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $filename = '';

        if ($request->hasFile('file')) {
            $agency_id = null;
            $filename = $request->file->getClientOriginalName();
            $request->file->storeAs('tour', $filename, 'public');
            if(auth()->user()->type == 'Agency'){
                $agency_id = Auth::user()->id;
            }else{
                $agency_id = null;
            }

            $form_data = array(


                'name'    =>  $request->name,
                'description'    =>  $request->description,
                'city_from'    =>  $request->city_from,
                'city_to'    =>  $request->city_to,
                'distance'    =>  $request->distance,
                'tour_type' => $request->tour_type,
                'season' => $request->season,
                'day'    =>  $request->day,
                'image'    =>  $filename,
                'trip_date'    =>  $request->trip_date,
                'package_1' => $request->package_1,
                'package_2' => $request->package_2,
                'package_3' => $request->package_3,
                'max_person' => $request->max_person,
                'agency_id' => $agency_id
            );


            Tour::create($form_data);
            toastr()->success('Tour Created');
            return redirect()->back();
        }
        toastr()->error('Tour Not Created');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $citydata = city::select()->get();
        return view('dashboard.createtour',compact('citydata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            $data = Tour::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    public function editafter($id)
    {
            $tour = Tour::whereId($id)->select()->get();
            $citydata = city::select()->get();
            return view('dashboard.edittour',compact('tour','citydata'));

    }

    public function updateative(Request $request)
    {

        $form_data = array(
            "is_active" => $request->is_active
        );

        Tour::whereId($request->hidden_id1)->update($form_data);
        return response()->json(['success' => 'Updated']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->hasFile('file')) {

            $filename = $request->file->getClientOriginalName();
            $request->file->storeAs('tour', $filename, 'public');
        }
        else
        {
            $filename = $request->oldfile;
        }

            $form_data = array(


                'name'    =>  $request->name,
                'description'    =>  $request->description,
                'city_from'    =>  $request->city_from,
                'city_to'    =>  $request->city_to,
                'distance'    =>  $request->distance,
                'tour_type' => $request->tour_type,
                'season' => $request->season,
                'day'    =>  $request->day,
                'image'    =>  $filename,
                'trip_date'    =>  $request->trip_date,
                'package_1' => $request->package_1,
                'package_2' => $request->package_2,
                'package_3' => $request->package_3,
                'max_person' => $request->max_person
            );




        toastr()->success('Tour Updated');
        Tour::whereId($request->hidden_id)->update($form_data);
        return redirect('/tourtable');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Tour::findOrFail($id);
        $data->delete();
    }
}
