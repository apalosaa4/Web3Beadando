@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card-transparent">
                <div class="card-header-transparent offset-md-6 mb-4" >
                    <h3 style="color: rgba(140, 63, 187, 0.892)">{{ __('Add a new recipe') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addrecipe') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="recipe_name" class="col-md-4 col-form-label text-md-right" style="color: rgba(140, 63, 187, 0.892)">{{ __('Recepie name') }}</label>

                            <div class="col-md-6">
                                <input id="recipe_name" type="text" class="form-control @error('recipe_name') is-invalid @enderror" name="recipe_name" value="{{ old('recipe_name') }}" required autocomplete="recipe_name" autofocus>

                                @error('recipe_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="freefrom" class="col-md-4 col-form-label text-md-right" style="color: rgba(140, 63, 187, 0.892)">{{ __('Free From') }}</label>

                            <div class="col-md-6">
                                <input id="freefrom" type="freefrom" class="form-control @error('freefrom') is-invalid @enderror" name="freefrom" value="{{ old('freefrom') }}" required autocomplete="freefrom">

                                @error('freefrom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right" style="color: rgba(140, 63, 187, 0.892)">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>       

                        <div class="form-group row mb-12">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-primary" style="background-color: rgba(140, 63, 187, 0.892); border-color:rgba(140, 63, 187, 0.892)">
                                    {{ __('Add new recipe') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
