<?php

namespace App\Http\Controllers;

use App\CategoryHouses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CategoryHousesController extends Controller
{
    public function index(){
        $categories = CategoryHouses::all();
        return view('categories.list', compact('categories'));
    }

    public function display(){
            $categories = CategoryHouses::all();
            return view('home.houses', ['categories'=>$categories]);
        }

    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
        $category = new CategoryHouses();
        $category->name     = $request->input('name');
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
        $category = CategoryHouses::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $category = CategoryHouses::findOrFail($id);
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
        $category = CategoryHouses::where('id',$id)->first();
//        $category->blogs()->delete();
        $image = $category->image;
        if($image ){
             Storage::delete('public'.$image);
        }
        $category->delete();
        return redirect()->route('category.index');
    }

}
