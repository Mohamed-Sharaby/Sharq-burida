@extends('dashboard.layouts.layout')
@section('title',' اضافة سلايدر  ')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <a href="{{route('admin.second-sliders.index')}}" class="header-title m-t-0 m-b-30"><i
                            class="icon-home2 mr-2"></i>
                          السلايدرز  الثانى</a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="header-title m-t-0 m-b-30"> اضافة سلايدر جديد </h4>

                            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data"
                                  action="{{route('admin.second-sliders.store')}}">
                                @csrf

                                <div class="form-group row">
                                    <label class="col-md-2 control-label"> العنوان</label>
                                    <div class="col-md-4">
                                        <input name="title" placeholder="العنوان  " value="{{old('title')}} "
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
                                                  class="form-control {{$errors->has('body') ? ' is-invalid' : null}}">{{old('body')}}</textarea>
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
                                </div>


                                <div class="text-center form-group row">
                                    <button type="submit"
                                            class="btn btn-success btn-block waves-effect waves-light m-l-10 btn-md">
                                        حفظ
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
