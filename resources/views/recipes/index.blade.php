@extends('layouts.app')
@section('content')
@include('inc.messages')
<h1 class="text-center">Recipes</h1>
<hr>
<div class="container">
@if(count($recipes)>0)
@foreach($recipes as $recipe)
<div class="well">
<div class="row">
<div class="col-md-4 col-sm-4">
<img style="width:100%" src="/recipehub/public/storage/cover_images/{{$recipe->cover_image}}">
</div>
<div class="col-md-8 col-sm-8">
<h3><a href="/recipehub/public/recipes/{{$recipe->id}}">{{$recipe->title}}</h3>
<small>Written on {{$recipe->created_at }} by {{$recipe->user->name}}</small> 
</div>   
</div>

@endforeach
</div>
@else
<p>no recipes found</p>
@endif
</div>
@endsection