@extends('layouts.app')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row m-2 mt-4">
      <div class="col-sm-6">
        <h1>Introduce User List</h1>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 p-4">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Users Table</h3>
            @if(session('success'))
            <p class="alert alert-success">{{session('success')}}</p>
            @endif
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  {{-- <th style="width: 10px">#</th> --}}
                  <th>Connect Person Name</th>
                  <th>Email</th>
                  <th>Operator Type</th>
                  <th>Phone No:</th>
                  <th>Number of People</th>
                  <th style="width: 40px"></th>
                </tr>
              </thead>
      
              <tbody>
                @foreach($data as $result)
                          <tr>
                            {{-- <td></td> --}}
                            <td>{{$result->user_name}}</td>
                            <td>{{$result->email}}</td>
                            <td>{{$result->operator_type}}</td>
                            <td>{{$result->phone_number}}</td>
                            <td>{{$result->count_number}}</td>
                            <td><a role="button" class="btn btn-danger btn-sm" href="{{ route('BillPayController#payperson', $result->login_id) }}">View</a></td>
                          </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer clearfix">
            <ul class="pagination m-0 float-right">
              <li class="page-item">{{ $data->links() }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
@endsection



