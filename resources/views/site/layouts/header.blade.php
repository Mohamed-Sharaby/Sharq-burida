<nav class="main-navbar">
    <div class="navbar-toggle" id="mobile-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
    @if(request()->routeIs('site.home'))
    <div class="navbar-menu ">
        <a class="navbar-link {{request()->routeIs('site.home') ? 'active':''}}" href="{{route('site.home')}}">الرئيــسية</a>
        <a href="{{route('site.profile')}}" class=" navbar-link  {{request()->routeIs('site.profile') ? 'active':''}}">بروفايل</a>
        <a href="{{route('site.administration')}}" class=" navbar-link {{request()->routeIs('site.administration') ? 'active':''}}">الطاقم الإداري</a>
        <a href="{{route('site.policies')}}" class=" navbar-link {{request()->routeIs('site.policies') ? 'active':''}}">اللوائح و السياسات</a>
        <a class="navbar-link {{request()->routeIs('site.achievement') ? 'active':''}}" href="{{route('site.achievement')}}"> التقارير</a>
        <a href="{{route('site.mediaSection')}}" class=" navbar-link {{request()->routeIs('site.mediaSection') ? 'active':''}}">المركز الإعلامي</a>
    </div>
    <!--Home-Logo-->
    <a href="{{route('site.home')}}" class="logo">
        <img src="{{asset('website/img/logo.svg')}}">
    </a>
    @else
    <!--custom-->

    <div class="navbar-menu ">
        <a class="navbar-link-custom {{request()->routeIs('site.home') ? 'active':''}}" href="{{route('site.home')}}">الرئيــسية</a>
        <a href="{{route('site.profile')}}" class=" navbar-link-custom  {{request()->routeIs('site.profile') ? 'active':''}}">بروفايل</a>
        <a href="{{route('site.administration')}}" class=" navbar-link-custom {{request()->routeIs('site.administration') ? 'active':''}}">الطاقم الإداري</a>
        <a href="{{route('site.policies')}}" class=" navbar-link-custom  {{request()->routeIs('site.policies') ? 'active':''}}">اللوائح و السياسات</a>
        <a class="navbar-link-custom  {{request()->routeIs('site.achievement') ? 'active':''}}" href="{{route('site.achievement')}}"> التقارير</a>
        <a href="{{route('site.mediaSection')}}" class=" navbar-link-custom  {{request()->routeIs('site.mediaSection') ? 'active':''}}">المركز الإعلامي</a>
    </div>

      <a href="{{route('site.home')}}" class="logo">
        <img src="{{asset('website/img/custom-logo.svg')}}">
        </a>

@endif
    <!--Start-Media-Center-Scoial-Section-->
    <div class=" media-center" onclick="location.href='{{route('site.donate')}}';">
        <span>يمكنك التبرع الآن</span>
        <span> طريقك للمشاركة في الدعوة إلى الله تعالى</span>
        <!--  <i class="fas fa-arrow-left"></i>-->
    </div>
    <!--Start-Media Center-Scoial-Section-->
</nav>



<!-----------------------------------Start-Sticky-Scoial-Section----------------------------------->
<div class="sticky-social">
    <ul class="social">
        <li class="call-icon"><a href="tel:{{@\App\Models\Setting::whereType('number')->where('name','mobile')->first()->value}}" target="_blank"><i class="fas fa-phone-alt" aria-hidden="true"></i></a></li>
        <li class="map-icon"><a href="{{@\App\Models\Setting::whereType('url')->where('name','location')->first()->value}}" target="_blank"><i class="fas fa-map-marker-alt" aria-hidden="true"></i></a></li>
        <li class="twitter-icon"><a href="{{@\App\Models\Setting::whereType('url')->where('name','twitter')->first()->value}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li class="youtube-icon"><a href="{{@\App\Models\Setting::whereType('url')->where('name','youtube')->first()->value}}" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
    </ul>
</div>
<!-----------------------------------End-Sticky-Scoial-Section----------------------------------->
