@extends('site.layouts.layout')
@section('title','المركز الاعلامى')
@section('content')

    <!-----------------------------------Start-media-section-Background----------------------------------->
    <div class="before-background"></div>
    <div class="media-section-background ">
        <span>المركز الإعلامي</span>
    </div>
    <!-----------------------------------End-media-section-Background----------------------------------->

    <!-----------------------------------Start-media-section-box----------------------------------->
    <section class="main-section-media-section">
        @foreach($media as $m)
        <div class="media-section-box" data-caption="{{$m->name}}" data-fancybox="gallery" href="{{$m->image}}">
            <div class="box-background">
                <img src="{{$m->image}}">
            </div>
        </div>
        @endforeach
    </section>
    <!-----------------------------------End-media-section-box----------------------------------->


@endsection
