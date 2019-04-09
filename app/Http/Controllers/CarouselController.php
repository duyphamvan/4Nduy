<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        return view('slides.list', compact('slides'));
    }
    public function create()
    {
        return view('slides.create');
    }
    public function store(Request $request){
        $slide = new Slide();
        $slide->title = $request->input('title');
        $slide->content = $request->input('content');
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $slide->image = $path;
        }
        $slide->description = $request->input('description');
        $slide->save();
        Session::flash('success','Tạo mới thành công');
        return redirect()->route('slides.index');
    }
    public function update(Request $request,$id){
        $slide = Slide::findOrFail($id);
        $slide->title = $request->input('title');
        $slide->content = $request->input('content');
        $slide->dua_date = $request->input('dua_date');
        if ($request->hasFile('image')){
            $currentImg = $slide->image;
            if ($currentImg){
                Storage::delete('/public' .$currentImg);
            }
            $image =$request->file('image');
            $path = $image->store('images', 'public');
            $slide->image = $path;
        }
        $slide->save();
        Session::flash('success', 'Cập nhật thành công');
        return redirect()->route('slides.index');
    }
    public function edit($id){
        $slide = Slide::findOrFail($id);
        return view('slides.edit', compact('slide'));
    }
    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);
        $image = $slide->image;
        if ($image) {
            Storage::delete('/public/' . $image);
        }
        $slide->delete();
        Session::flash('success', 'Xóa thành công');
        return redirect()->route('slides.index');
    }
}
