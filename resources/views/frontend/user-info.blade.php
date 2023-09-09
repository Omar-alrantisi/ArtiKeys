@extends('frontend.includes.main')
@section('body')
    @section('home')
        active
    @endsection
    <div class="container">
        <h4 class=" mt-5">Welcome! {{$users->email}} </h4>
            <h5>Almost <span>Done</span></h5>
            <form action="{{route('frontend.frontSubscription.subscribe.store')}}" method="POST" class="user-info-form" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    @include('includes.partials.messages')
                    <h5 class="step-name"><span class="step-name-part-1 mx-3">step <span>3</span>/3</span>Identification Information</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="country_id" class="form-label">Nationality  <span>*</span></label>
                            <select id="country_id" name="country_id" class="form-control" required>
                                <option selected disabled>Select..</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="dob" class="form-label">Date Of Birth  <span>*</span></label>
                            <input value="{{old('dob')}}" type="date" name="dob" id="dob" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <label for="first_name_en" class="form-label">Name in English  <span>*</span></label>
                        <div class="col-md-3">
                            <input  value="{{old('first_name_en')}}" name="first_name_en" id="first_name_en" type="text" class="form-control mt-3" placeholder="First Name" required>
                        </div>
                        <div class="col-md-3">

                            <input  value="{{old('second_name_en')}}" name="second_name_en" value="{{old('second_name_en')}}" id="second_name_en" type="text" class="form-control  mt-3" placeholder="Second Name" required>

                        </div>
                        <div class="col-md-3">

                            <input  value="{{old('third_name_en')}}" name="third_name_en" id="third_name_en" type="text" class="form-control  mt-3" placeholder="Third Name" required>

                        </div>
                        <div class="col-md-3">

                            <input  value="{{old('last_name_en')}}" name="last_name_en" id="last_name_en" type="text" class="form-control  mt-3" placeholder="Last Name" required>

                        </div>
                        <p>The name must be the same as written in the Id Card/Document, and in case it is accepted, we will certify it with the graduation certificate</p>
                    </div>
                    <div class="row">
                        <label for="InputEmail1" class="form-label">Name in Arabic  <span>*</span></label>
                        <div class="col-md-3">

                            <input  value="{{old('first_name_ar')}}" name="first_name_ar" id="first_name_ar" type="text" class="form-control  mt-3" placeholder="First Name" required>

                        </div>
                        <div class="col-md-3">

                            <input  value="{{old('second_name_ar')}}" name="second_name_ar" id="second_name_ar" type="text" class="form-control  mt-3" placeholder="Second Name" required>

                        </div>
                        <div class="col-md-3">

                            <input  value="{{old('third_name_ar')}}" name="third_name_ar" id="third_name_ar" type="text" class="form-control  mt-3" placeholder="Third Name" required>

                        </div>
                        <div class="col-md-3">

                            <input  value="{{old('last_name_ar')}}" name="last_name_ar" id="last_name_ar" type="text" class="form-control  mt-3" placeholder="Last Name" required>

                        </div>
                        <p>The name must be the same as written in the Id Card/Document, and in case it is accepted, we will certify it with the graduation certificate</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="gender" class="form-label">Gender  <span>*</span></label>
                            <select name="gender" id="gender" class="form-control">
                                <option selected disabled>Select..</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="marital_status" class="form-label">Marital Status<span>*</span></label>
                            <select id="marital_status" name="marital_status" class="form-control" required>
                                <option selected disabled>Select..</option>
                                <option value="1">Married </option>
                                <option value="2">Single</option>

                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="personal_image" class="form-label">Upload Your personal Image<span>*</span></label>
                            <input id="personal_image" name="personal_image" type="file" class="form-control" required>
                            <p>(.jpg,.jpeg,.png)**Make sure image size less then 2MB</p>

                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="identification_card" class="form-label">Upload image for your identification card (front side)<span>*</span></label>
                            <input id="identification_card" name="identification_card" type="file" class="form-control" required>
                            <p>(.jpg,.jpeg,.png)**Make sure image size less then 2MB</p>

                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="vaccination_certificate" class="form-label">Upload the vaccination certificate<span>*</span></label>
                            <input id="vaccination_certificate" name="vaccination_certificate" type="file" class="form-control" required>
                            <p>(.jpg,.jpeg,.png)**Make sure image size less then 2MB</p>

                        </div>
                    </div>
                    <button id="signup_btn " type="submit" class="btn btn1 btn-primary btn-sm w-25 mt-5">Save & continue</button>
            </form>
    </div>
@endsection
