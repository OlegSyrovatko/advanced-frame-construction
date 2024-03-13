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


    public function houses_query(Request $request)
    {
        $mi1 = $request['mi1'];
        $ma1 = $request['ma1'];
        $mi2 = $request['mi2'];
        $ma2 = $request['ma2'];
        $mi3 = $request['mi3'];
        $ma3 = $request['ma3'];
        $mi4 = $request['mi4']*1000;
        $ma4 = $request['ma4']*1000;

        $houses = DB::table('houses')
            ->select('id','title', 'area', 'price', 'floors', 'rooms')
            ->where('area', '>=', $mi1)
            ->where('area', '<=', $ma1)
            ->where('rooms', '>=', $mi2)
            ->where('rooms', '<=', $ma2)
            ->where('floors', '>=', $mi3)
            ->where('floors', '<=', $ma3)
            ->where('price', '>=', $mi4)
            ->where('price', '<=', $ma4)
            ->orderBy('price', 'asc')
            ->get();

        foreach ($houses as $house) {
            $id = $house->id;
            $title = $house->title;
            $area = $house->area;
            $price = $house->price;
            $floors = $house->floors;
            $rooms = $house->rooms;

            $covers = DB::table('house_photos')
                ->select('photo_path','width')
                ->where('is_cover', 1)
                ->where('house_id', $id)
                ->where(function ($query) {
                    $query->where('width', 150)
                        ->orWhere('width', 300);
                })
                ->get();
            $fscover="";
            $fbcover="";
            foreach ($covers as $cover) {
                $photo_path = $cover->photo_path;
                $width = $cover->width;
                if($width==150){$fscover=$photo_path;}
                if($width==300){$fbcover=$photo_path;}
            }

            echo"<li class=\"card\" ><a href=\"/\"> <b>$title</b>";

            if($covers->count() > 0){
                echo"<img class=\"img-card\"
                 srcset=\"/storage/$fscover 1x, /storage/$fbcover 2x\"
                 sizes=\"(max-width: 600px) 150px, 300px\"
                 src=\"/storage/$fscover\"
                 alt=\"$title\">";
             }
             else {echo"<p>No cover photos found.</p>";}

            echo"<ul class=\"opt\">
                    <li>" . __('messages.house-area') . ": $area м2</li>
                    <li>" . __('messages.rooms') . ": $rooms  </li>
                    <li>" . __('messages.floors') . ": $floors  </li>
                    <li> " . __('messages.price') . ": $price " . __('messages.uah') . ".</li>
                 </ul>
            </a></li>";
        }

    }

    public function updateHouse(Request $request)
    {
        $contact = new House;
        return view('update-house', ['data' => $contact->find($id)]);
    }
}
