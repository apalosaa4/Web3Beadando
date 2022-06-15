@extends('layouts.app')

@section('content')
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-white-100 dark:bg-white-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-white-700 dark:text-white-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-white-700 dark:text-white-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-white-700 dark:text-white-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="container" style="margin-top: 10px">
                <div>Each recepies come here</div>
                    <table class="table table-striped mt-5">
                        <div class="row">
                            <thead>
                                <tr>
                                    <th scope="col-sm">Recipe Name</th>
                                    <th scope="col-sm">User name</th>
                                    <th scope="col-sm">Free From</th>
                                    <th scope="col-sm">Description</th>
                                </tr>
                                @foreach ($recepies as $recepie)
                                <tr>
                                    <th scope="col-sm">{{ $recepie->recipe_name }}</th>
                                    <th scope="col-sm">{{ $recepie->user_id }}</th>
                                    <th scope="col-sm">{{ $recepie->freefrom }}</th>
                                    <th scope="col-sm">
                                        <a href={{"recepie/".$recepie['recipe_id']}}>
                                            <button class="btn btn-dark" type="button">Read more..</button>
                                        </a>
                                    </th>
                                </tr>
                                @endforeach
                            </thead>
                        </div>
                    </table>
            </div>
        </div>
    </body>
@endsection
