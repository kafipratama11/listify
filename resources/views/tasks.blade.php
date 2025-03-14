@extends('layouts.app')
@section('main')
<div class="d-flex">
    <aside class="sidebar px-4 py-2 border-end">
        <div class="d-flex align-items-center gap-2 py-3">
            <div class="icon-wrapp">
                <img src="img/icon-todolist-ukk-purple.png" alt="">
            </div>
            <div class="fw-medium fs-5">Listify</div>
        </div>
        <div class="text-body-tertiary fw-bold mt-3">GENERAL</div>
        <div class="p-2 vstack gap-2">
            <a class="link-sidebar link-dark link-underline link-underline-opacity-0" href="">
                <div class="d-flex link-sidebar gap-2 py-1 px-3 text-secondary {{ request()->is('task') ? 'active' : '' }}">
                    <i class="bi bi-house"></i>
                    <div class="fw-medium">Home</div>
                </div>
            </a>
            <a class="link-sidebar link-dark link-underline link-underline-opacity-0" href="">
                <div class="d-flex link-sidebar  gap-2 py-1 px-3 text-secondary">
                    <i class="bi bi-file-earmark-check"></i>
                    <div class="fw-medium">Archive</div>
                </div>
            </a>
        </div>
    </aside>
    <div class="w-100">
        <nav>
            <div class="border-bottom">
                <div class="container-xxl py-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="fw-medium fs-5 me-auto">Home</div>
                        <div>
                            <input class="form-control form-control py-2 rounded-pill ps-3" type="text" placeholder="Search" aria-label=".form-control-lg example">
                        </div>
                        <div class="vr"></div>
                        <div>
                            <div class="btn-group">
                                <button class="btn bg-transparent border-0 dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    Kafi Pratama
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-xxl">
            <nav aria-label="breadcrumb" class="mt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="link-underline link-underline-opacity-0">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                </ol>
            </nav>
            <div class="mt-4">
                <div class="border-bottom mb-3">
                    <div class="d-flex">
                        <a href="" class="link-dark link-underline link-underline-opacity-0">
                            <div class="d-flex gap-2 py-2 px-2" style="width: fit-content; border-bottom: 1px solid #000000;">
                                <i class="bi bi-grid-1x2"></i>
                                <div>Board</div>
                            </div>
                        </a>
                        <a href="" class="link-dark link-underline link-underline-opacity-0">
                            <div class="d-flex gap-2 py-2 px-2" style="width: fit-content">
                                <i class="bi bi-list-check"></i>
                                <div>List</div>
                            </div>
                        </a>
                    </div>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
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
                    <button class="btn background-primary border-0 text-light me-auto" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-plus-lg"></i> Add New Task</button>
                    <div>
                        <input class="form-control form-control py-2 rounded-pill ps-3" type="text" placeholder="Search Tasks" aria-label=".form-control-lg example">
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <div class="modal-title fs-5" id="staticBackdropLabel">Add New Task</div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" class="btn background-secondary text-primary-custom rounded-pill fw-medium px-4" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn background-primary text-light rounded-pill px-4">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content mt-5" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="d-flex gap-5">
                            <div class="w-100">
                                <div class="border-bottom d-flex align-items-center py-2 w-100 gap-2">
                                    <i class="bi bi-circle-fill" style="color: #0DA6EB; font-size: 12px;"></i>
                                    <div>To-do</div>
                                </div>
                                <div class="task-card mt-5 px-3 pe-4 py-4">
                                    <div class="priority-lvl-card px-2 py-1 mb-3 rounded" style="width: fit-content;">High</div>
                                    <div class="vstack gap-2">
                                        <div class="fw-medium">Set Up Development Environment</div>
                                        <div class="fw-light task-desc text-secondary">Prepare the technical environment where the website will be built.</div>
                                        <div class="task-date fw-medium">Nov 2nd, 2024</div>
                                    </div>
                                    <div class="mt-3">
                                        <div class="d-flex gap-2 align-items-start sub-task">
                                            <i class="bi bi-check-circle-fill text-success"></i>
                                            <div>Configure web hosting and server settings</div>
                                        </div>
                                        <div class="d-flex gap-2 align-items-start sub-task">
                                            <i class="bi bi-circle"></i>
                                            <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta quia culpa aperiam!</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100">
                                <div class="border-bottom d-flex align-items-center py-2 w-100 gap-2">
                                    <i class="bi bi-circle-fill" style="color: #0DA6EB; font-size: 12px;"></i>
                                    <div>On Progress</div>
                                </div>
                                <div class="mt-5 vstack gap-3">
                                    <div class="task-card px-3 pe-4 py-4">
                                        <div class="priority-lvl-card px-2 py-1 mb-3 rounded" style="width: fit-content;">High</div>
                                        <div class="vstack gap-2">
                                            <div class="fw-medium">Set Up Development Environment</div>
                                            <div class="fw-light task-desc text-secondary">Prepare the technical environment where the website will be built.</div>
                                            <div class="task-date fw-medium">Nov 2nd, 2024</div>
                                        </div>
                                        <div class="mt-3">
                                            <div class="d-flex gap-2 align-items-start sub-task">
                                                <i class="bi bi-circle"></i>
                                                <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta quia culpa aperiam!</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="task-card px-3 pe-4 py-4">
                                        <div class="priority-lvl-card px-2 py-1 mb-3 rounded" style="width: fit-content;">High</div>
                                        <div class="vstack gap-2">
                                            <div class="fw-medium">Set Up Development Environment</div>
                                            <div class="fw-light task-desc text-secondary">Prepare the technical environment where the website will be built.</div>
                                            <div class="task-date fw-medium">Nov 2nd, 2024</div>
                                        </div>
                                        <div class="mt-3">
                                            <div class="d-flex gap-2 align-items-start sub-task">
                                                <i class="bi bi-check-circle-fill text-success"></i>
                                                <div>Configure web hosting and server settings</div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-start sub-task">
                                                <i class="bi bi-circle"></i>
                                                <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta quia culpa aperiam!</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100">
                                <div class="border-bottom d-flex align-items-center py-2 w-100 gap-2">
                                    <i class="bi bi-circle-fill" style="color: #0DA6EB; font-size: 12px;"></i>
                                    <div>Done</div>
                                </div>
                                <div class="card mt-5"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">ambon</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
