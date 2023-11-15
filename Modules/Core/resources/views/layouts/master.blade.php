<!doctype html>
<html class="no-js" lang="en">

<head>

    @include('core::layouts.head')

</head>

<body>
    @include('core::layouts.header')

    @yield('content')

    @include('core::layouts.scripts')

    
</body>

</html>