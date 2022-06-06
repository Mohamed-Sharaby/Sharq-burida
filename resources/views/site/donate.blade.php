@extends('site.layouts.layout')
@section('title','التبرعات ')
@section('content')

    <!-----------------------------------Start-media-section-Background----------------------------------->
    <div class="before-background"></div>
    <div class="donate-section-background ">
    <span>يمكنك التبرع الآن</span>
    </div>
    <!-----------------------------------End-media-section-Background----------------------------------->

    <!-----------------------------------Start-media-section-box----------------------------------->
    <section class="main-donate-section">
        @foreach($donates as $donate)
        <div class="donate-box" data-caption="{{$donate->name}}" data-fancybox="gallery" href="{{$donate->image}}">
            <div class="box-background">
                <img src="{{$donate->image}}">
            </div>
        </div>
        @endforeach
    </section>
    <!-----------------------------------End-media-section-box----------------------------------->

@endsection
