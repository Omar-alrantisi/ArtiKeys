@inject('model', '\App\Models\Test')

@extends('backend.layouts.app')

@section('title', __('Update Test'))

@section('content')
    <x-forms.post :action="route('admin.lookups.tests.update', $test)">
        <input type="hidden" name="_method" value="PATCH" />
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Test')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.lookups.tests.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <input type="hidden" name="id" value="{{ $test->id }}" />

                <div class="form-group row">
                    <label for="question" class="col-md-2 col-form-label">@lang('Question')</label>

                    <div class="col-md-10">
                        <input name="question" id="question" class="form-control" value="{{ old('question') ?? $test->question }}" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="category" class="col-md-2 col-form-label">@lang('Category')</label>

                    <div class="col-md-10">
                        <select name="category" id="category" class="form-control" required>
                            @foreach(\App\Enums\QuestionCategory::toArray() as $label => $value)
                                <option value="{{ $value }}" {{ old('category', $test->category->value) === $value ? 'selected' : '' }}>
                                    @lang($label)
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="first_choice" class="col-md-2 col-form-label">@lang('First Choice')</label>

                    <div class="col-md-10">
                        <input name="first_choice" id="first_choice" class="form-control" value="{{ old('first_choice') ?? $test->first_choice }}" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="second_choice" class="col-md-2 col-form-label">@lang('Second Choice')</label>

                    <div class="col-md-10">
                        <input name="second_choice" id="second_choice" class="form-control" value="{{ old('second_choice') ?? $test->second_choice }}" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="third_choice" class="col-md-2 col-form-label">@lang('Third Choice')</label>

                    <div class="col-md-10">
                        <input name="third_choice" id="third_choice" class="form-control" value="{{ old('third_choice') ?? $test->third_choice }}" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="fourth_choice" class="col-md-2 col-form-label">@lang('Fourth Choice')</label>

                    <div class="col-md-10">
                        <input name="fourth_choice" id="fourth_choice" class="form-control" value="{{ old('fourth_choice') ?? $test->fourth_choice }}" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="correct_answer" class="col-md-2 col-form-label">@lang('Correct Answer')</label>

                    <div class="col-md-10">
                        <select name="correct_answer" id="correct_answer" class="form-control" required>
                            @foreach(['first_choice', 'second_choice', 'third_choice', 'fourth_choice'] as $answer)
                                <option value="{{ $answer }}" {{ old('correct_answer', $test->correct_answer) === $answer ? 'selected' : '' }}>
                                    @lang(ucwords(str_replace('_', ' ', $answer)))
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="weight" class="col-md-2 col-form-label">@lang('Weight')</label>

                    <div class="col-md-10">
                        <input name="weight" id="weight" class="form-control" value="{{ old('weight') ?? $test->weight }}" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="status" class="col-md-2 col-form-label">@lang('Status')</label>

                    <div class="col-md-10">
                        <select name="status" id="status" class="form-control" required>
                            <option value="1" {{ old('status', $test->status) == 1 ? 'selected' : '' }}>@lang('Active')</option>
                            <option value="0" {{ old('status', $test->status) == 0 ? 'selected' : '' }}>@lang('Inactive')</option>
                        </select>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="created_by_id" class="col-md-2 col-form-label">@lang('Created By')</label>

                    <div class="col-md-10">
                        <input name="created_by_id" id="created_by_id" class="form-control" value="{{ old('created_by_id') ?? $test->created_by_id }}" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="updated_by_id" class="col-md-2 col-form-label">@lang('Updated By')</label>

                    <div class="col-md-10">
                        <input name="updated_by_id" id="updated_by_id" class="form-control" value="{{ old('updated_by_id') ?? $test->updated_by_id }}" required />
                    </div>
                </div><!--form-group-->

            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Test')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
