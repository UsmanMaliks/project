<?php

namespace App\Http\Controllers;

use App\DataTables\FeedbackDataTable;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public function createfeedback(Request $request)
    {
        $rules = array(
            'name'    =>  'required',
            'email'    =>  'required',
            'subject'    =>  'required',
            'message'    =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

            $form_data = array(


                'name'    =>  $request->name,
                'email'    =>  $request->email,
                'subject'    =>  $request->subject,
                'message'    =>  $request->message

            );
            Feedback::create($form_data);
            toastr()->success('Thanks For Submitting FeedBack');
            return redirect()->back();
            // return response()->json(['success' => 'User Created Successfully']);
    }

    public function index(FeedbackDataTable $datatable)
    {
        return $datatable->render('dashboard.feedbacktable');
    }

    public function destroy($id)
    {
        $feed = Feedback::findOrFail($id);
        $feed->delete();
    }
}
