<!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>{{ config('app.name', 'Laravel') }}</title>
      @yield('css')
    </head>
    <body>
      <div id="public-path" class="hidden" data-path="{{ asset('') }}"></div>
      <div id="app"></div>
      @yield('script')
      <script type="text/javascript" src="{{ asset('assets/redux/dist/bundle.js') }}">
      </script>
    </body>
    </html>
