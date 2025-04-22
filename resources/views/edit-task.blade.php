@extends('layouts.app')
@section('main')
<div class="d-flex">
    <div class="w-100">
        @include('partials.navbar')
        <div class="d-flex container-xxl">
            @include('partials.sidebar')
            <div class="px-4 w-100">
                <div class="mt-4 row justify-content-center">

                    @if ($task->archive_status == 'active')
                    <form action="{{ route('archive.status', $task->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <input type="text" name="archive_status" value="archived" hidden>
                        <button type="submit" class="btn background-secondary me-auto text-primary-custom rounded-pill px-4 mb-3" style="width: fit-content">Archive</button>
                    </form>
                    @elseif($task->archive_status == 'archived')
                    <form action="{{ route('archive.status.active', $task->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <input type="text" name="archive_status" value="active" hidden>
                        <button type="submit" class="btn background-secondary me-auto text-primary-custom rounded-pill px-4 mb-3" style="width: fit-content">Unarchive</button>
                    </form>
                    @endif

                    <div class="col-xxl-8 col-xl-8 col-md-10 col-sm-12">
                        <form action="{{ route('task.update', $task->id) }}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="vstack gap-3">
                                <div class="vstack gap-1">
                                    <label class="label-container text-secondary">Task</label>
                                    <input class="form-control" type="text" name="title" value="{{ $task->title }}">
                                </div>
                                
                                <div class="vstack gap-1">
                                    <label class="label-container text-secondary">Description</label>
                                    <textarea class="form-control" name="description" rows="3">{{ $task->description }}</textarea>
                                </div>
                                
                                <div class="vstack gap-1">
                                    <label class="label-container text-secondary">Priority level</label>
                                    <div class="card-option">
                                        <input type="radio" id="option1" name="id_category" value="1" {{ (int) $task->id_category == 1 ? 'checked' : '' }}>
                                        <label class="option1" for="option1">
                                            <div>Low</div>
                                        </label>
                                
                                        <input type="radio" id="option2" name="id_category" value="2" {{ (int) $task->id_category == 2 ? 'checked' : '' }}>
                                        <label class="option2" for="option2">
                                            <div>Medium</div>
                                        </label>
                                
                                        <input type="radio" id="option3" name="id_category" value="3" {{ (int) $task->id_category == 3 ? 'checked' : '' }}>
                                        <label class="option3" for="option3">
                                            <div>High</div>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="vstack gap-1">
                                    <label class="label-container text-secondary">Date</label>
                                    <div class="d-flex gap-3 align-items-center">
                                        <input class="form-control" type="date" name="task_date" value="{{ $task->task_date }}">
                                        <div>-</div>
                                        <input class="form-control" type="date" name="deadline" value="{{ $task->deadline }}">
                                    </div>
                                </div>
                                
                                <div class="d-flex mt-3 justify-content-end">
                                    <button type="submit" class="btn background-primary text-light rounded-pill px-4" style="width: fit-content">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
