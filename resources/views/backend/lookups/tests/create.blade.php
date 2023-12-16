@extends('backend.layouts.app')

@section('title', __('Create Question'))

@section('content')
    <x-forms.post :action="route('admin.lookups.tests.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Question')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.lookups.tests.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="question" class="col-md-2 col-form-label">@lang('Question')</label>

                    <div class="col-md-10">
                        <input name="question" id="question" value="{{ old('question') }}" class="form-control" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="category" class="col-md-2 col-form-label">@lang('Category')</label>

                    <div class="col-md-10">
                        <select name="category" id="category" class="form-control" required>
                            @foreach(\App\Enums\QuestionCategory::toArray() as $label => $value)
                                <option value="{{ $value }}" {{ old('category') === $value ? 'selected' : '' }}>
                                    @lang($label)
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="first_choice" class="col-md-2 col-form-label">@lang('First Choice')</label>

                    <div class="col-md-10">
                        <input name="first_choice" id="first_choice" value="{{ old('first_choice') }}" class="form-control" required />
                    </div>
                </div><!--form-group-->

                <!--form-group-->

                <div class="form-group row">
                    <label for="second_choice" class="col-md-2 col-form-label">@lang('Second Choice')</label>

                    <div class="col-md-10">
                        <input name="second_choice" id="second_choice" value="{{ old('second_choice') }}" class="form-control" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="third_choice" class="col-md-2 col-form-label">@lang('Third Choice')</label>

                    <div class="col-md-10">
                        <input name="third_choice" id="third_choice" value="{{ old('third_choice') }}" class="form-control" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="fourth_choice" class="col-md-2 col-form-label">@lang('Fourth Choice')</label>

                    <div class="col-md-10">
                        <input name="fourth_choice" id="fourth_choice" value="{{ old('fourth_choice') }}" class="form-control" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="correct_answer" class="col-md-2 col-form-label">@lang('Correct Answer')</label>

                    <div class="col-md-10">
                        <select name="correct_answer" id="correct_answer" class="form-control" required>
                            @foreach(['first_choice', 'second_choice', 'third_choice', 'fourth_choice'] as $answer)
                                <option value="{{ $answer }}" {{ old('correct_answer') === $answer ? 'selected' : '' }}>
                                    @lang(ucwords(str_replace('_', ' ', $answer)))
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="weight" class="col-md-2 col-form-label">@lang('Weight')</label>

                    <div class="col-md-10">
                        <input name="weight" id="weight" value="{{ old('weight') }}" class="form-control" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="status" class="col-md-2 col-form-label">@lang('Status')</label>

                    <div class="col-md-10">
                        <select name="status" id="status" class="form-control" required>
                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>@lang('Active')</option>
                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>@lang('Inactive')</option>
                        </select>
                    </div>
                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Question')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
