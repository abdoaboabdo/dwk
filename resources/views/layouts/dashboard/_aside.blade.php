<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dashboard/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>
                    {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{Request::is('dashboard/index') ? 'active': ' '}}"><a href="{{ route('dashboard.index')  }}"><i class="fa fa-th"></i><span>@lang('site.dashboard')</span></a></li>
            <li class=" treeview {{Request::is('dashboard/doors') || Request::is('dashboard/doors/create') ? 'active' : ' '}}">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>ألأبواب</span> <i class="fa fa-angle-right pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{Request::is('dashboard/doors') ? 'active':' '}}"><a href="{{route('dashboard.doors.index')}}"><i class="fa fa-circle-o"></i>كل الأبواب</a></li>
                    <li class="{{Request::is('dashboard/doors/create') ? 'active':' '}}"><a href="{{route('dashboard.doors.create')}}"><i class="fa fa-circle-o"></i>اضافة باب جديد</a></li>
                </ul>
            </li>
            @if (auth()->user()->hasPermission('read_users'))
                <li class="{{Request::is('/dashboard/users') | Request::is('/dashboard/users/create') ? 'active': ' '}}"><a href="{{ route('dashboard.users.index') }}"><i class="fa fa-th"></i><span>@lang('site.users')</span></a></li>
            @endif
            {{--            @if (auth()->user()->hasPermission('read_categories'))--}}
            {{--                <li class="{{Request::is(LaravelLocalization::getCurrentLocale().'/dashboard/categories') | Request::is(LaravelLocalization::getCurrentLocale().'/dashboard/categories/create') ? 'active': ' '}}"><a href="{{ route('dashboard.categories.index') }}"><i class="fa fa-th"></i><span>@lang('site.categories')</span></a></li>--}}
            {{--            @endif--}}

{{--            @if (auth()->user()->hasPermission('read_products'))--}}
{{--                <li class="{{Request::is(LaravelLocalization::getCurrentLocale().'/dashboard/products') | Request::is(LaravelLocalization::getCurrentLocale().'/dashboard/products/create') ? 'active': ' '}}"><a href="{{ route('dashboard.products.index') }}"><i class="fa fa-th"></i><span>@lang('site.products')</span></a></li>--}}
{{--            @endif--}}

{{--            @if (auth()->user()->hasPermission('read_clients'))--}}
{{--                <li class="{{Request::is(LaravelLocalization::getCurrentLocale().'/dashboard/clients') | Request::is(LaravelLocalization::getCurrentLocale().'/dashboard/clients/create') ? 'active': ' '}}"><a href="{{ route('dashboard.clients.index') }}"><i class="fa fa-th"></i><span>@lang('site.clients')</span></a></li>--}}
{{--            @endif--}}

            {{--@if (auth()->user()->hasPermission('read_users'))--}}
                {{--<li><a href="{{ route('dashboard.users.index') }}"><i class="fa fa-th"></i><span>@lang('site.users')</span></a></li>--}}
            {{--@endif--}}

            {{--<li><a href="{{ route('dashboard.categories.index') }}"><i class="fa fa-book"></i><span>@lang('site.categories')</span></a></li>--}}
            {{----}}
            {{----}}
            {{--<li><a href="{{ route('dashboard.users.index') }}"><i class="fa fa-users"></i><span>@lang('site.users')</span></a></li>--}}

            {{--<li class="treeview">--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-pie-chart"></i>--}}
            {{--<span>الخرائط</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li>--}}
            {{--<a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
        </ul>

    </section>

</aside>

