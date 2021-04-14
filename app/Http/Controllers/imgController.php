<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class imgController extends Controller
{
    //
    public function upload(Request $request)
    {
        $path = $request->file('photo')->store('uploads', 'public');
        $profile = new Profile();
        $profile->profile_link = $path;
        $profile->profile_description = $request->text;
        $profile->profile_user_id = $request->user()->id;
        $profile->save();

//        return view('default', ['pat' => $path]);


        return view('myProfileEdit', [
            'me' => $profile
        ]);
    }
}
