@extends('layouts.main')
@section('content')
    <div class="container">
        <a href="{{ route('application.index') }}">
            <button class="btn btn-primary mb-3">Назад</button>
        </a>
        <form method="post" action="{{ route('application.update', $application->id) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <fieldset>
                <legend>Изменение заявки</legend>

                <div class="form-group">
                    <label for="title" class="form-label mt-4">Заголовок</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           id="title"
                           placeholder="Укажите краткое описание"
                           value="{{ old('title') ?? $application->title}}">
                    @error('title')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="text" class="form-label mt-4">Содержание</label>
                    <textarea name="text"
                              class="form-control"
                              id="text"
                              rows="3"
                              placeholder="Введите текст"
                    >{{ old('text') ?? $application->text}}</textarea>
                    @error('text')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image" class="form-label mt-4">Изображение</label>
                    @if($imageExists)
                    <div class="w-50">
                        <img class="w-50 mb-2" src="{{ Storage::url($application->image) }}" alt="image">
                    </div>
                    @endif
                    <input name="image"
                           type="file"
                           class="form-control"
                           id="image"
                           placeholder="Вставьте изображение"
                    >
                    @error('image')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category" class="form-label mt-4">Выберите категорию</label>
                    <select name="category_id" class="form-select" id="category">
                        @foreach($categories as $category)
                            <option {{ old('category_id') ?? $application->category->id == $category->id ? 'selected' : '' }}
                                    value="{{ $category->id }}"
                            >{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-3 mt-3">Сохранить</button>
            </fieldset>
        </form>
    </div>
@endsection
