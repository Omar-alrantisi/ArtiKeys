@extends('backend.layouts.app')

@section('title', __('Pages Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Pages Management')
        </x-slot>
        <x-slot name="body">
            <livewire:backend.pages-table />
        </x-slot>
    </x-backend.card>
@endsection
