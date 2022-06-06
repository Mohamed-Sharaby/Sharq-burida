@extends('site.layouts.layout')
@section('title','جمعية شرق بريدة')
@section('content')

<!-----------------------------------Start-Header-Section----------------------------------->
<div class="header">
    <img src="{{getImgPath(@\App\Models\Setting::whereType('file')->where('name','quran_mainpage')->first()->value)}}">

    <!--   {{-- <p>قَالُوا نَعْبُد إلَهك وَإِلَه آبَائِك </p>--}}
    {{-- <p>إِبْرَاهِيمَ وَإِسْمَاعِيلَ وَإِسْحَاقَ إِلَهًا وَاحِدًا وَنَحْنُ لَهُ مُسْلِمُونَ</p>--}}-->
    <!-- <p>{!! @\App\Models\Setting::whereType('long_text')->where('name','quran_mainpage')->first()->value !!}</p>-->
    <!--<a href=".slider" class="main-btn  down">ابــدأ</a>-->
</div>
<!-----------------------------------End-Header-Section----------------------------------->


<!---------------------------------------Start-Slider-Section--------------------------------------->
<!-- Swiper -->
<section class="slider">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach(\App\Models\Slider::active()->latest()->get() as $slider)
            <div class="swiper-slide">
                <img src="{{$slider->image}}">
                <div class="slide-captions">
                    <h4 class="title">{{$slider->title}}</h4>
                    <p class="desc"> {{$slider->body}}</p>
                    <!-- <button class="main-btn">شــارك</button>-->
                </div>
            </div>
            @endforeach
        </div>
        <!-- Slide captions -->

        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</section>
<!-----------------------------------End-Slider-Section----------------------------------->
<!-----------------------------------Start-our-work-Section----------------------------------->
<section class="main-section">
    <div class="our-work ">
        <div class="container" id="counter">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128.302 121.654">
                    <g transform="translate(0 0)">
                        <path class="a" d="M307.724,152.053a1.149,1.149,0,0,0,1.27-1.009c1.554-13.544,8.008-16.219,8.123-16.265a1.147,1.147,0,0,0-.788-2.154c-.321.116-7.876,3.012-9.614,18.157A1.147,1.147,0,0,0,307.724,152.053Z" transform="translate(-223.947 -100.114)" />
                        <path class="a" d="M127.155,131.679H115.893l-3.4-54.064a1.174,1.174,0,0,0-.029-.176l4.055-1.485a4.708,4.708,0,0,0,2.851-6.017l-.8-2.237a4.717,4.717,0,0,0-2.712-2.795,4.7,4.7,0,0,0-4.341-4.213c-.827-4.713-2.5-11.124-5.8-14.852a13.721,13.721,0,0,0,6.311-3.352,13.875,13.875,0,0,0,4.148-12.617l2.95-5.88a2.838,2.838,0,0,0-1.263-3.8l-15.085-7.566a2.833,2.833,0,0,0-3.8,1.262l-3.3,6.583a13.786,13.786,0,0,0-4.028,20.307C89.208,41.851,79.9,47.208,78.754,66.406c-.9,15.073-2.821,58.175-3.136,65.274H60.931L57.941,84.2c0-.019-.007-.038-.009-.057l3.463-1.268A4.282,4.282,0,0,0,63.987,77.4l-.7-1.969a4.292,4.292,0,0,0-2.389-2.511,4.273,4.273,0,0,0-3.764-3.732c-.687-4.072-2.112-9.539-5.018-12.883a12.214,12.214,0,0,0,5.379-2.925,12.353,12.353,0,0,0,3.7-11.188l2.576-5.136A2.636,2.636,0,0,0,62.6,33.521L49.315,26.86a2.631,2.631,0,0,0-3.534,1.172l-2.889,5.759A12.271,12.271,0,0,0,39.24,51.715c-1.677.787-6.107,3.481-8.922,10.839a19.2,19.2,0,0,0-3.37-6.251,12.213,12.213,0,0,0,5.379-2.925,12.353,12.353,0,0,0,3.7-11.188L38.6,37.055a2.636,2.636,0,0,0-1.173-3.534L24.151,26.86a2.631,2.631,0,0,0-3.534,1.172l-2.889,5.759a12.271,12.271,0,0,0-3.653,17.922C11.69,52.828,3.79,57.746,2.8,74.328,1.941,88.737.02,132.234,0,132.672a.439.439,0,0,0,.006.081c0,.024-.007.048-.007.073a1.147,1.147,0,0,0,1.147,1.147H127.155a1.147,1.147,0,1,0,0-2.294Zm-9.95-60.972a2.414,2.414,0,0,1-1.471,3.089L101.8,78.9a2.411,2.411,0,0,1-3.086-1.461l-.01-.028L90.381,55.865a2.4,2.4,0,0,1,.42-2.338l4.562,10.9a1.148,1.148,0,0,0,1.148.7,1.175,1.175,0,0,0,.353-.086,1.148,1.148,0,0,0,.615-1.5l-4.647-11.1,1.251-.447a2.413,2.413,0,0,1,3.086,1.461l.014.037L103.5,69.423a1.147,1.147,0,0,0,1.461.654l8.36-3.067a2.412,2.412,0,0,1,3.086,1.461Zm-4.344-7.049a2.4,2.4,0,0,1,.6.967,4.8,4.8,0,0,0-.925.227l-.417.153c-.057-.536-.134-1.187-.235-1.927A2.406,2.406,0,0,1,112.861,63.659ZM101.507,14.612a.534.534,0,0,1,.242.058l15.085,7.566a.542.542,0,0,1,.241.726L114.45,28.2,98.1,20.732l.657-1.308,5.217,2.507a1.147,1.147,0,0,0,.994-2.067l-5.182-2.49,1.235-2.462A.539.539,0,0,1,101.507,14.612Zm-6.746,9.363a11.559,11.559,0,0,1,1.85-1.4l17.349,7.921a11.508,11.508,0,1,1-19.2-6.518ZM81.043,66.542c.625-10.479,3.838-16.4,6.423-19.526a15.066,15.066,0,0,1,5.766-4.5,13.774,13.774,0,0,0,9.385,3.675l.125,0c5.506,4.021,6.891,16.249,7.172,19.629l-4.694,1.722-5.9-14.875a4.7,4.7,0,0,0-6.01-2.83l-2.236.8a4.707,4.707,0,0,0-2.85,6.018l.01.027,8.321,21.549a4.7,4.7,0,0,0,6.021,2.832l7.653-2.8,3.047,48.4h-13.8a1.147,1.147,0,1,0,0,2.294h13.945l.172,2.73H89.858l.226-15.36a1.148,1.148,0,0,0-1.13-1.164h-.017a1.147,1.147,0,0,0-1.147,1.13l-.227,15.393H83.884l.929-28.515a1.147,1.147,0,1,0-2.293-.075l-.931,28.59H77.913C78.242,124.286,80.149,81.53,81.043,66.542ZM61.827,78.169a1.988,1.988,0,0,1-1.213,2.545L48.345,85.208A1.985,1.985,0,0,1,45.8,84l-.01-.028L38.469,65.009a1.976,1.976,0,0,1,.08-1.508,2.014,2.014,0,0,1,.175-.3l3.726,9.278a1.147,1.147,0,0,0,2.128-.855L40.75,62.1l.895-.32a1.985,1.985,0,0,1,2.542,1.2l.014.037,5.56,14.026a1.147,1.147,0,0,0,1.461.654l5.529-2.029a1.128,1.128,0,0,0,.468-.172l1.362-.5a1.986,1.986,0,0,1,2.542,1.2Zm-3.791-6.154a1.977,1.977,0,0,1,.441.644,4.375,4.375,0,0,0-.675.181l-.178.065c-.036-.372-.081-.8-.138-1.272A2.015,2.015,0,0,1,58.036,72.016Zm-9.9-43.142a.336.336,0,0,1,.151.037l13.281,6.661a.34.34,0,0,1,.151.455l-2.252,4.489L45.325,34.059l.454-.9L50.25,35.3a1.147,1.147,0,1,0,.994-2.067L46.807,31.1l1.025-2.042A.337.337,0,0,1,48.135,28.873Zm-5.846,8.206A10.054,10.054,0,0,1,43.832,35.9l15.144,6.915a10,10,0,1,1-16.687-5.734Zm-10.823,29.4c2.569-9.808,8.355-12.569,9.386-12.988a12.266,12.266,0,0,0,8.26,3.185l.068,0c4.716,3.494,5.947,13.959,6.211,17.051l-3.909,1.434L46.34,62.188a4.279,4.279,0,0,0-5.466-2.572l-1.968.7a4.282,4.282,0,0,0-2.592,5.473l.01.028,7.326,18.971a4.279,4.279,0,0,0,5.476,2.574l6.566-2.4,2.662,42.284h-12a1.147,1.147,0,1,0,0,2.294H58.5l.135,2.142H35.766L32.781,84.134,36.23,82.87A4.282,4.282,0,0,0,38.822,77.4l-.7-1.97a4.291,4.291,0,0,0-2.4-2.514,4.254,4.254,0,0,0-1.458-2.6,4.884,4.884,0,0,0-2.3-1.108c-.141-.841-.314-1.742-.525-2.672C31.451,66.518,31.461,66.5,31.466,66.478ZM13.384,63.5a2,2,0,0,1,.3-.461l3.46,9.263a1.147,1.147,0,1,0,2.148-.8l-3.535-9.467.72-.257a1.986,1.986,0,0,1,2.542,1.2l.014.037L24.6,77.043a1.147,1.147,0,0,0,1.461.654l5.529-2.029a1.129,1.129,0,0,0,.468-.172l1.362-.5a1.986,1.986,0,0,1,2.542,1.2l.7,1.97a1.988,1.988,0,0,1-1.213,2.545L23.18,85.208A1.985,1.985,0,0,1,20.639,84l-.01-.028L13.3,65.009A1.978,1.978,0,0,1,13.384,63.5Zm18.951,8.253a2.576,2.576,0,0,1,.428.3,2.286,2.286,0,0,1,.5.618,4.368,4.368,0,0,0-.629.171l-.178.065C32.426,72.564,32.386,72.179,32.335,71.753Zm-9.364-42.88a.336.336,0,0,1,.151.037L36.4,35.571a.34.34,0,0,1,.151.455L34.3,40.516,20.159,34.058l.454-.9L25.085,35.3a1.147,1.147,0,0,0,.994-2.067L21.642,31.1l1.025-2.042A.338.338,0,0,1,22.971,28.873Zm-5.846,8.206A10.043,10.043,0,0,1,18.668,35.9l15.144,6.915a10,10,0,1,1-16.687-5.734ZM5.09,74.464c.547-9.175,3.352-14.36,5.609-17.1a14.121,14.121,0,0,1,4.993-3.874,12.264,12.264,0,0,0,8.255,3.18l.068,0c4.716,3.494,5.947,13.959,6.211,17.051l-3.909,1.434-5.142-12.97a4.279,4.279,0,0,0-5.466-2.572l-1.968.7a4.282,4.282,0,0,0-2.592,5.473l.01.028,7.326,18.971a4.279,4.279,0,0,0,5.476,2.574l6.573-2.408,2.655,42.287H21.184a1.147,1.147,0,1,0,0,2.294h12.15l.134,2.142H12.853l.2-13.4a1.147,1.147,0,1,0-2.294-.034l-.2,13.43H7.6L8.41,106.7A1.147,1.147,0,0,0,7.3,105.519H7.263a1.147,1.147,0,0,0-1.145,1.109L5.3,131.679H2.341C2.646,124.813,4.309,87.573,5.09,74.464Z" transform="translate(0 -12.319)"></path>
                    </g>
                </svg>
                <span class="count percent" data-count="{{@\App\Models\Setting::whereType('number')->where('name','beneficial')->first()->value}}"></span>
                <span>مستفيدًا</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 123.445 123.445">
                    <g transform="translate(0.25 0.25)">
                        <path class="a" d="M121.144,257.422h-7.418v-28.1a1.8,1.8,0,1,0-3.6,0v28.1h-15.8V195.532h15.8v25.389a1.8,1.8,0,1,0,3.6,0v-27.19a1.8,1.8,0,0,0-1.8-1.8h-19.4a1.8,1.8,0,0,0-1.8,1.8v63.691H86.56V203.434a1.8,1.8,0,0,0-1.8-1.8H65.354a1.8,1.8,0,0,0-1.8,1.8v53.989h-4.16V217.988a1.8,1.8,0,0,0-1.8-1.8H38.186a1.8,1.8,0,0,0-1.8,1.8v39.435h-4.16V229.631a1.8,1.8,0,0,0-1.8-1.8H11.018a1.8,1.8,0,0,0-1.8,1.8v27.791H1.8a1.8,1.8,0,0,0-1.8,1.8v7.763a1.8,1.8,0,0,0,1.8,1.8h19.45a1.8,1.8,0,1,0,0-3.6H3.6v-4.161H119.343v4.161H29.656a1.8,1.8,0,1,0,0,3.6h91.489a1.8,1.8,0,0,0,1.8-1.8v-7.763a1.8,1.8,0,0,0-1.8-1.8Zm-53.99-52.188h15.8v52.188h-15.8ZM39.987,219.789h15.8v37.634h-15.8ZM12.819,231.432h15.8v25.99h-15.8Z" transform="translate(0 -145.842)" />
                        <path class="a" d="M39.181,65.7H66.589a5.7,5.7,0,0,0,4.19-1.842L93.1,39.5h15.208a5.645,5.645,0,0,0,4.018-1.663L130.768,19.4v5.689a1.8,1.8,0,0,0,1.8,1.8h7.761a1.8,1.8,0,0,0,1.8-1.8V5.681A5.688,5.688,0,0,0,136.45,0h-19.4a1.8,1.8,0,0,0-1.8,1.8V9.564a1.8,1.8,0,0,0,1.8,1.8h5.687L105.959,28.138H90.6a5.693,5.693,0,0,0-4.187,1.842L64.09,54.336H59.124a1.8,1.8,0,0,0,0,3.6h5.758a1.8,1.8,0,0,0,1.327-.584l22.863-24.94A2.083,2.083,0,0,1,90.6,31.74h16.1a1.8,1.8,0,0,0,1.273-.528l20.375-20.375a1.8,1.8,0,0,0-1.273-3.074h-8.234V3.6h17.6a2.082,2.082,0,0,1,2.079,2.08V23.288H134.37V15.051a1.8,1.8,0,0,0-3.074-1.273L109.783,35.291a2.067,2.067,0,0,1-1.471.608h-16a1.8,1.8,0,0,0-1.328.584l-22.86,24.94a2.085,2.085,0,0,1-1.534.674H40.982V57.938h9.737a1.8,1.8,0,1,0,0-3.6H39.181a1.8,1.8,0,0,0-1.8,1.8V63.9a1.8,1.8,0,0,0,1.8,1.8Z" transform="translate(-28.404 0)" />
                    </g>
                </svg>
                <span class="count percent" data-count="{{@\App\Models\Setting::whereType('number')->where('name','activities')->first()->value}}"></span>
                <span>نشاطًا </span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 102.864 114.307">
                    <g transform="translate(0.25 0.25)">
                        <path class="a" d="M107.2,56.138h7.973a3.273,3.273,0,0,0,3.269-3.269V44.9a3.273,3.273,0,0,0-3.269-3.269H107.2a3.273,3.273,0,0,0-3.269,3.269v7.973A3.273,3.273,0,0,0,107.2,56.138Zm.08-11.163H115.1V52.79h-7.814Zm-.08,32.372h7.973a3.273,3.273,0,0,0,3.269-3.269V66.105a3.273,3.273,0,0,0-3.269-3.269H107.2a3.273,3.273,0,0,0-3.269,3.269v7.973A3.273,3.273,0,0,0,107.2,77.348Zm.08-11.163H115.1V74h-7.814ZM84.449,56.138h7.973a3.273,3.273,0,0,0,3.269-3.269V44.9a3.273,3.273,0,0,0-3.269-3.269H84.449A3.273,3.273,0,0,0,81.18,44.9v7.973A3.273,3.273,0,0,0,84.449,56.138Zm.08-11.163h7.814V52.79H84.529ZM46.916,83.051H38.942a3.273,3.273,0,0,0-3.269,3.269v7.973a3.273,3.273,0,0,0,3.269,3.269h7.973a3.273,3.273,0,0,0,3.269-3.269V86.32A3.273,3.273,0,0,0,46.916,83.051Zm-.08,11.163H39.022V86.4h7.814Zm.08-52.587H38.942A3.273,3.273,0,0,0,35.673,44.9v7.973a3.273,3.273,0,0,0,3.269,3.269h7.973a3.273,3.273,0,0,0,3.269-3.269V44.9A3.273,3.273,0,0,0,46.916,41.627Zm-.08,11.163H39.022V44.976h7.814ZM84.449,76.85h7.973a3.273,3.273,0,0,0,3.269-3.269V65.608a3.273,3.273,0,0,0-3.269-3.269H84.449a3.273,3.273,0,0,0-3.269,3.269v7.973A3.273,3.273,0,0,0,84.449,76.85Zm.08-11.163h7.814V73.5H84.529ZM120.108,7.652h-7.159V5.092A5.1,5.1,0,0,0,107.857,0h-.769A5.1,5.1,0,0,0,102,5.092v2.56H52.121V5.092A5.1,5.1,0,0,0,47.03,0h-.769a5.1,5.1,0,0,0-5.092,5.092v2.56H34.01a8.393,8.393,0,0,0-8.383,8.383v89.9A8.381,8.381,0,0,0,34,114.307h86.12a8.381,8.381,0,0,0,8.372-8.372v-89.9a8.393,8.393,0,0,0-8.384-8.383Zm-14.762-2.56a1.745,1.745,0,0,1,1.743-1.743h.769A1.745,1.745,0,0,1,109.6,5.092v2.56h-4.255Zm-60.827,0a1.745,1.745,0,0,1,1.743-1.743h.769a1.745,1.745,0,0,1,1.743,1.743v2.56H44.518V5.092Zm80.624,100.843a5.029,5.029,0,0,1-5.023,5.023H34a5.029,5.029,0,0,1-5.023-5.023v-.01a8.34,8.34,0,0,0,5.035,1.685H101.9a8.328,8.328,0,0,0,5.928-2.456l17.316-17.316Zm-19.025-3.809a7.161,7.161,0,0,0,.2-1.688V89.261a3.827,3.827,0,0,1,3.823-3.822H121.32a7.162,7.162,0,0,0,1.688-.2ZM125.142,31.58H53.8a1.674,1.674,0,0,0,0,3.349h71.347V78.267a3.827,3.827,0,0,1-3.823,3.823H110.143a7.18,7.18,0,0,0-7.171,7.171v11.177a3.827,3.827,0,0,1-3.822,3.823H34.01a5.04,5.04,0,0,1-5.034-5.035v-64.3H47.1a1.674,1.674,0,1,0,0-3.349H28.976V16.035A5.04,5.04,0,0,1,34.01,11h7.159v4.923a5.1,5.1,0,0,0,5.092,5.092,1.674,1.674,0,0,0,0-3.349,1.745,1.745,0,0,1-1.743-1.743V11H102v4.923a5.1,5.1,0,0,0,5.092,5.092,1.674,1.674,0,1,0,0-3.349,1.745,1.745,0,0,1-1.743-1.743V11h14.763a5.04,5.04,0,0,1,5.034,5.034ZM46.916,62.339H38.942a3.273,3.273,0,0,0-3.269,3.269v7.973a3.273,3.273,0,0,0,3.269,3.269h7.973a3.273,3.273,0,0,0,3.269-3.269V65.608a3.273,3.273,0,0,0-3.269-3.269ZM46.836,73.5H39.022V65.688h7.814ZM61.7,56.138h7.973a3.273,3.273,0,0,0,3.269-3.269V44.9a3.273,3.273,0,0,0-3.269-3.269H61.7A3.273,3.273,0,0,0,58.427,44.9v7.973A3.273,3.273,0,0,0,61.7,56.138Zm.08-11.163h7.814V52.79H61.775ZM84.527,94.214a1.674,1.674,0,0,0-3.347.08,3.273,3.273,0,0,0,3.269,3.269h7.973a3.273,3.273,0,0,0,3.269-3.269V86.32a3.273,3.273,0,0,0-3.269-3.269H84.449A3.273,3.273,0,0,0,81.18,86.32v2.3a1.674,1.674,0,0,0,3.349,0V86.4h7.814v7.814ZM61.7,76.85h7.973a3.273,3.273,0,0,0,3.269-3.269V65.608a3.273,3.273,0,0,0-3.269-3.269H61.7a3.273,3.273,0,0,0-3.269,3.269v7.973A3.273,3.273,0,0,0,61.7,76.85Zm.08-11.163h7.814V73.5H61.775ZM61.7,97.563h7.973a3.273,3.273,0,0,0,3.269-3.269V86.32a3.273,3.273,0,0,0-3.269-3.269H61.7a3.273,3.273,0,0,0-3.269,3.269v7.973A3.273,3.273,0,0,0,61.7,97.563Zm.08-11.163h7.814v7.814H61.775Z" transform="translate(-25.627)" />
                    </g>
                </svg>
                <span class="count percent" data-count="{{@\App\Models\Setting::whereType('number')->where('name','years')->first()->value}}"></span>
                <span>عامًا في الميدان الدعوي</span>

            </div>
        </div>
    </div>
</section>
<!-----------------------------------End-our-work-Section----------------------------------->
<!-----------------------------------Start-Goal-Section----------------------------------->
<section class="slider">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach(\App\Models\SecondSlider::active()->latest()->get() as $slider)
            <div class="swiper-slide">
                <img src="{{$slider->image}}">
                <div class="slide-captions">
                    <h4 class="title">{{$slider->title}}</h4>
                    <p class="desc"> {{$slider->body}}</p>
                    <!-- <button class="main-btn">عرض</button>-->
                </div>
            </div>
            @endforeach
        </div>
        <!-- Slide captions -->

        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</section>
<!--
<div class="goal-section">
<img src="{{getImgPath(@\App\Models\Setting::whereType('file')->where('name','association_role_image')->first()->value)}}">
    <div>
        <h3>دور الجمعية في تحقيق رؤية الممكلة 2030</h3>
        <p>{{@\App\Models\Setting::whereType('long_text')->where('name','homepage_text')->first()->value}}</p>
        <a class="main-btn" href="{{route('site.roles')}}">عرض</a>

    </div>
</div>
-->
<!-----------------------------------End-Goal-Section----------------------------------->

<!-----------------------------------Start-rate-Section----------------------------------->
<section class="main-section">
    <div class=" rate-section  ">
        <div onclick="location.href='ideas';">
            <img src="{{asset('website/img/assets/rate1.svg')}}">
            <h5 class="card-title">مقترحاتك</h5>
        </div>
        <div onclick="location.href='rating';">
            <img src="{{asset('website/img/assets/rate2.svg')}}">
            <h5 class="card-title">تقيممك</h5>
        </div>
        <div onclick="location.href='achievement';">
            <img src="{{asset('website/img/assets/rate3.svg')}}">
            <h5 class="card-title">التقارير</h5>
        </div>
    </div>
</section>
<!-----------------------------------End-rate-Section----------------------------------->

@endsection
