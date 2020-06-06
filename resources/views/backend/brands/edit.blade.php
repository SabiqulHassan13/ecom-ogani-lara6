@extends('backend.master')


@section('content')

<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Brand</h6>
            </div>
            <div class="card-body"> 
                <div>
                    <h3 class="text-center mb-3">{{ Session::get('message') }}</h3>
                </div>               
                <form action="{{ url('admin/brands/'.$brand->id) }}" method="POST">
                    @csrf 
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Brand Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $brand->name }}">
                            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : "" }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Brand Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="description" rows="3">{{ $brand->description }}</textarea>
                            <span class="text-danger">{{ $errors->has('description') ? $errors->first('description') : "" }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Brand Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Publication Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="publication_status">
                                <option value="">Select Publication Status</option>
                                <option value="1" {{ $brand->publication_status == 1 ? "selected" : "" }}>Published</option>
                                <option value="0" {{ $brand->publication_status == 0 ? "selected" : "" }}>Unpublished</option>
                            </select>
                            <span class="text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : "" }}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary btn-block">Update Brand</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    
</div>

@endsection