<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\UserLocation;
class UserLocationController extends Controller
{
    
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function all_report()
    {
         $data['users_info']=UserLocation::join('users','users.id','=','user_reports.created_by')->select('user_reports.*','users.name')->orderBy('id','DESC')->get();
        return view('admin.pages.all-reports',$data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['users_info']=UserLocation::join('users','users.id','=','user_reports.created_by')->select('user_reports.*','users.name')->orderBy('id','DESC')->where('users.id','=',Auth::user()->id)->get();
        return view('admin.pages.user_location',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.create_user_location');
    }
    
    public function getting_user_location_info()
    {
        $ip = @$_REQUEST['REMOTE_ADDR']; // the IP address to logged user
        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
        if($query && $query['status'] == 'success') {
                 //  $query['country'].', '.$query['city'].'!'.','.$query['regionName'];
            return $query;
        } else {
            return false;
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation 
        $this->validate($request,[
                       'note_of_location'=>'required',
                       'form_title'      =>'required'
                       ]);
        //getting user location information by API
        $user_api_info=$this->getting_user_location_info();
        $user_info=new UserLocation;
        
        $ip = @$_REQUEST['REMOTE_ADDR']; // the IP address to logged user
        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
        if($query && $query['status'] == 'success') {
            $user_info->country=$query['country'];
            $user_info->city=$query['city'];
            $user_info->area=$query['regionName'];
            $user_info->latitude=$query['lat'];
            $user_info->longitude=$query['lon'];
            $user_info->user_ip=$query['query'];
        }
       
        $user_info->note_of_location=$request->note_of_location;
        $user_info->form_title=$request->form_title;
        $user_info->created_by=Auth::user()->id;
        $user_info->location_date=date('Y-m-d');
        $user_info->save();
        
        return redirect()->route('user-location.index')->with('success','The information has been submitted!');

    }
    
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data['info']=UserLocation::join('users','users.id','=','user_reports.created_by')->select('users.name','user_reports.*')->findOrfail($id);
        return view('admin.pages.view_user_location',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['info']=UserLocation::findOrfail($id);
        return view('admin.pages.edit_user_location',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
                       'note_of_location'=>'required',
                       'form_title'      =>'required'
                       ]);
        $user_info= UserLocation ::findOrfail($id);
        $user_info->note_of_location=$request->note_of_location;
        $user_info->form_title=$request->form_title;
        $user_info->save();
        
        return redirect()->route('user-location.index')->with('success','The information has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user_info= UserLocation ::findOrfail($id);
        $user_info->delete();
        
        return redirect()->route('user-location.index')->with('success','The information has been deleted!');

    }
    
    public function my_location()
    {
        return view('admin.pages.my_location');
    }
}
