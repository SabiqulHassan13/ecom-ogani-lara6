@extends('backend.master')


@section('content')

<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
            </div>
            <div class="card-body"> 
                <div>
                    <h3 class="text-center mb-3">{{ Session::get('message') }}</h3>
                </div>               
                <form action="{{ route('admin.products.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Product Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : "" }}</span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="col-form-label">Category Name</label>
                            <div class="">
                                <select class="form-control" name="category_id">
                                    <option value="">Select Product Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->has('category_id') ? $errors->first('category_id') : "" }}</span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label">Brand Name</label>
                            <div class="">
                                <select class="form-control" name="brand_id">
                                    <option value="">Select Product Brand</option>
                                    @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? "selected" : "" }}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->has('brand_id') ? $errors->first('brand_id') : "" }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="col-form-label">Product Price</label>
                            <div class="">
                                <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                                <span class="text-danger">{{ $errors->has('price') ? $errors->first('price') : "" }}</span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label">Product Quantity</label>
                            <div class="">
                                <input type="text" class="form-control" name="quantity" value="{{ $product->quantity }}">
                                <span class="text-danger">{{ $errors->has('quantity') ? $errors->first('quantity') : "" }}</span>
                            </div>
                        </div>
                    </div>                  
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Product Short Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="short_description" rows="5">{{ $product->short_description }}</textarea>
                            <span class="text-danger">{{ $errors->has('short_description') ? $errors->first('short_description') : "" }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Product Long Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="long_description" rows="10">{{ $product->long_description }}</textarea>
                            <span class="text-danger">{{ $errors->has('long_description') ? $errors->first('long_description') : "" }}</span>
                        </div>
                    </div>                    

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Product Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" name="image">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="150" height="150">
                            <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : "" }}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Publication Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="publication_status">
                                <option value="">Select Publication Status</option>
                                <option value="1" {{ $product->publication_status == 1 ? "selected" : "" }}>Published</option>
                                <option value="0" {{ $product->publication_status == 0 ? "selected" : "" }}>Unpublished</option>
                            </select>
                            <span class="text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : "" }}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary btn-block">Update Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    
</div>

@endsection