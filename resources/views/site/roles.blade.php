@extends('site.layouts.layout')
@section('title','دور الجمعية  ')
@section('content')

    <!-----------------------------------End-Sticky-Scoial-Section----------------------------------->

    <!-----------------------------------Start-media-section-Background----------------------------------->
    <div class="before-background"></div>
    <div class="roles-section-background ">
        <span>دور الجمعية في تحقيق رؤية الممكلة 2030</span>
    </div>
    <!-----------------------------------End-media-section-Background----------------------------------->

    <!-----------------------------------Start-media-section-box----------------------------------->
    <section class="main-roles-section">
        @foreach($roles as $role)
        <div class="roles-box" data-caption="{{$role->name}}" data-fancybox="gallery" href="{{$role->image}}">
            <div class="box-background">
                <img src="{{$role->image}}">
            </div>
        </div>
        @endforeach
    </section>
    <!-----------------------------------End-media-section-box----------------------------------->

@endsection
