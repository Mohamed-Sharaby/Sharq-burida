@extends('dashboard.layouts.layout')
@section('title','المركز الاعلامى ')

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

                            <a href="{{route('admin.media.create')}}"
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
                                @foreach($media as $index => $m)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$m->name}}</td>
                                                                                <td>
                                                                                    @if($m->image)
                                                                                        <a data-fancybox="gallery" href="{{$m->image}}">
                                                                                            <img src="{{$m->image}}" width="70" height="70"
                                                                                                 class="img-thumbnail" alt="profile_img">
                                                                                        </a>
                                                                                    @else {{__('No Image')}} @endif
                                                                                </td>


                                        <td class="text-center">
                                            <form
                                                action="{{ route('admin.active', ['id' => $m->id, 'type' => 'Media']) }}"
                                                style="display: inline;"
                                                method="post">@csrf
                                                <button type="submit"
                                                        class="btn-icon waves-effect {{ $m->is_active ? 'btn btn-sm btn-success' : 'btn btn-sm btn-warning' }}">{{ $m->is_active ? 'مفعل ' : ' معطل' }}</button>
                                            </form>

                                            <a href="{{url(route('admin.media.edit',$m->id))}}"
                                               class="btn-icon waves-effect btn btn-primary btn-sm ml-2 rounded-circle"><i
                                                    class="fa fa-edit"></i></a>


                                            <button data-url="{{route('admin.media.destroy',$m->id)}}"
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
