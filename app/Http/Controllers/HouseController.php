<?php

namespace App\Http\Controllers;

use App\Category;
use App\House;
use App\Http\Requests\CreateHouseRequest;
use App\Http\Requests\NewsAddHouseRequest;
use App\Http\Requests\UpdateHouseRequest;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class HouseController extends Controller
{
    public function index()
    {
        $houses = House::all();
        $categories = Category::all();
        return view('houses.index', compact('houses', 'categories'));
    }

    public function create()
    {       $categories = Category::all();
        return view('houses.create', compact('categories'));
    }
    public function store(CreateHouseRequest $request)
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

    public function update(UpdateHouseRequest $request, $id)
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

//        dd($house->date_from);
//        dd($house->date_to);
        if($request->hasFile('images')){
            $currentImage = $house->images;
            if($currentImage){
                Storage::delete('/public/'.$currentImage);
            }
            $images = $request->file('images');
            $path = $images->store('images', 'public');
            $house->images = $path;
        }
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
//    public function checkValidation(FormExampleRequest $request)
//    {
//        $success = "Dữ liệu được xác thực thành công";
//        return view('houses.index', compact('success'));
//    }
}
