
{{-- a --}}

@extends('layouts.app')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row m-2 mt-4">
      <div class="col-sm-6">
        <h1>Admin Account List</h1>
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
    <h3 class="card-title">Account Table</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table table-hover table-striped">
              @if(session('status'))
              <p class="alert alert-success">{{session('status')}}</p>
              @endif
              @if(session('success'))
              <p class="alert alert-success">{{session('success')}}</p>
              @endif
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th style="width: 40px"></th>
                  <th style="width: 40px"></th>

                </tr>
      </thead>
      
              <tbody>
          @foreach ($data as $admin)
                <tr>
                  <td>{{$admin->name}}</td>
                  <td>{{$admin->email}}</td>
                  <td><a role="button" class="btn btn-primary btn-sm" href="{{url('updatePage/'.$admin->user_id)}}" >Update</a></td>
                   <td><a role="button" class="btn btn-danger btn-sm" href="{{url('delete/'.$admin->user_id)}}" >Delete</a>
                  </td>
                </tr>
      @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer clearfix">
            <ul class="pagination m-0 float-right">
              <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item active"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
@endsection



