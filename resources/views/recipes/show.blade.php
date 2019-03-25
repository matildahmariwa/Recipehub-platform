@extends('layouts.app')
@section('content')
<a href="/recipehub/public/recipes" class="btn btn-default">Back to recipes </a>
<div class="container">
    
<div class="well">
        <h1>{{$recipe->title}}</h1>
        <br><br>
<div class="row">
    <div class="col-md-6 col-sm-6">
        <img  src="/recipehub/public/storage/cover_images/{{$recipe->cover_image}}">   
    </div>
    <div class="col-md-6 col-sm-6">
            
            <div>
                <h1 style="border-bottom:dotted 1px;">Ingredients</h1>
                    {{$recipe->ingredients}}
                </div>
    </div>

</div>


<br><br>  

<br><br>


<div>
    <h1  style="border-bottom: dotted 1px;">Instructions</h1>
    {{$recipe->instructions}}
</div>
<hr>
<small>Published on {{$recipe->created_at}}  by {{$recipe->user->name}}</small>
<hr>
</div>
@if(!Auth::guest())
@if(Auth::user()->id==$recipe->user_id)
<a href="/recipehub/public/recipes/{{$recipe->id}}/edit" class="btn btn-default" style="float:left">Edit</a>
{!!Form::open(['action'=>['RecipesController@destroy',$recipe->id],'method'=>'POST','class'=>'pull-right'])!!}
{{Form::hidden('_method','DELETE')}}
{{Form::submit('Delete',['class'=>'btn btn-danger'])}}
{!!Form::close()!!}
</div>


@endif
@endif
@endsection