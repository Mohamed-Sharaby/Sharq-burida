@extends('dashboard.layouts.layout')
@section('title','  دور الجمعية ')

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

                            <a href="{{route('admin.site-roles.create')}}"
                               class="btn btn-purple btn-rounded w-md waves-effect waves-light m-b-5">اضافة
                                جديد </a>
                            <br>
                            <br>

                            <table id="datatable-keytable" class="table table-striped table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>الصورة</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($roles as $index => $role)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>
                                            @if($role->image)
                                                <a data-fancybox="gallery" href="{{$role->image}}">
                                                    <img src="{{$role->image}}" width="70" height="70"
                                                         class="img-thumbnail" alt="donate_img">
                                                </a>
                                            @else {{__('No Image')}} @endif
                                        </td>


                                        <td class="text-center">
                                            <form
                                                action="{{ route('admin.active', ['id' => $role->id, 'type' => 'SiteRole']) }}"
                                                style="display: inline;"
                                                method="post">@csrf
                                                <button type="submit"
                                                        class="btn-icon waves-effect {{ $role->is_active ? 'btn btn-sm btn-success' : 'btn btn-sm btn-warning' }}">{{ $role->is_active ? 'مفعل ' : ' معطل' }}</button>
                                            </form>

                                            <a href="{{url(route('admin.site-roles.edit',$role->id))}}"
                                               class="btn-icon waves-effect btn btn-primary btn-sm ml-2 rounded-circle"><i
                                                    class="fa fa-edit"></i></a>


                                            <button data-url="{{route('admin.site-roles.destroy',$role->id)}}"
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
