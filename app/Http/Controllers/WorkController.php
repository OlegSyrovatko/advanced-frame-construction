<?php

namespace App\Http\Controllers;

use App;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class WorkController extends Controller
{
    public function create(Request $request)
    {
        $title = $request['title'] ?? "";
        $description = $request['description'] ?? "";
        $place = $request['place'] ?? "";
        $included = $request->has('included');

        $pwd = $request['pwd'] ?? "";
        if($pwd == 25){

            if($place == "" || $title  == ""){
                return "Перші 2 поля обов'язкові до заповнення <meta http-equiv='refresh' content='1; url=/works'>";
            }

            Work::create([
                'title' => $title,
                'description' => $description,
                'place' => $place,
                'included' => $included,
            ]);

            return 'Дані записані <meta http-equiv=\'refresh\' content=\'1; url=/works\'>';
        }

    }

    public function update(Request $request)
    {

        $id = $request['id'];
        $title = $request['title'] ?? "";
        $description = $request['description'] ?? "";
        $place = $request['place'] ?? "";
        $included = $request->has('included');
        $pwd = $request['pwd'] ?? "";

       if($pwd == 25 && $id>0){

           Work::where('id', $id)->update([
               'title' => $title,
               'description' => $description,
               'place' => $place,
               'included' => $included,
           ]);
           return 'Дані оновлені <meta http-equiv=\'refresh\' content=\'1; url=/works\'>';
        }
    }

    public function delete(Request $request)
    {
        $id = $request['id'] ?? "";
        $pwd = $request['pwd'] ?? "";
        if($pwd == 25){
            $work = Work::find($id);
            if ($work) {
                $work->delete();
                return "Робота з id {$id} була успішно видалена. <meta http-equiv='refresh' content='1; url=/works'>";

            } else {
                echo "Проект з id {$id} не знайдений.";
            }
        }
    }

    public function updateOrder(Request $request)
    {
        $newOrder = $request['newOrder'];



        foreach ($newOrder as $workId => $newIndex) {
            $updatedWork = Work::find($workId);

            if ($updatedWork) {
                $updatedWork->place = $newIndex;
                $updatedWork->save();
            }
        }


        $sortedWorks = Work::orderBy('included', 'desc')
            ->orderBy('place', 'asc')
            ->get()
            ->sortBy(function ($work) {
                return $work->included . $work->place;
            });

        return response()->json(['success' => true, 'message' => 'Order updated successfully', 'works' => $sortedWorks]);



    }

}
