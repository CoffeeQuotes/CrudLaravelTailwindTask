<!doctype html>
  <head>
    @include('includes.head')
  </head>
  <body class="bg-gray-200">
      @include('includes.navbar')
      <div class="container mx-auto px-4">
            <div id="main" class="row">
                @yield('content')
            </div>
      </div>
  </body>
  </html>
