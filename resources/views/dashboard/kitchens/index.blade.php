@extends('layouts.dashboard.app')
@section('css')
    <style>
        tbody td {

            vertical-align: middle!important;
        }
    </style>
@stop
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.dashboard')
            </h1>
            <ol class="breadcrumb">
                <li class="active breadcrumb-item"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</li>
            </ol>

        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">الأبواب</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="door-table" class="table table-bordered table-striped table-hover table-active">
                                <thead>
                                <tr>
                                    <th>الكود</th>
                                    <th>الصورة</th>
                                    <th>السعر</th>
                                    <th>التحكم</th>
{{--                                    <th>CSS grade</th>--}}
                                </tr>
                                </thead>

{{--                                <tfoot>--}}
{{--                                <tr>--}}
{{--                                    <th>Rendering engine</th>--}}
{{--                                    <th>Browser</th>--}}
{{--                                    <th>Platform(s)</th>--}}
{{--                                    <th>Engine version</th>--}}
{{--                                    <th>CSS grade</th>--}}
{{--                                </tr>--}}
{{--                                </tfoot>--}}
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script !src="">
        $(function () {
            function myDatatable(category_id = ''){
                $('#door-table').DataTable({
                    processing:true,
                    serverSide:true,
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
                    },
                    ajax:{
                        url:"{{route('dashboard.kitchens.index')}}",
                        data:{category_id:category_id}
                    },
                    columns:[
                        {
                            data:'id',
                            name:'id',
                            render:function (data,type,row,meta) {
                                // console.log(meta.row);
                                // console.log(row);
                                return 'K_'+data ;
                            }
                        },
                        {
                            data:'images',
                            name:'images',
                            render:function (data,type,row,meta) {
                                // console.log(meta.row);
                                // console.log(data[0].image_path);
                                return '<img src="'+data[0].image_path+'"  class="img-responsive img-thumbnail" style="height: 100px">' ;
                            },
                            orderable:false
                        },
                        {
                            data:'price',
                            name:'price',
                            render:function (data,type,row,meta) {
                                // console.log(meta.row);
                                //console.log(row.price);
                                return '$' + data  ;
                            }
                        },

                        {
                            data:'action',
                            name:'action',
                            orderable:false,
                            "searchable": false
                        }

                    ]
                    // columnDefs: [
                    //     {
                    //         render: function (data, type, full, meta) {
                    //             return 'D_'+data ;
                    //
                    //         },
                    //         targets: 0
                    //     }
                    // ]
                });
            }
            $('#category_id').change(function (e) {
                console.log(e.target.value);
                $('#door-table').DataTable().destroy();
                myDatatable(e.target.value);
            });
            myDatatable();
            {{--$('#door-table').DataTable({--}}
            {{--    processing:true,--}}
            {{--    serverSide:true,--}}
            {{--    ajax:{--}}
            {{--        url:"{{route('dashboard.doors.index')}}"--}}
            {{--    },--}}
            {{--    columns:[--}}
            {{--        {--}}
            {{--            data:'id',--}}
            {{--            name:'id',--}}
            {{--            render:function (data,type,row,meta) {--}}
            {{--                // console.log(meta.row);--}}
            {{--                // console.log(row);--}}
            {{--                return 'D_'+data ;--}}
            {{--            }--}}
            {{--        },--}}
            {{--        {--}}
            {{--            data:'images',--}}
            {{--            name:'images',--}}
            {{--            render:function (data,type,row,meta) {--}}
            {{--                // console.log(meta.row);--}}
            {{--                // console.log(data[0].image_path);--}}
            {{--                return '<img src="'+data[0].image_path+'"  class="img-responsive img-thumbnail" style="height: 100px">' ;--}}
            {{--            },--}}
            {{--            orderable:false--}}
            {{--        },--}}
            {{--        {--}}
            {{--            data:'price',--}}
            {{--            name:'price',--}}
            {{--            render:function (data,type,row,meta) {--}}
            {{--                // console.log(meta.row);--}}
            {{--                //console.log(row.price);--}}
            {{--                return '$' + data  ;--}}
            {{--            }--}}
            {{--        },--}}
            {{--        {--}}
            {{--            data:'category.name',--}}
            {{--            name:'category.name',--}}
            {{--            // render:function (data,type,row,meta) {--}}
            {{--            //     // console.log(meta.row);--}}
            {{--            //     //console.log(row.price);--}}
            {{--            //     return row.category.name  ;--}}
            {{--            // },--}}
            {{--            orderable:false--}}
            {{--        },--}}
            {{--        {--}}
            {{--            data:'action',--}}
            {{--            name:'action',--}}
            {{--            orderable:false,--}}
            {{--            "searchable": false--}}
            {{--        }--}}

            {{--    ]--}}
            {{--    // columnDefs: [--}}
            {{--    //     {--}}
            {{--    //         render: function (data, type, full, meta) {--}}
            {{--    //             return 'D_'+data ;--}}
            {{--    //--}}
            {{--    //         },--}}
            {{--    //         targets: 0--}}
            {{--    //     }--}}
            {{--    // ]--}}
            {{--});--}}
        })
    </script>
@endsection
