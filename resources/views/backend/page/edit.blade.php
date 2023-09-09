@inject('model', '\App\Domains\Page\Models\Page')

@extends('backend.layouts.app')

@section('title', __('Update Page'))

@section('content')
    <x-forms.post :action="route('admin.page.update', $page)" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PATCH" />
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Page')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.page.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <input type="hidden" name="id" value="{{$page->id}}" />

                <div class="form-group row">
                    <label for="title" class="col-md-2 col-form-label">@lang('Title')</label>

                    <div class="col-md-10">
                        <input name="title" id="title" class="form-control" value="{{ old('title') ?? $page->title }}" required/>
                    </div>
                </div><!--form-group-->



                <div class="form-group row">
                    <label for="description" class="col-md-2 col-form-label">@lang('Description')</label>

                    <div class="col-md-10">
                        <textarea name="description" id="description" class="form-control" required>
                            {{ old('description') ?? $page->description }}
                        </textarea>
                    </div>
                </div><!--form-group-->

            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Page')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
