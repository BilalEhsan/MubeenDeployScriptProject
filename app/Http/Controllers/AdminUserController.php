<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ActiveUser;
use Illuminate\Http\Request;
use Pusher\Pusher;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        $activeMenu = 'users';
        return view('dashboard.admin-user.index', compact('activeMenu', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $activeMenu = 'users';
        return view('dashboard.admin-user.create', compact('activeMenu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = new User();

        $data = $request->all();
        $user->create($data);

        return redirect('/dashboard/admin-user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::findOrFail($id);
        $activeMenu = 'users';
        return view('dashboard.admin-user.edit', compact('activeMenu', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::findOrFail($id);

        $data = $request->all();

        $user->update($data);

        return redirect('/dashboard/admin-user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        $activeMenu = 'users';
        return redirect('/dashboard/admin-user');
    }

    public function activeUsers()
    {
        $users = ActiveUser::orderBy('created_at', 'DESC')->get();
        $activeMenu = 'users';
        return view('dashboard.admin-user.activeusers', compact('activeMenu', 'users'));
    }
    public function activeUserDelete(Request $request)
    {
        // dd($request->all());
        $pusher = new Pusher(
            "4e74589b75961525aea2",
            "a0d7555c189fda7da048",
            "1814874",
            array('cluster' => 'ap2')
        );
        $pusher->trigger('logout-user', 'logout-user', array('user_id' => $request->user_id));
        $users = ActiveUser::where('user_id', $request->user_id)->first()->delete();
        return back();
    }
}
