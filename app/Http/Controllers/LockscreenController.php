<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LockscreenController extends Controller
{
    public function locked()
    {
        return view('auth/lockscreen');
    }

    public function unlock(Request $request)
    {

        $check = Hash::check($request->input('password'), $request->user()->password);

        // dd($request->input('password'));
        if(!$check){
            return redirect()->route('locked')->withErrors([
                'Your password does not match your profile.'
            ]);
            // echo "pass error";
        }
        else
        {
            return redirect('/home');
            // echo "benar";
        }

    }
}
