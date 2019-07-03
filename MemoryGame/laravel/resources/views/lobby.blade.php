@extends('index')
   @section('content')
            <!--{{ Auth::user()->nickname}}-->
        <div class="container col-lg-6">
            @include('content_game')
        </div>
        <div class="container col-lg-6">
            @include('sidebar')
        </div>
    @stop
