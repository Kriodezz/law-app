@if($application->status == \App\Models\Application::STATUS_WORK && auth()->user()->id == $application->client)
    <form action="{{ route('application.complete', $application->id) }}" method="post">
        @csrf
        @method('patch')
        <input type="hidden" name="status" value="3">
        <button class="btn btn-success mb-3" type="submit">Проблема решена</button>
    </form>
@elseif($application->status == \App\Models\Application::STATUS_COMPLETE && empty($application->comment))
    <form method="post" action="{{ route('application.update.comment', $application->id) }}">
        @csrf
        @method('patch')
        <fieldset>
            <div class="form-group mb-3">
                <label for="comment" class="form-label mt-4">Ответ</label>
                <textarea name="comment"
                          class="form-control"
                          id="comment"
                          rows="3"
                          placeholder="Оставьте комментарий"
                ></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-3 mt-3">Отправить</button>
        </fieldset>
    </form>
@endif
