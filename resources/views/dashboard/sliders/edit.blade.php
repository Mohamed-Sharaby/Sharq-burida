@extends('dashboard.layouts.layout')
@section('title',' تعديل السلايدر  ')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <a href="{{route('admin.sliders.index')}}" class="header-title m-t-0 m-b-30"><i
                            class="icon-home2 mr-2"></i>
                          السلايدرز </a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            {{--                            @include('dashboard.layouts.status')--}}
                            <h4 class="header-title m-t-0 m-b-30"> تعديل  </h4>

                            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data"
                                  action="{{route('admin.sliders.update',$slider->id)}}">
                                @csrf
                                {{method_field('put')}}

                                <div class="form-group row">
                                    <label class="col-md-2 control-label"> العنوان</label>
                                    <div class="col-md-4">
                                        <input name="title" placeholder="العنوان  " value="{{ $slider->title }} "
                                               class="form-control {{$errors->has('title') ? ' is-invalid' : null}}">
                                        @error('title')
                                        <div class="invalid-feedback" style="color: #ef1010">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 control-label"> المحتوى</label>
                                    <div class="col-md-8">
                                        <textarea name="body" cols="30" rows="4" placeholder="المحتوى"
                                                  class="form-control {{$errors->has('body') ? ' is-invalid' : null}}">{{$slider->body}}</textarea>
                                        @error('body')
                                        <div class="invalid-feedback" style="color: #ef1010">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 control-label">الصورة</label>
                                    <div class="col-md-4">
                                        <input type="file"
                                               class="form-control  {{$errors->has('image') ? ' is-invalid' : null}}"
                                               name="image">
                                        @error('image')
                                        <div class="invalid-feedback" style="color: #ef1010">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    @if($slider->image)

                                        <a data-fancybox="gallery" href="{{$slider->image}}">
                                            <img src="{{$slider->image}}" width="100" height="100" class="img-thumbnail">
                                        </a>
                                    @else لا يوجد صور @endif

                                </div>


                                <div class="text-center form-group row">
                                    <button type="submit"
                                            class="btn btn-success btn-block waves-effect waves-light m-l-10 btn-md">
                                        تعديل
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div><!-- end col -->
                </div>
            </div>
        </div><!-- end col -->
    </div>

@endsection
