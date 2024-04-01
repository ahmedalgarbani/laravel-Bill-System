<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Models\Product;
use App\Models\Section;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
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

        $all = Section::all();
        return view('sittings.section',compact('all'));
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
    public function store(SectionRequest $request)
    {
        $input = $request->all();
        $b_exists = Section::where('section_name','=',$input['section_name'])->exists();
        if($b_exists){
            toastr()->error('اسم القسم موجود مسبقا');

            return redirect('/sections');
        }

         Section::create([
            'section_name' => $request->section_name,
             'description'=>$request->description,
             'created_by'=>(Auth::user()->name),
        ]);

        toastr()->success('تمت الاضافه بنجاح');
        return redirect('/sections');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $section=Section::findOrFail($request->id);

        $section->update([
            'section_name'=>$request->section_name,
            'description'=>$request->description,
            'created_by'=>auth()->user()->name,
        ]);

        session()->flash('section_update');
        return redirect()->back();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $reques)
    {
        $section = Section::find($reques->id);

        $section->delete();


        session()->flash('delete_section');
        return redirect()->back();

    }

    public function get_pro($id){
        $product = Product::where("section_id", $id)->pluck("Product_name", "id");
        return json_encode($product);

    }
}
