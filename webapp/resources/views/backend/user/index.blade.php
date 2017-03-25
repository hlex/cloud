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
        <a class="button small green"><i class="fa fa-plus"></i> Add</a>
        <a class="button small red"><i class="fa fa-trash"></i> Delete</a>
      </div>
      <div class="cloud-datatable">
        <table class="table table-bordered table-striped" id="dataTable1">
          <thead>
            <th>@include('includes.form.form-checkbox', ['id' => 'checkAll', 'name' => 'checkAll', 'label' => 'ID'])</th>
            <th>Username</th>
            <th>Role</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th width="270">Action</th>
          </thead>
          <tbody>
            @foreach($items as $index=> $item)
            <tr>
              <th>@include('includes.form.form-checkbox', ['id' => $item->id, 'name' => $item->id, 'label' => $item->id])</th>
              <td>{{ $item->username }}</td>
              <td class="text-center">
                <?php $roles = [];
                  foreach ($item->getRoles as $role) {
                    echo "<p>$role->role_name</p>";
                    array_push($roles, $role->role_name);
                  }
                  // echo implode(',', $roles);
                ?>
              </td>
              <td>{{ $item->firstname }}</td>
              <td>{{ $item->lastname }}</td>
              <td>{{ $item->email }}</td>
              <td>
                <div class="button-inline text-center">
                  <a href="{{ asset('backoffice/user/'.$item->id.'/edit') }}" class="button small blue"><i class="fa fa-edit"></i>Edit | แก้ไข</a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@stop

@section('script')
  <!-- import specific script -->
@stop
