<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Impuzabumenyi @yield('title')</title>
<link rel="shortcut icon" type="image/png" href="{{{ asset('images/logo.png') }}}"> <!-- CHANGE THIS TITLE FOR EACH PAGE -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<!-- MAIN CSS -->

<!-- Add this to <head> -->
{{--  <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap/dist/css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.css"/> 
 --}}

<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="/linearicons/style.css" rel="stylesheet" type="text/css" />
<link href="/css/additional.css" rel="stylesheet" type="text/css">
<link href="/css/backToTop.css" rel="stylesheet" type="text/css">
<link href="/css/caption.css" rel="stylesheet" type="text/css">
@yield('stylesheets')
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
