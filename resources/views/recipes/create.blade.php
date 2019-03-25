@extends('layouts.app')
@section('content')
@include('inc.messages')
<script src="/ck/ckeditor/ckeditor.js"></script>
    
<h3 class="text-center"><u>Create Recipe</u></h3>
<div class="container">
{!! Form::open(['action' => 'RecipesController@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
<div class="form-group">
    {{Form::label('title','Recipe Title')}}
    {{Form::text('title','',['class'=>'form-control','placeholder'=>'Insert here'])}}
</div>

    <div class="form-group">
        {{Form::label('ingredients','Ingredients')}}
        {{Form::textarea('ingredients','',['class'=>'form-control','placeholder'=>'Enter ingredients here'])}}
    </div>
    <div class="form-group">
        {{Form::label('instructions','Instructions')}}
        {{Form::textarea('instructions','',['class'=>'form-control','placeholder'=>'Enter istructions here'])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
    
    {{Form::submit('submit',['class'=>'btn btn-primary'])}}
    
{!! Form::close() !!} 
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'editor1' );
</script>
</div>
@endsection