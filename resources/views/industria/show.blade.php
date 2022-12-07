@extends('layouts.app')
@section('content')
<div class="container">
    <h1> {{$data->name}}</h1>
    <div class="row">
    <div class="col-md-3">
        {{link_to('/industria', $title = 'Back', $attributes = ['class'=>'btn btn-success'], $secure = null)}}
    </div>
    <div class="col-md-3">
        {{link_to('/industria/'.$data->id.'/edit', $title = 'Edit', $attributes = ['class'=>'btn btn-info'], $secure = null)}}
    </div>
    <div class="col-md-6">
    {{Form::open(['route' => ['industria.destroy', $data->id],'method' => 'delete'])}}
    {{Form::submit('Delete' , $attributes = ['class'=>'btn-denger'])}}
    </div>
</div>
</div>
@endsection