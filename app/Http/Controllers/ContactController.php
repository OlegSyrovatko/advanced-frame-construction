<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
// use App\Mail\EmailVerification;
//use App\Helpers\PriceHelper;

class ContactController extends Controller
{


    public function subscribe(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'tel' => 'required',
            // 'email' => 'required|email',
            // allow only one url subscription
            // 'email' => 'required|email|unique:price_trackers',
        ]);
/*
        if ($validator->fails()) {
            return redirect('/subscribe')
                ->withErrors($validator)
                ->withInput();
        }
*/
        //  Getting a price from an ad on OLX

        Contact::create([
            'username' => $request->input('username'),
            'tel' => $request->input('tel'),
            'area' => $request->input('area'),
            'comment' => $request->input('comment')
        ]);

/*
        //  Sending an email to a subscriber
        $this->sendEmailNotification($request->input('username'), $request->input('tel') );

        $request->input('username'), $request->input('tel'), $request->input('area'), $request->input('comment')
         return response()->json(['message' => 'Subscription successful']);

         */
    }


}
