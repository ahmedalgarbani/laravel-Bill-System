<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class InvoiceArchiveController extends Controller
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
        $invoices = Invoice::onlyTrashed()->get();
        return view('invoices.Archive_invoices',compact('invoices'));

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Invoice::withTrashed()->where('id',$request->invoice_id)->forceDelete();
        session()->flash('archive_delete');
        return redirect()->back();

    }


    public function restore(Request $request){
        Invoice::withTrashed()->where('id',$request->invoice_id)->restore();
        session()->flash('restore_archive');
        return redirect()->back();

    }







}
