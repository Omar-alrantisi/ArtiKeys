@extends('frontend.includes.main')
@section('body')
    @section('home')
        active
    @endsection
    <div class="container user-info-section">
        <br /><br />
        <ul class="list-unstyled multi-steps">
            <li>Sign Up</li>
            <li >Email Confirmation</li>
            <li>Mobile Confirmation</li>
            <li class="is-active">Identification Information</li>
        </ul>
        <form action="{{ route('frontend.frontSubscription.subscribe.store') }}" method="POST" class="user-info-form mt-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                @include('includes.partials.messages')
                <!-- Nationality -->

                <div class="mb-3 row">
                    <div class="col-md-6">
                    <label for="country_id" class="form-label">Nationality <span>*</span></label>
                    <select id="country_id" name="country_id" class="form-select" required>
                        <option disabled>Select..</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                        @endforeach
{{--                        <option value="other" {{ old('country_id') == 'other' ? 'selected' : '' }}>Other</option>--}}
                    </select>
                    <input type="text" id="other_country" name="country_name" class="form-control mt-2" placeholder="Enter your country" {{ old('country_id') == 'other' ? 'required' : 'style=display:none' }}>
                </div>
                <!-- Date of Birth -->
                <div class="mb-3 col-md-6">
                    <label for="dob" class="form-label">Date Of Birth <span>*</span></label>
                    <input value="{{ old('dob') }}" type="date" name="dob" id="dob" class="form-control" required>
                    <span id="ageValidationMessage" class="text-danger"></span>
                </div>
                </div>
                <!-- Name in English -->
                <div class="row mb-3">
                    <label class="form-label">Name in English <span>*</span></label>
                    <div class="col-md-3">
                        <input value="{{ old('first_name_en') }}" name="first_name_en" id="first_name_en" type="text" class="form-control mb-2" placeholder="First Name" required>
                    </div>
                    <div class="col-md-3">
                        <input value="{{ old('second_name_en') }}" name="second_name_en" id="second_name_en" type="text" class="form-control mb-2" placeholder="Second Name" required>
                    </div>
                    <div class="col-md-3">
                        <input value="{{ old('third_name_en') }}" name="third_name_en" id="third_name_en" type="text" class="form-control mb-2" placeholder="Third Name" required>
                    </div>
                    <div class="col-md-3">
                        <input value="{{ old('last_name_en') }}" name="last_name_en" id="last_name_en" type="text" class="form-control mb-2" placeholder="Last Name" required>
                    </div>
                    <p class="col-md-12"> Please ensure that the name provided matches the one on your official ID or document, as it will be verified and certified on your graduation certificate.
                    </p>
                </div>
                <!-- Name in Arabic -->
                <div class="row mb-3">
                    <label class="form-label">Name in Arabic <span>*</span></label>
                    <div class="col-md-3">
                        <input value="{{ old('first_name_ar') }}" name="first_name_ar" id="first_name_ar" type="text" class="form-control mb-2" placeholder="First Name" required>
                    </div>
                    <div class="col-md-3">
                        <input value="{{ old('second_name_ar') }}" name="second_name_ar" id="second_name_ar" type="text" class="form-control mb-2" placeholder="Second Name" required>
                    </div>
                    <div class="col-md-3">
                        <input value="{{ old('third_name_ar') }}" name="third_name_ar" id="third_name_ar" type="text" class="form-control mb-2" placeholder="Third Name" required>
                    </div>
                    <div class="col-md-3">
                        <input value="{{ old('last_name_ar') }}" name="last_name_ar" id="last_name_ar" type="text" class="form-control mb-2" placeholder="Last Name" required>
                    </div>
                    <p class="col-md-12"> Please ensure that the name provided matches the one on your official ID or document, as it will be verified and certified on your graduation certificate.
                    </p>
                </div>
                <!-- Gender and Marital Status -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="gender" class="form-label">Gender <span>*</span></label>
                        <select name="gender" id="gender" class="form-select" required>
                            <option selected disabled>Select..</option>
                            <option {{ old('gender') == 1 ? 'selected' : '' }} value="1">Male</option>
                            <option {{ old('gender') == 2 ? 'selected' : '' }} value="2">Female</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="marital_status" class="form-label">Marital Status <span>*</span></label>
                        <select id="marital_status" name="marital_status" class="form-select" required>
                            <option selected disabled>Select..</option>
                            <option {{ old('marital_status') == 1 ? 'selected' : '' }} value="1">Married</option>
                            <option {{ old('marital_status') == 2 ? 'selected' : '' }} value="2">Single</option>
                            <option {{ old('marital_status') == 3 ? 'selected' : '' }} value="3">Divorced</option>
                            <option {{ old('marital_status') == 4 ? 'selected' : '' }} value="4">Widowed</option>
                        </select>
                    </div>
                </div>
                <!-- Personal Image Upload -->
                <div class="mb-3">
                    <label for="personal_image" class="form-label">Upload Your Personal Image <span>*</span></label>
                    <input id="personal_image" name="personal_image" type="file" class="form-control" required accept="image/*">
                    <p> Image formats must be in .jpg, .jpeg, or .png, and please ensure the file size is below 2MB.
                    </p>
                </div>
                <!-- Save & Continue Button -->
                <button id="signup_btn" type="submit" class="btn btn-primary btn-lg w-100 mt-4">
                    <i class="fas fa-save"></i> Save & Continue
                </button>
            </div>
        </form>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Initially hide the text input field
        $('#other_country').hide();

        // When the select value changes
        $('#country_id').change(function() {
            if ($(this).val() === 'other') {
                // If "Other" is selected, show the text input field and make it required
                $('#other_country').show().prop('required', true);
            } else {
                // If any other option is selected, hide the text input field and remove the required attribute
                $('#other_country').hide().prop('required', false);
            }
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        var dobInput = document.getElementById('dob');
        var ageValidationMessage = document.getElementById('ageValidationMessage');
        var submitButton = document.getElementById('signup_btn');
        dobInput.addEventListener('change', function() {
            var selectedDate = new Date(this.value);
            var currentDate = new Date();
            var age = currentDate.getFullYear() - selectedDate.getFullYear();

            // Check if the selected date is more than 18 years ago
            if (age < 18) {
                ageValidationMessage.textContent = 'You must be at least 18 years old.';
                this.setCustomValidity('You must be at least 18 years old.');
                submitButton.disabled = true; // Disable the submit button
            } else {
                ageValidationMessage.textContent = '';
                this.setCustomValidity('');
                submitButton.disabled = false; // Enable the submit button
            }
        });
    });
    // Function to check if a string contains only Arabic letters
    function isArabic(text) {
        var arabicPattern = /[\u0600-\u06FF\s]/; // Arabic Unicode range

        return arabicPattern.test(text);
    }
    // Add event listeners to each name input field
    var nameInputFields = document.querySelectorAll('input[name^="first_name_ar"], input[name^="second_name_ar"], input[name^="third_name_ar"], input[name^="last_name_ar"]');
    nameInputFields.forEach(function(inputField) {
        inputField.addEventListener('input', function() {
            var inputValue = this.value;
            var isValid = isArabic(inputValue);

            if (!isValid) {
                this.setCustomValidity('Please enter Arabic letters only.');
            } else {
                this.setCustomValidity('');
            }
        });
    });
</script>
