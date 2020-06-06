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
              <h6 class="m-0 font-weight-bold text-primary">DataTables for Category</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>                                            
                      <th>Id</th>
                      <th>Category Name</th>
                      <th>Category Description</th>
                      <th>Category Image</th>
                      <th>Publication Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>                                            
                      <th>Id</th>
                      <th>Category Name</th>
                      <th>Category Description</th>
                      <th>Category Image</th>
                      <th>Publication Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($categories as $category)
                    <tr>
                      <td>{{ $category->id }}</td>
                      <td>{{ $category->name }}</td>
                      <td>{{ $category->description }}</td>
                      <td>{{ $category->image }}</td>
                      <td>{{ $category->publication_status == 1 ? "Published" : "Unpublished" }}</td>
                      <td>
                        <a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('admin.categories.destroy', ['id' => $category->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm("Are you sure to delete?");"><i class="fas fa-trash"></i></a>
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