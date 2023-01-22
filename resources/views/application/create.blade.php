@extends('layouts.main')
@section('content')
    <div class="container">
        <form method="post" action="{{ route('application.store') }}" enctype="multipart/form-data">
            @csrf
            <fieldset>
                <legend>Оставить заявку</legend>

                <div class="form-group">
                    <label for="title" class="form-label mt-4">Заголовок</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           id="title"
                           placeholder="Укажите краткое описание"
                           value="{{ old('title') }}"
                    >
                    @error('title')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="text" class="form-label mt-4">Содержание</label>
                    <textarea name="text"
                              class="form-control"
                              id="text"
                              rows="3"
                              placeholder="Опишите интересующую проблему"
                    >{{ old('text') }}</textarea>
                    @error('text')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="image">Прикрепите фото</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @error('image')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category" class="form-label mt-4">Выберите категорию</label>
                    <select name="category_id" class="form-select" id="category">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mb-3 mt-3">Отправить</button>
            </fieldset>
        </form>
    </div>
@endsection
