@extends('layouts.app')
@section('main')
    <body style="background-color: #f1f1f1;">
        @if (session('success'))
            <div class="alert alert-success position-absolute text-center w-100">{{ session('success') }}</div>
        @endif
        @if ($errors->has('email'))
            <div class="alert alert-danger position-absolute text-center w-100">{{ $errors->first('email') }}</div>
        @endif
        <div class="container container-login justify-content-center d-flex">
            <div class="row justify-content-center align-items-center w-100 h-100">
                <div class="col-xxl-4 col-xl-4 col-md-6 col-sm-12">
                    <div class="text-center">
                        <div class="vstack gap-4 mb-4">
                            <div class="">
                                <img src="img/icon-todolist-ukk.png" alt="" srcset="">
                                <div class="fw-bold fs-4 mt-3">Welcome to Listify to-do</div>
                            </div>
                            <div>Let's sign you in</div>
                        </div>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            @method('post')
                            <div class="vstack gap-3 mb-4">
                                <input class="form-control py-3 px-3 w-100 bg-transparent" type="text" placeholder="Email address" name="email" aria-label="default input example">
                                <div class="password-container">
                                    <input type="password" id="password" class="form-control py-3 px-3 w-100 bg-transparent" name="password" placeholder="Password">
                                    <i class="bi bi-eye toggle-password" id="togglePassword"></i>
                                </div>
                            </div>
                            <div>
                                <button class="btn background-primary w-100 border text-light py-3 border-0 fw-medium" type="submit">Login</button>
                            </div>
                        </form>
                        <div class="fw-medium mt-4">Don't have an account? <a href="/signup" class="link-dark">sign up</a></div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById("togglePassword").addEventListener("click", function () {
                const passwordInput = document.getElementById("password");
                const icon = this;
                
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    icon.classList.remove("bi-eye");
                    icon.classList.add("bi-eye-slash");
                } else {
                    passwordInput.type = "password";
                    icon.classList.remove("bi-eye-slash");
                    icon.classList.add("bi-eye");
                }
            });
        </script>
    </body>
@endsection