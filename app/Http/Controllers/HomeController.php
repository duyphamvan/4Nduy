<?php

namespace App\Http\Controllers;

use App\CategoryHouses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $categories = CategoryHouses::all();
        return view('home.viewhome', compact('categories'));
    }


    public function showChangePasswordForm()
    {
        return view('auth.changepassword');
    }

    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->route('viewhome')->with("success", "Password changed successfully !");
    }

//    public function showPageGuest()
//
//    {
//
//        if (!$this->userCan('view-home.viewhome')) {
//
//            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
//
//        }
//
//        return view("home.viewhome");
//
//    }


    public function showPageAdmin()

    {

        if (!$this->userCan('view-admin.admin')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này'));

        }

        return view("admin.admin");

    }
}



















//    public function  profile(){
//        $user = Auth::user();
//       // dd($user);
//        return view('home.profile', compact('user'));
//    }


