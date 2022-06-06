@extends('site.layouts.layout')
@section('title','مقترحاتك')
@section('content')

    <!-----------------------------------Start-Ideas-Background----------------------------------->
    <div class="before-background"></div>
    <div class="ideas-background ">
        <span>مقتــرحاتك</span>
    </div>
    <!-----------------------------------End-Ideas-Background----------------------------------->

    <!-----------------------------------Start-Ideas-Section----------------------------------->
    <div class="ideas">
        <h3>مقتــرحاتك</h3>


        <div class="contact-form">
            <form id="contact" method="post">
                @csrf
                <div class="questionnaire">
                    {{--/////////////////////////////////////////////////////////--}}
                    <div class="msg text-center" style="display: none;">
                        <div class="alert alert-success alert-dismissable text-center " role="alert">
                            <p class="m-0 text-center">تم ارسال مقترحك بنجاح</p>
                        </div>
                    </div>
                    <p class="error1 text-center" style="margin-right: 100px;margin-left: 100px;"></p>
                    {{--/////////////////////////////////////////////////////////--}}

                    <div class="choices">
                        <h4 style="margin: 15px 50px 15px;">نــــوع الرسـالة</h4>
                        <p>
                            <input type="radio" id="idea" name="type" value="idea">
                            <label for="idea">فكرة</label>
                        </p>
                        <p>
                            <input type="radio" id="complaint" name="type" value="complaint">
                            <label for="complaint">شكوى</label>
                        </p>

                    </div>
                </div>

                <fieldset>
                    <input placeholder="الاسم" type="text" tabindex="1" autofocus name="name" value="{{old('name')}}">
                </fieldset>
                <fieldset>
                    <input placeholder="الجـوال" type="tel" tabindex="2" name="phone" value="{{old('phone')}}">
                </fieldset>
                <fieldset>
                    <input placeholder="المديـــنة" type="text" tabindex="3" name="city" value="{{old('city')}}">
                </fieldset>
                <fieldset>
                    <textarea placeholder="الرســالة...." tabindex="4" name="message">{{old('message')}}</textarea>
                </fieldset>
                <fieldset>
                    <button name="submit" type="submit" id="send_btn" class="main-btn" data-submit="...Sending">إرســـال</button>
                </fieldset>

            </form>
        </div>
    </div>

    <!-----------------------------------End-Ideas-Section----------------------------------->
@endsection
@push('my-js')
    <script>
        $('#send_btn').on('click', function (e) {
            e.preventDefault();
            var formData = new FormData($('#contact')[0]);

            $.ajax({
                type: 'POST',
                url: "/post-idea",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if (data.status === true) {
                        $('.msg').removeAttr('style');
                        $('.error1').css('display', 'none');
                        $('#contact')[0].reset();
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
