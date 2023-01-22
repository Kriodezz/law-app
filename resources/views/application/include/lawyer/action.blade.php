@if($application->status == \App\Models\Application::STATUS_NEW)
    <form action="{{ route('application.accept', $application->id) }}" method="post">
        @csrf
        @method('patch')
        <input type="hidden" name="status" value="2">
        <input type="hidden" name="lawyer" value="{{ auth()->user()->id }}">
        <button class="btn btn-warning mb-3" type="submit">Принять в работу</button>
    </form>
@elseif($application->status == \App\Models\Application::STATUS_WORK && auth()->user()->id == $application->lawyer && empty($application->answer))
    <form method="post" action="{{ route('application.update.answer', $application->id) }}">
        @csrf
        @method('patch')
        <fieldset>
            <div class="form-group mb-3">
                <label for="answer" class="form-label mt-4">Ответ</label>
                <textarea name="answer"
                          class="form-control"
                          id="answer"
                          rows="3"
                          placeholder="Напишите ответ"
                ></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-3 mt-3">Отправить</button>
        </fieldset>
    </form>
@endif
