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
    public function create()
    {
        $booking = new Booking();
        $houses = House::all();
        Booking::create([
            'user_name' => auth()->user()->name,
//            'house_id' => $request->house_id,
//            'date_from' => $request->date_from,
//            'date_to' => $request->date_to,
        ]);

        return view('booking.create',compact('houses', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'house_id' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
        ]);

        // Save into Database
        Booking::create([
            'user_id' => auth()->user()->id,
            'house_id' => $request->house_id,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
        ]);

        // Update Rooms status
        $house = House::find($request->house_id);
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
