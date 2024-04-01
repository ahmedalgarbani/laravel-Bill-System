<?php

use App\Http\Controllers\Customers_Report;
use App\Http\Controllers\InvoiceArchiveController;
use App\Http\Controllers\InvoiceAttachmentController;
use App\Http\Controllers\Invoices_Report;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\UserController;
use App\Models\Invoice_attachment;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


    Route::get('/index', [\App\Http\Controllers\AdminController::class,'index'])->middleware(\App\Http\Middleware\AuthStatus::class);

//-------------reports --------------//
Route::get('/customers_report',[Customers_Report::class,'index'])->name('customers_report');
Route::post('/Search_customers',[Customers_Report::class,'search'])->name('customers_search');
Route::get('/invoices_report',[Invoices_Report::class,'index'])->name('invoices_report');
Route::post('/Search_invoices',[Invoices_Report::class,'search'])->name('Search_invoices');
//-------------reports --------------//


//------------------ sections route ------------------------//
Route::get('/sections', [SectionController::class,'index'])->name('section.index');
Route::get('/section/{id}', [SectionController::class,'get_pro'])->name('section.getproduct');
Route::post('/section', [SectionController::class,'store'])->name('section.store');
Route::delete('/section', [SectionController::class,'destroy'])->name('section.destroy');
Route::put('/section', [SectionController::class,'edit'])->name('section.edit');
//------------------ sections route ------------------------//
//------------------ product route ------------------------//
Route::get('/products', [ProductController::class,'index'])->name('product.index');
Route::post('/product', [ProductController::class,'store'])->name('product.store');
Route::delete('/product', [ProductController::class,'destroy'])->name('product.destroy');
Route::put('/product', [ProductController::class,'edit'])->name('product.edit');
//------------------ sections route ------------------------//


//------------------ invoice route ------------------------//

Route::get('/invoices_archive', [InvoiceArchiveController::class,'index']);
Route::get('/invoices_paid', [InvoiceController::class,'invoices_paid']);
Route::get('/invoices_unpaid', [InvoiceController::class,'invoices_unpaid']);
Route::get('/invoices_partialpaid', [InvoiceController::class,'invoices_partialpaid']);

Route::get('/invoices', [InvoiceController::class,'index'])->name('invoice.index');
Route::get('/invoices/create', [InvoiceController::class,'create'])->name('invoices.create');
Route::DELETE('/invoice', [InvoiceController::class,'destroy'])->name('invoices.destroy');
Route::post('/invoice_resote', [InvoiceArchiveController::class,'restore'])->name('invoicesA.restore');
Route::DELETE('/invoice_destroy', [InvoiceArchiveController::class,'destroy'])->name('invoicesA.destroy');
Route::post('/invoice', [InvoiceController::class,'store'])->name('invoices.store');
Route::get('/invoiceDetailes/{id}', [InvoiceController::class,'Details'])->name('invoiceDetailes');
Route::post('/invoice/edit', [InvoiceController::class,'edit'])->name('invoice.edit');
Route::post('/invoice/update', [InvoiceController::class,'update'])->name('invoice.update');
Route::get('/invoices/show/{id}', [InvoiceController::class,'show'])->name('invoice.show');
Route::post('/invoices', [InvoiceController::class,'change_state'])->name('invoice.change_state');
Route::post('invoiceDetailesAttachment',[InvoiceAttachmentController::class,'destroy'])->name('invoiceDetailesAttachment.destroy');


Route::get('print_invoice/{id}',[InvoiceController::class,'show_printPage'])->name('show_printPage');


//------------------ invoice route ------------------------//

//----------perrmision ----------------//
Route::middleware('auth')->group(function () {

    // Our resource routes
    Route::resource('roles', RoleController::class);
    Route::put('role', [RoleController::class,'update'])->name('role.update');
    Route::resource('users', UserController::class);
    Route::put('user', [UserController::class,'update'])->name('user.update');
    Route::resource('products', ProductController::class);
});
//----------perrmision ----------------//


Route::get('/View_file/{invoice_number}/{file_name}', [\App\Http\Controllers\InvoiceController::class,'open_file']);
Route::get('/download/{invoice_number}/{file_name}', [\App\Http\Controllers\InvoiceController::class,'download_file']);




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

















require __DIR__.'/auth.php';
