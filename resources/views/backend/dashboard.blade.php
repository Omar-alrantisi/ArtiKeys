@php

        $ratings = \App\Domains\Subscription\Models\SubscriberRating::select('user_id', 'mark_test_1', 'mark_test_2', 'mark_test_3')
            ->with('user')
            ->get();

        $ratings->each(function ($rating) {
            $rating->average_mark = ($rating->mark_test_1 + $rating->mark_test_2 + $rating->mark_test_3) / 3;
        });

        $sortedRatings = $ratings->sortByDesc('average_mark');


@endphp
@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' => $logged_in_user->name])
        </x-slot>

        <x-slot name="body">
            <table class="table">
                <thead>
                <tr>
                    <th>User</th>
                    <th>Mark Test 1</th>
                    <th>Mark Test 2</th>
                    <th>Mark Test 3</th>
                    <th>Average Mark</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($sortedRatings as $rating)
                    <tr>
                        <td>{{ $rating->user->subscription->name_en??"" }}</td>
                        <td>{{ $rating->mark_test_1 }}</td>
                        <td>{{ $rating->mark_test_2 }}</td>
                        <td>{{ $rating->mark_test_3 }}</td>
                        <td>{{ $rating->average_mark }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-backend.card>



@endsection
