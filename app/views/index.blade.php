@extends('layout')

@section('menu')
<div id="menu_bg">
        <div id="menu">
        <ul>
            <li class="index"><a href="{{ URL::to('/') }}"  class="current">Home</a></li>
            <li class="register"><a href="{{ URL::to('register') }}">Register</a></li>
            <li class="order"><a href="{{ URL::to('order') }}">Order</a></li>
            @if(Auth::check())
            <li class="logout"><a href="{{ URL::to('logout') }}">Logout</a></li>
            <li><div class="welcome">Welcome back, {{ucfirst(Auth::user()->first_name)}}</div></li>
            @else
            <li class="login"><a href="{{ URL::to('login') }}">Login</a></li>
            @endif
        </ul>
        </div>
    </div>
@stop

@section('content')
<div id="content_left">
    <div class="text">
        Best pizza in town!
        <br/>
        Try our special pizza with selected toppings.
    </div>

    <div class="pizza_box">
        <a class="pizza_img" href="{{ URL::to('order') }}">
            <img alt="Pizza" src="{{ asset('images/pizza_big.jpg') }}" />
        </a>
        <div class="textbox">
            <a href="{{ URL::to('order') }}">Veggie Pizza</a>
        </div>
    </div>
</div>
<div id="content_right">
<p>
    PizzaHub is Canada's upcoming pizza chain located in several cities. Here you will find answers to all your pizza cravings.
</p>
<a href="{{ URL::to('order') }}"><img alt="Delivery Now" src="{{ asset('images/pizza_delivery.jpg') }}" /></a>
</div>
<div id="card">
    <img alt="Credit Cards" src="{{ asset('images/cards.jpg') }}" />
</div>
@stop
