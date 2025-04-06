<aside class="sidebar px-1 py-2">
    <div class="sticky-top" style="top: 120px">
        <div class="text-body-tertiary fw-semibold mt-3 mb-2">GENERAL</div>
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
    </div>
</aside>
