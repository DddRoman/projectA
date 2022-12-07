@extends('layouts.app')
@inject('type', 'App\Http\Controllers\TypeController')
@inject('ind', 'App\Http\Controllers\IndustriaController')
@section('content')
{{link_to('industria/create', $title = 'add new', $attributes = ['class'=>'btn btn-success'], $secure = null)}}
<table class="table">
    
        
   <?php
  /*  @foreach($data as $industria)
    {{Form::label('url_'.$industria->id, $industria->name)}} 
    {{link_to('industria/'.$industria->id, $title = $industria->name, $attributes = [], $secure = null)}}
   @endforeach*/
   $col_max=0;
   function table($level,$ind){
     $string=''; 
     $coll_max=0;
     $lvl=[];
        if(count($level)>0){ $string.= '<tr>';
            foreach($level as $l1){
                $col=$ind->cols($l1,$cols=['l0'=>0,'max'=>0],$l=0);
                $coll_max+=$col['max'];
                $string.=  '<td';
                if($col['max']>0) $string.=  'COLSPAN='.($col['max']+1);
                $ids=$ind->info($l1);
                $level_id=$ids['inf']->id;
                $string.=  '> ';
                $string.=  $ids['inf']->name;
                $string.=  '<a href="industria/create?depend='.$level_id.'">Add</a>';
                $string.=  '</td>';
                $user_id=$ids['inf']->auth_id;
                
                if($ids['next']['max']>0)
                {
                   $lvl=$ind->user($user_id, $level_id); 
                }
                
            }
             $string.= '</tr>';
             if(count($lvl)>0){
               $string.= table($lvl,$ind);
             }

        }
     return $string;
   }

   if($IND=$ind->user($user_id)){
        $string=table($IND,$ind);  
        echo $string;
    }
  
   ?> 
 

</table>
  


@endsection