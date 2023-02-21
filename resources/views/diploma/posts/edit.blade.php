@extends('layouts.diploma.diploma')
@section('content')
    @php
        $route_name = \Illuminate\Support\Facades\Route::currentRouteName();
    @endphp
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard-page-head">
                        <div class="page-header">
                            <h1>{{$user->nickname}} <small>Отредактируй место.</small></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 profile-dashboard">
                    <div class="row">
                        <div class="col-md-7 dashboard-form">
                            @include('diploma.includes.create&update-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
