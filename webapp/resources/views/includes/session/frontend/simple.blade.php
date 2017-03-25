@if (session('success'))
  <div class="session-box-message">
    <div class="content content-success">
      <h3>Awesome !</h3>
      <p>{{ "- ".session('success') }}</p>
    </div>
  </div>
@endif
@if (count($errors) > 0)
  <div class="session-box-message">
    <div class="container">
      <div class="content content-error">
        <h3>You have missed some field !</h3>
        @foreach ($errors->all() as $error)
          <p>{{ "- ".$error }}</p>
        @endforeach
      </div>
    </div>
  </div>
@endif
