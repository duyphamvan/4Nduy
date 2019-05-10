<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Category;
use App\House;
use App\Image;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class HouseController extends Controller
{
    public function index()
    {
        $houses = House::all();
        $categories = Category::all();
        $total =  $this->total();
        return view('houses.index', compact('houses', 'categories', 'total'));
    }
    public function total()
    {
        $bookings = Booking::all();
        $total = 0;
        foreach ($bookings as $booking){
            $total += $booking->total_money;
        }
        return $total;
    }

    public function create()
    {
        $categories = Category::all();
        return view('houses.create', compact('categories'));
    }
    public function store(Request $request)
    {

        $house = new House();
        $house->name     = $request->input('name');
        $house->address  = $request->input('address');
        $house->bedroom  = $request->input('bedroom');
        $house->category_id  = $request->input('category_id');
        $house->bathroom  = $request->input('bathroom');
        $house->description  = $request->input('description');
        $house->price  = $request->input('price');
        $house->date_from  = $request->input('date_from');
        $house->date_to  = $request->input('date_to');
        $date =Carbon::now();
        $this->validate($request, [
            'date_from' => 'required|date|after_or_equal:'. $date,
            'date_to' => 'required|date|after_or_equal:'. $date,
            'name' =>'required|string',
            'address' =>'required|string',
            'description' =>'required|string',
            'bedroom' =>'required|numeric',
            'bathroom' =>'required|numeric',
            'price' =>'required|numeric',

        ]);
        $house->save();
        $images = $request->image;
        foreach ($images as $image){
            $imageDetail = new Image();
            $imageDetail->house_id = $house->id;
            $path = $image->store('images','public');
            $imageDetail->img = $path;
            $imageDetail->save();
        }
        Session::flash('success', 'Tạo mới khách hàng thành công');

        return redirect()->route('house.index');
    }
    public function edit($id)
    {
        $house = House::findOrFail($id);
        $category = House::findOrFail($id)->category;
        $categories = Category::all();
        return view('houses.edit', compact('house', 'categories', 'category'));
    }
    public function update(Request $request, $id)
    {
        $house = House::findOrFail($id);
        $house->name     = $request->input('name');
        $house->address  = $request->input('address');
        $house->bedroom  = $request->input('bedroom');
        $house->category_id  = $request->input('category_id');
        $house->bathroom  = $request->input('bathroom');
        $house->description  = $request->input('description');
        $house->price  = $request->input('price');
        $house->date_from  = $request->input('date_from');
        $house->date_to  = $request->input('date_to');

        if($request->hasFile('images')){
            $currentImage = $house->images;
            if($currentImage){
                Storage::delete('/public/'.$currentImage);
            }
            $images = $request->file('images');
            $path = $images->store('images', 'public');
            $house->images = $path;
        }
        $date =Carbon::now();
        $this->validate($request, [
            'name'=>'required|string',
            'address'=>'required|string',
            'bedroom'=>'required|numeric',
            'bathroom'=>'required|numeric',
            'description'=>'required|string',
            'price'=>'required|numeric',
            'date_from' => 'required|date|after_or_equal:'. $date,
            'date_to' => 'required|date|after_or_equal:'. $date,
        ]);
        $house->save();
        Session::flash('success', 'Cập nhật khách hàng thành công');
        return redirect()->route('house.index');
    }
    public function destroy($id)
    {
        $house = House::findOrFail($id);
        $house->images()->delete();
        $house->delete();
        Session::flash('success', 'Xóa khách hàng thành công');
        return redirect()->route('house.index');
    }
    public function updateStatusRented($id)
    {
        $house = House::findOrFail($id);
        $house->status = '3';
        $house->save();
        $booking = House::findOrFail($id)->booking;
        $booking->status = '2';
        $booking->save();
        Session::flash('success', 'You have successfully rented a house');
        $data = array(
            'name'=> 'Admin Website 4N',
            'status'=>'2'
        );

        Mail::to($booking->user->email)->send(new SendMail($data));
        return redirect()->route('house.index');
    }

     public function updateStatusDestroy($id)
    {
        $house = House::findOrFail($id);
        $house->status = '1';
        $house->save();
        $booking = House::findOrFail($id)->booking;
        $booking->status = '3';
        $booking->save();
        Session::flash('success', 'You have rented the house failed');
        $data = array(
            'name'=> 'Admin Website 4N',
            'status'=>'3'
        );
        Mail::to($booking->user->email)->send(new SendMail($data));
        return redirect()->route('house.index');
    }
    public function showRentalSchedule($id)
    {
        $house =House::findOrFail($id)->booking;
        return view('houses.show', compact('house'));
    }
    public function showStatusPending($id)
    {
        $booking =House::findOrFail($id)->booking;
        $house = House::findOrFail($id);
        return view('houses.pending', compact('booking', 'house'));
    }





}
