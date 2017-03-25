<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('includes.style.frontend.styles')
    @yield('css')
  </head>
  <body>
    <div id="public-path" class="hidden" data-path="{{ asset('') }}"></div>
    <section class="content">
      <div class="container container-fluid">
        @include('includes.header.frontend.simple')
        @yield('content')
        @include('includes.footer.frontend-simple')
      </div>
    </section>
    @include('includes.script.frontend.scripts')
    @yield('script')
  </body>
</html>
