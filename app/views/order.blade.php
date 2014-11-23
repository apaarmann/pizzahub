@extends('layout')

@section('scripts')
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
@stop

@section('menu')
<div id="menu_bg">
        <div id="menu">
        <ul>
            <li><a href="{{ URL::to('/') }}">Home</a></li>
            <li><a href="{{ URL::to('register') }}">Register</a></li>
            <li><a href="{{ URL::to('order') }}" class="current">Order</a></li>
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
    <div id="form-title">Order your Veggie Pizza !</div> <br/>
    <img alt="Pizza" src="{{ asset('images/order_pizza.jpg') }}" />
</div>
<div id="content_right">
    @if(isset($error))
    <div class="error_message">
        {{$error}}
    </div>
    @elseif(isset($success))
    <div class="success_message">
        {{$success}}
    </div>
    <div id="form-title">Your order history:</div>
    <div id="customer_orders">
            <table>
                <tr>
                    <th>Order date</th>
                    <th>Onions</th>
                    <th>Mushrooms</th>
                    <th>Capsicum</th>
                </tr>
            @foreach($orders as $order)
                <tr>
                    <td>
                    {{$order->created_at}}
                    </td>
                    <td>
                        @if($order->onions)
                        <img alt="selected" src="{{ asset('images/selected.png') }}" />
                        @else
                        <img alt="selected" src="{{ asset('images/not_selected.png') }}" />
                        @endif
                    </td>
                    <td>
                        @if($order->mushrooms)
                        <img alt="selected" src="{{ asset('images/selected.png') }}" />
                        @else
                        <img alt="selected" src="{{ asset('images/not_selected.png') }}" />
                        @endif
                    </td>
                    <td>
                        @if($order->capsicum)
                        <img alt="selected" src="{{ asset('images/selected.png') }}" />
                        @else
                        <img alt="selected" src="{{ asset('images/not_selected.png') }}" />
                        @endif
                    </td>
                </tr>
            @endforeach
            </table>
    </div>
    @else
    <div id="form">
        <div id="form-title">Select your toppings:</div>
        {{ Form::open(array('url' => 'order')) }}
        <div class="input">
        {{ Form::label('topping_onion', 'Onion') }}
        {{ Form::select('topping_onion', array('1' => 'Add Topping', '0' => 'Don\'t add topping'), '1') }}
        </div>
        <div class="input">
        {{ Form::label('topping_mushroom', 'Mushroom') }}
        {{ Form::select('topping_mushroom', array('1' => 'Add Topping', '0' => 'Don\'t add topping'), '1') }}
        </div>
        <div class="input">
        {{ Form::label('topping_capsicum', 'Capsicum') }}
        {{ Form::select('topping_capsicum', array('1' => 'Add Topping', '0' => 'Don\'t add topping'), '1') }}
        </div>
        <br/>
        <div class="input">
        {{ Form::submit('Order Now!') }}
        </div>
        {{ Form::close() }}
    </div>
    @endif
</div>
@stop