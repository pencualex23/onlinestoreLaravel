<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mantshirt;
use App\login;
use App\order;

class MyController extends Controller
{


    public function homePage(Request $request)
    {

        $orders = order::where('user', $request->session()->get('userData'))->get();
        return view('/men', ['orders' => $orders]);
    }

    public function index(Request $request)
    {
        $orders = order::where('user', $request->session()->get('userData'))->get();
        return view('/men', ['orders' => $orders]);
    }

    public function tshirtsForMan(Request $request)
    {

        $tshirts = mantshirt::where('Gender', 'Male')->get();
        $orders = order::where('user', $request->session()->get('userData'))->get();
        return view('/category/tshirts', ['tshirts' => $tshirts], ['orders' => $orders]);
    }

    public function model($id, Request $request)
    {

        $tshirt = mantshirt::findOrFail($id);
        $listPhoto = explode(" ", $tshirt->photos);
        $listOrders = order::where('user', $request->session()->get('userData'))->get();

        $model = $tshirt;
        $photo = $listPhoto;
        $orders = $listOrders;

        return view('/category/model', compact('model', 'photo', 'orders'));
    }

    public function buy($id, Request $request)
    {

        $tshirt = mantshirt::findOrFail($id);
        $user = login::where('username', $request->session()->get('userData'))->first();
        $order = new order();
        $size = request('size');
        if ($size != "") {
            $tshirt->$size = $tshirt->$size - 1;
            $tshirt->save();
            $order->user = $user->username;
            $order->orderImage = $tshirt->image;
            $order->orderBrand = $tshirt->brand;
            $order->orderPrice = $tshirt->price;
            $order->orderSize = $size;
            $order->save();
        }
        return redirect('/men/tshirts');
    }

    public function login(Request $request)
    {

        $usernameForm = request('username');
        $passwordForm = request('password');
        $user = login::where('username', $usernameForm)->first();
        $check = password_verify($passwordForm, $user->password);

        if ($usernameForm == "")
            return redirect('/')->with('loginMsg', 'Username not inserted');
        elseif ($passwordForm == "")
            return redirect('/')->with('loginMsg', 'Password not inserted');
        elseif ($user == NULL)
            return redirect('/')->with('loginMsg', 'Username not registered');
        elseif ($user->username == $usernameForm && $check != 1)
            return redirect('/')->with('loginMsg', 'Wrong password');
        elseif ($user->username == $usernameForm && $check == 1) {
            $request->session()->put('userData', $usernameForm);
            return redirect('/');
        }
    }


    public function logout(Request $request)
    {
        $request->session()->forget('userData');
        return redirect('/');
    }


    public function register()
    {
        $user = new login();
        $usernameForm = request('username');
        $passwordForm = request('password');
        $passwordConfirmForm = request('passwordConfirm');
        $passwordHashed = password_hash($passwordForm, PASSWORD_DEFAULT);
        $userTable = login::where('username', $usernameForm)->first();

        if ($usernameForm == "")
            return redirect('/')->with('registerMsg', 'Username not inserted');
        elseif ($passwordForm == "")
            return redirect('/')->with('registerMsg', 'Password not inserted');
        elseif ($passwordConfirmForm == "")
            return redirect('/')->with('registerMsg', 'Confirm your password');
        elseif (strlen($passwordConfirmForm) < 8)
            return redirect('/')->with('registerMsg', 'Password is too short');
        elseif (strlen($passwordConfirmForm) > 21)
            return redirect('/')->with('registerMsg', 'Password is too long');
        elseif (preg_match('`[A-Z]`', $passwordForm) != 1)
            return redirect('/')->with('registerMsg', 'Password must have an upper letter');
        elseif ($userTable != NULL)
            return redirect('/')->with('registerMsg', 'Username is taken');
        elseif ($passwordForm != $passwordConfirmForm)
            return redirect('/')->with('registerMsg', 'Insert the same password');
        else {
            $user->username = $usernameForm;
            $user->password = $passwordHashed;
            $user->save();
            return redirect('/')->with('registerMsg', 'Your account was created');
        }
    }


    public function deleteOrder($id)
    {

        $order = order::where('id', $id)->delete();
        return redirect('/');
    }
}
