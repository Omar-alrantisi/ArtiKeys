<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{appName()}} | @yield('sub-title',"Register")</title>
    <link rel="stylesheet" href="{{asset("assets/style/style.css")}}">
    <link rel="stylesheet" href="{{asset("assets/style/bootstrap-5.0.2-dist/css/bootstrap.css")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container mt-5">
        @if($errors->has('error'))
            <div id="validationAlert" class="alert alert-danger d-none" role="alert">
                Please answer all (30) questions before moving to the next step.
            </div>
        @endif

        <div id="validationAlert" class="alert alert-danger d-none" role="alert">
            Please answer all (30) questions before moving to the next step.
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="{{ route('frontend.frontSubscription.englishTest.exam.submit') }}" method="post" id="examForm">
                    @csrf
                    @foreach($shuffledQuestions->chunk(10) as $step => $questionsChunk)
                        <div class="card mb-4 @if($step > 0) d-none @endif" id="step{{ $step }}">
                            <div class="card-body w-100">
                                @foreach($questionsChunk as $index => $question)
                                    <p class="card-text">{{ $index + 1  . ". " . $question->question }}?</p>
                                    <div class="d-grid  d-md-flex justify-content-md-around   align-items-center min-w-100">
                                        @foreach(['first_choice', 'second_choice', 'third_choice', 'fourth_choice'] as $choice)
                                            @if ($loop->index % 2 == 0)
                                                <div class="row mb-5">
                                                    @endif
                                                    <div class="col-md-12 ">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="question_ids[{{ $question->id }}]" id="{{ $question->id }}_{{ $choice }}" value="{{ $choice }}" required>
                                                            <label class="form-check-label" for="{{ $question->id }}_{{ $choice }}">
                                                                {{ $question->{$choice} }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                    @if ($loop->index % 2 != 0 || $loop->last)
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <hr/>

                                @endforeach
                                @if ($step > 0)
                                    <button type="button" class="btn btn-primary prev-step" data-step="{{ $step }}">Previous</button>
                                @endif
                                @if ($step < $shuffledQuestions->chunk(10)->count() - 1)
                                    <button type="button" class="btn btn-primary next-step" data-step="{{ $step }}" id="nextBtn">Next</button>
                                @else
                                    <button type="submit" class="btn btn-primary btn-block" id="submitBtn">Submit Exam</button>
                                @endif

                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let step = 0;
            const steps = document.querySelectorAll('.card');
            const nextButtons = document.querySelectorAll('.next-step');
            const prevButtons = document.querySelectorAll('.prev-step');
            const submitBtn = document.getElementById('submitBtn');

            nextButtons.forEach(button => {
                button.addEventListener('click', function () {
                    if (validateStep(step)) {
                        steps[step].classList.add('d-none');
                        step = parseInt(this.getAttribute('data-step')) + 1;
                        steps[step].classList.remove('d-none');
                    }
                });
            });

            prevButtons.forEach(button => {
                button.addEventListener('click', function () {
                    steps[step].classList.add('d-none');
                    step = parseInt(this.getAttribute('data-step')) - 1;
                    steps[step].classList.remove('d-none');
                });
            });

            function validateStep(step) {
                const currentStep = steps[step];
                const radioInputs = currentStep.querySelectorAll('input[type="radio"]');
                let isValid = false;

                radioInputs.forEach(input => {
                    if (input.checked) {
                        isValid = true;
                    }
                });

                if (!isValid) {
                    showValidationAlert();
                } else {
                    hideValidationAlert();
                }

                return isValid;
            }

            function showValidationAlert() {
                const alertContainer = document.getElementById('validationAlert');
                alertContainer.classList.remove('d-none');
            }

            function hideValidationAlert() {
                const alertContainer = document.getElementById('validationAlert');
                alertContainer.classList.add('d-none');
            }
        });
    </script>
</body>
</html>
