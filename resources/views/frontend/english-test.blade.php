@extends('frontend.includes.main')
@section('body')
    @section('home')
        active
    @endsection
    <div class="container">
        <h4 class=" mt-5">English Test</h4>
        <h5>Learning a language allows people to grow. Once rooted, they can take a step towards others.</h5>
        <form action="{{route('frontend.frontSubscription.englishTest.store')}}" method="POST" class="user-info-form" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                @include('includes.partials.messages')
                <div class="row">
                    <h3 class="mb-5">Submit Your Score</h3>
                    <div class="col-md-12">
                        <label for="level" class="form-label">Your Level<span>*</span></label>
                        <input  type="text" @if($users->userEnglishTest) disabled value="{{$users->userEnglishTest->level}}" @endif name="level" id="level" class="form-control" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="image" class="form-label">Screen Shot for your english test result<span>*</span></label>
                        <input @if($users->userEnglishTest) disabled @endif type="file" name="image" id="image" class="form-control" required>
                        <p>(.jpg,.jpeg,.png)**Make sure image size less then 2MB</p>
                    </div>
                </div>
                <h1>English Test Section</h1>
                <p>This Section consist of online test that you have to complete successfully through Exam English platform.</p>
                <h2>Steps</h2>
                <p>To proceed with your application, please follow the following steps:</p>
                <p><a href="https://www.examenglish.com">1. Go to https://www.examenglish.com</a> <span>* Make sure you are using "Google Chrome Browser"</span></p>

                <p>2.Do your test when you are ready.</p>
                <p>3.After finishing the test, send the result to your email address that used in this application.</p>
                <p>4.Take screen shots for your result that sent to your email address and upload it in this section above (Submit Your Score)</p>

            </div>
            <button id="signup_btn " type="submit" class="btn btn-primary btn-sm w-25 mt-5 @if($users->userEnglishTest) d-none @endif">Submit</button>
        </form>
    </div>
@endsection
