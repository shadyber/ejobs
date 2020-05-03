<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Job;
use App\Page;
class ProfileController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
       $page= new Page();
       $page->title='Profile';
       $page->subtitle='My Profile';
  $user=Auth::user();
  $jobs=$user->projects;
  //print($jobs);
        return view('auth.profile')->with(['user'=>$user,'page'=>$page,'jobs'=>$jobs]);
    }

    public function store(Request $request){
      
        $this->validate($request,[


        ]);
      
        $user=User::find($request->input('id'));
      

    }



    public function update_avatar(Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('/public/avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success','You have successfully upload image.');

    }
}
