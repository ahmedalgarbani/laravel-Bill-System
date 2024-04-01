<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use http\Env\Response;
use Illuminate\Http\Request;

class Invoices_Report extends Controller
{
    public function index(){
        return view('reports.invoice_report');
    }

    public function search(Request $request){


        if($request->rdio == 1){
            if($request->start_at == '' && $request->end_at == '' && $request->type){
                $invoice = Invoice::where('Status',$request->type)->get();
                $type = $request->type;

                return view('reports.invoice_report',compact('invoice','type'));
            }else{
                $start_at = date($request->start_at);
                $end_at = date($request->end_at);
                $type = $request->type;
                $invoice = Invoice::whereBetween('invoice_Date',[$start_at,$end_at])->where('Status',$request->type)->get();
                return view('reports.invoice_report',compact('invoice','type','start_at'));
            }

        }else{
            $type = $request->type;

            $invoice = Invoice::where('invoice_number',$request->invoice_number)->get();

            return view('reports.invoice_report',compact('invoice'));
        }

    }

}
