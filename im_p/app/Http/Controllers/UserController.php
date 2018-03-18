<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Request;

use App\User;
use Auth;
use Validator;
//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

// use Tracker;
use PragmaRX\Tracker\Vendor\Laravel\Facade as tracker;
// use Request;
// use Tracker\Vendor\Laravel\Facade as Tracker;

// use Spatie\Permission\Models\Role-object;
// use 
//Enables us to output flash messaging
use Session;
class UserController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index() {
    //Get all users and pass it to the view
        $users = User::get(); 
        // return json_encode($users);
        // die();
        return view('admin.users.index')->with('users', $users);
    }

    public function my_profile(){
        return view('admin.pages.my_profile');
    }

    public function update_current_logged_user(Request $request)
    {
        $attributeNames = array(
           'pre_password' => 'Previous Password',
           'new_password' => 'New Password',     
           'con_password' => 'Confirm Password'
        );
           $this->validate($request,[
                        'pre_password'=>'required|check_old_password:'.$request->pre_password,
                        'password'=>'required|min:10',
                        'con_password'=>'required|same:password',
                        'name'        =>'required',
                        'email'       =>'required'
                ]);
       $id=Auth::user()->id;
       $user=User::find($id);

       // return $id;
       // die();
       $input = $request->only(['name', 'email', 'password']); //Retreive the name, email and password fields
       $user->fill($input)->save();

       return redirect()->back()->with('success','Your profile has been updated!');
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create() {
    //Get all roles and pass it to the view
        $roles = Role::get();
        return view('admin.users.create', ['roles'=>$roles]);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        // return "ss";
        // die();
        //Validate name, email and password fields
        
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed',
        ]);

        $user = User::create($request->only('email', 'name', 'password','dep_id')); //Retrieving only the email and password data

        $roles = $request['roles']; //Retrieving the roles field
        //Checking if a role was selected
        if (isset($roles)) {

            foreach ($roles as $role) {
            $role_r = Role::where('id', '=', $role)->firstOrFail();
            // return json_encode($role_r);
            // die();            
            $user->assignRole($role_r); //Assigning role to user
            }
        }        
        //Redirect to the users.index view and display message
        return redirect()->route('users.index')
            ->with('flash_message',
             'User successfully added.');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id) {
        return redirect('users'); 
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id) {
        $user = User::findOrFail($id); //Get user with specified id
        $roles = Role::get(); //Get all roles

        return view('admin.users.edit', compact('user', 'roles')); //pass user and roles data to view

    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id) {
        $user = User::findOrFail($id); //Get role specified by id

    //Validate name, email and password fields  
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'required|min:6|confirmed',
//            'dep_id'  =>'required'
        ]);
        $input = $request->only(['name', 'email', 'password','dep_id']); //Retreive the name, email and password fields
        $roles = $request['roles']; //Retreive all roles

        $user->fill($input)->save();

        if (isset($roles)) { 
             // return"okay";
             // die();       
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles          
        }        
        else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }
        return redirect()->route('users.index')
            ->with('flash_message',
             'User successfully edited.');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
    //Find a user with a given id and delete
        $user = User::findOrFail($id); 
        $user->delete();

        return redirect()->route('users.index')
            ->with('success',
             'User successfully deleted.');
    }

    public function ss()
    {
       // return $visitor = Tracker::currentSession();
        // $visitor = Tracker::currentSession();

        // var_dump( $visitor->client_ip );
        // return json_encode($sessions);

        // return Request::segment(1);

        return Tracker::logByRouteName('user.profile')
        ->where(function($query)
        {
            $query
                ->where('parameter', 'id')
                ->where('value', 1);
        })
        ->count();

    }

}
