@extends('frontend.includes.main')
@section('body')
    @section('home')
        active
    @endsection
    <div class="container">
        <h1 style="color: #002FC2;">{{$terms->title}}</h1>
        <p>{{$terms->description??""}}</p>
    </div>


@endsection
