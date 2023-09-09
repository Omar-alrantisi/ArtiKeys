@extends('frontend.includes.main')
@section('body')
    @section('home')
        active
    @endsection
    <div class="container">
        <h4 class=" mt-5">Learning By Doing!</h4>
        <h5> Coursat is a series of free apps that allows users to learn a variety of programming languages and concepts through short lessons, code challenges, and quizzes.

        </h5>
        <form action="{{route('frontend.frontSubscription.codeChallenge.store')}}" method="POST" class="user-info-form" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                @include('includes.partials.messages')
                <div class="row">
                    <h3 class="mb-5">Submit Your Score</h3>
                    <div class="col-md-12 mt-3">
                        <label for="html_certificate" class="form-label">Screen Shot for your HTML certificate<span>*</span></label>
                        <input @if($users->codeChallengeSubmission) disabled @endif type="file" name="html_certificate" id="html_certificate" class="form-control" required>
                        <p>(.jpg,.jpeg,.png)**Make sure image size less then 2MB</p>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="css_certificate" class="form-label">Screen Shot for your CSS certificate<span>*</span></label>
                        <input @if($users->codeChallengeSubmission) disabled @endif type="file" name="css_certificate" id="css_certificate" class="form-control" required>
                        <p>(.jpg,.jpeg,.png)**Make sure image size less then 2MB</p>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="js_certificate" class="form-label">Screen Shot for your Javescript certificate<span>*</span></label>
                        <input @if($users->codeChallengeSubmission) disabled @endif type="file" name="js_certificate" id="js_certificate" class="form-control" required>
                        <p>(.jpg,.jpeg,.png)**Make sure image size less then 2MB</p>
                    </div>
                </div>
                <h1>Code Challenge Section</h1>
                <p>This Section consist of a series of online exercises that you have to complete successfully through Sololearn platform.
                </p>
                <h2>Steps</h2>
                <p>To proceed with your application, please follow the following steps:</p>
                <p><a href="https:coursat.orange.jo">1. Go to https:coursat.orange.jo</a></p>

                <p>2.Sign up / Create an account .</p>
                <p>3.Once you create your profile, go to “the below courses”</p>
                <p>4.Add the following 3 courses (and more if you like!):</p>



            </div>



            <div class="container marketing my-5">

                <!-- Three columns of text below the carousel -->
                <div class="card-deck mt-2 row">
                    <div class="card col-md-4">
                        <a href="https://coursat.orange.jo/course/view.php?id=7">
                            <img src="https://coursat.orange.jo/pluginfile.php/47/course/overviewfiles/Artboard%2011.png" alt="HTML Development" class="card-img-top w-100"></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a class="" href="https://coursat.orange.jo/course/view.php?id=7">HTML Development</a>
                            </h4>
                            <p class="card-text">

                                HTML, in full hypertext markup language,

                                a formatting system for displaying material retrieved over the Internet. ... HTML markup tags specify document elements such as headings, paragraphs, and tables. They mark up a document for display by a computer program known as a Web browser.

                            </p>
                        </div>
                    </div>
                    <div class="card col-md-4" data-courseid="8" data-type="1"><a href="https://coursat.orange.jo/course/view.php?id=8"><img src="https://coursat.orange.jo/pluginfile.php/48/course/overviewfiles/Artboard%2012.png" alt="CSS Development" class="card-img-top w-100"></a>
                        <div class="card-body">
                            <h4 class="card-title"><a class="" href="https://coursat.orange.jo/course/view.php?id=8">CSS
                                    Development</a></h4>
                            <p class="card-text"></p>
                            <div class="no-overflow">
                                Cascading Style Sheets (CSS),

                                Is a style sheet language used for describing the presentation of a document
                                written in a markup language such as HTML.

                            </div>
                            <p></p></div>
                    </div>
                    <div class="card col-md-4" data-courseid="5" data-type="1"><a href="https://coursat.orange.jo/course/view.php?id=5"><img src="https://coursat.orange.jo/pluginfile.php/45/course/overviewfiles/Artboard%2013.png" alt="JavaScript" class="card-img-top w-100"></a>
                        <div class="card-body">
                            <h4 class="card-title"><a class="" href="https://coursat.orange.jo/course/view.php?id=5">JavaScript</a>
                            </h4>
                            <p class="card-text"></p>
                            <div class="no-overflow">

                                JavaScript is a dynamic computer programming language.

                                It is lightweight and most commonly used as a part of web pages, whose
                                implementations allow client-side script to interact with the user and make
                                dynamic pages. It is an interpreted programming language with
                                object-oriented capabilities.

                            </div>
                            <p></p></div>
                    </div>
                </div>
            </div>
            <p>5.Once you have completed the courses, please upload the three certicates
            </p>
            <p>If you have any questions or concerns regarding completing of courses, please contact us on the following email: codingacademy.ojo@orange.com .</p>
            <button  id="signup_btn " type="submit" class="btn btn-primary btn-sm w-25 mt-5 @if($users->codeChallengeSubmission) d-none @endif">Submit</button>
        </form>
    </div>

@endsection
