@extends('frontend.includes.main')
@section('body')
    @section('home')
        active
    @endsection
    <style>
        /* Section Titles */
        .section-title {
            font-size: 24px;
            margin-bottom: 20px;
            color: #002FC2;
        }

    </style>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Personal Information</h2>
                        <form action="{{ route('frontend.frontSubscription.subscribeInfo.store') }}" method="POST"
                              class="user-info-form" enctype="multipart/form-data">
                            @csrf
                            @include('includes.partials.messages')
                            <hr>

                            <!-- Section: Education Information -->
                            <section>
                                <h2 class="section-title"><i class="fas fa-graduation-cap"></i> Education Information</h2>

                                <!-- Educational Level -->
                                <div class="mb-3">
                                    <label for="education_level" class="form-label">Educational Level <span>*</span></label>
                                    <select @if(isset($users->subscriptionInfo))  @endif id="education_level"
                                            name="education_level" class="form-control" required>
                                        <option selected >Select..</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->education_level==='bachelor') selected @endif  @endif value='bachelor'>Bachelor's Degree</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->education_level==='High School (Tawjihi)') selected @endif  @endif value='High School (Tawjihi)'>High School (Tawjihi)</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->education_level==='High Diploma Degree') selected @endif  @endif value='High Diploma Degree'>High Diploma Degree</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->education_level==='Masters Degree') selected @endif  @endif value='Masters Degree'>Master's Degree</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->education_level==='Doctorate/Ph.D') selected @endif  @endif value='Doctorate/Ph.D'>Doctorate/Ph.D</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->education_level==='Vocational/Technical Training') selected @endif  @endif value='Vocational/Technical Training'>Vocational/Technical Training</option>
                                    </select>
                                </div>

                                <!-- Field of Study -->
                                <div class="mb-3">
                                    <label for="field_of_study" class="form-label">Field of Study</label>
                                    <input type="text" @if(isset($users->subscriptionInfo)) value="{{$users->subscriptionInfo->field_of_study??""}}"  @endif name="field_of_study" id="field_of_study" class="form-control">
                                </div>

                                <!-- Educational Status -->
                                <div class="mb-3">
                                    <label for="educational_status" class="form-label">Educational Status <span>*</span></label>
                                    <select @if(isset($users->subscriptionInfo))  @endif id="educational_status"
                                            name="educational_status" class="form-control" required>
                                        <option selected >Select..</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->educational_status==="graduated") selected @endif  @endif value='graduated'>Graduate</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->educational_status==="Currently Enrolled") selected @endif  @endif value='Currently Enrolled'>Currently Enrolled</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->educational_status==="Not Currently Enrolled") selected @endif  @endif value='Not Currently Enrolled'>Not Currently Enrolled</option>
                                    </select>
                                </div>

                                <!-- Educational Background -->
                                <div class="mb-3">
                                    <label for="education_background" class="form-label">Educational Background <span>*</span></label>
                                    <select @if(isset($users->subscriptionInfo))  @endif id="education_background"
                                            name="education_background" class="form-control" required>
                                        <option selected >Select..</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->education_background==="IT/Computing") selected @endif  @endif value='IT/Computing'>IT/Computing</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->education_background==="Engineering") selected @endif  @endif value='Engineering'>Engineering</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->education_background==="Humanities") selected @endif  @endif value='Humanities'>Humanities</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->education_background==="Social Sciences") selected @endif  @endif value='Social Sciences'>Social Sciences</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->education_background==="Business Administration") selected @endif  @endif value='Business Administration'>Business Administration</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->education_background==="Fine Arts") selected @endif  @endif value='Fine Arts'>Fine Arts</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->education_background==="Health Sciences") selected @endif  @endif value='Health Sciences'>Health Sciences</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->education_background==="Natural Sciences") selected @endif  @endif value='Natural Sciences'>Natural Sciences</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->education_background==="Education") selected @endif  @endif value='Education'>Education</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->education_background==="other") selected @endif  @endif value='other'>Other</option>
                                    </select>
                                </div>
                            </section>

                            <!-- Section: Arabic Language Level -->
                            <section>
                                <h2 class="section-title"><i class="fas fa-language"></i> Arabic Language Level</h2>

                                <!-- Arabic Writing Level -->
                                <div class="mb-3">
                                    <label for="arabic_writing" class="form-label">Arabic Writing Level <span>*</span></label>
                                    <select @if(isset($users->subscriptionInfo))  @endif id="arabic_writing"
                                            name="arabic_writing" class="form-control" required>
                                        <option selected >Select..</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->arabic_writing=="poor") selected @endif  @endif value='poor'>Poor</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->arabic_writing=="good") selected @endif  @endif value='good'>Good</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->arabic_writing=="very_good") selected @endif  @endif value='very_good'>Very good</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->arabic_writing=="fluent") selected @endif  @endif value='fluent'>Fluent</option>
                                    </select>
                                </div>

                                <!-- Arabic Speaking Level -->
                                <div class="mb-3">
                                    <label for="arabic_speaking" class="form-label">Arabic Speaking Level <span>*</span></label>
                                    <select @if(isset($users->subscriptionInfo))  @endif id="arabic_speaking"
                                            name="arabic_specking" class="form-control" required>
                                        <option selected >Select..</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->arabic_specking=="poor") selected @endif  @endif value='poor'>Poor</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->arabic_specking=="good") selected @endif  @endif value='good'>Good</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->arabic_specking=="very_good") selected @endif  @endif value='very_good'>Very good</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->arabic_specking=="fluent") selected @endif  @endif value='fluent'>Fluent</option>
                                    </select>
                                </div>
                            </section>

                            <!-- Section: English Language Level -->
                            <section>
                                <h2 class="section-title"><i class="fas fa-language"></i> English Language Level</h2>

                                <!-- English Writing Level -->
                                <div class="mb-3">
                                    <label for="english_writing" class="form-label">English Writing Level <span>*</span></label>
                                    <select @if(isset($users->subscriptionInfo))  @endif id="english_writing"
                                            name="english_writing" class="form-control" required>
                                        <option selected >Select..</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->english_writing=="poor") selected @endif  @endif value='poor'>Poor</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->english_writing=="good") selected @endif  @endif value='good'>Good</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->english_writing=="very_good") selected @endif  @endif value='very_good'>Very good</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->english_writing=="fluent") selected @endif  @endif value='fluent'>Fluent</option>
                                    </select>
                                </div>

                                <!-- English Speaking Level -->
                                <div class="mb-3">
                                    <label for="english_speaking" class="form-label">English Speaking Level <span>*</span></label>
                                    <select @if(isset($users->subscriptionInfo))  @endif id="english_speaking"
                                            name="english_specking" class="form-control" required>
                                        <option selected >Select..</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->english_specking==="poor") selected @endif  @endif value='poor'>Poor</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->english_specking==="good") selected @endif  @endif value='good'>Good</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->english_specking==="very_good") selected @endif  @endif value='very_good'>Very good</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->english_specking==="fluent") selected @endif  @endif value='fluent'>Fluent</option>
                                    </select>
                                </div>
                            </section>

                            <!-- Section: Contact Information -->
                            <section>
                                <h2 class="section-title"><i class="fas fa-address-card"></i> Contact Information</h2>

                                <!-- Current City -->
                                <div class="mb-3">
                                    <label for="city_id" class="form-label">Current City <span>*</span></label>
                                    <select id="city_id" name="city_id" class="form-control" required>
                                        <option value="1" disabled>Select..</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}" {{ (isset($users->subscriptionInfo) && $users->subscriptionInfo->city_id == $city->id) ? 'selected' : '' }}>
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Full Address -->
                                <div class="mb-3">
                                    <label for="full_address" class="form-label">Full Address <span>*</span></label>
                                    <input type="text" @if(isset($users->subscriptionInfo)) value="{{$users->subscriptionInfo->full_address}}"  @endif class="form-control" id="full_address" name="full_address" required>
                                </div>

                                <!-- How You Heard About Us -->
                                <div class="mb-3">
                                    <label for="hear_about" class="form-label">How did you hear about us <span>*</span></label>
                                    <select @if(isset($users->subscriptionInfo))  @endif id="hear_about" name="hear_about"
                                            class="form-control" required>
                                        <option selected >Select..</option>
                                        <option @if(isset($users->subscriptionInfo))  @if($users->subscriptionInfo->hear_about==='Mujaddidun') selected @endif  @endif value='Mujaddidun'>Mujaddidun</option>
                                        <option @if(isset($users->subscriptionInfo))  @if($users->subscriptionInfo->hear_about==='Applied Science Private University') selected @endif  @endif value='Applied Science Private University'>Applied Science Private University</option>
                                        <option @if(isset($users->subscriptionInfo))  @if($users->subscriptionInfo->hear_about==='National Aid Fund') selected @endif  @endif value='National Aid Fund'>National Aid Fund</option>
                                        <option @if(isset($users->subscriptionInfo))  @if($users->subscriptionInfo->hear_about==='Friend or Family Referral') selected @endif  @endif value='Friend or Family Referral'>Friend or Family Referral</option>
                                        <option @if(isset($users->subscriptionInfo))  @if($users->subscriptionInfo->hear_about==='Social Media') selected @endif  @endif value='Social Media'>Social Media</option>
                                    </select>
                                </div>
                            </section>

                            <!-- Section: Relative Contact Information -->
                            <section>
                                <h2 class="section-title"><i class="fas fa-users"></i> Relative Contact Information</h2>

                                <!-- First Relative Full Name -->
                                <div class="mb-3">
                                    <label for="r_f_n_1" class="form-label">First Relative Full Name <span>*</span></label>
                                    <input type="text" @if(isset($users->subscriptionInfo)) value="{{$users->subscriptionInfo->r_f_n_1}}"   @endif class="form-control" id="r_f_n_1" name="r_f_n_1" required>
                                </div>

                                <!-- Select Relation -->
                                <div class="mb-3">
                                    <label for="r_r_1" class="form-label">Select Relation <span>*</span></label>
                                    <select @if(isset($users->subscriptionInfo))   @endif id="r_r_1" name="r_r_1"
                                            class="form-control" required>
                                        <option selected disabled>Select..</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_1==="Father") selected @endif  @endif value="Father">Father</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_1==="Mother") selected @endif  @endif value="Mother">Mother</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_1==="Sibling") selected @endif  @endif value="Sibling">Sibling</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_1==="Spouse") selected @endif  @endif value="Spouse">Spouse</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_1==="Grandparent") selected @endif  @endif value="Grandparent">Grandparent</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_1==="Aunt/Uncle") selected @endif  @endif value="Aunt/Uncle">Aunt/Uncle</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_1==="Cousin") selected @endif  @endif value="Cousin">Cousin</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_1==="Father-in-law") selected @endif  @endif value="Father-in-law">Father-in-law</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_1==="Mother-in-law") selected @endif  @endif value="Mother-in-law">Mother-in-law</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_1==="Friend") selected @endif  @endif value="Friend">Friend</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_1==="Other Relative") selected @endif  @endif value="Other Relative">Other Relative</option>

                                    </select>
                                </div>

                                <!-- Mobile Number -->
                                <div class="mb-3">
                                    <label for="r_m_n_1" class="form-label">Mobile Number <span>*</span></label>
                                    <input type="text" @if(isset($users->subscriptionInfo)) value="{{$users->subscriptionInfo->r_m_n_1}}"   @endif class="form-control" id="r_m_n_1" name="r_m_n_1" required>
                                </div>

                                <!-- Second Relative Full Name -->
                                <div class="mb-3">
                                    <label for="r_f_n_2" class="form-label">Second Relative Full Name <span>*</span></label>
                                    <input type="text" @if(isset($users->subscriptionInfo)) value="{{$users->subscriptionInfo->r_f_n_2}}"   @endif class="form-control" id="r_f_n_2" name="r_f_n_2" required>
                                </div>

                                <!-- Select Relation -->
                                <div class="mb-3">
                                    <label for="r_r_2" class="form-label">Select Relation <span>*</span></label>
                                    <select @if(isset($users->subscriptionInfo))   @endif id="r_r_2" name="r_r_2"
                                            class="form-control" required>
                                        <option selected disabled>Select..</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_2==="Father") selected @endif  @endif value="Father">Father</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_2==="Mother") selected @endif  @endif value="Mother">Mother</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_2==="Sibling") selected @endif  @endif value="Sibling">Sibling</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_2==="Spouse") selected @endif  @endif value="Spouse">Spouse</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_2==="Grandparent") selected @endif  @endif value="Grandparent">Grandparent</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_2==="Aunt/Uncle") selected @endif  @endif value="Aunt/Uncle">Aunt/Uncle</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_2==="Cousin") selected @endif  @endif value="Cousin">Cousin</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_2==="Father-in-law") selected @endif  @endif value="Father-in-law">Father-in-law</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_2==="Mother-in-law") selected @endif  @endif value="Mother-in-law">Mother-in-law</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_2==="Friend") selected @endif  @endif value="Friend">Friend</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_2==="Other Relative") selected @endif  @endif value="Other Relative">Other Relative</option>

                                    </select>
                                </div>

                                <!-- Mobile Number -->
                                <div class="mb-3">
                                    <label for="r_m_n_2" class="form-label">Mobile Number <span>*</span></label>
                                    <input type="text" class="form-control" id="r_m_n_2" name="r_m_n_2" required @if(isset($users->subscriptionInfo)) value="{{$users->subscriptionInfo->r_m_n_2}}"   @endif>
                                </div>
                            </section>

                            <!-- Submit Button -->
                            <div class="text-center mt-4">
                                <a href="{{route('frontend.frontSubscription.confirmation.index')}}">
                                <div class="btn btn1 btn-primary btn-sm w-25 mt-5  d-flex justify-content-center align-items-center">
                                    <i class="fas fa-home"></i>
                                    <strong class="mx-2"> Profile</strong>
                                </div>
                                </a>
                                <button id="signup_btn" type="submit" class="btn btn1 btn-primary btn-sm w-25 mt-2 @if(isset($users->subscriptionInfo)) @endif">
                                    <i class="fas fa-save"></i> Save & Continue
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
