<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function ranking()
    {
        $rooms = Room::orderBy('point', 'desc')->get();
    
        $maxPoints = $rooms->max('point');
    
        if ($maxPoints == 0) {
            $maxPoints = 1;
        }
    
        return view('dashboard', compact('rooms', 'maxPoints'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Classes = Room::all();

        return view('pages.class', compact('Classes'));
    }

    public function create() {
        return view('pages.createClass');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imagePath = $request->file('image')->store('logos', 'public');
        $data = Room::create([
            'class' => $request->class,
            'image' => $imagePath,
            'point' => $request->point
        ]);
        return redirect()->route('dashboard')->with('success', 'Turma criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $class = Room::find($room->id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('logos', 'public');
        } else {
            $imagePath = $class->image;
        }

        $class->update([
            'class' => $request->class,
            'image' => $imagePath,   
            'point' => $request->point
        ]);
        return redirect()->route('dashboard')->with('success', 'Turma Editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('dashboard')->with('error', 'Turma Deletada com sucesso!');

    }
}
