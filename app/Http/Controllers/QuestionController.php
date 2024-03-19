<?php

namespace App\Http\Controllers;

use App;
use App\Mail\EmailVerification;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
// use App\Mail\EmailVerification;
//use App\Helpers\PriceHelper;
use App\Mail\EmailNotification;


class QuestionController extends Controller
{
    public function subscribe(Request $request)
    {
        $lan = App::currentLocale();
        $username = $request['username'] ?? "";
        $tel = $request['tel'] ?? "";


        if($username == "" || $tel == "" ){

            $title = "Помилка";
            $message = 'Перші 2 поля обов\'язкові для заповнення';
            if ($lan == "en") {
                $title = "Error";
                $message = 'The first 2 fields are mandatory';
            }

            return response()->json(['error' => $message, 'title' => $title], 422);
        }

        $option = $request['option'] ?? "";
        $new_option = $request['new_option'] ?? "";
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'tel' => 'required',
        ]);

        return response()->json(['message' => $option, 'title' => $new_option], 200);
        /*
        Contact::create([
            'username' => $username,
            'tel' => $tel,
            'area' => $area,
            'comment' => $comment
        ]);

        $this->sendEmailQuestion($username, $tel, $area, $comment);

        $title = "Успіх";
        $message = 'Дані відправлені';
        if ($lan == "en") {
            $title = "Success";
            $message = 'Data sent';
        }

        return response()->json(['message' => $message, 'title' => $title], 200);
        */
    }

    protected function sendEmailQuestion($username, $tel, $area, $comment)
    {
        Mail::to("advanced.frame.construction@gmail.com")->send(new EmailNotification($username, $tel, $area, $comment));
    }
    public function delete_q(Request $request)
    {

        $id = $request['id'] ?? "";
        $pwd = $request['pwd'] ?? "";
        if($pwd == 25){
            $contact = Contact::find($id);
            if ($contact) {
                $contact->delete();
                return "Контакт з id {$id} був успішно видалений.";
            } else {
                echo "Контакт з id $id не знайдений.";
            }
        }
    }

}
