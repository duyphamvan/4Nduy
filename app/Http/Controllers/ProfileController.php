<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Category;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function showProfile($id){
        $profileUser = User::findOrFail($id);
        $bookings = User::findOrFail($id)->bookings;
        $date = strtotime(Carbon::now())/86400;
        return view('user.profile', compact('profileUser', 'bookings', 'date'));
    }
    public function edit($id){
       $profileUser = User::findOrFail($id);
       return view('user.edit', compact('profileUser'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'name' =>'required|string',
            'address' =>'required|string',
            'phone' =>'required|numeric',
            'image' =>'image|mimes:jpeg,jpg,png,gif',
        ]);
        $profileUser = User::findOrFail($id);
        $profileUser->name = $request->input('name');
        $profileUser->address = $request->input('address');
        $profileUser->phone = $request->input('phone');

        if($request->hasFile('image')){
            $currentImage = $profileUser->image;
            if($currentImage){
                Storage::delete('/public/'.$currentImage);
            }
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $profileUser->image = $path;
        }
        $profileUser->save();

        Session::flash('success', 'Edit profile success');
        return redirect()->route('user.show', $profileUser->id);
    }
    public function cancelBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $house = Booking::findOrFail($id)->house;
        $house->status = '1';
        $house->save();
        $booking->delete();
        Session::flash('success', 'You have successfully canceled');
        return redirect()->route('user.show',auth()->user()->id);
    }



}
