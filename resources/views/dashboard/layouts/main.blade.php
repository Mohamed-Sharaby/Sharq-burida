@extends('dashboard.layouts.layout')
@section('title','شرق بريدة - لوحة التحكم')

@section('content')
    <div class="row">

        @can('Roles')
            <div class="col-lg-3 col-md-6">
                <a href="{{route('admin.roles.index')}}">
                    <div class="card-box bg-info">
                        <h4 class="header-title m-t-0 m-b-30 text-white">الصلاحيات والمناصب</h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <i class="fa fa-balance-scale fa-4x text-white"></i>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0 text-white"> {{\Spatie\Permission\Models\Role::count()}} </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endcan

        @can('Admins')
            <div class="col-lg-3 col-md-6">
                <a href="{{route('admin.admins.index')}}">
                    <div class="card-box bg-success">
                        <h4 class="header-title m-t-0 m-b-30 text-white">الادارة </h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <i class="fa fa-cog fa-4x text-white"></i>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Admin::count()}} </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endcan



        @can('Achievements')
            <div class="col-lg-3 col-md-6">
                <a href="{{route('admin.achievements.index')}}">
                    <div class="card-box bg-warning">
                        <h4 class="header-title m-t-0 m-b-30 text-white">التقارير </h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <i class="fa fa-database fa-4x text-white"></i>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Achievement::count()}} </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endcan

        @can('Profile')
            <div class="col-lg-3 col-md-6">
                <a href="{{route('admin.profiles.index')}}">
                    <div class="card-box bg-primary">
                        <h4 class="header-title m-t-0 m-b-30 text-white">البروفايل </h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <i class="fa fa-product-hunt fa-4x text-white"></i>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Profile::count()}} </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endcan

        @can('Administrations')
            <div class="col-lg-3 col-md-6">
                <a href="{{route('admin.administrations.index')}}">
                    <div class="card-box bg-pink">
                        <h4 class="header-title m-t-0 m-b-30 text-white">الطاقم الادارى </h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <i class="fa fa-users fa-4x text-white"></i>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Administration::count()}} </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endcan


        @can('Ideas')
            <div class="col-lg-3 col-md-6">
                <a href="{{route('admin.ideas.index')}}">
                    <div class="card-box bg-purple">
                        <h4 class="header-title m-t-0 m-b-30 text-white">المقترحات </h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <i class="fa fa-list-alt fa-4x  text-white"></i>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Idea::count()}} </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endcan

        @can('Policy')
            <div class="col-lg-3 col-md-6">
                <a href="{{route('admin.policies.index')}}">
                    <div class="card-box bg-inverse">
                        <h4 class="header-title m-t-0 m-b-30 text-white">اللوائح والسياسات </h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <i class="fa fa-stop fa-4x  text-white"></i>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Policy::count()}} </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endcan

        @can('Media')
            <div class="col-lg-3 col-md-6">
                <a href="{{route('admin.media.index')}}">
                    <div class="card-box bg-success">
                        <h4 class="header-title m-t-0 m-b-30 text-white">المركز الاعلامى </h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <i class="fa fa-play-circle fa-4x  text-white"></i>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Media::count()}} </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endcan

        @can('Rate')
            <div class="col-lg-3 col-md-6">
                <a href="{{route('admin.rates.index')}}">
                    <div class="card-box bg-danger">
                        <h4 class="header-title m-t-0 m-b-30 text-white">التقييمات </h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <i class="fa fa-star-o fa-4x  text-white"></i>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Rate::count()}} </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endcan

            @can('Settings')
            <div class="col-lg-3 col-md-6">
                <a href="{{route('admin.settings.index')}}">
                    <div class="card-box bg-info">
                        <h4 class="header-title m-t-0 m-b-30 text-white">الاعدادات </h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <i class="fa fa-cogs fa-4x  text-white"></i>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Setting::count()}} </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endcan

            @can('Sliders')
            <div class="col-lg-3 col-md-6">
                <a href="{{route('admin.sliders.index')}}">
                    <div class="card-box bg-pink">
                        <h4 class="header-title m-t-0 m-b-30 text-white">السلايدر </h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <i class="fa fa-image fa-4x  text-white"></i>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Slider::count()}} </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endcan


    </div>
    <!-- end row -->


@endsection
