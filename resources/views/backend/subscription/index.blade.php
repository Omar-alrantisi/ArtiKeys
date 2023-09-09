@extends('backend.layouts.app')

@section('title', __('Subscriptions Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Subscriptions Management')
        </x-slot>

        <x-slot name="headerActions">
        </x-slot>

        <x-slot name="body">
            <livewire:backend.subscriptions-table />
        </x-slot>
    </x-backend.card>
@endsection
