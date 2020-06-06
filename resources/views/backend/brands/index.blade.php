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
              <h6 class="m-0 font-weight-bold text-primary">DataTables for Brand</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>                                            
                      <th>Id</th>
                      <th>Brand Name</th>
                      <th>Brand Description</th>
                      <th>Brand Image</th>
                      <th>Publication Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>                                            
                      <th>Id</th>
                      <th>Brand Name</th>
                      <th>Brand Description</th>
                      <th>Brand Image</th>
                      <th>Publication Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($brands as $brand)
                    <tr>
                      <td>{{ $brand->id }}</td>
                      <td>{{ $brand->name }}</td>
                      <td>{{ $brand->description }}</td>
                      <td>{{ $brand->image }}</td>
                      <td>{{ $brand->publication_status == 1 ? "Published" : "Unpublished" }}</td>
                      <td>
                        <a href="{{ route('admin.brands.edit', ['id' => $brand->id]) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('admin.brands.destroy', ['id' => $brand->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm("Are you sure to delete?");"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>                   
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
    
</div>

@endsection