@extends('dashboard.layouts.layout')
@section('title',' تعديل عضو  ')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <a href="{{route('admin.users.index')}}" class="header-title m-t-0 m-b-30"><i
                            class="icon-home2 mr-2"></i>
                        الادارة </a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            {{--                            @include('dashboard.layouts.status')--}}
                            <h4 class="header-title m-t-0 m-b-30">
                                تعديل عضو
                                <span class="badge badge-info">{{$user->name}}</span>
                            </h4>

                            <form class="form-horizontal" role="form" method="post"
                                  action="{{route('admin.users.update',$user->id)}}">
                                @csrf
                                {{method_field('put')}}
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">الاسم</label>
                                    <div class="col-md-4">
                                        <input type="text"
                                               class="form-control  {{$errors->has('name') ? ' is-invalid' : null}}"
                                               name="name" value="{{$user->name}}"
                                               placeholder="الاسم">
                                        @error('name')
                                        <div class="invalid-feedback" style="color: #ef1010">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <label class="col-md-2 control-label" for="example-email">البريد
                                        الالكترونى</label>
                                    <div class="col-md-4">
                                        <input type="email" id="example-email" name="email" value="{{$user->email}}"
                                               class="form-control  {{$errors->has('email') ? ' is-invalid' : null}}"
                                               placeholder="البريد الالكترونى">
                                        @error('email')
                                        <div class="invalid-feedback" style="color: #ef1010">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 control-label">كلمة المرور</label>
                                    <div class="col-md-4">
                                        <input type="password"
                                               class="form-control  {{$errors->has('password') ? ' is-invalid' : null}}"
                                               name="password">

                                        @error('password')
                                        <div class="invalid-feedback" style="color: #ef1010">
                                            {{ $message }}
                                        </div>
                                        @enderror </div>

                                    <label class="col-md-2 control-label">تأكيد كلمة المرور</label>
                                    <div class="col-md-4">
                                        <input type="password" class="form-control"
                                               name="password_confirmation">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 control-label">الجوال</label>
                                    <div class="col-md-4">
                                        <input type="text" value="{{$user->phone}}"
                                               class="form-control  {{$errors->has('phone') ? ' is-invalid' : null}}"
                                               placeholder="الجوال" name="phone">
                                        @error('phone')
                                        <div class="invalid-feedback" style="color: #ef1010">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label"> نوع العضوية</label>
                                    <div class="col-sm-4">
                                        <select
                                            class="form-control {{$errors->has('membership_type') ? ' is-invalid' : null}}"
                                            name="membership_type">
                                            <option disabled selected>اختر نوع العضوية</option>
                                            <option value="normal" {{$user->membership_type  == 'normal' ? 'selected' : ''}}> عضوية عادية</option>
                                            <option value="volunteer" {{$user->membership_type  == 'volunteer' ? 'selected' : ''}}> متطوع</option>
                                        </select>
                                        @error('membership_type')
                                        <div class="invalid-feedback" style="color: #ef1010">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">تاريخ الميلاد</label>
                                    <div class="col-sm-4">
                                        <input type="date" value="{{$user->birth_date->format('Y-m-d')}}" class="form-control" placeholder="mm/dd/yyyy" name="birth_date">
                                        @error('birth_date')
                                        <div class="invalid-feedback" style="color: #ef1010">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <label class="col-sm-2 control-label"> رقم الهوية </label>
                                    <div class="col-sm-4">
                                        <input type="text" value="{{$user->identity}}"
                                               class="form-control  {{$errors->has('identity') ? ' is-invalid' : null}}"
                                               placeholder="رقم الهوية" name="identity">
                                        @error('identity')
                                        <div class="invalid-feedback" style="color: #ef1010">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
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
