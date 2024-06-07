<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $activeMenu = 'profile';
        return view('dashboard.profile.update-details', compact('activeMenu'));
    }

    public function update(Request $request)
    {
        //
        $user = \Auth::user();

        $data = $request->all();

        $user->update($data);

        return redirect('/dashboard/profile/index');
    }
}
