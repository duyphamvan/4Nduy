<?php

namespace App\Http\Controllers;

use App\Booking;
use App\House;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $bookings = Booking::all();
      return view('booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $booking = new Booking();
        $user = Auth::user();
        if ($user == null) {
            return redirect()->route('login');
        }
        $house_id = $id;
        $house_name = House::findOrFail($house_id)->name;
        $house_bedroom = House::findOrFail($house_id)->bedroom;
        $house_bathroom = House::findOrFail($house_id)->bathroom;
        $house_date_from = House::findOrFail($house_id)->date_from;
        $house_date_to = House::findOrFail($house_id)->date_to;
        return view('booking.create', compact('user','house_id','house_name', 'booking', 'house_bedroom', 'house_bathroom','house_date_from', 'house_date_to'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'house_name' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
        ]);

        // Save into Database
        $house_id = $id;
        Booking::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'house_name' =>$request->house_name,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
        ]);

        // Update Rooms status
        $house = House::findOrFail($house_id);
        $house->status = 0;
        $house->save();

        Session::flash('success', 'Cập nhật khách hàng thành công');
        return redirect('/booking');

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
    }
}
