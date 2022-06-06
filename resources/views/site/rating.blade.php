@extends('site.layouts.layout')
@section('title','تقييمك  ')
@section('content')

    <!-----------------------------------Start-Rating-Background----------------------------------->
    <div class="before-background"></div>
    <div class="rating-background ">
        <span>تقييمك</span>
    </div>
    <!-----------------------------------End-Rating-Background----------------------------------->

    <!-----------------------------------Start-Rating-questionnaire-Section----------------------------------->
    <div class="rating">
        <h3>اســتبيان</h3>
        <form class="questionnaire" id="survey_form" method="post">
            @csrf

            {{--/////////////////////////////////////////////////////////--}}
            <div class="msg text-center" style="display: none;">
                <div class="alert alert-success alert-dismissable text-center " role="alert">
                    <p class="m-0 text-center">تم ارسال تقييمك بنجاح</p>
                </div>
            </div>
            <p class="error1 text-center" style="margin-right: 100px;margin-left: 100px;"></p>
            {{--/////////////////////////////////////////////////////////--}}

            <div class="title">
                <h4>مدى رضاك عن البرامج المقدمة</h4>
            </div>
            <div class="choices">
                <p>
                    <input type="radio" id="test1" name="programs" value="excellent">
                    <label for="test1">ممتاز</label>
                </p>
                <p>
                    <input type="radio" id="test2" name="programs" value="good">
                    <label for="test2">جيد</label>
                </p>
                <p>
                    <input type="radio" id="test3" name="programs" value="no">
                    <label for="test3">غير راضي</label>
                </p>
            </div>
{{--        </form>--}}
{{--        <form class="questionnaire">--}}
            <div class="title">
                <h4>مدى رضاك عن مقدم الخدمة</h4>
            </div>
            <div class="choices">
                <p>
                    <input type="radio" id="test4" name="provider" value="excellent">
                    <label for="test4">ممتاز</label>
                </p>
                <p>
                    <input type="radio" id="test5" name="provider" value="good">
                    <label for="test5">جيد</label>
                </p>
                <p>
                    <input type="radio" id="test6" name="provider" value="no">
                    <label for="test6">غير راضي</label>
                </p>
            </div>
{{--        </form>--}}
{{--        <form class="questionnaire">--}}
            <div class="title">
                <h4>مدى سهولة استخدام الموقع</h4>
            </div>
            <div class="choices">
                <p>
                    <input type="radio" id="test7" name="site" value="excellent">
                    <label for="test7">ممتاز</label>
                </p>
                <p>
                    <input type="radio" id="test8" name="site" value="good">
                    <label for="test8">جيد</label>
                </p>
                <p>
                    <input type="radio" id="test9" name="site" value="no">
                    <label for="test9">غير راضي</label>
                </p>
            </div>
        </form>
        <div class="send-message">
                <h4>سجل انطباعك حول الجمعية</h4>
                <div class="message-form">
                    <input type="text" name="notes" value="{{old('notes')}}">
                    <button type="submit" id="send_btn" class="main-btn">إرســـال</button>
                </div>
            </div>
    </div>
    <!-----------------------------------End-Rating-questionnaire-Section------------------------------------>
@endsection
@push('my-js')
    <script>
        $('#send_btn').on('click', function (e) {
            e.preventDefault();
            var formData = new FormData($('#survey_form')[0]);

            $.ajax({
                type: 'POST',
                url: "/post-rate",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if (data.status === true) {
                        $('.msg').removeAttr('style');
                        $('.error1').css('display', 'none');
                        $('#survey_form')[0].reset();
                    } else {
                        let errors = $('.error1').addClass('alert alert-danger');
                        errors.empty()
                        errors.append(data.errors)
                    }
                },
                error(error) {
                    console.log('error', error);
                }

            });
        });

    </script>
@endpush
