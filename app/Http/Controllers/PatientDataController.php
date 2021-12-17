<?php

namespace App\Http\Controllers;

use App\Models\PatientData;
use App\Models\User;
use Illuminate\Http\Request;

class PatientDataController extends Controller
{

    public function index()
    {
        $patient = PatientData::with('user')->where('user_id', auth()->user()->id)->first();
        $patient = $patient->makeHidden(['email_notifications', 'sms_notifications']);

        return view('patient.profile', compact('patient'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PatientData  $patientData
     * @return \Illuminate\Http\Response
     */
    public function show(PatientData $patientData)
    {
        //
    }


    public function edit(PatientData $patientData)
    {
        $patient = $patientData->first();
      // dd($patient->phone);
        return view('patient.edit', compact('patient'));
    }


    public function update(Request $request){
  // dd($request->all());

        $request->validate([
                               'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                           ]);
        $patientData = PatientData::where('user_id', auth()->user()->id)->first();
        $patientData->phone = '35'.$request->phone;
        $patientData->dob = $request->dob;
        $patientData->gender = $request->gender;
        if ($request->email_not === null){
            $patientData->email_notifications = 'off';
        } else{
            $patientData->email_notifications = $request->email_not;
        }
        if ($request->email_not === null){
            $patientData->sms_notifications = 'off';
        } else{
            $patientData->sms_notifications = $request->sms_not;
        }
        $patientData->save();
        return response()->json($patientData, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientData  $patientData
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientData $patientData)
    {
        //
    }
}
