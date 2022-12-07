<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Inertia\Inertia;
class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::all();
        return Inertia::render(
            'Position/Index',
            [
                'positions' => $positions
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render(
            'Position/Create',
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'struct_id' => 'required',
            'name' => 'required|string|max:255',
            'abv' => 'required|string|max:10',
            'discription' => 'required',
        ]);
        Position::create([
            'struct_id' => $request->struct_id,
            'name' => \Str::slug($request->name),
            'abv' => \Str::slug($request->abv),
            'discription' => $request->discription
        ]);
        sleep(1);

        return redirect()->route('positions.index')->with('message', 'Positions Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
       // $my_var="my var";
        return Inertia::render(
            'Position/Edit',
            [
                'position' => $position,
              //  'my_var'=>$my_var
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        $request->validate([
            'struct_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'abv' => 'required|string|max:10',
            'discription' => 'required',
        ]);

        $position->struct_id = $request->struct_id;
        $position->name = \Str::slug($request->name);
        $position->abv = \Str::slug($request->abv);
        $position->discription = $request->discription;
        $position->save();
        sleep(1);

        return redirect()->route('positions.index')->with('message', 'Position Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        $position->delete();
        sleep(1);
        return redirect()->route('positions.index')->with('message', 'Position Delete Successfully');
    }
}
