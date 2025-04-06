@extends('layouts.app')
@section('main')
<div class="d-flex">
    <div class="w-100">
        @include('partials.navbar')
        <div class="d-flex container-xxl h-100">
            @include('partials.sidebar')
            <div class="main-section-wrapp px-xxl-4 px-xl-4 px-md-2 px-sm-0 w-100">
                <nav aria-label="breadcrumb" class="mt-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="link-underline link-underline-opacity-0">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Library</li>
                    </ol>
                </nav>
                {{-- <div class="mt-2 gradient-text">{{ $greeting }}, {{ auth()->user()->name }}!</div> --}}
                <div class="mt-4">
                    <ul class="nav nav-tabs gap-2" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active link-dark" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                <div class="d-flex gap-2">
                                    <i class="bi bi-grid-1x2"></i>
                                    <div>Board</div>
                                </div>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link link-dark" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">
                                <div class="d-flex gap-2">
                                    <i class="bi bi-list-check"></i>
                                    <div>List</div>
                                </div>
                            </button>
                        </li>
                    </ul>
                    <div class="mt-4 d-flex">
                        <button class="btn background-primary border-0 text-light me-auto shadow-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-plus-lg"></i> Add New Task</button>
                        <div>
                            <input class="form-control form-control py-2 rounded-pill ps-3" type="text" placeholder="Search Tasks" aria-label=".form-control-lg example">
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg d-flex justify-content-center">
                            <form action="/task/store" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <div class="modal-title fs-5" id="staticBackdropLabel">Add New Task</div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-xl-5">
                                        <div class="vstack gap-3">
                                            <div class="vstack gap-1">
                                                <label class="label-container text-secondary">Task</label>
                                                <input class="form-control" name="title" type="text" placeholder="" aria-label="default input example">
                                                <input class="form-control" name="archive_status" type="text" placeholder="" aria-label="default input example" value="active" hidden>
                                                <input class="form-control" name="id_status" type="number" placeholder="" aria-label="default input example" value="1" hidden>
                                            </div>
                                            <div class="vstack gap-1">
                                                <label class="label-container text-secondary">Description</label>
                                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                            <div class="vstack gap-1">
                                                <label class="label-container text-secondary">Priority level</label>
                                                <div class="card-option">
                                                    <input type="radio" id="option1" name="id_category" value="1" checked>
                                                    <label class="option1" for="option1">
                                                        <div>Low</div>
                                                    </label>
                                                    <input type="radio" id="option2" name="id_category" value="2">
                                                    <label class="option2" for="option2">
                                                        <div>Medium</div>
                                                    </label>
                                                    <input type="radio" id="option3" name="id_category" value="3">
                                                    <label class="option3" for="option3">
                                                        <div>High</div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="vstack gap-1">
                                                <label class="label-container text-secondary">Date</label>
                                                <div class="d-flex gap-3 align-items-center">
                                                    <input class="form-control" type="date" placeholder="" name="task_date" aria-label="default input example">
                                                    <div>-</div>
                                                    <input class="form-control" type="date" placeholder="" name="deadline" aria-label="default input example">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn background-secondary text-primary-custom rounded-pill fw-medium px-4" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn background-primary text-light rounded-pill px-4">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-content mt-5 pb-5" id="myTabContent">
                        <div class="tab-pane fade show active container-task-board" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="d-flex task-board-wrapp gap-3">
                                <div class="w-100">
                                    <div class="border-bottom d-flex align-items-center py-2 w-100 gap-2">
                                        <i class="bi bi-circle-fill" style="color: #0DA6EB; font-size: 12px;"></i>
                                        <div>To-do</div>
                                    </div>
                                    <div class="mt-5 vstack gap-3">
                                        @foreach ($tasksTodo as $task)
                                        <div class="d-flex task-card w-100 position-relative overflow-hidden">
                                            <a href="" class="link-underline link-underline-opacity-0 link-dark w-100" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $task->id }}">
                                                <div class="px-3 pe-4 py-4">
                                                    <div class="vstack gap-2">
                                                        <div class="d-flex">
                                                            @if ((int) $task->id_category === 1)
                                                            <div class="priority-lvl-card px-2 py-1 rounded me-auto" style="width: fit-content;">Low</div>
                                                            @elseif((int) $task->id_category === 2)
                                                            <div class="priority-lvl-card px-2 py-1 rounded me-auto" style="width: fit-content;">Medium</div>
                                                            @else
                                                            <div class="priority-lvl-card px-2 py-1 rounded me-auto" style="width: fit-content;">High</div>
                                                            @endif
                                                        </div>
                                                        <div class="fw-medium link-dark">{{ $task->title }}</div>
                                                        <div class="fw-light task-desc text-secondary">{{ $task->description }}</div>
                                                        <div class="task-date fw-medium">
                                                            {{ \Carbon\Carbon::parse($task->task_date)->format('M jS, Y') }}
                                                            @if ($task->deadline)
                                                            - {{ \Carbon\Carbon::parse($task->deadline)->format('M jS, Y') }}
                                                            @else
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <button class="btn-delete-task-card p-2 z-4 m-0 border-0 text-body-tertiary bg-light" style="position: absolute; right: 0px; border-radius: 0 0 0 12px;" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $task->id }}"><i class="bi bi-trash3"></i></button>
                                        </div>
                                        <!-- Modal delete-->
                                        <div class="modal fade" id="deleteModal{{ $task->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <form action="{{ route('task.destroy.todo', $task->id) }}" method="POST">
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
                                        {{-- modal edit--}}
                                        <div class="modal fade" id="exampleModal{{ $task->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" style="width: 300px">
                                                <div class="modal-content">
                                                    <form action="{{ route('task.updateStatusTodo', $task->id) }}" method="post">
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
                                                            <input type="radio" id="todo{{ $task->id }}" name="id_status" class="status-option-modal" value="1" {{ $task->id_status == 1 ? 'checked' : '' }}>
                                                            <label for="todo{{ $task->id }}" class="status-card-modal status-card-todo" style="width: fit-content">
                                                                <i class="bi bi-circle"></i> To-do
                                                            </label>

                                                            <input type="radio" id="onprogress{{ $task->id }}" name="id_status" class="status-option-modal" value="2" {{ $task->id_status == 2 ? 'checked' : '' }}>
                                                            <label for="onprogress{{ $task->id }}" class="status-card-modal status-card-onprogress" style="width: fit-content">
                                                                <i class="bi bi-arrow-clockwise"></i> On Progress
                                                            </label>

                                                            <input type="radio" id="done{{ $task->id }}" name="id_status" class="status-option-modal" value="3" {{ $task->id_status == 3 ? 'checked' : '' }}>
                                                            <label for="done{{ $task->id }}" class="status-card-modal status-card-done" style="width: fit-content">
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
                                <div class="w-100">
                                    <div class="border-bottom d-flex align-items-center py-2 w-100 gap-2">
                                        <i class="bi bi-circle-fill" style="color: #D945EE; font-size: 12px;"></i>
                                        <div>On Progress</div>
                                    </div>
                                    <div class="mt-5 vstack gap-3">
                                        @foreach ($tasksInProgress as $task)
                                        <div class="d-flex task-card w-100 position-relative overflow-hidden">
                                            <a href="" class="link-underline link-underline-opacity-0 link-dark w-100" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $task->id }}">
                                                <div class="px-3 pe-4 py-4">
                                                    <div class="vstack gap-2">
                                                        <div class="d-flex">
                                                            @if ((int) $task->id_category === 1)
                                                            <div class="priority-lvl-card px-2 py-1 rounded me-auto" style="width: fit-content;">Low</div>
                                                            @elseif((int) $task->id_category === 2)
                                                            <div class="priority-lvl-card px-2 py-1 rounded me-auto" style="width: fit-content;">Medium</div>
                                                            @else
                                                            <div class="priority-lvl-card px-2 py-1 rounded me-auto" style="width: fit-content;">High</div>
                                                            @endif
                                                        </div>
                                                        <div class="fw-medium link-dark">{{ $task->title }}</div>
                                                        <div class="fw-light task-desc text-secondary">{{ $task->description }}</div>
                                                        <div class="task-date fw-medium">
                                                            {{ \Carbon\Carbon::parse($task->task_date)->format('M jS, Y') }}
                                                            @if ($task->deadline)
                                                            - {{ \Carbon\Carbon::parse($task->deadline)->format('M jS, Y') }}
                                                            @else
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <button class="btn-delete-task-card p-2 z-4 m-0 border-0 text-body-tertiary bg-light" style="position: absolute; right: 0px; border-radius: 0 0 0 12px;" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $task->id }}"><i class="bi bi-trash3"></i></button>
                                        </div>
                                        <!-- Modal delete-->
                                        <div class="modal fade" id="deleteModal{{ $task->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <form action="{{ route('task.destroy.inprogress', $task->id) }}" method="POST">
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
                                        {{-- modal --}}
                                        <div class="modal fade" id="exampleModal{{ $task->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" style="width: 300px">
                                                <div class="modal-content">
                                                    <form action="{{ route('task.updateStatusInProgress', $task->id) }}" method="post">
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
                                                            <input type="radio" id="todo{{ $task->id }}" name="id_status" class="status-option-modal" value="1" {{ $task->id_status == 1 ? 'checked' : '' }}>
                                                            <label for="todo{{ $task->id }}" class="status-card-modal status-card-todo" style="width: fit-content">
                                                                <i class="bi bi-circle"></i> To-do
                                                            </label>

                                                            <input type="radio" id="onprogress{{ $task->id }}" name="id_status" class="status-option-modal" value="2" {{ $task->id_status == 2 ? 'checked' : '' }}>
                                                            <label for="onprogress{{ $task->id }}" class="status-card-modal status-card-onprogress" style="width: fit-content">
                                                                <i class="bi bi-arrow-clockwise"></i> On Progress
                                                            </label>

                                                            <input type="radio" id="done{{ $task->id }}" name="id_status" class="status-option-modal" value="3" {{ $task->id_status == 3 ? 'checked' : '' }}>
                                                            <label for="done{{ $task->id }}" class="status-card-modal status-card-done" style="width: fit-content">
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
                                <div class="w-100">
                                    <div class="border-bottom d-flex align-items-center py-2 w-100 gap-2">
                                        <i class="bi bi-circle-fill" style="color: #32A17B; font-size: 12px;"></i>
                                        <div>Done</div>
                                    </div>
                                    <div class="mt-5 vstack gap-3">
                                        @foreach ($tasksDone as $task)
                                        <div class="d-flex task-card w-100 position-relative overflow-hidden">
                                            <a href="" class="link-underline link-underline-opacity-0 link-dark w-100" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $task->id }}">
                                                <div class="px-3 pe-4 py-4">
                                                    <div class="vstack gap-2">
                                                        <div class="d-flex">
                                                            @if ((int) $task->id_category === 1)
                                                            <div class="priority-lvl-card px-2 py-1 rounded me-auto" style="width: fit-content;">Low</div>
                                                            @elseif((int) $task->id_category === 2)
                                                            <div class="priority-lvl-card px-2 py-1 rounded me-auto" style="width: fit-content;">Medium</div>
                                                            @else
                                                            <div class="priority-lvl-card px-2 py-1 rounded me-auto" style="width: fit-content;">High</div>
                                                            @endif
                                                        </div>
                                                        <div class="fw-medium link-dark">{{ $task->title }}</div>
                                                        <div class="fw-light task-desc text-secondary">{{ $task->description }}</div>
                                                        <div class="task-date fw-medium">
                                                            {{ \Carbon\Carbon::parse($task->task_date)->format('M jS, Y') }}
                                                            @if ($task->deadline)
                                                            - {{ \Carbon\Carbon::parse($task->deadline)->format('M jS, Y') }}
                                                            @else
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <button class="btn-delete-task-card p-2 z-4 m-0 border-0 text-body-tertiary bg-light" style="position: absolute; right: 0px; border-radius: 0 0 0 12px;" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $task->id }}"><i class="bi bi-trash3"></i></button>
                                        </div>
                                        <!-- Modal delete-->
                                        <div class="modal fade" id="deleteModal{{ $task->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <form action="{{ route('task.destroy.done', $task->id) }}" method="POST">
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
                                        {{-- modal --}}
                                        <div class="modal fade" id="exampleModal{{ $task->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" style="width: 300px">
                                                <div class="modal-content">
                                                    <form action="{{ route('task.updateStatusDone', $task->id) }}" method="post">
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
                                                            <input type="radio" id="todo{{ $task->id }}" name="id_status" class="status-option-modal" value="1" {{ $task->id_status == 1 ? 'checked' : '' }}>
                                                            <label for="todo{{ $task->id }}" class="status-card-modal status-card-todo" style="width: fit-content">
                                                                <i class="bi bi-circle"></i> To-do
                                                            </label>

                                                            <input type="radio" id="onprogress{{ $task->id }}" name="id_status" class="status-option-modal" value="2" {{ $task->id_status == 2 ? 'checked' : '' }}>
                                                            <label for="onprogress{{ $task->id }}" class="status-card-modal status-card-onprogress" style="width: fit-content">
                                                                <i class="bi bi-arrow-clockwise"></i> On Progress
                                                            </label>

                                                            <input type="radio" id="done{{ $task->id }}" name="id_status" class="status-option-modal" value="3" {{ $task->id_status == 3 ? 'checked' : '' }}>
                                                            <label for="done{{ $task->id }}" class="status-card-modal status-card-done" style="width: fit-content">
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
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div class="vstack gap-2">
                                @foreach ($tasks as $task)
                                <div class="task-card w-100 position-relative overflow-hidden">
                                    <a href="" class="link-underline link-underline-opacity-0 link-dark" data-bs-toggle="modal" data-bs-target="#listModal{{ $task->id }}">
                                        <div class="px-4 pe-4 py-4">
                                            <div class="vstack gap-2">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="fw-medium">{{ $task->title }}</div>
                                                    @if ((int) $task->id_category === 1)
                                                    <div class="priority-lvl-card px-2 py-1 rounded me-auto" style="width: fit-content;">Low</div>
                                                    @elseif((int) $task->id_category === 2)
                                                    <div class="priority-lvl-card px-2 py-1 rounded me-auto" style="width: fit-content;">Medium</div>
                                                    @else
                                                    <div class="priority-lvl-card px-2 py-1 rounded me-auto" style="width: fit-content;">High</div>
                                                    @endif
                                                    @if ((int) $task->id_status === 1)
                                                    <div class="status-card status-card-todo px-2 py-1 rounded d-flex gap-1" style="width: fit-content;">
                                                        <i class="bi bi-circle"></i>
                                                        <div class="status-text">To-do</div>
                                                    </div>
                                                    @elseif((int) $task->id_status === 2)
                                                    <div class="status-card status-card-onprogress px-2 py-1 rounded d-flex gap-1" style="width: fit-content;">
                                                        <i class="bi bi-arrow-clockwise"></i>
                                                        <div class="status-text">On Progress</div>
                                                    </div>
                                                    @else
                                                    <div class="status-card status-card-done px-2 py-1 rounded d-flex gap-1" style="width: fit-content;">
                                                        <i class="bi bi-check-lg"></i>
                                                        <div class="status-text">Done</div>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="fw-light task-desc text-secondary">{{ $task->description }}</div>
                                                <div class="task-date fw-medium">
                                                    {{ \Carbon\Carbon::parse($task->task_date)->format('M jS, Y') }}
                                                    @if ($task->deadline)
                                                    - {{ \Carbon\Carbon::parse($task->deadline)->format('M jS, Y') }}
                                                    @else
    
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <button class="btn-delete-task-card p-2 z-4 m-0 border-0 text-body-tertiary bg-light" style="position: absolute; right: 0px; bottom: 0px; border-radius: 12px 0 0 0;" data-bs-toggle="modal" data-bs-target="#deleteModalList{{ $task->id }}"><i class="bi bi-trash3"></i></button>
                                </div>
                                <!-- Modal delete-->
                                <div class="modal fade" id="deleteModalList{{ $task->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <form action="{{ route('task.destroy', $task->id) }}" method="POST">
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
                                {{-- modal --}}
                                <div class="modal fade" id="listModal{{ $task->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" style="width: 300px">
                                        <div class="modal-content">
                                            <form action="{{ route('task.updateStatus', $task->id) }}" method="post">
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
                                                    <input type="radio" id="todo{{ $task->id }} {{ $task->title }}" name="id_status" class="status-option-modal" value="1" {{ $task->id_status == 1 ? 'checked' : '' }}>
                                                    <label for="todo{{ $task->id }} {{ $task->title }}" class="status-card-modal status-card-todo" style="width: fit-content">
                                                        <i class="bi bi-circle"></i> To-do
                                                    </label>

                                                    <input type="radio" id="onprogress{{ $task->id }} {{ $task->title }}" name="id_status" class="status-option-modal" value="2" {{ $task->id_status == 2 ? 'checked' : '' }}>
                                                    <label for="onprogress{{ $task->id }} {{ $task->title }}" class="status-card-modal status-card-onprogress" style="width: fit-content">
                                                        <i class="bi bi-arrow-clockwise"></i> On Progress
                                                    </label>

                                                    <input type="radio" id="done{{ $task->id }} {{ $task->title }}" name="id_status" class="status-option-modal" value="3" {{ $task->id_status == 3 ? 'checked' : '' }}>
                                                    <label for="done{{ $task->id }} {{ $task->title }}" class="status-card-modal status-card-done" style="width: fit-content">
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
