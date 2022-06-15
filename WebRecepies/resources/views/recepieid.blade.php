@extends('layouts.app')

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body class="antialiased">
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
                                <!-- idk itt a recepie helyere mi kene -->
                                @foreach ($recepie as $recepies)
                                <tr>
                                    <th scope="col-sm">{{ $recepies->recipe_name }}</th>
                                    <th scope="col-sm">{{ $recepies->user_id }}</th>
                                    <th scope="col-sm">{{ $recepies->freefrom }}</th>
                                </tr>
                                @endforeach
                            </thead>
                        </div>
                    </table>
            </div>
        </div>
    </body>
</html>