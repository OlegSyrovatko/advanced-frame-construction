<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\HousePhoto;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class HouseController extends Controller
{
    public function create()
    {
        // return view('houses');
        return view('works');
    }

    public function store(Request $request)
    {
        $data['title'] = $request->input('title', 'default_title');
        $data['area'] = $request->input('area', 0);
        $data['price'] = $request->input('price', 0);
        $data['description'] = $request->input('description', 'default_description');
        $rooms = $request['rooms'] ?? 1;
        $floors = $request['floors'] ?? 1;
        $pwd = $request['pwd'] ?? "";
        if($pwd == 25){
            $data['rooms'] = $rooms;
            $data['floors'] = $floors;

            $data['works'] = "";
            $works = DB::table('works')
            ->select('id','title', 'description')
            ->orderBy('place', 'asc')
            ->where('included', 1)
            ->get();
            $worksn = $works->count();
            if ($worksn>0){
                $data['works'] = "<table>";
                foreach ($works as $work) {
                    $id = $work->id;
                    $idin = "in$id";
                    $title = $work->title;
                    $description = $work->description;
                    if($request->input($idin)){
                        $data['works'].="<tr><td>$title</td><td>$description</td></tr>";
                    }
                }
                $data['works'].="</table>";
            }



            $data['other_works'] = "";
            $works = DB::table('works')
            ->select('id','title')
            ->orderBy('place', 'asc')
            ->where('included', 0)
            ->get();
            $worksn = $works->count();
            if($worksn>0){
                $data['other_works'] = "<table>";
                foreach ($works as $work) {
                    $id = $work->id;
                    $idout = "out$id";
                    $pout = "pout$id";
                    $title = $work->title;

                    if($request->input($idout)){
                        $other_price = $request->input($pout);
                        $data['other_works'].="<tr><td>$title</td><td>$other_price</td></tr>";
                    }
                }
                $data['other_works'].="</table>";
            }


            $house = House::create($data);

            if ($request->hasFile('cover_photo')) {
                $coverPhoto = $request->file('cover_photo');
                $coverFileName = uniqid('cover_', true) . '.' . $coverPhoto->getClientOriginalExtension();
                $coverPath = 'house_photos/' . $coverFileName;

                // Save the original cover photo
                Storage::disk('public')->put($coverPath, file_get_contents($coverPhoto));

                $this->saveResizedImage($house, $coverPhoto, 'cover_', $coverPath, [300, 150]);

                $house->photos()->create([
                    'photo_path' => $coverPath,
                    'is_cover' => true,
                ]);
            }

            // Save other photos
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $fileName = uniqid('other_', true) . '.' . $photo->getClientOriginalExtension();
                    $path = 'house_photos/' . $fileName;

                    Storage::disk('public')->put($path, file_get_contents($photo));

                    $this->saveResizedImage($house, $photo, 'other_', $path, [300, 150]);

                    $house->photos()->create([
                        'photo_path' => $path,
                        'is_cover' => false,
                    ]);
                }
            }

            return redirect()->route('houses-adm')->with('success', 'Будинок та фотографії успішно додані.');

        }
    }

    private function saveResizedImage($house, $originalImage, $prefix, $path, $widths)
    {
        $image = Image::make($originalImage);

        foreach ($widths as $width) {
            $resizedFileName = uniqid($prefix, true) . '_' . $width . '.' . $originalImage->getClientOriginalExtension();
            $resizedPath = 'house_photos/' . $resizedFileName;  // Змінено шлях

            $height = intval($image->height() * ($width / $image->width()));

            Storage::disk('public')->put($resizedPath, $image->resize($width, $height)->encode());

            $house->photos()->create([
                'photo_path' =>  $resizedPath,
                'is_cover' => $prefix === 'cover_', // Adjust accordingly
                'width' => $width,
            ]);
        }
    }
}
