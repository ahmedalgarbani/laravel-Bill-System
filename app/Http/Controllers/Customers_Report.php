<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Section;
use http\Env\Response;
use Illuminate\Http\Request;

class Customers_Report extends Controller
{
    public function index(){
        $sections = Section::all();
        return view('reports.customer_report',compact('sections'));
    }

    public function search(Request $request){

            if($request->start_at == '' && $request->end_at == '' && $request->Section){

                $customer = Invoice::where('section_id',$request->Section)->get();
                $section = $request->Section;
                $sections = Section::all();
                return view('reports.customer_report',compact('customer','sections'));
            }else{
                $start_at = date($request->start_at);
                $end_at = date($request->end_at);
                $sections = Section::all();
                $customer = Invoice::whereBetween('invoice_Date',[$start_at,$end_at])->where('section_id',$request->Section)->get();
                return view('reports.customer_report',compact('customer','sections','start_at'));
            }



    }

}
