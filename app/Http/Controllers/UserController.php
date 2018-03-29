<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Vinkla\Hashids\Facades\Hashids;

class UserController extends Controller
{
  public function index() {
    if (\Auth::user()->is_admin) {
      $users = User::withCount('submissions')->get();
      return view('users', compact('users'));
    }
    else {
      return redirect('/admin/users/' . Hashids::encode(\Auth::user()->id ));
    }
  }

  public function store(Request $request) {
    $data = $request->all();

    $user = new User($data);
    $user->password = Hash::make($request->newpassword);



    $user->save();

    return back();

  }


}
