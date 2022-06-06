@extends('site.layouts.layout')
@section('title','البروفايل  ')
@section('content')


    <!-----------------------------------Start-Profile-Background----------------------------------->
    <div class="before-background"></div>
    <div class="profile-background ">
        <span>بروفــايل</span>
    </div>
    <!-----------------------------------End-Profile-Background----------------------------------->

    <!-----------------------------------Start-Profile-box----------------------------------->
    <section class="main-section-profile">
        @foreach($profiles as $profile)
        <div class="profile-box " data-caption="{{$profile->name}}" data-fancybox="gallery" href="{{$profile->image}}">
            <div class="box-title">
                <span>  {{$profile->name}}</span>
            </div>
            <div class="box-background">
                <img src="{{$profile->image}}">
            </div>
        </div>
        @endforeach
    </section>
    <!-----------------------------------End-Profile-box----------------------------------->

    <!-----------------------------------Start-Footer----------------------------------->
@endsection
