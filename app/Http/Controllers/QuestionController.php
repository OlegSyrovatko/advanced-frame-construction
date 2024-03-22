<?php

namespace App\Http\Controllers;

use App;
use App\Mail\EmailQuestion;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class QuestionController extends Controller
{
    public function subscribe(Request $request)
    {
        $lan = App::currentLocale();
        $username = $request['username'];
        $tel = $request['tel'];

        if(!$username || !$tel ){
            $title = "Помилка";
            $message = 'Перші 2 поля обов\'язкові для заповнення';
            if ($lan == "en") {
                $title = "Error";
                $message = 'The first 2 fields are mandatory';
            }
            return response()->json(['error' => $message, 'title' => $title], 422);
        }


        $data = "";
        $datalist[] = "";

        $option = $request['option'];
        $new_option = $request['new_option'];
        if($option!=="new"){$new_option = $option;}
        if($new_option){
            $data .= "<br />Який вид будівлі потрібен? - $new_option";
            $datalist[] = "Який вид будівлі потрібен? - $new_option";
        }

        $option2 = $request['option2'];
        if($option2){
            $data .= "<br />Яку саме будівлю Ви бажаєте придбати? - $option2";
            $datalist[] = "Яку саме будівлю Ви бажаєте придбати? - $option2";
        }

        $option3 = $request['option3'];
        $new_option3 = $request['new_option3'];
        if($option3!=="new3"){$new_option3 = $option3;}
        if($new_option3){
            $data .= "<br />Яка площа приміщення? - $new_option3";
            $datalist[] = "Яка площа приміщення? - $new_option3";
        }

        $option4 = $request['option4'];
        if($option4){
            $data .= "<br />Товщина стін (утеплення) - $option4";
            $datalist[] = "Товщина стін (утеплення) - $option4";
        }

        $option5 = $request['new_option5'];
        if($option5){
            $data .= "<br />Кількість спалень - $option5";
            $datalist[] = "Кількість спалень - $option5";
        }

        $option6 = $request['option6'];
        $new_option6 = $request['new_option6'];
        if($option6!=="new6"){$new_option6 = $option6;}
        if($new_option6){
            $data .= "<br />Покрівельний матеріал - $new_option6";
            $datalist[] = "Покрівельний матеріал - $new_option6";
        }


        $option7 = $request['option7'];
        $new_option7 = $request['new_option7'];
        if($option7!=="new7"){$new_option7 = $option7;}
        if($new_option7){
            $data .= "<br />Матеріал фасаду - $new_option7";
            $datalist[] = "Матеріал фасаду - $new_option7";
        }

        $option9 = $request['option9'];
        $new_option9 = $request['new_option9'];
        if($option9!=="new9"){$new_option9 = $option9;}
        if($new_option9){
            $data .= "<br />Варіанти внутрішнього оздоблення стін - $new_option9";
            $datalist[] = "Варіанти внутрішнього оздоблення стін - $new_option9";
        }

        $option10 = $request['option10'];
        $new_option10 = $request['new_option10'];
        if($option10!=="new10"){$new_option10 = $option10;}
        if($new_option10){
            $data .= "<br />Оздоблення підлоги - $new_option10";
            $datalist[] = "Оздоблення підлоги - $new_option10";
        }

        $option11 = $request['option11'];
        $new_option11 = $request['new_option11'];
        if($option11!=="new11"){$new_option11 = $option11;}
        if($new_option11){
            $data .= "<br />Варіанти внутрішнього оздоблення стін - $new_option11";
            $datalist[] = "Варіанти внутрішнього оздоблення стін - $new_option11";
        }

        $option12 = $request['option12'];
        $new_option12 = $request['new_option12'];
        if($option12!=="new12"){$new_option12 = $option12;}
        if($new_option12){
            $data .= "<br />Комплектація - $new_option12";
            $datalist[] = "Комплектація - $new_option12";
        }

        $option13 = $request['option13'];
        $new_option13 = $request['new_option13'];
        if($option13!=="new13"){$new_option13 = $option13;}
        if($new_option13){
            $data .= "<br />Розмір вікон - $new_option13";
            $datalist[] = "Розмір вікон - $new_option13";
        }

        $option14 = $request['option14'];
        $new_option14 = $request['new_option14'];
        if($option14!=="new14"){$new_option14 = $option14;}
        if($new_option14){
            $data .= "<br />Санвузол (готовність) - $new_option14";
            $datalist[] = "Санвузол (готовність) - $new_option14";
        }

        $option15 = $request['option15'];
        $new_option15 = $request['new_option15'];
        if($option15!=="new15"){$new_option15 = $option15;}
        if($new_option15){
            $data .= "<br />Вхідні двері - $new_option15";
            $datalist[] = "Вхідні двері - $new_option15";
        }

        $option16 = $request['option16'];
        $new_option16 = $request['new_option16'];
        if($option16!=="new16"){$new_option16 = $option16;}
        if($new_option16){
            $data .= "<br />Опалення - $new_option16";
            $datalist[] = "Опалення - $new_option16";
        }

        $option17 = $request['option17'];
        $new_option17 = $request['new_option17'];
        if($option17!=="new17"){$new_option17 = $option17;}
        if($new_option17){
            $data .= "<br />Наявність теплої підлоги  - $new_option17";
            $datalist[] = "Наявність теплої підлоги  - $new_option17";
        }

        $option18 = $request['option18'];
        $new_option18 = $request['new_option18'];
        if($option18!=="new18"){$new_option18 = $option18;}
        if($new_option18){
            $data .= "<br />Чи потрібна Вам тераса? - $new_option18";
            $datalist[] = "Чи потрібна Вам тераса? - $new_option18";
        }

        $option19 = $request['new_option19'];
        if($option19){$data .= "<br />Якщо потрібна тераса, то які розміри? - $option19";
            $datalist[] = "Якщо потрібна тераса, то які розміри? - $option19";
        }


        $option20 = $request['option20'];
        $new_option20 = $request['new_option20'];
        if($option20!=="new20"){$new_option20 = $option20;}
        if($new_option20){
            $data .= "<br />Чи потрібно підключати та розводити комунікації? - $new_option20";
            $datalist[] = "Чи потрібно підключати та розводити комунікації? - $new_option20";
        }

        $option21 = $request['new_option21'];
        if($option21){
            $data .= "<br />Додаткові побажання та питання - $option21";
            $datalist[] = "Додаткові побажання та питання - $option21";
        }


        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'tel' => 'required',
        ]);

        // return response()->json(['title' => $data], 200);

        Question::create([
            'username' => $username,
            'tel' => $tel,
            'data' => $data
        ]);

        $this->sendEmailQuestion($username, $tel, $datalist);

        $title = "Успіх";
        $message = 'Дані відправлені';
        if ($lan == "en") {
            $title = "Success";
            $message = 'Data sent';
        }

        return response()->json(['message' => $message, 'title' => $title], 200);

    }

    protected function sendEmailQuestion($username, $tel, $datalist)
    {
        Mail::to("advanced.frame.construction@gmail.com")->send(new App\Mail\EmailQuestion($username, $tel, $datalist));
    }
    public function delete_q(Request $request)
    {
        $id = $request['id'] ?? "";
        $pwd = $request['pwd'] ?? "";
        if($pwd == 25){
            $question = Question::find($id);
            if ($question) {
                $question->delete();
                return "Питання з id {$id} було успішно видалено.";
            } else {
                echo "Питання з id $id не знайдено.";
            }
        }
    }

}
