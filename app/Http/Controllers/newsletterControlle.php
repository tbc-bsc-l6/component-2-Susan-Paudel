<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\newsletter;

class newsletterControlle extends Controller
{
    public function store(Request $request)
{
    if ( ! Newsletter::isSubscribed($request->user_email) ) {
        //Newsletter::subscribe($request->user_email);
        Newsletter::subscribePending($request->user_email);
        return back()->with('status','Thanks For Your Subscription');
    }
    return back()->with('status','You are already subscribed');
}
}
