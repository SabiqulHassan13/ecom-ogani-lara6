@extends('backend.master')



@section('content')

<!-- dd("helo"); -->
<div class="row">

    <!-- Content Column -->
    <!-- card element start -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Customers (user)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count(App\User::all()) }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- card element end -->
    <!-- card element start -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Published Products</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count(App\Product::all()) }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- card element end -->
    <!-- card element start -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Published Categories</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count(App\Category::all()) }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- card element end -->
    <!-- card element start -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Published Brands</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count(App\Brand::all()) }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- card element end -->    



</div>

@endsection