@extends('layouts.layout', ['title' => 'Home page'])

@section('content')
    <div class="row">
        <div class="col-12">
            <h2 class="text-center mt-4">Home page</h2>
        </div>
        <div class="col-12">
            <div class="list-group">
                <a href="{{ route('task_1') }}" class="list-group-item list-group-item-action">
                    Task 1
                </a>
                <a href="{{ route('task_2') }}" class="list-group-item list-group-item-action">
                    Task 2-4
                </a>
            </div>
        </div>
    </div>
@endsection
