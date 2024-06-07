<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use App\Rules\CaptchaRule;
use App\Traits\ActiveUsers;

class LoginController extends Controller
{
    use ActiveUsers;
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            // 'captcha' => 'required'
        ]);

        // Validate the captcha
        // if (!CaptchaRule::validateCaptcha($request->captcha)) {
        //     return redirect()->back()->withErrors(['captcha' => 'Invalid captcha. Please try again.']);
        // }

        $user = User::where('username', $request->username)
            ->where('password', $request->password)->first();

        if ($user) {

            \Auth::login($user);
            $this->logActivity('login');
            return redirect('dashboard/index');
        } else {
            return false;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function logout(Request $request)
    {
        $this->removeActivity(auth()->user()->id);
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }
    protected function loggedOut(Request $request)
    {
        //
        return redirect('dashboard/index');
    }
    protected function guard()
    {
        return \Auth::guard();
    }
}
