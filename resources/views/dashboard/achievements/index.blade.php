@extends('dashboard.layouts.layout')
@section('title','التقارير ')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            @include('dashboard.layouts.status')

                            <a href="{{route('admin.achievements.create')}}"
                               class="btn btn-purple btn-rounded w-md waves-effect waves-light m-b-5">اضافة تقرير
                                جديد </a>
                            <br>
                            <br>

                            <table id="datatable-keytable" class="table table-striped table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>الملف</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($achievements as $index => $achievement)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$achievement->name}}</td>
                                        <td>
                                            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                                    data-target="#item{{$achievement->id}}">عرض الملفات
                                            </button>
                                            <!--  Modal content for the above example -->
                                            <div class="modal fade bs-example-modal-lg" id="item{{$achievement->id}}"
                                                 tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                                 aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×
                                                            </button>
                                                            <h4 class="modal-title" id="myLargeModalLabel">
                                                                الملفات</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                @if(count($achievement->files) > 0)
                                                                    @foreach($achievement->files as $file)
                                                                        <a href="{{asset('storage/'.$file->file)}}" >
                                                                            <p>{{str_replace('uploads/','',$file->file)}}</p>
                                                                        </a>
                                                                        <br>
                                                                    @endforeach
                                                                @else لا يوجد ملفات @endif
                                                            </div>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->

                                        </td>

                                        <td class="text-center">
                                            <form
                                                action="{{ route('admin.active', ['id' => $achievement->id, 'type' => 'Achievement']) }}"
                                                style="display: inline;"
                                                method="post">@csrf
                                                <button type="submit"
                                                        class="btn-icon waves-effect {{ $achievement->is_active ? 'btn btn-sm btn-success' : 'btn btn-sm btn-warning' }}">{{ $achievement->is_active ? 'مفعل ' : ' معطل' }}</button>
                                            </form>

                                            <a href="{{url(route('admin.achievements.edit',$achievement->id))}}"
                                               class="btn-icon waves-effect btn btn-primary btn-sm ml-2 rounded-circle"><i
                                                    class="fa fa-edit"></i></a>


                                            <button data-url="{{route('admin.achievements.destroy',$achievement->id)}}"
                                                    class="btn-icon waves-effect btn btn-danger rounded-circle btn-sm ml-2 delete"
                                                    title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div><!-- end col -->
                </div>
            </div>
        </div><!-- end col -->
    </div>

@endsection
