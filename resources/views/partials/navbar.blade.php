<nav class="navbar navbar-expand-lg navbar-light bg-white m-0 p-0 sticky-top">
    <div class="border-bottom w-100">
        <div class="container-xxl py-2">
            <!-- Sidebar Toggle Button -->
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-light d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <div class="d-flex align-items-center gap-2 py-3 me-auto">
                    <div class="icon-wrapp">
                        <img src="../../img/icon-todolist-ukk-purple.png" alt="">
                    </div>
                    <div class="fw-medium fs-5">Listify</div>
                </div>
                {{-- <div class="fw-medium fs-5 me-auto">Home</div> --}}
                {{-- <div>
                    <input class="form-control form-control py-2 rounded-pill ps-3" type="text" placeholder="Search" aria-label=".form-control-lg example">
                </div> --}}
                {{-- <divz class="vr"></divz> --}}
                <div class="border-start px-4">
                    <div class="btn-group">
                        <button class="btn btn-light border-0 text-dark px-4" type="button">
                            {{ auth()->user()->name }}
                        </button>
                        <button type="button" class="btn btn-light border-0 dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    @method('post')
                                    <button type="submit" class="dropdown-item" href="#" style="font-size: 14px">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="offcanvas offcanvas-start sidebar" tabindex="-1" id="sidebar">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <aside class="px-1 py-2">
            <div class="text-body-tertiary fw-bold mt-3">GENERAL</div>
            <div class="p-2 vstack gap-2">
                <a class="link-sidebar link-dark link-underline link-underline-opacity-0" href="{{ route('task') }}">
                    <div class="d-flex link-sidebar gap-2 py-1 px-2 text-secondary {{ request()->is('task') ? 'active' : '' }}">
                        <i class="bi bi-house"></i>
                        <div class="fw-medium">Home</div>
                    </div>
                </a>
                <a class="link-sidebar link-dark link-underline link-underline-opacity-0" href="{{ route('archive') }}">
                    <div class="d-flex link-sidebar gap-2 py-1 px-2 text-secondary {{ request()->is('archive') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark-check"></i>
                        <div class="fw-medium">Archive</div>
                    </div>
                </a>
            </div>
        </aside>
    </div>
</div>
