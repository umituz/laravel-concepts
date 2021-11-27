@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="page-header">
                    <h2>All Tasks</h2>
                </div>
                @forelse($tasks as $task)
                    <div class="card">
                        <div class="card-header">{{$task->title}}</div>
                        <div class="card-body">
                            {{$task->description}}
                        </div>
                    </div>
                    <br>
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endsection
