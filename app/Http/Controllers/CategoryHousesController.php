<?php

namespace App\Http\Controllers;

use App\Category;
use App\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CategoryHousesController extends Controller
{
    public function index(){
        $houses = House::all();
        $categories = Category::all();
        return view('categories.list', compact('categories', 'houses'));
    }

    public function display(){
            $categories = Category::all();
            return view('home.houses', ['categories'=>$categories]);
        }

    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);
        $category = new Category();
        $category->name= $request->input('name');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $category->image = $path;
        }
        $category->save();

        //tao moi xong quay ve trang danh sach khach hang
        return redirect()->route('category.index');
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $category = Category::findOrFail($id);
        $category->name     = $request->input('name');

        if($request->hasFile('image')){
            $currentImage = $category->image;
            if($currentImage){
                Storage::delete('/public/'.$currentImage);
            }
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $category->image = $path;
        }
        $category->save();

        Session::flash('success', 'Cập nhật khách hàng thành công');
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $category = Category::where('id',$id)->first();
        $image = $category->image;
        if($image ){
             Storage::delete('public'.$image);
        }
        $category->houses()->delete();
        $category->delete();
        return redirect()->route('category.index');
    }

}
