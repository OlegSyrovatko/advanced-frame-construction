<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\HousePhoto;
use Illuminate\Support\Facades\Storage;

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

        $data['works'] = $request->input('works', 'default_value_for_works');
        $data['other_works'] = $request->input('other_works', 'default_value_for_other_works');

        $house = House::create($data);

        foreach ($request->file('photos') as $photo) {
            $path = $photo->store('house_photos');

            $isCover = ($request->has('cover_photo') && $request->file('cover_photo')->getClientOriginalName() == $photo->getClientOriginalName());

            $house->photos()->create([
                'photo_path' => $path,
                'is_cover' => $isCover,
            ]);
        }

        return redirect()->route('houses-adm')->with('success', 'Будинок та фотографії успішно додані.');


    }

}
