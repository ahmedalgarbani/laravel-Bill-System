<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Section;
use http\Env\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    function __construct()
    {

        $this->middleware(['authStatus']);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::all();
        $products = Product::all();
        return view('sittings.product',compact(['sections','products']));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $b_exists = Product::where('product_name','=',$input['product_name'])->exists();
        if($b_exists){
            toastr()->error('اسم القسم موجود مسبقا');

            return redirect('/products');
        }
         Product::create([
            'product_name'=>$request->product_name,
            'description'=>$request->description,
            'section_id'=>$request->section_id,
        ]);
        toastr()->success('the product is inserted');

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $pro = Section::find($request->id);
        $product = Product::findOrFail($request->id);

        $product->update([
            'product_name'=>$request->product_name,
            'description'=>$request->description,
            'section_id'=>$pro->id,
        ]);

        return redirect('products');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->delete();
        return redirect('products');

    }
}
