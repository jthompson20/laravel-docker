<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'FreshTrak: Focus') }}</title>

<link rel="manifest" href="/manifest.json">

<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="msapplication-starturl" content="/">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="theme-color" content="#28ce85">

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/freshtrak.css') }}" rel="stylesheet">

<!-- any custom head scripts that need ran -->
{!! App\Services\Assets::display('headscript') !!}

<!-- any custom stylesheets that need applied -->
{!! App\Services\Assets::display('css') !!}

<!-- custom css (not scripts) -->
@stack('css')