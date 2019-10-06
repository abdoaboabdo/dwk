@extends('layouts.dashboard.app')
@section('css')
    <style>
        .wood,.aluminum{
            display: none;
        }
        .file .btn-success,.file .btn-danger{
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
    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.kitchens')
            </h1>
            <ol class="breadcrumb">
                <li class=" breadcrumb-item"><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li class=" breadcrumb-item"><a href="{{route('dashboard.kitchens.index')}}">@lang('site.kitchens')</a></li>
                <li class="active breadcrumb-item">@lang('site.add')</li>
            </ol>
        </section>
        <section class="content" >

            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary" style="overflow: hidden">
                        <div class="box-header with-border">
                            <h3 class="box-title">@lang('site.add')</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        @include('partials._errors')
                        <form role="form" action="{{route('dashboard.kitchens.update',$kitchen->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{method_field('put')}}
                            <input type="hidden" name="category_id" value="3">
                            <div class="box-body">
                                <div class="row " style="position: relative;">
                                    <div class="col-md-4">
                                        <div class="form-group has-success">
                                            <label for="color" >اختر لون</label>
                                            {{--                                            <input type="color" name="color" id="color" class="form-control">--}}
                                            <select name="color" id="color" class="form-control">
                                                <option value="">اختر لون</option>
                                                <option value="#FF7F50" {{ $kitchen->color == '#FF7F50' ? 'selected' : '' }}>coral</option>
                                                <option value="#FF6347" {{ $kitchen->color == '#FF6347' ? 'selected' : '' }}>tomato</option>
                                                <option value="#FF4500"{{ $kitchen->color == '#FF4500' ? 'selected' : '' }}>orangered</option>
                                                <option value="#FFD700" {{ $kitchen->color == '#FFD700' ? 'selected' : '' }}>gold</option>
                                                <option value="#FFA500" {{ $kitchen->color == '#FFA500' ? 'selected' : '' }}>orange</option>
                                                <option value="#FF8C00" {{ $kitchen->color == '#FF8C00' ? 'selected' : '' }}>darkorange</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group has-success">
                                            <label for="price">السعر</label>
                                            <input type="text" name="price" id="price" value="{{$kitchen->price}}" class="form-control " placeholder="ادخل السعر">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class="form-group has-success">
                                            <label for="description">الوصف</label>
                                            {{--                                        <input type="text" name="description" id="description" class="form-control " placeholder="ادخل السعر">--}}
                                            <textarea name="description" id="description" class="form-control "  cols="30" rows="10" placeholder="ادخل الوصف">{{$kitchen->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group-btn " style="padding-bottom: 10px">
                                            <button class="btn btn-success " type="button" ><i class="glyphicon glyphicon-plus"></i>Add</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">

                                    @foreach ($kitchen->images as $key=>$image)
                                        <div class="col-md-12 myImage {{$key === 0 ? 'increment': ''}} file" style="padding-top: 10px;">
                                            <div class="input-group control-group form-group {{$key === 0 ? 'increment': ''}}  file has-success">
                                                <label for="" class="control-label">Image</label>
                                                <input type="hidden" name="filename[]" value="" class="form-control imgInp">


                                            </div>
                                            <div class="row">
                                                <img src="{{asset('images/blue_loading.gif')}}" class="load" alt="" width="150px" style="display: none;">
                                                <div class="showImage col-md-12" style="margin-top: 10px;">

                                                    <img src="{{$image->image_path}}" class="img-responsive img-thumbnail"><i class="glyphicon glyphicon-remove remove" data-id="{{$image->id}}"></i><i class="glyphicon glyphicon-edit edit" data-id="{{$image->id}}"></i></div>
                                            </div>
                                        </div>
                                        @if (($key+1) % 2 === 0)
                                            <div class="clearfix"></div>
                                        @endif
                                    @endforeach
                                    <div class="clone hide">
                                        <div class="col-md-12 myImage">
                                            <div class="input-group control-group form-group file" style="margin-top:10px">
                                                <label for="" class="control-label"> Image</label>
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
                                <input type="submit" class="btn btn-primary" value="@lang('site.add')"  >
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
            let kitchen_id = '{{$kitchen->id}}';
            let validateObject={
                color:true,
                price:true,
                description:true,
                filename:true
            };

            function validation(){
                if(validateObject.filename && validateObject.color && validateObject.price && validateObject.description){
                    $('input[type=submit]').removeAttr('disabled');
                }else {
                    $('input[type=submit]').attr('disabled','disabled');
                }

            }





            $('input[type=submit]').click(function (e) {
                e.preventDefault();

                $('input[type=submit]').attr('disabled','disabled');
                $('.overlay').fadeIn();
                setTimeout(function(){

                    $('form').submit(); // if you want
                }, 1000);

            });
            let body=$("body");

            function readURL(input,me,id='') {

                if (input.files && input.files[0]) {
                    if(input.files[0].size <= 2621440){
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
                                $('.overlay').fadeIn();
                                validateObject.filename=true;
                                resize.result({type: 'canvas', size: 'viewport', format: 'jpeg', quality: 1, circle: false }).then(function(dataImg) {
                                    var data = [{ image: dataImg }, { name: 'myimgage.jpg' }];
                                    if (dataImg != 'data:,') {
                                        // console.log(dataImg);
                                        console.log(id);
                                        me.parent('.file').next().children('.showImage').children('.croppie-container').remove();
                                        me.parent('.file').next().children('.showImage').children('#use').remove();
                                        let meme=me;
                                        me.parent('.file').next().children('.load').fadeIn(function () {
                                            meme.parent('.file').next().children('.load').fadeOut(function () {
                                                if(id !== ''){
                                                    let url= "{{url('dashboard/editImage')}}/"+id;
                                                    let data = {'_token':$('meta[name=csrf-token]').attr('content'),id,dataImg};
                                                    $.ajax({
                                                        url:url,
                                                        method:'post',
                                                        data:data,
                                                        success:function(res){
                                                            console.log(res);
                                                            me.parent('.file').next().children('.showImage').append(`<img src="${dataImg}" class="img-responsive img-thumbnail"><i data-id="${id}" class="glyphicon glyphicon-remove remove"></i><i data-id="${id}" class="glyphicon glyphicon-edit edit"></i>`);

                                                            me.parents('.control-group').addClass('has-success');
                                                            me.siblings('.input-group-btn').remove();
                                                            me.remove();
                                                            $('.overlay').fadeOut();
                                                            validateObject.filename=true;
                                                            validation();
                                                        }
                                                    });
                                                }else {
                                                    let url= "{{url('dashboard/addImage')}}";
                                                    let kitchen_id = '{{$kitchen->id}}';
                                                    let data = {'_token':$('meta[name=csrf-token]').attr('content'),kitchen_id,'image':dataImg};
                                                    $.ajax({
                                                        url:url,
                                                        method:'post',
                                                        data:data,
                                                        success:function(res){
                                                            console.log(res);
                                                            me.parent('.file').next().children('.showImage').append(`<img src="${dataImg}" class="img-responsive img-thumbnail"><i data-id="${res.id}" class="glyphicon glyphicon-remove remove"></i><i data-id="${res.id}" class="glyphicon glyphicon-edit edit"></i>`);

                                                            me.parents('.control-group').addClass('has-success');
                                                            me.siblings('.input-group-btn').remove();
                                                            me.remove();
                                                            $('.overlay').fadeOut();
                                                            validateObject.filename=true;
                                                            validation();
                                                        }
                                                    });
                                                }
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
                let id = $(this).data('id');
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
                        readURL(myThis,me,id);
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
                let id = $(this).data('id');
                let thisImage=$(this);
                if (id !== ''){
                    var n = new Noty({
                        text: "@lang('site.confirm_delete')",
                        type: "error",
                        layout: 'topCenter',
                        killer: true,
                        buttons: [
                            Noty.button("@lang('site.yes')", 'btn btn-success mr-2', function () {

                                // that.closest('form').submit();
                                let url= "{{url('dashboard/deleteImage')}}/"+id;
                                let data = {'_token':$('meta[name=csrf-token]').attr('content'),id};
                                $.ajax({
                                    url:url,
                                    method:'delete',
                                    data:data,
                                    success:function(res){
                                        console.log(res);
                                        thisImage.parents('.myImage').remove();
                                    }
                                });
                                n.close();
                            }),

                            Noty.button("@lang('site.no')", 'btn btn-primary mr-2', function () {
                                n.close();
                            })
                        ]
                    });
                    n.show();
                }else {
                    console.log('data-id');
                    thisImage.parents('.myImage').remove()
                }
                // $(this).parents('.col-md-6').remove()
            });
            body.on("click",".edit",function () {
                let id= $(this).data('id');
                $('input[type=submit]').attr('disabled','disabled');
                $('.btn-success').attr('disabled','disabled');
                $(this).parents('.col-md-12').children('.control-group').removeClass('has-success');
                $(this).parents('.col-md-12').children('.input-group').children('.imgInp').remove();
                $(this).parents('.col-md-12').children('.input-group').append(`
                <input type="file" data-id="${id}" name="filename[]" class="form-control imgInp" accept="image/*">

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

            $('#price,#description').keyup(function () {
                // console.log(validateObject);
                validation();

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
