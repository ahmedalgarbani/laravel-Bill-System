<?php

namespace App\Http\Controllers;

use App\Models\Invoice_attachment;
use http\Env\Response;
use Illuminate\Http\Request;

class InvoiceAttachmentController extends Controller
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
        //
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
    public function show(Invoice_attachment $invoice_attachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice_attachment $invoice_attachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice_attachment $invoice_attachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $attat = Invoice_attachment::find($request->id_file);
        $attat->delete();

        return redirect()->back();

    }
}
