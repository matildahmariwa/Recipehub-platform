
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name',) }}</title>
    <link rel="shortcut icon" href="css/favicon3.ico" />
        
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }
            .right-title{
              
                margin-left: -400%;
                margin-top:0%;  
            }
            .right-title h1{
                font-family: 'Great Vibes', cursive;
                color:orange;
                
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .footer{
                background-color: aliceblue;
                height:10%;
                width:100%;
                padding-top: 10px;
                position: fixed;
                left: 0;
                bottom: 0;
                text-align: center;

            }
            #full-body{
                background-image:url(css/pic8.jpg);
                width: 100%;
                height: 100%;
                background-repeat: no-repeat;
                background-size: cover; /* or contain depending on what you want */
                background-position: center center;
                background-repeat: no-repeat;
            }
           
        #login{
         background-color: #fff;
        }  
        #view-button{
            margin:50px;
            background: transparent;
            font-weight: bold;
            color: white;
        }    
      
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height" id="full-body">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/dashboard') }}">Home</a>
                    @else
                        <a class="btn" id="login" href="{{ route('login') }}">LOGIN</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">REGISTER</a>
                        @endif
                    @endauth
                    <div class="right-title">
                            <h1>{{ config('app.name',) }}</h1>  
                           </div>
                </div>
                <div>
                  <a href="/recipehub/public/recipes"><button type="button" id="view-button"><h1>VIEW RECIPES</h1></button>
                   
                <a href="/recipehub/public/create"><button type="button" id="post-button"><h1>POST RECIPE</h1></button></a>  
                  
                
                   
                </div>
            @endif
            

           
                    
                

         
        <div class="footer">
            <h5 class="text-center">Copyright @<?php echo date("Y");?> <a href="#">Matildah mariwa</a> All Rights Reserved</h5>
        </div>
    </body>
</html>
