<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $categories = Category::select('id','name')->paginate(PAGINATION_COUNT);
        return view('categories.viewcategory',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create([

            'name' => $request -> name,

            'details' => $request -> details,
           ]);
           return redirect() -> back()->with(['success' => 'offer added successfuly']);

           return 'saved successfuly';
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
    public function edit($category_id)
    {
        $category = Category::find($category_id);
        if(!$category)
        return redirect()->back();
        $category= Category::select('id','name','details')->find($category_id);
        return view('categories.update',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$category_id)
    {
        $category= Category::find($category_id);
        if(!$category)
        return redirect()->back();


        //update database
        $category-> update($request->all());
        return redirect()->back()->with(['sucess'=>'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        $category= Category::find($category_id);// another method Offer::where ('id','','$offer_id') -> first();
        if(!$category)
        return redirect() -> back() -> with(['error' => 'Not Found']);
        else
        $category -> delete();
        return redirect()->route('categories.delete',$category_id)-> with(['success' => 'Offer Deleted']);
    }
}
