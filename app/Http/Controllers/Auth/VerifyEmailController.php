<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

//varifyEmailController inherite Controller
class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     * invoke mehtod is called when cintroller contain only one method in it
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        //if request user has varifiedemail then
        if ($request->user()->hasVerifiedEmail()) {
            //rediect to home page
            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
        }
        //if user is marked as emailvarified
        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }
        //rediect to home page
        return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
    }
}
