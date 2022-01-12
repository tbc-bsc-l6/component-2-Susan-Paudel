<?php

namespace App\Http\Controllers;

//NewsletterController inherite all the property of Controller 
class NewsletterController extends Controller
{
    /**
     * function sendnewsletter
     * @return \Illuminate\Http\Response
     */
    public function sendnewsletter()
    {
        //server side validation
        request()->validate(['email_address' => 'required | email']);
        //try start
        try {
            //if list exist then right side config file will execute
            $list ??= config('newsletter.lists.subscribers.id');
            //creating object 
            $mailchimp = new \MailchimpMarketing\ApiClient();
            //set config to mailchimp using key and server
            $mailchimp->setConfig([
                'apiKey' => env('MAILCHIMP_APIKEY'),
                'server' => 'us20',
            ]);
            //storing the email into mailchimp api
            $mailchimp->lists->addListMember($list, [
                "email_address" => request('email_address'),
                "status" => "subscribed",
            ]);
        }
        //if try block doesnot execute then catch function will run
        catch (\Exception $ex) {
            //throw error
            throw \Illuminate\Validation\ValidationException::withMessages([
                "email_address" => "Your Email Cannot Be verified!"
            ]);
        }
        //redirect back with success message 
        return back()->with('singed', 'You are signed up for our newsletters');
    }
}
