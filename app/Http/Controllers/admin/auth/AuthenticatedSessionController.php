<?php

namespace App\Http\Controllers\Admin\Auth;
//use required class,model
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//AuthenticatedSessionController inherite Controller
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.adminlogin');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminLoginRequest $request)
    {
        //check for authentication
        $request->authenticate();
        //generate session
        $request->session()->regenerate();
        //return direct to admin dashboard
        return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {

        //if logout button is fetch
        Auth::guard('admin')->logout();
        //destroy session
        $request->session()->invalidate();
        //regenerate session after logout
        $request->session()->regenerateToken();
        //return redirect to admin login page
        return redirect()->route('admin.login');
    }
}
