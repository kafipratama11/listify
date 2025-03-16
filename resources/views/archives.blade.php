@extends('layouts.app')
@section('main')
<div class="d-flex">
    <div class="w-100">
        @include('partials.navbar')
        <div class="d-flex container-xxl">
            @include('partials.sidebar')
            <div class="px-4 w-100">
                <nav aria-label="breadcrumb" class="mt-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="link-underline link-underline-opacity-0">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Library</li>
                    </ol>
                </nav>
                <div class="mt-4">
                    
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
