<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Invoice_attachment;
use App\Models\Invoices_detail;
use App\Models\Section;
use App\Models\User;
use App\Notifications\InvoiceAdd;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use Symfony\Component\HttpFoundation\StreamedResponse;

class InvoiceController extends Controller
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
        $invoices = Invoice::all();
            return view('invoices.invoice',compact('invoices'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = Section::all();
        return view('invoices.add_invoice',compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        Invoice::create([
            'invoice_number' => $request->invoice_number,
            'invoice_Date' => $request->invoice_Date,
            'Due_date' => $request->Due_date,
            'product' => $request->product,
            'section_id' => $request->Section,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'Discount' => $request->Discount,
            'Value_VAT' => $request->Value_VAT,
            'Rate_VAT' => $request->Rate_VAT,
            'Total' => $request->Total,
            'Status' => 'غير مدفوعة',
            'Value_Status' => 2,
            'note' => $request->note,
        ]);

        $id = Invoice::latest()->first()->id;
        Invoices_detail::create([
            'id_Invoice'=>$id,
            'invoice_number'=>$request->invoice_number,
            'product'=>$request->product,
            'Section'=>$request->Section,
            'Payment_Date'=>$request->Due_date,
            'Status'=>'غير مدفوعة',
            'Value_Status'=>2,
            'note'=>$request->note,
            'user'=>auth()->user()->name,
        ]);


        if ($request->hasFile('pic')) {

            $invoice_id = Invoice::latest()->first()->id;
            $image = $request->file('pic');
            $file_name = $image->getClientOriginalName();
            $invoice_number = $request->invoice_number;


            $attachments = new Invoice_attachment();
            $attachments->file_name = $file_name;
            $attachments->invoice_number = $invoice_number;
            $attachments->Created_by = auth()->user()->name;
            $attachments->invoice_id = $invoice_id;
            $attachments->save();

            // move pic
            $imageName = $request->pic->getClientOriginalName();
            $request->pic->move(public_path('Attachments/' . $invoice_number), $imageName);
        }


        $invoice_id = Invoice::latest()->first()->id;

//        $user = User::first();
//        Notification::send($user,new InvoiceAdd($invoice_id));


        session()->flash('edit', 'تم تعديل الفاتورة بنجاح');





        return redirect('/invoices');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $invoices = Invoice::findOrFail($id);
        $sections = Section::get();

        return view('invoices.change_state',compact('invoices','sections'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $invoice)
    {
        $invoices = Invoice::where('id',$invoice->invoice_id)->first();
        $sections = Section::all();
        return view('invoices.edit_invoice',compact('invoices','sections'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $invoice = Invoice::where('id',$request->invoice_id)->first();

        $invoice->update([
            'invoice_number' => $request->invoice_number,
            'invoice_Date' => $request->invoice_Date,
            'Due_date' => $request->Due_date,
            'product' => $request->product,
            'section_id' => $request->Section,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'Discount' => $request->Discount,
            'Value_VAT' => $request->Value_VAT,
            'Rate_VAT' => $request->Rate_VAT,
            'Total' => $request->Total,
            'note' => $request->note,
        ]);


        return redirect('/invoices');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $invoice = Invoice::where('id',$request->invoice_id)->first();
        if($request->page_id == 1){
            $attat = Invoice_attachment::where('invoice_id',$request->invoice_id)->first();

            if (!empty($Details->invoice_number)) {

                Storage::disk('public_uploads')->deleteDirectory($Details->invoice_number);
            }

            $invoice->forceDelete();
            session()->flash('delete_invoice');
            return redirect()->back();
        }elseif($request->page_id == 2){
            $invoice->Delete();
            session()->flash('archive_invoice');
            return redirect()->back();

        }







}




    public function Details($id){

        $invoices = Invoice::where('id',$id)->first();
        $details = Invoices_detail::where('id_Invoice',$id)->get();
        $attachments = Invoice_attachment::where('invoice_id',$id)->get();



        return view('invoices.invoiceDetailes',compact('invoices','details','attachments'));
    }


    public function open_file($invoice_number, $file_name) {
        $filePath = $invoice_number . '/' . $file_name;

        // Check if the file exists
        $exi = Storage::disk('public_uploads')->exists($filePath);
        if ($exi) {
            $fullPath = storage_path('public_uploads/' . $filePath);
            return response()->file($fullPath);
//            Log::info('Full Path: ' . $fullPath);

            return response()->file($fullPath);
        } else {
            // Log the file not found error
            \Log::error('File not found: ' . $filePath);

            return response()->json(['error' => 'File not found'], 404);
        }
    }



    public function change_state(Request $request){

       $invoice = Invoice::findOrFail($request->invoice_id);

//       return $request->invoice_id;

       if($request->Status == 'مدفوعة'){
           $invoice->update([
               'Value_Status' => 1,
               'Status' => $request->Status,
               'Payment_Date' => $request->Payment_Date,
           ]);

           Invoices_detail::create([
               'id_Invoice' => $request->invoice_id,
               'invoice_number' => $request->invoice_number,
               'product' => $request->product,
               'Section' => $request->Section,
               'Status' => $request->Status,
               'Value_Status' => 1,
               'note' => $request->note,
               'Payment_Date' => $request->Payment_Date,
               'user' => (Auth::user()->name),
           ]);




       }else{
           $invoice->update([
               'Value_Status' => 3,
               'Status' => $request->Status,
               'Payment_Date' => $request->Payment_Date,
           ]);

           Invoices_detail::create([
               'id_Invoice' => $request->invoice_id,
               'invoice_number' => $request->invoice_number,
               'product' => $request->product,
               'Section' => $request->Section,
               'Status' => $request->Status,
               'Value_Status' => 1,
               'note' => $request->note,
               'Payment_Date' => $request->Payment_Date,
               'user' => (Auth::user()->name),
           ]);

       }



       return redirect('/invoices');


    }


    public function download_file($invoice_number, $file_name) {
        $file_path = $invoice_number.'/'.$file_name;

        $stream = Storage::disk('public_uploads')->readStream($file_path);

        return new StreamedResponse(function () use ($stream) {
            fpassthru($stream);
            if (is_resource($stream)) {
                fclose($stream);
            }
        }, 200, [
            'Content-Type' => Storage::disk('public_uploads')->mimeType($file_path),
            'Content-Disposition' => 'attachment; filename="' . $file_name . '"',
        ]);
    }


    public function invoices_paid(){
        $invoices  = Invoice::where('Value_Status',1)->get();
        return view('invoices.invoices_paid',compact('invoices'));

    }

    public function invoices_unpaid(){
        $invoices  = Invoice::where('Value_Status',2)->get();
        return view('invoices.invoices_unpaid',compact('invoices'));
    }

    public function invoices_partialpaid(){
        $invoices  = Invoice::where('Value_Status',3)->get();
        return view('invoices.invoices_partialpaid',compact('invoices'));
    }



    public function show_printPage($id){

        $invoice = Invoice::find($id);
        return view('invoices.print_invoice',compact('invoice'));
    }


}
