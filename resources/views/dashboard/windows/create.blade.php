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
                                        <label for="window_type">نوع النافذة</label>
                                        <select name="window_type" id="window_type" class="form-control form-control " style="padding: 0 12px">
                                            <option value="">اختر نوع النافذة</option>
                                            <option value="سحاب">نافذة سحاب</option>
                                            <option value="مفصلي">نافذة مفصلي</option>
                                            <option value="ثابتة">نافذة ثابتة</option>
                                            <option value="قلاب">نافذة قلاب</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
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
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label for="thickness_type"> اللون</label>
                                        <select name="thickness_type" id="thickness_type" class="form-control form-control " style="padding: 0 12px">
                                            <option value="">اختر اللون</option>
                                            <option value="#00f">احمر</option>
                                            <option value="#fff">ابيض</option>
                                            <option value="#ccc">رصاصي</option>
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
@endsection
