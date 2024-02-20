<?php

namespace App\Http\Controllers;

use App;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


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
        $code = str_replace("<script async src=\"//www.instagram.com/embed.js\"></script>", "", $code);

        if($code == "" ){
            return "Помилка: код інстаграму обов\'язковий до заповнення";
        }

        $validator = Validator::make($request->all(), [
            'code' => 'required',
        ]);

        Project::create([
            'title' => $title,
            'description' => $description,
            'title_en' => $title_en,
            'description_en' => $description_en,
            'dir' => $dir,
            'code' => $code
        ]);

        return 'Дані записані <meta http-equiv=\'refresh\' content=\'1; url=/projects-adm\'>';
    }

    public function delete(Request $request)
    {

        $id = $request['id'] ?? "";
        $pwd = $request['pwd'] ?? "";
        if($pwd == 25){
            $project = Project::find($id);
            if ($project) {
                $project->delete();
                echo "Проект з id $id був успішно видалений.";
            } else {
                echo "Проект з id $id не знайдений.";
            }
        }
    }

}
