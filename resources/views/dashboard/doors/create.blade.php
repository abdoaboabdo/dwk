@extends('layouts.dashboard.app')
@section('css')
    <style>
        .wood,.aluminum{
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.doors')
            </h1>
            <ol class="breadcrumb">
                <li class=" breadcrumb-item"><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li class=" breadcrumb-item"><a href="{{route('dashboard.doors.index')}}">@lang('site.doors')</a></li>
                <li class="active breadcrumb-item">@lang('site.add')</li>
            </ol>
        </section>
        <section class="content" >
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary" style="overflow: hidden">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('site.add')</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    @include('partials._errors')
                    <form role="form" action="{{route('dashboard.doors.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{method_field('post')}}
                        <div class="box-body">
                            <div class="row " style="position: relative;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="category_id">نوع الباب</label>
                                        <select name="category_id" id="category_id" class="form-control form-control " style="padding: 0 12px">
                                            <option value="">اختر نوع الباب</option>
                                            @foreach($doorCategory->children as $child)
                                                <option value="{{$child->id}}">{{$child->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 wood" >
                                    <div class="form-group">
                                        <label for="wood_type_id">نوع الخشب</label>
                                        <select name="wood_type_id" id="wood_type_id" class="form-control form-control " style="padding: 0 12px">
                                            <option value="">اختر نوع الخشب</option>
                                            @foreach ($woodTypes as $woodType)
                                                <option value="{{$woodType->id}}">{{$woodType->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 aluminum">
                                    <div class="form-group">
                                        <label for="aluminum_type_id">نوع الالمونيوم</label>
                                        <select name="aluminum_type_id" id="aluminum_type_id" class="form-control form-control " style="padding: 0 12px">
                                            <option value="">اختر نوع الالمونيوم</option>
                                            @foreach ($aluminum_types as $aluminum_type)
                                                <option value="{{$aluminum_type->id}}">{{$aluminum_type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 aluminum">
                                    <div class="form-group">
                                        <label for="thickness"> السماكة</label>
                                        <select name="thickness" id="thickness" class="form-control form-control " style="padding: 0 12px">
                                            <option value="">اختر السماكة</option>
                                            <option value="1.3">1.3</option>
                                            <option value="1.5">1.5</option>
                                            <option value="1.8">1.8</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                               <div class="col-md-4">
                                   <div class="form-group">
                                       <label for="price">السعر</label>
                                       <input type="text" name="price" id="price" class="form-control " placeholder="ادخل السعر">
                                   </div>
                               </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="image">@lang('site.image')</label>
                                        <input type="file" name="image" class="form-control image" id="image"  >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="description">الوصف</label>
{{--                                        <input type="text" name="description" id="description" class="form-control " placeholder="ادخل السعر">--}}
                                        <textarea name="description" id="description" class="form-control " cols="30" rows="10" placeholder="ادخل الوصف"></textarea>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="@lang('site.add')">
                        </div>
                    </form>

                </div>

            </div>

        </section>
    </div>
@endsection
@section('js')
    <script !src="">
        $(document).ready(function () {
            $('#category_id').change(function (e) {
                // console.log(e.target.value);
                if (e.target.value == 4){
                    $('.aluminum').fadeOut(function () {
                        $('.wood').fadeIn()
                    });

                }else if (e.target.value == 5){
                    $('.wood').fadeOut(function () {
                        $('.aluminum').fadeIn()
                    });

                }else {
                    $('.wood ,.aluminum').fadeOut()
                }
            })
        });
    </script>
@endsection
