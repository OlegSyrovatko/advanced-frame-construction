<?php

namespace App\Http\Controllers;

use App;
use App\Mail\EmailVerification;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
// use App\Mail\EmailVerification;
//use App\Helpers\PriceHelper;
use App\Mail\EmailNotification;


class ContactController extends Controller
{
    public function subscribe(Request $request)
    {
        $lan = App::currentLocale();
        $username = $request['username'] ?? "";
        $tel = $request['tel'] ?? "";
        $area = $request['area'] ?? "";

        if(!$username && !$tel && $area <1){

            $title = "Помилка";
            $message = 'Перші 3 поля обов\'язкові для заповнення';
            if ($lan == "en") {
                $title = "Error";
                $message = 'The first 3 fields are mandatory';
            }

            return response()->json(['error' => $message, 'title' => $title], 422);
        }

        $comment = $request['comment'] ?? "";



        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'tel' => 'required',
        ]);


        Contact::create([
            'username' => $username,
            'tel' => $tel,
            'area' => $area,
            'comment' => $comment
        ]);



        $this->sendEmailNotification($username, $tel, $area, $comment);

        $title = "Успіх";
        $message = 'Дані відправлені';
        if ($lan == "en") {
            $title = "Success";
            $message = 'Data sent';
        }

        return response()->json(['message' => $message, 'title' => $title], 200);
    }

    protected function sendEmailNotification($username, $tel, $area, $comment)
    {
       Mail::to("sirov@ukr.net")->send(new EmailNotification($username, $tel, $area, $comment));
    }

}
