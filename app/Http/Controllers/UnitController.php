<?php

namespace App\Http\Controllers;
use App\Models\Structure;
use App\Models\Industria;
use App\Models\Position;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
class UnitController extends Controller
{
    public function index()
    { 
        $units = Unit::where('auth_id','=',Auth::id())->get();
        if($units->count()>0)
        $u=[
            'user' => User::find($units->auth_id),
        ];
        else $u=[];
          return Inertia::render(
            'Units/Index',
            [
                'units' =>  $u,
            ]
        );
    }
    public function create(){
        $industries=[];
        $structures=[];
        $positions=[];
        return Inertia::render(
            'Units/Create',
            [
                'industries'=>$industries,
                'structures'=> $structures,
                'positions'=>$positions,
            ]
        );
    }
}
