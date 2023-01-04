<?php

namespace App\Http\Controllers;
use App\Models\Structure;
use App\Models\Industria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ses()
    {   
        //Session::forget('industria');
        //Session::flush();
       // return Industria::find(session('structure'));
       // return session('_token');
        return Session::get('structure');

    }
    public function index()
    {
        if(session()->has('industria')) // ищем сессии индустрию если находим то загружаем индекс
        {

           return $this->index_show();
        }
        else //нет переходим к выбору индустрии
        {
          return $this->select_other();
        } 
        
    }
    public function select_other(){
        if(Industria::where('auth_id','=',Auth::id())->count()==0)
            return redirect('/industria/create');
            else
            return Inertia::render(
                'Structure/Select',
                [
                    'industrias' => Industria::where('auth_id','=',Auth::id())->get(),

                ]
            );
    }
    public function index_show(){
        $id_industria=session('industria');
        $structures = Structure::where('ind_id','=',$id_industria);
       // return   Industria::find($id_industria);
        return Inertia::render(
                'Structure/Index',
                [
                    'structures' => $structures->get(),
                    'industria'=>Industria::find($id_industria),
                ]
            );
    }
    public function select_industria($industria)
    {
       // session()->forget('industria');
        session(['industria'=>$industria]);
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
        $dep=Structure::where('ind_id','=',$id_industria);
        return Inertia::render(
            'Structure/Create',
            [
                'industria'=>Industria::find($id_industria),
                'deps'=>$dep->get(),
                'dep'=>$id_struct,
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
            'ind_id' => 'required',
            'name' => 'required|string|max:255',
            'abv' => 'required|string|max:10',
            'dependence' => 'required',
        ]);
        $nstr=Structure::create([
            'ind_id' => $request->ind_id,
            'name' => $request->name,
            'abv' => $request->abv,
            'dependence' => $request->dependence,
        ]);
        session(['structure'=>$nstr->id]);
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
        $id_industria=session('industria');
        $dep=Structure::where('ind_id','=',$id_industria);
        return Inertia::render(
            'Structure/Edit',
            [
              'structure' => $structure,
              'industries'=>Industria::find($id_industria),
              'dep_strut'=>$dep->get(),
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
        $structure->name = $request->name;
        $structure->abv = $request->abv;
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
