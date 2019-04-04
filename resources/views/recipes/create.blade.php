        @extends('layouts.app')
        @section('content')
        @include('inc.messages')  
        <html>
        <head>
        <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
        </head>
        <body>
        <h3 class="text-center"><u>Create Recipe</u></h3>
        <div class="container">
        
        {!! Form::open(['action' => 'RecipesController@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
        <div class="form-group">
        {{Form::label('title','Recipe Title')}}
        {{Form::text('title','',['class'=>'form-control','placeholder'=>'Insert here'])}}
        </div>
       

        <div class="form-group">
                {{Form::label('ingredients','Ingredients')}}
                {{Form::textarea('ingredients',null,['id'=>'ingredients', 'class' => 'ckeditor','placeholder'=>'Insert here','name'=>'ingredients'])!!}}
        </div>
        <div class="form-group">
                        {{Form::label('instructions','Instructions')}}
                        {{Form::textarea('instructions','',['id'=>'instructions', 'class' => 'ckeditor','placeholder'=>'Insert here'])}}
        </div>

        <div class="form-group">
                        {{Form::file('cover_image')}}
        </div>
        
        {{Form::submit('submit',['class'=>'btn btn-primary','type'=>'submit','id'=>'submit'])}}
        
        {!! Form::close() !!} 


        </div>

        </body>
        {{--
        <script>
                ClassicEditor
                        .create( document.querySelector( '#ingredients' ))
                        
                        
                        .then( editor => {
                                console.log( editor );
                        } )
                        
                        .catch( error => {
                                console.error( error );
                        } );
                        

           
        </script>
        <script>
                ClassicEditor
                        .create( document.querySelector( '#instructions' ))
                        //.create( document.querySelector( '#editor1' ))
                        
                        
                        .then( editor => {
                                console.log( editor );
                        } )
                        
                        .catch( error => {
                                console.error( error );
                        } );
                       
        </script>
--}}
        </html>

        @endsection