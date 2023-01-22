@extends('layouts.main')
@section('content')
    <div class="container">
        @if(auth()->user()->role == \App\Models\User::ROLE_LAWYER)
            @include('application.include.lawyer.filter')
        @endif
        @foreach($applications as $application)
            <div class="card border-primary mb-3" style="width: 100%;">
                <div class="card-header">{{ $application->category->title }}</div>
                <div class="card-body">
                    <a class="card-text" href="{{ route('application.show', $application->id) }}">{{ $application->title }}</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
