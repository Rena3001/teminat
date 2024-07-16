
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('client.layout.includes.head')
    <title>Elektrod</title>
  </head>
<body>
    <x-front-header-component :settings="$settings"/>
    @yield('content')


    <x-front-footer-component />

    @include('client.layout.includes.foot')
    @stack('js')
  </body>
</html>
