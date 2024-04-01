@extends('layouts.master')
@section('title')
الفواتير
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ كل الفواتير</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
            </div>
            <div class="mb-3 mb-xl-0">
                <div class="btn-group dropdown">
                    <button type="button" class="btn btn-primary">14 Aug 2019</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
                        <a class="dropdown-item" href="#">2015</a>
                        <a class="dropdown-item" href="#">2016</a>
                        <a class="dropdown-item" href="#">2017</a>
                        <a class="dropdown-item" href="#">2018</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if (session()->has('delete_invoice'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم حذف الفاتورة بنجاح",
                    type: "success"
                })
            }

        </script>
    @endif


    @if (session()->has('Status_Update'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم تحديث حالة الدفع بنجاح",
                    type: "success"
                })
            }

        </script>
    @endif

    @if (session()->has('restore_invoice'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم استعادة الفاتورة بنجاح",
                    type: "success"
                })
            }

        </script>
    @endif
    @if (session()->has('archive_invoice'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم ارشفه الفاتورة بنجاح",
                    type: "success"
                })
            }

        </script>
    @endif




    <!-- row -->
    <div class="row">

                    <div class="col-xl-12">
            <div class="card">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Button trigger modal -->
                            <a href="invoices/create" class="btn btn-primary  btn-block col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
                                اضافه فاتوره
                            </a>
                            <div class="table-responsive">

                            <div class="card-body">
                    <div class="table-responsive">

                            <div class="row"><div class="col-sm-12"><table class="table text-md-nowrap dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="wd-15p border-bottom-0 sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 139.633px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">#</th>
                                            <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 139.633px;" aria-label="Last name: activate to sort column ascending">رقم القاتورة</th>
                                            <th class="wd-20p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 199.533px;" aria-label="Position: activate to sort column ascending">تاريخ الفاتورة</th>
                                            <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 139.633px;" aria-label="Start date: activate to sort column ascending">تاريح الاستحقاق</th>
                                            <th class="wd-10p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 79.75px;" aria-label="Salary: activate to sort column ascending">المنتج</th>
                                            <th class="wd-25p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 259.417px;" aria-label="E-mail: activate to sort column ascending">القسم</th>
                                            <th class="wd-15p border-bottom-0 sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 139.633px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">الخصم</th>
                                            <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 139.633px;" aria-label="Last name: activate to sort column ascending">نسبة الضريبة</th>
                                            <th class="wd-20p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 199.533px;" aria-label="Position: activate to sort column ascending">قيمة الضريبة</th>
                                            <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 139.633px;" aria-label="Start date: activate to sort column ascending">الاجمالي</th>
                                            <th class="wd-10p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 79.75px;" aria-label="Salary: activate to sort column ascending">الحاله</th>
                                            <th class="wd-25p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 259.417px;" aria-label="E-mail: activate to sort column ascending">الملاحظة</th>
                                            <th class="wd-25p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 259.417px;" aria-label="E-mail: activate to sort column ascending">العمليات</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=0; ?>
                                        @foreach($invoices as $invoice)
                                       <tr role="row" class="even">
                                           <?php $i++ ?>
                                            <td class="sorting_1">{{$i}}</td>
                                            <td>{{$invoice->invoice_number}} </td>
                                            <td>{{$invoice->invoice_Date}}</td>
                                            <td>{{$invoice->Due_date}}</td>
                                            <td>{{$invoice->product}}</td>
                                            <td><a href="/invoiceDetailes/{{$invoice->id}}">{{$invoice->section->section_name}}</a></td>
                                           <td>{{$invoice->Discount}}</td>
                                            <td> {{$invoice->Rate_VAT}}</td>
                                            <td>{{$invoice->Value_VAT}}</td>
                                            <td>{{$invoice->Total}}</td>
                                            <td>

                                               @if($invoice->Value_Status == 1 )
                                                   <span class="text-success">{{$invoice->Status}}</span>
                                                @elseif($invoice->Value_Status == 2 )
                                                    <span class="text-danger">{{$invoice->Status}}</span>
                                                @elseif($invoice->Value_Status ==3 )
                                                    <span class="text-warning">{{$invoice->Status}}</span>
                                                @else
                                                    <span class="text-dark">{{$invoice->Status}}</span>
                                                @endif
                                            </td>
                                           <td>{{$invoice->note}}</td>
                                               <td>
                                                   <div class="dropdown">
                                                       <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                                               data-toggle="dropdown" id="dropdownMenuButton" type="button">العمليات <i class="fas fa-caret-down ml-1"></i>
                                                       </button>
                                                       <div  class="dropdown-menu tx-13">
                                                           <a class="dropdown-item" href="#">
                                                               تعديل
                                                               <form action="{{url('invoice/edit')}}"
                                                                     method="POST">
                                                                   @csrf
                                                                   @method('POST')
                                                                   <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
                                                                   <button type="submit" class="btn btn-outline-success btn-sm "
                                                                   >تعديل</button>
                                                               </form>
                                                           </a>
                                                           <a class="dropdown-item" href="#">
                                                               حذف
                                                               <button class="btn btn-outline-danger btn-sm "
                                                                       data-invoice_id="{{ $invoice->id }}"
                                                                       data-section_name="{{ $invoice->section->section_name }}"
                                                                       data-toggle="modal"
                                                                       data-target="#modaldemo9">حذف</button>
                                                           </a>
                                                           <a class="dropdown-item" href="{{url('invoices/show',['id'=>$invoice->id])}}">
                                                               تغير الحاله
                                                               <button class="btn btn-outline-danger btn-sm "
                                                                      >تغيير الحاله</button>
                                                           </a>
                                                           <a class="dropdown-item" href="#">
                                                               ارشفه
                                                               <button class="btn btn-outline-warning btn-sm "
                                                                       data-invoice_id="{{ $invoice->id }}"
                                                                       data-section_name="{{ $invoice->section->section_name }}"
                                                                       data-toggle="modal"
                                                                       data-target="#modaldemo10">ارشفه</button>
                                                           </a>
                                                           <a class="dropdown-item" href="{{url('/print_invoice/'.$invoice->id)}}">
                                                               ارشفه
                                                               <button class="btn btn-outline-primary btn-sm "
                                                                     >طباعه</button>
                                                           </a>
                                                       </div>
                                                   </div>





                                               </td>
                                        </tr>

                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                            <!-- delete -->
                            <div class="modal fade" id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">حذف المرفق</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('invoices.destroy','error')}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <div class="modal-body">
                                                <p class="text-center">
                                                <h6 style="color:red"> هل انت متاكد من عملية حذف المرفق ؟</h6>
                                                </p>

                                                <input type="hidden" name="invoice_id" id="invoice_id" value="">
                                                <input type="hidden" name="page_id" id="page_id" value="1">


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                                                <button type="submit" class="btn btn-danger">تاكيد</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>






                            <!-- edit -->
                            <div class="modal fade" id="modaldemo10" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">ارشفه المرفق</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('invoices.destroy','error')}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <div class="modal-body">
                                                <p class="text-center">
                                                <h6 style="color:green"> هل انت متاكد من عملية ارشفه المرفق ؟</h6>
                                                </p>

                                                <input type="hidden" name="invoice_id" id="invoice_id" value="">
                                                <input type="hidden" name="page_id" id="page_id" value="2">


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                                                <button type="submit" class="btn btn-success">تاكيد</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
                    @section('js')
                        <!-- Internal Data tables -->
                            <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
                            <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
                            <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
                            <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
                            <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
                            <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
                            <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
                            <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
                            <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
                            <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
                            <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
                            <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
                            <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
                            <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
                            <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
                            <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
                            <!--Internal  Datatable js -->
                            <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
                            <!--Internal  Notify js -->
                            <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
                            <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>


                                <script>
                                    $('#modaldemo9').on('show.bs.modal', function(event) {
                                    var button = $(event.relatedTarget)
                                    var invoice_id = button.data('invoice_id')
                                    var modal = $(this)
                                    modal.find('.modal-body #invoice_id').val(invoice_id);
                                })
                                    $('#modaldemo10').on('show.bs.modal', function(event) {
                                    var button = $(event.relatedTarget)
                                    var invoice_id = button.data('invoice_id')
                                    var modal = $(this)
                                    modal.find('.modal-body #invoice_id').val(invoice_id);
                                })

                            </script>


                            </script>

@endsection
