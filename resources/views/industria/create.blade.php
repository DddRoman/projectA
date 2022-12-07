@extends('layouts.app')
@inject('type', 'App\Http\Controllers\TypeController')
@section('content')
<div class="container">
    <h1>New industry</h1>
    {{Form::open(['route' => ['industria.store'],'method' => 'post'])}}

    <div class="form-group">
    {{ Form::label('Name', null, ['class' => 'control-label']) }}
    {{ Form::text('name', '', array_merge(['class' => 'form-control','placeholder'=>'Industry name'])) }}
</div>
<div class="form-group">
    {{ Form::label('type', null, ['class' => 'control-label']) }}
    {{Form::select('type',$type->type_array(1), null, ['placeholder' => 'Select type ...','class' => 'form-control'])}}
</div>  
<div class="form-group">
    {{ Form::label('dependence', null, ['class' => 'control-label']) }}
    {{Form::select('dependence',$type->dependence_industry_array(Auth::id()), $dep, ['placeholder' => 'Select dependency ...','class' => 'form-control'])}}
</div>  
<div class="form-group">
    {{ Form::label('discription', null, ['class' => 'control-label']) }}
    {{ Form::text('discription', '', array_merge(['class' => 'form-control'], $attributes=['cols'=>10,'rows'=>50])) }}
</div>
<div class="form-group">
{{Form::submit('Create')}}   
</div>

</div>
@endsection