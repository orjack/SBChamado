<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;                                                                                                                                                                                                                                                                                                                                                                                                                                                    
use Image;

class UserController extends Controller
{
    public function profile() {
        return view('auth.profile', array('user'=> Auth::user()));
    }

    public function update_avatar(Request $request) {
        if($request->hasFile('avatar')) {
            $avatar = $request->File('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(
                public_path('upload/avatar/' . $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return view('auth.profile', array('user'=> Auth::user()));
    }
}
