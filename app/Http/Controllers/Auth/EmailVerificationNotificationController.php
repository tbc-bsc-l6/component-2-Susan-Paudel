<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

//EmailverificationNotificationController inherite Controller
class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //if request user has varifiedEmail
        if ($request->user()->hasVerifiedEmail()) {
            //redirect to home page
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        //send user email verificationnotification
        $request->user()->sendEmailVerificationNotification();
        //with status 
        return back()->with('status', 'verification-link-sent');
    }
}
