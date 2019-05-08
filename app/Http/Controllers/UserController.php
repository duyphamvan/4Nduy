<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\ProfileUserRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Requests\DmmRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        if (!$this->userCan('view-admin.admin')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này'));

        }

        $users = User::orderBy('id', 'DESC')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        if (!$this->userCan('view-admin.admin')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này'));

        }
        return view('admin.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->image = $request->image;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;

        if ($request->hasFile('image')) {
            $avatar = $request->image;
            $path = $avatar->store('avatar', 'public');
            $user->image = $path;
        }

        $user->save();
        Session::flash('success', 'Thêm mới thành công!');
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $idUserLogin = Auth::user()->id;
        if ($user->id == 1 || $user->id == $idUserLogin) {

            Session::flash('error', 'Không thể xóa tài khoản này!');
            return redirect()->route('users.index');
        }

        $user->delete();
        Session::flash('success', 'Xóa thành công!');
        return redirect()->route('users.index');
    }

    public function update($id)
    {
        $user = User::findOrFail($id);
        $idUserLogin = Auth::user()->id;
        if ($user->id == 1 || $user->id == $idUserLogin) {

            Session::flash('error', 'Không thể cập nhật thông tin tài khoản này!');
            return redirect()->route('users.index');
        }

        return view('admin.users.update', compact('user'));
    }

    public function edit(UpdateUsersRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $idUserLogin = Auth::user()->id;
        if ($user->id == 1 || $user->id == $idUserLogin) {
            Session::flash('error', 'Không thể cập nhật thông tin tài khoản này!');
            if ($user->id != $request->id) {
                Session::flash('error', 'Khong duoc phep cap nhat');
                return redirect()->route('viewhome');
            }
            return redirect()->route('viewhome');
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = $request->role;

        if ($request->hasFile('image')) {
//            unlink(public_path() . '/storage/' . $user->image);
            $avatar = $request->image;
            $path = $avatar->store('avatar', 'public');
            $user->image = $path;
        }

        $user->save();
        Session::flash('success', 'Cập nhật thành công!');
        return redirect()->route('users.index', compact('user'));
    }

    public function profiles( $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.profile', compact('user'));
    }
    public function editProfile (ProfileRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;

        if ($request->hasFile('image')) {
            $avatar = $request->image;
            $path = $avatar->store('avatar', 'public');
            $user->image = $path;
        }
        $user->save();
        Session::flash('success', 'Cập nhật thông tin thành công!');
        return redirect()->route('users.profiles', compact('user'));
    }
}
