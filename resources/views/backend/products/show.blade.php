@extends('backend.master')


@section('content')

<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables for Single Product</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                  <thead>
                    <tr>                                            
                      <th>Id</th>
                      <td>{{ $product->id }}</td>
                    </tr>
                    <tr>                                            
                      <th>Product Name</th>
                      <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                      <th>Category Name</th>
                      <td>{{ $product->category_name }}</td>
                    </tr>
                    <tr>                                            
                      <th>Brand Name</th>
                      <td>{{ $product->brand_name }}</td>
                    </tr>
                    <tr>                                            
                      <th>Product Image</th>
                      <td><img src="{{ asset($product->image) }}" alt="{{ $product->name }}"></td>
                    </tr>
                    <tr>
                      <th>Price (BDT)</th>
                      <td>{{ $product->price }}</td>
                    </tr>
                    <tr>                                            
                      <th>Quantity</th>
                      <td>{{ $product->quantity }}</td>
                    </tr>
                    <tr>                                            
                      <th>Product Short Description</th>
                      <td>{!! $product->short_description !!}</td>
                      <!-- <textarea>{{ $product->short_description }}</textarea> -->
                    </tr>
                    <tr>                                            
                      <th>Product Long Description</th>
                      <td>{!! $product->long_description !!}</td>
                    </tr>
                    <tr>                                            
                      <th>Publication Status</th>
                      <td>{{ $product->publication_status == 1 ? "Published" : "Unpublished" }}</td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    
</div>

@endsection