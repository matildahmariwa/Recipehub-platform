@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-heading">Dashboard</div>

<div class="panel-body">
<a href="/recipehub/public/create/" class="btn btn-primary">Create Recipe</a>
<p>Your recipes</p>
@foreach($recipes as $recipe)
<div class="well">
        <div class="row">
        <div class="col-md-4 col-sm-4">
        <img style="width:100%" src="/recipehub/public/storage/cover_images/{{$recipe->cover_image}}">
        </div>
        <div class="col-md-8 col-sm-8">
        <h3><a href="/recipehub/public/recipes/{{$recipe->id}}">{{$recipe->title}}</h3>
        
        </div>   
        </div>
        
        @endforeach
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
