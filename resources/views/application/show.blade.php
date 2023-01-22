@extends('layouts.main')
@section('content')
    <div class="container">
        <a href="{{ route('application.index') }}">
            <button class="btn btn-primary mb-3">К списку</button>
        </a>

        @include('application.include.lawyer.status')
        @if($application->status == \App\Models\Application::STATUS_COMPLETE)
            <span class="badge bg-success">Заявка рассмотрена</span>
        @endif

        <div class="row mb-3">
            <h1>{{ $application->title }}</h1>
        </div>
        <div class="row mb-3">
            {{ $application->text }}
        </div>
        @if($imageExists)
            <div class="row">
                <img class="w-25 mb-2" src="{{ Storage::url($application->image) }}" alt="image">
            </div>
        @endif

        @if(auth()->user()->role == \App\Models\User::ROLE_CLIENT
            && auth()->user()->id == $application->client
            && empty($application->answer))
            <a href="{{ route('application.edit', $application->id) }}">
                <button class="btn btn-warning mb-3">Редактировать</button>
            </a>
            <form action="{{ route('application.destroy', $application->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger mb-3">Удалить заявку</button>
            </form>
        @elseif(auth()->user()->role == \App\Models\User::ROLE_LAWYER)
            @include('application.include.lawyer.action')
        @endif
        @if(!empty($application->answer))
            <div class="row mt-3 text-danger">
                <h3>Ответ юриста</h3>
            </div>
            <div class="row mb-3">
                {{ $application->answer }}
            </div>
            @if(auth()->user()->role == \App\Models\User::ROLE_CLIENT)
                @include('application.include.client.action')
            @endif
            @if(!empty($application->comment))
                <div class="row mt-3 text-info">
                    <h3>Отзыв клиента</h3>
                </div>
                <div class="row mb-3">
                    {{ $application->comment }}
                </div>
            @endif
        @endif
    </div>
@endsection
