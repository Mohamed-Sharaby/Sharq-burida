@extends('dashboard.layouts.layout')
@section('title','الاعضاء ')

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

                            <a href="{{route('admin.users.create')}}"
                               class="btn btn-purple btn-rounded w-md waves-effect waves-light m-b-5">اضافة عضو
                                جديد</a>
                            <br>
                            <br>

                            <table id="datatable-keytable" class="table table-striped table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>البريد الالكترونى</th>
                                    <th>الجوال</th>
                                    <th>تاريخ الميلاد</th>
                                    <th>رقم الهوية</th>
                                    <th>نوع العضوية</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($users as $index => $user)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->birth_date->format('Y-m-d')}}</td>
                                        <td>{{$user->identity}}</td>
                                        <td>{{$user->membership_type == 'normal' ? 'عضوية عادية' : 'متطوع'}}</td>

                                        <td class="text-center">

                                                <form
                                                    action="{{ route('admin.active', ['id' => $user->id, 'type' => 'User']) }}"
                                                    style="display: inline;"
                                                    method="post">@csrf
                                                    <button type="submit"
                                                            class="btn-icon waves-effect {{ $user->is_active ? 'btn btn-sm btn-success' : 'btn btn-sm btn-warning' }}">{{ $user->is_active ? 'مفعل ' : ' معطل' }}</button>
                                                </form>

                                            <a href="{{url(route('admin.users.edit',$user->id))}}"
                                               class="btn-icon waves-effect btn btn-primary btn-sm ml-2 rounded-circle"><i
                                                    class="fa fa-edit"></i></a>


                                            <button data-url="{{route('admin.users.destroy',$user->id)}}"
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
