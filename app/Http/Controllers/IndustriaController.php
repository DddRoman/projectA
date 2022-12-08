<?php

namespace App\Http\Controllers;

use App\Models\Industria;
use App\Http\Controllers\Services\ApiController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class IndustriaController extends ApiController
{
    /**
     * Display a listing of the resouIndustriae.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $industria = Industria::where('auth_id','=',Auth::id());
        return Inertia::render(
            'Industria/Index',
            [
                'industria' =>  $industria->get(),
            ]
        );
        //return view('industria.index',['user_id'=>]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        if(!isset($request->depend))$request->depend=0;
        $industria = Industria::where('auth_id','=',Auth::id());
        $type=TypeController::type_array(1);
        return Inertia::render(
            'Industria/Create',
            [
                'dep'=>$request->depend,
                'all_dep'=>$industria->get(),
                'types'=>$type,
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
        $data=  [
            'name'=>$request->name,
            'auth_id'=>Auth::id(),
            'dependence'=>$request->dependence,    
             'type'=>$request->type,
            'discription'=>$request->discription,
        ];
        //return $data;
        Industria::create($data);
        return redirect('/industria');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Industria  $industria
     * @return \Illuminate\Http\Response
     */
    public function Show($id)
    {
     
        return view('industria.show',['data'=>Industria::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Industria  $industria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $industria = Industria::where('auth_id','=',Auth::id());
        $type=TypeController::type_array(1);
        return Inertia::render(
            'Industria/Edit',
            [
              'industr'=>Industria::find($id),
                'all_dep'=>$industria->get(),
              'types'=>$type,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Industria  $industria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($indstr=Industria::find($id)){
            $indstr->name=$request->name;
            $indstr->dependence=$request->dependence;   
            $indstr->type=$request->type;
            $indstr->discription=$request->discription;    
            $indstr->save();
        }
        return redirect('/industria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Industria  $industria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($indstr=Industria::find($id)){
            $indstr->delete();
        }
        return redirect('/industria');
    }
    public function levels($ind,$level=[],$l=0){

        if(Industria::find($ind)){
            $rez['lvl-'.$ind.'-'.$l]=Industria::where('dependence','=',$ind)->count();
            $rez=array_merge($level,$rez);$l++;
            foreach(Industria::where('dependence','=',$ind)->get('id') as $lev){
                $rez=$this->levels($lev->id,$rez,$l);
            }
        }
       
        return $rez;
    }
    public function cols($ind,$cols=['l0'=>0,'max'=>0],$l=0){
    $data=['l0'=>0,'max'=>0];
        if(Industria::find($ind)){
            $data['l0']=Industria::where('dependence','=',$ind)->count();
            $data['max']=$cols['max']+ $data['l0'];
            $l++;
            foreach(Industria::where('dependence','=',$ind)->get('id') as $lev){
                $data=$this->cols($lev->id,$data,$l);
            }
        }
        return $data;
    }
    public function info($ind){
       if(Industria::find($ind)){
        return ['inf'=>Industria::find($ind),'next'=>$this->cols($ind)];
        }
        return false;
    }
    public function user($id,$level=0){
        if(Industria::query()->where('auth_id','=',$id)->where('dependence','=',$level)->count()>0){
           foreach( Industria::query()->where('auth_id','=',$id)->where('dependence','=',$level)->get('id') as $ind){
            $data[]=$ind->id;
           }
         return $data;
         }
         return false;
     }
}
