@extends('site.layouts.layout')
@section('title','اللوائح والسياسات')
@section('content')

    <!-----------------------------------Start-policies-Background----------------------------------->
    <div class="before-background"></div>
    <div class="policies-background ">
        <span>اللوائح و السياسات</span>
    </div>
    <!-----------------------------------End-policies-Background----------------------------------->

    <!-----------------------------------Start-policies-dropdown-section------------------------------->
    <section class="dropdown-section">
        @foreach($policies as $policy)
        <div class="dropdown">
            <div class="dropdown-title">{{$policy->name}}</div>
            <div class="dropdown-content">
                @foreach($policy->files as $file)
                <a class="item" href="{{asset('storage/'.$file->file)}}" >
                    <div class="item-title">{{str_replace('uploads/','',$file->file)}}  </div>
                    <div class="item-file"><i class="fas fa-file-pdf"></i></div>
                </a>
                @endforeach
            </div>
        </div>
        @endforeach
    </section>
    <!-----------------------------------End-policies-dropdown-section--------------------------------->

@endsection
