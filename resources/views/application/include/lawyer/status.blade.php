<div></div>
@if($application->status == \App\Models\Application::STATUS_WORK && auth()->user()->id == $application->lawyer)
    <span class="badge bg-warning">Заявка у вас в работе</span>
@endif
