<div id="head-top" style="position: absolute; width: 100%; top: 0; ">
    <div class="gtco-top" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-xs-6 social-icons text-left"  style="text-align: left">
                    <ul class="gtco-social-top">
                        <li><a href="https://www.facebook.com/alsultaniahfactory/" target="_blank"><i class="icon-facebook"></i></a></li>
                        <li><a href="https://twitter.com/SultaniahAl" target="_blank"><i class="icon-twitter"></i></a></li>
{{--                        <li><a href="#"><i class="icon-linkedin"></i></a></li>--}}
                        <li><a href="https://www.instagram.com/alsultaniah_factory/" target="_blank"><i class="icon-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-xs-6" style="text-align: right">
                    <div id="gtco-logo"><a href="index.html"><img src="{{asset('images/logo.png')}}" height="50" alt="" style="padding: 5px;"></a></div>
                </div>

            </div>
        </div>
    </div>
    <nav class="gtco-nav sticky-banner" role="navigation">
        <div class="gtco-container">

            <div class="row">
                <div class="col-xs-12 text-center menu-1">
                    <ul >
                        <li class="{{url()->current()===url('/')?'active':' '}}"><a href="{{url('/')}}">الرئيسية</a></li>
                        <li class="has-dropdown {{url()->current()===url('doors')?' active':' '}}" >
                            <a href="{{url('doors')}}" disabled>الابواب</a>
                            <ul class="dropdown door" >
                                <li  style="width: 100%;text-align: right"><a href="{{url('doors')}}" style="width: 100%;text-align: right">الكل</a></li>
                                <li><a href="{{url('doors/woods')}}" data-door="wood">ابواب خشب</a></li>
                                <li><a href="{{url('doors/aluminum')}}" data-door="aluminum">ابواب المونيوم</a></li>
                                <li><a href="{{url('doors/irons')}}" data-door="iron">ابواب حديد</a></li>
                            </ul>

                        </li>
                        <li class="has-dropdown">
                            <a href="{{url('handrails')}}" disabled> الدرابزين</a>
                            <ul class="dropdown">
                                <li  style="width: 100%;text-align: right"><a href="{{url('handrails')}}" style="width: 100%;text-align: right">الكل</a></li>
                                <li><a href="{{url('handrails/normal')}}">درابزاين</a></li>
                                <li><a href="{{url('handrails/stainless')}}">درابزاين استانلس</a></li>
                            </ul>
                        </li>
                        <li class="has-dropdown {{url()->current()===url('windows')?'active':' '}}">
                            <a href="{{url('windows')}}" class="disabled" disabled>النوافذ</a>
                            <ul class="dropdown">
                                <li  style="width: 100%;text-align: right"><a href="{{url('windows')}}" style="width: 100%;text-align: right">الكل</a></li>
                                <li><a href="{{url('windows/zipper')}}">نوافذ سحاب</a></li>
                                <li><a href="{{url('windows/hinge')}}">نوافذ مفصلي</a></li>
                                <li><a href="{{url('windows/fixed')}}">نوافذ ثابته</a></li>
                                <li><a href="{{url('windows/inverting')}}">نوافذ قلاب</a></li>
                                <li><a href="{{url('windows/db_action')}}">دبل اكشن</a></li>
                            </ul>
                        </li>
                        <li class="{{url()->current()===url('kitchens')?'active':' '}}" ><a href="{{url('kitchens')}}">المطابخ</a></li>
                        <li><a href="#" id="contact">تواصل معنا</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </nav>
</div>

{{--<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url({{asset('frontend/images/img_bg_4.jpg')}})" data-stellar-background-ratio="0.5">--}}
{{--    <div class="overlay"></div>--}}
{{--    <div class="gtco-container">--}}
{{--        <div class="row row-mt-15em">--}}
{{--            <div class="col-md-12 mt-text text-center animate-box" data-animate-effect="fadeInUp">--}}
{{--                <h1>We Build <strong>Branded Platforms</strong></h1>--}}
{{--                <h2>Far far away, behind the word mountains, far from the countries Vokalia.</h2>--}}
{{--                <div class="text-center"><a href="https://vimeo.com/channels/staffpicks/93951774" class="btn btn-primary btn-lg popup-vimeo">Watch the video</a></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</header>--}}
