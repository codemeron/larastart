<?php

namespace App\Http\Controllers\API;

//Default classes
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Imported classes
use App\User;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'designation' => 'required|string|max:50',
            'department'  => 'required|string|max:50',
            'course'  => 'required|string|max:100', 
            'yearlevel'  => 'required|string|max:4',
            'section'  => 'required|string|max:3', 
            'office'  => 'required|string|max:100',
            'idnumber'  => 'required|string|max:17|unique:users',
            'firstname'  => 'required|string|max:50',
            'middlename'  => 'required|string|max:50', 
            'lastname'  => 'required|string|max:50', 
            'extension'  => 'required|string|max:3',
            'gender'  => 'required|string|max:6', 
            'birthdate'  => 'required|date', 
            'email'  => 'required|string|max:191|unique:users', 
            'contactnumber'  => 'required|string|max:11', 
            'purok'  => 'required|string|max:50',  
            'barangay'  => 'required|string|max:50', 
            'municipality'  => 'required|string|max:50', 
            'province'  => 'required|string|max:50',  
            'password'  => 'required|string|min:8',  
            'role'  => 'required|string|min:191',
            'photo'  => 'required|string|min:191'
        ]);
        
        return User::create([
            'designation' => $request['designation'],
             'department'  => $request['designation'], 
             'course'  => $request['designation'], 
             'yearlevel'  => $request['designation'], 
             'section'  => $request['designation'], 
             'office'  => $request['designation'], 
             'idnumber'  => $request['designation'], 
             'firstname'  => $request['designation'], 
             'middlename'  => $request['designation'], 
             'lastname'  => $request['designation'], 
             'extension'  => $request['designation'], 
             'gender'  => $request['designation'], 
             'birthdate'  => $request['designation'], 
             'email'  => $request['designation'], 
             'contactnumber'  => $request['designation'], 
             'purok'  => $request['designation'], 
             'barangay'  => $request['designation'], 
             'municipality'  => $request['designation'], 
             'province'  => $request['designation'], 
             'password'  => Hash::make($request['password']), 
             'role'  => $request['role'], 
             'photo'  => $request['photo']
        ]);
    }

    public function show($id)
    {
        //
    }

    public static function applicant(){
        return User::Applicant();
    }

    public function profile()
    {
        return auth('api')->user();
    }

    public function updateProfile(Request $request)
    {
        $user = auth('api')->user();

        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'bail|required|string|email|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|string|min:8'
        ]);

        $currentPhoto = $user->photo;
        $name = "";
       if($request->photo != $currentPhoto){
            $name = time() . '.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            \Image::make($request->photo)->save(public_path('img/profile/').$name);

            $request->merge(['photo' => $name]);

            $userPhoto = public_path('img/profile/').$currentPhoto;
            if(file_exists($userPhoto)){
                unlink($userPhoto);
            }
            
        }

        if( !empty($request->password) ){
            $request->merge(['password' => Hash::make($request['password'])]);
        }



        $user->update($request->all());
        return ['picture' => $name];
        
    }

    public function destroy($id) 
    {
        $this->authorize('isSystemAdministrator');

        $user = User::findOrFail($id);
        $user->delete();
    }

    public function search(){
        if($search = \Request::get('q'))
        {
            $users = User::where(function($query) use ($search){
                $query->where('name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%");
            })->paginate(10);
        }else{
            return User::latest()->paginate(10); 
        }

        return $users;
    }

    
    //Resources/js/applicant/ApplicantList.vue/getResults()
    //Pagination for newly registered user.
    public function newRegisteredUserPagination()
    {
        return User::where('role', '=', 'Applicant')->paginate(5); 
    }

    //Resources/js/applicant/ApplicantList.vue/approveRoleAll()
    //Assign individual role to newly registered users.
    public function roleUpdate(Request $request, $idnumber)
    {
        $role = $request['role'];

        User::where('idnumber', $idnumber)->update(['role' => $role]);
    }


    //Resources/js/applicant/ApplicantList.vue/approvedRoleIndividual()
    //Assign individual role to all newly registered users.
    public function roleUpdateAll(Request $request)
    {
        $roles = $request['users']['data'];

        foreach ($roles as $role){
            User::where('idnumber', $role['idnumber'])->update(['role' => $request['role']]);
        }
    }


    //Resources/views/layouts/master.blade.php/numberOfNewlyRegisteredUser()
    //Select and view all the records of newly registered user.
    public function loadNewRegisteredUser(){
       $query = User::where('role', '=', 'Applicant')->paginate(5);

        return $query;  
    }


    //Resources/views/layouts/master.blade.php/numberOfNewlyRegisteredUser()
    //Get total number of newly registered user.
    public function newRegisteredUser(){
        $countNewlyRegistered = User::where('role', 'Applicant')->count();

        return $countNewlyRegistered;
    }

}
