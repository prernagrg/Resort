<?php

namespace App\Http\Controllers;

use App\Models\file;


use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = new Room;
        $rooms = $rooms->paginate(10);
    return view('royal-master.Admin.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $file = new file;
        $files = $file->paginate(10);
        return view('royal-master.Admin.room.create', compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Room;
        // dd($request->all());
        $request->validate([
            'roomtype' => 'required',
            'image' => 'required',
            'bedType' => 'required',
            'capacity' => 'required|numeric',
            'ac' => 'nullable',
            'wifi' => 'nullable',
            'teaCoffeeMaker' => 'nullable',
            'inRoomSafe' => 'nullable',
            'purifiedWater' => 'nullable',
            'workplace' => 'nullable',
            'bathtub' => 'nullable',
            'iron' => 'nullable',
            'tv' => 'nullable',
            'rainShower' => 'nullable',
            'wardrobe' => 'nullable',
            'miniBar' => 'nullable',
            'livingSpace' => 'nullable',
            'fruit' => 'nullable',
            'refrigerator' => 'nullable',
            'hairDryer' => 'nullable',
            'description' => 'required|max:200'

        ]);

        $data->roomtype = $request->roomtype;
        $data->description = $request->description;
        $data->image = $request->image;
        $data->bedType = $request->bedType;
        $data->capacity = $request->capacity;
        $data->ac = $request->ac;
        $data->wifi = $request->wifi;
        $data->teaCoffeeMaker = $request->teaCoffeeMaker;
        $data->inRoomSafe = $request->inRoomSafe;
        $data->purifiedWater = $request->purifiedWater;
        $data->workplace = $request->workplace;
        $data->tv = $request->tv;
        $data->rainShower = $request->rainShower;
        $data->wardrobe = $request->wardrobe;
        $data->miniBar = $request->miniBar;
        $data->livingSpace = $request->livingSpace;
        $data->fruit = $request->fruit;
        $data->refrigerator = $request->refrigerator;
        $data->bathtub = $request->bathtub;
        $data->hairDryer = $request->hairDryer;
        $data->iron = $request->iron;

        $files = new file;
        if ($data->save()) {
            return redirect()->route('room.create')->with('success', 'Successfully uploaded');
        } else {
            return redirect()->route('room.index')->with('error', 'Failed to upload');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       $rooms = Room::find($id);
       return view('royal-master.Admin.room.show',compact('rooms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rooms = Room::find($id);
        $file = new file;
        $files = $file->paginate(10);
        return view('royal-master.Admin.room.edit',compact('rooms','files'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $data = Room::find($id);
        // dd($request->all());
        $request->validate([
            'roomtype' => 'required',
            'image' => 'required',
            'bedType' => 'required',
            'capacity' => 'required|numeric',
            'ac' => 'nullable',
            'wifi' => 'nullable',
            'teaCoffeeMaker' => 'nullable',
            'inRoomSafe' => 'nullable',
            'purifiedWater' => 'nullable',
            'workplace' => 'nullable',
            'bathtub' => 'nullable',
            'iron' => 'nullable',
            'tv' => 'nullable',
            'rainShower' => 'nullable',
            'wardrobe' => 'nullable',
            'miniBar' => 'nullable',
            'livingSpace' => 'nullable',
            'fruit' => 'nullable',
            'refrigerator' => 'nullable',
            'hairDryer' => 'nullable',
            'description' => 'required|max:200'

        ]);

        $data->roomtype = $request->roomtype;
        $data->description = $request->description;
        $data->image = $request->image;
        $data->bedType = $request->bedType;
        $data->capacity = $request->capacity;
        $data->ac = $request->ac;
        $data->wifi = $request->wifi;
        $data->teaCoffeeMaker = $request->teaCoffeeMaker;
        $data->inRoomSafe = $request->inRoomSafe;
        $data->purifiedWater = $request->purifiedWater;
        $data->workplace = $request->workplace;
        $data->tv = $request->tv;
        $data->rainShower = $request->rainShower;
        $data->wardrobe = $request->wardrobe;
        $data->miniBar = $request->miniBar;
        $data->livingSpace = $request->livingSpace;
        $data->fruit = $request->fruit;
        $data->refrigerator = $request->refrigerator;
        $data->bathtub = $request->bathtub;
        $data->hairDryer = $request->hairDryer;
        $data->iron = $request->iron;


        if ($data->update()) {
            return redirect()->route('room.index')->with('success', 'Successfully uploaded');
        } else {
            return redirect()->back()->with('error', 'Failed to upload');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $request, $id)
    {
        $rooms = Room::find($id);
        $rooms -> delete();
        return redirect()->back()->with('delete','Successfully deleted');
    }
}
