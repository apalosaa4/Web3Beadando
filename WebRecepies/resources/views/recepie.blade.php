@extends('layouts.app')

@section('content')
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-white-100 dark:bg-white-900 sm:items-center py-4 sm:pt-0">
            <div class="container" style="margin-top: 10px">
                <div style="text-align:center"><h4 style="color: rgba(140, 63, 187, 0.892)">You can search here between hundreds of different recepies you could easily make at home!</h4></div> <br><br>
                
                <div class="row">
                    @foreach ($recepies as $recepie)
                    <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">{{ $recepie->recipe_name }}</h5>
                            <p class="card-text">{{ $recepie->freefrom }}</p>
                            <a href={{"recepie/".$recepie['recipe_id']}}>
                                <button class="btn btn-primary" style="background-color: rgba(140, 63, 187, 0.892); border-color:rgba(140, 63, 187, 0.892)" type="button">Description</button>
                            </a>
                          </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
@endsection
