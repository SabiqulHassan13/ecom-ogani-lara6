@extends('backend.master')


@section('content')

<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
    <div>
        <h3 class="text-center mb-3">{{ Session::get('message') }}</h3>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables for Users | {{ $users->count() }} of {{ $users->total() }} users in this page</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>                                            
                      <th>Id</th>
                      <th>User Name</th>
                      <th>User Email</th>
                      <th>Email Verified At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>                                            
                      <th>Id</th>
                      <th>User Name</th>
                      <th>User Email</th>
                      <th>Email Verified At</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->email_verified_at }}</td>
                      <td>
                        <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn btn-warning btn-sm">
                            <span><i class="fas fa-edit"></i></span>
                        </a>
                        <a href="{{ route('admin.users.destroy', ['id' => $user->id]) }}" class="btn btn-danger btn-sm">
                            <span><i class="fas fa-trash"></i></span>
                        </a>
                      </td>
                    </tr>                   
                    @endforeach
                  </tbody>
                </table>
              </div>

              <!-- Pagination apply -->
              <div class="text-center">
                {{ $users->links() }}
              </div>
            </div>
          </div>
    
</div>

@endsection