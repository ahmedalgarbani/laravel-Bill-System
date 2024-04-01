@extends('layouts.master')
@section('title')
الاقسام
@stop
@section('css')
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الاقسام</span>
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
    <!-- row -->

    @if (session()->has('delete_section'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم حذف القسم بنجاح",
                    type: "success"
                })
            }

        </script>
    @endif


    @if (session()->has('section_update'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم تحديث القسم بنجاح",
                    type: "success"
                })
            }

        </script>
    @endif







    <div class="row">




        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                    </div>
                </div>
                <div class="card-body">
                    <!-- Button trigger modal -->
                    @can('اضافة قسم')
                    <button type="button" class="btn ripple btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" data-toggle="modal">
                        اضافه قسم
                    </button>
                    @endcan
                    <div class="table-responsive">


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">اضافه قسم جديد</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" method="POST" action="{{url('/section')}}">
                                            @csrf

                                            <div class="form-group">
                                                <input type="text" class="form-control" name="section_name" id="section_name" placeholder="اسم القسم">
                                            </div>
                                            <div class="form-group">
                                                <textarea type="text" style="resize: none" class="form-control" name="description" id="description" placeholder="وصف القسم" class="form-control" placeholder="Textarea" rows="3" style="height: 97px;"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" disabled="true" value="{{Auth::user()->name}}" class="form-control" name="created_by" id="created_by" placeholder="العمليات">
                                            </div>

                                            <div class="form-group mb-0 mt-3 justify-content-end">

                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
                                        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row"><div class="col-sm-12"><table class="table text-md-nowrap dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="wd-15p border-bottom-0 sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 139.633px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">#</th>
                                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 139.633px;" aria-label="Last name: activate to sort column ascending">اسم القسم</th>
                                        <th class="wd-20p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 199.533px;" aria-label="Position: activate to sort column ascending">الملاحظات </th>
                                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 139.633px;" aria-label="Start date: activate to sort column ascending">الموظف</th>
                                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 139.633px;" aria-label="Start date: activate to sort column ascending">العمليات</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i = 0; ?>
                                    @foreach($all as $x)
                                        <?php $i++; ?>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">{{$i}}</td>
                                            <td>{{$x->section_name}}</td>
                                            <td> {{$x->description}}</td>
                                            <td> {{$x->created_by}}</td>
                                            <td>
                                                @can('تعديل قسم')
                                                <button class="btn btn-outline-success btn-sm"
                                                        data-section_name="{{ $x->section_name }}"
                                                        data-sec_id="{{ $x->id }}"
                                                        data-description="{{ $x->description }}"
                                                         data-toggle="modal"
                                                        data-target="#edit_Product">تعديل</button>
                                                @endcan
                                                @can('حذف قسم')
                                                <button class="btn btn-outline-danger btn-sm "
                                                        data-del="{{ $x->id }}"
                                                        data-section_name="{{ $x->section_name }}" data-toggle="modal"
                                                        data-target="#modaldemo9">حذف</button>
                                                    @endcan
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


            <!-- edit -->
            <div class="modal fade" id="edit_Product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">تعديل القسم</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action='{{route('section.edit')}}' method="post">
                            @method('PUT')
                            @csrf
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="title">اسم القسم :</label>

                                    <input type="hidden" class="form-control" name="id" id="id" >

                                    <input type="text" class="form-control" name="section_name" id="section_name">
                                </div>


                                <div class="form-group">
                                    <label for="des">ملاحظات :</label>
                                    <textarea style="resize: none" name="description" cols="20" rows="5" id='description'
                                              class="form-control"></textarea>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="title">الموظف :</label>

                                <input type="text" class="form-control" disabled="true" name="created_by" id="created_by" value="{{auth()->user()->name}}">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">تعديل البيانات</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- delete -->
            <div class="modal fade" id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">حذف القسم</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('section.destroy')}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="modal-body">
                                <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                <input type="hidden" name="id" id="id" >
                                <input class="form-control" disabled="true" name="section_name" id="section_name" type="text" readonly>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                <button type="submit" class="btn btn-danger">تاكيد</button>
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
    <script>

    </script>
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!-- Internal Modal js-->
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>

    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>

<script>
    //deltee
    $('#modaldemo9').on('show.bs.modal',function (event) {
        var button = $(event.relatedTarget)
        var sec_id = button.data('del')
        var section_name = button.data('section_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(sec_id)
        modal.find('.modal-body #section_name').val(section_name)

    })

    // update
    $('#edit_Product').on('show.bs.modal',function (event) {
        var button = $(event.relatedTarget)
        var sec_id = button.data('sec_id')
        var section_name = button.data('section_name')
        var description = button.data('description')
        var modal = $(this)
        modal.find('.modal-body #id').val(sec_id)
        modal.find('.modal-body #section_name').val(section_name)
        modal.find('.modal-body #description').val(description)

    })



</script>

@endsection
