@extends('backend.layouts.app')
@section('title', __('Sliders Management'))
@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Sliders Management')
        </x-slot>
        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.slider.create')"
                    :text="__('Create Slider')"
                />
            </x-slot>
        @endif
        <x-slot name="body">
            <livewire:backend.sliders-table />
        </x-slot>
    </x-backend.card>
@endsection
