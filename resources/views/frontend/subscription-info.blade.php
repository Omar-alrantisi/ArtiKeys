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
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->education_level=='bachelor') selected @endif  @endif value='bachelor'>Bachelor</option>
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
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->educational_status=="graduated") selected @endif  @endif value='graduated'>Graduate</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->educational_status=="under_graduate") selected @endif  @endif value='under_graduate'>Under Graduate</option>
                                    </select>
                                </div>

                                <!-- Educational Background -->
                                <div class="mb-3">
                                    <label for="education_background" class="form-label">Educational Background <span>*</span></label>
                                    <select @if(isset($users->subscriptionInfo))  @endif id="education_background"
                                            name="education_background" class="form-control" required>
                                        <option selected >Select..</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->education_background=="it_background") selected @endif  @endif value='it_background'>IT background</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->education_background=="non_it_background") selected @endif  @endif value='non_it_background'>Non IT background</option>
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
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->english_specking=="poor") selected @endif  @endif value='poor'>Poor</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->english_specking=="good") selected @endif  @endif value='good'>Good</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->english_specking=="very_good") selected @endif  @endif value='very_good'>Very good</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->english_specking=="fluent") selected @endif  @endif value='fluent'>Fluent</option>
                                    </select>
                                </div>
                            </section>

                            <!-- Section: Contact Information -->
                            <section>
                                <h2 class="section-title"><i class="fas fa-address-card"></i> Contact Information</h2>

                                <!-- Current City -->
                                <div class="mb-3">
                                    <label for="city_id" class="form-label">Current City <span>*</span></label>
                                    <select @if(isset($users->subscriptionInfo))  @endif id="city_id" name="city_id"
                                            class="form-control" required>
                                        <option selected >Select..</option>
                                        <option @if(isset($users->subscriptionInfo)) selected @endif value='1'>Amman</option>
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
                                        <option @if(isset($users->subscriptionInfo))  @if($users->subscriptionInfo->hear_about=='media') selected @endif  @endif value='media'>Media</option>
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
                                        <option selected >Select..</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_1=="father") selected @endif  @endif value='father'>Father</option>
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
                                        <option selected >Select..</option>
                                        <option @if(isset($users->subscriptionInfo)) @if($users->subscriptionInfo->r_r_2=="father") selected @endif  @endif value='father'>Father</option>
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
