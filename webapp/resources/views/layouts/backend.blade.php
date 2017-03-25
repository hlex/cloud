<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('includes.style.backend.styles')
    @yield('css')
  </head>
  <body class="backoffice">
    <div id="public-path" class="hidden" data-path="{{ asset('') }}"></div>
    @include('includes.header.backend.simple')
    <section class="content">
      <div class="container container-fluid">
        @include('includes.session.backend.simple')
        @yield('content')
      </div>
      <div class="push"></div>
    </section>
    @include('includes.footer.backend.simple')

    <div class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <div class="widget-modal">
              <div class="text-center">
                <h2>Do you confirm to delete ?</h2>
              </div>
            </div>
          </div>
          <div class="modal-footer">
           <div class="row">
              <div class="text-center">
                <button type="button" class="button red">Confirm</button>
                <button type="button" class="button black" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    @include('includes.script.backend.scripts')
    @yield('script')
  </body>
</html>
