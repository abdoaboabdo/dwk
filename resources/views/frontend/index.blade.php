@extends('layouts.frontend.app')

@section('css')
    <style>
        .jssorb051 .i {position:absolute;cursor:pointer;}
        .jssorb051 .i .b {fill:#fff;fill-opacity:0.5;stroke:#000;stroke-width:400;stroke-miterlimit:10;stroke-opacity:0.5;}
        .jssorb051 .i:hover .b {fill-opacity:.7;}
        .jssorb051 .iav .b {fill-opacity: 1;}
        .jssorb051 .i.idn {opacity:.3;}
        .flex-section .flex-img::before{
            right: -110px;
            left: auto;
            -webkit-transform: skewX(12deg);

            -moz-transform: skewX(12deg);

            transform: skewX(12deg);
        }
        .flex-section.gtco-gray-bg{
            direction: rtl;
        }
        #gtco-footer{
            padding-top: 3em;
        }
        #gtco-features, #gtco-features-2, #gtco-products, #gtco-services, #gtco-subscribe, #gtco-footer, .gtco-section{
            padding: 2em 0;
        }
    </style>
    <style>
        .jssora051 {display:block;position:absolute;cursor:pointer;}
        .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
        .jssora051:hover {opacity:.8;}
        .jssora051.jssora051dn {opacity:.5;}
        .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
    </style>
@stop

@section('content')
    <div class="gtco-cover gtco-cover-sm"  style="margin-top: 50px">
        <div class=" text-center" style="margin-top: 70px">

            <div id="slider1_container" style="position: relative; margin: 0 auto;
        top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">

                <!-- Loading Screen -->
                <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="{{asset('frontend/images/slider/svg/spin.svg')}}" />
                </div>

                <div data-u="slides" style="position: absolute; left: 0px; top: 0px; width: 1500px;
            height: 600px; overflow: hidden;">
                    <div>
                        <img data-u="image" src="{{asset('frontend/images/slider/001.jpg')}}" alt="" />
{{--                        <div style="position: absolute; width: 480px; height: 120px; top: 30px; left: 30px; padding: 5px;--}}
{{--                    text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;--}}
{{--                        color: #FFFFFF;">Touch Swipe Slider--}}
{{--                        </div>--}}
{{--                        <div style="position: absolute; width: 480px; height: 120px; top: 300px; left: 30px; padding: 5px;--}}
{{--                    text-align: left; line-height: 36px; font-size: 30px;--}}
{{--                        color: #FFFFFF;">--}}
{{--                            Build your slider with anything, includes image, content, text, html, photo, picture--}}
{{--                        </div>--}}
                    </div>
                    <div>
                        <img data-u="image" src="{{asset('frontend/images/slider/002.jpg')}}" alt="" />
{{--                        <div style="position: absolute; width: 480px; height: 120px; top: 30px; left: 30px; padding: 5px;--}}
{{--                    text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;--}}
{{--                        color: #FFFFFF;">Touch Swipe Slider--}}
{{--                        </div>--}}
{{--                        <div style="position: absolute; width: 480px; height: 120px; top: 300px; left: 30px; padding: 5px;--}}
{{--                    text-align: left; line-height: 36px; font-size: 30px;--}}
{{--                        color: #FFFFFF;">--}}
{{--                            Build your slider with anything, includes image, content, text, html, photo, picture--}}
{{--                        </div>--}}
                    </div>
                    <div>
                        <img data-u="image" src="{{asset('frontend/images/slider/003.jpg')}}" alt="" />
{{--                        <div style="position: absolute; width: 480px; height: 120px; top: 30px; left: 30px; padding: 5px;--}}
{{--                    text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;--}}
{{--                        color: #FFFFFF;">Touch Swipe Slider--}}
{{--                        </div>--}}
{{--                        <div style="position: absolute; width: 480px; height: 120px; top: 300px; left: 30px; padding: 5px;--}}
{{--                    text-align: left; line-height: 36px; font-size: 30px;--}}
{{--                        color: #FFFFFF;">--}}
{{--                            Build your slider with anything, includes image, content, text, html, photo, picture--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div data-u="navigator" class="jssorb051" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                    <div data-u="prototype" class="i" style="width:20px;height:20px;">
                        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                        </svg>
                    </div>
                </div>

                <div data-u="arrowleft" class="jssora051" style="width:75px;height:75px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                    </svg>
                </div>
                <div data-u="arrowright" class="jssora051" style="width:75px;height:75px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                    </svg>
                </div>


            </div>

        </div>
    </div>
    <div class="flex-section gtco-gray-bg">
        <div class="col-1">
            <div class="text">

                <div class="row row-pb-sm">
                    <div class="col-md-12">
                        <h2>مصنع السلطانية</h2>

                        <p>نبذة عن الشركة</p>
                        <p>لتواصل اتصل علي +966561258199</p>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-2 flex-img" style="background-image: url({{asset('frontend/images/img_1.jpg')}});"></div>
    </div>
















    {{--    <!--Grid row-->--}}
{{--    <div class="row">--}}


{{--        @foreach ($doors as $door)--}}
{{--            <!--Grid column-->--}}
{{--                <div class="col-lg-4 col-md-6">--}}

{{--                    <!--Card-->--}}
{{--                    <div class="card">--}}

{{--                        <!--Card image-->--}}
{{--                        <div class="view overlay">--}}
{{--                            <img src="{{$door->images[0]->image_path}}" class="card-img-top" alt="">--}}
{{--                            <a href="#">--}}
{{--                                <div class="mask rgba-white-slight"></div>--}}
{{--                            </a>--}}
{{--                        </div>--}}

{{--                        <!--Card content-->--}}
{{--                        <div class="card-body">--}}
{{--                            <!--Title-->--}}
{{--                            <h4 class="card-title">Card title</h4>--}}
{{--                            <!--Text-->--}}
{{--                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
{{--                            <a href="#" class="btn btn-primary">Button</a>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <!--/.Card-->--}}

{{--                </div>--}}
{{--                <!--Grid column-->--}}
{{--        @endforeach--}}

{{--    </div>--}}
{{--    <!--Grid row-->--}}
@endsection


@section('js')

    <script>
        jssor_slider1_init = function () {
            var options = {
                $FillMode: 2,                                       //[Optional] The way to fill image in slide, 0 stretch, 1 contain (keep aspect ratio and put all inside slide), 2 cover (keep aspect ratio and cover whole slide), 4 actual size, 5 contain for large image, actual size for small image, default value is 0
                $AutoPlay: 1,                                    //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
                $Idle: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: 1,   			            //[Optional] Steps to go for each navigation request by pressing arrow key, default value is 1.
                $SlideEasing: $Jease$.$OutQuint,          //[Optional] Specifies easing for right to left animation, default value is $Jease$.$OutQuad
                $SlideDuration: 1200,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide, default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)

                $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Rows: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 8,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 8,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                },

                $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                }
            };

            var jssor_slider1 = new $JssorSlider$('slider1_container', options);

            /*#region responsive code begin*/
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth;
                if (bodyWidth)
                    jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1920));
                else
                    $Jssor$.$Delay(ScaleSlider, 30);
            }

            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);

            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <script>
        jssor_slider1_init();
    </script>
@stop
