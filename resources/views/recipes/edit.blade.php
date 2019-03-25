@extends('layouts.app')
@section('content')
<h3 class="text-center">Edit Recipe</h3>
{!! Form::open(['action' => ['RecipesController@update',$recipe->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
<div class="container">
<div class="form-group">
    {{Form::label('title','Recipe Title')}}
    {{Form::text('title',$recipe->title,['class'=>'form-control','placeholder'=>'Insert here'])}}
</div>
<div class="form-group">
        {{Form::label('ingredients','Ingredients')}}
        {{Form::textarea('ingredients','',['class'=>'form-control','placeholder'=>'text here'])}}
    </div>
    <div class="form-group">
            {{Form::label('instructions','Instructions')}}
            {{Form::textarea('instructions','',['class'=>'form-control','placeholder'=>'text here'])}}
        </div>
    <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('submit',['class'=>'btn btn-primary'])}}
    
{!! Form::close() !!}
</div>
@endsection