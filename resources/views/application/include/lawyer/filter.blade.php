<div class="row mb-3">
    <legend>Фильтр</legend>
    <form action="{{ route('application.index') }}">
        <fieldset class="d-flex">
            <select class="form-select me-2" name="category_id">
                <option value="">Все категории</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            <input class="form-control me-sm-2" type="search" name="created_at_from" placeholder="Дата добавления: с">
            <input class="form-control me-sm-2" type="search" name="created_at_to" placeholder="Дата добавления: до">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Найти</button>
            @error('created_at_from')
            <div>{{$message}}</div>
            @enderror
        </fieldset>
    </form>
</div>
