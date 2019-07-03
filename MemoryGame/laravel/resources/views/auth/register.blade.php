<!-- resources/views/auth/register.blade.php -->
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
    <form method="POST" action="register">
        {!! csrf_field() !!}

        <div>
            Name
            <input type="text" name="nickname" value="{{ old('nickname') }}">
        </div>

        <div>
            Email
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            Password
            <input type="password" name="password">
        </div>

        <div>
            Confirm Password
            <input type="password" name="password_confirmation">
        </div>

        <div>
            <button type="submit">Register</button>
        </div>
    </form>
@stop