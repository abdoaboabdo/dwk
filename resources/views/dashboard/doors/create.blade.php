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
                            <div class="input-group-btn " style="padding-bottom: 10px">
                                <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                            </div>
                            <div class="row ">
                                <div class="col-md-6 increment file" style="padding-top: 10px;">
                                    <div class="input-group control-group increment file" >
                                        <label for="">Image</label>
                                        <input type="file" id="" name="filename[]" class="form-control imgInp" accept="image/*">

                                        <div class="input-group-btn add" style="top: 13px;">
                                            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <img src="{{asset('images/blue_loading.gif')}}" class="load" alt="" width="150px" style="display: none;">
                                        <div class="showImage col-md-12" style="margin-top: 10px;">
                                            <button id="use" class="btn btn-primary" style="margin-top: 5px">Upload</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="clone hide">
                                    <div class="col-md-6">
                                        <div class="input-group control-group file" style="margin-top:10px">
                                            <label for="">Image</label>
                                            <input type="file" id="" name="filename[]" class="form-control imgInp" accept="image/*">

                                            <div class="input-group-btn" style="top: 13px;">
                                                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <img src="{{asset('images/blue_loading.gif')}}" class="load" alt="" width="150px" style="display: none;">
                                            <div class="showImage col-md-12" style="margin-top: 10px;">
                                                <button id="use" class="btn btn-primary" style="margin-top: 5px">Upload</button>
                                            </div>
                                        </div>
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

@section('cropImage')
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/croppie.js')}}"></script>
    <script src="{{asset('js/jquery.leanModal.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {// imgInp

            let body=$("body");

            function readURL(input,me) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        me.parent('.file').next().children('.showImage').children('#my-image').attr('src', e.target.result);
                        var resize = new Croppie(me.parent('.file').next().children('.showImage').children('#my-image')[0], {
                            viewport: { width: 400, height: 250 },
                            boundary: { width: 600, height: 300 },
                            showZoomer: true,
                            enableResize: false,
                            enableOrientation: false
                        });

                        me.parent('.file').next().children('.showImage').children('#use').fadeIn();
                        me.parent('.file').next().children('.showImage').children('#use').on('click', function(e) {
                            e.preventDefault();

                            resize.result('base64').then(function(dataImg) {
                                var data = [{ image: dataImg }, { name: 'myimgage.jpg' }];
                                if (dataImg != 'data:,') {

                                    console.log(dataImg);
                                    me.parent('.file').next().children('.showImage').children('.croppie-container').remove();
                                    me.parent('.file').next().children('.showImage').children('#use').remove();

                                    let meme=me;
                                    me.parent('.file').next().children('.load').fadeIn(function () {
                                        meme.parent('.file').next().children('.load').fadeOut(function () {
                                            me.parent('.file').next().children('.showImage').append(`<img src="${dataImg}" class="img-responsive img-thumbnail"><i class="glyphicon glyphicon-remove remove"></i><i class="glyphicon glyphicon-edit edit"></i>`);
                                            me.before(`<input type="hidden" name="filename[]" value="${dataImg}" class="form-control imgInp">`);
                                            me.siblings('.input-group-btn').remove();
                                            me.remove();
                                        });
                                    });
                                }
                                //<input type="file" name="filename[]" class="form-control imgInp">

                                // me.parent('.file').next().children('.load').fadeIn();
                                // me.parent('.file').next().children('.load').fadeOut('slow',function () {
                                //    // console.log('hi')
                                //     meme.parent('.file').next().children('.showImage').append(`<img src="${dataImg}" class="img-responsive img-thumbnail">`);
                                // },1000);


                                // me.before(`<input type="hidden" name="filename[]" value="${dataImg}" class="form-control imgInp">`);
                                //me.siblings('.input-group-btn').remove();

                                // use ajax to send data to php
                                //$('#result').attr('src', dataImg);
                            })
                        })
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            body.on("change",".imgInp",function(){
                if ($(this).parent('.file').next().children('.showImage').children('.croppie-container').length > 0){
                    $(this).parent('.file').next().children('.showImage').children('.croppie-container').remove();
                }
                if (! $(this).parent('.file').next().children('.showImage').children('#my-image').length > 0 ){

                    $(this).parent('.file').next().children('.showImage').append('<img id="my-image" src="#" />');
                }
                $(this).parent('.file').next().children('.load').fadeIn();
                let me=$(this);
                let myThis=this;
                me.parent('.file').next().children('.load').fadeIn(function () {
                    me.parent('.file').next().children('.load').fadeOut(function () {
                        readURL(myThis,me);
                    });
                });
                // setTimeout(function () {
                //     console.log(me.parent('.file').next().children('.load'));
                //     me.parent('.file').next().children('.load').fadeOut(function () {
                //         readURL(myThis,me);
                //     });
                //
                // },1000);

            });

            $(".btn-success").click(function(){
                var html = $(".clone").html();
                // $(".increment").next().after(html);
                $(".hide").before(html);
                // console.log($('.hide'))
            });

            body.on("click",".btn-danger",function(){
                $(this).parents(".control-group").parents('.col-md-6').remove();
                //$(this).parents(".control-group").remove();
            });
            body.on("click",".remove",function () {
                $(this).parents('.col-md-6').remove()
            });
            body.on("click",".edit",function () {
                $(this).parents('.col-md-6').children('.input-group').children('.imgInp').remove();
                $(this).parents('.col-md-6').children('.input-group').append(`
                <input type="file" id="" name="filename[]" class="form-control imgInp" accept="image/*">

                <div class="input-group-btn" style="top: 13px;">
                    <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                </div>
                `);
                $(this).parents('.showImage').empty().append(`<button id="use" class="btn btn-primary" style="margin-top: 5px">Upload</button>`);
                // $(this).parents('.col-md-6').children('.input-group').children('.imgInp').onclick();
            });
            // $(".imgInp").rules("add", {
            //     accept: "jpg|jpeg|png|ico|bmp"
            // });

        });
        // var target = document.getElementById("your-files");
        //
        // target.addEventListener("dragover", function(event) {
        //     event.preventDefault();
        // }, false);
        //
        // target.addEventListener("drop", function(event) {
        //
        //     // cancel default actions
        //     event.preventDefault();
        //
        //     var i = 0,
        //         files = event.dataTransfer.files,
        //         len = files.length;
        //
        //     for (; i < len; i++) {
        //         console.log("Filename: " + files[i].name);
        //         console.log("Type: " + files[i].type);
        //         console.log("Size: " + files[i].size + " bytes");
        //     }
        //
        // }, false);
    </script>
@endsection
