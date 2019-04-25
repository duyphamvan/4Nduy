<?php

namespace App\Http\Controllers;

use App\Category;
use App\House;
use App\Http\Requests\FormSearchRequest;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('home.viewhome', compact('categories'));
    }

    public function filterByCategory($categoryId)
    {
        $houses = Category::findOrFail($categoryId)->houses;
        $category = Category::findOrFail($categoryId);
        $categories = Category::all();
        return view('home.list-house', compact('houses', 'category', 'image'));
    }

    public function showHouse($id)
    {

        $houseDetail = House::findOrFail($id);
        $houses = House::findOrFail($id)->images;
        return view('home.house-detail', compact('houseDetail', 'houses'));
    }


    public function showChangePasswordForm()
    {
        return view('auth.changepassword');
    }

    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->route('viewhome')->with("success", "Password changed successfully !");
    }

    public function search(FormSearchRequest $request)
    {
        $bedroom = $request->bedroom;
        $bathroom = $request->bathroom;
        $address = $request->input('address');
        $date_from = date('Y-m-d', strtotime($request->input('date_from')));
        $date_to = date('Y-m-d', strtotime($request->input('date_to')));

        $from = null;
        $to = null;
        $price = $request->price;
        switch ($price) {
            case 1:
                $from = 1;
                $to = 100;
                break;
            case 2:
                $from = 100;
                $to = 1000;
                break;
            case 3:
                $from = 1000;
                $to = 2000;
                break;
            case 4:
                $from = 2000;
                $to = 3000;
                break;
            case 5:
                $from = 3000;
                $to = 20000;
                break;
        }
        $houses = House::where('address', 'LIKE', '%' . $address . '%')
            ->where('date_from', '>=', $date_from)
            ->where('date_to', '<=', $date_to)
            ->when($bathroom, function ($query) use ($bathroom) {
                return $query->where('bathroom', $bathroom);
            })

            ->when($bedroom, function ($query) use ($bedroom) {
                return $query->where('bedroom', $bedroom);
            })
            ->when($from, function ($query) use ($from) {
                return $query->where('price','>=', $from);
            })
            ->when($to, function ($query) use ($to) {
                return $query->where('price','<=', $to);
            })
            ->get();

       return view('home.search', compact('houses'));

    }

    public function showPageAdmin()

    {
        if (!$this->userCan('view-admin.admin')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này'));

        }
        return view("admin.admin");
    }
}

