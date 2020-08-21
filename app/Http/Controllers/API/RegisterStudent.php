<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Manually added
//Connect to Student Model.
use App\Student; 

class RegisterStudent extends Controller
{

    public function index()
    {
        $students = Student::all();

        return view('sample', [
            'students' => $students
        ]);
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'estatus' => 'required|string|max:100',
            'course' => 'required|string|max:100',
            'yearlevel' => 'required|string|max:4',
            'section' => 'required|string|max:1',
            'idnumber' => 'required|string|max:17|unique:users',
            'firstname' => 'required|string|max:50',
            'middlename' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'extensionname' => 'required|string|max:4',
            'gender' => 'required|string|max:6',
            'birthdate' => 'required|date',
            'emailaddress' => 'required|string|max:50|unique:users',
            'contactnumber' => 'required|string|max:11',
            'purok' => 'required|string|max:50',
            'barangay' => 'required|string|max:50',
            'municipality' => 'required|string|max:50',
            'province' => 'required|string|max:50',
            'ffirstname' => 'required|string|max:50',
            'fmiddlename' => 'required|string|max:50',
            'flastname' => 'required|string|max:50',
            'mfirstname' => 'required|string|max:50',
            'mmiddlename' => 'required|string|max:50',
            'mlastname' => 'required|string|max:50',
            'gcontactnumber' => 'required|string|max:11'            
        ]);
        return Student::create([
            'estatus' => $request['estatus'],
            'course' => $request['course'],
            'yearlevel' => $request['yearlevel'],
            'section' => $request['section'],
            'idnumber' => $request['idnumber'],
            'firstname' => $request['firstname'],
            'middlename' => $request['middlename'],
            'lastname' => $request['lastname'],
            'extensionname' => $request['extensionname'],
            'gender' => $request['gender'],
            'birthdate' => $request['birthdate'],
            'emailaddress' => $request['emailaddress'],
            'contactnumber' => $request['contactnumber'],
            'purok' => $request['purok'],
            'barangay' => $request['barangay'],
            'municipality' => $request['municipality'],
            'province' => $request['province'],
            'ffirstname' => $request['ffirstname'],
            'fmiddlename' => $request['fmiddlename'],
            'flastname' => $request['flastname'],
            'mfirstname' => $request['mfirstname'],
            'mmiddlename' => $request['mmiddlename'],
            'mlastname' => $request['mlastname'],
            'gcontactnumber' => $request['gcontactnumber']
        ]);
    }


    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
