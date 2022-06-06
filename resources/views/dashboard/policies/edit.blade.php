@extends('dashboard.layouts.layout')
@section('title',' تعديل لائحة ')

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
                            <h4 class="header-title m-t-0 m-b-30"> تعديل لائحة</h4>

                            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data"
                                  action="{{route('admin.policies.update',$policy->id)}}">
                                @csrf
                                {{method_field('put')}}

                                <div class="form-group row">
                                    <label class="col-md-2 control-label"> الاسم</label>
                                    <div class="col-md-4">
                                        <input name="name" placeholder="الاسم  " value="{{ $policy->name }} "
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
                                        @error('files')
                                        <div class="invalid-feedback" style="color: #ef1010">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class=" row">
                                    <p class="msg alert alert-success  text-center" style="display: none;margin-bottom: 10px;">
                                        تم حذف الملف بنجاح
                                    </p>
                                    @if(count($policy->files) > 0)
                                        @foreach($policy->files as $file)
                                            <div class="row file{{$file->id}}">

                                                <div class="col-12 col-md-3 text-right">
                                                    <a href="{{asset('storage/'.$file->file)}}">
                                                        <p>{{str_replace('uploads/','',$file->file)}}</p>
                                                    </a>
                                                </div>
                                                <div class="col-12 col-md-3 text-left">
                                                    <a class="btn btn-icon btn-danger del_file btn-sm"
                                                       data-id="{{$file->id}}">
                                                        <i class="fa fa-trash text-white"></i></a>
                                                </div>
                                            </div>
                                            <br>
                                        @endforeach
                                    @else لا يوجد ملفات @endif
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
@push('my-js')
    <script>
        $(document).on('click', '.del_file', function (e) {
            let confirmResult = confirm('هل أنت متأكد من حذف هذا الملف ؟');
            if (confirmResult) {
                var id = $(this).data('id');
                $.ajax({
                    type: 'delete',
                    url: "/dashboard/file/" + id,
                    data: {
                        '_token': '{{csrf_token()}}',
                        'id': id,
                    },
                    success: function (data) {
                        $('.msg').css('display', 'block');
                        $('.file' + data.id).remove();
                    }
                });
            } else {
                e.preventDefault();
            }
        });
    </script>
@endpush
