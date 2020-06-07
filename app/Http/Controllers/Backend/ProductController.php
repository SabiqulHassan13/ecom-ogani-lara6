<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $categories = Category::where('publication_status', 1)->get();
        // $brands = Brand::where('publication_status', 1)->get();
        // $products = Product::all();
        $products = DB::table('products')
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->join('brands', 'products.brand_id', '=', 'brands.id')
                    ->select('products.*', 'categories.name as category_name', 'brands.name as brand_name')
                    ->get();
        // return response()->json($products);

        return view('backend.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::where('publication_status', 1)->get();
        $brands = Brand::where('publication_status', 1)->get();

        return view("backend.products.create", ['categories' => $categories, 'brands' => $brands]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return $request->all();
        $this->validate($request, [
            'name'              =>  'required',
            'category_id'       =>  'required',
            'brand_id'          =>  'required',
            'short_description' =>  'required',
            'price'             =>  'required',
            'quantity'          =>  'required',
            'image'             =>  'nullable',
        ]);

        $productImage = $request->file('image');
        $productImageName = time() . "." . $productImage->getClientOriginalExtension();
        $uploadPath = 'uploads/productImage/';
        $productImage->move($uploadPath, $productImageName);
        $productImageNameUrl = $uploadPath . $productImageName;

        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->image = $productImageNameUrl;
        $product->publication_status = $request->publication_status;
        $product->save();

        return redirect('/admin/products')->with('message', 'Product added sucessfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = DB::table('products')
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->join('brands', 'products.brand_id', '=', 'brands.id')
                    ->select('products.*', 'categories.name as category_name', 'brands.name as brand_name')
                    ->where('products.id', $id)
                    ->first();
        // return response()->json($product);

        return view('backend.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories = Category::where('publication_status', 1)->get();
        $brands = Brand::where('publication_status', 1)->get();
        $product = DB::table('products')
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->join('brands', 'products.brand_id', '=', 'brands.id')
                    ->select('products.*', 'categories.name as category_name', 'brands.name as brand_name')
                    ->where('products.id', $id)
                    ->first();
        // return response()->json($product);

        return view('backend.products.edit', ['product' => $product, 'categories' => $categories, 'brands'  => $brands]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name'              =>  'required',
            'category_id'       =>  'required',
            'brand_id'          =>  'required',
            'short_description' =>  'required',
            'price'             =>  'required',
            'quantity'          =>  'required',
            'image'             =>  'nullable',
        ]);

        $product = Product::where('id', $id)->first();

        $productImage = $request->file('image');
        if ($productImage) {
            unlink($product->image);

            $productImageName = time() . "." . $productImage->getClientOriginalExtension();
            $uploadPath = 'uploads/productImage/';
            $productImage->move($uploadPath, $productImageName);
            $productImageNameUrl = $uploadPath . $productImageName;
        }
        else {
            $productImageNameUrl = $product->image;
        }
            
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->image = $productImageNameUrl;
        $product->publication_status = $request->publication_status;
        $product->save();

        return redirect('/admin/products')->with('message', 'Product updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
