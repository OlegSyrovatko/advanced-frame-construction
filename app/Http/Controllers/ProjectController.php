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


class ProjectController extends Controller
{
    public function create(Request $request)
    {
        $title = $request['title'] ?? "";
        $description = $request['description'] ?? "";
        $title_en = $request['title_en'] ?? "";
        $description_en = $request['description_en'] ?? "";
        $dir = $request['dir'] ?? "all";
        $code = $request['code'] ?? "";


        if($code == "" ){
            return "Помилка: код інстаграму обов\язковий до заповнення";
        }

        $validator = Validator::make($request->all(), [
            'code' => 'required',
        ]);

        Contact::create([
            'title' => $title,
            'description' => $description,
            'title_en' => $title_en,
            'description_en' => $description_en,
            'dir' => $dir,
            'code' => $code
        ]);


        return 'Дані записані';
    }

    public function delete_contact(Request $request)
    {

        $id = $request['id'] ?? "";
        $pwd = $request['pwd'] ?? "";
        if($pwd == 25){
            $contact = Contact::find($id);
            if ($contact) {
                $contact->delete();
                echo "Контакт з id $id був успішно видалений.";
            } else {
                echo "Контакт з id $id не знайдений.";
            }
        }
    }

}
