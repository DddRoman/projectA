<?php

namespace App\Http\Controllers;
use App\Models\Structure;
use App\Models\Industria;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
        if(session()->has('structure')) // ищем сессии structure если находим то загружаем индекс
        {


           return $this->index_show();
        }
        else //нет переходим к выбору индустрии
        {
          return $this->select_other();
        } 
    }
    public function select_other(){
     //return Structure::where('ind_id','=',session('industria'))->get();
        if(Structure::where('ind_id','=',session('industria'))->count()==0)   
            return redirect('/structure/create');
            else
           return Inertia::render(
                'Position/Select',
                [
                    'structures' => Structure::where('ind_id','=',session('industria'))->get(),

                ]
            );
    }
    public function index_show(){
        $id_structure=session('structure');
        $positions = Position::where('struct_id','=',$id_structure);
        return Inertia::render(
                'Position/Index',
                [
                    'positions' => $positions->get(),
                    'structure'=>Structure::find($id_structure),
                ]
            );
    }
    public function select_structure($structure)
    {
       // session()->forget('structure');
        session(['structure'=>$structure]);
        return $this->index_show();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_industria=session('industria');
        $id_struct=session('structure');
        $id_position=session('position');
        $dep=Position::where('struct_id','=',$id_struct);

        return Inertia::render(
            'Position/Create',
            [
                'industria'=>Industria::find($id_industria),
                'structure'=>Structure::find($id_struct),
                'deps'=>$dep->get(),
                'dep'=>$id_position,
            ]
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
            'dependence' => 'required',

        ]);
        $position=Position::create([
            'struct_id' => $request->struct_id,
            'name' => $request->name,
            'abv' => $request->abv,
            'discription' => $request->discription,
            'dependence' => $request->dependence,
        ]);
        session(['position'=>$position->id]);
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
        $id_struct=session('structure');
        $dep=Position::where('struct_id','=',$id_struct);
        return Inertia::render(
            'Position/Edit',
            [
                'deps'=>$dep->get(),
                'position'=>$position,
                'structure'=>Structure::find($id_struct),
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
            'name' => 'required|string|max:255',
            'abv' => 'required|string|max:10',
            'discription' => 'required',
            'dependence' => 'required',

        ]);
        $position->name = $request->name;
        $position->abv = $request->abv;
        $position->discription = $request->discription;
        $position->dependence = $request->dependence;
        $position->save();
        sleep(1);
        session(['position'=>$position->id]);
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
