<?php

namespace App\Http\Controllers;

use App\Models\ImageRoom;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;



class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return Inertia::render('Test/Test', [
            'data' => $rooms,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  Redirect('/rooms')->with('message', 'All rooms creTE ');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_number' => ['required', 'integer', 'unique:rooms,room_number'],
            'capacity' => ['required', 'integer'],
            'images' => ['nullable'],
        ]);

        $room = Room::create($request->all());

        if ($room) {
            $fileName = null;
            $images = $request->file('images');
            foreach($images as $key => $value){
                $fileName = time().$value->getClientOriginalName();
                $filename = $value->storeAs('room_images',$fileName);
                ImageRoom::create(['image'=>$fileName,'room_id'=>$room->id]);
            }
            return  back()->with('message', 'room created ');
        } else {
            return  back()->with('error', 'Failed to created ');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return inertia('Test/Test2', [
            'data' => $room
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {

        $files = $request->get('images');
        dd($files);
        foreach ($files as $key => $file) {
            dd($file);
        }
        // dd($request);

        // $res = $room->update($request->all());
        // if ($res) {
        //     return back()->with('message', 'Room updated');
        // } else {
        //     return back()->with('error', 'Something Wrong!');
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
