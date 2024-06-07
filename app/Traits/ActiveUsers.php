<?php

namespace App\Traits;

use App\Models\ActiveUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Carbon\Carbon;
use Pusher\Pusher;

/**
 * Tracks user activities and logs them to the database.
 *
 * This trait provides a method to log various user activities throughout
 * the application. It is designed to be used in models or controllers to
 * capture significant actions performed by users.
 */
trait ActiveUsers
{

    public function logActivity(string $action)
    {
        if (ActiveUser::where('user_id', auth()->user()->id)->exists()) {
            $activity = ActiveUser::where('user_id', auth()->user()->id)->first();
        } else {
            $activity = new ActiveUser;
            $activity->user_id = auth()->user()->id;
        }
        $activity->ip = Request::ip();
        if ($action == 'login') {
            $activity->login_time = Carbon::now();
        }
        $activity->last_activity_time = Carbon::now();
        $activity->save();
        $this->send_notification('login', auth()->user()->id);
    }
    public function removeActivity(string $user_id)
    {
        if (ActiveUser::where('user_id', $user_id)->exists())
            ActiveUser::where('user_id', $user_id)->first()->delete();
        $this->send_notification('logout', $user_id);
    }
    public function send_notification($action, $user_id)
    {
        $pusher = new Pusher(
            "4e74589b75961525aea2",
            "a0d7555c189fda7da048",
            "1814874",
            array('cluster' => 'ap2')
        );
        
// app_id = "1814874"
// key = "4e74589b75961525aea2"
// secret = "a0d7555c189fda7da048"
// cluster = "ap2"
        $activeCounts = ActiveUser::count();
        $popupMessage = '';
        $userName = User::find($user_id)->username;
        if ($action == 'login') {
            $popupMessage = $userName . ' Logged In!';
            $popupType = 'success';
        } else {
            $popupMessage = $userName . ' Logged Out!';
            $popupType = 'error';
        }
        $pusher->trigger('activity-updates', 'activity-updates', array('counts' => $activeCounts, 'popupMessage' => $popupMessage, 'popupType' => $popupType));
    }
}
