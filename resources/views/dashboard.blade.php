@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-heading" >Dashboard</div>

<div class="panel-body">
<a href="/recipehub/public/create/" class="btn btn-primary">Create Recipe</a>
<p>Your Blog  posts</p>
<table class="table table-striped">
<tr>
    <th>Title</th>
    <th></th>
    <th></th>
</tr>
@foreach($recipes as $recipe)
<tr>
        <th>{{$recipe->title}}</th>
<th><a href="/recipehub/public/recipes/{{$recipe->id}}/edit">Edit</a></th>
<th>DELETE</th>
        <th></th>
    </tr>
@endforeach



</div>


</div>
</div>
</div>
</div>
</div>
@endsection
