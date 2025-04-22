@extends('layouts.app')
@section('main')
<div class="d-flex">
    <div class="w-100">
        @include('partials.navbar')
        <div class="d-flex container-xxl">
            @include('partials.sidebar')
            <div class="px-4 w-100">
                <div class="mt-4">
                    <div class="vstack gap-2">
                        @foreach ($tasksArchive as $task)
                        <div class="task-card w-100 position-relative overflow-hidden">
                            <a href="" class="link-underline link-underline-opacity-0 link-dark" data-bs-toggle="modal" data-bs-target="#listModal{{$task->id}}">
                                <div class="px-4 pe-4 py-4">
                                    <div class="vstack gap-2">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="fw-medium">{{ $task->title }}</div>

                                            {{-- category --}}
                                            @if ((int) $task->id_category == 1)
                                            <div class="priority-lvl-card px-2 py-1 rounded me-auto low-lvl" style="width: fit-content;">Low</div>
                                            @elseif((int) $task->id_category == 2)
                                            <div class="priority-lvl-card px-2 py-1 rounded me-auto medium-lvl" style="width: fit-content;">Medium</div>
                                            @elseif((int) $task->id_category == 3)
                                            <div class="priority-lvl-card px-2 py-1 rounded me-auto high-lvl" style="width: fit-content;">High</div>
                                            @endif

                                            {{-- status --}}
                                            @if ((int) $task->id_status == 1)
                                            <div class="status-card status-card-todo px-2 py-1 rounded d-flex gap-1" style="width: fit-content;">
                                                <i class="bi bi-circle"></i>
                                                <div class="status-text">To-do</div>
                                            </div>
                                            @elseif((int) $task->id_status == 2)
                                            <div class="status-card status-card-onprogress px-2 py-1 rounded d-flex gap-1" style="width: fit-content;">
                                                <i class="bi bi-arrow-clockwise"></i>
                                                <div class="status-text">On Progress</div>
                                            </div>
                                            @elseif((int) $task->id_status == 3)
                                            <div class="status-card status-card-done px-2 py-1 rounded d-flex gap-1" style="width: fit-content;">
                                                <i class="bi bi-check-lg"></i>
                                                <div class="status-text">Done</div>
                                            </div>
                                            @endif

                                        </div>
                                        <div class="fw-light task-desc text-secondary">{{ $task->description }}</div>
                                        <div class="task-date fw-medium">
                                            {{ \Carbon\Carbon::parse($task->task_date)->format('M jS, Y')}}
                                            @if ($task->deadline)
                                            -
                                            {{ \Carbon\Carbon::parse($task->deadline)->format('M jS, Y') }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <button class="btn-delete-task-card p-2 z-4 m-0 border-0 text-body-tertiary bg-light" style="position: absolute; right: 0px; bottom: 0px; border-radius: 12px 0 0 0;" data-bs-toggle="modal" data-bs-target="#deleteModalList{{$task->id}}"><i class="bi bi-trash3"></i></button>
                        </div>
                        <!-- Modal delete task list-->
                        <div class="modal fade" id="deleteModalList{{$task->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="d-flex justify-content-center">
                                            <img src="../../../img/cleanup.png" alt="" style="width: 200px">
                                        </div>
                                        <div class="text-center vstack gap-3">
                                            <div class="fw-bold text-secondary" style="font-size: 20px">Are you sure?</div>
                                            <div class="text-secondary">You won't be able to revert this!</div>
                                        </div>
                                        <div class="d-flex gap-2 justify-content-center mt-3">
                                            <form action="{{ route('delete.task.list', $task->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a class="btn btn-danger" data-bs-dismiss="modal" style="font-size: 14px">No, cancel!</a>
                                                <button class="btn btn-success" type="submit" style="font-size: 14px">Yes, delete it!</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- modal edit task list--}}
                        <div class="modal fade" id="listModal{{$task->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" style="width: 300px">
                                <div class="modal-content">
                                    <form action="{{ route('task.update.statusList', $task->id) }}" method="post">
                                        @csrf
                                        @method('patch')
                                        <div class="modal-header border-0">
                                            <div class="modal-title fs-5" id="exampleModalLabel">
                                                <div class="text-truncate" style="max-width: 170px;">
                                                    {{ $task->title }}
                                                </div>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body vstack gap-1">
                                            <input type="radio" id="todo{{ $task->id }}{{ $task->title }}" name="id_status" class="status-option-modal" value="1" {{ (int) $task->id_status == 1 ? 'checked' : '' }}>
                                            <label for="todo{{ $task->id }}{{ $task->title }}" class="status-card-modal status-card-todo" style="width: fit-content">
                                                <i class="bi bi-circle"></i> To-do
                                            </label>

                                            <input type="radio" id="onprogress{{ $task->id }}{{ $task->title }}" name="id_status" class="status-option-modal" value="2" {{ (int) $task->id_status == 2 ? 'checked' : '' }}>
                                            <label for="onprogress{{ $task->id }}{{ $task->title }}" class="status-card-modal status-card-onprogress" style="width: fit-content">
                                                <i class="bi bi-arrow-clockwise"></i> On Progress
                                            </label>

                                            <input type="radio" id="done{{ $task->id }}{{ $task->title }}" name="id_status" class="status-option-modal" value="3" {{ (int) $task->id_status == 3 ? 'checked' : '' }}>
                                            <label for="done{{ $task->id }}{{ $task->title }}" class="status-card-modal status-card-done" style="width: fit-content">
                                                <i class="bi bi-check-lg"></i> Done
                                            </label>

                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('task.edit', $task->id) }}" class="link-secondary mt-3 link-underline link-underline-opacity-0" style="width: fit-content; font-size: 14px;"><i class="bi bi-pen"></i> Edit Task</a>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn background-secondary text-primary-custom rounded-pill fw-medium px-4" data-bs-dismiss="modal" style="font-size: 14px">Cancel</button>
                                            <button type="submit" class="btn background-primary text-light rounded-pill px-4" style="font-size: 14px">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ambil tab terakhir yang aktif dari localStorage
        let activeTab = localStorage.getItem("activeTab");

        if (activeTab) {
            let tabElement = document.querySelector(`button[data-bs-target="${activeTab}"]`);
            if (tabElement) {
                new bootstrap.Tab(tabElement).show();
            }
        }

        // Simpan tab yang diklik ke localStorage
        document.querySelectorAll('.nav-link').forEach(tab => {
            tab.addEventListener("click", function() {
                localStorage.setItem("activeTab", this.getAttribute("data-bs-target"));
            });
        });
    });

</script>

@endsection
