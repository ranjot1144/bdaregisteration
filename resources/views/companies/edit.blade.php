@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Update Company
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
    <form method="post" action="{{ route('companylist.update', $company->id) }}" accept-charset="utf-8" enctype="multipart/form-data">
      <input type="hidden" name="company_id" value="{{ $company->id }}" />
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" value="{{ $company->name }}"/>
          </div>
          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email" value="{{ $company->email }}"/>
          </div>
          <div class="form-group">
              <label for="logo">logo :</label>
              <input type="file" class="form-control" name="logo"/>
              <input type="hidden" name="uploaded_file" value="{{ $company->logo }}" />
          </div>
          <div class="form-group">
              <label for="website">Website :</label>
              <input type="text" class="form-control" name="website" value="{{ $company->website }}" />
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection
