<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\services\Newsletter;

class newsletterControlle extends Controller
{
    public function sendnewsletter()
{
    request()->validate(['email_address'=>'required | email']);
    try{
        $list??=config('newsletter.lists.subscribers.id');
        $mailchimp = new \MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
        'apiKey' => env('MAILCHIMP_APIKEY'),
         'server' => 'us20',
         ]);
       
        $mailchimp->lists->addListMember($list,[
           "email_address"=>request('email_address'),
           "status"=>"subscribed",
       ]);
    }catch(\Exception $ex){
        throw \Illuminate\Validation\ValidationException::withMessages([
            "email_address"=>"Your Email Cannot Be verified!"
        ]);
    }
    
    return back()->with('success','You are signed up for our newsletters');
}
}