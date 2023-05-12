<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    @include('layouts.head')

</head>

<body>
<div class="wrapper">

    @include('layouts.navbar')
    @include('layouts.sidebar')

    @yield('content')
</div>


@include('layouts.footer')
</body>
</html>
