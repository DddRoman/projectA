<?php

namespace App\Http\Controllers;
use App\Models\Structure;
use App\Models\Industria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $structures = Structure::where('ind_id','=',1);
        return Inertia::render(
            'Structure/Index',
            [
                'structures' => $structures->get(),
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
            'Structure/Create',
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
        Structure::create([
            'struct_id' => $request->struct_id,
            'name' => \Str::slug($request->name),
            'abv' => \Str::slug($request->abv),
            'discription' => $request->discription
        ]);
        sleep(1);

        return redirect()->route('structures.index')->with('message', 'Structures Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function show(Structure $structure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function edit(Structure $structure)
    {
       $Industries=Industria::where('auth_id','=',Auth::id())->select('id','name');
        $dep_strut=Structure::where('dependence','=',$structure->dependence)->whereOr('dependence','=',0)->select('id','name');
        return Inertia::render(
            'Structure/Edit',
            [
                'structure' => $structure,
                 'industries'=>$Industries->get(),
              'dep_strut'=>$dep_strut->get(),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Structure $structure)
    {
        $request->validate([
            'ind_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'abv' => 'required|string|max:10',
            'dependence' => 'required',
        ]);

        $structure->ind_id = $request->ind_id;
        $structure->name = \Str::slug($request->name);
        $structure->abv = \Str::slug($request->abv);
        $structure->dependence = $request->dependence;
        $structure->save();
        sleep(1);

        return redirect()->route('structures.index')->with('message', 'Structure Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Structure $structure)
    {
        $structure->delete();
        sleep(1);
        return redirect()->route('structures.index')->with('message', 'Structure Delete Successfully');
    }
}
