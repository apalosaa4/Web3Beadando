@extends('layouts.app')

@section('content')
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-white-100 dark:bg-white-900 sm:items-center py-4 sm:pt-0">
            <div class="container" style="margin-top: 10px">
                <div style="text-align:center"><h4 style="color: rgba(140, 63, 187, 0.892)">Hope You have fun while making the {{ $recepie->recipe_name }}!</h4></div> <br><br>
                <div class="row">
                    <thead>
                        <tr>
                            <h1 style="color: rgba(140, 63, 187, 0.892)"><th scope="col-sm">{{ $recepie->recipe_name }}</th></h1>            
                        </tr>
                    </thead>
                </div>
                <br>    
                <div class="row">
                    <thead>
                        <tr>
                            <h3 style="color: rgba(53, 137, 206, 0.687)"><th scope="col-sm">{{ $recepie->freefrom }}</th></h3>
                        </tr>
                    </thead>
                </div> 
                <br>  
                <div class="row">
                    <thead>
                        <tr>
                            <h5>{{ $recepie->description }}</th></h5>
                        </tr>
                    </thead>
                </div>      
            </div>
        </div>
    </body>
@endsection