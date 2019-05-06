<?php

namespace App\Http\Controllers;

use App\Booking;
use App\House;
use App\User;
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
    public function create(Request $request, $id)
    {
        $booking = new Booking();
        $user = Auth::user();
        $house_id = $id;
        $house_name = House::findOrFail($house_id)->name;
        return view('booking.create', compact('user', 'house_name', 'booking'));
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
            'house_name' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
        ]);

        // Save into Database

        Booking::create([
            'user_id' => auth()->user()->id,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
        ]);

        // Update Rooms status
        $house = House::findOrFail($id);
        $house->status = 0;
        $house->save();

        session()->flash('msg', 'The Room Has been booked');

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
