@extends('site.layouts.layout')
@section('title',' الطاقم الادارى ')
@section('content')
    <!-----------------------------------Start-adminstration-Background----------------------------------->
    <div class="before-background"></div>
    <div class="adminstration-background ">
        <span>الطاقم الإداري</span>
    </div>
    <!-----------------------------------End-adminstration-Background----------------------------------->

    <!-----------------------------------Start-adminstration-box----------------------------------->
    <section class="main-section-adminstration">
        @foreach($administrations as $admin)
        <div class="adminstration-box" data-caption="{{$admin->name}}" data-fancybox="gallery" href="{{$admin->image}}">
            <div class="box-title">
                <span>{{$admin->name}}  </span>
            </div>
            <div class="box-background">
                <img src="{{$admin->image}}">
            </div>
        </div>
        @endforeach
    </section>
    <!-----------------------------------End-Profile-box----------------------------------->

@endsection
