<?php

namespace App\Http\Controllers;
use App\Models\Industria;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    static public function type_array($id){
        $type=Type::where('dependence','=',$id)
        ->select('id','name')
        ->orderBy('name')
        ->get(); 
        foreach($type as $tp){
          $type_array[$tp->id]= $tp->name;
        }
        return    $type_array;
    }
    static public function dependence_industry_array($id){
        $type_array[0]='Main';
        $type=Industria::where('auth_id','=',$id)
        ->select('id','name')
        ->orderBy('name')
        ->get(); 
        foreach($type as $tp){
          $type_array[$tp->id]= $tp->name;
        }
        return    $type_array;
    }
}
