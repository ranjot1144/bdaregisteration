@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  <div class="card-header">
    List Company
      <a href="{{ route('companylist.create') }}" class="btn btn-primary">Create Company</a>
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
          <td>Name</td>
          <td>Email</td>
          <td>Logo</td>
          <td>Website</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($lists as $list)
        <tr>
            <td>{{$list->id}}</td>
            <td>{{$list->name}}</td>
            <td>{{$list->email}}</td>
            <td><a href="../storage/app/{{$list->logo}}">Click Here</a></td>
            <td>{{$list->website}}</td>
            <td>{{$list->phone}}</td>
            <td><a href="{{ route('companylist.edit', $list->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('companylist.destroy', $list->id)}}" method="post">
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
