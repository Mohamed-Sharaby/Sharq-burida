@extends('site.layouts.layout')
@section('title',' التقارير')
@section('content')


<!-----------------------------------Start-achievement-Background----------------------------------->
<div class="before-background"></div>
<div class="achievement-background ">
    <span>التقارير </span>
</div>
<!-----------------------------------End-achievement-Background----------------------------------->

<!-----------------------------------Start-achievement-dropdown-section------------------------------->
<section class="dropdown-section">
    @foreach($achievements as $achievement)
    <div class="dropdown">
        <div class="dropdown-title">{{$achievement->name}} </div>
        <div class="dropdown-content">
            @foreach($achievement->files as $file)
            <a class="item" href="{{asset('storage/'.$file->file)}}" target="_blank">
                <div class="item-title"> {{str_replace('uploads/','',$file->file)}} </div>
                <div class="item-file"><i class="fas fa-file-pdf"></i></div>
            </a>
            @endforeach
        </div>
    </div>
    @endforeach
</section>
<!-----------------------------------End-achievement-dropdown-section--------------------------------->

@endsection
