@extends('layouts.app')
@inject('type', 'App\Http\Controllers\TypeController')
@section('content')
<div class="container">
    <h1>New industry</h1>
    {{Form::open(['route' => ['industria.update', $data->id],'method' => 'put'])}}

    <div class="form-group">
    {{ Form::label('Name', null, ['class' => 'control-label']) }}
    {{ Form::text('name', $data->name, array_merge(['class' => 'form-control','placeholder'=>'Industry name'])) }}
</div>
<div class="form-group">
    {{ Form::label('type', null, ['class' => 'control-label']) }}
    {{Form::select('type',$type->type_array(1), $data->type, ['placeholder' => 'Select type ...','class' => 'form-control'])}}
</div>  
<div class="form-group">
    {{ Form::label('dependence', null, ['class' => 'control-label']) }}
    {{Form::select('dependence',$type->dependence_industry_array(Auth::id()), $data->dependence, ['placeholder' => 'Select dependency ...', 'class' => 'form-control'])}}
</div>  
<div class="form-group">
    {{ Form::label('discription', null, ['class' => 'control-label']) }}
    {{ Form::text('discription',  $data->discription, array_merge(['class' => 'form-control'], $attributes=['cols'=>10,'rows'=>50])) }}
</div>
<div class="form-group">
{{Form::submit('Edit')}}  
</div>

</div>
@endsection