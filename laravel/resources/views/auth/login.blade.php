<!-- resources/views/auth/login.blade.php -->
@extends('index')
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{route('login')}}" class="well well-sm">
        {!! csrf_field() !!}

        <div class="form-group">
            <h1> Login </h1>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Nickname</label>
            <input class="form-control" type="text" name="nickname" value="{{ old('nickname') }}">
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Password</label>
            <input class="form-control" type="password" name="password" id="password">
        </div>

        <div class="form-group">
            <input type="checkbox" name="remember"> Remember Me
        </div>

        <div class="form-group">
            <button class="btn btn-default" type="submit">Login</button>

            <a href="{{route('register')}}">
                <button class="btn btn-default" type="button" >Register</button>
            </a>
            <a>
                <button class="btn btn-default" type="button" >Enter as Guest</button>
            </a>
        </div>
    </form>
@stop
@section('footer')
    <div class="footer">
        Beatriz Franco (2120181), Tiago Coito (2111227), João Rebelo (2130717)
    <div>
@stop