
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('client.layout.includes.head')
    <title>Elektrod</title>
  </head>
<body>
    <x-front-header-component :settings="$settings"/>
    @yield('content')

    @include('client.layout.includes.foot')

    <x-front-footer-component />

  </body>
</html>
