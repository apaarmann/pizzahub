<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>PizzaHub</title>

<meta name="keywords" content="PizzaHub" />

<meta name="description" content="PizzaHub" />

<link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />

@yield('scripts')

</head>
<body>
<div id="container">
    <div id="header_section">
    </div>

    @yield('menu')

    <div id="header_pizza">
    </div>

    <div id="content">

    @yield('content')

    </div>
    <div id="container_end">
    </div>

</div>
</div>
@yield('javascript')
</body>

</html>