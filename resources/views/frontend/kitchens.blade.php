@extends('layouts.frontend.app')

@section('css')

@stop

@section('content')
    <div class="overflow-hid">
        <div class="gtco-section">
            <div class="gtco-container">
{{--                <div class="row">--}}
{{--                    <div class="col-md-8 col-md-offset-2 text-center gtco-heading">--}}
{{--                        <h2>Services</h2>--}}
{{--                        <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
                {{--                    @dd($doors)--}}
                @include('frontend.kitchens_ajax')
                {{url()->current()}}

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
                        success:function (kitchens) {
                            $('#showData').html(kitchens);
                        }
                    });
                }else {
                    $.ajax({
                        url:"{{url()->current()}}?page="+page+'&type='+type,
                        success:function (kitchens) {
                            $('#showData').html(kitchens);
                        }
                    });
                }
            }
        });
    </script>
@stop
