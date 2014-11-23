@extends('layout')

@section('scripts')
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.validator.js') }}"></script>
@stop

@section('menu')
<div id="menu_bg">
        <div id="menu">
        <ul>
            <li><a href="{{ URL::to('/') }}">Home</a></li>
            <li><a href="{{ URL::to('register') }}">Register</a></li>
            <li><a href="{{ URL::to('order') }}">Order</a></li>
            @if(Auth::check())
            <li><a href="{{ URL::to('logout') }}">Logout</a></li>
            <li><div class="welcome">Welcome back, {{ucfirst(Auth::user()->first_name)}}</div></li>
            @else
            <li><a href="{{ URL::to('login') }}" class="current">Login</a></li>
            @endif
        </ul>
        </div>
    </div>
@stop

@section('content')
<div id="content_left">
    @if(isset($message))
    <div class="error_message">
        {{$message}}
    </div>
    @endif
    <div id="form">
    <div id="form-title">Login:</div>
{{ Form::open(array('url' => 'login')) }}
<div class="input">
   {{ Form::label('username', 'Username') }}
   {{ Form::text('username') }}
</div>
<div class="input">
   {{ Form::label('password', 'Password') }}
   {{ Form::password('password') }}
</div>
<div class="input">
   {{ Form::submit('Log In') }}
</div>
{{ Form::close() }}
    </div>
</div>
@stop

@section('javascript')
<script type="text/javascript">
    $(function(){
        $('#username').attr('data-validation', 'required');
        $('#password').attr('data-validation', 'required');

        $.validate();
    });
</script>
@stop