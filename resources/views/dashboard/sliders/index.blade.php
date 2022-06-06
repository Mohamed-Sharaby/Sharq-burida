@extends('dashboard.layouts.layout')
@section('title','السلايدر   ')

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

                            <a href="{{route('admin.sliders.create')}}"
                               class="btn btn-purple btn-rounded w-md waves-effect waves-light m-b-5">اضافة
                                سلايدر جديد </a>
                            <br>
                            <br>

                            <table id="datatable-keytable" class="table table-striped table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>العنوان</th>
                                    <th>المحتوى</th>
                                    <th>الصورة</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($sliders as $index => $slider)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$slider->title}}</td>
                                        <td>{{$slider->body}}</td>
                                        <td>
                                            @if($slider->image)
                                                <a data-fancybox="gallery" href="{{$slider->image}}">
                                                    <img src="{{$slider->image}}" width="70" height="70"
                                                         class="img-thumbnail" alt="profile_img">
                                                </a>
                                            @else {{__('No Image')}} @endif
                                        </td>


                                        <td class="text-center">
                                            <form
                                                action="{{ route('admin.active', ['id' => $slider->id, 'type' => 'Slider']) }}"
                                                style="display: inline;"
                                                method="post">@csrf
                                                <button type="submit"
                                                        class="btn-icon waves-effect {{ $slider->is_active ? 'btn btn-sm btn-success' : 'btn btn-sm btn-warning' }}">{{ $slider->is_active ? 'مفعل ' : ' معطل' }}</button>
                                            </form>

                                            <a href="{{url(route('admin.sliders.edit',$slider->id))}}"
                                               class="btn-icon waves-effect btn btn-primary btn-sm ml-2 rounded-circle"><i
                                                    class="fa fa-edit"></i></a>


                                            <button data-url="{{route('admin.sliders.destroy',$slider->id)}}"
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
