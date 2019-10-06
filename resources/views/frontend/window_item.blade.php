@extends('layouts.frontend.app')

@section('css')

@stop

@section('content')
    <div class="overflow-hid">
        <div class="gtco-section">
            <div class="gtco-container" style="direction: rtl">
                <div id="showData">
                    <div class="row  text-right">
                        <div class="col-lg-2 pull-right">الكود</div>
                        <div class="col-lg-4 pull-right">{{'W_'.$data->id}}</div>
                    </div>
                    <div class="row  text-right">
                        <div class="col-lg-2 pull-right">الفئة</div>
                        <div class="col-lg-4 pull-right">{{$data->category->name}}</div>
                    </div>
                    <div class="row  text-right">
                        <div class="col-lg-2 pull-right">الوصف</div>
                        <div class="col-lg-4 pull-right">{{$data->description}}</div>
                    </div>
                    <div class="row  text-right">
                        <div class="col-lg-2 pull-right">السعر</div>
                        <div class="col-lg-4 pull-right">{{$data->price}}</div>
                    </div>
                    <div class="row  text-right">
                        <div class="col-lg-2 pull-right">اللون</div>
                        <div class="col-lg-4 pull-right" >
                            {{$data->color}}
                        </div>
                    </div>
                    <div class="row  text-right">
                        <div class="col-lg-2 pull-right">نوع الالمونيوم</div>
                        <div class="col-lg-4 pull-right">{{$data->aluminum_type->name}}</div>
                    </div>
                    <div class="row" >
                        @foreach ($data->images as $image)
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <a data-fancybox="gallery"  href="{{$image->image_path}}" class="gtco-card-item">
                                    <figure     >
                                        <div class="overlay"><i class="ti-plus"></i></div>

                                        <img src="{{$image->image_path}}" alt="Image" class="img-responsive">
                                    </figure>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>


    </div>
@stop


@section('js')
    <script !src="">
        $(document).ready(function () {
            let myType;
            $(document).on('click','.pagination a',function (event) {
                event.preventDefault();
                let page=$(this).attr('href').split('page=')[1];
                console.log(myType);
                if (myType==null){
                    fetch_data(page);
                }else {
                    fetch_data(page,myType);
                }

            });
            // $(document).on('click','.door a',function (event) {
            //     event.preventDefault();
            //     myType=$(this).data('door');
            //     fetch_data(null,myType)
            // });
            function fetch_data(page,type=null){
                if (type==null){
                    $.ajax({
                        url:"{{url()->current()}}?page="+page,
                        success:function (windows) {
                            $('#showData').html(windows);
                        }
                    });
                }else {
                    $.ajax({
                        url:"{{url()->current()}}?page="+page+'&type='+type,
                        success:function (windows) {
                            $('#showData').html(windows);
                        }
                    });
                }
            }
        });
    </script>
@stop
