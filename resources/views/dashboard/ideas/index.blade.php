@extends('dashboard.layouts.layout')
@section('title','المقترحات  ')

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

                            <table id="datatable-keytable" class="table table-striped table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>النوع</th>
                                    <th>الاسم</th>
                                    <th>الجوال</th>
                                    <th>المدينة</th>
                                    <th>محتوى الرسالة </th>
                                    <th>تاريخ الرسالة </th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($ideas as $index => $idea)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{__($idea->type)}}</td>
                                        <td>{{$idea->name}}</td>
                                        <td>{{$idea->phone}}</td>
                                        <td>{{$idea->city}}</td>
                                        <td>

                                            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                                    data-target="#item{{$idea->id}}">عرض الرسالة
                                            </button>
                                            <!--  Modal content for the above example -->
                                            <div class="modal fade bs-example-modal-lg" id="item{{$idea->id}}"
                                                 tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                                 aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×
                                                            </button>
                                                            <h4 class="modal-title" id="myLargeModalLabel">
                                                                الرسالة</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                {{$idea->message}}
                                                            </div>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->

                                        </td>
                                        <td>{{$idea->created_at->format('Y-m-d')}}</td>

                                        <td class="text-center">
                                            <button data-url="{{route('admin.ideas.destroy',$idea->id)}}"
                                                    class="btn-icon waves-effect btn btn-danger rounded-circle btn-sm ml-2 delete" title="Delete">
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
