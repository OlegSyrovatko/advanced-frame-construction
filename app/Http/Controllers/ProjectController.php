<?php

namespace App\Http\Controllers;

use App;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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
        $pwd = $request['pwd'] ?? "";
        if($pwd == 25){
            $code = str_replace("<script async src=\"//www.instagram.com/embed.js\"></script>", "", $code);

            if($code == "" ){
                return "Помилка: код інстаграму обов'язковий до заповнення";
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

    }

    public function update(Request $request)
    {


        $id = $request['id'];
        $title = $request['title'] ?? "";
        $description = $request['description'] ?? "";
        $title_en = $request['title_en'] ?? "";
        $description_en = $request['description_en'] ?? "";
        $dir = $request['dir'] ?? "all";
        $pwd = $request['pwd'] ?? "";

       if($pwd == 25 && $id>0){

           Project::where('id', $id)->update([
               'title' => $title,
               'description' => $description,
               'title_en' => $title_en,
               'description_en' => $description_en,
               'dir' => $dir,
           ]);
           return 'Дані оновлені <meta http-equiv=\'refresh\' content=\'1; url=/projects-adm\'>';
        }
    }

    public function delete(Request $request)
    {

        $id = $request['id'] ?? "";
        $pwd = $request['pwd'] ?? "";
        if($pwd == 25){
            $project = Project::find($id);
            if ($project) {
                $project->delete();
                return "Проект з id {$id} був успішно видалений. <meta http-equiv=\'refresh\' content=\'1; url=/projects-adm\'>";

            } else {
                echo "Проект з id $id не знайдений.";
            }
        }
    }
/*
    function projects(Request $request)
    {
        $dir = $request['dir'];
        $page = $request['page'];
        $skip = ($page - 1) * 10;

        $Allb = DB::table('projects')
            ->select('id', 'title', 'description', 'title_en', 'description_en', 'code', 'created_at')
            ->orderBy('created_at', 'desc')
            ->when($dir !== 'all', function ($query) use ($dir) {
                return $query->where('dir', $dir);
            })
            ->limit(11)
            ->skip($skip)->take(11)
            ->get();

        $Allbn = $Allb->count();

        $n = 1;
        foreach ($Allb as $Alb) {
            if ($n < 11) {
                $id = $Alb->id;
                $title = $Alb->title;
                $description = $Alb->description;
                $title_en = $Alb->title_en;
                $description_en = $Alb->description_en;
                $code = $Alb->code;
                $created_at = $Alb->created_at;

                echo "<li>$code</li>";
            }
            $n++;
        }


        if ($n == 12){
            $next_div = "next_div$page";
            $page = $page+1;
                echo"<div class=\"next\" id = \"$next_div\" onMouseOver = projects('$dir', $page) >
                    <a href =## onclick=projects('$dir',$page) rel=\"noopener noreferrer\">
                        <h3>" . __('messages.next') . "</h3>
                    </a>
                </div>";
            }

    }
*/
}
