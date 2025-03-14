@extends('layouts.app')
@section('main')
    <body style="background-color: #f1f1f1;">
        <div class="container container-login">
            <div class="row justify-content-center align-items-center w-100 h-100">
                <div class="col-4">
                    <div class="text-center">
                        <div class="vstack gap-4 mb-4">
                            <div class="">
                                <img src="img/icon-todolist-ukk.png" alt="" srcset="">
                                <div class="fw-bold fs-4 mt-3">Welcome to Listify to-do</div>
                            </div>
                            <div>Let's sign you in</div>
                        </div>
                        <div class="vstack gap-3 mb-4">
                            <input class="form-control py-3 px-3 w-100 bg-transparent" type="text" placeholder="Email address" aria-label="default input example">
                            <input class="form-control py-3 px-3 w-100 bg-transparent" type="password" placeholder="Password" aria-label="default input example">
                        </div>
                        <div>
                            <button class="btn background-primary w-100 border text-light py-3 border-0 fw-medium">Login</button>
                        </div>
                        <div class="fw-medium mt-4">Don't have an account? <a href="" class="link-dark">sign up</a></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection