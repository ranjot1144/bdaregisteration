@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Update Employee
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <form method="post" action="{{ route('employeelist.update', $employee->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="first_name">First Name:</label>
              <input type="text" class="form-control" name="first_name" value="{{ $employee->first_name }}"/>
          </div>
          <div class="form-group">
              <label for="last_name">Last Name:</label>
              <input type="text" class="form-control" name="last_name" value="{{ $employee->last_name }}"/>
          </div>
          <div class="form-group">
              <label for="company">Company :</label>
              <input type="text" class="form-control" name="company" value="{{ $employee->company }}"/>
          </div>
          <div class="form-group">
              <label for="email">Email :</label>
              <input type="text" class="form-control" name="email" value="{{ $employee->email }}"/>
          </div>
          <div class="form-group">
              <label for="quantity">Phone :</label>
              <input type="text" class="form-control" name="phone" value="{{ $employee->phone }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection
