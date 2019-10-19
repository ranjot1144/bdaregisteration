@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  <div class="card-header">
    List Employee
      <a href="{{ route('employeelist.create')}}" class="btn btn-primary">Create Employee</a>
  </div>
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>First Name</td>
          <td>Last Name</td>
          <td>Company</td>
          <td>Email</td>
          <td>Phone</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($lists as $list)
        <tr>
            <td>{{$list->id}}</td>
            <td>{{$list->first_name}}</td>
            <td>{{$list->last_name}}</td>
            <td>{{$list->company}}</td>
            <td>{{$list->email}}</td>
            <td>{{$list->phone}}</td>
            <td><a href="{{ route('employeelist.edit', $list->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('employeelist.destroy', $list->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection
