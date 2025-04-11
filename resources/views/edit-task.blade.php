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
                <div class="mt-4 row justify-content-center">
                    <div class="col-xxl-8 col-xl-8 col-md-10 col-sm-12">
                        <form action="" method="POST">
                            <div class="vstack gap-3">
                                <div class="vstack gap-1">
                                    <label class="label-container text-secondary">Task</label>
                                    <input class="form-control" type="text" name="title" value="" placeholder="Task Title">
                                </div>
                                
                                <div class="vstack gap-1">
                                    <label class="label-container text-secondary">Description</label>
                                    <textarea class="form-control" name="description" rows="3"></textarea>
                                </div>
                                
                                <div class="vstack gap-1">
                                    <label class="label-container text-secondary">Priority level</label>
                                    <div class="card-option">
                                        <input type="radio" id="option1" name="id_category" value="1">
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
                                        <input class="form-control" type="date" name="task_date" value="">
                                        <div>-</div>
                                        <input class="form-control" type="date" name="deadline" value="">
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-end mt-3">
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
