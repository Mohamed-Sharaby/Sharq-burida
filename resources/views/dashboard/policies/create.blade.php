@extends('dashboard.layouts.layout')
@section('title',' اضافة لائحة جديدة ')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <a href="{{route('admin.policies.index')}}" class="header-title m-t-0 m-b-30"><i
                            class="icon-home2 mr-2"></i>
                        اللوائح والسياسات </a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            {{--                            @include('dashboard.layouts.status')--}}
                            <h4 class="header-title m-t-0 m-b-30"> اضافة لائحة</h4>

                            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data"
                                  action="{{route('admin.policies.store')}}">
                                @csrf

                                <div class="form-group row">
                                    <label class="col-md-2 control-label"> الاسم</label>
                                    <div class="col-md-4">
                                        <input name="name" placeholder="الاسم  " value="{{old('name')}} "
                                               class="form-control {{$errors->has('name') ? ' is-invalid' : null}}">
                                        @error('name')
                                        <div class="invalid-feedback" style="color: #ef1010">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 control-label">الملف</label>
                                    <div class="col-md-4">
                                        <input type="file"
                                               class="form-control  {{$errors->has('files') ? ' is-invalid' : null}}"
                                               name="files[]" multiple>
                                        <small class="text-info font-bold">يمكنك اختيار ملف واحد او أكثر</small>
                                        @error('files')
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
