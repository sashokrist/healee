<?php

namespace App\Http\Controllers;

use App\Models\PatientData;
use App\Models\User;
use Illuminate\Http\Request;

class PatientDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $patient = PatientData::with('user')->where('user_id', auth()->user()->id)->first();
        $patient = $patient->makeHidden(['email_notifications', 'sms_notifications']);

        return view('patient.profile', compact('patient'));
    }


    public function edit(PatientData $patientData)
    {
        $patient = $patientData->first();

        return view('patient.edit', compact('patient'));
    }


    public function update(Request $request){

        $request->validate([
           'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'gender' => 'min:3'
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
        return redirect()->route('profile');
    }
}
