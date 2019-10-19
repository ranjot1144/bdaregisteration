@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

                <div class="bs-example">
                    <!--<a href="{{ route('employeelist') }}">Employee List</a>-->
                    <!--<button type="button" class="btn btn-primary" href="{{ route('companylist') }}">Company List</button>-->
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
