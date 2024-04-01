<?php

namespace App\Http\Controllers;

use App\Models\Invoices_detail;
use Illuminate\Http\Request;

class InvoicesDetailController extends Controller
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
    public function show(Invoices_detail $invoices_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoices_detail $invoices_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoices_detail $invoices_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoices_detail $invoices_detail)
    {
        //
    }
}
