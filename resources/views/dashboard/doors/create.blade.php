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
                                        <label for="door_type">نوع الباب</label>
                                        <select name="door_type" id="door_type" class="form-control form-control " style="padding: 0 12px">
                                            <option value="">اختر نوع الباب</option>
                                            <option value="خشب">باب خشب</option>
                                            <option value="المونيوم">باب المونيوم</option>
                                            <option value="حديد">باب حديد</option>
                                            <option value="ترابزيت">باب ترابزيت</option>
                                            <option value="استنالس">باب ترابزيت استنالس</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 wood" >
                                    <div class="form-group">
                                        <label for="inside_type">داخلي ¦ خارجي</label>
                                        <select name="inside_type" id="inside_type" class="form-control form-control " style="padding: 0 12px">
                                            <option value="">داخلي ¦ خارجي</option>
                                            <option value="0">داخلي</option>
                                            <option value="1">خارجي</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 wood" >
                                    <div class="form-group">
                                        <label for="Wood_type">نوع الخشب</label>
                                        <select name="Wood_type" id="Wood_type" class="form-control form-control " style="padding: 0 12px">
                                            <option value="">اختر نوع الخشب</option>
                                            @foreach ($woodTypes as $woodType)
                                                <option value="{{$woodType->id}}">{{$woodType->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 aluminum">
                                    <div class="form-group">
                                        <label for="aluminum_type">نوع الالمونيوم</label>
                                        <select name="aluminum_type" id="aluminum_type" class="form-control form-control " style="padding: 0 12px">
                                            <option value="">اختر نوع الالمونيوم</option>
                                            @foreach ($aluminum_types as $aluminum_type)
                                                <option value="{{$aluminum_type->id}}">{{$aluminum_type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 aluminum">
                                    <div class="form-group">
                                        <label for="thickness_type"> السماكة</label>
                                        <select name="thickness_type" id="thickness_type" class="form-control form-control " style="padding: 0 12px">
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
            $('#door_type').change(function (e) {
                if (e.target.value === 'خشب'){
                    $('.aluminum').fadeOut(function () {
                        $('.wood').fadeIn()
                    });

                }else if (e.target.value === 'المونيوم'){
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
