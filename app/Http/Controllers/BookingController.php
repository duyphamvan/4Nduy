<?php

namespace App\Http\Controllers;

use App\Booking;
use App\House;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    public function store(Request $request, $id )
    {

        if (Auth::check()){
            $house = House::findOrFail($id);
            $date_now = Carbon::now();
            $this->validate($request, [
                'date_from' => 'required|date|after_or_equal:'. $date_now,
                'date_to' => 'required|date|before_or_equal:'.$house->date_to.'|after:'.$house->date_from,
            ]);
            $booking = new Booking();
            $booking->date_from = $request->date_from;
            $booking->date_to = $request->date_to;
            $booking->adults = $request->adults;
            $booking->child = $request->child;
            $booking->house_id = $request->house_id;
            $booking->user_id = auth()->user()->id;
            $check_in = strtotime($booking->date_from);
            $check_out = strtotime( $booking->date_to);
            $date = ($check_out - $check_in) / 86400;
            $booking->total_money = ($check_out - $check_in) / 86400*($booking->house->price);
            $booking->save();

            return view('booking.show', compact('booking', 'date','house'));
        }
      return redirect()->route('login');

    }
    public function payment(Request $request, $id)
    {
        $this->validate($request, [
            'payment'=>'required',
        ]);
        $house = Booking::findOrFail($id)->house;
        $house->status = '2';
        $house->save();
        $booking = Booking::findOrFail($id);
        $booking->payment = $request->payment;
        $booking->save();
        Session::flash('success', 'You have successfully placed and are waiting for approval');
        return redirect()->route('user.show', \auth()->user()->id);
    }


}
