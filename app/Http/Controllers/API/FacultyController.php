<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Hash;

class FacultyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    //Resources/js/viewrecords/Faculty.vue/getResults()
    //Pagination for Faculty and Employee Table.
    public function loadFacultyEmployee()
    {
        return User::where('role', '!=', 'Applicant')
            ->orderBy('lastname')
            ->paginate(10);
    }

    //Resources/js/viewrecords/Faculty.vue/getResults()
    //Pagination for Faculty and Employee Table.
    public function facultyEmployeePagination()
    {
        return User::where('role', '!=', 'Applicant')
            ->orderBy('lastname')
            ->paginate(10);
    }

    public function saveFacultyEmployee(Request $request)
    {
        $this->validate($request, [
            'idnumber'  => 'required|string|max:17|unique:users',
            'firstname'  => 'required|string|max:50',
            'middlename'  => 'required|string|max:50', 
            'lastname'  => 'required|string|max:50', 
            'email'  => 'required|string|max:199|unique:users',
            'role'  => 'required|string|max:50', 
            'password'  => 'required|string|min:8',  
            'repassword'  => 'required|string|min:8',  
        ]);
        
        return User::create([
             'idnumber'  => $request['idnumber'], 
             'firstname'  => $request['firstname'], 
             'middlename'  => $request['middlename'], 
             'lastname'  => $request['lastname'], 
             'email' => $request['email'],
             'role'  => $request['role'], 
             'password'  => $request['password'], 
             'repassword'  => Hash::make($request['repassword']), 
        ]);
    }


    //Resources/js/viewrecords/Faculty.vue/editFaculty()
    public function updateFacultyEmployee(Request $request)
    {
        $data = $request['users']['data'];

        $this->validate($request, [
            'idnumber'  => 'required|string|max:17|unique:users',
            'firstname'  => 'required|string|max:50',
            'middlename'  => 'required|string|max:50', 
            'lastname'  => 'required|string|max:50', 
            'email'  => 'required|string|max:199|unique:users',
            'role'  => 'required|string|max:50',  
        ]);
        
        User::where('idnumber', $request['idnumber'])->update([
            'idnumber'  => $request['idnumber'], 
            'firstname'  => $request['firstname'], 
            'middlename'  => $request['middlename'], 
            'lastname'  => $request['lastname'], 
            'email' => $request['email'],
            'role'  => $request['role'], 
        ]);
    }
}
