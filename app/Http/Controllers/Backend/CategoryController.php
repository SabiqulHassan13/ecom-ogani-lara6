<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd("category list");
        $categories = Category::all();

        return view("backend.categories.index", [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("backend.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $this->validate($request, [
            'name'                  =>  'required|unique:categories|max:255',
            'description'           =>  'required',
            'publication_status'    =>  'required',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $request->image;
        $category->publication_status = $request->publication_status;
        $category->save();

        // return redirect()->back()->with('message', 'Category added successfully');
        return redirect("/admin/categories")->with('message', 'Category added sucessfully');


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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return $id;
        // $category = Category::find($id);
        $category = Category::where('id', $id)->first();

        return view("backend.categories.edit", [
            'category' => $category,
        ]);

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
        // dd($request->all());
        // $request->all();
        $this->validate($request, [
            'name'                  =>  'required',
            'description'           =>  'required',
            'publication_status'    =>  'required',
        ]);

        $category = Category::where('id', $id)->first();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $request->image;
        $category->publication_status = $request->publication_status;
        $category->save();

        // return redirect()->back()->with('message', 'Category updated successfully');
        return redirect("/admin/categories")->with('message', 'Category updated sucessfully');

        
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
        $category = Category::where('id', $id)->first();
        $category->delete();

        return redirect("/admin/categories")->with('message', 'Category deleted sucessfully');
    }
}
