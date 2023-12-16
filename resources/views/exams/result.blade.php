@php
    use App\Domains\Auth\Models\User;
    use App\Domains\Auth\Models\Exam;
@endphp


@extends('frontend.includes.main')
@section('body')
    @section('home')
        active
    @endsection

    <div class="container mt-5">
        <h4 class=" mt-5">English Test</h4>
        <h5>Learning a language allows people to grow. Once rooted, they can take a step towards others.</h5>
        <div class="row justify-content-center my-5">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">
                        <h1>Your English Test Result</h1>
                    </div>
                    <div class="card-body">
                        <p><strong>E-mail:</strong> {{ $exam->user->email }}</p>
                        <p><strong>Score:</strong> {{ $exam->score }} / {{ $exam->questions->count() }}</p>

                        {{-- Additional Details or Options --}}
                        <div class="mt-4">
                            {{-- Add more details or options here --}}
                        </div>

                        {{-- Example: Go back to home --}}
                        <a href="{{ route('frontend.frontSubscription.confirmation.index') }}" class="btn btn-primary">Go Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




