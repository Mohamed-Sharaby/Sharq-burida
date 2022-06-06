<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!-- User -->
        <div class="user-box">
            <div class="user-img">
                <img src="{{asset('admin/assets/images/user.jpg')}}" alt="user-img"
                     title="{{auth('admin')->user()->name}}"
                     class="img-circle img-thumbnail img-responsive">
                <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
            </div>
            <h5><a href="javascript:void(0)">{{auth('admin')->user()->name}}</a></h5>
            <ul class="list-inline">
                <li>
                    <a href="{{route('admin.admins.edit',auth()->id())}}" title="اعدادات الحساب">
                        <i class="zmdi zmdi-settings zmdi-hc-2x"></i>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.logout') }}" class="text-custom" title="تسجيل الخروج"
                       onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="zmdi zmdi-power zmdi-hc-2x"></i>
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <!-- End User -->

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{route('site.home')}}" target="_blank" class="waves-effect">
                        <i class="zmdi zmdi-directions"></i>
                        <span class="bg-purple text-white" style="padding: 5px;border-radius: 4px;"> الانتقال إلى موقع الجمعية   </span> </a>
                </li>

                <li>
                    <a href="{{route('admin.main')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i>
                        <span> الرئيسية </span> </a>
                </li>

                @can('Roles')
                    <li>
                        <a href="{{route('admin.roles.index')}}" class="waves-effect"><i
                                class="fa fa-balance-scale"></i> <span> الصلاحيات والمناصب </span> </a>
                    </li>
                @endcan

                @can('Admins')
                    <li>
                        <a href="{{route('admin.admins.index')}}" class="waves-effect"><i
                                class="fa fa-cog"></i> <span> الادارة  </span> </a>
                    </li>
                @endcan


                @can('Achievements')
                    <li>
                        <a href="{{route('admin.achievements.index')}}" class="waves-effect"><i
                                class="fa fa-database"></i> <span> التقارير  </span> </a>
                    </li>
                @endcan

                @can('Profile')
                    <li>
                        <a href="{{route('admin.profiles.index')}}" class="waves-effect"><i
                                class="fa fa-product-hunt"></i> <span> البروفايل  </span> </a>
                    </li>
                @endcan

                @can('Administrations')
                    <li>
                        <a href="{{route('admin.administrations.index')}}" class="waves-effect"><i
                                class="fa fa-users"></i> <span> الطاقم الادارى  </span> </a>
                    </li>
                @endcan

                @can('Ideas')
                    <li>
                        <a href="{{route('admin.ideas.index')}}" class="waves-effect"><i
                                class="fa fa-list-alt"></i> <span> المقترحات   </span> </a>
                    </li>
                @endcan

                @can('Policy')
                    <li>
                        <a href="{{route('admin.policies.index')}}" class="waves-effect"><i
                                class="fa fa-stop"></i> <span> اللوائح والسياسات   </span> </a>
                    </li>
                @endcan

                @can('Media')
                    <li>
                        <a href="{{route('admin.media.index')}}" class="waves-effect"><i
                                class="fa fa-play-circle"></i> <span> المركز الاعلامى    </span> </a>
                    </li>
                @endcan

                @can('Donates')
                    <li>
                        <a href="{{route('admin.donates.index')}}" class="waves-effect"><i
                                class="fa fa-play-circle"></i> <span> التبرعات </span> </a>
                    </li>
                @endcan

                @can('SiteRoles')
                    <li>
                        <a href="{{route('admin.site-roles.index')}}" class="waves-effect"><i
                                class="fa fa-play-circle"></i> <span> دور الجمعية </span> </a>
                    </li>
                @endcan

                @can('Rate')
                    <li>
                        <a href="{{route('admin.rates.index')}}" class="waves-effect"><i
                                class="fa fa-star-o"></i> <span>  التقييمات </span> </a>
                    </li>
                @endcan

                @can('Sliders')
                    <li>
                        <a href="{{route('admin.sliders.index')}}" class="waves-effect"><i
                                class="fa fa-image"></i> <span>  السلايدر </span> </a>
                    </li>
                @endcan

                @can('Sliders')
                    <li>
                        <a href="{{route('admin.second-sliders.index')}}" class="waves-effect"><i
                                class="fa fa-image"></i> <span>  السلايدر الثانى </span> </a>
                    </li>
                @endcan

                @can('Settings')
                    <li>
                        <a href="{{route('admin.settings.index')}}" class="waves-effect"><i
                                class="fa fa-cogs"></i> <span>  الاعدادات </span> </a>
                    </li>
                @endcan

            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>
    </div>

</div>
<!-- Left Sidebar End -->
