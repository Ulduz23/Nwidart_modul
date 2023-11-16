<!doctype html>
<html lang="en">

<head>
    
    @include('core::layouts.head')

</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    @include('core::layouts.sidebar')
    <div class="body-wrapper">
        @include('core::layouts.header')

        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
  </div>
    @include('core::layouts.scripts')

    
</body>

</html>