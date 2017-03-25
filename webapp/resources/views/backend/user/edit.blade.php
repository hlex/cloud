@extends('layouts.backend')

@section('css')
  <!-- import specific css -->
@stop

@section('content')
  <!-- put your contents here -->
  <div class="cloud-container">
    <div class="cloud-content">
      <div class="heading">
        <div class="title"><i class="fa fa-user"></i> User Management</div>
      </div>
      <div class="button-inline">
        <a href="{{ asset('backoffice/user') }}" class="button small red"><i class="fa fa-arrow-left"></i> Back</a>
      </div>
      <form class="cloud-form">
        <div class="title"><i class="fa fa-edit"></i> Edit User</div>
        <div class="row">
          <div class="D-6">
            @include('includes.form.form-text-input', ['value' => $item->username, 'id' => 'username', 'name' => 'username', 'label' => 'Username'])
          </div>
        </div>
        <div class="row">
          <div class="D-6">
            @include('includes.form.form-text-input', ['value' => $item->firstname, 'id' => 'firstname', 'name' => 'firstname', 'label' => 'Firstname'])
          </div>
          <div class="D-6">
            @include('includes.form.form-text-input', ['value' => $item->lastname, 'id' => 'lastname', 'name' => 'lastname', 'label' => 'Lastname'])
          </div>
        </div>
        <div class="row">
          <div class="D-6">
            @include('includes.form.form-select-multiple', ['id' => 'roles', 'name' => 'roles', 'label' => 'Roles', 'options' => $roles])
          </div>
        </div>
        <div class="row">
          <div class="D-6">
            @include('includes.form.form-text-input', ['value' => $item->email, 'id' => 'email', 'name' => 'email', 'label' => 'Email'])
          </div>
        </div>
        <div class="row">
          <div class="D-6">
            <div class="row">
              <div class="D-offset-3 D-9">
                <button type="submit" class="button small green"><i class="fa fa-save"></i> Save</button>
              </div>
            </div>
          </div>
        </div>
      <form>
    </div>
  </div>
@stop

@section('script')
  <!-- import specific script -->
  <script type="text/javascript">
    $('select').select2();
  </script>
@stop
