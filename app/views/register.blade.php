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
            <li><a href="{{ URL::to('register') }}" class="current">Register</a></li>
            <li><a href="{{ URL::to('order') }}">Order</a></li>
            @if(Auth::check())
            <li><a href="{{ URL::to('logout') }}">Logout</a></li>
            <li><div class="welcome">Welcome back, {{ucfirst(Auth::user()->first_name)}}</div></li>
            @else
            <li><a href="{{ URL::to('login') }}">Login</a></li>
            @endif
        </ul>
        </div>
    </div>
@stop

@section('content')
<div id="content_left">
    @if(isset($error))
    <div class="error_message">
        {{$error}}
    </div>
    @elseif(isset($success))
    <div class="success_message">
        {{$success}}
    </div>
    @endif
    <div id="form">
    <div id="form-title">Register:</div>
{{ Form::open(array('url' => 'register')) }}
<div class="input">
   {{ Form::label('first_name', 'First Name') }}
   {{ Form::text('first_name') }}
</div>
<div class="input">
   {{ Form::label('last_name', 'Last Name') }}
   {{ Form::text('last_name') }}
</div>
<div class="input">
   {{ Form::label('email', 'Email Address') }}
   {{ Form::text('email') }}
</div>
<div class="input">
   {{ Form::label('username', 'Username') }}
   {{ Form::text('username') }}
</div>
<div class="input">
   {{ Form::label('password', 'Password') }}
   {{ Form::password('password') }}
</div>

<div class="input">
   {{ Form::submit('Sign Up') }}
</div>
{{ Form::close() }}
    </div>
</div>
@stop

@section('javascript')
<script type="text/javascript">
    $(function(){
        $('#first_name').attr('data-validation', 'required');
        $('#last_name').attr('data-validation', 'required');
        $('#email').attr('data-validation', 'email');
        $('#username').attr('data-validation', 'length').attr('data-validation-length', '3-100');
        $('#password').attr('data-validation', 'required');

        $.validate();
    });
</script>
@stop