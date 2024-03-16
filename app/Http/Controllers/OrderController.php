<?php

namespace App\Http\Controllers;

use App;
use App\Mail\EmailVerification;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
// use App\Mail\EmailVerification;
//use App\Helpers\PriceHelper;
use App\Mail\EmailOrder;


class OrderController extends Controller
{
    public function subscribe(Request $request)
    {
        $lan = App::currentLocale();
        $username = $request['username'] ?? "";
        $tel = $request['tel'] ?? "";
        $link = $request['link'] ?? "";

        if($username == "" || $tel == "" || $link == ""){

            $title = "Помилка";
            $message = 'Перші 2 поля обов\'язкові для заповнення';
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
            'link' => 'required',
        ]);

        Order::create([
            'username' => $username,
            'tel' => $tel,
            'link' => $link,
            'comment' => $comment
        ]);

        $this->sendEmailOrder($username, $tel, $link, $comment);

        $title = "Успіх";
        $message = 'Дані відправлені';
        if ($lan == "en") {
            $title = "Success";
            $message = 'Data sent';
        }

        return response()->json(['message' => $message, 'title' => $title], 200);
    }

    protected function sendEmailOrder($username, $tel, $link, $comment)
    {
        Mail::to("advanced.frame.construction@gmail.com")->send(new EmailOrder($username, $tel, $link, $comment));
    }
    public function delete_order(Request $request)
    {

        $id = $request['id'] ?? "";
        $pwd = $request['pwd'] ?? "";
        if($pwd == 25){
            $order = Order::find($id);
            if ($order) {
                $order->delete();
                return "order з id {$id} був успішно видалений.";
            } else {
                echo "order з id $id не знайдений.";
            }
        }
    }

}
