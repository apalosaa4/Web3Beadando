@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron" style="background:#F5F5F5">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="col-sm-6 col-md-8">
                    <h2> Your Profile</h2>
                        <div class="table responsive">
                            <div class="divTableBody">
                                <div class="divTableRow">
                                    <div class="divTableCell">Name: {{ $user->name }}</div>
                                </div>
                                <div class="divTableRow">
                                    <div class="divTableCell">Email: {{ $user->email }}</div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection