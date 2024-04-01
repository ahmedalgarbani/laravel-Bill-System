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
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ المنتجات</span>
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
    <div class="row">


        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                    </div>
                </div>
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary  btn-block col-sm-6 col-md-3 mg-t-10 mg-md-t-0" data-bs-toggle="modal" data-bs-target="#exampleModal" data-toggle="modal">
                        اضافه منتج
                    </button>
                    <div class="table-responsive">


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">اضافه منتج جديد</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" method="POST" action="{{url('/product')}}">
                                            @csrf

                                            <div class="form-group">
                                                <input type="text" class="form-control" name="product_name" id="section_name" placeholder="اسم المنتج">
                                            </div>
                                            <div class="form-group">
                                                <textarea type="text" style="resize: none" class="form-control" name="description" id="description" placeholder="ملاحظات" class="form-control" placeholder="Textarea" rows="3" style="height: 97px;"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم</label>
                                                <select name="section_id" id="section_id" class="form-control" required>
                                                    <option value=""  selected disabled> --حدد القسم--</option>
                                                    @foreach ($sections as $section)
                                                        <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                                    @endforeach
                                                </select>                                            </div>

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
                                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 139.633px;" aria-label="Last name: activate to sort column ascending">اسم المنتج</th>
                                        <th class="wd-20p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 199.533px;" aria-label="Position: activate to sort column ascending">القسم </th>
                                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 139.633px;" aria-label="Start date: activate to sort column ascending">ملاحظات</th>
                                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 139.633px;" aria-label="Start date: activate to sort column ascending">العمليات</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i = 0; ?>
                                    @foreach($products as $product)
                                        <?php $i++; ?>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">{{$i}}</td>
                                            <td>{{$product->product_name}}</td>
                                            <td> {{$product->section->section_name}}</td>
                                            <td> {{$product->description}}</td>
                                            <td>
                                                <button class="btn btn-success btn-sm"
                                                        data-product_name="{{ $product->product_name }}"
                                                        data-pro_id="{{ $product->id }}"
                                                        data-description="{{ $product->description }}"
                                                        data-section_id="{{ $product->section->section_id }}"
                                                        data-section_name="{{ $product->section->section_name }}"
                                                         data-toggle="modal"
                                                        data-target="#edit_Product">تعديل</button>

                                                <button class="btn btn-danger btn-sm "
                                                        data-del="{{ $product->id }}"
                                                        data-product_name="{{ $product->product_name }}" data-toggle="modal"
                                                        data-target="#modaldemo9">حذف</button>
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
                            <h5 class="modal-title" id="exampleModalLabel">تعديل منتج</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action='{{route('product.edit')}}' method="post">
                            @method('PUT')
                            @csrf
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="title">اسم المنتج :</label>

                                    <input type="hidden" class="form-control" name="id" id="id" >

                                    <input type="text" class="form-control" name="product_name" id="product_name">
                                </div>


                                <div class="form-group">
                                    <label for="des">ملاحظات :</label>
                                    <textarea style="resize: none" name="description" cols="20" rows="5" id='description'
                                              class="form-control"></textarea>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="section_id">القسم :</label>
                                <select name="section" id="section" value=""  class="form-control" required>
                                    <option value="" id="section_name" selected></option>
                                @foreach ($sections as $section)
                                        <option>{{ $section->section_name }}</option>
                                    @endforeach
                                </select>
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
                        <form action="{{route('product.destroy')}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="modal-body">
                                <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                <input type="hidden" name="id" id="id" >
                                <input class="form-control" disabled="true" name="product_name" id="product_name" type="text" readonly>
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
        toastr.options.progressBar = true;
        @if ($errors->any())

        @foreach ($errors->all() as $error)
        toastr.error("{{ $error }}")
        @endforeach

        @endif
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


<script>
    //deltee
    $('#modaldemo9').on('show.bs.modal',function (event) {
        var button = $(event.relatedTarget)
        var pro_id = button.data('del')
        var product_name = button.data('product_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(pro_id)
        modal.find('.modal-body #product_name').val(product_name)

    })

    // update
    $('#edit_Product').on('show.bs.modal',function (event) {
        var button = $(event.relatedTarget)
        var pro_id = button.data('pro_id')
        var product_name = button.data('product_name')
        var description = button.data('description')
        var section_name = button.data('section_name')
        var section_id = button.data('section_id')
        var modal = $(this)
        modal.find('.modal-body #id').val(pro_id)
        modal.find('.modal-body #section_name').text(section_name)
        var selectElement = document.getElementById("section");
        var optionToChange = selectElement.options[0];

        optionToChange.text = section_name;
        modal.find('.modal-body #product_name').val(product_name)
        modal.find('.modal-body #section_id').val(section_id)
        modal.find('.modal-body #description').val(description)

    })

    var selectElement = document.getElementById("section");
    var optionToChange = selectElement.options[0];

    optionToChange.text = "";


</script>
    <script>



        $(document).ready(function () {
            $('#dataTable').DataTable();
            $('#dataTableHover').DataTable();
        });
    </script>
@endsection
