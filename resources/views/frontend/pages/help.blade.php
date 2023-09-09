@extends('frontend.includes.main')
@section('body')
    @section('home')
        active
    @endsection
    <div class="container">
        <h1 style="color: #002FC2;">{{$help->title??""}}</h1>
       <p>{{$help->description??""}}</p>
    </div>


@endsection
