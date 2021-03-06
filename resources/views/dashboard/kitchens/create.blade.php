@extends('layouts.dashboard.app')
@section('css')
    <style>
        .wood,.aluminum{
            display: none;
        }
        .file .btn-success{
            display: none;
        }
        .file.increment .btn-danger{
            display: none;
        }
        file.increment .btn-success{
            display: none;
        }

    </style>
@endsection
@section('content')
{{--{{phpinfo()}}--}}
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
        <section class="content" style="position: relative">

            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary" style="overflow: hidden">
                        <div class="box-header with-border">
                            <h3 class="box-title">إضافة باب</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        @include('partials._errors')
{{--                        {{ini_get('post_max_size')}}--}}
                        <form role="form" action="{{route('dashboard.kitchens.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
{{--                            {{ csrf_field() }}--}}
{{--                            <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
{{--                            {{method_field('post')}}--}}
                            <input type="hidden" name="category_id" value="3">
                            <div class="box-body">
                                <div class="row " style="position: relative;">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="color" >اختر لون</label>
{{--                                            <input type="color" name="color" id="color" class="form-control">--}}
                                            <select name="color" id="color" class="form-control">
                                                <option value="">اختر لون</option>
                                                <option value="#FF7F50">coral</option>
                                                <option value="#FF6347">tomato</option>
                                                <option value="#FF4500">orangered</option>
                                                <option value="#FFD700">gold</option>
                                                <option value="#FFA500">orange</option>
                                                <option value="#FF8C00">darkorange</option>
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
                                <div class="row">
                                  <div class="col-md-4">
                                      <div class="input-group-btn " style="padding-bottom: 10px">
                                          <button class="btn btn-success " type="button" disabled><i class="glyphicon glyphicon-plus"></i> إضافة صورة </button>
                                      </div>
                                  </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-12 increment file" style="padding-top: 10px;">
                                        <div class="input-group control-group form-group increment file" >
                                            <label for="" class="control-label">صورة</label>
                                            <input type="file" id="" name="filename[]" class="form-control imgInp" accept="image/*">

                                            <div class="input-group-btn add" style="top: 13px;">
                                                <button class="btn btn-success " type="button" disabled><i class="glyphicon glyphicon-plus" ></i>Add</button>
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
                                        <div class="col-md-12">
                                            <div class="input-group control-group form-group file" style="margin-top:10px">
                                                <label for="" class="control-label"> صورة</label>
                                                <input type="file" id="" name="filename[]" class="form-control imgInp" accept="image/*">

                                                <div class="input-group-btn" style="top: 13px;">
                                                    <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> إلغاء</button>
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
                                <input type="submit" class="btn btn-primary" value="@lang('site.add')" disabled>
                            </div>
                        </form>

                    </div>

                </div>
            </div>

        </section>
    </div>
@endsection

@section('js')
    <script src="{{asset('js/croppie.js')}}"></script>
    <script src="{{asset('js/jquery.leanModal.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-validate3.js')}}"></script>

@endsection
@section('cropImage')

    <script type="text/javascript">
        $(document).ready(function() {// imgInp
            let validateObject={
                category_id:true,
                color:false,
                price:false,
                description:false,
                filename:false
            };
            $('input[type=submit]').click(function (e) {
               e.preventDefault();

                $('input[type=submit]').attr('disabled','disabled');
               $('.overlay').fadeIn();
                setTimeout(function(){

                    $('form').submit(); // if you want
                }, 1000);

            });
            function validation(){
                if(validateObject.filename && validateObject.color && validateObject.price && validateObject.description){
                    $('input[type=submit]').removeAttr('disabled');
                }else {
                    $('input[type=submit]').attr('disabled','disabled');
                }

            }

            let body=$("body");

            function readURL(input,me) {

                if (input.files && input.files[0]) {
                    if(input.files[0].size <= 2097152){
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            me.parent('.file').next().children('.showImage').children('#my-image').attr('src', e.target.result);
                            var resize = new Croppie(me.parent('.file').next().children('.showImage').children('#my-image')[0], {
                                viewport: { width: 600, height: 400 },
                                boundary: { width: 700, height: 450 },
                                showZoomer: true,
                                enableResize: false,
                                enableOrientation: false
                            });

                            me.parent('.file').next().children('.showImage').children('#use').fadeIn();
                            me.parent('.file').next().children('.showImage').children('#use').on('click', function(e) {
                                e.preventDefault();
                                $('.btn-success').removeAttr('disabled');
                                validateObject.filename=true;

                                resize.result({type: 'canvas', size: 'viewport', format: 'jpeg', quality: 1, circle: false }).then(function(dataImg) {
                                    var data = [{ image: dataImg }, { name: 'myimgage.jpg' }];
                                    if (dataImg != 'data:,') {
                                        console.log(dataImg);
                                        me.parent('.file').next().children('.showImage').children('.croppie-container').remove();
                                        me.parent('.file').next().children('.showImage').children('#use').remove();

                                        let meme=me;
                                        me.parent('.file').next().children('.load').fadeIn(function () {
                                            meme.parent('.file').next().children('.load').fadeOut(function () {
                                                me.parent('.file').next().children('.showImage').append(`<img src="${dataImg}" class="img-responsive img-thumbnail"><i class="glyphicon glyphicon-remove remove"></i><i class="glyphicon glyphicon-edit edit"></i>`);

                                                me.parents('.control-group').addClass('has-success');
                                                me.before(`<input type="hidden" name="filename[]" value="${dataImg}" class="form-control imgInp">`);
                                                me.siblings('.input-group-btn').remove();
                                                me.remove();
                                            });
                                        });
                                        validation();
                                    }
                                })
                            })
                        };
                        reader.readAsDataURL(input.files[0]);
                    }else {
                        console.log('image is very large');
                        new Noty({
                            type: 'error',
                            layout: 'topRight',
                            text: "حجم الصورة كبير جدا",
                            timeout: 2000,
                            killer: true
                        }).show();
                    }
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

            });

            $(".btn-success").click(function(){
                var html = $(".clone").html();
                // $(".increment").next().after(html);
                $(".hide").before(html);
                // console.log($('.hide'))
                $(this).attr('disabled','disabled');
                validateObject.filename=false;
                validation();


            });

            body.on("click",".btn-danger",function(){
                $(this).parents(".control-group").parents('.col-md-6').remove();
                $('.btn-success').removeAttr('disabled');
                validateObject.filename=true;
                validation();

                //$(this).parents(".control-group").remove();
            });
            body.on("click",".remove",function () {
                $(this).parents('.col-md-6').remove();
                validation();

            });
            body.on("click",".edit",function () {
                $('input[type=submit]').attr('disabled','disabled');
                $('.btn-success').attr('disabled','disabled');
                $(this).parents('.col-md-6').children('.control-group').removeClass('has-success');
                $(this).parents('.col-md-6').children('.input-group').children('.imgInp').remove();
                $(this).parents('.col-md-6').children('.input-group').append(`
                <input type="file" id="" name="filename[]" class="form-control imgInp" accept="image/*">

                <div class="input-group-btn" style="top: 13px;">
                    <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                    <button class="btn btn-success " type="button" disabled><i class="glyphicon glyphicon-plus" ></i>Add</button>
                </div>
                `);
                $(this).parents('.showImage').empty().append(`<button id="use" class="btn btn-primary" style="margin-top: 5px">Upload</button>`);
                validateObject.filename=false;
                validation();

                // $(this).parents('.col-md-6').children('.input-group').children('.imgInp').onclick();
            });


            bootstrapValidate(
                '#price',
                'required:fill out this field|numeric:please Fill this filed',
                function (isValid) {
                    if (isValid){
                        $('#price').parents('.form-group').addClass('has-success');
                        validateObject.price=true;
                    }else {
                        $('#price').parents('.form-group').removeClass('has-success');
                        validateObject.price=false;
                    }
                }
            );
            bootstrapValidate(
                '#description',
                'required:fill out this field|min:15:Enter at least 15 Characters',
                function (isValid) {
                    if (isValid){
                        validateObject.description=true;
                        $('#description').parents('.form-group').addClass('has-success');
                    }else {
                        validateObject.description=false;
                        $('#description').parents('.form-group').removeClass('has-success');
                    }
                }
            );

            $('#color').change(function (e) {
                //console.log('sss');
                // console.log(e.target.value);
                if (e.target.value === ''){
                    $('#color').parents('.form-group').removeClass('has-success').addClass('has-error');
                    validateObject.color=false;
                    validation();
                }else {
                    $('#color').parents('.form-group').removeClass('has-error').addClass('has-success');
                    validateObject.color=true;
                    validation();
                }
            });
            $('#price,#description').keyup(function () {
               // console.log(validateObject);
                validation();

            });
        });


    </script>
@endsection
