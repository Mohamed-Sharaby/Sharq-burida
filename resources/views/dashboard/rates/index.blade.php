@extends('dashboard.layouts.layout')
@section('title','التقييمات  ')

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
                                    <th>   مدى رضاك عن البرامج المقدمة</th>
                                    <th>مدى رضاك عن مقدم الخدمة</th>
                                    <th>مدى سهولة استخدام الموقع</th>
                                    <th> انطباعك حول الجمعية</th>
                                    <th>التاريخ</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($rates as $index => $rate)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{__($rate->programs)}}</td>
                                        <td>{{__($rate->provider)}}</td>
                                        <td>{{__($rate->site)}}</td>
                                        <td>
@if($rate->notes)
                                            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                                    data-target="#item{{$rate->id}}">عرض
                                            </button>
                                            <!--  Modal content for the above example -->
                                            <div class="modal fade bs-example-modal-lg" id="item{{$rate->id}}"
                                                 tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                                 aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">

                                                        <div class="modal-body">
                                                            <div class="row">
                                                                {{$rate->notes}}
                                                            </div>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                            @else
                                            لا يوجد
                                            @endif
                                        </td>
                                        <td>{{$rate->created_at->format('Y-m-d')}}</td>

                                        <td class="text-center">
                                            <button data-url="{{route('admin.rates.destroy',$rate->id)}}"
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
